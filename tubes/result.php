<?php
require('function.php');
require('partial/header.php');

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


<h1 class="bg-danger text-white p-2">Portal Informasi Indonesia</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./nasional.php">Nasional</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="asean.php">Asean</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ragam.php">ragam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="layanan.php">Layanan</a>
                </li>
            </ul>
            <form class="d-flex" action="result.php" method="get">
                <input class="form-control me-2" type="search" name="keyword" id="keyword" placeholder="cari.." autofocus autocomplete="off">
                <button class="btn btn-outline-success" type="submit" name="search" id="search-button">Search</button>
            </form>
        </div>
    </div>
</nav>

<div class="background-wrapper link-light">
    <h2 class="mt-5 ms-3">Search</h2>
    <a href="index.php" class="link-light ms-4">Beranda</a>
    <div class="layer"></div>
    <div class="background-image"></div>
</div>

<br>
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

<div class="pagination justify-content-center">
    <?php if ($currentPage > 1) : ?>
        <a href="result.php?page=<?= $currentPage - 1; ?>" class="page-link">&laquo; Halaman Sebelumnya</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
        <?php if ($i == $currentPage) : ?>
            <a href="result.php?page=<?= $i; ?>" class="page-link active"><?= $i; ?></a>
        <?php else : ?>
            <a href="result.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages) : ?>
        <a href="result.php?page=<?= $currentPage + 1; ?>" class="page-link">Halaman Selanjutnya &raquo;</a>
    <?php endif; ?>
</div>

<?php require('partial/footer.php'); ?>