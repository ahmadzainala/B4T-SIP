-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2017 at 08:42 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id_divison`, `name_division`) VALUES
(1, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE IF NOT EXISTS `form` (
`id_form` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `information` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_content`
--

CREATE TABLE IF NOT EXISTS `form_content` (
`id_form_content` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `id_items_detail` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items_category`
--

CREATE TABLE IF NOT EXISTS `items_category` (
`id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items_detail`
--

CREATE TABLE IF NOT EXISTS `items_detail` (
`id_items_detail` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_items` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
`id_position` int(11) NOT NULL,
  `name_position` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `name_position`) VALUES
(1, 'Admin');

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
  `id_supplier_category` int(11) NOT NULL,
  `name_supplier` varchar(255) NOT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_category`
--

CREATE TABLE IF NOT EXISTS `supplier_category` (
`id_supplier_category` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akun`
--

INSERT INTO `user_akun` (`id_user`, `username`, `password`, `first_name`, `last_name`, `id_position`, `id_division`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Justin', 'Biber', 1, 1);

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
 ADD PRIMARY KEY (`id_supplier`), ADD KEY `id_supplier_category` (`id_supplier_category`);

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
MODIFY `id_divison` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form_content`
--
ALTER TABLE `form_content`
MODIFY `id_form_content` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items_category`
--
ALTER TABLE `items_category`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items_detail`
--
ALTER TABLE `items_detail`
MODIFY `id_items_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status_tracking`
--
ALTER TABLE `status_tracking`
MODIFY `id_status_tracking` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier_category`
--
ALTER TABLE `supplier_category`
MODIFY `id_supplier_category` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`id_supplier_category`) REFERENCES `supplier_category` (`id_supplier_category`);

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

CREATE TABLE IF NOT EXISTS `menu_admin_admin` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

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
(13, 'users', 'users', 'fa fa-list-alt', 1, 0),
(14, 'user akun', 'user_akun', 'fa fa-list-alt', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_admin`
--
ALTER TABLE `menu_admin`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_admin`
--
ALTER TABLE `menu_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1505548259, 1, 'Admin', 'istrator', 'ADMIN', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
