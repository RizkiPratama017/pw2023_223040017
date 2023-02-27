<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2c</title>
    <style>
        .warna {
            background-color: salmon;
        }
    </style>
</head>

<body>

    <table border="1" cellpadding="20" cellspacing="0">
        <?php
        for ($i = 10; $i >= 1; $i--) : ?>
            <tr class="warna">
                <?php for ($j = 1; $j <= $i; $j++) { ?>
                    <td><?= $j; ?></td>
                <?php } ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>

</html>