<?php
include 'Koneksi.php';

$type = $_GET['type'];

if ($type == 'smk') {
    $filename = "Data_Pendaftaran_SMK_BinaBangsa.xls";
    $query = mysqli_query($conn, "SELECT * FROM smkbinabangsamalang ORDER BY id DESC");
    $header_asal = "Asal SMP";
} else {
    $filename = "Data_Pendaftaran_SMP_BinaBangsa.xls";
    $query = mysqli_query($conn, "SELECT * FROM smpbinabangsamalang ORDER BY id DESC");
    $header_asal = "Asal SD";
}

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$filename");
?>
<table border="1">
    <tr>
        <th class="p-3 border-b">No</th>
        <th class="p-3 border-b">Nama</th>
        <th class="p-3 border-b">Jenis Kelamin</th>
        <th class="p-3 border-b">NIK</th>
        <th class="p-3 border-b">NISN</th>
        <th class="p-3 border-b">Tempat Lahir</th>
        <th class="p-3 border-b">Tanggal Lahir</th>
        <th class="p-3 border-b">Agama</th>
        <th><?= $header_asal; ?></th>
        <?php if ($type == 'smk') echo "<th>Jurusan</th>"; ?>
        <th class="p-3 border-b">Tahun Lulus</th>
        <th class="p-3 border-b">No.Siswa</th>
        <th class="p-3 border-b">Nama Ayah</th>
        <th class="p-3 border-b">Nama Ibu</th>
        <th class="p-3 border-b">Nama Wali</th>
        <th class="p-3 border-b ">Alamat Rumah</th>
        <th class="p-3 border-b">No.Ortu</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) :
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['namaLengkap']; ?></td>
            <td><?= $row['jenisKelamin']; ?></td>
            <td><?= $row['nikSiswa']; ?></td>
            <td><?= $row['nisnSiswa']; ?></td>
            <td><?= $row['tempatLahir']; ?></td>
            <td><?= $row['tanggalLahir']; ?></td>
            <td><?= $row['Agama']; ?></td>
            <td><?= ($type == 'smk') ? $row['asalSMP'] : $row['asalSD']; ?></td>
            <?php if ($type == 'smk') echo "<td>" . $row['Jurusan'] . "</td>"; ?>
            <td><?= $row['tahunLulus']; ?></td>
            <td><?= $row['noHp']; ?></td>
            <td><?= $row['namaAyah']; ?></td>
            <td><?= $row['namaIbu']; ?></td>
            <td><?= $row['namaWali']; ?></td>
            <td><?= $row['alamatRumah']; ?></td>
            <td><?= $row['nomerHpOrtu']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>