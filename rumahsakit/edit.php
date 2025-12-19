<?php
include "config/koneksi.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}
$id = $_GET['id'];

$sql   = "SELECT * FROM rumah_sakit.pasien WHERE id_pasien = '$id'";
$query = mysqli_query($koneksi, $sql);
if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}
$data = mysqli_fetch_assoc($query);
if (!$data) {
    die("Data tidak ditemukan.");
}

if (isset($_POST['update'])) {
    $nama          = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tgl_lahir     = $_POST['tgl_lahir'];
    $no_telepon    = $_POST['no_telepon'];
    $alamat        = $_POST['alamat'];
    $keluhan       = $_POST['keluhan_pasien'];

    $sqlUpdate = "UPDATE rumah_sakit.pasien SET
                    nama = '$nama',
                    jenis_kelamin = '$jenis_kelamin',
                    tgl_lahir = '$tgl_lahir',
                    no_telepon = '$no_telepon',
                    alamat = '$alamat',
                    keluhan_pasien = '$keluhan'
                  WHERE id_pasien = '$id'";

    mysqli_query($koneksi, $sqlUpdate) or die("Update gagal: " . mysqli_error($koneksi));

    // balik ke halaman utama
    header("Location: data.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page-form">

<h2 class="page-title">Edit Data Pasien</h2>

<div class="form-box">
    <form method="POST">
        <!-- id disimpan -->
        <input type="hidden" name="id" value="<?= $id ?>">

        <input name="nama"          value="<?= $data['nama'] ?>">
        <input name="jenis_kelamin" value="<?= $data['jenis_kelamin'] ?>">
        <input name="tgl_lahir"     value="<?= $data['tgl_lahir'] ?>">
        <input name="no_telepon"    value="<?= $data['no_telepon'] ?>">
        <input name="alamat"        value="<?= $data['alamat'] ?>">
        <input name="keluhan_pasien" value="<?= $data['keluhan_pasien'] ?>">

        <button type="submit" name="update">Update</button>
    </form>
</div>

</body>
</html>