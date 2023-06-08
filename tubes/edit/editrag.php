<?php
require('../function.php');
require('../partial/header.php');

//ketika tombol submit diklik
$id = $_GET["id"];

$editrag = query("SELECT * FROM ragam WHERE id_ragam = $id")[0];

if (isset($_POST["tambah"])) {

    if (editnas($editnas['id_ragam'], $_POST['judul'], $_POST['gambar'], $_POST['isi'], $_POST['halaman']) > 0) {
        echo " <script>
            alert('data berhasil diedit');
        </script>";
        header("Location: ../dashboard.php");
    }
}

if (isset($_POST['judul']) && isset($_POST['gambar']) && isset($_POST['isi']) && isset($_POST['halaman'])) {
    $id = $editrag["id_ragam"];
    $judul = htmlspecialchars($_POST['judul']);
    $gambar = htmlspecialchars($_POST['gambar']);
    $isi = htmlspecialchars($_POST['isi']);
    $hal = htmlspecialchars($_POST['halaman']);

    // Memanggil fungsi editnas
    editnas($id, $judul, $gambar, $isi, $hal);
}


?>




<div class="continer-md d-flex justify-content-center lign-items-center mt-5">
    <form action="" method="post">
        <h1>Edit Berita Ragam</h1>
        <input type="hidden" name="id" value="<?= $editrag["id_ragam"]; ?>">

        <div class="form-group">
            <label for="judul">Judul : </label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?= $editrag["judul"]; ?>">
        </div>
        <div class="form-group">
            <label for="gambar" class="form-label">Gambar : </label>
            <input type="text" name="gambar" id="gambar" class="form-control" value="<?= $editrag["gambar"]; ?>">
        </div>
        <div class="form-group">
            <label for="isi" class="form-label">Text : </label>
            <input type="text" name="isi" id="isi" class="form-control" value="<?= $editrag["isi"]; ?>">
        </div>
        <div class="form-group">
            <label for="halaman" class="form-label">isi : </label>
            <input type="text" name="halaman" id="halaman" class="form-control" value="<?= $editrag["halaman"]; ?>">
        </div>
        <div>
            <button type="submit" name="tambah">Edit</button>
        </div>
    </form>
</div>