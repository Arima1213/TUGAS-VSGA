<?php

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $namaLengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $asalSekolah = $_POST['asal_sekolah'];


    $query = "INSERT INTO tugas4 (nama, alamat, jenis_kelamin, agama, asal_sekolah) VALUES ('$namaLengkap', '$alamat', '$jenisKelamin', '$agama', '$asalSekolah')";
    if ($conn->query($query) === TRUE) {

        header('Location: index.php?status=success');
        exit();
    } else {
        echo 'Error: ' . $conn->error;
    }
}

$conn->close();
