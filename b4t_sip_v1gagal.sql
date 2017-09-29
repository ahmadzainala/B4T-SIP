-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2017 at 12:12 AM
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
  `date` date NOT NULL,
  `information` text,
  `date_needs` varchar(50) DEFAULT NULL,
  `that` text
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id_form`, `id_user`, `date`, `information`, `date_needs`, `that`) VALUES
(1, 5, '2017-09-24', 'tes tes', 'Segera', 'dipenuhi secepatnya'),
(2, 6, '2017-09-24', 'blablbablbalab', '2017-09-01', 'diadakan untuk keperluan rapat'),
(3, 5, '2017-09-24', 'xxxxxxx', 'Segera', 'tes lagi dan lagi'),
(9, 5, '2017-09-24', 'zzzzzzzzzzzzzzzzzzzzzzzzzz', '2017-11-20', 'mohon segera di adakan untuk keperluan rapat'),
(10, 5, '2017-09-24', 'azzz', '2017-12-22', 'aweuaweuaweu'),
(11, 5, '2017-09-24', 'asdasdas', 'Segera', 'kumaha aaa');

-- --------------------------------------------------------

--
-- Table structure for table `form_content`
--

CREATE TABLE IF NOT EXISTS `form_content` (
`id_form_content` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `id_items_detail` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_content`
--

INSERT INTO `form_content` (`id_form_content`, `id_form`, `id_items_detail`, `id_supplier`, `quantity`) VALUES
(1, 1, 1, NULL, 12),
(2, 1, 2, NULL, 2),
(3, 1, 3, NULL, 10),
(4, 1, 4, NULL, 1),
(5, 2, 1, NULL, 10),
(6, 3, 2, NULL, 222),
(7, 2, 4, NULL, 22),
(17, 9, 4, NULL, 4),
(28, 9, 4, NULL, 2),
(29, 10, 4, NULL, 10),
(30, 10, 3, NULL, 2),
(31, 10, 2, NULL, 1),
(32, 11, 2, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `items_category`
--

CREATE TABLE IF NOT EXISTS `items_category` (
`id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_category`
--

INSERT INTO `items_category` (`id_category`, `name_category`) VALUES
(1, 'ATK'),
(2, 'Cek');

-- --------------------------------------------------------

--
-- Table structure for table `items_detail`
--

CREATE TABLE IF NOT EXISTS `items_detail` (
`id_items_detail` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_items` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_detail`
--

INSERT INTO `items_detail` (`id_items_detail`, `id_category`, `name_items`) VALUES
(1, 1, 'Buku'),
(2, 1, 'Pensil'),
(3, 1, 'Pulpen'),
(4, 1, 'Penghapus');

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
(1, 'menu management', 'menu_admin', 'fa fa-list-alt', 1, 0),
(2, 'division', 'division', 'fa fa-list-alt', 1, 0),
(3, 'form', 'form', 'fa fa-list-alt', 1, 0),
(4, 'form content', 'form_content', 'fa fa-list-alt', 1, 0),
(5, 'items category', 'items_category', 'fa fa-list-alt', 1, 0),
(6, 'items detail', 'items_detail', 'fa fa-list-alt', 1, 0),
(7, 'position', 'position', 'fa fa-list-alt', 1, 0),
(8, 'supplier category', 'supplier_category', 'fa fa-list-alt', 1, 0),
(9, 'supplier', 'supplier', 'fa fa-list-alt', 1, 0),
(10, 'tracking', 'tracking', 'fa fa-list-alt', 1, 0),
(11, 'tracking status', 'status_tracking', 'fa fa-list-alt', 1, 0),
(12, 'tracking catalog', 'tracking_catalog', 'fa fa-list-alt', 1, 0),
(14, 'user akun', 'user_akun', 'fa fa-list-alt', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
`id_position` int(11) NOT NULL,
  `name_position` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `name_position`) VALUES
(1, 'Admin'),
(2, 'Developer'),
(3, 'Ketua'),
(4, 'Sekertaris');

-- --------------------------------------------------------

--
-- Table structure for table `status_tracking`
--

CREATE TABLE IF NOT EXISTS `status_tracking` (
`id_status_tracking` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akun`
--

INSERT INTO `user_akun` (`id_user`, `username`, `password`, `first_name`, `last_name`, `id_position`, `id_division`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Justin', 'Biber', 1, 1),
(5, 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 'ahmad', 'zainal abiddin', 2, 1),
(6, 'ranggi', '9a36f4e5a98824ef2bbbecd7c324ba47', 'ranggi', 'rahman', 2, 1),
(7, 'Bos', '15fc4a53992beba40ae91e5244e79dff', 'My', 'Bos', 3, 1);

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
MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `form_content`
--
ALTER TABLE `form_content`
MODIFY `id_form_content` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `items_category`
--
ALTER TABLE `items_category`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items_detail`
--
ALTER TABLE `items_detail`
MODIFY `id_items_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu_admin`
--
ALTER TABLE `menu_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status_tracking`
--
ALTER TABLE `status_tracking`
MODIFY `id_status_tracking` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tracking_catalog`
--
ALTER TABLE `tracking_catalog`
MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_akun`
--
ALTER TABLE `user_akun`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`id_status_tracking`) REFERENCES `status_tracking` (`id_status_tracking`),
ADD CONSTRAINT `tracking_ibfk_2` FOREIGN KEY (`id_form`) REFERENCES `form` (`id_form`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
