<?php
require('../function.php');

$id = $_GET["id"];

if (hapusasean($id) > 0) {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = '../aseanaladmin.php';
    </script>";
} else {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = '../aseanadmin.php';
    </script>";
}
