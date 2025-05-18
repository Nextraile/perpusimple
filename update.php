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
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $isbn = $_POST['isbn'];

    $stmt = $koneksi->prepare("UPDATE buku SET judul=?, penulis=?, tahun_terbit=?, isbn=? WHERE id=?");
    $stmt->bind_param("ssisi", $judul, $penulis, $tahun, $isbn, $id);
    
    if ($stmt->execute()) {
        header("Location: read.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM buku WHERE id=$id");
$row = $result->fetch_assoc();
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    Judul: <input type="text" name="judul" value="<?= $row['judul'] ?>" required><br>
    Penulis: <input type="text" name="penulis" value="<?= $row['penulis'] ?>"><br>
    Tahun: <input type="number" name="tahun" value="<?= $row['tahun_terbit'] ?>"><br>
    ISBN: <input type="text" name="isbn" value="<?= $row['isbn'] ?>"><br>
    <button type="submit">Update</button>
</form>

echo '</div></body></html>';