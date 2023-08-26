<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

// Konfigurasi SMTP
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'gmail';
$mail->Password = 'Pass';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;


// Pengirim
$mail->setFrom('your_email@example.com', 'Your Name'); // Ganti dengan alamat email Anda dan nama

// Mengambil daftar penerima dari form
$tujuan = $_POST['tujuan'];
$penerimaArray = explode(',', $tujuan); // Membagi alamat email berdasarkan koma

// Konten Email
$mail->Subject = $_POST['subjek'];
$mail->Body    = $_POST['pesan'];

foreach ($penerimaArray as $penerima) {
    $penerima = trim($penerima); // Menghapus spasi ekstra
    if (filter_var($penerima, FILTER_VALIDATE_EMAIL)) {
        $mail->clearAddresses(); // Membersihkan alamat penerima sebelum setiap pengiriman
        $mail->addAddress($penerima);

        if (!$mail->send()) {
            echo "Pesan tidak dapat dikirim kepada $penerima. Kesalahan: " . $mail->ErrorInfo . "<br>";
        } else {
            echo "Pesan berhasil dikirim kepada $penerima.<br>";
        }
    } else {
        echo "$penerima bukan alamat email yang valid.<br>";
    }
}
