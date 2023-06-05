<?php
require('function.php');
require('partial/header.php');
$name = 'Tambah Nasional';
//ketika tombol submit diklik

if (isset($_POST["tambah"])) {

    if (tambahnasional($_POST['judul'], $_POST['gambar'], $_POST['isi']) > 0) {
        echo " <script>
            alert('data berhasil ditambahkan');
        </script>";
        header("Location: dashboard.php");
    }
}


if (isset($_POST['judul']) && isset($_POST['gambar']) && isset($_POST['isi'])) {
    $judul = $_POST['judul'];
    $gambar = $_POST['gambar'];
    $text = $_POST['isi'];

    // Memanggil fungsi registrasi
    tambahnasional($judul, $gambar, $text);
} ?>

<h1>Tambah Berita Nasional</h1>


<form action="" method="post">
    <ul>
        <li>
            <label for="judul">Judul : </label>
            <input type="text" name="judul" id="judul">
        </li>
        <li>
            <label for="gambar">Gambar : </label>
            <input type="text" name="gambar" id="gambar">
        </li>
        <li>
            <label for="isi">Text : </label>
            <input type="text" name="isi" id="isi">
        </li>
        <li>
            <button type="submit" name="tambah">Tambah</button>
        </li>
    </ul>
</form>













<br><br><br><br><br><br><br><br>







<?php require('partial/footer.php'); ?>