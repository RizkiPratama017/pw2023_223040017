<?php

session_start();



require('function.php');
require('partial/header.php');
$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $limit;

$layanan = query("SELECT * FROM layanan ORDER BY id_layanan DESC LIMIT $limit OFFSET $offset");

$total_rows = countRowslay();
$total_pages = ceil($total_rows / $limit);

?>

<?php require('partial/nav.php') ?>

<div class="background-wrapper link-light">
    <h2 class="mt-5 ms-3">Layanan</h2>
    <a href="index.php" class="link-light ms-4">Beranda</a>
    <div class="layer"></div>
    <div class="background-image"></div>
</div>

<br>

<div class="row  d-flex justify-content-center">
    <?php foreach ($layanan as $lay) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <a href="berita.php?tipe=layanan&id=<?= $lay["id_layanan"]; ?>">
                <img src="img/<?= $lay["gambar"]; ?>" class="card-img-top" alt="<?= $lay["judul"]; ?>">
            </a>
            <div class="card-body">
                <a href="berita.php?tipe=layanan&id=<?= $lay["id_layanan"]; ?>">
                    <h5 class="card-title"><?= $lay["judul"]; ?></h5>
                </a>
                <p class="card-text"><?= $lay["isi"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="pagination justify-content-center">
    <?php if ($page > 1) : ?>
        <a href="layanan.php?page=<?= $page - 1; ?>" class="page-link">&laquo; Halaman Sebelumnya</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <?php if ($i == $page) : ?>
            <a href="layanan.php?page=<?= $i; ?>" class="page-link active"><?= $i; ?></a>
        <?php else : ?>
            <a href="layanan.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $total_pages) : ?>
        <a href="layanan.php?page=<?= $page + 1; ?>" class="page-link">Halaman Selanjutnya &raquo;</a>
    <?php endif; ?>
</div>

<?php require('partial/footer.php') ?>