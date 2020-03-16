-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2019 at 11:49 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

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
(3, 'BSM', 'An. LAZNas Chevron Rumbai', '7089719668'),
(4, 'BNI Syariah', 'An. Yay Laznas Chevron Ru', '7773007007');

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
  `bukti_transfer` text,
  `status_donasi` enum('Menunggu','Diterima') NOT NULL,
  `tampil_nama` enum('Y','N') DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `id_kampanye`, `id_pengguna`, `id_bank`, `tgl_donasi`, `jam`, `tgl_bayar`, `jum_transfer`, `bank_asal`, `no_rek_asal`, `bukti_transfer`, `status_donasi`, `tampil_nama`, `keterangan`) VALUES
(122, 19, 5, 3, '2019-07-22', '00:00:00', '2019-06-22', 25000, 'BRI Syariah', '1234567', 'assets/images/foto/fotob.jpeg', 'Diterima', 'Y', 'upload'),
(123, 17, 5, 3, '2019-06-23', '00:00:00', '2019-07-23', 12000, 'BRI', '1289344', 'assets/images/foto/fotoa.jpeg', 'Diterima', 'N', 'upload'),
(139, 23, 6, 3, '2019-07-26', '11:58:13', '2019-07-26', 90000, 'BRIS', '1235674', 'assets/images/foto/fotob.jpeg', 'Diterima', 'Y', 'upload'),
(141, 17, 5, 4, '2019-07-26', '16:21:20', '2019-07-28', 43000, 'Mandiri', '84335', 'assets/images/foto/fotob.jpeg', 'Diterima', 'Y', 'upload'),
(142, 19, 5, 3, '2019-07-28', '16:45:49', '2019-07-28', 20000, 'BNI', '535654664', 'assets/images/foto/struk1.jpeg', 'Diterima', 'N', 'upload'),
(143, 17, 7, 4, '2019-07-28', '19:41:26', '2019-07-28', 89000, 'BCA', '46457467', 'assets/images/foto/fotob.jpeg', 'Diterima', 'N', 'upload');

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
  `foto_kampanye` text,
  `lokasi` text NOT NULL,
  `dana_terkumpul` bigint(20) NOT NULL,
  `target_donasi` bigint(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kampanye`
--

INSERT INTO `kampanye` (`id_kampanye`, `id_kategori`, `nama_kampanye`, `tgl_mulai`, `tgl_selesai`, `foto_kampanye`, `lokasi`, `dana_terkumpul`, `target_donasi`, `deskripsi`) VALUES
(17, 2, 'Selamatkan Warga Palestina', '2019-07-17', '2019-11-14', 'assets/images/foto/hanyainiloh1.jpg', 'Palestina', 187548, 10000000, 'Penjajahan dan blokade puluhan tahun membuat kehidupan di Palestina yang semula makmur menjadi sengsara dan teraniaya. Baik nyawa maupun harta, semua hilang direbut paksa. Berbagai masalah pun muncul mulai dari kemiskinan, kelaparan, kesehatan hingga pendidikan yang memprihatinkan. Akankah kita hanya diam? Mari pahami dan bantu kehidupan mereka!'),
(19, 7, 'Pembangunan Masjid di Riau', '2019-07-19', '2019-09-30', 'assets/images/foto/masjidriau\r\n.jpg', 'Riau', 45264, 40000000, 'Etnis Rohingya bagai berada di ujung tanduk. Bangladesh yang selama ini menampung pengungsi mengatakan sudah t. . . Etnis Rohingya bagai berada di ujung tanduk. Bangladesh yang selama ini menampung pengungsi mengatakan sudah t. . .Etnis Rohingya bagai berada di ujung tanduk. Bangladesh yang selama ini menampung pengungsi mengatakan sudah t. . .'),
(23, 9, 'Berbagi Makanan', '2019-07-25', '2019-11-05', 'assets/images/foto/sekolahblmsiap1.jpg', 'Rumbai', 90139, 5000000, 'Salah satu program Lembaga kami adalah SEDEKAH MAKANAN TIAP JUMAT. Program berbagi makanan tersebut kami adakan setiap Jumat untuk mengajak masyarakat untuk berbagi di hari yang penuh keberkahan dan hari paling baik setiap pekannya. Hari Jumat merupakan moment hari yang sangat baik untuk sedekah dan berbagi dengan sesama.Rasulullah shallallahu ‘alaihi wa sallam bersabda:“Manusia yang paling dicintai oleh Allah adalah yang paling memberikan manfaat bagi manusia. Adapun amalan yang paling dicintai oleh Allah adalah membuat muslim yang lain bahagia, mengangkat kesusahan dari orang lain, membayarkan utangnya atau menghilangkan rasa laparnya. Sungguh aku berjalan bersama saudaraku yang muslim untuk sebuah keperluan lebih aku cintai daripada beri’tikaf di masjid ini -masjid Nabawi- selama sebulan penuh.” (HR. Thabrani)'),
(24, 2, 'Khitanan', '2019-07-28', '2019-10-22', 'assets/images/foto/hanyainiloh2.jpg', 'Masjid Rumbai', 10144, 5000000, 'fehafbrkh ifhrkf kjfjsdfnlrs jfljrsfl rofrlrw.');

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
(1, 'Age', 'ageee@gmail.com', '73bf75f56a315eb1a81348dd0fc447d9', '1', 'Admin'),
(2, 'Bobi', 'bobiii@gmail.com', 'f48bce50349f2af456a78c8888d8c785', '081234567891', 'Admin'),
(5, 'Ani Yunus', 'ani@gmail.com', 'a6c45362cf65dee14014c5396509ba22', '5', 'Donatur'),
(6, 'Ali Ahmad', 'ali@gmail.com', '984d8144fa08bfc637d2825463e184fa', '082388889999', 'Donatur'),
(7, 'Fadli Je', 'fadli@gmail.com', '42390d9e2df6f4a8cb162d6743cb69a7', '085213572468', 'Donatur');

-- --------------------------------------------------------

--
-- Table structure for table `perkembangan`
--

CREATE TABLE `perkembangan` (
  `id_perkembangan` int(11) NOT NULL,
  `id_kampanye` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto_perk` text,
  `isi` text NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perkembangan`
--

INSERT INTO `perkembangan` (`id_perkembangan`, `id_kampanye`, `judul`, `foto_perk`, `isi`, `tgl_posting`) VALUES
(13, 19, 'Pembangunan Dimulai', 'assets/images/foto/sumur\r\n.jpg', 'efhwhjddbhwf eifdekfhdirwuk ufhrkwjfhrwkjrfckj rwouhfrwrhfrw ruwofourwfru rufhirwhrfiyrwfiyrwifciyrw 8yrfhyiruwhfciurwjfcrwnf rf. ryfrwifhirw fuirwhfih  fc9fwmfc.', '2019-07-28'),
(30, 17, 'Sudah Hampir Siap', 'assets/images/foto/sumur\r\n.jpg', 'efhwhjddbhwf eifdekfhdirwuk ufhrkwjfhrwkjrfckj rwouhfrwrhfrw ruwofourwfru rufhirwhrfiyrwfiyrwifciyrw 8yrfhyiruwhfciurwjfcrwnf rf. ryfrwifhirw fuirwhfih  fc9fwmfc.', '2019-07-28');

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
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `kampanye`
--
ALTER TABLE `kampanye`
  MODIFY `id_kampanye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perkembangan`
--
ALTER TABLE `perkembangan`
  MODIFY `id_perkembangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
