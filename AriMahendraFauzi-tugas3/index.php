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
        <h1 class="text-2xl font-bold mb-4">Tambah Barang</h1>

        <form action="simpan.php" method="post" onsubmit="return validateForm()">
            <div class="mb-4">
                <label for="nama_merek" class="block text-sm font-medium text-gray-700">Nama Merek</label>
                <input id="nama_merek" name="nama_merek" type="text"
                    class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="warna" class="block text-sm font-medium text-gray-700">Warna</label>
                <input id="warna" name="warna" type="text"
                    class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input id="jumlah" name="jumlah" type="number"
                    class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Simpan</button>
                <button type="reset"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-gray-300"
                    onclick="resetForm()">Ulangi</button>
                <a href="table.php"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-gray-300">Lihat
                    Data</a>
            </div>
        </form>
    </div>

    <script>
    function resetForm() {
        document.getElementById("no").value = ""; // Menghapus nilai input No
        document.getElementById("nama_merek").value = ""; // Menghapus nilai input Nama Merek
        document.getElementById("warna").value = ""; // Menghapus nilai input Warna
        document.getElementById("jumlah").value = ""; // Menghapus nilai input Jumlah
    }

    function validateForm() {
        var no = document.getElementById("no").value;
        var namaMerek = document.getElementById("nama_merek").value;
        var warna = document.getElementById("warna").value;
        var jumlah = document.getElementById("jumlah").value;

        if (no === "" || namaMerek === "" || warna === "" || jumlah === "") {
            showAlert("Harap lengkapi semua field.");
            return false;
        }

        if (isNaN(jumlah)) {
            showAlert("Jumlah harus berupa angka.");
            return false;
        }

        return true;
    }

    function showAlert(message) {
        var alertBox = document.createElement("div");
        alertBox.classList.add("fixed", "top-0", "left-0", "w-full", "p-4", "bg-red-500", "text-white", "text-center");
        alertBox.innerText = message;
        document.body.appendChild(alertBox);

        setTimeout(function() {
            alertBox.remove();
        }, 3000);
    }
    </script>
</body>

</html>