<?php
require('function.php');
$name = 'Tambah Nasional';
//ketika tombol submit diklik

if (isset($_POST["tambah"])) {

    if (tambahnasional($_POST['judul'], $_POST['gambar'], $_POST['isi']) > 0) {
        echo " <script>
            alert('data berhasil ditambahkan');
        </script>";
    }
}
require('view/tambahnasional.view.php');
