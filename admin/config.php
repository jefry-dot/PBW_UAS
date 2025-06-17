<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'warung_kopi';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    die("Gagal koneksi: " . $mysqli->connect_error);
}
?>
