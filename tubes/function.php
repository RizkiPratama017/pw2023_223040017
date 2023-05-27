<?php
if (!function_exists('koneksi')) {
    function koneksi()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tubes_pw";
        $conn = mysqli_connect('localhost', 'root', '', 'tubes_pw') or die('koneksi eror');
        return $conn;
    }
}
if (!function_exists('query')) {
    function query($query)
    {
        $conn = koneksi();
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
}
if (!function_exists('tambahnasional')) {
    function tambahnasional($judul, $gambar, $isi)
    {
        $conn = koneksi();

        $query = "INSERT INTO nasional (judul, gambar, isi) VALUES ('$judul', '$gambar', '$isi')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}
