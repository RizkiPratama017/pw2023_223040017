<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2d</title>
</head>

<body>
    <table border="1" cellpadding="20" cellspacing="0">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <tr>
                <?php for ($j = 1; $j <= 5; $j++) {
                    $total = $i + $j;
                    if ($total % 2 == 0) {
                        echo "<td height='50px' width= '50px' style='background-color: black;' ></td>";
                    } else {
                        echo "<td height='50px' width= '50px' style='background-color: white;' ></td>";
                    }
                }
                ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>

</html>