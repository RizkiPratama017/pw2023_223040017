<?php require('function.php');
$nasionalup = query("SELECT * From nasional ORDER BY id_nasional DESC LIMIT 1");
$nasional = query("SELECT * From nasional ORDER BY id_nasional DESC LIMIT 4");
$aseanup = query("SELECT * From asean ORDER BY id_asean DESC LIMIT 1");
$asean = query("SELECT * From asean ORDER BY id_asean DESC LIMIT 4");
$ragamup = query("SELECT * From ragam ORDER BY id_ragam DESC LIMIT 1");
$ragam = query("SELECT * From ragam ORDER BY id_ragam DESC LIMIT 4");
$layananup = query("SELECT * From layanan ORDER BY id_layanan DESC LIMIT 1");
$layanan = query("SELECT * From layanan ORDER BY id_layanan DESC LIMIT 4");




?>
<?php require('partial/header.php'); ?>
<?php require('partial/nav.php'); ?>
<!-- atas -->

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <?php foreach ($nasionalup as $nasi) : ?>
            <div class="carousel-item active">
                <a href="berita.php?tipe=nasional&id=<?= $nasi["id_nasional"]; ?>">
                    <img src="img/<?= $nasi["gambar"]; ?>" class="w-100 h-50 " alt="<?= $nasi["judul"]; ?>">
                    <div class="carousel-caption d-md-block align-items-center">
                        <h4><?= $nasi["judul"]; ?></h4>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($aseanup as $sean) : ?>
            <div class="carousel-item">
                <a href="berita.php?tipe=asean&id=<?= $sean["id_asean"]; ?>">
                    <img src="img/<?= $sean["gambar"]; ?>" class="d-block w-100 h-50" alt="...">
                    <div class="carousel-caption d-none d-md-block align-items-center">
                        <h4><?= $sean["judul"]; ?></h4>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($ragamup as $raga) : ?>
            <div class="carousel-item">
                <a href="berita.php?tipe=ragam&id=<?= $raga["id_ragam"]; ?>">
                    <img src="img/<?= $raga["gambar"]; ?>" class="d-block w-100 h-50" alt="...">
                    <div class="carousel-caption d-none d-md-block align-items-center">
                        <h4><?= $raga["judul"]; ?></h4>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($layananup as $laya) : ?>
            <div class="carousel-item">
                <a href="berita.php?tipe=layanan&id=<?= $laya["id_layanan"]; ?>">
                    <img src="img/<?= $laya["gambar"]; ?>" class="d-block w-100 h-50" alt="...">
                    <div class="carousel-caption d-none d-md-block align-items-center">
                        <h4><?= $laya["judul"]; ?></h4>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- card -->
<h2 class="mt-5 ms-3"> <a href="nasional.php">📰 Nasional</a></h2>

<p class="ms-5 mb-3"> <span class="strip me-2">—</span>Agenda - Kuliner - Editorial - Indonesia Dalam Angka - Feature - Opini - Kabar G20 -
</p>

<div class="row d-flex justify-content-center">
    <?php foreach ($nasional as $nas) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <a href="berita.php?tipe=nasional&id=<?= $nas["id_nasional"]; ?>">
                <img src="img/<?= $nas["gambar"]; ?>" class="card-img-top" alt="<?= $nas["judul"]; ?>">
            </a>
            <div class="card-body">
                <a href="berita.php?tipe=nasional&id=<?= $nas["id_nasional"]; ?>">
                    <h5 class="card-title"><a href="berita.php?tipe=nasional&id=<?= $nas["id_nasional"]; ?>"><?= $nas["judul"]; ?></a></h5>
                </a>
                <p class="card-text"><?= $nas["isi"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="card-body text-end me-5">
    <a href="nasional.php" class="card-link">Lihat Selengkapnya ></a>
</div>
</div>

<div class="asean ">
    <h2 class="mt-5 ms-3"> <a href="asean.php">📰 Asean 2023</a></h2>

    <p class="ms-5 mb-3"> <span class="strip me-2">—</span>Siaran Pers ASEAN 2023 - Ragam ASEAN 2023 -
    </p>
    <div class="row d-flex justify-content-center">
        <?php foreach ($asean as $sea) : ?>
            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                <a href="berita.php?tipe=asean&id=<?= $sea["id_asean"]; ?>">
                    <img src="img/<?= $sea["gambar"]; ?>" class="card-img-top" alt="<?= $sea["judul"]; ?>">
                </a>
                <div class="card-body">
                    <a href="berita.php?tipe=asean&id=<?= $sea["id_asean"]; ?>">
                        <h5 class="card-title"><a href="berita.php?tipe=asean&id=<?= $sea["id_asean"]; ?>"><?= $sea["judul"]; ?></a></h5>
                    </a>
                    <p class="card-text"><?= $sea["isi"]; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="card-body text-end me-5">
        <a href="asean.php" class="card-link">Lihat Selengkapnya ></a>
    </div>
</div>

<h2 class="mt-5 ms-3"> <a href="ragam.php">🧭 Ragam</a></h2>

<p class="ms-5 mb-3"> <span class="strip me-2">—</span>Budaya - Seni - Keanekaragaman Hayati - Pariwisata - Komoditas - Kuliner
</p>
<div class="row d-flex justify-content-center">
    <?php foreach ($ragam as $rag) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <a href="berita.php?tipe=ragam&id=<?= $rag["id_ragam"]; ?>">
                <img src="img/<?= $rag["gambar"]; ?>" class="card-img-top" alt="<?= $rag["judul"]; ?>">
            </a>
            <div class="card-body">
                <a href="berita.php?tipe=ragam&id=<?= $rag["id_ragam"]; ?>">
                    <h5 class="card-title"><a href="berita.php?tipe=ragam&id=<?= $rag["id_ragam"]; ?>"><?= $rag["judul"]; ?></a></h5>
                </a>
                <p class="card-text"><?= $rag["isi"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="card-body text-end me-5">
    <a href="ragam.php" class="card-link">Lihat Selengkapnya ></a>
</div>

<h2 class="mt-5 ms-3"> <a href="layanan.php">🫱🏻‍🫲🏻 Layanan</a></h2>

<p class="ms-5 mb-3"> <span class="strip me-2">—</span>Pendidikan - Kesehatan - Keuangan - Kependudukan - Perdagangan - Investasi - Kepabeanan - Keimigrasian - Berita -
</p>
<<div class="row d-flex justify-content-center">
    <?php foreach ($layanan as $lay) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <a href="berita.php?tipe=layanan&id=<?= $lay["id_layanan"]; ?>">
                <img src="img/<?= $lay["gambar"]; ?>" class="card-img-top" alt="<?= $lay["judul"]; ?>">
            </a>
            <div class="card-body">
                <a href="berita.php?tipe=layanan&id=<?= $lay["id_layanan"]; ?>">
                    <h5 class="card-title"><a href="berita.php?tipe=layanan&id=<?= $lay["id_layanan"]; ?>"><?= $lay["judul"]; ?></a></h5>
                </a>
                <p class="card-text"><?= $lay["isi"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="card-body text-end me-5">
        <a href="layanan.php" class="card-link">Lihat Selengkapnya ></a>
    </div>
    <?php require('partial/footer.php') ?>