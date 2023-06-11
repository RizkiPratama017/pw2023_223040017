<?php
require('../function.php');
require('../partial/header.php');

// Ketika tombol submit diklik
if (isset($_POST["tambah"])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $gambar_lama = $_POST['gambar_lama'];
    $isi = $_POST['isi'];
    $hal = htmlspecialchars($_POST['halaman']);
    $hal = htmlspecialchars_decode($hal);
    $hal = nl2br($hal);

    $gambar = upload();
    if (!$gambar) {
        echo "<script>
        alert('Data berhasil diedit');
        window.location.href = '../dashboard.php';
    </script>";
        return false;
    }

    if ($gambar == 'nophoto.jpg') {
        $gambar = $gambar_lama;
    }
    if (editnas($id, $judul, $gambar, $isi, $hal) > 0) {
        echo "<script>
            alert('Data berhasil diedit');
            window.location.href = '../nasionaladmin.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Data gagal diedit');
            window.location.href = 'editnas.php?id=$id';
        </script>";
        exit;
    }
}

$id = $_GET["id"];
$editnas = query("SELECT * FROM nasional WHERE id_nasional = $id")[0];

?>

<div class="container-md d-flex justify-content-center align-items-center mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Edit Berita Nasional</h1>
        <input type="hidden" name="id" value="<?= $editnas["id_nasional"]; ?>">

        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?= $editnas["judul"]; ?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="gambar_lama" value="<?= $editnas['gambar']; ?>">
            <label for="gambar" class="form-label">Gambar:</label>
            <input type="file" name="gambar" id="gambar" class="form-control" onchange="previewImage()">
            <img src="../img/<?= $editnas['gambar']; ?>" width="120" class="img-preview d-block" id="img-preview">
        </div>
        <div class="form-group">
            <label for="isi" class="form-label">Text:</label>
            <textarea name="isi" id="isi" class="form-control"><?= $editnas["isi"]; ?></textarea>
        </div>
        <div class="form-group">
            <label for="halaman" class="form-label">Halaman:</label>
            <textarea name="halaman" id="halaman" class="form-control"><?= $editnas["halaman"]; ?></textarea>
        </div>
        <div>
            <button type="submit" name="tambah" class="btn btn-primary">Edit</button>
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