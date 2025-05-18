<?php
include 'config.php';

echo '<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar">
    <a href="create.php">Tambah Buku</a>
    <a href="read.php">Daftar Buku</a>
</div>
<div class="container">';

$result = $koneksi->query("SELECT * FROM buku");

echo "<h2>Daftar Buku</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>ISBN</th><th>Aksi</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['judul']}</td>
            <td>{$row['penulis']}</td>
            <td>{$row['tahun_terbit']}</td>
            <td>{$row['isbn']}</td>
            <td>
                <a href='update.php?id={$row['id']}'>Edit</a> |
                <a href='delete.php?id={$row['id']}'>Hapus</a>
            </td>
          </tr>";
}

echo "</table>";
echo "<a href='create.php'>Tambah Buku Baru</a>";
echo '</div></body></html>';
?>

