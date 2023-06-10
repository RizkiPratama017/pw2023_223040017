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

    $query = "SELECT *, CONCAT('nasional-', id_nasional) AS id, 'nasional' AS tipe FROM nasional WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION ALL SELECT *, CONCAT('asean-', id_asean) AS id, 'asean' AS tipe FROM asean WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION ALL SELECT *, CONCAT('ragam-', id_ragam) AS id, 'ragam' AS tipe FROM ragam WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    UNION ALL SELECT *, CONCAT('layanan-', id_layanan) AS id, 'layanan' AS tipe FROM layanan WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'
    LIMIT $limit OFFSET $offset";
    $hasil = query($query);
} else {
    $hasil = [];
}

$totalPages = isset($totalPages) ? $totalPages : 1;
$currentPage = isset($currentPage) ? $currentPage : 1;
?>

<div id="search-container">
    <?php if (!empty($hasil)) : ?>
        <div class="row d-flex justify-content-center">
            <?php foreach ($hasil as $has) : ?>
                <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                    <a href="./beritaadmin2.php?tipe=<?= $has['tipe'] ?>&id=<?= $has['id']; ?>">
                        <img src="../img/<?= $has["gambar"]; ?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="./beritaadmin2.php?tipe=<?= $has['tipe'] ?>&id=<?= $has['id']; ?>">
                            <h5 class="card-title"><?= $has["judul"]; ?></h5>
                        </a>
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

<div class="pagination justify-content-center">
    <?php if ($currentPage > 1) : ?>
        <a href="searchadmin.php?page=<?= $currentPage - 1; ?>" class="page-link">&laquo; Previous Page</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
        <?php if ($i == $currentPage) : ?>
            <a href="searchadmin.php?page=<?= $i; ?>" class="page-link active"><?= $i; ?></a>
        <?php else : ?>
            <a href="search.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages) : ?>
        <a href="searchadmin.php?page=<?= $currentPage + 1; ?>" class="page-link">Next Page &raquo;</a>
    <?php endif; ?>
</div>

<?php require('../partial/footer.php'); ?>