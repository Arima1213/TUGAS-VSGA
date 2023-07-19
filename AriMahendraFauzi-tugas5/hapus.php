<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tugas4 WHERE id='$id'";
    if ($conn->query($query) === TRUE) {
        header('Location: table.php');
        exit();
    } else {
        echo 'Error: ' . $conn->error;
    }
}

$conn->close();
