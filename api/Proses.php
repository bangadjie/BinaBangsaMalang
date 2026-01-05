<?php
include 'koneksi.php';

if (isset($_POST['daftar_smk']) || isset($_POST['daftar_smp'])) {
    // Ambil data umum yang ada di kedua form
    $namaLengkap  = $_POST['namaLengkap'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $nikSiswa     = $_POST['nikSiswa'];
    $nisnSiswa    = $_POST['nisnSiswa'];
    $noHp         = $_POST['noHp'];
    $tempatLahir  = $_POST['tempatLahir'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $agama        = $_POST['Agama'];
    $tahunLulus   = $_POST['tahunLulus'];
    $namaAyah     = $_POST['namaAyah'];
    $namaIbu      = $_POST['namaIbu'];
    $namaWali     = $_POST['namaWali'];
    $alamatRumah  = $_POST['alamatRumah'];
    $nomerHpOrtu  = $_POST['nomerHpOrtu'];

    if (isset($_POST['daftar_smk'])) {
        // KHUSUS SMK: Ada kolom asalSMP dan Jurusan
        $asalSekolah = $_POST['asalSMP'];
        $jurusan     = $_POST['Jurusan'];

        $query = "INSERT INTO smkbinabangsamalang 
                  (namaLengkap, jenisKelamin, nikSiswa, nisnSiswa, noHp, tempatLahir, tanggalLahir, Agama, asalSMP, tahunLulus, Jurusan, namaAyah, namaIbu, namaWali, alamatRumah, nomerHpOrtu) 
                  VALUES 
                  ('$namaLengkap', '$jenisKelamin', '$nikSiswa', '$nisnSiswa', '$noHp', '$tempatLahir', '$tanggalLahir', '$agama', '$asalSekolah', '$tahunLulus', '$jurusan', '$namaAyah', '$namaIbu', '$namaWali', '$alamatRumah', '$nomerHpOrtu')";
    } elseif (isset($_POST['daftar_smp'])) {
        // KHUSUS SMP: Ada kolom asalSD dan TIDAK ADA Jurusan
        $asalSekolah = $_POST['asalSD'];

        $query = "INSERT INTO smpbinabangsamalang 
                  (namaLengkap, jenisKelamin, nikSiswa, nisnSiswa, noHp, tempatLahir, tanggalLahir, Agama, asalSD, tahunLulus, namaAyah, namaIbu, namaWali, alamatRumah, nomerHpOrtu) 
                  VALUES 
                  ('$namaLengkap', '$jenisKelamin', '$nikSiswa', '$nisnSiswa', '$noHp', '$tempatLahir', '$tanggalLahir', '$agama', '$asalSekolah', '$tahunLulus', '$namaAyah', '$namaIbu', '$namaWali', '$alamatRumah', '$nomerHpOrtu')";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Pendaftaran Berhasil Tersimpan!'); window.location='BinaBangsaMalang.html';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
