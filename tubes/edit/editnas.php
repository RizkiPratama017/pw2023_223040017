<?php
require('../function.php');
require('../partial/header.php');

//ketika tombol submit diklik
$id = $_GET["id"];

$editnas = query("SELECT * FROM nasional WHERE id_nasional = $id")[0];

if (isset($_POST["tambah"])) {

    if (editnas($editnas['id_nasional'], $_POST['judul'], $_POST['gambar'], $_POST['isi']) > 0) {
        echo " <script>
            alert('data berhasil diedit');
        </script>";
        header("Location: ../dashboard.php");
    }
}

if (isset($_POST['judul']) && isset($_POST['gambar']) && isset($_POST['isi'])) {
    $id = $editnas["id_nasional"];
    $judul = htmlspecialchars($_POST['judul']);
    $gambar = htmlspecialchars($_POST['gambar']);
    $text = htmlspecialchars($_POST['isi']);

    // Memanggil fungsi editnas
    editnas($id, $judul, $gambar, $text);
}


?>


<h1>Edit Berita Nasional</h1>


<form action="" method="post">
    <input type="hidden" name="id" value="<?= $editnas["id_nasional"]; ?>">
    <ul>
        <li>
            <label for="judul">Judul : </label>
            <input type="text" name="judul" id="judul" value="<?= $editnas["judul"]; ?>">
        </li>
        <li>
            <label for="gambar">Gambar : </label>
            <input type="text" name="gambar" id="gambar" value="<?= $editnas["gambar"]; ?>">
        </li>
        <li>
            <label for="isi">Text : </label>
            <input type="text" name="isi" id="isi" class="form-control" value="<?= $editnas["isi"]; ?>">
        </li>
        <li>
            <button type="submit" name="tambah">Edit</button>
        </li>
    </ul>
</form>













<br><br><br><br><br><br><br><br>