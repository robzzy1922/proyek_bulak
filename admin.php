<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="submit.php" method="post" enctype="multipart/form-data">
        <label for="title">Judul:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Konten:</label>
        <textarea id="content" name="content" required></textarea><br><br>

        <input type="file" name="image" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>