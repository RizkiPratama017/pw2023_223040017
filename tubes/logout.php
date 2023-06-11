<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);


if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}
