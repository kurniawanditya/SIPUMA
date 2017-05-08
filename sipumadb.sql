-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 04:11 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipumadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `hima`
--

CREATE TABLE `hima` (
  `id_hima` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hima`
--

INSERT INTO `hima` (`id_hima`, `username`, `password`, `id_role`) VALUES
(1, 'himaIF', 'a60f121a92878c4603c62c19ebbd71db', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `create_date` date NOT NULL,
  `id_hima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `title`, `content`, `attachment`, `create_date`, `id_hima`) VALUES
(1, 'Hello SIPUMA', 'Ini konten Inisialisasi Pembuatan Aplikasi SIPUMA.\r\n\r\nThanks', 'http://localhost/sipuma/media/', '2017-05-04', 1),
(2, 'Pengumuman Asal', 'Ini konten Proses Pembuatan Aplikasi SIPUMA', 'http://localhost/sipuma/media/', '2017-05-05', 1),
(5, 'Pengumuman Perkuliahan', 'Untuk seluruh mahasiswa diharapkan masuk kembali perkuliahan bla bla bla blba', '', '2017-05-08', 1),
(6, 'Info Beasiswa 2017', 'Untuk seluruh mahasiswa diharapkan masuk kembali perkuliahan bla bla bla blba', '', '2017-05-08', 1),
(7, 'Jadwal UTS', 'Untuk seluruh mahasiswa diharapkan masuk\r\nkembali perkuliahan bla bla bla blba', '', '2017-05-07', 1),
(8, 'Info Kartu Ujian', 'Untuk seluruh mahasiswa diharapkan masuk\r\nkembali perkuliahan bla bla bla blba', '', '2017-05-06', 1),
(9, 'Panggilan Siswa', 'Untuk seluruh mahasiswa diharapkan masuk  kembali perkuliahan bla bla bla blba', '', '2017-05-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Guest'),
(99, 'Juragan'),
(100, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`) VALUES
(1, 'firman', '71726a0461dd647bf22e1ebb8ef39c7c', 1),
(2, 'rudy', 'cfce9735de7c3873a55331a4e74b70fc', 2),
(3, 'tantan', '2b3235efc1ec93e3437fdaa7a11ba212', 99),
(4, 'sheptian', 'e2d74b7c4ccda2a5a2ac3819f419e4ef', 2),
(5, 'kurniawan', '16ca55b4f29157780eabc6244f49d442', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hima`
--
ALTER TABLE `hima`
  ADD PRIMARY KEY (`id_hima`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_hima` (`id_hima`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hima`
--
ALTER TABLE `hima`
  MODIFY `id_hima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hima`
--
ALTER TABLE `hima`
  ADD CONSTRAINT `hima_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_hima`) REFERENCES `hima` (`id_hima`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
