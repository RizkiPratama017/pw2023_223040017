<?php
require('../function.php');

$id = $_GET["id"];

if (hapusnasional($id) > 0) {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = '../nasionaladmin.php';
    </script>";
} else {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = 'nasionaladmin.php';
    </script>";
}
