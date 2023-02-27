<?php $absen = 17; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Aku adalah angka <b><?php echo $absen ?></b></p>
    <p>Jika aku dikali 5, maka aku sekarang menjadi <b><?php echo $absen *= 5; ?></b></p>
    <p>Jika aku dibagi 2, maka aku sekarang menjadi <b><?php echo $absen /= 2; ?></b></p>
    <p>Jika aku ditambah 75, maka aku sekarang menjadi <b><?php echo $absen += 75; ?></b></p>
    <p>Jika aku dikurang 20, maka aku sekarang menjadi <b><?php echo $absen -= 20; ?></b></p>
</body>

</html>