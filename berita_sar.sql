-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2020 pada 03.49
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(25) NOT NULL,
  `terakhir_login` datetime NOT NULL,
  `aktif` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `username`, `password`, `role`, `terakhir_login`, `aktif`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$k.bkNKTgddZR0GvusYU9m.HU9gcnVPATdgUCsZlGBOQJ8c7KpGtCO', 'admin', '2020-07-08 08:47:03', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `user` varchar(25) NOT NULL,
  `tagar` varchar(25) NOT NULL,
  `slug` text NOT NULL,
  `dibuat_tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `dibuat_oleh` varchar(25) NOT NULL,
  `diedit_tanggal` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `diedit_oleh` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `gambar`, `user`, `tagar`, `slug`, `dibuat_tanggal`, `dibuat_oleh`, `diedit_tanggal`, `diedit_oleh`) VALUES
(36, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, saepe.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt laborum beatae earum nihil odio consequatur officiis laudantium nobis omnis quia necessitatibus, tempore, consequuntur officia ducimus unde doloribus quod! Sunt repellat inventore voluptatum asperiores laboriosam quo odio mollitia culpa. Consequuntur porro tempora labore blanditiis minus fugit doloremque, asperiores deserunt quam. Eum nemo labore, repudiandae atque quibusdam adipisci magni vel quasi maiores saepe quas, ipsum at vero nulla, ullam natus rem aperiam, deleniti cupiditate praesentium? Odit quia omnis eius sit dolorum ab et! Ab quis consequatur nam rerum soluta natus pariatur assumenda ex nisi consectetur distinctio, unde excepturi iusto, eligendi, sequi autem possimus libero corporis perferendis a. Incidunt inventore ipsa placeat dolor laborum eius magni odio tenetur unde illum debitis id sit, voluptatum, veritatis maxime dolorum sed aspernatur reprehenderit voluptate, alias sapiente qui quam impedit! Vero quod ab sed eum esse vitae, debitis a voluptatum quam dignissimos praesentium. Porro repellendus qui numquam nihil incidunt magni in cupiditate, unde quae distinctio doloribus omnis laborum, delectus nesciunt sequi. Voluptates eum et fugit, rem eligendi. Porro voluptate voluptatem quaerat doloremque consequatur ipsam mollitia doloribus optio corporis quis. Rerum exercitationem accusantium, fugit illum optio totam neque dolorum saepe et! Dolore iste dolor, odit excepturi sapiente, voluptate maxime non incidunt iusto fugit odio vitae. Numquam suscipit, enim dolorem neque voluptates est earum et porro, quisquam modi ea provident officiis debitis quae. Quos, nisi, rem. Doloribus incidunt porro rem eius suscipit atque voluptatum laborum ea numquam, praesentium, non ullam eum. In ullam neque, impedit voluptates sequi optio cupiditate at praesentium earum, assumenda provident consequuntur itaque harum, vitae explicabo illo suscipit molestiae cumque debitis, ducimus sapiente accusamus voluptatem porro. Eveniet cum recusandae sed rerum aperiam, non, nisi animi impedit velit quia eum minus accusantium nulla error consectetur sit quisquam. Dolorem adipisci alias quam ipsum dolores facere doloribus eligendi totam, dolore doloremque. Asperiores totam alias voluptatibus dolorem doloribus itaque. Cum error, obcaecati natus! Eligendi reiciendis ex officiis enim consequuntur suscipit sed eveniet, quia nesciunt veritatis deserunt expedita! Dolores adipisci hic amet vel quos necessitatibus similique nesciunt, minima perferendis explicabo voluptatibus incidunt. Voluptas eveniet, facere quaerat, provident consequuntur voluptate tenetur quia voluptatem unde quibusdam consequatur amet sunt illum, accusamus exercitationem doloribus magni ipsa. Laudantium nam iusto doloremque ab distinctio quaerat fugiat fugit. Accusamus dolor consequuntur, et maiores rerum velit natus deserunt! Fuga nobis magnam blanditiis facilis sit, quam, deserunt eum voluptatibus sapiente quae obcaecati voluptate iste! Eaque, accusantium? Libero sint obcaecati ullam cupiditate impedit facere et similique sed, iusto repellat delectus laborum incidunt placeat suscipit provident perspiciatis quibusdam amet dolores distinctio repellendus iste! Dolor vero pariatur ipsa unde repellat perspiciatis, iusto exercitationem fugit atque error rem corporis cumque, inventore reprehenderit dignissimos placeat nam officiis. Officia molestias dolor molestiae. Quam ipsa vitae, modi sapiente quae adipisci cumque doloribus natus asperiores doloremque veniam ex ducimus. Dolorum necessitatibus saepe at veritatis quod explicabo laborum assumenda fugit possimus labore et laudantium id, excepturi doloremque a, consequuntur ratione sapiente vel esse quas velit ab mollitia facere. Quibusdam adipisci aliquid debitis at rem impedit libero ut error.', '2020-02-27-gambar-lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-labore-saepe.jpg', '1_&_2', '5_&_6', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-labore-saepe.html', '2020-02-27 08:54:02', '1', NULL, ''),
(37, 'ASN Provinsi Riau Raih Penghargaan', '&nbsp;jkweshjjwae lk[hdgsiouahg kokhgiewohag oishsdisghiusg', '2020-06-04-gambar-asn-provinsi-riau-raih-penghargaan.png', '1_&_2', '1_&_2_&_5', 'asn-provinsi-riau-raih-penghargaan.html', '2020-06-04 04:27:40', '1', NULL, ''),
(38, 'kasfjsk khlfsad', 'lkkshad okhgodsa ohiogos', '2020-06-04-gambar-kasfjsk-khlfsad.png', '1_&_2', '2_&_5_&_6', 'kasfjsk-khlfsad.html', '2020-06-04 04:28:25', '1', NULL, ''),
(39, 'oiwyet oihsoi', 'oijiowt iojisodohi ihuisdhguwogh jhgsdui iohgus iiohidskidhsn', '2020-06-04-gambar-oiwyet-oihsoi.png', '1_&_2', '1_&_2_&_3', 'oiwyet-oihsoi.html', '2020-06-04 04:29:14', '1', NULL, ''),
(40, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus sit magnam perferendis ratione harum, nobis atque ut nam similique qui officia ullam modi quam doloribus non odit mollitia illum, consectetur earum quidem! Explicabo eos, rem facere commodi iusto corrupti magni incidunt neque, sed officiis iure quasi temporibus quaerat repellendus ullam suscipit harum dolorem. Blanditiis necessitatibus incidunt temporibus pariatur et vel eaque fugit, reprehenderit id consequatur nostrum aut tenetur facilis assumenda nesciunt eligendi inventore velit, voluptatem fugiat, voluptatum mollitia! Beatae aperiam vel necessitatibus animi ipsum? Sapiente similique culpa distinctio, deleniti cupiditate, temporibus dolorum optio fuga, quaerat quidem laudantium! Consequatur eveniet voluptates, fugit accusantium at soluta quis quod, rerum earum nulla, ab officiis unde veniam cum maiores iusto assumenda fugiat quisquam necessitatibus qui recusandae. Mollitia numquam quibusdam assumenda voluptates voluptate harum eaque maxime rem cum, quisquam perspiciatis ab! Voluptates deleniti, eveniet consequatur natus dolorem molestias laborum voluptate. Aliquam quasi laborum, ex sint maiores veniam excepturi, officiis inventore alias hic, vel corporis laboriosam obcaecati perspiciatis cum nostrum iste nisi culpa animi unde. Corrupti amet sunt aspernatur explicabo eveniet facilis enim ad optio officiis est, voluptas rerum ullam minima excepturi eius itaque ducimus reprehenderit repudiandae incidunt pariatur assumenda esse, laboriosam blanditiis. Maiores exercitationem quas ipsum animi eius vitae corrupti totam sunt, non consequuntur, nisi error. Amet repellendus suscipit modi, ullam, porro corporis quasi distinctio autem ad rem, blanditiis ut atque, nostrum placeat. Placeat iusto suscipit, hic facere recusandae a? Dolorum dolorem itaque, at fugit unde, placeat et cupiditate adipisci laudantium vel est architecto assumenda facilis accusamus, iure quo tempora doloremque velit quidem quos quia ratione tempore. Earum sapiente sint aliquid necessitatibus vel. Officia, maiores! Molestias libero explicabo, incidunt ipsam cupiditate reiciendis nisi hic unde debitis dolor. Eius quidem itaque iste odit consectetur, molestias dolor voluptatibus dolores, totam dolore quam! Mollitia nostrum, voluptatibus cumque unde accusamus fugit quaerat rem, quibusdam ut ratione voluptatem delectus corporis esse incidunt eligendi. Ipsum corporis reprehenderit nemo doloremque culpa dolores iusto veritatis nihil architecto, officiis natus voluptatibus, eligendi asperiores est quam quae consequatur! Voluptatum, illum rerum velit qui! Neque veritatis consectetur possimus quibusdam voluptatibus dolorum asperiores molestias doloremque placeat quisquam, deserunt odio nobis eum quasi eligendi illo amet a rerum impedit temporibus qui ex porro. Natus in atque veniam, pariatur, voluptate error deleniti asperiores, doloribus quos maxime mollitia doloremque, dolor nam quod? Illo necessitatibus esse repellat tempora qui expedita aut impedit, eos possimus perferendis, libero voluptas deleniti. Explicabo a repudiandae enim sed minus iure laudantium incidunt beatae perspiciatis, iste, velit quia iusto tempora voluptatum debitis alias cum sequi. Neque tempore nisi assumenda delectus laborum, odit ut doloribus possimus. Explicabo rerum corporis, ab error nemo consectetur neque deleniti veritatis magni suscipit fuga, vero tempora dolor architecto quaerat ratione ea iure maiores hic nesciunt. Doloribus eligendi, eum quod. Magnam distinctio, doloribus enim tempora consectetur porro, aliquam explicabo repellendus temporibus beatae esse ratione voluptates nesciunt magni odit mollitia ipsam suscipit necessitatibus inventore provident modi nulla. Quia autem laboriosam quisquam provident incidunt expedita aliquam, nulla, ex perferendis recusandae vero totam. Fugit sequi minima, saepe.', '2020-07-08-gambar-lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.jpg', '2', '2_&_6', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.html', '2020-07-08 01:49:21', '1', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `dibuat_tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `status`, `id_user`, `username`, `nama`, `komentar`, `dibuat_tanggal`) VALUES
(5, 23, 'Pegawai', '12345632', 'dosen', 'Dosen A', 'dosen komentar test', '2020-02-10 16:39:44'),
(6, 23, 'Mahasiswa', '1410031802063', '14', 'Deny Sahara', 'mahasiswa komentar test', '2020-02-10 16:40:49'),
(8, 24, 'Dosen', '1', 'dosen', 'dosen a', 'ggwp', '2020-02-16 15:07:01'),
(9, 24, 'Dosen', '1', 'dosen', 'dosen a', 'ggwp', '2020-02-16 15:07:03'),
(10, 24, 'Dosen', '1', 'dosen', 'dosen a', 'ggwp', '2020-02-16 15:07:03'),
(11, 24, 'Dosen', '1', 'dosen', 'dosen a', 'test', '2020-02-16 15:07:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
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
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `username`, `password`, `prodi`, `kelas`, `penasehat_akademik`) VALUES
('1410031802063', 'Deny Sahara', '14', '$2y$10$rs.Uae6xd4D5eV9344ZdKuJbGpM/n/.ChVSTyFvWD6QpS4mv5veFi', 'Teknik Informatika', 'A', 'Susanti, M.TI'),
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
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `dosen` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_lengkap`, `email`, `username`, `password`, `jekel`, `no_hp`, `alamat`, `dosen`) VALUES
(1, '12345632', 'dosen a', 'a@gmai.com', 'dosen', '$2y$10$rs.Uae6xd4D5eV9344ZdKuJbGpM/n/.ChVSTyFvWD6QpS4mv5veFi', 'L', '0823984272', 'pku', '1'),
(3, '12345678', 'Dosen Satu', 'dosen@a.com', 'dosenaja', '$2y$10$p6weKQtRWYi2zTaEJX3r3.z/1t8gRdHe0/L43ve2Q.4/0Y3py5422', 'L', '08081735463', 'Pekanbaru', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id_tag` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id_tag`, `tag`) VALUES
(1, 'pembalap'),
(2, 'import'),
(3, 'ASN'),
(4, 'DosenSmart'),
(5, 'Kampus'),
(6, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_berita`
--

CREATE TABLE `tag_berita` (
  `id` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tag_berita`
--

INSERT INTO `tag_berita` (`id`, `id_tag`, `id_berita`) VALUES
(41, 5, 36),
(42, 6, 36),
(43, 1, 37),
(44, 2, 37),
(45, 5, 37),
(46, 2, 38),
(47, 5, 38),
(48, 6, 38),
(49, 1, 39),
(50, 2, 39),
(51, 3, 39),
(52, 2, 40),
(53, 6, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_berita`
--

CREATE TABLE `user_berita` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_berita`
--

INSERT INTO `user_berita` (`id`, `id_user`, `id_berita`) VALUES
(56, 1, 36),
(57, 2, 36),
(58, 1, 37),
(59, 2, 37),
(60, 1, 38),
(61, 2, 38),
(62, 1, 39),
(63, 2, 39),
(64, 2, 40);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indeks untuk tabel `tag_berita`
--
ALTER TABLE `tag_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_berita`
--
ALTER TABLE `user_berita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tag_berita`
--
ALTER TABLE `tag_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `user_berita`
--
ALTER TABLE `user_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
