<?php
if (isset($_POST['submit'])) {
    include 'koneksi.php';
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $cek = mysqli_query($con, "SELECT * FROM admin WHERE username = '" . $user . "' AND password = '" . $pass . "'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
        alert('Login Berhasil');
        </script>";
    } else {
        echo "<script>
        alert('Username atau Password anda salah !');
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>

</head>

<body class="bg-light">
    <div class="login w-50 position-absolute top-50 start-50 translate-middle bg-white ">
        <h2 class="text-center m-3">Login</h2>
        <form action="" method="post">
            <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-7">
                    <input type="text" name="user" class="form-control" id="username">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-7">
                    <input type="password" name="pass" class="form-control" id="password">
                </div>
            </div>
            <!-- <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                            Remember me
                        </label>
                    </div>
                </div>
            </div> -->
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>