<?php
// Koneksi ke database MariaDB
$host = 'localhost';
$user = 'ktpreader';
$password = 'rahasia';
$dbname = 'ktpreader';

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
