<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tugas 5a</title>
</head>

<body>
    <?php
    $mahasiswa = [
        [
            "nama" => "Rizki Pratama",
            "nrp" => 223040017,
            "jurusan" => "Teknik Informatika",
            "email" => "rizki@gmail.com",
            "gambar" => "rizki.png"
        ],
        [

            "nama" => "Ahmad Mulia Huda",
            "nrp" => 223040029,
            "jurusan" => "Teknik Informatika",
            "email" => "ahmad@gmail.com",
            "gambar" => "ahmad.png"
        ],
        [

            "nama" => "Akbar Nur Iman",
            "nrp" => 223040028,
            "jurusan" => "Teknik Informatika",
            "email" => "akbar@gmail.com",
            "gambar" => "akbar.png"
        ],
        [

            "nama" => "Ali Imran Rodja",
            "nrp" => 223040003,
            "jurusan" => "Teknik Informatika",
            "email" => "ali@gmail.com",
            "gambar" => "ali.png"
        ],
        [

            "nama" => "Alvin Abdul sahab",
            "nrp" => 223040026,
            "jurusan" => "Teknik Informatika",
            "email" => "alvin@gmail.com",
            "gambar" => "alvin.png"
        ],
        [

            "nama" => "Bhadrika Aryaputra Hermawan",
            "nrp" => 223040018,
            "jurusan" => "Teknik Informatika",
            "email" => "bhadrika@gmail.com",
            "gambar" => "bhadrika.png"
        ],
        [

            "nama" => "Bintang Arya Putra Yusar",
            "nrp" => 223040032,
            "jurusan" => "Teknik Informatika",
            "email" => "bintang@gmail.com",
            "gambar" => "bintang.png"
        ],
        [

            "nama" => "Diaz Alfiari Rachmad",
            "nrp" => 223040024,
            "jurusan" => "Teknik Informatika",
            "email" => "diaz@gmail.com",
            "gambar" => "diaz.png"
        ],
        [

            "nama" => "Dimas Nanda Herlambang",
            "nrp" => 193040040,
            "jurusan" => "Teknik Informatika",
            "email" => "dimas@gmail.com",
            "gambar" => "dimas.png"
        ],
        [

            "nama" => "Daffa Aprilino",
            "nrp" => 223040025,
            "jurusan" => "Teknik Informatika",
            "email" => "daffa@gmail.com",
            "gambar" => "daffa.png"
        ],
    ]
    ?>


    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>
                <img src="img/<?= $mhs["gambar"]; ?>">
            </li>
            <li>Nama : <?= $mhs["nama"]; ?> </li>
            <li>NRP : <?= $mhs["nrp"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>



    <?php endforeach; ?>
</body>

</html>