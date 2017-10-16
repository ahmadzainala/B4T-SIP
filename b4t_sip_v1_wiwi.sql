-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Okt 2017 pada 07.00
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b4t_sip_v1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `division`
--

CREATE TABLE `division` (
  `id_divison` int(11) NOT NULL,
  `name_division` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `division`
--

INSERT INTO `division` (`id_divison`, `name_division`) VALUES
(1, 'IT'),
(2, 'Tata Usaha'),
(3, 'PPK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`id_form`, `id_user`, `date`, `information`, `information_kabid`, `information_TU`, `information_PPK`, `date_needs`, `that`, `read_status_Ketua`, `read_status_TU`, `read_status_PPK`, `status_submit`) VALUES
(1, 5, '2017-09-23 17:00:00', 'tes tes', '', '', '0', 'Segera', 'dipenuhi secepatnya', 1, 0, 0, 1),
(2, 6, '2017-09-23 17:00:00', 'blablbablbalab', '', '', '0', '2017-09-01', 'diadakan untuk keperluan rapat', 1, 0, 0, 1),
(3, 5, '2017-09-23 17:00:00', 'xxxxxxx', '', '', '0', 'Segera', 'tes lagi dan lagi', 0, 0, 0, 1),
(9, 5, '2017-09-23 17:00:00', 'zzzzzzzzzzzzzzzzzzzzzzzzzz', '', '', '0', '2017-11-20', 'mohon segera di adakan untuk keperluan rapat', 0, 0, 0, 1),
(10, 5, '2017-09-23 17:00:00', 'azzz', '', '', '0', '2017-12-22', 'aweuaweuaweu', 0, 0, 0, 1),
(11, 5, '2017-10-06 08:14:51', 'asdasdas', 'kamisss', 'wkkkwkwk', 'okayy', 'Segera', 'kumaha aaa', 1, 0, 0, 1),
(18, 6, '2017-09-28 17:00:00', 'adadadadadaad', '', '', '0', 'Segera', 'sss', 1, 0, 0, 1),
(19, 6, '2017-09-28 17:00:00', 'sssssss', '', '', '0', 'Segera', 'aaa', 1, 0, 0, 1),
(20, 7, '2017-09-28 17:00:00', 'coba lagi', '', '', '0', 'Segera', 'sss', 1, 0, 0, 1),
(23, 5, '2017-09-28 17:00:00', 'coba sebelum presentasi', '', '', '0', '2017-09-07', 'testes lagi', 1, 0, 0, 1),
(24, 6, '2017-09-28 17:00:00', 'dana dari blbablabalba', '', '', '0', '2017-09-15', 'diadakan', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_content`
--

CREATE TABLE `form_content` (
  `id_form_content` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `id_items_detail` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `status_acc` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_content`
--

INSERT INTO `form_content` (`id_form_content`, `id_form`, `id_items_detail`, `id_supplier`, `quantity`, `status_acc`, `unit`) VALUES
(1, 1, 1, NULL, 12, 0, 'unit'),
(2, 1, 2, NULL, 2, 0, ''),
(3, 1, 3, NULL, 10, 0, 'unit'),
(4, 1, 4, NULL, 1, 0, ''),
(6, 3, 2, NULL, 222, 0, 'buah'),
(7, 2, 4, NULL, 22, 0, ''),
(17, 9, 4, NULL, 4, 0, 'lusin'),
(28, 9, 4, NULL, 2, 0, ''),
(29, 10, 4, NULL, 10, 0, ''),
(30, 10, 3, NULL, 2, 0, ''),
(31, 10, 2, NULL, 1, 0, ''),
(32, 11, 2, NULL, 2, 0, ''),
(49, 18, 5, NULL, 1, 0, 'ss'),
(50, 19, 5, NULL, 1, 0, 'bolrh'),
(51, 20, 5, NULL, 1, 0, 'ss'),
(54, 23, 5, NULL, 1, 0, 'unit'),
(56, 24, 4, NULL, 13, 0, 'penghapus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items_category`
--

CREATE TABLE `items_category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `items_category`
--

INSERT INTO `items_category` (`id_category`, `name_category`) VALUES
(1, 'ATK'),
(2, 'Cek'),
(3, 'Elektronik'),
(4, 'Furnitur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items_detail`
--

CREATE TABLE `items_detail` (
  `id_items_detail` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_items` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `items_detail`
--

INSERT INTO `items_detail` (`id_items_detail`, `id_category`, `name_items`) VALUES
(1, 1, 'Buku'),
(2, 1, 'Pensil'),
(3, 1, 'Pulpen'),
(4, 1, 'Penghapus'),
(5, 3, 'AC'),
(6, 4, 'Meja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_admin`
--

CREATE TABLE `menu_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_admin`
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
-- Struktur dari tabel `position`
--

CREATE TABLE `position` (
  `id_position` int(11) NOT NULL,
  `name_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `position`
--

INSERT INTO `position` (`id_position`, `name_position`) VALUES
(1, 'Admin'),
(2, 'Developer'),
(3, 'Ketua'),
(4, 'Sekertaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_tracking`
--

CREATE TABLE `status_tracking` (
  `id_status_tracking` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_tracking`
--

INSERT INTO `status_tracking` (`id_status_tracking`, `description`) VALUES
(1, 'Acc Ketua'),
(2, 'Acc TU'),
(3, 'Acc PPK'),
(4, 'Tidak Acc'),
(10, 'Belum di Baca Ketua'),
(11, 'Belum di Baca TU'),
(12, 'Belum di baca PPK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `name_supplier` varchar(255) NOT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `name_supplier`, `alamat`) VALUES
(1, 'Indogorsir', 'coba doang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_category`
--

CREATE TABLE `supplier_category` (
  `id_supplier_category` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier_category`
--

INSERT INTO `supplier_category` (`id_supplier_category`, `id_category`, `id_supplier`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_status_tracking` int(11) NOT NULL,
  `id_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_status_tracking`, `id_form`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking_catalog`
--

CREATE TABLE `tracking_catalog` (
  `id_catalog` int(11) NOT NULL,
  `id_tracking` int(11) NOT NULL,
  `id_user_acc` int(11) NOT NULL,
  `date_acc` date NOT NULL,
  `acc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akun`
--

CREATE TABLE `user_akun` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `id_position` int(11) NOT NULL,
  `id_division` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akun`
--

INSERT INTO `user_akun` (`id_user`, `username`, `password`, `first_name`, `last_name`, `id_position`, `id_division`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Justin', 'Biber', 1, 1),
(5, 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 'ahmad', 'zainal abiddin', 2, 1),
(6, 'ranggi', '9a36f4e5a98824ef2bbbecd7c324ba47', 'ranggi', 'rahman', 2, 1),
(7, 'Bos', '15fc4a53992beba40ae91e5244e79dff', 'My', 'Bos', 3, 1),
(8, 'Wiwi', '38f2f8bb5145c0b899542570b91153f6', 'Wiwi', 'Juwita', 4, 2);

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
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `form_content`
--
ALTER TABLE `form_content`
  ADD PRIMARY KEY (`id_form_content`),
  ADD KEY `id_form` (`id_form`),
  ADD KEY `id_items_detail` (`id_items_detail`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `items_category`
--
ALTER TABLE `items_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `items_detail`
--
ALTER TABLE `items_detail`
  ADD PRIMARY KEY (`id_items_detail`),
  ADD KEY `id_category` (`id_category`);

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
  ADD PRIMARY KEY (`id_supplier_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`),
  ADD KEY `id_status_tracking` (`id_status_tracking`),
  ADD KEY `id_form` (`id_form`);

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
  MODIFY `id_divison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `form_content`
--
ALTER TABLE `form_content`
  MODIFY `id_form_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `items_category`
--
ALTER TABLE `items_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `items_detail`
--
ALTER TABLE `items_detail`
  MODIFY `id_items_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menu_admin`
--
ALTER TABLE `menu_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier_category`
--
ALTER TABLE `supplier_category`
  MODIFY `id_supplier_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tracking_catalog`
--
ALTER TABLE `tracking_catalog`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_akun`
--
ALTER TABLE `user_akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_akun` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `form_content`
--
ALTER TABLE `form_content`
  ADD CONSTRAINT `form_content_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form` (`id_form`),
  ADD CONSTRAINT `form_content_ibfk_2` FOREIGN KEY (`id_items_detail`) REFERENCES `items_detail` (`id_items_detail`),
  ADD CONSTRAINT `form_content_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `items_detail`
--
ALTER TABLE `items_detail`
  ADD CONSTRAINT `items_detail_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `items_category` (`id_category`);

--
-- Ketidakleluasaan untuk tabel `supplier_category`
--
ALTER TABLE `supplier_category`
  ADD CONSTRAINT `supplier_category_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `items_category` (`id_category`);

--
-- Ketidakleluasaan untuk tabel `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `tracking_ibfk_2` FOREIGN KEY (`id_form`) REFERENCES `form` (`id_form`),
  ADD CONSTRAINT `tracking_ibfk_3` FOREIGN KEY (`id_status_tracking`) REFERENCES `status_tracking` (`id_status_tracking`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
