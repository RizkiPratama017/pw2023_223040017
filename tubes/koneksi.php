<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tubes_pw';
$con = mysqli_connect($hostname, $username, $password, $dbname);



function registrasi($data)
{
    global $con;
    $nama_dpn = stripslashes($data["nama_dpn"]);
    $nama_blk = stripslashes($data["nama_blk"]);
    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);


    // confirm
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi Password tidak sama');
        </script>";
        return false;
    }

    //enkripsi

    $password = password_hash($password, PASSWORD_DEFAULT);


    mysqli_query($con, "INSERT INTO admin VALUES ('','$username','$password','$nama_dpn','$nama_blk')");

    return mysqli_affected_rows($con);
}
