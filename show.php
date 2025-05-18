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

$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM buku WHERE id=$id");
$row = $result->fetch_assoc();

echo "<h1>{$row['judul']}</h1>";
echo "<p>Penulis: {$row['penulis']}</p>";
echo "<p>Tahun: {$row['tahun_terbit']}</p>";
echo "<p>ISBN: {$row['isbn']}</p>";
echo '</div></body></html>';
?>

