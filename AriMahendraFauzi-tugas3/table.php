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
        <h1 class="text-2xl font-bold mb-4">Data Printer</h1>

        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Merek</th>
                    <th class="px-4 py-2">Warna</th>
                    <th class="px-4 py-2">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php

                require 'koneksi.php';

                $query = "SELECT * FROM printer";
                $result = $conn->query($query);


                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='px-4 py-2 text-center'>" . $no++ . "</td>";
                        echo "<td class='px-4 py-2 text-center'>" . $row['nama_merek'] . "</td>";
                        echo "<td class='px-4 py-2 text-center'>" . $row['warna'] . "</td>";
                        echo "<td class='px-4 py-2 text-center'>" . $row['jumlah'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='px-4 py-2'>Tidak ada data printer.</td></tr>";
                }


                $conn->close();
                ?>
            </tbody>
        </table>

        <div class="mt-4">
            <a href="index.php"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Tambah</a>
        </div>
    </div>
</body>

</body>

</html>