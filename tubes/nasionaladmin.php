<?php require('function.php');
require('view/partial/header.php');
$nasional = query("SELECT * From nasional ORDER BY id_nasional DESC LIMIT 12");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .background-wrapper {
            position: relative;
            overflow: hidden;
            height: 190px;
            background: linear-gradient(to right, rgba(206, 17, 38, 1), rgba(206, 17, 38, 0.5));
        }

        .background-color {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 50%;
        }

        .background-image {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 50%;
            background-image: url("img/bg.png");
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            z-index: 1;

        }

        a {
            text-decoration: none;
        }
    </style>
    <title>Laman Indonesia</title>
</head>


<div class="background-wrapper link-light">
    <h2 class="mt-5 ms-3">Nasional</h2>
    <a href="dashboard.php" class="link-light ms-4">Beranda</a>
    <div class="layer"></div>
    <div class="background-image"></div>
</div>


<br>

<div class="row  d-flex justify-content-center ">
    <?php foreach ($nasional as $nas) : ?>
        <div class="card col-sm-12 col-md-6 col-lg-4 m-2" style="width: 18rem;">
            <img src="asset/img/<?= $nas["gambar"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $nas["judul"]; ?></h5>
                <p class="card-text"> <?= $nas["isi"]; ?></p>
                <a href="edit.php">edit</a>
                <br>
                <a href="hapusnas.php?id=<?= $nas["id_nasional"]; ?>" onclick="return confirm('yakin akan dihapus');">hapus</a>

            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require('view/partial/footer.php') ?>