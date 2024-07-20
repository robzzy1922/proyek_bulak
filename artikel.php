<?php
require 'koneksi.php';

$article_id = isset($_GET['id']) ? intval($_GET['id']) : 1; // Get ID from URL or default to 1
$sql = "SELECT judul, konten, image FROM artikel WHERE id = $article_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $title = $row['judul'];
    $content = $row['konten'];
    $image = $row['image'];
} else {
    echo "No article found.";
    exit;
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <header class="top-bar">
        <div class="container">
            <h1><?php echo $title; ?></h1>
        </div>
    </header>
    <div class="container mt-5">
        <!-- Breadcrumb start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="berita_desa.php">Articles</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>
        <!-- Breadcrumb end -->

        <!-- isi artikel -->
        <div class="news-content">
            <img src="uploads/<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-fluid">
            <?php echo $content; ?>
        </div>
    </div>
    <!-- end isi artikel -->

    <!-- footer -->
    <footer class="footer mt-5">
        <div class="container">
            <p>&copy; 2023 Your Website</p>
        </div>
    </footer>
    <!-- end footer -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>