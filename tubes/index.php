<?php require('function.php');
$nasional = query("SELECT * From nasional ORDER BY id_nasional DESC LIMIT 4");
$asean = query("SELECT * From asean ORDER BY id_asean DESC LIMIT 4");
$ragam = query("SELECT * From ragam ORDER BY id_ragam DESC LIMIT 4");
$layanan = query("SELECT * From layanan ORDER BY id_layanan DESC LIMIT 4");



?>
<?php require('view/partial/header.php'); ?>
<?php require('view/partial/nav.php'); ?>
<!-- atas -->
<div id="carouselExampleCaptions m-2" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="asset/img/news1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Pembukaan KTT ke-42 ASEAN Resmi Dibuka</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="asset/img/news2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Sepeda Bambu Cendera Mata KTT ASEAN</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="asset/img/news3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Pemimpin Negara ASEAN Menikmati Labuan Bajo</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
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
            <img src="asset/img/<?= $nas["gambar"]; ?>" class="card-img-top" alt="<?= $nas["judul"]; ?>">
            <div class="card-body">
                <h5 class="card-title"><a href="#"><?= $nas["judul"]; ?></a></h5>
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
    <h2 class="mt-5 ms-3"> <a href="#">📰 Asean 2023</a></h2>

    <p class="ms-5 mb-3"> <span class="strip me-2">—</span>Siaran Pers ASEAN 2023 - Ragam ASEAN 2023 -
    </p>
    <div class="row d-flex justify-content-center">
        <?php foreach ($asean as $sea) : ?>
            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                <img src="asset/img/<?= $sea["gambar"]; ?>" class="card-img-top" alt="<?= $sea["judul"]; ?>">
                <div class="card-body">
                    <h5 class="card-title"><a href="#"><?= $sea["judul"]; ?></a></h5>
                    <p class="card-text"><?= $sea["isi"]; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="card-body text-end me-5">
        <a href="asean.php" class="card-link">Lihat Selengkapnya ></a>
    </div>
</div>

<h2 class="mt-5 ms-3"> <a href="#">🧭 Ragam</a></h2>

<p class="ms-5 mb-3"> <span class="strip me-2">—</span>Budaya - Seni - Keanekaragaman Hayati - Pariwisata - Komoditas - Kuliner
</p>
<div class="row d-flex justify-content-center">
    <?php foreach ($ragam as $rag) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/<?= $rag["gambar"]; ?>" class="card-img-top" alt="<?= $rag["judul"]; ?>">
            <div class="card-body">
                <h5 class="card-title"><a href="#"><?= $rag["judul"]; ?></a></h5>
                <p class="card-text"><?= $rag["isi"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="card-body text-end me-5">
    <a href="ragam.php" class="card-link">Lihat Selengkapnya ></a>
</div>

<h2 class="mt-5 ms-3"> <a href="#">🫱🏻‍🫲🏻 Layanan</a></h2>

<p class="ms-5 mb-3"> <span class="strip me-2">—</span>Pendidikan - Kesehatan - Keuangan - Kependudukan - Perdagangan - Investasi - Kepabeanan - Keimigrasian - Berita -
</p>
<<div class="row d-flex justify-content-center">
    <?php foreach ($layanan as $lay) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/<?= $lay["gambar"]; ?>" class="card-img-top" alt="<?= $lay["judul"]; ?>">
            <div class="card-body">
                <h5 class="card-title"><a href="#"><?= $lay["judul"]; ?></a></h5>
                <p class="card-text"><?= $lay["isi"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="card-body text-end me-5">
        <a href="layanan.php" class="card-link">Lihat Selengkapnya ></a>
    </div>
    <?php require('view/partial/footer.php') ?>