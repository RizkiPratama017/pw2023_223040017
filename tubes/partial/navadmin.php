<!-- NAVBAR -->
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
                    <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profiladmin.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nasionaladmin.php">Nasional</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aseanadmin.php">Asean</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ragamadmin.php">ragam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="layananadmin.php">Layanan</a>
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
                    <a class="nav-link" href="cetak.php">Cetak</a>
                </li>


            </ul>
            <form class="d-flex" action="resultadmin.php" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="cari.." autofocus autocomplete="off">
                <button class="btn btn-outline-success" type="submit" name="search">Search</button>
            </form>
        </div>
    </div>
</nav>