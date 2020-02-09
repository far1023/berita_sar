-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 05:09 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita_sar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `terakhir_login` datetime NOT NULL,
  `aktif` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `username`, `password`, `role`, `terakhir_login`, `aktif`) VALUES
(1, 'admin@gmail.com', 'superadmin', '$2y$10$t.JIph./U9zW.JuePDz7iOaTbGKXLOao/a1rPACBqp9XTgbNvrOh.', 'admin', '2020-02-09 22:34:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `tagar` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `dibuat_tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `dibuat_oleh` varchar(25) NOT NULL,
  `diedit_tanggal` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `diedit_oleh` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `tagar`, `gambar`, `user`, `dibuat_tanggal`, `dibuat_oleh`, `diedit_tanggal`, `diedit_oleh`) VALUES
(29, 'Lorem ipsum dolor sit amet, consectetur adipisicing.', '&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias nisi molestiae corrupti, ducimus aliquam corporis explicabo eos, est tempora veritatis atque! Consequuntur iusto corporis hic accusantium officiis id dicta porro consequatur quia esse velit ratione dolores dignissimos, eum temporibus repellat distinctio error. Molestias minus saepe aliquam veritatis dolore similique minima.&amp;lt;/p&amp;gt;&amp;lt;div&amp;gt;&amp;lt;div&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias nisi molestiae corrupti, ducimus aliquam corporis explicabo eos, est tempora veritatis atque! Consequuntur iusto corporis hic accusantium officiis id dicta porro consequatur quia esse velit ratione dolores dignissimos, eum temporibus repellat distinctio error. Molestias minus saepe aliquam veritatis dolore similique minima.&amp;lt;/div&amp;gt;&amp;lt;/div&amp;gt;&amp;lt;div&amp;gt;&amp;lt;br&amp;gt;&amp;lt;/div&amp;gt;', '1_&_9', '2020-02-09-gambar-lorem-ipsum-dolor-sit-amet-consectetur-adipisicing.jpg', '1_&_2', '2020-02-09 15:39:18', '1', '2020-02-09 15:44:45', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama_lengkap`, `email`, `username`, `password`, `jekel`, `no_hp`, `alamat`) VALUES
(2, '7532', 'klndklnw', 'tes@tes.com', 'lknwkvw', '$2y$10$/41uXvIL', 'P', '3252463', 'dfhefe');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(14) NOT NULL,
  `nama_mhs` varchar(35) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `penasehat_akademik` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `username`, `password`, `prodi`, `kelas`, `penasehat_akademik`) VALUES
('1410031802063', 'Deny Sahara', '1410031802063', 'be016d6749680f379af0d848fba155be', 'Teknik Informatika', 'A', 'Susanti, M.TI'),
('1410031802071', 'Edy Ricardo', '1410031802071', '76cbee0cae4a0ee8857872aa9b6ddb35', 'Teknik Informatika', 'A', 'Lusiana, M.Kom'),
('1410031802190', 'Putra Budiman', '1410031802190', '48101ab6493ab81f6a4f0fff99eb8b0e', 'Teknik Informatika', 'A', 'Torkis Nasution, M. Kom'),
('1510031802061', 'Jumalia', '1510031802061', 'e60368cab59c7ba55aa09ef0de8836d5', 'Teknik Informatika', 'B', 'Torkis Nasution, M.Kom'),
('1510031802067', 'Lusy Numadani', '1510031802067', '654f11684ced9c22c86c2a29385fb76b', 'Teknik Informatika', 'B', 'Lusiana, M.Kom'),
('1510031802102', 'Pramesti Regito DianaUli', '1510031802102', '78b500d32b0682a1d411a9d88d433dc6', 'Teknik Informatika', 'D', 'Karpen, M.Kom'),
('1610031802038', 'Fika Felanda Ardelia', '1610031802038', '94cffc68d914894de0e4ea4528e238de', 'Teknik Informatika', 'A', 'Lusiana, M.Kom'),
('1610031802045', 'Intan Urfa. KS', '1610031802045', '5503cbccc28e71fe630114542460d6ac', 'Teknik Informatika', 'A', 'Tashid, M.Kom'),
('1610031802138', 'Gordon Hutajulu', '1610031802138', '6bc154ed37ceb12b06ed88dc47755f48', 'Teknik Informatika', 'A', 'Triyani Arita Fitri, M.Kom'),
('1710031802007', 'Sri Wahyu Ningsih', '1710031802007', '9111bec72da3c52534c4245f00335ee3', 'Teknik Informatika', 'B', 'Helda Yenni, M.Kom'),
('1710031802013', 'Agung Prasetio', '1710031802013', '437e12c6d0629187ca489e12f1ead089', 'Teknik Informatika', 'B', 'Mardainis, M.Kom'),
('1710031802025', 'Aulia Agusti', '1710031802025', '34f96458e2ee1389477480745e9ee316', 'Teknik Informatika', 'A', 'Dwi Haryono, M.Kom'),
('1810031802026', 'Ariella Chairunissa Zulimasri', '1810031802026', '4d6e486845a6c4b7b7a5ced69b64e6bf', 'Teknik Informatika', 'A', 'Wirta Agustin, M.Kom'),
('1810031802030', 'Aulia Okta Winarsi', '1810031802030', 'b8c48465bac22927d7d7615a6172ec7f', 'Teknik Informatika', 'A', 'Edwar Ali, M.Kom'),
('1810031802037', 'Dodo Nov Toe Esa', '1710031802007', '9111bec72da3c52534c4245f00335ee3', 'Teknik Informatika', 'A', 'Susi Erlinda, M.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id_tag` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id_tag`, `tag`) VALUES
(1, 'Olahraga'),
(2, 'Teknologi'),
(9, 'Hiburan');

-- --------------------------------------------------------

--
-- Table structure for table `tag_berita`
--

CREATE TABLE `tag_berita` (
  `id` int(3) NOT NULL,
  `id_tag` int(3) NOT NULL,
  `id_berita` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag_berita`
--

INSERT INTO `tag_berita` (`id`, `id_tag`, `id_berita`) VALUES
(20, 1, 29),
(21, 9, 29);

-- --------------------------------------------------------

--
-- Table structure for table `user_berita`
--

CREATE TABLE `user_berita` (
  `id` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_berita` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_berita`
--

INSERT INTO `user_berita` (`id`, `id_user`, `id_berita`) VALUES
(31, 1, 29),
(32, 2, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tag_berita`
--
ALTER TABLE `tag_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_berita`
--
ALTER TABLE `user_berita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tag_berita`
--
ALTER TABLE `tag_berita`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_berita`
--
ALTER TABLE `user_berita`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
