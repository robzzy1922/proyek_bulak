<?php
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $job = $_POST['job'];
    $address = $_POST['address'];

    // Buat objek PDF
    $pdf = new TCPDF();
    $pdf->AddPage();

    // Set judul surat
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'SURAT KETERANGAN DOMISILI', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Nomor :470/ 516 /Des', 0, 1, 'C');
    $pdf->Ln(10);

    // Set konten surat
    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, "Yang bertanda tangan di bawah ini, Kuwu Desa Bulak Kecamatan Jatibarang Kabupaten Indramayu, menerangkan bahwa:", 0, 'L');
    $pdf->Ln(5);

    // Data pribadi
    $pdf->Cell(0, 10, "Nama              : $name", 0, 1);
    $pdf->Cell(0, 10, "Tempat, Tgl Lahir : $birthdate", 0, 1);
    $pdf->Cell(0, 10, "Jenis Kelamin     : $gender", 0, 1);
    $pdf->Cell(0, 10, "Agama             : $religion", 0, 1);
    $pdf->Cell(0, 10, "Pekerjaan         : $job", 0, 1);
    // Ubah Cell menjadi MultiCell untuk alamat
$pdf->MultiCell(0, 10, "Alamat            : $address", 0, 'L');
$pdf->Ln(5);

    // Konten lanjutan
    $pdf->MultiCell(0, 10, "Benar bahwa Nama tersebut di atas adalah warga Bulak Lor, yang 
    berdomisili di Blok Roma Rt 002 Rw 001 Desa Bulak Kecamatan Jatibarang 
    Kabupaten Indramayu.", 0, 'L');
    $pdf->Ln(5);
    $pdf->MultiCell(0, 10, "Demikian surat keterangan ini dibuat dengan sebenarnya dan dan dapat 
    dipergunakan sebagaimana mestinya.", 0, 'L');
    $pdf->Ln(20);

    // Tanda tangan
    $pdf->Cell(0, 10, "Bulak, " . date('d F Y'), 0, 1, 'R');
    $pdf->Cell(0, 10, "Kuwu Bulak,", 0, 1, 'R');
    $pdf->Ln(20);
    $pdf->Cell(0, 10, "ROBI PERMANA", 0, 1, 'R');

    // Simpan file PDF di server
    $file_path = __DIR__ . '/surat_keterangan_tinggal.pdf'; // Use absolute path
    $pdf->Output($file_path, 'F');

    // Redirect ke pdf.php dengan parameter download
    header("Location: pdf.php?download=$file_path");
    exit;
} else {
    echo "Invalid request method";
}