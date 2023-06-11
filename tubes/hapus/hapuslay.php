<?php
require('../function.php');

$id = $_GET["id"];

if (hapuslayanan($id) > 0) {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = '../layananadmin.php';
    </script>";
} else {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = '../layananadmin.php';
    </script>";
}
