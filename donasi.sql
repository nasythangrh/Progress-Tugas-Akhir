-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 11:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(15) NOT NULL,
  `nama_rek` varchar(25) NOT NULL,
  `no_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `nama_rek`, `no_rek`) VALUES
(1, '-', '-', '0'),
(3, 'BNI', 'An. Dinsos Kab.Malang', '7089719668'),
(4, 'BRI', 'An. Dinsos Kab.Malang', '7773007007');

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id_donatur` int(11) NOT NULL,
  `id_kampanye` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `tgl_donasi` date NOT NULL,
  `jam` time NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jum_transfer` bigint(20) NOT NULL,
  `bank_asal` varchar(25) NOT NULL,
  `no_rek_asal` varchar(20) NOT NULL,
  `bukti_transfer` text DEFAULT NULL,
  `status_donasi` enum('Menunggu','Diterima') NOT NULL,
  `tampil_nama` enum('Y','N') DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `id_kampanye`, `id_pengguna`, `id_bank`, `tgl_donasi`, `jam`, `tgl_bayar`, `jum_transfer`, `bank_asal`, `no_rek_asal`, `bukti_transfer`, `status_donasi`, `tampil_nama`, `keterangan`) VALUES
(142, 19, 5, 3, '2019-07-28', '16:45:49', '2019-07-28', 20000, 'BNI', '535654664', 'assets/images/foto/struk1.jpeg', 'Diterima', 'N', 'upload'),
(146, 23, 6, 4, '2020-03-12', '10:29:49', '2020-03-12', 200000, '1', '1', 'assets/images/foto/XBuktiTransfer.jpg', 'Diterima', 'N', 'upload'),
(147, 24, 8, 3, '2020-03-12', '10:35:11', '2020-03-12', 100000, '1', '1', 'assets/images/foto/XBuktiTransfer.jpg', 'Diterima', 'Y', 'upload'),
(148, 25, 8, 3, '2020-03-13', '05:13:58', '2020-03-13', 5000000, '1', '1', 'assets/images/foto/XBuktiTransfer.jpg', 'Diterima', 'Y', 'upload'),
(149, 17, 8, 3, '2020-03-16', '12:29:35', '2020-03-16', 500000, '1', '1', 'assets/images/foto/XBuktiTransfer.jpg', 'Diterima', 'Y', 'upload');

-- --------------------------------------------------------

--
-- Table structure for table `kampanye`
--

CREATE TABLE `kampanye` (
  `id_kampanye` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kampanye` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `foto_kampanye` text DEFAULT NULL,
  `lokasi` text NOT NULL,
  `dana_terkumpul` bigint(20) NOT NULL,
  `target_donasi` bigint(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kampanye`
--

INSERT INTO `kampanye` (`id_kampanye`, `id_kategori`, `nama_kampanye`, `tgl_mulai`, `tgl_selesai`, `foto_kampanye`, `lokasi`, `dana_terkumpul`, `target_donasi`, `deskripsi`) VALUES
(17, 2, 'LKSA Al-Masyithoh', '2020-07-17', '2020-11-14', 'assets/images/foto/hanyainiloh1.jpg', 'Jalan Kauman Lawang', 1187846, 10000000, 'Obat-obatan untuk anak panti'),
(25, 9, 'LKSA Al-Huda', '2020-03-03', '2020-03-28', NULL, 'Kepanjen', 15000296, 15000000, 'Pembangunan Toilet');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, '-'),
(2, 'Kesehatan'),
(9, 'Pembangunan Umum'),
(4, 'Pendidikan'),
(7, 'Rumah Ibadah');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `level` enum('Admin','Donatur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `pass`, `no_hp`, `level`) VALUES
(2, 'Bobi', 'bobiii@gmail.com', 'f48bce50349f2af456a78c8888d8c785', '081234567891', 'Admin'),
(3, 'Nasytha', 'nasythangrh@gmail.co', '21232f297a57a5a743894a0e4a801fc3', '089620921172', 'Admin'),
(5, 'Ani', 'ani@gmail.com', 'a6c45362cf65dee14014c5396509ba22', '5', ''),
(6, 'Nabila Ali', 'ali@gmail.com', '984d8144fa08bfc637d2825463e184fa', '082388889999', ''),
(7, 'Fadli Je', 'fadli@gmail.com', '42390d9e2df6f4a8cb162d6743cb69a7', '085213572468', 'Donatur'),
(8, 'nasytha', 'nugrohonas12@gmail.c', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Donatur');

-- --------------------------------------------------------

--
-- Table structure for table `perkembangan`
--

CREATE TABLE `perkembangan` (
  `id_perkembangan` int(11) NOT NULL,
  `id_kampanye` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto_perk` text DEFAULT NULL,
  `isi` text NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perkembangan`
--

INSERT INTO `perkembangan` (`id_perkembangan`, `id_kampanye`, `judul`, `foto_perk`, `isi`, `tgl_posting`) VALUES
(13, 25, 'Pembangunan Dimulai', NULL, 'Pembangunan mulai dilakukan', '2019-07-28'),
(30, 17, 'Sudah Hampir Siap', NULL, 'Dana sudah terkumpul', '2019-07-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`),
  ADD UNIQUE KEY `no_rek` (`no_rek`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`),
  ADD KEY `id_bank` (`id_pengguna`),
  ADD KEY `id_bank_2` (`id_bank`),
  ADD KEY `id_kampanye` (`id_kampanye`);

--
-- Indexes for table `kampanye`
--
ALTER TABLE `kampanye`
  ADD PRIMARY KEY (`id_kampanye`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`);

--
-- Indexes for table `perkembangan`
--
ALTER TABLE `perkembangan`
  ADD PRIMARY KEY (`id_perkembangan`),
  ADD KEY `id_kampanye` (`id_kampanye`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `kampanye`
--
ALTER TABLE `kampanye`
  MODIFY `id_kampanye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perkembangan`
--
ALTER TABLE `perkembangan`
  MODIFY `id_perkembangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
