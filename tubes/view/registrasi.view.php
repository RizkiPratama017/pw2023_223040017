<?php
require('view/partial/header.php');

session_start();

require('function.php');
function register($namaDepan, $namaBelakang, $username, $password)
{
    $conn = koneksi();

    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username sudah digunakan";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO admin (nama_dpn, nama_blk, username, pass) VALUES ('$namaDepan', '$namaBelakang', '$username', '$hashedPassword')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['username'] = $username;
            header("Location: login.php");
            exit;
        } else {
            $error = "Gagal melakukan registrasi";
        }
    }

    mysqli_close($conn);

    return $error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaDepan = htmlspecialchars($_POST['namaDepan']);
    $namaBelakang = htmlspecialchars($_POST['namaBelakang']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $error = register($namaDepan, $namaBelakang, $username, $password);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <label for="namaDepan">Nama Depan:</label>
        <input type="text" name="namaDepan" id="namaDepan" required><br><br>
        <label for="namaBelakang">Nama Belakang:</label>
        <input type="text" name="namaBelakang" id="namaBelakang" required><br><br>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>