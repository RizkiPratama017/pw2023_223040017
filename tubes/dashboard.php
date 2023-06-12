<?php
session_start();

// Lakukan pengecekan apakah pengguna sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php"); // Arahkan ke halaman indeks jika bukan admin
    exit;
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];


require('function.php');
require('partial/header.php');
$nasional = query("SELECT * From nasional ORDER BY id_nasional DESC LIMIT 2");
$asean = query("SELECT * From asean ORDER BY id_asean DESC LIMIT 2");
$ragam = query("SELECT * From ragam ORDER BY id_ragam DESC LIMIT 2");
$layanan = query("SELECT * From layanan ORDER BY id_layanan DESC LIMIT 2");


$profile = query("SELECT * FROM admin WHERE username = '$username'");


if (count($profile) === 1) {
    $namaDepan = $profile[0]['nama_dpn'];
    $namaBelakang = $profile[0]['nama_blk'];
    $gambar = $profile[0]['gambar'];
} else {

    $namaDepan = 'Nama Depan tidak tersedia';
    $namaBelakang = 'Nama Belakang tidak tersedia';
    $gambar = 'img/nophoto.jpg';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $username; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="tambah/tambahnasional.php">Tambah Nasional</a>
                        <a class="collapse-item" href="tambah/tambahasean.php">Tambah Asean</a>
                        <a class="collapse-item" href="tambah/tambahragam.php">Tambah Ragam</a>
                        <a class="collapse-item" href="tambah/tambahlayanan.php">Tambah Layanan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.php">Login</a>
                        <a class="collapse-item" href="tambah/registrasiadmin.php">Register</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="resultadmin.php" method="get">
                        <div class="input-group">
                            <input type="search" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" autofocus autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="search">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->

                        <?php  ?>
                        <li class="nav-item dropdown no-arrow p-0">
                            <a class="nav-link dropdown-toggle m-0" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?= $username; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profileadm.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row  d-flex justify-content-center ">
                        <h2>Nasional</h2>
                        <?php foreach ($nasional as $nas) : ?>
                            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                                <a href="beritaadmin.php?tipe=nasional&id=<?= $nas["id_nasional"]; ?>">
                                    <img src="img/<?= $nas["gambar"]; ?>" class="card-img-top" alt="<?= $nas["judul"]; ?>">
                                </a>
                                <div class="card-body">
                                    <a href="beritaadmin.php?tipe=nasional&id=<?= $nas["id_nasional"]; ?>">
                                        <h5 class="card-title"><?= $nas["judul"]; ?></h5>
                                    </a>
                                    <p class="card-text"><?= $nas["id_nasional"]; ?>. <?= $nas["isi"]; ?></p>
                                    <a href="edit/editnas.php?id=<?= $nas["id_nasional"]; ?>">edit |</a>
                                    <a href="hapus/hapusnas.php?id=<?= $nas["id_nasional"]; ?>" onclick="return confirm('yakin akan dihapus');">| hapus</a>
                                </div>

                            </div>
                        <?php endforeach; ?>
                        <div class="card-body text-end me-5">
                            <a href="nasionaladmin.php" class="card-link">Lihat Selengkapnya ></a>
                        </div>

                    </div>
                    <div class="row  d-flex justify-content-center ">
                        <h2>Asean</h2>
                        <?php foreach ($asean as $sea) : ?>
                            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                                <a href="beritaadmin.php?tipe=asean&id=<?= $sea["id_asean"]; ?>">
                                    <img src="img/<?= $sea["gambar"]; ?>" class="card-img-top" alt="<?= $sea["judul"]; ?>">
                                </a>
                                <div class="card-body">
                                    <a href="beritaadmin.php?tipe=asean&id=<?= $sea["id_asean"]; ?>">
                                        <h5 class="card-title"><?= $sea["judul"]; ?></h5>
                                    </a>
                                    <p class="card-text"><?= $sea["id_asean"]; ?>. <?= $sea["isi"]; ?></p>
                                    <a href="edit/editsea.php?id=<?= $sea["id_asean"]; ?>">edit |</a>

                                    <a href="hapus/hapussea.php?id=<?= $sea["id_asean"]; ?>" onclick="return confirm('yakin akan dihapus');">| hapus</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="card-body text-end me-5">
                            <a href="aseanadmin.php" class="card-link">Lihat Selengkapnya ></a>
                        </div>

                    </div>
                    <div class="row  d-flex justify-content-center ">
                        <h2>Ragam</h2>
                        <?php foreach ($ragam as $rag) : ?>
                            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                                <a href="beritaadmin.php?tipe=ragam&id=<?= $rag["id_ragam"]; ?>">
                                    <img src="img/<?= $rag["gambar"]; ?>" class="card-img-top" alt="<?= $rag["judul"]; ?>">
                                </a>
                                <div class="card-body">
                                    <a href="beritaadmin.php?tipe=ragam&id=<?= $rag["id_ragam"]; ?>">
                                        <h5 class="card-title"><?= $rag["judul"]; ?></h5>
                                    </a>
                                    <p class="card-text"><?= $rag["id_ragam"]; ?>. <?= $rag["isi"]; ?></p>
                                    <a href="edit/editrag.php?id=<?= $rag["id_ragam"]; ?>">edit |</a>

                                    <a href="hapus/hapusrag.php?id=<?= $rag["id_ragam"]; ?>" onclick="return confirm('yakin akan dihapus');">| hapus</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="card-body text-end me-5">
                            <a href="ragamadmin.php" class="card-link">Lihat Selengkapnya ></a>
                        </div>

                    </div>
                    <div class="row  d-flex justify-content-center ">
                        <h2>Layanan</h2>
                        <?php foreach ($layanan as $lay) : ?>
                            <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
                                <a href="beritaadmin.php?tipe=layanan&id=<?= $lay["id_layanan"]; ?>">
                                    <img src="img/<?= $lay["gambar"]; ?>" class="card-img-top" alt="<?= $lay["judul"]; ?>">
                                </a>
                                <div class="card-body">
                                    <a href="beritaadmin.php?tipe=layanan&id=<?= $lay["id_layanan"]; ?>">
                                        <h5 class="card-title"><?= $lay["judul"]; ?></h5>
                                    </a>
                                    <p class="card-text"><?= $lay["id_layanan"]; ?>. <?= $lay["isi"]; ?></p>
                                    <a href="edit/editlay.php?id=<?= $lay["id_layanan"]; ?>">edit |</a>
                                    <a href="hapus/hapuslay.php?id=<?= $lay["id_layanan"]; ?>" onclick="return confirm('yakin akan dihapus');">| hapus</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="card-body text-end me-5">
                            <a href="layananadmin.php" class="card-link">Lihat Selengkapnya ></a>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Indonesia 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>