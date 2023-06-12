<?
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

require('../partial/header.php');
require('../function.php');

function registerAdmin($namaDepan, $namaBelakang, $gambar, $username, $password)
{
    $conn = koneksi();

    // Periksa apakah username sudah digunakan
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username sudah digunakan";
    } else {
        // Upload gambar
        $gambarName = upload($gambar);

        if (!$gambarName) {
            $error = "Terjadi kesalahan saat mengupload gambar";
        } else {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert data admin ke database
            $sql = "INSERT INTO admin (nama_dpn, nama_blk, gambar, username, pass) VALUES ('$namaDepan', '$namaBelakang', '$gambarName', '$username', '$hashedPassword')";
            if (mysqli_query($conn, $sql)) {
                header("Location: ../login.php");
                exit;
            } else {
                $error = "Gagal melakukan registrasi";
            }
        }
    }

    mysqli_close($conn);

    return $error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gambar = $_FILES['gambar'];

    $error = registerAdmin($namaDepan, $namaBelakang, $gambar, $username, $password);
}
?>

<body>
    <div class="container-md d-flex justify-content-center align-items-center mt-5">
        <form method="POST" action="" enctype="multipart/form-data">
            <h2 class="header mb-4">Registrasi Admin</h2>
            <?php if (isset($error)) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
            <div class="form-group">
                <label for="namaDepan">Nama Depan:</label>
                <input type="text" name="namaDepan" id="namaDepan" required class="form-control m-2" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="namaBelakang" class="form-label">Nama Belakang:</label>
                <input type="text" name="namaBelakang" id="namaBelakang" required class="form-control m-2" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="gambar" class="form-label">Gambar:</label>
                <input type="file" name="gambar" id="gambar" class="form-control" onchange="previewImage()">
                <img src="../img/nophoto.jpg" width="120" class="img-preview d-blok m-2" id="img-preview">
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" required class="form-control m=2 m-2" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" required class="form-control m-2 " autocomplete="off">
            </div>
            <input type="submit" value="Register">
        </form>
    </div>
    <script>
        function previewImage() {
            const gambar = document.querySelector("#gambar");
            const imgPreview = document.querySelector("#img-preview");

            if (gambar.files && gambar.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                };
                reader.readAsDataURL(gambar.files[0]);
            } else {
                imgPreview.src = "img/nophoto.jpg";
            }
        }
    </script>
</body>

</html>