<?php
// $angka = 5;


function cek_ganjil_genap($angka) //parameter
{
    if ($angka % 2 == 1) {
        return "$angka adalah bilangan GANJIL";
    } else {
        return "$angka adalah GENAP";
    }
}


echo cek_ganjil_genap(100); //argument
echo '<br>';
echo cek_ganjil_genap(21);
echo '<br>';
echo cek_ganjil_genap(101);
