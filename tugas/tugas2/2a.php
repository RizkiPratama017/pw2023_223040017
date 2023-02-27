<?php
$nama_depan = 'Rizki';
$nama_belakang = 'Pratama';

for ($nilai_awal = 1; $nilai_awal <= 100; $nilai_awal++) {
    if ($nilai_awal % 3 == 0 && $nilai_awal % 5 == 0) {
        echo "$nama_depan $nama_belakang ";
    } elseif ($nilai_awal % 3 == 0) {
        echo "$nama_depan";
    } elseif ($nilai_awal % 5 == 0) {
        echo "$nama_belakang";
    } else {
        echo "$nilai_awal";
    }

    echo "<br>";
}
