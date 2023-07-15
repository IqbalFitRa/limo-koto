<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'limokoto';

$conn = new mysqli($host, $username, $password, $database);


if (!$conn) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>

