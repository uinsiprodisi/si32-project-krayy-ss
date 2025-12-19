<?php
include "config/koneksi.php";
if (isset($_POST['simpan'])) {

    $nama   = $_POST['nama'];
    $jk     = $_POST['jenis_kelamin'];
    $tgl    = $_POST['tgl_lahir'];
    $telp   = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
    $keluhan= $_POST['keluhan_pasien'];

    $query = "INSERT INTO pasien 
    (nama, jenis_kelamin, tgl_lahir, no_telepon, alamat, keluhan_pasien)
    VALUES 
    ('$nama','$jk','$tgl','$telp','$alamat','$keluhan')";

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("INSERT GAGAL: " . mysqli_error($koneksi));
    }

    header("Location: data.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page-form">
<h2 class="page-title">Tambah Pasien</h2>
<form method="post">
    Nama: <input type="text" name="nama" required><br><br>

    Jenis Kelamin:
    <select name="jenis_kelamin">
        <option>Laki-laki</option>
        <option>Perempuan</option>
    </select><br><br>

    Tanggal Lahir: <input type="date" name="tgl_lahir"><br><br>
    No Telepon: <input type="text" name="no_telepon"><br><br>
    Alamat: <input type="text" name="alamat"><br><br>
    Keluhan:<br>
    <textarea name="keluhan_pasien"></textarea><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>
