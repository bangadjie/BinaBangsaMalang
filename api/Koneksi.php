<?php
// Cek apakah script berjalan di Docker atau Laragon
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost' || strpos($_SERVER['HTTP_HOST'], '.test') !== false) {
    // Settingan untuk LARAGON (Lokal)
    $host = "localhost";
} else {
    // Settingan untuk DOCKER (VPS)
    $host = "binabangsa-db";
}

$user = "root";
$pass = ""; // Di Laragon biasanya kosong, di Docker nanti disesuaikan
$db   = "binabangsa";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>