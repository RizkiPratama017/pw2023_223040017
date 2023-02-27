<?php
// Catatan
// 1. inisialisasi / Nilai Awal 
// 2. kondisi Terminasi / Kapan pengulangannya berhenti
// 3. increment-maju / Decrement-mundur 

echo "mulai <br>";

// $nilai_awal = 1; //inisialisasi

// while ($nilai_awal <= 5) { //Kondisi terminasi


//     echo "hello world $nilai_awal x <br>";
//     // $nilai_awal += 1;
//     $nilai_awal++; //shortcut +1

// }
// $nilai_awal = 10; //inisialisasi

// while ($nilai_awal >= 1) { //Kondisi terminasi


//     echo "hello world $nilai_awal x <br>";
//     // $nilai_awal -= 1;
//     $nilai_awal--; //shortcut -1

// }
// 
$nilai_awal = 2; //inisialisasi

while ($nilai_awal <= 10) { //Kondisi terminasi


    echo " $nilai_awal  <br>";
    $nilai_awal += 2; //genap
}
echo "<hr>";
// for
for ($nilai_awal = 1; $nilai_awal <= 10; $nilai_awal++) {
    echo "Hello World $nilai_awal x<br>";
}

echo "selesai <br>";
