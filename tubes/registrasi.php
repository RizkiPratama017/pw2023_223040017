<?php
require('function.php');
$name = 'registrasi';

// if (isset($_POST["register"])) {

//     if (registrasi($_POST['nama_dpn'], $_POST['nama_blk'], $_POST['username'], $_POST['pass']) > 0) {
//         echo " <script>
//                 alert('data berhasil ditambahkan');
//             </script>";
//     }
//     header("Location: login.php");
//     exit();
// }
require('view/registrasi.view.php');
