<?php
session_start();

// Lakukan pengecekan apakah pengguna sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php"); // Arahkan ke halaman indeks jika bukan admin
    exit;
}

require('../function.php');

$id = $_GET["id"];

if (hapusnasional($id) > 0) {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = '../nasionaladmin.php';
    </script>";
} else {
    echo "<script>alert('data berhasil dihapus');
    document.location.href = '../nasionaladmin.php';
    </script>";
}
