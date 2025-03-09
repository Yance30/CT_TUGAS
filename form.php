<?php
session_start();

$timeout = 60;

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout)) {
    session_unset();  
    session_destroy(); 
    header("Location: login.php?message=session_expired"); 
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-900 to-black p-6">
    <div class="w-full max-w-4xl bg-white shadow-2xl rounded-xl overflow-hidden flex flex-col p-10">
        <h1 class="font-semibold text-4xl text-blue-600 text-center">BIODATA</h1>
        <div class="w-full my-5 text-lg">
            <form action="cv.php" method="post">
                <div class="pb-5">
                    <label for="nama" class="font-semibold text-gray-700">Nama</label>
                    <input class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600" type="text" id="nama" name="nama" required autocomplete="off">
                </div>
                <div class="pb-5">
                    <label for="ttl" class="font-semibold text-gray-700">Tempat & Tanggal Lahir</label>
                    <input class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600" type="text" id="ttl" name="ttl" required autocomplete="off">
                </div>
                <div class="pb-5">
                    <label for="SMA" class="font-semibold text-gray-700">Pendidikan SMA</label>
                    <input class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600" type="text" id="SMA" name="SMA" required autocomplete="off">
                </div>
                <div class="pb-5">
                    <label for="pendidikan" class="font-semibold text-gray-700">Pendidikan Sekarang</label>
                    <input class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600" type="text" id="pendidikan" name="pendidikan" required autocomplete="off">
                </div>
                <div class="pb-5">
                    <label for="deskripsi" class="font-semibold text-gray-700">Deskripsi Saya</label>
                    <input class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600" type="text" id="deskripsi" name="deskripsi" required autocomplete="off">
                </div>
                <div class="pb-5">
                    <label for="kontak" class="font-semibold text-gray-700">Kontak</label>
                    <input class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600" type="text" id="kontak" name="kontak" required autocomplete="off">
                </div>
                <div class="pb-5">
                    <label for="sosmed" class="font-semibold text-gray-700">Instagram</label>
                    <input class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600" type="text" id="sosmed" name="sosmed" required autocomplete="off">
                </div>
                <button class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg mt-6 hover:bg-blue-700 transition duration-300" type="submit" name="submit">Submit</button>
            </form>
        </div>
        
        <form method="post">
            <button type="submit" name="logout" class="w-full bg-red-600 text-white font-bold py-3 rounded-lg mt-6 hover:bg-red-700 transition duration-300">
                Logout
            </button>
        </form>
    </div>
</body>
</html>