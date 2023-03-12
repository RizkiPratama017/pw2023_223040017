<?php
//ARRAY
//membuat array

$hari = array('Senin', 'Selasa', 'Rabu'); //versilama
$bulan = ['Januari', 'Februari', 'Maret']; //versibaru
$myArray = ['Rizki', '18', false];
$binatang = ['🐈‍⬛', '🐇', '🐒', '🐼', '🐨', '🐄'];

//mencetak array

echo $hari[1]; //1 elemen menggunakan index
echo "<hr>";
var_dump($hari);
echo "<hr>";
print_r($bulan);
echo "<hr>";
var_dump($myArray);
echo "<hr>";

//manipulasi array

//menambah diakhir menggunakan index
$hari[] = 'Kamis';
$hari[] = "Jum'at";
print_r($hari);
echo "<hr>";


// menambahkan elemen diakhir menggunakan array_push()
array_push($bulan, 'April', 'Mei', 'Juni');
print_r($bulan);
echo "<hr>";


// menambahkan elemen diawal menggunakan array_unshift()

array_unshift($binatang, '🐍');
print_r($binatang);
echo "<hr>";


// menghapus elemen di akhir, menggunakan array_pop()
array_pop($hari);
print_r($hari);
echo "<hr>";


// menghapus elemen di awal, menggunakan arry_shift()
array_shift($hari);
print_r($hari);
