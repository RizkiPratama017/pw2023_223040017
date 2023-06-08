<?php
require('../function.php');
require('../partial/header.php');
$name = 'Tambah Asean';
//ketika tombol submit diklik

if (isset($_POST["tambah"])) {

    if (tambahlayanan($_POST['judul'], $_POST['gambar'], $_POST['isi'], $_POST['halaman']) > 0) {
        echo " <script>
            alert('data berhasil ditambahkan');
        </script>";
        header("Location: dashboard.php");
    }
}


if (isset($_POST['judul']) && isset($_POST['gambar']) && isset($_POST['isi']) && isset($_POST['halaman'])) {
    $judul = $_POST['judul'];
    $gambar = $_POST['gambar'];
    $isi = $_POST['isi'];
    $hal = $_POST['halaman'];

    tambahlayanan($judul, $gambar, $isi, $hal);
} ?>

<div class="continer-md d-flex justify-content-center lign-items-center mt-5">


    <form action="" method="post">
        <h1>Tambah Berita Layanan</h1>

        <div class="form-group">
            <label for="judul" class="form-label">Judul : </label>
            <input type="text" name="judul" id="judul" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="gambar" class="form-label">Gambar : </label>
            <input type="text" name="gambar" id="gambar" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="isi" class="form-label">Text : </label>
            <input type="text" name="isi" id="isi" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="halaman" class="form-label">Isi : </label>
            <input type="text" name="halaman" id="halaman" class="form-control" autocomplete="off">
        </div>
        <div class="form-group mt-2">
            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>