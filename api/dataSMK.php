<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: Login.php");
    exit;
}

include 'Koneksi.php';

// Ambil data SMK
$query_smk = mysqli_query($conn, "SELECT * FROM smkbinabangsamalang ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar SMK - Panel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Menambahkan scrollbar halus untuk tabel panjang */
        .custom-scrollbar::-webkit-scrollbar {
            height: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="bg-slate-50 font-sans text-slate-900">
    <div class="flex min-h-screen">

        <aside class="w-72 bg-slate-900 text-slate-300 p-6 shadow-xl sticky top-0 h-screen">
            <div class="flex items-center gap-3 mb-10 px-2">
                <div class="bg-blue-600 p-2 rounded-lg text-white">
                    <i class="fas fa-school fa-lg"></i>
                </div>
                <span class="text-xl font-bold text-white tracking-wide">Panel Admin</span>
            </div>

            <nav class="space-y-2">
                <a href="Dashboard.php" class="flex items-center gap-3 p-3 hover:bg-slate-800 rounded-xl transition">
                    <i class="fas fa-chart-line w-5 text-center"></i> Dashboard Utama
                </a>
                <a href="dataSMK.php" class="flex items-center gap-3 p-3 bg-blue-600 text-white rounded-xl shadow-lg transition">
                    <i class="fas fa-user-graduate w-5 text-center"></i> Data Pendaftar SMK
                </a>
                <a href="dataSMP.php" class="flex items-center gap-3 p-3 hover:bg-slate-800 rounded-xl transition">
                    <i class="fas fa-user-tie w-5 text-center"></i> Data Pendaftar SMP
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

        <main class="flex-1 p-8">
            <header class="mb-8 flex justify-between items-end">
                <div>
                    <nav class="text-sm text-slate-400 mb-2">
                        <a href="Dashboard.php" class="hover:text-blue-600">Admin</a> / <span>Data SMK</span>
                    </nav>
                    <h1 class="text-3xl font-bold text-slate-800">Pendaftar SMK</h1>
                    <p class="text-slate-500">Kelola dan verifikasi data calon siswa Sekolah Menengah Kejuruan.</p>
                </div>

                <a href="ExportExcel.php?type=smk" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl shadow-md transition font-semibold text-sm">
                    <i class="fas fa-file-excel"></i> Export ke Excel
                </a>
            </header>

            <section class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-separate border-spacing-0">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="p-4 border-b font-bold text-slate-600 uppercase text-xs tracking-wider">Nama Lengkap</th>
                                <th class="p-4 border-b font-bold text-slate-600 uppercase text-xs tracking-wider">Info Siswa</th>
                                <th class="p-4 border-b font-bold text-slate-600 uppercase text-xs tracking-wider">Identitas</th>
                                <th class="p-4 border-b font-bold text-slate-600 uppercase text-xs tracking-wider">Sekolah Asal</th>
                                <th class="p-4 border-b font-bold text-slate-600 uppercase text-xs tracking-wider text-blue-600">Jurusan</th>
                                <th class="p-4 border-b font-bold text-slate-600 uppercase text-xs tracking-wider">Kontak</th>
                                <th class="p-4 border-b font-bold text-slate-600 uppercase text-xs tracking-wider">Orang Tua</th>
                                <th class="p-4 border-b font-bold text-slate-600 uppercase text-xs tracking-wider text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <?php while ($row = mysqli_fetch_assoc($query_smk)) : ?>
                                <tr class="hover:bg-blue-50/50 transition-colors odd:bg-white even:bg-slate-50/50">
                                    <td class="p-4 border-b whitespace-nowrap">
                                        <div class="font-bold text-slate-800"><?= $row['namaLengkap']; ?></div>
                                        <div class="text-xs text-slate-400"><?= $row['jenisKelamin']; ?></div>
                                    </td>

                                    <td class="p-4 border-b whitespace-nowrap text-slate-600">
                                        <div class="text-xs font-semibold uppercase text-slate-400">Lahir:</div>
                                        <?= $row['tempatLahir']; ?>, <?= date('d/m/Y', strtotime($row['tanggalLahir'])); ?>
                                        <div class="text-xs"><?= $row['Agama']; ?></div>
                                    </td>

                                    <td class="p-4 border-b whitespace-nowrap text-slate-600">
                                        <div><span class="text-xs font-semibold text-slate-400">NIK:</span> <?= $row['nikSiswa']; ?></div>
                                        <div><span class="text-xs font-semibold text-slate-400">NISN:</span> <?= $row['nisnSiswa']; ?></div>
                                    </td>

                                    <td class="p-4 border-b whitespace-nowrap text-slate-600">
                                        <div class="font-medium text-slate-800"><?= $row['asalSMP']; ?></div>
                                        <div class="text-xs italic">Lulus Th. <?= $row['tahunLulus']; ?></div>
                                    </td>

                                    <td class="p-4 border-b whitespace-nowrap font-bold text-blue-600">
                                        <span class="bg-blue-100 px-3 py-1 rounded-full text-xs"><?= $row['Jurusan']; ?></span>
                                    </td>

                                    <td class="p-4 border-b whitespace-nowrap text-slate-600">
                                        <div class="flex items-center gap-1"><i class="fab fa-whatsapp text-green-500"></i> <?= $row['noHp']; ?></div>
                                        <div class="text-xs max-w-[150px] truncate" title="<?= $row['alamatRumah']; ?>"><?= $row['alamatRumah']; ?></div>
                                    </td>

                                    <td class="p-4 border-b whitespace-nowrap text-slate-600">
                                        <div class="text-xs"><span class="font-semibold text-slate-400">Ayah:</span> <?= $row['namaAyah']; ?></div>
                                        <div class="text-xs"><span class="font-semibold text-slate-400">Ibu:</span> <?= $row['namaIbu']; ?></div>
                                        <div class="text-xs"><span class="font-semibold text-slate-400">HP:</span> <?= $row['nomerHpOrtu']; ?></div>
                                    </td>

                                    <td class="p-4 border-b text-center">
                                        <button type="button"
                                            onclick="showDetail(<?= htmlspecialchars(json_encode($row)); ?>)"
                                            class="bg-slate-100 hover:bg-blue-600 hover:text-white text-slate-600 px-4 py-1.5 rounded-lg transition-all text-xs font-bold">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="bg-slate-50 p-4 text-xs text-slate-400 text-right italic">
                    * Gunakan scroll horizontal jika tabel melebihi lebar layar
                </div>
            </section>
        </main>
    </div>
    <div id="detailModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden transform transition-all">
            <div class="bg-blue-600 p-6 text-white flex justify-between items-center">
                <h3 class="text-xl font-bold flex items-center gap-2">
                    <i class="fas fa-user-circle"></i> Detail Lengkap Siswa
                </h3>
                <button onclick="closeModal()" class="text-white/80 hover:text-white">
                    <i class="fas fa-times fa-lg"></i>
                </button>
            </div>

            <div class="p-8 max-h-[70vh] overflow-y-auto custom-scrollbar" id="modalContent">
            </div>

            <div class="bg-slate-50 p-4 border-t flex justify-end">
                <button onclick="closeModal()" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold py-2 px-6 rounded-xl transition">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function showDetail(data) {
        const modal = document.getElementById('detailModal');
        const content = document.getElementById('modalContent');

        // Susun tampilan data dengan Grid agar rapi untuk guru
        content.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
            <div class="space-y-4">
                <h4 class="font-bold text-blue-600 border-b pb-1 uppercase tracking-wider text-xs">Data Pribadi</h4>
                <p><span class="text-slate-400 block text-xs">Nama Lengkap:</span> <span class="font-semibold text-slate-800">${data.namaLengkap}</span></p>
                <p><span class="text-slate-400 block text-xs">Jenis Kelamin:</span> <span class="font-semibold text-slate-800">${data.jenisKelamin}</span></p>
                <p><span class="text-slate-400 block text-xs">NIK / NISN:</span> <span class="font-semibold text-slate-800">${data.nikSiswa} / ${data.nisnSiswa}</span></p>
                <p><span class="text-slate-400 block text-xs">Tempat, Tgl Lahir:</span> <span class="font-semibold text-slate-800">${data.tempatLahir}, ${data.tanggalLahir}</span></p>
                <p><span class="text-slate-400 block text-xs">Agama:</span> <span class="font-semibold text-slate-800">${data.Agama}</span></p>
                <p><span class="text-slate-400 block text-xs">No. HP Siswa:</span> <span class="font-semibold text-green-600">${data.noHp}</span></p>
            </div>
            <div class="space-y-4">
                <h4 class="font-bold text-blue-600 border-b pb-1 uppercase tracking-wider text-xs">Data Pendidikan & Wali</h4>
                <p><span class="text-slate-400 block text-xs">Asal Sekolah:</span> <span class="font-semibold text-slate-800">${data.asalSMP}</span></p>
                <p><span class="text-slate-400 block text-xs">Tahun Lulus:</span> <span class="font-semibold text-slate-800">${data.tahunLulus}</span></p>
                <p><span class="text-slate-400 block text-xs">Jurusan Pilihan:</span> <span class="font-bold text-blue-700">${data.Jurusan || '-'}</span></p>
                <p><span class="text-slate-400 block text-xs">Nama Orang Tua:</span> <span class="font-semibold text-slate-800">${data.namaAyah} (Ayah) & ${data.namaIbu} (Ibu)</span></p>
                <p><span class="text-slate-400 block text-xs">No. HP Orang Tua:</span> <span class="font-semibold text-slate-800">${data.nomerHpOrtu}</span></p>
                <p><span class="text-slate-400 block text-xs">Alamat Rumah:</span> <span class="font-semibold text-slate-800 leading-relaxed">${data.alamatRumah}</span></p>
            </div>
        </div>
    `;

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Matikan scroll background
    }

    function closeModal() {
        const modal = document.getElementById('detailModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Aktifkan kembali scroll background
    }

    // Tutup modal jika klik di area luar kotak putih
    window.onclick = function(event) {
        const modal = document.getElementById('detailModal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>