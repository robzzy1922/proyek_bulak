<?php
require 'koneksi.php';

$article_id = isset($_GET['id']) ? intval($_GET['id']) : 1; // Get ID from URL or default to 1

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $email = mysqli_real_escape_string($conn, $_POST['email']); // Add email field
    $created_at = date('Y-m-d H:i:s');

    $sql_insert = "INSERT INTO komentar (article_id, user_name, content, email, created_at) VALUES ($article_id, '$user_name', '$content', '$email', '$created_at')";
    mysqli_query($conn, $sql_insert);
}

$sql = "SELECT judul, konten, image, created_at FROM artikel WHERE id = $article_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $title = $row['judul'];
    $content = $row['konten'];
    $image = $row['image'];
    $created_at = $row['created_at'];
  
} else {
    echo "No article found.";
    exit;
}

// Fetch comments
$sql_comments = "SELECT user_name, content, email, created_at FROM komentar WHERE article_id = $article_id";
$comments_result = mysqli_query($conn, $sql_comments);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../style/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>

    <!-- navbar -->
    <header>
        <div class="container d-flex justify-content-between align-items-center ">
            <div class="logo d-flex ">
                <a href="index.php">
                    <img src="img-crousel/logo.jpg" alt="Logo Desa Kertamulya"> <!-- Replace with your logo -->
                </a>
                <div class="ms-3">
                    <span>Desa Bulak</span><br>
                    <span>Kabupaten Indramayu</span>
                </div>
            </div>
            <nav class=" navbar navbar-expand-lg navbar-light ">
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#profil" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Profil Desa
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="tentang_kami.php">Tentang Kami</a></li>
                                <li><a class="dropdown-item" href="visi_misi.php">Visi & Misi</a></li>
                                <li><a class="dropdown-item" href="sejarah.php">Sejarah Desa</a></li>

                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#pemerintahan" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pemerintahan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="struktur.php">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="perangkat_desa.php">Perangkat Desa</a></li>
                                <li><a class="dropdown-item" href="lembaga.php">Lembaga Desa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#informasi" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Informasi Publik
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="berita_desa.php">Berita Desa</a></li>
                                <li><a class="dropdown-item" href="pengumuman.php">Pengumuman</a></li>
                                <li><a class="dropdown-item" href="agenda.php">Agenda Kegiatan</a></li>
                                <li><a class="dropdown-item" href="galeri.php">Galeri</a></li>
                                <li><a class="dropdown-item" href="download.php">Download</a></li>
                                <li><a class="dropdown-item" href="produk.php">Produk Hukum</a></li>
                            </ul>
                        </li>
                        <li class="nav-user"><a class="nav-link"
                                style="color: #ffffff; background-color: #00ba88; border-radius: 5px; margin-right: 10px; font-weight: normal;"
                                href="#potensi">Layanan
                                Mandiri</a></li>
                        <li class="nav-admin"><a class="nav-link"
                                style="color: #ffffff; background-color: #007bff; border-radius: 5px; font-weight: normal;"
                                href="#produk">Login Admin</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end navbar -->
    <div class="container mt-5">
        <!-- Breadcrumb start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="berita_desa.php">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>
        <!-- Breadcrumb end -->

        <!-- isi artikel -->
        <div class="article-content">
            <h1 class="text-primary"><?php echo $title; ?></h1><br>
            <div class="meta">
                <span><i class="fas fa-calendar-alt"></i> <?php echo date('d F Y', strtotime($created_at)); ?></span> |
                <span><i class="fas fa-user"></i>Administrator</span>
            </div><br>
            <img src="<?php echo "admin/uploads/" . $image; ?>" alt="<?php echo $title; ?>" style="width:400px">
            <p><?php echo nl2br($content); ?></p>
        </div>
        <!-- end isi artikel -->
    </div>

    <!-- komentar -->
    <div class="container mt-5">
        <h2>Komentar</h2>
        <p class="text-muted">Komentar dapat dikirimkan melalui form dibawah ini</p>
        <form class="col-md-6" action="" method="POST">
            <div class="mb-3">
                <label for="user_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Comment</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="comments-container mt-5">
            <div class="comments">
                <?php while ($comment = mysqli_fetch_assoc($comments_result)) { ?>
                <div class="comment-card">
                    <div class="meta">
                        <strong><?php echo htmlspecialchars($comment['user_name']); ?></strong>
                        <span
                            class="text-muted"><?php echo date('d F Y H:i', strtotime($comment['created_at'])); ?></span>
                    </div>
                    <p><?php echo nl2br(htmlspecialchars($comment['content'])); ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- end komentar -->

    <!-- Footer -->
    <footer class="footer mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Profil</h5>
                    <p>Desa Bulak - jatibarang<br>Kabupaten Indramayu - Jawa Barat</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit tempore itaque qui voluptates
                        minima autem placeat nemo similique eligendi nisi aliquam doloribus dignissimos odit odio
                        eius
                        quo quia neque, hic a inventore tenetur mollitia! Obcaecati officia natus dolorem excepturi
                        quae....</p>
                    <a href="#">selengkapnya ➔</a>
                </div>
                <div class="col-md-4">
                    <h5>Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Kabupaten Indramayu</a></li>
                        <li><a href="#">KEMENDAGRI</a></li>
                        <li><a href="#">KEMENDESA</a></li>
                        <li><a href="#">KEMENKOMINFO</a></li>
                        <li><a href="#">Produk Desa Bulak</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak Kami</h5>
                    <p>Jl. Raya Bulak No. 122 jatibarang, Kode Pos 45273</p>
                    <p><a href="tel:0226623181">022-6623181</a></p>
                    <p><a href="mailto:pemdes@kertamulya-padalarang.desa.id">pemdes@jatibarang.desa.id</a>
                    </p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>2024 © Rekayasa Perangkat Lunak POLINDRA.</p>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>