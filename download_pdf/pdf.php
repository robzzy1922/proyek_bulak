<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Surat Digital</title>
</head>

<body>
    <form action="buat_pdf.php" method="post">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="birthdate">Tempat, Tanggal Lahir:</label>
        <input type="text" id="birthdate" name="birthdate" required><br><br>

        <label for="gender">Jenis Kelamin:</label>
        <input type="text" id="gender" name="gender" required><br><br>

        <label for="religion">Agama:</label>
        <input type="text" id="religion" name="religion" required><br><br>

        <label for="job">Pekerjaan:</label>
        <input type="text" id="job" name="job" required><br><br>

        <label for="address">Alamat:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <input type="submit" value="Buat Surat">
    </form>

    <?php
    if (isset($_GET['download'])) {
        $file_path = 'surat_keterangan_tinggal.pdf'; // Use relative path
        echo "<a href='$file_path' download>Download Surat</a>";
    }
    ?>
</body>

</html>