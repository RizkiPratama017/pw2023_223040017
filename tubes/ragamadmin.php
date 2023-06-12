<?php
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


require('function.php');
require('partial/header.php');
$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $limit;

$ragam = query("SELECT * FROM ragam ORDER BY id_ragam DESC LIMIT $limit OFFSET $offset");

$total_rows = countRowsrag();
$totalpage = ceil($total_rows / $limit);


?>


<?php require('partial/navadmin.php') ?>

<div class="background-wrapper link-light">
    <h2 class="mt-5 ms-3"><a href="ragamadmin.php" class="link-light">Ragam</a></h2>
    <a href="dashboard.php" class="link-light ms-4">Beranda</a>
    <div class="layer"></div>
    <div class="background-image"></div>
</div>


<br>

<div class="row  d-flex justify-content-center ">
    <?php foreach ($ragam as $rag) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <a href="beritaadmin.php?tipe=ragam&id=<?= $rag["id_ragam"]; ?>">
                <img src="img/<?= $rag["gambar"]; ?>" class="card-img-top" alt="<?= $rag["judul"]; ?>">
            </a>
            <div class="card-body">
                <a href="beritaadmin.php?tipe=ragam&id=<?= $rag["id_ragam"]; ?>">
                    <h5 class="card-title"><?= $rag["judul"]; ?></h5>
                </a>
                <p class="card-text"> <?= $rag["isi"]; ?></p>
                <a href="edit/editrag.php?id=<?= $rag["id_ragam"]; ?>">edit |</a>

                <a href="hapus/hapusrag.php?id=<?= $rag["id_ragam"]; ?>" onclick="return confirm('yakin akan dihapus');">| hapus</a>

            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="pagination justify-content-center">
    <?php if ($page > 1) : ?>
        <a href="ragamadmin.php?page=<?= $page - 1; ?>" class="page-link">&laquo; Halaman Sebelumnya</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalpage; $i++) : ?>
        <?php if ($i == $page) : ?>
            <a href="ragamadmin.php?page=<?= $i; ?>" class="page-link active"><?= $i; ?></a>
        <?php else : ?>
            <a href="ragamadmin.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $totalpage) : ?>
        <a href="ragamadmin.php?page=<?= $page + 1; ?>" class="page-link">Halaman Selanjutnya &raquo;</a>
    <?php endif; ?>
</div>


<?php require('partial/footer.php') ?>