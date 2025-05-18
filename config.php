<?php
$host = "localhost";
$user = "root"; // Ganti dengan username MySQL kamu
$password = "Discovery_Semarang"; // Ganti dengan password MySQL kamu
$database = "proyek";

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>