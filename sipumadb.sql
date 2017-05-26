-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2017 at 11:24 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipumadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `fakultas_id` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas_name` varchar(100) NOT NULL,
  `fakultas_desc` text NOT NULL,
  `fakultas_status` enum('Active','Deactive') NOT NULL,
  `fakultas_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fakultas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`fakultas_id`, `fakultas_name`, `fakultas_desc`, `fakultas_status`, `fakultas_create_at`) VALUES
(1, 'Tehnik dan Ilmu Komputer', 'Teknik Informatika, Sistem Informasi, Teknik Komputer, Teknik Elektro, Teknik , Arsitektur, Teknik Sipil, Teknik Industri, Perencanaan Wilayah dan Kota, Akuntansi, Komputerisasi', 'Active', '2017-05-18 12:05:24'),
(2, 'Ekonomi', 'Akuntansi, Manajemen, Manajemen Pemasaran,Keuangan dan Perbankan', 'Active', '2017-05-18 12:10:39'),
(3, 'Sosial dan Politik', 'Komunikasi, Pemerintahan, Hubungan Internasional', 'Active', '2017-05-18 12:11:50'),
(5, 'Desain', 'Komunikasi Visual, Interior', 'Active', '2017-05-18 12:16:45'),
(6, 'Hukum', 'Hukum', 'Active', '2017-05-18 12:17:01'),
(8, 'Pascasarjana', 'Magister Manajeman, Magister Sistem Operasi, Magister Desain', 'Active', '2017-05-18 12:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `hima`
--

CREATE TABLE IF NOT EXISTS `hima` (
  `hima_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hima_name` varchar(100) NOT NULL,
  `hima_desc` text NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `universitas_id` int(11) NOT NULL,
  `hima_status` enum('Active','Deactive') NOT NULL,
  `hima_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hima_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hima`
--

INSERT INTO `hima` (`hima_id`, `user_id`, `hima_name`, `hima_desc`, `fakultas_id`, `universitas_id`, `hima_status`, `hima_create_at`) VALUES
(1, 2, 'IF', 'Teknik Informatika', 1, 2, 'Active', '2017-05-18 13:59:17'),
(2, 15, 'tian', 'tian', 10, 2, 'Active', '2017-05-22 06:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE IF NOT EXISTS `posting` (
  `posting_id` int(11) NOT NULL,
  `hima_id` int(11) NOT NULL,
  `posting_title` varchar(100) NOT NULL,
  `posting_description` text NOT NULL,
  `posting_image` varchar(50) NOT NULL,
  `posting_status` enum('Publish','Unpublish') NOT NULL,
  `posting_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`posting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_status` enum('Active','Deactive') NOT NULL,
  `role_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_status`, `role_create_at`) VALUES
(1, 'Admin', 'Active', '2017-05-18 04:58:15'),
(2, 'HIMA', 'Active', '2017-05-18 04:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_log`
--

CREATE TABLE IF NOT EXISTS `tabel_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_user` varchar(255) DEFAULT NULL,
  `log_tipe` int(11) DEFAULT NULL,
  `log_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `tabel_log`
--

INSERT INTO `tabel_log` (`log_id`, `log_time`, `log_user`, `log_tipe`, `log_desc`) VALUES
(9, '2017-05-19 03:36:21', 'sheptian', 1, 'keluar dari sistem'),
(10, '2017-05-19 03:48:53', 'sheptian', 0, 'masuk ke sistem'),
(11, '2017-05-19 03:52:57', 'sheptian', 2, 'menambahkan data user'),
(12, '2017-05-19 03:53:40', 'sheptian', 3, 'mengubah data user'),
(13, '2017-05-19 03:53:49', 'sheptian', 4, 'menghapus data user'),
(14, '2017-05-19 04:13:06', 'sheptian', 2, 'menambah data role'),
(15, '2017-05-19 04:15:02', 'sheptian', 2, 'menambah data role'),
(16, '2017-05-19 04:15:14', 'sheptian', 3, 'mengubah data role'),
(17, '2017-05-19 04:15:22', 'sheptian', 4, 'menghapus data role'),
(18, '2017-05-19 04:16:42', 'sheptian', 2, 'menambah data fakultas'),
(19, '2017-05-19 04:17:01', 'sheptian', 3, 'mengubah data fakultas'),
(20, '2017-05-19 04:17:08', 'sheptian', 4, 'menghapus data fakultas'),
(21, '2017-05-19 04:17:46', 'sheptian', 2, 'menambah data universitas'),
(22, '2017-05-19 04:18:04', 'sheptian', 3, 'mengubah data universitas'),
(23, '2017-05-19 04:18:12', 'sheptian', 4, 'menghapus data universitas'),
(24, '2017-05-19 04:18:53', 'sheptian', 2, 'menambah data universitas'),
(25, '2017-05-19 04:19:15', 'sheptian', 4, 'menghapus data universitas'),
(26, '2017-05-19 04:19:41', 'sheptian', 2, 'menambah data hima'),
(27, '2017-05-19 04:20:05', 'sheptian', 3, 'mengubah data hima'),
(28, '2017-05-19 04:20:18', 'sheptian', 3, 'mengubah data hima'),
(29, '2017-05-19 04:20:35', 'sheptian', 4, 'menghapus data hima'),
(30, '2017-05-19 04:39:48', 'sheptian', 2, 'menambah data role'),
(31, '2017-05-19 07:49:09', 'sheptian', 2, 'menambahkan data user'),
(32, '2017-05-19 07:49:20', 'sheptian', 4, 'menghapus data user'),
(33, '2017-05-19 07:59:49', 'sheptian', 2, 'menambahkan data user'),
(34, '2017-05-19 08:00:00', 'sheptian', 4, 'menghapus data user'),
(35, '2017-05-19 08:25:26', 'sheptian', 2, 'menambahkan data user'),
(36, '2017-05-19 08:25:31', 'sheptian', 4, 'menghapus data user'),
(37, '2017-05-19 09:12:32', 'sheptian', 3, 'mengubah data universitas'),
(38, '2017-05-20 02:28:51', 'sheptian', 0, 'masuk ke sistem'),
(39, '2017-05-22 02:01:35', 'sheptian', 0, 'masuk ke sistem'),
(40, '2017-05-22 02:08:48', 'sheptian', 2, 'menambahkan data user'),
(41, '2017-05-22 02:08:57', 'sheptian', 4, 'menghapus data user'),
(42, '2017-05-22 02:18:13', 'sheptian', 2, 'menambahkan data user'),
(43, '2017-05-22 02:18:56', 'sheptian', 3, 'mengubah data user'),
(44, '2017-05-22 02:19:26', 'sheptian', 3, 'mengubah data user'),
(45, '2017-05-22 02:19:50', 'sheptian', 4, 'menghapus data user'),
(46, '2017-05-22 02:22:56', 'sheptian', 2, 'menambahkan data user'),
(47, '2017-05-22 02:23:08', 'sheptian', 1, 'keluar dari sistem'),
(48, '2017-05-22 02:23:33', 'tian', 0, 'masuk ke sistem'),
(49, '2017-05-22 02:26:26', 'tian', 3, 'mengubah data user'),
(50, '2017-05-22 02:26:34', 'tian', 4, 'menghapus data user'),
(51, '2017-05-22 02:26:57', 'tian', 3, 'mengubah data user'),
(52, '2017-05-22 02:27:15', 'tian', 3, 'mengubah data user'),
(53, '2017-05-22 02:28:37', 'tian', 3, 'mengubah data user'),
(54, '2017-05-22 02:32:39', 'tian', 3, 'mengubah data user'),
(55, '2017-05-22 02:34:43', 'tian', 3, 'mengubah data user'),
(56, '2017-05-22 02:35:07', 'tian', 3, 'mengubah data user'),
(57, '2017-05-22 02:35:34', 'tian', 2, 'menambahkan data user'),
(58, '2017-05-22 02:35:49', 'tian', 4, 'menghapus data user'),
(59, '2017-05-22 02:48:42', 'tian', 2, 'menambah data role'),
(60, '2017-05-22 02:48:55', 'tian', 3, 'mengubah data role'),
(61, '2017-05-22 02:49:08', 'tian', 3, 'mengubah data role'),
(62, '2017-05-22 02:49:44', 'tian', 4, 'menghapus data role'),
(63, '2017-05-22 02:50:53', 'tian', 3, 'mengubah data role'),
(64, '2017-05-22 02:51:27', 'tian', 3, 'mengubah data role'),
(65, '2017-05-22 02:51:54', 'tian', 2, 'menambah data role'),
(66, '2017-05-22 02:52:33', 'tian', 3, 'mengubah data role'),
(67, '2017-05-22 02:52:55', 'tian', 3, 'mengubah data role'),
(68, '2017-05-22 02:53:02', 'tian', 4, 'menghapus data role'),
(69, '2017-05-22 02:53:07', 'tian', 4, 'menghapus data role'),
(70, '2017-05-22 03:04:58', 'tian', 2, 'menambah data role'),
(71, '2017-05-22 03:05:30', 'tian', 3, 'mengubah data role'),
(72, '2017-05-22 03:05:38', 'tian', 4, 'menghapus data role'),
(73, '2017-05-22 04:21:45', 'tian', 2, 'menambah data fakultas'),
(74, '2017-05-22 04:22:10', 'tian', 3, 'mengubah data fakultas'),
(75, '2017-05-22 04:23:03', 'tian', 3, 'mengubah data fakultas'),
(76, '2017-05-22 04:23:12', 'tian', 3, 'mengubah data fakultas'),
(77, '2017-05-22 04:23:19', 'tian', 4, 'menghapus data fakultas'),
(78, '2017-05-22 04:23:44', 'tian', 2, 'menambah data universitas'),
(79, '2017-05-22 04:23:55', 'tian', 4, 'menghapus data universitas'),
(80, '2017-05-22 04:38:21', 'tian', 2, 'menambah data universitas'),
(81, '2017-05-22 04:38:57', 'tian', 3, 'mengubah data universitas'),
(82, '2017-05-22 04:39:34', 'tian', 3, 'mengubah data universitas'),
(83, '2017-05-22 04:39:45', 'tian', 4, 'menghapus data universitas'),
(84, '2017-05-22 06:18:25', 'tian', 2, 'menambah data hima'),
(85, '2017-05-22 06:18:54', 'tian', 3, 'mengubah data hima'),
(86, '2017-05-22 06:19:05', 'tian', 3, 'mengubah data hima'),
(87, '2017-05-22 06:20:37', 'tian', 1, 'keluar dari sistem'),
(88, '2017-05-22 06:20:43', 'sheptian', 0, 'masuk ke sistem'),
(89, '2017-05-22 06:58:58', 'sheptian', 4, 'menghapus data fakultas'),
(90, '2017-05-22 07:05:48', 'sheptian', 2, 'menambahkan data user'),
(91, '2017-05-22 07:05:55', 'sheptian', 4, 'menghapus data user'),
(92, '2017-05-22 07:08:06', 'sheptian', 1, 'keluar dari sistem'),
(93, '2017-05-22 07:08:21', 'sheptian', 0, 'masuk ke sistem'),
(94, '2017-05-22 07:10:00', 'sheptian', 2, 'menambahkan data user'),
(95, '2017-05-22 07:10:15', 'sheptian', 2, 'menambahkan data user'),
(96, '2017-05-22 07:10:37', 'sheptian', 3, 'mengubah data user'),
(97, '2017-05-22 07:10:45', 'sheptian', 4, 'menghapus data user'),
(98, '2017-05-22 07:10:51', 'sheptian', 4, 'menghapus data user'),
(99, '2017-05-23 06:15:59', 'sheptian', 0, 'masuk ke sistem'),
(100, '2017-05-24 01:55:31', 'sheptian', 0, 'masuk ke sistem'),
(101, '2017-05-24 02:01:39', 'sheptian', 1, 'keluar dari sistem'),
(102, '2017-05-24 02:01:57', 'sheptian', 0, 'masuk ke sistem'),
(103, '2017-05-24 02:05:32', 'sheptian', 2, 'menambah data universitas'),
(104, '2017-05-24 02:13:10', 'sheptian', 3, 'mengubah data fakultas'),
(105, '2017-05-24 02:14:44', 'sheptian', 3, 'mengubah data fakultas'),
(106, '2017-05-24 02:19:04', 'sheptian', 3, 'mengubah data fakultas'),
(107, '2017-05-24 02:26:54', 'sheptian', 3, 'mengubah data fakultas'),
(108, '2017-05-24 02:28:37', 'sheptian', 3, 'mengubah data fakultas'),
(109, '2017-05-24 02:29:25', 'sheptian', 3, 'mengubah data fakultas'),
(110, '2017-05-24 02:31:04', 'sheptian', 3, 'mengubah data fakultas'),
(111, '2017-05-24 02:32:18', 'sheptian', 4, 'menghapus data fakultas'),
(112, '2017-05-24 02:32:30', 'sheptian', 4, 'menghapus data fakultas'),
(113, '2017-05-24 02:33:24', 'sheptian', 3, 'mengubah data fakultas'),
(114, '2017-05-24 02:41:22', 'sheptian', 3, 'mengubah data universitas'),
(115, '2017-05-24 02:42:27', 'sheptian', 3, 'mengubah data universitas'),
(116, '2017-05-24 02:43:05', 'sheptian', 3, 'mengubah data universitas'),
(117, '2017-05-24 02:44:52', 'sheptian', 3, 'mengubah data universitas'),
(118, '2017-05-24 02:45:59', 'sheptian', 3, 'mengubah data universitas'),
(119, '2017-05-24 02:46:15', 'sheptian', 4, 'menghapus data universitas'),
(120, '2017-05-24 02:48:22', 'sheptian', 3, 'mengubah data universitas'),
(121, '2017-05-24 02:49:06', 'sheptian', 3, 'mengubah data universitas'),
(122, '2017-05-24 02:49:37', 'sheptian', 3, 'mengubah data universitas'),
(123, '2017-05-24 02:50:08', 'sheptian', 3, 'mengubah data universitas'),
(124, '2017-05-24 02:53:39', 'sheptian', 3, 'mengubah data user'),
(125, '2017-05-24 02:57:00', 'sheptian', 3, 'mengubah data user'),
(126, '2017-05-24 02:57:25', 'sheptian', 3, 'mengubah data user'),
(127, '2017-05-24 02:57:51', 'sheptian', 3, 'mengubah data user'),
(128, '2017-05-24 02:58:15', 'sheptian', 3, 'mengubah data user'),
(129, '2017-05-24 03:02:41', 'sheptian', 3, 'mengubah data hima'),
(130, '2017-05-24 03:20:42', 'sheptian', 0, 'masuk ke sistem'),
(131, '2017-05-24 03:23:58', 'sheptian', 1, 'keluar dari sistem'),
(132, '2017-05-24 03:26:24', 'sheptian', 0, 'masuk ke sistem'),
(133, '2017-05-24 03:26:47', 'sheptian', 1, 'keluar dari sistem'),
(134, '2017-05-24 04:03:07', 'sheptian', 0, 'masuk ke sistem'),
(135, '2017-05-24 04:40:16', 'sheptian', 1, 'keluar dari sistem'),
(136, '2017-05-24 04:40:34', 'sheptian', 0, 'masuk ke sistem'),
(137, '2017-05-24 04:40:40', 'sheptian', 1, 'keluar dari sistem'),
(138, '2017-05-24 04:40:47', 'firman', 0, 'masuk ke sistem'),
(139, '2017-05-24 04:40:52', 'firman', 1, 'keluar dari sistem'),
(140, '2017-05-24 04:42:00', 'rudy', 1, 'keluar dari sistem'),
(141, '2017-05-24 04:42:21', 'sheptian', 0, 'masuk ke sistem');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE IF NOT EXISTS `universitas` (
  `universitas_id` int(11) NOT NULL AUTO_INCREMENT,
  `universitas_name` varchar(100) NOT NULL,
  `universitas_desc` text NOT NULL,
  `universitas_status` enum('Active','Deactive') NOT NULL,
  `universitas_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`universitas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`universitas_id`, `universitas_name`, `universitas_desc`, `universitas_status`, `universitas_create_at`) VALUES
(2, 'Unikom', 'Universitas Komputer Indonesia, Jalan Dipatiukur No. 112-116, Coblong, Lebakgede, Bandung, Kota Bandung, Jawa Barat 40132', 'Deactive', '2017-05-18 11:26:06'),
(4, 'UNPAS', 'Universitas Pasundan, Jl. Wartawan 4 No.22, Turangga, Lengkong, Kota Bandung, Jawa Barat 40264', 'Active', '2017-05-18 11:54:01'),
(5, 'ITB', 'Institut Teknologi Bandung, Alamat: Jl. Ganesha No.10, Lb. Siliwangi, Coblong, Kota Bandung, Jawa Barat 40132', 'Active', '2017-05-18 11:54:19'),
(6, 'Widyatama', 'Universitas Widyatama, Jl. Cikutra No.204A, Sukapada, Cibeunying Kidul, Kota Bandung, Jawa Barat 40125', 'Active', '2017-05-18 11:54:43'),
(7, 'TELKOM', 'Universitas Telkom, Jl. Telekomunikasi No. 01, Terusan Buah Batu, Sukapura, Dayeuhkolot, Bandung, Jawa Barat 40257', 'Active', '2017-05-18 11:56:49'),
(8, 'UNPAD', 'Universitas Universitas Padjadjaran, Jl. Raya Bandung Sumedang, Hegarmanah, Jatinangor, Kabupaten Sumedang, Jawa Barat 45363', 'Active', '2017-05-24 02:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_status` enum('Active','Deactive') NOT NULL,
  `user_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role_id`, `user_status`, `user_create_at`) VALUES
(1, 'sheptian', 'e2d74b7c4ccda2a5a2ac3819f419e4ef', 1, 'Active', '2017-05-18 05:00:12'),
(2, 'rudy', 'cfce9735de7c3873a55331a4e74b70fc', 2, 'Active', '2017-05-18 05:00:12'),
(5, 'kurniawan', 'c5cddefe4fadb9aaf6a1763b32e6d2cf', 1, 'Deactive', '2017-05-18 06:48:56'),
(12, 'tantan', '65c16b4832d2445bb0a3f8841509c887', 2, 'Deactive', '2017-05-18 08:11:55'),
(19, 'firman', '74bfebec67d1a87b161e5cbcf6f72a4a', 1, 'Active', '2017-05-22 07:10:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
