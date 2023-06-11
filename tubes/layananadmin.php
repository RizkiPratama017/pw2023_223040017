<?php
session_start();

// Lakukan pengecekan apakah pengguna sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

require('function.php');
require('partial/header.php');
$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $limit;

$layanan = query("SELECT * FROM layanan ORDER BY id_layanan DESC LIMIT $limit OFFSET $offset");

$total_rows = countRowsnas();
$totalpage = ceil($total_rows / $limit);


?>


<?php require('partial/navadmin.php') ?>

<div class="background-wrapper link-light">
    <h2 class="mt-5 ms-3"><a href="layananadmin.php" class="link-light">layanan</a></h2>
    <a href="dashboard.php" class="link-light ms-4">Beranda</a>
    <div class="layer"></div>
    <div class="background-image"></div>
</div>


<br>

<div class="row  d-flex justify-content-center ">
    <?php foreach ($layanan as $lay) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="img/<?= $lay["gambar"]; ?>" class="card-img-top" alt="<?= $lay["judul"]; ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $lay["judul"]; ?></h5>
                <p class="card-text"> <?= $lay["isi"]; ?></p>
                <a href="edit/editlay.php?id=<?= $lay["id_layanan"]; ?>">edit |</a>
                <a href="hapus/hapuslay.php?id=<?= $lay["id_layanan"]; ?>" onclick="return confirm('yakin akan dihapus');">| hapus</a>

            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="pagination justify-content-center">
    <?php if ($page > 1) : ?>
        <a href="layananadmin.php?page=<?= $page - 1; ?>" class="page-link">&laquo; Halaman Sebelumnya</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalpage; $i++) : ?>
        <?php if ($i == $page) : ?>
            <a href="layananadmin.php?page=<?= $i; ?>" class="page-link active"><?= $i; ?></a>
        <?php else : ?>
            <a href="layananadmin.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $totalpage) : ?>
        <a href="layananadmin.php?page=<?= $page + 1; ?>" class="page-link">Halaman Selanjutnya &raquo;</a>
    <?php endif; ?>
</div>


<?php require('partial/footer.php') ?>