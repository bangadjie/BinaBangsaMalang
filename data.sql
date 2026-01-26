-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2026 at 02:35 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binabangsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `smkbinabangsamalang`
--

CREATE TABLE `smkbinabangsamalang` (
  `id` int NOT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nikSiswa` varchar(20) NOT NULL,
  `nisnSiswa` varchar(20) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `Agama` varchar(50) NOT NULL,
  `asalSMP` varchar(255) NOT NULL,
  `tahunLulus` int NOT NULL,
  `Jurusan` enum('DKV','Akuntansi') NOT NULL,
  `namaAyah` varchar(255) NOT NULL,
  `namaIbu` varchar(255) NOT NULL,
  `namaWali` varchar(255) DEFAULT NULL,
  `alamatRumah` text NOT NULL,
  `nomerHpOrtu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smpbinabangsamalang`
--

CREATE TABLE `smpbinabangsamalang` (
  `id` int NOT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nikSiswa` varchar(20) NOT NULL,
  `nisnSiswa` varchar(20) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `Agama` varchar(50) NOT NULL,
  `asalSD` varchar(255) NOT NULL,
  `tahunLulus` int NOT NULL,
  `namaAyah` varchar(255) NOT NULL,
  `namaIbu` varchar(255) NOT NULL,
  `namaWali` varchar(255) DEFAULT NULL,
  `alamatRumah` text NOT NULL,
  `nomerHpOrtu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smkbinabangsamalang`
--
ALTER TABLE `smkbinabangsamalang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smpbinabangsamalang`
--
ALTER TABLE `smpbinabangsamalang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smkbinabangsamalang`
--
ALTER TABLE `smkbinabangsamalang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smpbinabangsamalang`
--
ALTER TABLE `smpbinabangsamalang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
