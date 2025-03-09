<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $sma = htmlspecialchars($_POST['SMA']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $kontak = htmlspecialchars($_POST['kontak']);
    $sosmed = htmlspecialchars($_POST['sosmed']);
} else {
    header("Location: form_biodata.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CV - <?php echo $nama; ?></title>
</head>
<body class="flex justify-center bg-gradient-to-r from-blue-900 to-black p-5 font-[Poppins]">
    <main class="flex flex-col md:flex-row w-full max-w-4xl bg-white shadow-lg border-2 border-[#d1d5db] rounded-lg">

        <aside class="bg-[#1f2937] text-white p-6 w-full md:w-1/3">
            <div class="flex flex-col items-center">
                <h2 class="text-xl font-bold mt-4 text-center"><?php echo $nama; ?></h2>
            </div>
            <div class="mt-6">
                <h3 class="text-lg font-bold border-b border-[#4b5563] pb-1">CONTACT</h3>
                <p class="flex items-center mt-3">📍 <span class="ml-2"><?php echo $ttl; ?></span></p>
                <p class="flex items-center mt-3">📞 <span class="ml-2"><?php echo $kontak; ?></span></p>
                <p class="flex items-center mt-3">📷 <span class="ml-2"><a href="https://instagram.com/<?php echo $sosmed; ?>" target="_blank" class="text-blue-400">@<?php echo $sosmed; ?></a></span></p>
            </div>
        </aside>

        <section class="w-full md:w-2/3 p-6">
            <h1 class="text-[#1f2937] font-bold text-3xl text-center"><?php echo $nama; ?></h1>
            <h2 class="text-[#6b7280] text-lg text-center">SISTEM INFORMASI</h2>
            <div class="mt-6">
                <h3 class="text-lg font-bold border-b border-[#4b5563] pb-1">PROFILE</h3>
                <p class="mt-3 text-[#374151]"> <?php echo $deskripsi; ?> </p>
            </div>
            <div class="mt-6">
                <h3 class="text-lg font-bold border-b border-[#4b5563] pb-1">EDUCATION</h3>
                <p class="mt-3"><strong><?php echo $sma; ?></strong></p>
                <p class="text-lg text-[#374151]">Lulusan SMA</p>
                <p class="mt-3"><strong><?php echo $pendidikan; ?></strong></p>
                <p class="text-lg text-[#374151]">Pendidikan Sekarang</p>
            </div>
        </section>
    </main>
</body>
</html>