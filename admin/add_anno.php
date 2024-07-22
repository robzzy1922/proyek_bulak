<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require '../koneksi.php'; // Pastikan path ke koneksi.php benar

        $judul = htmlspecialchars($_POST['judul']);
        $konten = htmlspecialchars($_POST['konten']);
        $image = $_FILES['image']['name'];
        $target_dir = "../admin/uploads/";
        $target_file = $target_dir . basename($image);

        // Upload file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO pengumuman (judul, image, konten, created_at) VALUES ('$judul', '$image', '$konten', NOW())";
            if (mysqli_query($conn, $sql)) {
                echo "<p>Pengumuman berhasil ditambahkan.</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }

        mysqli_close($conn);
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengumuman</title>
</head>

<body>
    <h1>Tambah Pengumuman</h1>
    <form action="add_anno.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" required>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required>
        </div>
        <div>
            <label for="konten">Konten:</label>
            <textarea id="konten" name="konten" rows="4" required></textarea>
        </div>
        <button type="submit" name="submit">Tambah Pengumuman</button>
    </form>

</body>

</html>