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
function upload()
{
    $nama_file = $_FILES['gambar']['name'];
    $tipe_file = $_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    if ($error == 4) {
        echo "<script>
            alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));

    if (!in_array($ekstensi_file, $daftar_gambar)) {
        // echo "<script>
        //     alert('File yang Anda pilih bukan gambar');
        // </script>";
        return 'nophoto.jpg';
    }

    // Cek tipe file
    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
        echo "<script>
            alert('File yang Anda pilih bukan gambar');
        </script>";
        return false;
    }

    // Cek ukuran file
    if ($ukuran_file > 5000000) {
        echo "<script>
            alert('Ukuran file terlalu besar');
        </script>";
        return false;
    }

    // Generate nama file baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;

    // Upload file
    move_uploaded_file($tmp_file, '../img/' . $nama_file_baru);

    return $nama_file_baru;
}

if (!function_exists('tambahnasional')) {
    function tambahnasional($judul, $gambar, $isi, $hal)
    {
        $conn = koneksi();

        $query = "INSERT INTO nasional (judul, gambar, isi, halaman) VALUES ('$judul', '$gambar', '$isi', '$hal')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}

if (!function_exists('tambahasean')) {
    function tambahasean($judul, $gambar, $isi, $hal)
    {
        $conn = koneksi();

        $query = "INSERT INTO asean (judul, gambar, isi, halaman) VALUES ('$judul', '$gambar', '$isi', '$hal')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}
if (!function_exists('tambahragam')) {
    function tambahragam($judul, $gambar, $isi, $hal)
    {
        $conn = koneksi();

        $query = "INSERT INTO ragam (judul, gambar, isi, halaman) VALUES ('$judul', '$gambar', '$isi', '$hal')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}
if (!function_exists('tambahlayanan')) {
    function tambahlayanan($judul, $gambar, $isi, $hal)
    {
        $conn = koneksi();

        $query = "INSERT INTO layanan (judul, gambar, isi, halaman) VALUES ('$judul', '$gambar', '$isi', '$hal')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}

if (!function_exists('hapusnasional')) {
    function hapusnasional($id)
    {
        $conn = koneksi();

        //hapus gambar
        $hapus = query("SELECT * FROM nasional WHERE id_nasional = $id");
        if ($hapus['gambar'] != 'nophoto.jpg') {
            unlink(('img/' . $hapus['gambar']));
        }

        mysqli_query($conn, "DELETE FROM nasional WHERE id_nasional = $id");

        return mysqli_affected_rows($conn);
    }
}
if (!function_exists('hapusasean')) {
    function hapusasean($id)
    {
        $conn = koneksi();

        //hapus gambar
        $hapus = query("SELECT * FROM asean WHERE id_asean = $id");
        if ($hapus['gambar'] != 'nophoto.jpg') {
            unlink(('img/' . $hapus['gambar']));
        }


        mysqli_query($conn, "DELETE FROM asean WHERE id_asean = $id");

        return mysqli_affected_rows($conn);
    }
}
if (!function_exists('hapusragam')) {
    function hapusragam($id)
    {
        $conn = koneksi();

        //hapus gambar
        $hapus = query("SELECT * FROM ragam WHERE id_ragam = $id");
        if ($hapus['gambar'] != 'nophoto.jpg') {
            unlink(('img/' . $hapus['gambar']));
        }

        mysqli_query($conn, "DELETE FROM ragam WHERE id_ragam = $id");

        return mysqli_affected_rows($conn);
    }
}
if (!function_exists('hapuslayanan')) {
    function hapuslayanan($id)
    {
        $conn = koneksi();

        //hapus gambar
        $hapus = query("SELECT * FROM layanan WHERE id_layanan = $id");
        if ($hapus['gambar'] != 'nophoto.jpg') {
            unlink(('img/' . $hapus['gambar']));
        }


        mysqli_query($conn, "DELETE FROM layanan WHERE id_layanan = $id");

        return mysqli_affected_rows($conn);
    }
}
if (!function_exists('editnas')) {
    function editnas($id, $judul, $gambar, $isi, $hal)
    {
        $conn = koneksi();

        $query = "UPDATE nasional SET 
            judul = '$judul',
            gambar = '$gambar',
            isi = '$isi',
            halaman = '$hal'
            WHERE id_nasional = '$id'
            ";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}
if (!function_exists('editsea')) {
    function editsea($id, $judul, $gambar, $isi, $hal)
    {
        $conn = koneksi();

        $query = "UPDATE asean SET 
            judul = '$judul',
            gambar = '$gambar',
            isi = '$isi',
            halaman = '$hal'
            WHERE id_asean = '$id'
            ";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}
if (!function_exists('editrag')) {
    function editrag($id, $judul, $gambar, $isi, $hal)
    {
        $conn = koneksi();

        $query = "UPDATE ragam SET 
            judul = '$judul',
            gambar = '$gambar',
            isi = '$isi',
            halaman = '$hal'
            WHERE id_ragam = '$id'
            ";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}
if (!function_exists('editlay')) {
    function editlay($id, $judul, $gambar, $isi, $hal)
    {
        $conn = koneksi();

        $query = "UPDATE layanan SET 
            judul = '$judul',
            gambar = '$gambar',
            isi = '$isi',
            halaman = '$hal'
            WHERE id_layanan = '$id'
            ";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}



if (!function_exists('registrasi')) {
    function registrasi($nama_dpn, $nama_blk, $username, $password)
    {
        $conn = koneksi();

        $query = "INSERT INTO admin (nama_dpn, nama_blk, username, pass) VALUES ('$nama_dpn', '$nama_blk', '$username', '$password')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}
function countRows()
{
    $conn = koneksi();
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM nasional
    UNION SELECT COUNT(*) AS total_rows FROM asean
    UNION SELECT COUNT(*) AS total_rows FROM ragam
    UNION SELECT COUNT(*) AS total_rows FROM layanan");
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}
function countRowsnas()
{
    $conn = koneksi();
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM nasional");
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}
function countRowssea()
{
    $conn = koneksi();
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM asean");
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}
function countRowsrag()
{
    $conn = koneksi();
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM ragam");
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}
function countRowslay()
{
    $conn = koneksi();
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM layanan");
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}
