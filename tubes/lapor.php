<?php
session_start();

// Lakukan pengecekan apakah pengguna sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

require('partial/header.php');
require('partial/nav.php');
require('function.php');
$username = $_SESSION['username'];
$role = $_SESSION['role'];

$profile = query("SELECT * FROM user WHERE username = '$username'");

if (count($profile) === 1) {
    $namaDepan = $profile[0]['nama_dpn'];
    $namaBelakang = $profile[0]['nama_blk'];
    $gambar = $profile[0]['gambar'];
} else {
    $namaDepan = 'Nama Depan tidak tersedia';
    $namaBelakang = 'Nama Belakang tidak tersedia';
    $gambar = 'img/nophoto.jpg';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $laporan = $_POST['laporan'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $id_user = $_SESSION['id_user'];

    if (tambahLaporan($laporan, $alamat, $email, $id_user)) {
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Terjadi kesalahan saat mengirim laporan.</div>";
    }
}
?>

<div class="container">
    <h1>Laporan</h1>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="laporan" class="form-label">Laporan</label>
            <textarea class="form-control" id="laporan" name="laporan" required></textarea>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
<br><br>

<?php require('partial/footer.php') ?>