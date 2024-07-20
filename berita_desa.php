<?php
 require 'koneksi.php'
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Desa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- top info -->
    <div class="top-bar">
        <a href="tel:0226623181">022-6623181</a> |
        <a href="mailto:pemdes@kertamulya-padalarang.desa.id">pemdes@jatibarang.desa.id</a> |
        <span>Kabupaten Indramayu</span>
    </div>
    <!-- end top info -->


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


    <!-- breadcrumb -->
    <nav aria-label="breadcrumb" class="container mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Berita</li>
        </ol>
    </nav>
    <!-- end breadcrumb -->

    <!-- berita -->
    <main class="container my-5">
        <div class="row">
            <section class="news-list col-md-8">
                <h2>Berita</h2>
                <?php
                $sql = "SELECT id, judul, created_at, konten, image FROM artikel ORDER BY created_at DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<article class="mb-4 d-flex">';
                        echo '<img src="uploads/' . $row["image"] . '" class="img-fluid me-3" alt="News Image" style="width: 150px; height: auto;">';
                        echo '<div>';
                        echo '<h3> <a href="artikel.php?id=' . $row["id"] . '" style="text-decoration: none;">' . $row["judul"] . '</a></h3>';
                        echo '<p><i class="fas fa-calendar-alt"></i> ' . date('d F Y', strtotime($row["created_at"])) . ' <i class="fas fa-user"></i> Administrator</p>';
                        echo '<p>' . substr($row["konten"], 0, 100) . '...</p>';
                        echo '<a href="berita_detail.php?id=' . $row["id"] . '" class="btn btn-primary">selengkapnya</a>';
                        echo '</div>';
                        echo '</article>';
                    }
                } else {
                    echo "<p>No news found.</p>";
                }
                ?>
            </section>
            <!-- end berita -->
        </div>
    </main>

    <footer class="bg-light py-3 text-center">
        <p>&copy; 2023 Desa Kertamulya</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>