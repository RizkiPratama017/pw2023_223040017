<?php require('partial/header.php'); ?>
<?php require('function.php'); ?>

<?php if (isset($_POST["register"])) {
    $nama_dpn = $_POST['nama_dpn'];
    $nama_blk = $_POST['nama_blk'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($pass !== $pass2) {
        echo "Password dan konfirmasi password tidak cocok.";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    if (isset($_POST["register"])) {

        if (registrasi($nama_dpn, $nama_blk, $username, $hashedPassword) > 0) {
            echo " <script>
                    alert('data berhasil ditambahkan');
                </script>";
        }
        header("Location: login.php");
        exit();
    }
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registrasi</title>
</head>

<body class="bg-light">
    <div class="register w-75 position-absolute top-50 start-50 translate-middle bg-white">
        <form class="row g-3 " action="" method="POST">
            <h2>Registrasi</h2>
            <div class="col-md-6">
                <label for="nama_dpn" class="form-label">Nama Depan</label>
                <input type="text" name="nama_dpn" class="form-control" id="nama_dpn">
            </div>
            <div class="col-md-6">
                <label for="nama_blk" class="form-label">Nama Belakang</label>
                <input type="text" name="nama_blk" class="form-control" id="nama_blk">
            </div>
            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="col-12">
                <label for="pass" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="pass">
            </div>
            <div class="col-12">
                <label for="pass2" class="form-label">Konfirmasi Password</label>
                <input type="password" name="pass2" class="form-control" id="pass2">
            </div>
            <div class="col-12">
                <button type="submit" name="register" class="btn btn-primary">Daftar</button>
            </div>
        </form>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>