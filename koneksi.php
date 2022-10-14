<?php
$host = "localhost";
$database = "ukk_nama";
$username = "root";
$password = "";
// Membuat Koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);
// Pengecekan Koneksi
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
