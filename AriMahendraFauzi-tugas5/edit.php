<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari $_POST setelah tombol 'Simpan' diklik
    $id = $_POST['id'];
    $nama = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $asalSekolah = $_POST['asal_sekolah'];

    // Proses update data di database, sesuai data yang diperoleh dari $_POST
    $query = "UPDATE tugas4 SET 
                nama='$nama',
                alamat='$alamat',
                jenis_kelamin='$jenisKelamin',
                agama='$agama',
                asal_sekolah='$asalSekolah'
            WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        // Jangan lakukan perubahan header setelah output HTML, atur menggunakan JavaScript.
        header('Location: table.php?status=success');
        exit(); // Keluar dari skrip PHP setelah melakukan redirect.
    } else {
        echo 'Error: ' . $conn->error;
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tugas4 WHERE id='$id'";
        $result = $conn->query($query);
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Data Pendaftar</title>
                <link rel="stylesheet" href="style.css">
                <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
            </head>

            <body class="p-4">
                <div class="max-w-md mx-auto">
                    <h1 class="text-2xl font-bold text-gray-700 text-center">Edit Data Pendaftar</h1>
                    <h2 class="text-4xl font-bold mt-4 text-blue-500 text-center">DIGITAL TALENT</h2>

                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <!-- Tambah input untuk Nama Lengkap -->
                        <div class="mb-4">
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input id="nama_lengkap" name="nama_lengkap" type="text" value="<?php echo $row['nama']; ?>" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                        </div>

                        <!-- Tambah input untuk Alamat Lengkap -->
                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <input id="alamat" name="alamat" type="text" value="<?php echo $row['alamat']; ?>" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                        </div>

                        <!-- Tambah radio button untuk Jenis Kelamin -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($row['jenis_kelamin'] === 'Laki-laki') ? 'checked' : ''; ?>>
                                    <span class="ml-2">Laki-laki</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio" name="jenis_kelamin" value="Perempuan" <?php echo ($row['jenis_kelamin'] === 'Perempuan') ? 'checked' : ''; ?>>
                                    <span class="ml-2">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <!-- Tambah dropdown untuk Agama -->
                        <div class="mb-4">
                            <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                            <select id="agama" name="agama" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                                <option value="Islam" <?php echo ($row['agama'] === 'Islam') ? 'selected' : ''; ?>>Islam</option>
                                <option value="Kristen" <?php echo ($row['agama'] === 'Kristen') ? 'selected' : ''; ?>>Kristen
                                </option>
                                <option value="Katolik" <?php echo ($row['agama'] === 'Katolik') ? 'selected' : ''; ?>>Katolik
                                </option>
                                <option value="Hindu" <?php echo ($row['agama'] === 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                                <option value="Buddha" <?php echo ($row['agama'] === 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
                                <option value="Konghucu" <?php echo ($row['agama'] === 'Konghucu') ? 'selected' : ''; ?>>Konghucu
                                </option>
                            </select>
                        </div>

                        <!-- Tambah input untuk Asal Sekolah -->
                        <div class="mb-4">
                            <label for="asal_sekolah" class="block text-sm font-medium text-gray-700">Asal Sekolah</label>
                            <input id="asal_sekolah" name="asal_sekolah" type="text" value="<?php echo $row['asal_sekolah']; ?>" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                        </div>

                        <div class="flex justify-start">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 mx-1">Simpan</button>
                            <a href="table.php" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-gray-300 mx-1">Batal</a>
                        </div>
                    </form>
                </div>

            </body>

            </html>

<?php
        } else {
            echo 'Data not found.';
        }
    } else {
        echo 'Invalid request.';
    }
}

$conn->close();
?>