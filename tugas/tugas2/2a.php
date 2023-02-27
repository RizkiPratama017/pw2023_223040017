<?php
$nama_depan = 'Rizki';
$nama_belakang = 'Pratama';

for ($nilai_awal = 1; $nilai_awal <= 100; $nilai_awal++) {
    if ($nilai_awal % 3 == 0) {
        echo "$nama_depan ";
    } else {
        echo "$nilai_awal";
    }
    if ($nilai_awal % 5 == 0) {
        echo "$nama_belakang";
    }
    echo "<br>";
}
