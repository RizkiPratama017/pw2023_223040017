<?php
session_start();

// Lakukan pengecekan apakah pengguna sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

require('../function.php');
require('../partial/header.php');
$name = 'Tambah Nasional';

// Ketika tombol submit diklik
if (isset($_POST["tambah"])) {
    $judul = htmlspecialchars($_POST['judul']);
    $isi = htmlspecialchars($_POST['isi']);
    $hal = htmlspecialchars_decode($_POST['halaman']);

    $gambar = upload();
    if (!$gambar) {
        echo "<script>
            alert('Terjadi kesalahan saat mengupload gambar');
            window.location.href = 'tambahnasional.php'; 
        </script>";
        exit;
    }

    if (tambahnasional($judul, $gambar, $isi, $hal) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            window.location.href = '../dashboard.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Data gagal ditambahkan');
            window.location.href = 'tambahnasional.php'; 
        </script>";
    }
}
?>

<div class="container-md d-flex justify-content-center align-items-center mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Tambah Berita Nasional</h1>
        <div class="form-group">
            <label for="judul" class="form-label">Judul:</label>
            <input type="text" name="judul" id="judul" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="gambar" class="form-label">Gambar:</label>
            <input type="file" name="gambar" id="gambar" class="gambar form-control" onchange="previewImage()">
            <img src="../img/nophoto.jpg" width="120" class="img-preview d-block" id="img-preview">
        </div>
        <div class="form-group">
            <label for="isi" class="form-label">Text:</label>
            <textarea type="text" name="isi" id="isi" class="form-control" autocomplete="off"></textarea>
        </div>
        <div class="form-group">
            <label for="halaman" class="form-label">Halaman:</label>
            <textarea type="text" name="halaman" id="halaman" class="form-control" autocomplete="off"></textarea>
        </div>
        <div class="form-group mt-2">
            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>

<script>
    function previewImage() {
        const gambar = document.querySelector("#gambar");
        const imgPreview = document.querySelector("#img-preview");

        if (gambar.files && gambar.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            };
            reader.readAsDataURL(gambar.files[0]);
        } else {
            imgPreview.src = "../img/nophoto.jpg";
        }
    }
</script>