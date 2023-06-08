<?php
require('../function.php');
require('../partial/header.php');

//ketika tombol submit diklik
$id = $_GET["id"];

$editlay = query("SELECT * FROM layanan WHERE id_layanan = $id")[0];

if (isset($_POST["tambah"])) {

    if (editnas($editlay['id_layanan'], $_POST['judul'], $_POST['gambar'], $_POST['isi'], $_POST['halaman']) > 0) {
        echo " <script>
            alert('data berhasil diedit');
        </script>";
        header("Location: ../dashboard.php");
    }
}

if (isset($_POST['judul']) && isset($_POST['gambar']) && isset($_POST['isi']) && isset($_POST['halaman'])) {
    $id = $editlay["id_layanan"];
    $judul = htmlspecialchars($_POST['judul']);
    $gambar = htmlspecialchars($_POST['gambar']);
    $isi = htmlspecialchars($_POST['isi']);
    $hal = htmlspecialchars($_POST['halaman']);

    // Memanggil fungsi editnas
    editlay($id, $judul, $gambar, $isi, $hal);
}


?>




<div class="continer-md d-flex justify-content-center lign-items-center mt-5">
    <form action="" method="post">
        <h1>Edit Berita Layanan</h1>
        <input type="hidden" name="id" value="<?= $editlay["id_lay"]; ?>">

        <div class="form-group">
            <label for="judul">Judul : </label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?= $editlay["judul"]; ?>">
        </div>
        <div class="form-group">
            <label for="gambar" class="form-label">Gambar : </label>
            <input type="text" name="gambar" id="gambar" class="form-control" value="<?= $editlay["gambar"]; ?>">
        </div>
        <div class="form-group">
            <label for="isi" class="form-label">Text : </label>
            <input type="text" name="isi" id="isi" class="form-control" value="<?= $editlay["isi"]; ?>">
        </div>
        <div class="form-group">
            <label for="halaman" class="form-label">isi : </label>
            <input type="text" name="halaman" id="halaman" class="form-control" value="<?= $editlay["halaman"]; ?>">
        </div>
        <div>
            <button type="submit" name="tambah">Edit</button>
        </div>
    </form>
</div>