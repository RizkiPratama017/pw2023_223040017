<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Laman Indonesia</title>
</head>

<body class style="background-color: #C0C0C0;">
    <h1 class="bg-danger text-white p-2">Portal Informasi Indonesia</h1>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
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
    <h2 class="mt-5 ms-3"> <a href="#">📰 Nasional</a></h2>

    <p class="ms-5 mb-3"> <span class="strip me-2">—</span>Agenda - Kuliner - Editorial - Indonesia Dalam Angka - Feature - Opini - Kabar G20 -
    </p>
    <div class="kartu row d-flex justify-content-center">
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional1.jpeg" class="card-img-top" alt="Banjir Peminat Membangun IKN">
            <div class="card-body">
                <h5 class="card-title"><a href="#">Banjir Peminat Membangun IKN</a></h5>
                <p class="card-text"> Sebanyak 200 investor menyerahkan surat minat investasi di IKN. Mereka adalah investor dari dalam...</p>
            </div>
        </div>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional2.jpeg" class="card-img-top" alt="Indonesia Tuntaskan Penanganan 1.841 Kasus Online Scams">
            <div class="card-body">
                <h5 class="card-title">Indonesia Tuntaskan Penanganan 1.841 Kasus Online Scams</h5>
                <p class="card-text">Pemerintah Indonesia terus melakukan penanganan terhadap kejahatan perdagangan manusia di bidang...</p>
            </div>
        </div>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional3.jpeg" class="card-img-top" alt="Otorita IKN Gandeng Siemens Bangun Kota Pintar">
            <div class="card-body">
                <h5 class="card-title">Otorita IKN Gandeng Siemens Bangun Kota Pintar
                </h5>
                <p class="card-text">Ibu Kota Negara Nusantara dibangun menjadi kota pintar yang menggunakan teknologi digital canggih,...

                </p>
            </div>
        </div>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional4.jpeg" class="card-img-top" alt="Mewujudkan Mimpi di HUT ke-78 RI">
            <div class="card-body">
                <h5 class="card-title">Mewujudkan Mimpi di HUT ke-78 RI</h5>
                <p class="card-text">Kereta cepat Jakarta-Bandung akan memasuki masa uji coba pada Mei 2023 dan beroperasi pada 18...</p>
            </div>
        </div>
        <div class="card-body text-end me-5">
            <a href="#" class="card-link">Lihat Selengkapnya ></a>
        </div>
    </div>

    <div class="asean ">
        <h2 class="mt-5 ms-3"> <a href="#">📰 Asean 2023</a></h2>

        <p class="ms-5 mb-3"> <span class="strip me-2">—</span>Siaran Pers ASEAN 2023 - Ragam ASEAN 2023 -
        </p>
        <div class="kartu row d-flex justify-content-center">
            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                <img src="asset/img/nasional1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                <img src="asset/img/nasional2.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                <img src="asset/img/nasional3.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                <img src="asset/img/nasional4.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card-body text-end me-5">
                <a href="#" class="card-link">Lihat Selengkapnya ></a>
            </div>
        </div>
    </div>

    <h2 class="mt-5 ms-3"> <a href="#">🧭 Ragam</a></h2>

    <p class="ms-5 mb-3"> <span class="strip me-2">—</span>Budaya - Seni - Keanekaragaman Hayati - Pariwisata - Komoditas - Kuliner
    </p>
    <div class="kartu row d-flex justify-content-center">
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional1.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional2.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional3.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional4.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card-body text-end me-5">
            <a href="#" class="card-link">Lihat Selengkapnya ></a>
        </div>
    </div>
    <h2 class="mt-5 ms-3"> <a href="#">🫱🏻‍🫲🏻 Layanan</a></h2>

    <p class="ms-5 mb-3"> <span class="strip me-2">—</span>Pendidikan - Kesehatan - Keuangan - Kependudukan - Perdagangan - Investasi - Kepabeanan - Keimigrasian - Berita -
    </p>
    <div class="kartu row d-flex justify-content-center">
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional1.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional2.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional3.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/nasional4.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card-body text-end me-5">
            <a href="#" class="card-link">Lihat Selengkapnya ></a>
        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-danger text-white">
        <div class="container">
            <span>Portal Informasi Indonesia © 2023</span>
            <span class="ikon float-end "><a href=""><img src="asset/ikon/fb.png" alt="facebook" class="footer-icon m-1"></a><a href=""><img src="asset/ikon/ig.png" alt="Instagram" class="footer-icon m-1"></a><a href=""><img src="asset/ikon/tw.png" alt="Twitter" class="footer-icon m-1"></a><a href=""><img src="asset/ikon/yt.png" alt="Youtube" class="footer-icon m-1"></a></span>

        </div>
    </footer>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>