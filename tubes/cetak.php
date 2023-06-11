<?php
require 'vendor/autoload.php'; // Atur autoload untuk MPDF

$host = 'localhost';
$dbname = 'tubes_pw';
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Mengambil data berita nasional
$queryNasional = $dbh->query("SELECT * FROM nasional")->fetchAll(PDO::FETCH_ASSOC);

// Mengambil data berita asean
$queryAsean = $dbh->query("SELECT * FROM asean")->fetchAll(PDO::FETCH_ASSOC);

// Mengambil data berita ragam
$queryRagam = $dbh->query("SELECT * FROM ragam")->fetchAll(PDO::FETCH_ASSOC);

// Mengambil data berita layanan
$queryLayanan = $dbh->query("SELECT * FROM layanan")->fetchAll(PDO::FETCH_ASSOC);

// Membuat tampilan cetak PDF menggunakan MPDF
// ...

// Membuat tampilan  cetak PDF menggunakan MPDF
$mpdf = new \Mpdf\Mpdf();

$html = '
    <h2 class="mt-5 ms-3"> <a href="nasional.php">📰 Nasional</a></h2>
    <!-- Kode HTML untuk tampilan berita nasional -->
';
foreach ($queryNasional as $nas) {
    $gambarNasional = 'img/' . $nas["gambar"]; // Ubah path gambar
    $html .= '<img src="' . $gambarNasional . '" alt="Gambar Nasional">';
    $html .= '<h5>' . $nas["judul"] . '</h5>';
    $html .= '<p>' . $nas["isi"] . '</p>';
}

$html .= '
    <div class="asean">
        <h2 class="mt-5 ms-3"> <a href="asean.php">📰 Asean 2023</a></h2>
        <!-- Kode HTML untuk tampilan berita asean -->
';
foreach ($queryAsean as $sea) {
    $gambarAsean = 'img/' . $sea["gambar"]; // Ubah path gambar
    $html .= '<img src="' . $gambarAsean . '" alt="Gambar Asean">';
    $html .= '<h5>' . $sea["judul"] . '</h5>';
    $html .= '<p>' . $sea["isi"] . '</p>';
}

$html .= '
    </div>

    <h2 class="mt-5 ms-3"> <a href="ragam.php">🧭 Ragam</a></h2>
    <!-- Kode HTML untuk tampilan berita ragam -->
';
foreach ($queryRagam as $rag) {
    $gambarRagam = 'img/' . $rag["gambar"]; // Ubah path gambar
    $html .= '<img src="' . $gambarRagam . '" alt="Gambar Ragam">';
    $html .= '<h5>' . $rag["judul"] . '</h5>';
    $html .= '<p>' . $rag["isi"] . '</p>';
}

$html .= '
    <h2 class="mt-5 ms-3"> <a href="layanan.php">🫱🏻‍🫲🏻 Layanan</a></h2>
    <!-- Kode HTML untuk tampilan berita layanan -->
';
foreach ($queryLayanan as $lay) {
    $gambarLayanan = 'img/' . $lay["gambar"]; // Ubah path gambar
    $html .= '<img src="' . $gambarLayanan . '" alt="Gambar Layanan">';
    $html .= '<h5>' . $lay["judul"] . '</h5>';
    $html .= '<p>' . $lay["isi"] . '</p>';
}


$mpdf->WriteHTML($html);
$mpdf->Output('cetak.pdf', \Mpdf\Output\Destination::INLINE);
