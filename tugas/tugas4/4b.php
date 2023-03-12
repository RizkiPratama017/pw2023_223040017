<?php
$perangkatkerasdarikomputer = ['Motherboard', 'processor', 'Hard Disk', 'PC Coller', 'vga Card', 'SSD'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h2>Macam-macam perangkat keras komputer</h2>
    <ol>
        <?php for ($i = 0; $i < count($perangkatkerasdarikomputer); $i++) { ?>

            <li><?= $perangkatkerasdarikomputer[$i]; ?></li>

        <?php } ?>
    </ol>
    <br>

    <?php array_push($perangkatkerasdarikomputer, 'Card Reader', 'Modem') ?>
    <h2>Macam-macam perangkat keras komputer baru</h2>
    <ol>
        <?php for ($i = 0; $i < count($perangkatkerasdarikomputer); $i++) { ?>
            <li><?php
                sort($perangkatkerasdarikomputer);
                echo $perangkatkerasdarikomputer[$i] . "\n"; ?></li>

        <?php } ?>
    </ol>

</html>