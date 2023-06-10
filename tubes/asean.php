<?php
require('function.php');
require('partial/header.php');

$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$asean = query("SELECT * FROM asean ORDER BY id_asean DESC LIMIT $limit OFFSET $offset");

$total_rows = countRowsnas();
$total_pages = ceil($total_rows / $limit);
?>

<?php require('partial/nav.php'); ?>

<div class="background-wrapper link-light">
    <h2 class="mt-5 ms-3">asean</h2>
    <a href="index.php" class="link-light ms-4">Beranda</a>
    <div class="layer"></div>
    <div class="background-image"></div>
</div>

<br>

<div class="row d-flex justify-content-center">
    <?php foreach ($asean as $sea) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <a href="berita.php?tipe=asean&id=<?= $sea["id_asean"]; ?>">
                <img src="asset/img/<?= $sea["gambar"]; ?>" class="card-img-top" alt="<?= $sea["judul"]; ?>">
            </a>
            <div class="card-body">
                <a href="berita.php?tipe=asean&id=<?= $sea["id_asean"]; ?>">
                    <h5 class="card-title"><?= $sea["judul"]; ?></h5>
                </a>
                <p class="card-text"><?= $sea["isi"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="pagination justify-content-center">
    <?php if ($page > 1) : ?>
        <a href="asean.php?page=<?= $page - 1; ?>" class="page-link">&laquo; Halaman Sebelumnya</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <?php if ($i == $page) : ?>
            <a href="asean.php?page=<?= $i; ?>" class="page-link active"><?= $i; ?></a>
        <?php else : ?>
            <a href="asean.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $total_pages) : ?>
        <a href="asean.php?page=<?= $page + 1; ?>" class="page-link">Halaman Selanjutnya &raquo;</a>
    <?php endif; ?>
</div>

<?php require('partial/footer.php'); ?>