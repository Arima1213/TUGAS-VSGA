<?php
require 'koneksi.php';

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status === 'success') {
        echo '<div id="alert" class="fixed top-0 right-0 w-full p-4 bg-green-500 text-white text-center">Data berhasil diubah!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Data Pendaftar</h1>

        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Lengkap</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Jenis Kelamin</th>
                    <th class="px-4 py-2">Agama</th>
                    <th class="px-4 py-2">Asal Sekolah</th>
                    <th class="px-4 py-2">Aksi</th> <!-- Tambah kolom untuk tombol aksi -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi telah dilakukan di atas, jadi tidak perlu melakukan koneksi di sini lagi
                $query = "SELECT * FROM tugas4";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='px-4 py-2 text-center'>" . $no++ . "</td>";
                        echo "<td class='px-4 py-2'>" . $row['nama'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $row['alamat'] . "</td>";
                        echo "<td class='px-4 py-2 text-center'>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $row['agama'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $row['asal_sekolah'] . "</td>";
                        // Tambahkan kolom aksi dengan tombol edit dan delete
                        echo "<td class='px-4 py-2 text-center'>";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded focus:outline-none focus:ring focus:ring-blue-300 mx-1'>Edit</a>";
                        echo "<a href='hapus.php?id=" . $row['id'] . "' class='bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded focus:outline-none focus:ring focus:ring-red-300 mx-1'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='px-4 py-2'>Tidak ada data peserta didik baru.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <div class="mt-4 flex justify-between">
            <p><?php $no--;
                echo "Total Baris : $no"; ?></p>
            <p>
                <?= date("d-m-Y"); ?> </p>
        </div>

        <div class="mt-4">
            <button id="btnCetakPDF"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-green-300 mx-1">
                Cetak PDF
            </button>
            <a href="index.php"
                class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-gray-300 mx-1">Kembali</a>
        </div>
    </div>
    <script>
    document.getElementById('btnCetakPDF').addEventListener('click', function() {
        window.print();
    });

    setTimeout(function() {
        var alertBox = document.getElementById('alert');
        if (alertBox) {
            alertBox.classList.add('fadeOut');
            setTimeout(function() {
                alertBox.remove();
            }, 1000);
        }
    }, 2000);
    </script>
</body>

</html>