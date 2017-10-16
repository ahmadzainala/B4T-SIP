-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 09:08 AM
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
`id_divison` int(11) NOT NULL,
  `name_division` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id_divison`, `name_division`) VALUES
(1, 'IT'),
(2, 'Tata Usaha'),
(3, 'PPK');

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
  `status_submit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id_form`, `id_user`, `date`, `information`, `information_kabid`, `information_TU`, `information_PPK`, `date_needs`, `that`, `read_status_Ketua`, `read_status_TU`, `read_status_PPK`, `status_submit`) VALUES
(28, 6, '2017-10-15 06:02:52', 'Sumber dana dari: apawelah', '', '', '', '2017-10-17', 'coba versi baru', 1, 0, 0, 1),
(29, 5, '2017-10-15 10:41:14', 'sumber dana dari mana aja', 'asdasdsa', 'asdasasd', '', 'Segera', 'coba lagi', 1, 1, 0, 1),
(30, 5, '2017-10-15 10:27:58', 'dana dari dompet sendiri, untuk ...', 'Tvnya kebanyakan, untuk tv di tolak', 'ntaps', 'ntaps lanjutan', 'Segera', 'segera dipenuhi -.-', 1, 1, 1, 1),
(31, 5, '2017-10-15 06:19:17', 'tolak weh', 'loba teuing', '', '', 'Segera', 'aw', 1, 0, 0, 1),
(43, 5, '2017-10-15 10:36:24', 'asd', 'asda', '', '', 'Segera', 'apa weh', 1, 0, 0, 1),
(45, 5, '2017-10-15 10:39:07', 'ssssss', 'cacccc', '', '', 'Segera', 'ssss', 1, 0, 0, 1),
(46, 5, '2017-10-15 10:15:26', 'sdasdasss', '', '', '', 'Segera', 'aaa', 0, 0, 0, 1),
(47, 5, '2017-10-15 11:28:03', 'dana dari sana sini', 'mohon di adakan', 'semoga lancar', 'next', 'Segera', 'aaaaaaaaaaaaaaaaaa', 1, 1, 1, 1),
(48, 5, '2017-10-15 11:30:43', 'asdads', 'aaaaaaaaaaaa', 'ada weh', 'lol', 'Segera', 'testes', 1, 1, 1, 1),
(49, 5, '2017-10-15 10:47:33', 'asdas', 'next', 'more', 'pengadaan', 'Segera', 'aaweeyu', 1, 1, 1, 1),
(50, 5, '2017-10-16 04:25:25', 'asdasd', 'kebanyakan jadi di ubah banyaknya', '', '', 'Segera', 'wait', 1, 1, 0, 1),
(52, 5, '2017-10-16 04:32:56', 'today today', 'ac dikurangi loba teuing', 'aweuaweuaweu', '', 'Segera', 'today', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_content`
--

