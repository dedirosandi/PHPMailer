<!DOCTYPE html>
<html>

<head>
    <title>Form Kirim Email</title>
</head>

<body>
    <form action="kirim_email.php" method="post">
        <label for="tujuan">Tujuan:</label>
        <input type="text" id="tujuan" name="tujuan" required><br>

        <label for="subjek">Subjek:</label>
        <input type="text" id="subjek" name="subjek" required><br>

        <label for="pesan">Pesan:</label><br>
        <textarea id="pesan" name="pesan" rows="4" required></textarea><br>

        <input type="submit" value="Kirim Email">
    </form>
</body>

</html>