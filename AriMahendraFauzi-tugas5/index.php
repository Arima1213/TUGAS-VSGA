<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Peserta Didik Baru - Digital Talent</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8 text-center">
        <h1 class="text-2xl font-bold text-gray-700">Pendaftaran Peserta Didik Baru</h1>
        <h2 class="text-4xl font-bold mt-4 text-blue-500">DIGITAL TALENT</h2>

        <?php
        if (isset($_GET['status']) && $_GET['status'] === 'success') {
            echo '<div id="success-alert" class="fixed top-0 right-0 w-full p-4 bg-green-500 text-white text-center">Pendaftaran berhasil!</div>';
        }
        ?>

        <div class="mt-8 space-x-4">
            <a href="daftar.php" class="inline-block mt-8 px-6 py-3 bg-green-500 text-white font-bold rounded-lg shadow-md hover:bg-green-600 transition duration-300">Daftar
                Baru</a>

            <a href="table.php" class="inline-block mt-4 px-6 py-3 bg-yellow-500 text-white font-bold rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">Pendaftar</a>
        </div>
    </div>

    <script>
        function hideAlert() {
            var alertBox = document.getElementById("success-alert");
            if (alertBox) {
                setTimeout(function() {
                    alertBox.remove();
                }, 2000);
            }
        }

        document.addEventListener("DOMContentLoaded", hideAlert);
    </script>
</body>

</html>