<?php
session_start();



require('function.php');
require('partial/header.php');

$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $limit;

$nasional = query("SELECT * FROM nasional ORDER BY id_nasional DESC LIMIT $limit OFFSET $offset");

$total_rows = countRowsnas();
$total_pages = ceil($total_rows / $limit);

?>


<?php require('partial/nav.php') ?>

<div class="background-wrapper link-light">
    <h2 class="mt-5 ms-3"><a href="nasional.php" class="link-light">Nasional</a></h2>
    <a href="index.php" class="link-light ms-4">Beranda</a>
    <div class="layer"></div>
    <div class="background-image"></div>
</div>

<br>

<div class="row d-flex justify-content-center">
    <?php foreach ($nasional as $nas) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" id="" style="width: 18rem;">
            <a href="berita.php?tipe=nasional&id=<?= $nas["id_nasional"]; ?>">
                <img src="img/<?= $nas["gambar"]; ?>" class="card-img-top" alt=".<?= $nas["judul"]; ?>">
            </a>
            <div class="card-body">
                <a href="berita.php?tipe=nasional&id=<?= $nas["id_nasional"]; ?>">
                    <h5 class="card-title"><?= $nas["judul"]; ?></h5>
                </a>
                <p class="card-text"><?= $nas["isi"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="pagination justify-content-center">
    <?php if ($page > 1) : ?>
        <a href="nasional.php?page=<?= $page - 1; ?>" class="page-link">&laquo; Halaman Sebelumnya</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <?php if ($i == $page) : ?>
            <a href="nasional.php?page=<?= $i; ?>" class="page-link active"><?= $i; ?></a>
        <?php else : ?>
            <a href="nasional.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $total_pages) : ?>
        <a href="nasional.php?page=<?= $page + 1; ?>" class="page-link">Halaman Selanjutnya &raquo;</a>
    <?php endif; ?>
</div>

<?php require('partial/footer.php') ?>