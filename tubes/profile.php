<?php
session_start();

// Lakukan pengecekan apakah pengguna sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

require('partial/header.php');
require('function.php');

$username = $_SESSION['username'];
$role = $_SESSION['role'];


$profile = query("SELECT * FROM user WHERE username = '$username'");


if (count($profile) === 1) {
    $namaDepan = $profile[0]['nama_dpn'];
    $namaBelakang = $profile[0]['nama_blk'];
    $gambar = $profile[0]['gambar'];
} else {

    $namaDepan = 'Nama Depan tidak tersedia';
    $namaBelakang = 'Nama Belakang tidak tersedia';
    $gambar = 'img/nophoto.jpg';
}
?>

<?php require('partial/nav.php') ?>

<body>
    <div class="container py-5">
        <h1 class="mb-4">Profile</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>
                <?php foreach ($profile as $data) : ?>
                    <div class="mb-3">
                        <img src="img/<?php echo $gambar; ?>" alt="Profile Picture" class="img-thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" id="username" class="form-control" value="<?php echo $username; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role:</label>
                        <input type="text" id="role" class="form-control" value="<?php echo $role; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="namaDepan" class="form-label">Nama:</label>
                        <input type="text" id="namaDepan" class="form-control" value="<?= $data['nama_dpn']; ?> <?= $data['nama_blk']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="namaBelakang" class="form-label">Alamat:</label>
                        <input type="text" id="namaBelakang" class="form-control" value="<?= $data['alamat']; ?>" readonly>
                    </div>
                    <div><a href="edit/edituser.php?id=<?= $data['id_user']; ?>">edit</a></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>