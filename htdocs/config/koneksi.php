<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "uinsi_2441919040";

// buat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// cek koneksi
if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());
}

echo "koneksi berhasil";
//mysqli_close($koneksi);
?>