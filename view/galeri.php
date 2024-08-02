<?php 
require '../function/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../desa-img/logo_indra.jpeg">
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
                <a href="../view/index.php">
                    <img src="../desa-img/logo_indra.jpeg" alt="Logo Desa Kertamulya"> <!-- Replace with your logo -->
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

                                <li><a class="dropdown-item" href="../view/visi_misi.php">Visi & Misi</a></li>
                                <li><a class="dropdown-item" href="../view/sejarah.php">Sejarah Desa</a></li>

                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#pemerintahan" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pemerintahan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../view/struktur.php">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="../view/perangkat_desa.php">Perangkat Desa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#informasi" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Informasi Publik
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../view/berita_desa.php">Berita Desa</a></li>
                                <li><a class="dropdown-item" href="../view/pengumuman.php">Pengumuman</a></li>
                                <li><a class="dropdown-item" href="../view/agenda.php">Agenda Kegiatan</a></li>
                                <li><a class="dropdown-item" href="../view/galeri.php">Galeri</a></li>
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
            <li class="breadcrumb-item"><a href="../view/index.php"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
        </ol>
    </nav>
    <!-- end breadcrumb -->x`


    <!-- Galeri -->
    <main class="container my-5">
        <div class="row">
            <section class="galeri col-md-12">
                <h2 class="mb-4">Galeri</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    <?php
                    // Fetch gallery items from the database
                    $sql = "SELECT id, judul, image FROM galeri ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col ">
                                <div class="card h-100 shadow-sm p-3 mb-5 bg-body-tertiary">
                                    <img src="../admin/uploads/' . $row["image"] . '" class="card-img-top" alt="' . $row["judul"] . '">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row["judul"] . '</h5>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo "<p>No gallery items found.</p>";
                    }

                    mysqli_close($conn);
                    ?>
                </div>
            </section>
        </div>
    </main>
    <!-- end galeri -->


    <!-- Footer -->
    <footer class="footer mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Profil</h5>
                    <p>Desa Bulak - jatibarang<br>Kabupaten Indramayu - Jawa Barat</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit tempore itaque qui voluptates
                        minima autem placeat nemo similique eligendi nisi aliquam doloribus dignissimos odit odio eius
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


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>