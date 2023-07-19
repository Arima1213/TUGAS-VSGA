<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="max-w-md mx-auto">
        <h1 class="text-2xl font-bold text-gray-700 text-center">Formulir Pendaftaran Peserta Didik Baru</h1>
        <h2 class="text-4xl font-bold mt-4 text-blue-500 text-center">DIGITAL TALENT</h2>

        <form action="simpan.php" method="post" onsubmit="return validateForm()">

            <div class="mb-4">
                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input id="nama_lengkap" name="nama_lengkap" type="text" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input id="alamat" name="alamat" type="text" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="jenis_kelamin" value="Laki-laki">
                        <span class="ml-2">Laki-laki</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="jenis_kelamin" value="Perempuan">
                        <span class="ml-2">Perempuan</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                <select id="agama" name="agama" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="asal_sekolah" class="block text-sm font-medium text-gray-700">Asal Sekolah</label>
                <input id="asal_sekolah" name="asal_sekolah" type="text" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-start">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 mx-1">Simpan</button>
                <button type="reset" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-gray-300 mx-1">Ulangi</button>
                <a href="index.php" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-gray-300 mx-1">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            var no = document.getElementById("no").value;
            var namaLengkap = document.getElementById("nama_lengkap").value;
            var alamat = document.getElementById("alamat").value;
            var jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
            var agama = document.getElementById("agama").value;
            var asalSekolah = document.getElementById("asal_sekolah").value;

            if (no === "" || namaLengkap === "" || alamat === "" || jenisKelamin === null || asalSekolah === "") {
                showAlert("Harap lengkapi semua field.");
                return false;
            }

            return true;
        }

        function showAlert(message) {
            var alertBox = document.createElement("div");
            alertBox.classList.add("fixed", "top-0", "right-0", "w-full", "p-4", "bg-red-500", "text-white", "text-center");
            alertBox.innerText = message;
            document.body.appendChild(alertBox);

            setTimeout(function() {
                alertBox.remove();
            }, 3000);
        }
    </script>
</body>

</html>