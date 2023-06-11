<?php
require('../function.php');

$id = $_GET["id"];

if (hapusragam($id) > 0) {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = '../ragamadmin.php';
    </script>";
} else {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = '../ragamadmin.php';
    </script>";
}
