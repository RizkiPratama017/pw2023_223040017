<?php
require('../function.php');
require('../partial/header.php');

$limit = 12;

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];

    $countQuery = "SELECT COUNT(*) as total FROM nasional WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION SELECT COUNT(*) as total FROM asean WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION SELECT COUNT(*) as total FROM ragam WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION SELECT COUNT(*) as total FROM layanan WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'";
    $countResult = query($countQuery);
    $totalCount = 0;
    foreach ($countResult as $countRow) {
        $totalCount += $countRow['total'];
    }

    $totalPages = ceil($totalCount / $limit);

    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    $offset = ($currentPage - 1) * $limit;

    $query = "SELECT * FROM nasional WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION SELECT * FROM asean WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION SELECT * FROM ragam WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION SELECT * FROM layanan WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%' 
    LIMIT $limit OFFSET $offset";
    $hasil = query($query);
} else {
    $hasil = [];
}
?>


<div id="search-container">
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
</div>