CREATE TABLE IF NOT EXISTS `form_content` (
`id_form_content` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `id_items_detail` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `status_acc` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity_origin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_content`
--

INSERT INTO `form_content` (`id_form_content`, `id_form`, `id_items_detail`, `id_supplier`, `quantity`, `status_acc`, `unit`, `quantity_origin`) VALUES
(70, 28, 1, NULL, 2, 1, 'buku', 1),
(71, 28, 10, NULL, 10, 0, 'unit', 10),
(72, 28, 2, NULL, 10, 0, 'pensil', 10),
(73, 29, 11, NULL, 10, 0, 'unit', 10),
(76, 30, 1, NULL, 100, 0, 'unit', 100),
(77, 30, 5, NULL, 1, 0, 'unit', 1),
(78, 30, 9, NULL, 2, 0, 'unit', 2),
(79, 30, 11, NULL, 100, 0, 'unit', 100),
(80, 31, 9, NULL, 100, 0, 'unit', 100),
(83, 43, 11, NULL, 1, 1, 'unit', 1),
(84, 43, 1, NULL, 2, 1, '3s', 2),
(85, 43, 9, NULL, 1, 1, 'unit', 1),
(86, 43, 3, NULL, 2, 1, 's', 2),
(87, 43, 7, NULL, 2, 1, '3as', 2),
(88, 45, 12, NULL, 1, 0, 'paket', 1),
(89, 45, 13, NULL, 2, 0, 'unit', 2),
(90, 46, 14, NULL, 3, 0, 'unit', 3),
(91, 46, 9, NULL, 3, 0, 'unit', 3),
(92, 46, 5, NULL, 4, 0, 'unit', 4),
(93, 47, 1, NULL, 500, 1, 'unit', 500),
(94, 47, 11, NULL, 500, 1, 'set', 500),
(95, 47, 2, NULL, 500, 1, 'set', 500),
(96, 47, 4, NULL, 500, 1, 'set', 500),
(97, 47, 5, NULL, 2, 1, 'unit', 2),
(98, 48, 12, NULL, 100, 0, '2as', 100),
(99, 48, 2, NULL, 232, 0, 'sdad', 232),
(100, 49, 12, NULL, 23, 1, 'as', 23),
(101, 49, 5, NULL, 110, 0, 'ss', 110),
(102, 50, 12, NULL, 10, 1, 'aa', 231),
(103, 52, 15, NULL, 1, 0, 'pasang', 0),
(104, 52, 5, NULL, 1, 1, 'unit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items_category`
--

CREATE TABLE IF NOT EXISTS `items_category` (
`id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_category`
--

INSERT INTO `items_category` (`id_category`, `name_category`) VALUES
(1, 'ATK'),
(2, 'Cek'),
(3, 'Elektronik'),
(4, 'Furnitur'),
(5, 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `items_detail`
--

CREATE TABLE IF NOT EXISTS `items_detail` (
`id_items_detail` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_items` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
(15, 5, 'sepatu');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_admin`
--

INSERT INTO `menu_admin` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`) VALUES
(1, 'menu management', 'menu_admin', 'fa fa-list-alt', 0, 0),
(2, 'division', 'division', 'fa fa-list-alt', 1, 0),
(3, 'form', 'form', 'fa fa-list-alt', 1, 0),
(4, 'form content', 'form_content', 'fa fa-list-alt', 1, 0),
(5, 'items category', 'items_category', 'fa fa-list-alt', 1, 0),
(6, 'items detail', 'items_detail', 'fa fa-list-alt', 1, 0),
(7, 'position', 'position', 'fa fa-list-alt', 1, 0),
(8, 'supplier category', 'supplier_category', 'fa fa-list-alt', 1, 0),
(9, 'supplier', 'supplier', 'fa fa-list-alt', 1, 0),
(10, 'tracking', 'tracking', 'fa fa-list-alt', 0, 0),
(11, 'tracking status', 'status_tracking', 'fa fa-list-alt', 0, 0),
(12, 'tracking catalog', 'tracking_catalog', 'fa fa-list-alt', 0, 0),
(14, 'user akun', 'user_akun', 'fa fa-list-alt', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
`id_position` int(11) NOT NULL,
  `name_position` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `name_position`) VALUES
(1, 'Admin'),
(2, 'Developer'),
(3, 'Kepala Divisi'),
(4, 'Sekertaris'),
(5, 'Kepala Bagian'),
(6, 'Kepala PPK');

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
(0, 'Usulan dalam antrian'),
(1, 'Sudah di Acc Kepala Bidang, Usulan dalam antrian Acc Ketua Bagian TU'),
(2, 'Sudah di Acc TU, Usulan dalam antrian Acc PPK'),
(3, 'Sudah di Acc PPK, Usulan dalam proses pengadaan'),
(4, 'Tidak di Acc'),
(5, 'Selesai'),
(6, 'Revisi'),
(10, 'Belum di Acc Kepala Bidang'),
(11, 'Belum di Acc Kepala Bagian TU'),
(12, 'Belum di Acc Kepala PPK');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id_supplier` int(11) NOT NULL,
  `name_supplier` varchar(255) NOT NULL,
  `alamat` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `name_supplier`, `alamat`) VALUES
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_status_tracking`, `id_form`) VALUES
(4, 10, 28),
(5, 4, 29),
(6, 3, 30),
(7, 4, 31),
(8, 4, 43),
(10, 4, 45),
(11, 0, 46),
(12, 3, 47),
(13, 4, 48),
(14, 3, 49),
(15, 11, 50),
(16, 12, 52);

-- --------------------------------------------------------

--
-- Table structure for table `tracking_catalog`
--

CREATE TABLE IF NOT EXISTS `tracking_catalog` (
`id_catalog` int(11) NOT NULL,
  `id_tracking` int(11) NOT NULL,
  `id_user_acc` int(11) NOT NULL,
  `date_acc` date NOT NULL,
  `acc` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking_catalog`
--

INSERT INTO `tracking_catalog` (`id_catalog`, `id_tracking`, `id_user_acc`, `date_acc`, `acc`) VALUES
(6, 5, 3, '2017-10-15', 1),
(7, 7, 3, '2017-10-15', 0),
(8, 5, 3, '2017-10-15', 1),
(9, 6, 3, '2017-10-15', 1),
(10, 6, 5, '2017-10-15', 1),
(11, 6, 6, '2017-10-15', 1),
(12, 8, 3, '2017-10-15', 0),
(13, 10, 3, '2017-10-15', 0),
(14, 5, 5, '2017-10-15', 0),
(15, 14, 3, '2017-10-15', 1),
(16, 14, 5, '2017-10-15', 1),
(17, 14, 6, '2017-10-15', 1),
(18, 12, 3, '2017-10-15', 1),
(19, 12, 5, '2017-10-15', 1),
(20, 13, 3, '2017-10-15', 1),
(21, 13, 5, '2017-10-15', 1),
(22, 12, 6, '2017-10-15', 1),
(23, 13, 6, '2017-10-15', 0),
(24, 15, 3, '2017-10-16', 1),
(25, 16, 3, '2017-10-16', 1),
(26, 16, 5, '2017-10-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_akun`
--

CREATE TABLE IF NOT EXISTS `user_akun` (
`id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `id_position` int(11) NOT NULL,
  `id_division` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akun`
--

INSERT INTO `user_akun` (`id_user`, `username`, `password`, `first_name`, `last_name`, `id_position`, `id_division`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Justin', 'Biber', 1, 1),
(5, 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 'ahmad', 'zainal abiddin', 2, 1),
(6, 'ranggi', '9a36f4e5a98824ef2bbbecd7c324ba47', 'ranggi', 'rahman', 2, 1),
(7, 'Bos', '15fc4a53992beba40ae91e5244e79dff', 'My', 'Bos', 3, 1),
(8, 'Wiwi', '38f2f8bb5145c0b899542570b91153f6', 'Wiwi', 'Juwita', 4, 2),
(9, 'bosTU', '0706855e2208fd7a331ea6df9c3137fc', 'TU', 'TU', 5, 2),
(10, 'bosPPK', 'f953c25b1fb8a7fe361e8936e90f6188', 'PPK', 'PPK', 6, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division`
--
ALTER TABLE `division`
 ADD PRIMARY KEY (`id_divison`);

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
-- Indexes for table `tracking_catalog`
--
ALTER TABLE `tracking_catalog`
 ADD PRIMARY KEY (`id_catalog`);

--
-- Indexes for table `user_akun`
--
ALTER TABLE `user_akun`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
MODIFY `id_divison` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `form_content`
--
ALTER TABLE `form_content`
MODIFY `id_form_content` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `items_category`
--
ALTER TABLE `items_category`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `items_detail`
--
ALTER TABLE `items_detail`
MODIFY `id_items_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `menu_admin`
--
ALTER TABLE `menu_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tracking_catalog`
--
ALTER TABLE `tracking_catalog`
MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user_akun`
--
ALTER TABLE `user_akun`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
