<?php
require('function.php');
require('partial/header.php');
require('partial/nav.php');

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM nasional WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION SELECT * FROM asean WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION SELECT * FROM ragam WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION SELECT * FROM layanan WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'";
    $hasil = query($query);
} else {
    $nasional = [];
}
?>

<div class="background-wrapper link-light">
    <h2 class="mt-5 ms-3">Search</h2>
    <a href="index.php" class="link-light ms-4">Beranda</a>
    <div class="layer"></div>
    <div class="background-image"></div>
</div>

<br>
<?php if (!empty($hasil)) : ?>
    <div class="row d-flex justify-content-center">
        <?php foreach ($hasil as $has) : ?>
            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                <img src="asset/img/<?= $has["gambar"]; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $has["judul"]; ?></h5>
                    <p class="card-text"><?= $has["isi"]; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="alert alert-danger" role="alert">
                Tidak ada data!!
            </div>
        </div>
    </div>
<?php endif; ?>

<?php require('partial/footer.php'); ?>