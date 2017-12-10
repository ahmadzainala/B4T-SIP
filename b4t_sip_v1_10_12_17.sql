-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 11:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b4t_sip_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
`id_division` int(11) NOT NULL,
  `name_division` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id_division`, `name_division`) VALUES
(1, 'IT'),
(2, 'Tata Usaha'),
(3, 'PPK RM'),
(4, 'PPK BLU'),
(5, 'Pengadaan');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE IF NOT EXISTS `form` (
`id_form` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `information` text,
  `information_kabid` text NOT NULL,
  `information_TU` text NOT NULL,
  `information_PPK` text NOT NULL,
  `date_needs` varchar(50) DEFAULT NULL,
  `that` text,
  `read_status_Ketua` int(11) NOT NULL,
  `read_status_TU` int(11) NOT NULL,
  `read_status_PPK` int(11) NOT NULL,
  `status_submit` int(11) NOT NULL,
  `id_budget` int(11) NOT NULL,
  `name_activity` varchar(255) NOT NULL,
  `read_status_Pengadaan` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id_form`, `id_user`, `date`, `information`, `information_kabid`, `information_TU`, `information_PPK`, `date_needs`, `that`, `read_status_Ketua`, `read_status_TU`, `read_status_PPK`, `status_submit`, `id_budget`, `name_activity`, `read_status_Pengadaan`) VALUES
