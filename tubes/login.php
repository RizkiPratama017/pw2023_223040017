<?php
require('partial/header.php');
session_start();
require 'function.php';
//cek cookie 
if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = 'true';
    }
}
// Lakukan pengecekan apakah pengguna sudah login
if (isset($_SESSION['username']) || isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: dashboard.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}



function loginUser($username, $password)
{
    $conn = koneksi();

    // Cek apakah login sebagai user
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['pass'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user'; // set role sebagai user
            $_SESSION['login'] = 'true';


            //cek remember me

            if (isset($_POST['remember'])) {
                //buat cookie
                setcookie('login', 'true');
            }
            header("Location: index.php");
            exit;
        } else {
            $error = "Password salah";
        }
    } else {
        // Cek apakah login sebagai admin
        $sql = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['pass'];

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'admin'; // set role sebagai admin
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Password salah";
            }
        } else {
            $error = "Username tidak ditemukan";
        }
    }

    mysqli_close($conn);

    return $error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = loginUser($username, $password);
}
?>

<body>
    <div class="container-md d-flex justify-content-center align-items-center mt-5">
        <form method="POST" action="" enctype="multipart/form-data">
            <h2 class="header mb-4">Login</h2>
            <?php if (isset($error)) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
            <div class="form-group">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" required class="form-control m=2 m-2" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" required class="form-control m-2 " autocomplete="off">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="remember" id="remember" checked>
                <label class="form-check-label" for="remember">
                    Remember me:
                </label>
            </div>

            <input type="submit" value="Login">
            <p class="pa mt-3"> <a href="tambah/registrasiuser.php">Registrasi User</a></p>
            <!-- | <a href="tambah/registrasiadmin.php">Registrasi Admin</a> -->
        </form>
    </div>
</body>

</html>