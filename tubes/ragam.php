<?php require('function.php');
require('partial/header.php');
$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $limit;

$ragam = query("SELECT * FROM ragam ORDER BY id_ragam DESC LIMIT $limit OFFSET $offset");

$total_rows = countRowsnas();
$total_pages = ceil($total_rows / $limit);

?>

<?php require('partial/nav.php') ?>

<div class="background-wrapper link-light">
    <h2 class="mt-5 ms-3">Ragam</h2>
    <a href="index.php" class="link-light ms-4">Beranda</a>
    <div class="layer"></div>
    <div class="background-image"></div>
</div>


<br>

<div class="row  d-flex justify-content-center ">
    <?php foreach ($ragam as $rag) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/<?= $rag["gambar"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $rag["judul"]; ?></h5>
                <p class="card-text"><?= $rag["isi"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="pagination justify-content-center">
    <?php if ($page > 1) : ?>
        <a href="ragam.php?page=<?= $page - 1; ?>" class="page-link">&laquo; Halaman Sebelumnya</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalpages; $i++) : ?>
        <?php if ($i == $page) : ?>
            <a href="ragam.php?page=<?= $i; ?>" class="page-link active"><?= $i; ?></a>
        <?php else : ?>
            <a href="ragam.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $totalpages) : ?>
        <a href="ragam.php?page=<?= $page + 1; ?>" class="page-link">Halaman Selanjutnya &raquo;</a>
    <?php endif; ?>
</div>

<?php require('partial/footer.php') ?>