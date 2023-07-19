<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                </tr>
            </thead>
            <tbody>
                <?php
                require 'koneksi.php';

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
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='px-4 py-2'>Tidak ada data peserta didik baru.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <div class="mt-4">
            <a href="index.php"
                class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-gray-300 mx-1">Kembali</a>
        </div>
    </div>
</body>

</html>