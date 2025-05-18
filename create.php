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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $isbn = $_POST['isbn'];

    $stmt = $koneksi->prepare("INSERT INTO buku (judul, penulis, tahun_terbit, isbn) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $judul, $penulis, $tahun, $isbn);
    
    if ($stmt->execute()) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="POST">
    Judul: <input type="text" name="judul" required><br>
    Penulis: <input type="text" name="penulis"><br>
    Tahun: <input type="number" name="tahun"><br>
    ISBN: <input type="text" name="isbn"><br>
    <button type="submit">Tambah</button>
</form>

echo '</div></body></html>';