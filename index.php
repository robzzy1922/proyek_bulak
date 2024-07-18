<?php
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Bulak</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    .map-section>#map {
        border: 2px solid #007bff !important;
        border-radius: 5px !important;
        height: 400px !important;
    }
    </style>
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
                <img src="img-crousel/logo.jpg" alt="Logo Desa Kertamulya"> <!-- Replace with your logo -->
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
                                <li><a class="dropdown-item" href="#">Tentang Kami</a></li>
                                <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                                <li><a class="dropdown-item" href="#">Sejarah Desa</a></li>

                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#pemerintahan" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pemerintahan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="#">Perangkat Desa</a></li>
                                <li><a class="dropdown-item" href="#">Lembaga Desa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#informasi" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Informasi Publik
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Berita Desa</a></li>
                                <li><a class="dropdown-item" href="#">Pengumuman</a></li>
                                <li><a class="dropdown-item" href="#">Agenda Kegiatan</a></li>
                                <li><a class="dropdown-item" href="#">Galeri</a></li>
                                <li><a class="dropdown-item" href="#">Download</a></li>
                                <li><a class="dropdown-item" href="#">Produk Hukum</a></li>
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

    <!-- crousel -->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img-crousel/xoss.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img-crousel/xosss.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img-crousel/xosss.webp" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end crousel -->


    <!-- Berita Terkini dan Pengumuman -->
    <section class="news-announcements container mt-5">
        <div class="row">
            <div class="head-news col-md-8">
                <h2><a href="#">Berita <span>Terkini</span></a></h2>
                <?php
                $sql = "SELECT judul, created_at, konten, image FROM artikel ORDER BY created_at DESC LIMIT 4";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="news-item">';
                        echo '<img src="uploads/' . $row["image"] . '" alt="News">';
                        echo '<div class="news-content">';
                        echo '<h3>' . $row["judul"] . '</h3>';
                        echo '<p>' . date('d F Y', strtotime($row["created_at"]))  . '</p>';
                        echo '<p>' . substr($row["konten"], 0, 50 ) . '... <a href="#">Selengkapnya</a></p>';
                        echo '<p>oleh: administrator</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                ?>
            </div>
            <div class="col-md-4">
                <h2><a href="#">Pengumuman</a></h2>
                <ul class="announcements-list">
                    <li><a href="#">Vaksin Booster Ke-2</a></li>
                    <li><a href="#">Pendaftaran Kartu Prakerja</a></li>
                    <li><a href="#">Seleksi Pengurus BUMDes</a></li>
                </ul>
                <h2><a href="#">Agenda Kegiatan</a></h2>
                <ul class="agenda-list">
                    <li>
                        <p>Feb 06, 2024</p>
                        <p>Sosialisasi Penanggulangan Covid 19</p>
                        <p>Lokasi: Aula Desa</p>
                    </li>
                    <li>
                        <p>Sep 02, 2022</p>
                        <p>Pemberian Vitamin A & B</p>
                        <p>Lokasi: Posyandu Cempaka</p>
                    </li>
                    <li>
                        <p>Jul 06, 2020</p>
                        <p>Musyawarah Desa Pembentukan BUMDes</p>
                        <p>Lokasi: Aula Desa</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end Berita Terkini dan Pengumuman -->

    <!-- Map Section -->
    <section class="map-section container mt-5">
        <h2>Lokasi Desa Bulak</h2>
        <div id="mapp">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40215.0512254856!2d108.29484755523632!3d-6.449452914454293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ec6e0217cc78f%3A0x401e8f1fc28cf70!2sJatibarang%2C%20Kec.%20Jatibarang%2C%20Kabupaten%20Indramayu%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1721282631653!5m2!1sid!2sid"
                width="100%" height="400" style="border: 2px solid #007bff; border-radius: 5px;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </section>
    <!-- end Map Section -->

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