<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: Login.php");
    exit;
}
include 'Koneksi.php';

// Hitung Total
$total_smk = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM smkbinabangsamalang"));
$total_smp = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM smpbinabangsamalang"));
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Bina Bangsa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-slate-50 font-sans">
    <div class="flex min-h-screen">
        <aside class="w-72 bg-slate-900 text-slate-300 p-6 shadow-xl">
            <div class="flex items-center gap-3 mb-10 px-2">
                <div class="bg-blue-600 p-2 rounded-lg text-white">
                    <i class="fas fa-school fa-lg"></i>
                </div>
                <span class="text-xl font-bold text-white tracking-wide">Panel Admin</span>
            </div>

            <nav class="space-y-2">
                <a href="Dashboard.php" class="flex items-center gap-3 p-3 bg-blue-600 text-white rounded-xl shadow-lg transition">
                    <i class="fas fa-chart-line"></i> Dashboard Utama
                </a>
                <a href="dataSMK.php" class="flex items-center gap-3 p-3 hover:bg-slate-800 rounded-xl transition">
                    <i class="fas fa-user-graduate"></i> Data Pendaftar SMK
                </a>
                <a href="dataSMP.php" class="flex items-center gap-3 p-3 hover:bg-slate-800 rounded-xl transition">
                    <i class="fas fa-user-tie"></i> Data Pendaftar SMP
                </a>
                <div class="pt-10 border-t border-slate-800 mt-10">
                    <a href="/BinaBangsaMalang.html" class="flex items-center gap-3 p-3 hover:bg-slate-800 rounded-xl transition text-sm">
                        <i class="fas fa-globe w-5 text-center"></i> Lihat Website
                    </a>
                    <a href="Logout.php" class="flex items-center gap-3 p-3 text-red-400 hover:bg-red-900/20 rounded-xl transition mt-2">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i> Keluar
                    </a>
                </div>
            </nav>
        </aside>

        <main class="flex-1 p-10">
            <header class="mb-10">
                <h1 class="text-3xl font-extrabold text-slate-800">Selamat Datang, Admin</h1>
                <p class="text-slate-500 mt-1">Berikut adalah ringkasan pendaftaran siswa baru hari ini.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex items-center justify-between group hover:shadow-xl transition-all duration-300">
                    <div>
                        <p class="text-slate-400 font-medium uppercase tracking-wider text-sm">Total Pendaftar SMK</p>
                        <h2 class="text-5xl font-black text-slate-800 mt-2"><?= $total_smk ?> <span class="text-lg font-normal text-slate-400">Siswa</span></h2>
                        <a href="DataSMK.php" class="inline-block mt-4 text-blue-600 font-semibold hover:underline text-sm">Lihat Detail Data →</a>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-2xl text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <i class="fas fa-user-graduate fa-3x"></i>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex items-center justify-between group hover:shadow-xl transition-all duration-300">
                    <div>
                        <p class="text-slate-400 font-medium uppercase tracking-wider text-sm">Total Pendaftar SMP</p>
                        <h2 class="text-5xl font-black text-slate-800 mt-2"><?= $total_smp ?> <span class="text-lg font-normal text-slate-400">Siswa</span></h2>
                        <a href="DataSMP.php" class="inline-block mt-4 text-green-600 font-semibold hover:underline text-sm">Lihat Detail Data →</a>
                    </div>
                    <div class="bg-green-50 p-6 rounded-2xl text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <i class="fas fa-user-tie fa-3x"></i>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>