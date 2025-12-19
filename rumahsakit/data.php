<?php
include "config/koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM pasien");

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page-data" style="text-align: center;">

<h2>Data Pasien</h2>
<a href="tambah.php" class="button">+ Tambah Pasien</a><br><br>

<table class="data-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Keluhan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jenis_kelamin']; ?></td>
            <td><?= $row['tgl_lahir']; ?></td>
            <td><?= $row['no_telepon']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['keluhan_pasien']; ?></td>
            <td class="action">
                <a href="edit.php?id=<?= $row['id_pasien']; ?>" class="edit-btn">Edit</a>
                <a href="hapus.php?id=<?= $row['id_pasien']; ?>"
                   onclick="return confirm('Hapus data?')"
                   class="hapus-btn">Hapus</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>
