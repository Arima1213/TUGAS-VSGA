<?php

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaMerek = $_POST['nama_merek'];
    $warna = $_POST['warna'];
    $jumlah = $_POST['jumlah'];

    $query = "INSERT INTO printer ( nama_merek, warna, jumlah) VALUES ('$namaMerek', '$warna', '$jumlah')";
    if ($conn->query($query) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Error: ' . $conn->error;
    }
}

$conn->close();