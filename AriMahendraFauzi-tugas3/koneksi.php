<?php

// Konfigurasi koneksi database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'vsga_tugas3';

// Membuat koneksi mysqli
$conn = new mysqli($host, $user, $pass, $db);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die('Koneksi database gagal: ' . $conn->connect_error);
}
