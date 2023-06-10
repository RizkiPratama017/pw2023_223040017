<?php
require('../function.php');
require('../partial/header.php');

//ketika tombol submit diklik
$id = $_GET["id"];

$editsea = query("SELECT * FROM asean WHERE id_asean = $id")[0];

if (isset($_POST["tambah"])) {

    if (editnas($editsea['id_asean'], $_POST['judul'], $_POST['gambar'], $_POST['isi'], $_POST['halaman']) > 0) {
        echo " <script>
            alert('data berhasil diedit');
        </script>";
        header("Location: ../dashboard.php");
    }
}

if (isset($_POST['judul']) && isset($_POST['gambar']) && isset($_POST['isi']) && isset($_POST['halaman'])) {
    $id = $editsea["id_asean"];
    $judul = htmlspecialchars($_POST['judul']);
    $gambar = htmlspecialchars($_POST['gambar']);
    $isi = htmlspecialchars($_POST['isi']);
    $hal = htmlspecialchars($_POST['halaman']);

    // Memanggil fungsi editnas
    editsea($id, $judul, $gambar, $isi, $hal);
}


?>




<div class="continer-md d-flex justify-content-center lign-items-center mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Edit Berita Asean</h1>
        <input type="hidden" name="id" value="<?= $editsea["id_asean"]; ?>">

        <div class="form-group">
            <label for="judul">Judul : </label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?= $editsea["judul"]; ?>">
        </div>
        <div class="form-group">
            <label for="gambar" class="form-label">Gambar : </label>
            <input type="file" name="gambar" id="gambar" class="form-control" onchange="previewImage()">
            <img src="../img/nophoto.jpg" width="120" class="img-preview d-blok" id="img-preview">
        </div>
        <div class="form-group">
            <label for="isi" class="form-label">Text : </label>
            <input type="text" name="isi" id="isi" class="form-control" value="<?= $editsea["isi"]; ?>">
        </div>
        <div class="form-group">
            <label for="halaman" class="form-label">isi : </label>
            <input type="text" name="halaman" id="halaman" class="form-control" value="<?= $editsea["halaman"]; ?>">
        </div>
        <div>
            <button type="submit" name="tambah">Edit</button>
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