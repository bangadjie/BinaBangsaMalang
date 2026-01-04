<?php
include 'Koneksi.php';

// Ambil data SMK
$query_smk = mysqli_query($conn, "SELECT * FROM smkbinabangsamalang ORDER BY id DESC");
// Ambil data SMP
$query_smp = mysqli_query($conn, "SELECT * FROM smpbinabangsamalang ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - SMK Bina Bangsa Malang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-blue-900 text-white p-6 hidden md:block">
            <h2 class="text-xl font-bold mb-8">Admin BB</h2>
            <nav class="space-y-4">
                <a href="#" class="block p-2 bg-blue-700 rounded">Data Pendaftar</a>
                <a href="BinaBangsaMalang.html" class="block p-2 hover:bg-blue-800 transition">Lihat Website</a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            <header class="mb-8 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-slate-800">Dashboard Pendaftaran</h1>
                <div class="text-sm text-slate-500">Selamat Datang, Admin</div>
            </header>

            <section class="bg-white rounded-xl shadow-md p-6 mb-10">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-blue-700">Data Pendaftar SMK</h2>
                    <a href="ExportExcel.php?type=smk" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm transition font-semibold">
                        Download Excel (.xls)
                    </a>
                </div>
                <div class="overflow-x-auto odd:bg-white even:bg-slate-50">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-100 text-slate-600 text-sm uppercase">
                                <th class="p-3 border-b">Nama</th>
                                <th class="p-3 border-b">Jenis Kelamin</th>
                                <th class="p-3 border-b">NIK</th>
                                <th class="p-3 border-b">NISN</th>
                                <th class="p-3 border-b">Tempat Lahir</th>
                                <th class="p-3 border-b">Tanggal Lahir</th>
                                <th class="p-3 border-b">Agama</th>
                                <th class="p-3 border-b">Asal SMP</th>
                                <th class="p-3 border-b">Tahun Lulus</th>
                                <th class="p-3 border-b">Jurusan</th>
                                <th class="p-3 border-b">No.Siswa</th>
                                <th class="p-3 border-b">Nama Ayah</th>
                                <th class="p-3 border-b">Nama Ibu</th>
                                <th class="p-3 border-b">Nama Wali</th>
                                <th class="p-3 border-b ">Alamat Rumah</th>
                                <th class="p-3 border-b">No.Ortu</th>                                
                                <th class="p-3 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-slate-700 text-sm">
                            <?php while($row = mysqli_fetch_assoc($query_smk)) : ?>
                            <tr class="hover:bg-slate-50 transition border-b">
                                <td class="p-3 font-semibold"><?= $row['namaLengkap']; ?></td>
                                <td class="p-3"><?= $row['jenisKelamin']; ?></td>
                                <td class="p-3"><?= $row['nikSiswa']; ?></td>
                                <td class="p-3"><?= $row['nisnSiswa']; ?></td>
                                <td class="p-3"><?= $row['tempatLahir']; ?></td>
                                <td class="p-3"><?= $row['tanggalLahir']; ?></td>
                                <td class="p-3"><?= $row['Agama']; ?></td>
                                <td class="p-3"><?= $row['asalSMP']; ?></td>
                                <td class="p-3"><?= $row['tahunLulus']; ?></td>
                                <td class="p-3 text-blue-600 font-medium"><?= $row['Jurusan']; ?></td>
                                <td class="p-3"><?= $row['noHp']; ?></td>
                                <td class="p-3"><?= $row['namaAyah']; ?></td>
                                <td class="p-3"><?= $row['namaIbu']; ?></td>
                                <td class="p-3"><?= $row['namaWali']; ?></td>
                                <td class="p-3 max-w-xs truncate"><?= $row['alamatRumah']; ?></td>
                                <td class="p-3"><?= $row['nomerHpOrtu']; ?></td>
                                <td class="p-3"><button class="text-blue-500 hover:underline">Detail</button></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-green-700">Data Pendaftar SMP</h2>
                    <a href="ExportExcel.php?type=smp" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm transition font-semibold">
                        Download Excel (.xls)
                    </a>
                </div>
                <div class="overflow-x-auto odd:bg-white even:bg-slate-50">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-100 text-slate-600 text-sm uppercase">
                                <th class="p-3 border-b">Nama</th>
                                <th class="p-3 border-b">Jenis Kelamin</th>
                                <th class="p-3 border-b">NIK</th>
                                <th class="p-3 border-b">NISN</th>
                                <th class="p-3 border-b">Tempat Lahir</th>
                                <th class="p-3 border-b">Tanggal Lahir</th>
                                <th class="p-3 border-b">Agama</th>
                                <th class="p-3 border-b">Asal SD</th>
                                <th class="p-3 border-b">Tahun Lulus</th>
                                <th class="p-3 border-b">No.Siswa</th>
                                <th class="p-3 border-b">Nama Ayah</th>
                                <th class="p-3 border-b">Nama Ibu</th>
                                <th class="p-3 border-b">Nama Wali</th>
                                <th class="p-3 border-b">Alamat Rumah</th>
                                <th class="p-3 border-b">No.Ortu</th>                                
                                <th class="p-3 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-slate-700 text-sm">
                            <?php while($row = mysqli_fetch_assoc($query_smp)) : ?>
                            <tr class="hover:bg-slate-50 transition border-b">
                                <td class="p-3 font-semibold"><?= $row['namaLengkap']; ?></td>
                                <td class="p-3"><?= $row['jenisKelamin']; ?></td>
                                <td class="p-3"><?= $row['nikSiswa']; ?></td>
                                <td class="p-3"><?= $row['nisnSiswa']; ?></td>
                                <td class="p-3"><?= $row['tempatLahir']; ?></td>
                                <td class="p-3"><?= $row['tanggalLahir']; ?></td>
                                <td class="p-3"><?= $row['Agama']; ?></td>
                                <td class="p-3"><?= $row['asalSD']; ?></td>
                                <td class="p-3"><?= $row['tahunLulus']; ?></td>
                                <td class="p-3"><?= $row['noHp']; ?></td>
                                <td class="p-3"><?= $row['namaAyah']; ?></td>
                                <td class="p-3"><?= $row['namaIbu']; ?></td>
                                <td class="p-3"><?= $row['namaWali']; ?></td>
                                <td class="p-3 max-w-xs truncate"><?= $row['alamatRumah']; ?></td>
                                <td class="p-3"><?= $row['nomerHpOrtu']; ?></td>
                                <td class="p-3"><button class="text-blue-500 hover:underline">Detail</button></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>