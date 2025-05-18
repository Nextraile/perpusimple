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

$keyword = $_GET['keyword'];
$result = $koneksi->query("SELECT * FROM buku WHERE 
    judul LIKE '%$keyword%' OR 
    penulis LIKE '%$keyword%' OR 
    isbn LIKE '%$keyword%'");

// Tampilkan hasil sama seperti di read.php
echo '</div></body></html>';
?>

