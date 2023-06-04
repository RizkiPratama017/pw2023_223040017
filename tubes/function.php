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


if (!function_exists('registrasi')) {
    function registrasi($nama_dpn, $nama_blk, $username, $password)
    {
        $conn = koneksi();

        $query = "INSERT INTO admin (nama_dpn, nama_blk, username, pass) VALUES ('$nama_dpn', '$nama_blk', '$username', '$password')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}

// function hashPassword($password)
// {
//     return password_hash($password, PASSWORD_DEFAULT);
// }

// function verifyPassword($password, $hash)
// {
//     return password_verify($password, $hash);
// }
// function login($username, $password)
// {
//     $conn = koneksi();

//     $sql = "SELECT * FROM admin WHERE username = '$username'";
//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) == 1) {
//         $row = mysqli_fetch_assoc($result);
//         $hashedPassword = $row['pass'];

//         if (verifyPassword($password, $hashedPassword)) {
//             $_SESSION['username'] = $username;
//             header("Location: dashboard.php");
//         } else {
//             echo "Invalid password";
//         }
//     } else {
//         echo "Invalid username";
//     }

//     mysqli_close($conn);
// }
