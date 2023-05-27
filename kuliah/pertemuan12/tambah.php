<?php
require('functions.php');
$name = 'Tambah Data Mahasiswa';
//ketika tombol submi diklik

if (isset($_POST["tambah"])) {
    tambah($_POST);

    if (tambah($_POST) > 0) {
        echo " <script>
            alert('data berhasil ditambahkan');
        </script>";
    }
}
require('views/tambah.view.php');
