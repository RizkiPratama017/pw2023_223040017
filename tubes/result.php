<?php
session_start();



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
                    <a class="nav-link" href="nasional.php">Nasional</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="asean.php">Asean</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ragam.php">Ragam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="layanan.php">Layanan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cetak.php" target="_blank">Cetak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lapor.php">Lapor!</a>
                </li>

            </ul>
            <form class="d-flex" action="result.php" method="get">
                <input class="form-control me-2" type="search" name="keyword" id="keyword" placeholder="Cari.." autofocus autocomplete="off">
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
                    <a href="berita2.php?tipe=<?= $has['tipe'] ?>&id=<?= $has['id']; ?>">
                        <img src="img/<?= $has["gambar"]; ?>" class="card-img-top" alt="<?= $has["judul"]; ?>">
                    </a>
                    <div class="card-body">
                        <a href="berita2.php?tipe=<?= $has['tipe'] ?>&id=<?= $has['id']; ?>">
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


<?php require('partial/footer.php'); ?>