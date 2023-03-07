<?php

echo "<h4>Menghitung Luas Lingkaran </h4>";
function hitungluasLingkaran($r)
{
    $phi = 3.14;
    return $phi * $r * $r;
};
echo "Jari-Jari = 10 cm.<br>";
echo "Luas Lingkaran = ";
echo hitungluasLingkaran(10);
echo " cm";
?>
<?= "<hr>"; ?>

<?php

echo "<h4>Menghitung Keliling Lingkaran </h4>";
function hitungkelilingLingkaran($r)
{
    $phi = 3.14;
    return 2 * $phi * $r;
};
echo "Jari-Jari = 20 cm.<br>";
echo "Luas Lingkaran = ";
echo hitungkelilingLingkaran(20);
echo " cm";
?>
<?= "<hr>"; ?>
