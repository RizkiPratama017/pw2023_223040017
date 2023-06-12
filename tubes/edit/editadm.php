<?php
session_start();

// Lakukan pengecekan apakah pengguna sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

require('../function.php');
require('../partial/header.php');

$id = $_GET["id"];
$editadm = query("SELECT * FROM admin WHERE id = $id")[0];

// Ketika tombol submit diklik
if (isset($_POST["tambah"])) {
    $id = $_POST['id'];
    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $gambar_lama = $_POST['gambar_lama'];

    $alamat = $_POST['alamat'];

    $gambar = upload();
    if (!$gambar) {
        echo "<script>
        alert('Data berhasil diedit');
        window.location.href = '../profile.php';
    </script>";
        return false;
    }

    if ($gambar == 'nophoto.jpg') {
        $gambar = $gambar_lama;
    }



    if (editadm($id, $namaDepan, $namaBelakang, $gambar, $alamat) > 0) {
        echo "<script>
            alert('Data berhasil diedit');
            window.location.href = '../profileadm.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Data gagal diedit');
            window.location.href = 'editadm.php?id=$id';
        </script>";
        exit;
    }
}
?>

<div class="container-md d-flex justify-content-center align-items-center mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Edit User</h1>
        <input type="hidden" name="id" value="<?= $editadm["id"]; ?>">

        <div class="form-group">
            <label for="namaDepan">Nama Depan:</label>
            <input type="text" name="namaDepan" id="namaDepan" class="form-control" value="<?= $editadm["nama_dpn"]; ?>">
        </div>
        <div class="form-group">
            <label for="namaBelakang">Nama Belakang:</label>
            <input type="text" name="namaBelakang" id="namaBelakang" class="form-control" value="<?= $editadm["nama_blk"]; ?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="gambar_lama" value="<?= $editadm['gambar']; ?>">
            <label for="gambar" class="form-label">Gambar:</label>
            <input type="file" name="gambar" id="gambar" class="form-control" onchange="previewImage()">
            <img src="../img/<?= $editadm['gambar']; ?>" width="120" class="img-preview d-block" id="img-preview">
        </div>
        <div>
            <button type="submit" name="tambah" class="btn btn-primary mt-2">Edit</button>
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