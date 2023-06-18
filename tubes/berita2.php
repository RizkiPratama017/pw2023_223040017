<?php
session_start();



require('function.php');
require('partial/header.php');

if (isset($_GET['id']) && isset($_GET['tipe'])) {
    $id = $_GET['id'];
    $parts = explode('-', $id);
    $tipe = $parts[0];
    $id_berita = $parts[1];

    $query = "";
    $table = "";

    if ($tipe == 'nasional') {
        $query = "SELECT * FROM nasional WHERE id_nasional = $id_berita";
        $table = "nasional";
    } elseif ($tipe == 'asean') {
        $query = "SELECT * FROM asean WHERE id_asean = $id_berita";
        $table = "asean";
    } elseif ($tipe == 'ragam') {
        $query = "SELECT * FROM ragam WHERE id_ragam = $id_berita";
        $table = "ragam";
    } elseif ($tipe == 'layanan') {
        $query = "SELECT * FROM layanan WHERE id_layanan = $id_berita";
        $table = "layanan";
    }

    $hasil = query($query);
} else {
    $hasil = [];
}
?>

<?php require('partial/nav.php'); ?>

<br>
<div id="berita-container">
    <?php if (!empty($hasil)) : ?>
        <?php foreach ($hasil as $has) : ?>
            <div class="card mx-auto" style="max-width: 800px;">
                <img src="img/<?= $has["gambar"]; ?>" class="card-img-top" alt="<?= $has["judul"]; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $has["judul"]; ?></h5>
                    <p class="card-text"><?= $has["halaman"]; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="alert alert-danger" role="alert">
                    Tidak ada data!!
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<button class="btn btn-primary mt-3" onclick="goBack()">Kembali</button>

<?php require('partial/footer.php'); ?>