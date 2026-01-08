<?php
$host = "binabangsa-db";
$user = "root";
$pass = "root";
$db   = "binabangsa";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>