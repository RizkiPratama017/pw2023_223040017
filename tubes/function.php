<?php
function registrasi($con, $data)
{
    require 'koneksi.php';
    $nama_dpn = $data['nama_dpn'];
    $nama_blk = $data['nama_blk'];
    $username = $data['username'];
    $password = mysqli_real_escape_string($con, $data['password']);
    $password2 = mysqli_real_escape_string($con, $data['password2']);

    // Konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi Password tidak sama');
        </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Eksekusi query
    $query = "INSERT INTO admin VALUES ('$nama_dpn', '$nama_blk', '$username', '$password')";
    print_r($query);
    $result = mysqli_query($con, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($con);
        return false;
    }

    return mysqli_affected_rows($con);
}