(28, 6, '2017-10-26 00:42:52', 'Sumber dana dari: apawelah', '', '', '', '2017-10-17', 'coba versi baru', 1, 0, 0, 1, 1, 'template', 0),
(29, 5, '2017-10-26 00:42:52', 'sumber dana dari mana aja', 'asdasdsa', 'asdasasd', '', 'Segera', 'coba lagi', 1, 1, 0, 1, 1, 'template', 0),
(30, 5, '2017-10-26 00:42:52', 'dana dari dompet sendiri, untuk ...', 'Tvnya kebanyakan, untuk tv di tolak', 'ntaps', 'ntaps lanjutan', 'Segera', 'segera dipenuhi -.-', 1, 1, 1, 1, 1, 'template', 0),
(31, 5, '2017-10-26 00:42:52', 'tolak weh', 'loba teuing', '', '', 'Segera', 'aw', 1, 0, 0, 1, 1, 'template', 0),
(43, 5, '2017-10-26 00:42:52', 'asd', 'asda', '', '', 'Segera', 'apa weh', 1, 0, 0, 1, 1, 'template', 0),
(45, 5, '2017-10-26 00:42:52', 'ssssss', 'cacccc', '', '', 'Segera', 'ssss', 1, 0, 0, 1, 1, 'template', 0),
(46, 5, '2017-10-26 00:42:52', 'sdasdasss', 'next to PPK', 'go to PPK', 'stop PPK', 'Segera', 'aaa', 1, 1, 1, 1, 1, 'template', 0),
(47, 5, '2017-10-26 00:42:52', 'dana dari sana sini', 'mohon di adakan', 'semoga lancar', 'next', 'Segera', 'aaaaaaaaaaaaaaaaaa', 1, 1, 1, 1, 1, 'template', 0),
(48, 5, '2017-10-26 00:42:52', 'asdads', 'aaaaaaaaaaaa', 'ada weh', 'lol', 'Segera', 'testes', 1, 1, 1, 1, 1, 'template', 0),
(49, 5, '2017-10-26 00:42:52', 'asdas', 'next', 'more', 'pengadaan', 'Segera', 'aaweeyu', 1, 1, 1, 1, 1, 'template', 0),
(50, 5, '2017-10-26 00:42:52', 'asdasd', 'kebanyakan jadi di ubah banyaknya', '', '', 'Segera', 'wait', 1, 1, 0, 1, 1, 'template', 0),
(52, 5, '2017-10-26 00:42:52', 'today today', 'ac dikurangi loba teuing', 'aweuaweuaweu', '', 'Segera', 'today', 1, 1, 1, 1, 1, 'template', 0),
(53, 5, '2017-10-26 00:42:52', 'asjdhakj', '', '', '', 'Segera', 'kjasdhkaj', 0, 0, 0, 1, 1, 'template', 0),
(59, 5, '2017-10-25 07:45:37', 'Apaajalah yph', 'next', 'stop here', '', 'Segera', 'dipenuhi untuk kegiatan baru', 1, 1, 0, 1, 2, 'Test baru', 0),
(60, 5, '2017-10-26 03:30:47', 'asdasdsda', 'asdsad', '', '', 'Segera', 'asdad', 1, 0, 0, 1, 1, 'asdasd', 0),
(64, 7, '2017-10-26 04:19:25', 'asdadasd', '', 'bosaaaa', '', '2017-10-04', 'sssssss', 1, 1, 0, 1, 2, 'sdssssssssssss', 0),
(65, 7, '2017-10-26 04:18:48', 'asadsda', '', '', '', 'Segera', '2asdads', 1, 0, 0, 1, 2, 'asdasd', 0),
(67, 5, '2017-10-27 07:20:00', 'aweu', 'stop', '', '', 'Segera', 'Stop di Kabid', 1, 0, 0, 1, 2, 'Stop di Kabid', 0),
(68, 5, '2017-10-27 07:51:09', 'aweu', 'gogo', 'stop here', '', '2017-10-28', 'Stop di Kabag', 1, 1, 0, 1, 2, 'Stop di Kabag', 0),
(69, 5, '2017-10-27 07:52:22', 'stop', 'next', 'next', 'stop here', 'Segera', 'Stop di PPK RM', 1, 1, 1, 1, 2, 'Stop di PPK RM', 0),
(70, 5, '2017-10-27 07:58:13', 'blu', 'next', 'sdasdad', 'stop here', 'Segera', 'Stop di PPK BLU', 1, 1, 1, 1, 1, 'Stop di PPK BLU', 0),
(71, 5, '2017-10-27 07:53:11', 'lolos', 'next', 'next', 'coret tv', 'Segera', 'Lolos PPK RM', 1, 1, 1, 1, 2, 'Lolos PPK RM', 0),
(72, 5, '2017-10-27 08:03:55', 'lolos blu', 'next', 'next', 'nextnext', '2017-11-04', 'Lolos PPK BLU', 1, 1, 1, 1, 1, 'Lolos PPK BLU', 0),
(73, 5, '2017-10-27 07:21:42', 'unread', '', '', '', 'Segera', 'Unread Kabid', 1, 0, 0, 1, 2, 'Unread Kabid', 0),
(74, 5, '2017-10-27 07:50:51', 'unread', 'next', '', '', 'Segera', 'unread TU', 1, 1, 0, 1, 1, 'unread TU', 0),
(75, 6, '2017-11-19 13:06:54', 'tes yang edit pengadaan', 'adasda', '', '', 'Segera', 'dipenuhi', 1, 0, 0, 1, 2, 'newlagi', 0),
(76, 5, '2017-11-19 08:08:17', 'asdadasd', '', '', '', 'Segera', 'ssssss', 0, 0, 0, 1, 2, 'aaaaaaa', 0),
(77, 5, '2017-11-19 08:10:34', 'sssssss', '', '', '', 'Segera', 'sssssssssssssssssss', 0, 0, 0, 1, 1, 'asdasdadsa', 0),
(78, 5, '2017-11-19 08:17:30', 'ssssssssssssssss', '', '', '', 'Segera', 'xccccccccc', 0, 0, 0, 1, 2, 'asdaxxx', 0),
(79, 5, '2017-12-10 08:55:30', 'aaaaaaaaaaaaaa', 'aaaaaaa', 'next', 'next', 'Segera', 'cekcek', 1, 1, 1, 1, 2, 'cek sampai pengadaan', 1),
(80, 6, '2017-11-20 15:11:30', '', '', '', '', 'Segera', 'Mobil Dinas Kembali Berjalan', 0, 0, 0, 1, 1, 'Perbaikan Mobil Dinas', 0),
(81, 6, '2017-11-20 15:13:22', '', '', '', '', 'Segera', 'aa', 0, 0, 0, 1, 1, 'aa', 0),
(83, 5, '2017-12-08 14:29:51', '', '', '', '', 'Segera', '', 0, 0, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `form_content`
--

CREATE TABLE IF NOT EXISTS `form_content` (
`id_form_content` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `id_items_detail` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `status_acc` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity_origin` int(11) NOT NULL,
  `id_item_by_pengadaan` int(11) NOT NULL,
  `ready` int(11) NOT NULL,
  `acc_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_content`
--

INSERT INTO `form_content` (`id_form_content`, `id_form`, `id_items_detail`, `id_supplier`, `quantity`, `status_acc`, `unit`, `quantity_origin`, `id_item_by_pengadaan`, `ready`, `acc_user`) VALUES
(116, 67, 12, 0, 0, 0, 'paket', 1, 12, 0, 0),
(117, 67, 1, 0, 0, 0, 'pack', 2, 1, 0, 0),
(118, 68, 12, 0, 0, 0, 'paket', 1, 12, 0, 0),
(119, 69, 12, 0, 0, 0, 'paket', 1, 12, 0, 0),
(120, 70, 12, 0, 0, 0, 'paket', 1, 12, 0, 0),
(121, 71, 12, 0, 0, 0, 'paket', 1, 12, 0, 0),
(122, 71, 5, 0, 1, 1, 'set', 1, 5, 1, 1),
(123, 72, 9, 0, 1, 1, 'set', 1, 17, 1, 0),
(124, 72, 16, 0, 1, 1, 'Set', 2, 16, 1, 0),
(125, 73, 12, 0, 1, 0, 'paket', 1, 12, 0, 0),
(126, 74, 12, 0, 1, 1, 'paket', 1, 12, 0, 0),
(127, 75, 5, 0, 1, 1, 'set', 1, 5, 0, 0),
(128, 75, 1, 0, 1, 1, 'paket', 1, 1, 0, 0),
(129, 76, 5, 0, 1, 0, 'set', 1, 5, 0, 0),
(130, 77, 13, 0, 1, 0, 'paket', 1, 13, 0, 0),
(131, 78, 13, 0, 1, 0, 'set', 1, 13, 0, 0),
(132, 79, 18, 0, 1, 1, 'Staff', 1, 18, 1, 0),
(133, 79, 19, 0, 1, 1, 'Ruang', 1, 19, 0, 0),
(134, 79, 5, 0, 1, 1, 'Unit', 1, 5, 1, 0),
(135, 80, 21, 0, 1, 0, 'Kali', 1, 21, 0, 0),
(136, 81, 22, 0, 1, 0, 'aa', 1, 22, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items_category`
--

CREATE TABLE IF NOT EXISTS `items_category` (
`id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_category`
--

INSERT INTO `items_category` (`id_category`, `name_category`) VALUES
(1, 'ATK'),
(2, 'Cek'),
(3, 'Elektronik'),
(4, 'Furnitur'),
(5, 'baru'),
(6, 'Uncategories'),
(7, 'Kendaraan'),
(8, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `items_detail`
--

CREATE TABLE IF NOT EXISTS `items_detail` (
`id_items_detail` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_items` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_detail`
--

INSERT INTO `items_detail` (`id_items_detail`, `id_category`, `name_items`) VALUES
(1, 1, 'Buku'),
(2, 1, 'Pensil'),
(3, 1, 'Pulpen'),
(4, 1, 'Penghapus'),
(5, 3, 'AC'),
(6, 4, 'Meja'),
(7, 5, 'baju'),
(9, 3, 'TV'),
(10, 3, 'Laptop'),
(11, 1, 'Bulpoin'),
(12, 1, 'alat tulis'),
(13, 1, 'tipek'),
(14, 3, 'HP'),
(15, 5, 'sepatu'),
(16, 3, 'Infocus'),
(17, 3, 'Televisi'),
(18, 6, 'perbaikan AC'),
(19, 6, 'perbaikan Ruangan'),
(20, 6, 'tembok'),
(21, 7, 'Mobil'),
(22, 8, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `menu_admin`
--

CREATE TABLE IF NOT EXISTS `menu_admin` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_admin`
--

INSERT INTO `menu_admin` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`) VALUES
(1, 'menu management', 'menu_admin', 'fa fa-bars', 1, 0),
(2, 'division', 'division', 'fa fa-users', 1, 19),
(3, 'form', 'form', 'fa fa-file-o', 1, 18),
(4, 'form content', 'form_content', 'fa fa-cart-arrow-down', 1, 18),
(5, 'items category', 'items_category', 'fa fa-tags', 1, 21),
(6, 'items detail', 'items_detail', 'fa fa-cubes', 1, 21),
(7, 'position', 'position', 'fa fa-tag', 1, 19),
(8, 'supplier category', 'supplier_category', 'fa fa-tags', 1, 22),
(9, 'supplier', 'supplier', 'fa fa-truck', 1, 22),
(10, 'tracking', 'tracking', 'fa fa-eye', 1, 20),
(11, 'tracking status', 'status_tracking', 'fa fa-info-circle', 1, 20),
(12, 'tracking history', 'tracking_history', 'fa fa-history', 1, 20),
(14, 'user akun', 'user_akun', 'fa fa-user', 1, 19),
(15, 'Source Budget', 'source_budget', 'fa fa-usd', 1, 18),
(16, 'Status Tracking', 'status_tracking', 'fa fa-binoculars', 1, 20),
(18, 'Form Permintaan', '-', 'fa fa-file-o', 1, 0),
(19, 'User', '-', 'fa fa-user', 1, 0),
(20, 'Track', '-', 'fa fa-eye', 1, 0),
(21, 'items', '-', 'fa fa-cubes', 1, 0),
(22, 'Supplier', '-', 'fa fa-truck', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
`id_position` int(11) NOT NULL,
  `name_position` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `name_position`) VALUES
(1, 'Admin'),
(2, 'Developer'),
(3, 'Kepala Divisi/Bidang'),
(4, 'Sekertaris'),
(5, 'Kepala Bagian'),
(6, 'Kepala PPK'),
(7, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `source_budget`
--

CREATE TABLE IF NOT EXISTS `source_budget` (
`id_budget` int(11) NOT NULL,
  `name_source` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `source_budget`
--

INSERT INTO `source_budget` (`id_budget`, `name_source`) VALUES
(1, 'BLU'),
(2, 'RM');

-- --------------------------------------------------------

--
-- Table structure for table `status_tracking`
--

CREATE TABLE IF NOT EXISTS `status_tracking` (
  `id_status_tracking` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_tracking`
--

INSERT INTO `status_tracking` (`id_status_tracking`, `description`) VALUES
(0, 'Menunggu Acc Kepala Bidang'),
(1, 'Menunggu Acc TU'),
(2, 'Menunggu Acc PPK'),
(3, 'Dalam Proses Pengadaan'),
(4, 'Tidak di Acc Kepala Bidang'),
(5, 'Selesai'),
(6, 'Menunggu Validasi Pengadaan oleh Peminta'),
(10, 'Menunggu Acc Kepala Bidang'),
(11, 'Menunggu Acc TU'),
(12, 'Menunggu Acc PPK'),
(13, 'Tidak di Acc TU'),
(14, 'Tidak di Acc PPK'),
(15, 'Dalam Proses Pengadaan');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id_supplier` int(11) NOT NULL,
  `name_supplier` varchar(255) NOT NULL,
  `address` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `name_supplier`, `address`) VALUES
(0, 'Belum ditujukan pada Suplier', 'Null'),
(1, 'Indogorsir', 'coba doang');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_category`
--

CREATE TABLE IF NOT EXISTS `supplier_category` (
`id_supplier_category` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_category`
--

INSERT INTO `supplier_category` (`id_supplier_category`, `id_category`, `id_supplier`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
`id_tracking` int(11) NOT NULL,
  `id_status_tracking` int(11) NOT NULL,
  `id_form` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_status_tracking`, `id_form`) VALUES
(27, 4, 67),
(28, 13, 68),
(29, 14, 69),
(30, 14, 70),
(31, 5, 71),
(32, 3, 72),
(33, 10, 73),
(34, 11, 74),
(35, 1, 75),
(36, 0, 76),
(37, 0, 77),
(38, 0, 78),
(39, 3, 79),
(40, 0, 80),
(41, 0, 81);

-- --------------------------------------------------------

--
-- Table structure for table `tracking_history`
--

CREATE TABLE IF NOT EXISTS `tracking_history` (
`id_catalog` int(11) NOT NULL,
  `id_tracking` int(11) NOT NULL,
  `id_user_acc` int(11) NOT NULL,
  `date_acc` date NOT NULL,
  `acc` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking_history`
--

INSERT INTO `tracking_history` (`id_catalog`, `id_tracking`, `id_user_acc`, `date_acc`, `acc`) VALUES
(6, 5, 3, '2017-10-15', 1),
(8, 5, 3, '2017-10-15', 1),
(9, 6, 3, '2017-10-15', 1),
(11, 6, 6, '2017-10-15', 1),
(39, 27, 0, '2017-10-27', 0),
(40, 28, 0, '2017-10-27', 0),
(41, 29, 0, '2017-10-27', 0),
(42, 30, 0, '2017-10-27', 0),
(43, 31, 0, '2017-10-27', 0),
(44, 32, 0, '2017-10-27', 0),
(45, 27, 3, '2017-10-27', 0),
(46, 33, 0, '2017-10-27', 0),
(47, 34, 0, '2017-10-27', 0),
(48, 34, 3, '2017-10-27', 1),
(49, 28, 3, '2017-10-27', 1),
(50, 29, 3, '2017-10-27', 1),
(51, 30, 3, '2017-10-27', 1),
(52, 31, 3, '2017-10-27', 1),
(53, 32, 3, '2017-10-27', 1),
(54, 28, 5, '2017-10-27', 0),
(55, 29, 5, '2017-10-27', 1),
(56, 31, 5, '2017-10-27', 1),
(57, 29, 6, '2017-10-27', 0),
(58, 31, 6, '2017-10-27', 1),
(59, 30, 5, '2017-10-27', 1),
(60, 32, 5, '2017-10-27', 1),
(61, 30, 6, '2017-10-27', 0),
(62, 32, 6, '2017-10-27', 1),
(63, 31, 7, '2017-10-27', 1),
(64, 35, 0, '2017-11-19', 0),
(65, 36, 0, '2017-11-19', 0),
(66, 37, 0, '2017-11-19', 0),
(67, 38, 0, '2017-11-19', 0),
(68, 35, 3, '2017-11-19', 1),
(69, 39, 0, '2017-11-19', 0),
(70, 39, 3, '2017-11-19', 1),
(71, 39, 5, '2017-11-19', 1),
(72, 39, 6, '2017-11-19', 1),
(73, 40, 0, '2017-11-20', 0),
(74, 41, 0, '2017-11-20', 0),
(75, 31, 2, '2017-12-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_akun`
--

CREATE TABLE IF NOT EXISTS `user_akun` (
`id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_position` int(11) NOT NULL,
  `id_division` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `date_expired` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akun`
--

INSERT INTO `user_akun` (`id_user`, `username`, `password`, `name`, `id_position`, `id_division`, `date_create`, `date_expired`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1, 1, '2017-09-30', '2020-09-30'),
(5, 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 'Ahmad Zainal A.', 2, 1, '2017-09-30', '2020-09-30'),
(6, 'ranggi', '9a36f4e5a98824ef2bbbecd7c324ba47', 'Ranggi Rahman', 2, 1, '2017-09-30', '2020-09-30'),
(7, 'kabid', '6d6827e38b382572cc5be098158174d3', 'Bpk. Kepala Bidang', 3, 1, '2017-09-30', '2020-09-30'),
(8, 'wiwi', '38f2f8bb5145c0b899542570b91153f6', 'Wiwi Juwita', 4, 2, '2017-09-30', '2020-09-30'),
(9, 'tu', 'b6b4ce6df035dcfaa26f3bc32fb89e6a', 'Bpk. TU', 5, 2, '2017-09-30', '2020-09-30'),
(10, 'ppkrm', 'b8edd6573cf55071657bb7d425866afc', 'Bpk. PPK RM', 6, 3, '2017-09-30', '2020-09-30'),
(11, 'ppkblu', '582a9487a34db2fbbadd91382db4a702', 'Bpk. PPK BLU', 6, 4, '2017-09-30', '2020-09-30'),
(12, 'staffpengadaan', '52d10135dc497f0d0ce46ec74a14f3fe', 'Bpk. Staff Pengadaan', 7, 5, '2017-09-30', '2020-09-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division`
--
ALTER TABLE `division`
 ADD PRIMARY KEY (`id_division`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
 ADD PRIMARY KEY (`id_form`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `form_content`
--
ALTER TABLE `form_content`
 ADD PRIMARY KEY (`id_form_content`), ADD KEY `id_form` (`id_form`), ADD KEY `id_items_detail` (`id_items_detail`), ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `items_category`
--
ALTER TABLE `items_category`
 ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `items_detail`
--
ALTER TABLE `items_detail`
 ADD PRIMARY KEY (`id_items_detail`), ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `menu_admin`
--
ALTER TABLE `menu_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
 ADD PRIMARY KEY (`id_position`);

--
-- Indexes for table `source_budget`
--
ALTER TABLE `source_budget`
 ADD PRIMARY KEY (`id_budget`);

--
-- Indexes for table `status_tracking`
--
ALTER TABLE `status_tracking`
 ADD PRIMARY KEY (`id_status_tracking`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `supplier_category`
--
ALTER TABLE `supplier_category`
 ADD PRIMARY KEY (`id_supplier_category`), ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
 ADD PRIMARY KEY (`id_tracking`), ADD KEY `id_status_tracking` (`id_status_tracking`), ADD KEY `id_form` (`id_form`);

--
-- Indexes for table `tracking_history`
--
ALTER TABLE `tracking_history`
 ADD PRIMARY KEY (`id_catalog`);

--
-- Indexes for table `user_akun`
--
ALTER TABLE `user_akun`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
MODIFY `id_division` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `form_content`
--
ALTER TABLE `form_content`
MODIFY `id_form_content` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `items_category`
--
ALTER TABLE `items_category`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `items_detail`
--
ALTER TABLE `items_detail`
MODIFY `id_items_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `menu_admin`
--
ALTER TABLE `menu_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `source_budget`
--
ALTER TABLE `source_budget`
MODIFY `id_budget` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier_category`
--
ALTER TABLE `supplier_category`
MODIFY `id_supplier_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tracking_history`
--
ALTER TABLE `tracking_history`
MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `user_akun`
--
ALTER TABLE `user_akun`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `form`
--
ALTER TABLE `form`
ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_akun` (`id_user`);

--
-- Constraints for table `form_content`
--
ALTER TABLE `form_content`
ADD CONSTRAINT `form_content_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form` (`id_form`),
ADD CONSTRAINT `form_content_ibfk_2` FOREIGN KEY (`id_items_detail`) REFERENCES `items_detail` (`id_items_detail`),
ADD CONSTRAINT `form_content_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `items_detail`
--
ALTER TABLE `items_detail`
ADD CONSTRAINT `items_detail_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `items_category` (`id_category`);

--
-- Constraints for table `supplier_category`
--
ALTER TABLE `supplier_category`
ADD CONSTRAINT `supplier_category_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `items_category` (`id_category`);

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
ADD CONSTRAINT `tracking_ibfk_2` FOREIGN KEY (`id_form`) REFERENCES `form` (`id_form`),
ADD CONSTRAINT `tracking_ibfk_3` FOREIGN KEY (`id_status_tracking`) REFERENCES `status_tracking` (`id_status_tracking`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
