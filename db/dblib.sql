-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2014 at 06:44 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dblib`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`employee_id` int(11) NOT NULL,
  `name` varchar(85) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `email`, `telephone`) VALUES
(1, 'Dennis Ritchie', 'dritchie@bell.com', '555-154-8745'),
(2, 'Ken Thompson', 'kthompson@bell.com', '555-154-1234'),
(3, 'Steve Jobs', 'sjobs@apple.com', '751-121-8124');

-- --------------------------------------------------------

--
-- Table structure for table `temp_peminjaman`
--

CREATE TABLE IF NOT EXISTS `temp_peminjaman` (
`id_temp` int(11) NOT NULL,
  `code_anggota` varchar(10) NOT NULL,
  `code_buku` varchar(10) NOT NULL,
  `id_users` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tm_anggota`
--

CREATE TABLE IF NOT EXISTS `tm_anggota` (
`id_anggota` int(11) NOT NULL,
  `code_anggota` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(50) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedby` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tm_anggota`
--

INSERT INTO `tm_anggota` (`id_anggota`, `code_anggota`, `name`, `email`, `phone`, `created`, `createdby`, `updated`, `updatedby`) VALUES
(13, 'USR0001', 'H. Muhidin', 'aa@gg.net', '082137288307', '2014-12-20 12:12:10', 'Administrator', '2014-12-20 12:12:10', 'Administrator'),
(14, 'USR0002', 'H Sulam', 'Sugeng@sugeng.net', '083244567888', '2014-12-20 12:25:11', 'Administrator', '2014-12-20 12:12:11', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tm_buku`
--

CREATE TABLE IF NOT EXISTS `tm_buku` (
`id_buku` int(5) NOT NULL,
  `code_author` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `poy` year(4) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `tgl_datang` date NOT NULL,
  `status` enum('Ready','Out') NOT NULL,
  `created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `createdby` varchar(50) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updatedby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tm_buku`
--

INSERT INTO `tm_buku` (`id_buku`, `code_author`, `code`, `name`, `poy`, `publisher`, `tgl_datang`, `status`, `created`, `createdby`, `updated`, `updatedby`) VALUES
(1, 'AUT0001', 'DIG001', 'AutoCAD 2D Fundamental', 2014, 'DigTuts', '2014-11-26', 'Ready', '2014-11-27 10:00:00', 'SYSTEM', '2014-12-14 04:12:58', 'Administrator'),
(2, 'AUT0001', 'DIG002', 'AutoCAD 2D Building', 2014, 'DigTuts', '2014-11-26', 'Ready', '2014-11-27 10:00:00', 'SYSTEM', '2014-11-27 10:00:00', 'SYSTEM'),
(3, 'AUT0001', 'DIG003', 'AutoCAD 3D Buiding', 2014, 'DigTuts', '2014-11-27', 'Ready', '2014-11-27 10:00:00', 'SYSTEM', '2014-11-27 10:00:00', 'SYSTEM'),
(4, 'AUT0001', 'DIG004', 'Mechanical Dekstop Fundamental', 2014, 'DigTuts', '2014-11-27', 'Ready', '2014-11-27 10:00:00', 'SYSTEM', '2014-11-27 10:00:00', 'SYSTEM'),
(5, 'AUT0001', 'DIG005', 'Mechanical Dekstop Enginee', 2014, 'DigTuts', '2014-11-27', 'Ready', '2014-11-27 10:00:00', 'SYSTEM', '2014-11-27 10:00:00', 'SYSTEM'),
(6, 'AUT0001', 'DIG006', 'Inventor Fundamental', 2014, 'DigTuts', '2014-11-28', 'Ready', '2014-11-27 10:00:00', 'SYSTEM', '2014-11-27 10:00:00', 'SYSTEM'),
(8, 'AUT0001', 'DIG007', 'Inventor For Manufacture Machine', 2014, 'DigTuts', '2014-11-28', 'Ready', '2014-11-27 10:00:00', 'SYSTEM', '2014-11-27 10:00:00', 'SYSTEM'),
(9, 'AUT0001', 'DIG008', '3D Max', 2014, 'DigTuts', '2014-11-29', 'Ready', '2014-11-27 10:00:00', 'SYSTEM', '2014-11-27 10:00:00', 'SYSTEM'),
(10, 'AUT0002', 'DIG009', 'PHP Programming', 2014, 'DigTuts', '2014-12-10', 'Ready', '2014-12-09 17:00:00', 'SYSTEM', '2014-12-15 09:12:34', 'Administrator'),
(11, 'AUT0002', 'DIG010', 'PHP Webservice', 2014, 'DigTuts', '2014-12-12', 'Ready', '2014-12-15 06:12:23', 'Administrator', '2014-12-15 09:12:51', 'Administrator'),
(12, 'AUT0002', 'DIG011', 'Extjs Development Cookbook', 2014, 'DigTuts', '2014-12-11', 'Ready', '2014-12-15 06:12:11', 'Administrator', '2014-12-15 09:12:29', 'Administrator'),
(14, 'AUT0002', 'DIG012', 'Bootstrap Fundamental', 2014, 'DigTuts', '2014-12-19', 'Ready', '2014-12-19 03:12:34', 'Administrator', '2014-12-19 03:12:34', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tm_group`
--

CREATE TABLE IF NOT EXISTS `tm_group` (
`id_group` int(11) NOT NULL,
  `nama_group` varchar(25) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(25) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedby` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tm_group`
--

INSERT INTO `tm_group` (`id_group`, `nama_group`, `created`, `createdby`, `updated`, `updatedby`) VALUES
(1, 'Administrator', '2014-12-20 09:32:31', 'SYSTEM', '0000-00-00 00:00:00', 'SYSTEM'),
(2, 'Operator', '2014-12-20 09:32:31', 'SYSTEM', '0000-00-00 00:00:00', 'SYSTEM');

-- --------------------------------------------------------

--
-- Table structure for table `tm_menu`
--

CREATE TABLE IF NOT EXISTS `tm_menu` (
`id_menu` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `cls` int(11) NOT NULL,
  `leaf` int(11) NOT NULL,
  `icon` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `selector` int(11) NOT NULL,
  `isactive` enum('Y','N') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(25) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedby` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tm_penulis`
--

CREATE TABLE IF NOT EXISTS `tm_penulis` (
`id_author` int(5) NOT NULL,
  `code_author` varchar(10) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `createdby` varchar(50) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updatedby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tm_penulis`
--

INSERT INTO `tm_penulis` (`id_author`, `code_author`, `firstname`, `lastname`, `email`, `created`, `createdby`, `updated`, `updatedby`) VALUES
(1, 'AUT0001', 'Ganda', 'Surya Agita, ST', 'manndasuryaagita@gmail.com', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM'),
(5, 'AUT0002', 'Ardian', 'Webi kirda, S.Kom', 'ianwebikirda@gmail.com', '2014-12-15 09:12:14', 'Administrator', '2014-12-19 10:12:21', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tm_users`
--

CREATE TABLE IF NOT EXISTS `tm_users` (
`id_users` int(3) NOT NULL,
  `id_group` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sess_id` varchar(100) DEFAULT NULL,
  `active` enum('Y','N') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tm_users`
--

INSERT INTO `tm_users` (`id_users`, `id_group`, `username`, `password`, `name`, `sess_id`, `active`) VALUES
(2, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '6oi0gq2nkh0vs4r5l1e2j54ae4', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `trs_role_menu`
--

CREATE TABLE IF NOT EXISTS `trs_role_menu` (
`id_rolemenu` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `iscreate` enum('Y','N') NOT NULL,
  `isdelete` enum('Y','N') NOT NULL,
  `isupdate` enum('Y','N') NOT NULL,
  `isaccess` enum('Y','N') NOT NULL,
  `isactive` enum('Y','N') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(25) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedby` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_buku_penulis`
--
CREATE TABLE IF NOT EXISTS `view_buku_penulis` (
`id_buku` int(5)
,`code` varchar(10)
,`name` varchar(50)
,`tgl_datang` date
,`publisher` varchar(50)
,`poy` year(4)
,`code_author` varchar(10)
,`firstname` varchar(35)
,`lastname` varchar(50)
);
-- --------------------------------------------------------

--
-- Structure for view `view_buku_penulis`
--
DROP TABLE IF EXISTS `view_buku_penulis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_buku_penulis` AS select `tm_buku`.`id_buku` AS `id_buku`,`tm_buku`.`code` AS `code`,`tm_buku`.`name` AS `name`,`tm_buku`.`tgl_datang` AS `tgl_datang`,`tm_buku`.`publisher` AS `publisher`,`tm_buku`.`poy` AS `poy`,`tm_penulis`.`code_author` AS `code_author`,`tm_penulis`.`firstname` AS `firstname`,`tm_penulis`.`lastname` AS `lastname` from (`tm_buku` left join `tm_penulis` on((`tm_buku`.`code_author` = `tm_penulis`.`code_author`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `temp_peminjaman`
--
ALTER TABLE `temp_peminjaman`
 ADD PRIMARY KEY (`id_temp`), ADD KEY `code_anggota` (`code_anggota`), ADD KEY `code_buku` (`code_buku`);

--
-- Indexes for table `tm_anggota`
--
ALTER TABLE `tm_anggota`
 ADD PRIMARY KEY (`id_anggota`), ADD UNIQUE KEY `code_anggota` (`code_anggota`);

--
-- Indexes for table `tm_buku`
--
ALTER TABLE `tm_buku`
 ADD PRIMARY KEY (`id_buku`), ADD UNIQUE KEY `code` (`code`), ADD KEY `code_author` (`code_author`);

--
-- Indexes for table `tm_group`
--
ALTER TABLE `tm_group`
 ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `tm_menu`
--
ALTER TABLE `tm_menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tm_penulis`
--
ALTER TABLE `tm_penulis`
 ADD PRIMARY KEY (`id_author`), ADD UNIQUE KEY `code_author` (`code_author`);

--
-- Indexes for table `tm_users`
--
ALTER TABLE `tm_users`
 ADD PRIMARY KEY (`id_users`), ADD UNIQUE KEY `username` (`username`), ADD KEY `id_role` (`id_group`);

--
-- Indexes for table `trs_role_menu`
--
ALTER TABLE `trs_role_menu`
 ADD PRIMARY KEY (`id_rolemenu`), ADD KEY `id_role` (`id_group`,`id_menu`), ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `temp_peminjaman`
--
ALTER TABLE `temp_peminjaman`
MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tm_anggota`
--
ALTER TABLE `tm_anggota`
MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tm_buku`
--
ALTER TABLE `tm_buku`
MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tm_group`
--
ALTER TABLE `tm_group`
MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tm_menu`
--
ALTER TABLE `tm_menu`
MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tm_penulis`
--
ALTER TABLE `tm_penulis`
MODIFY `id_author` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tm_users`
--
ALTER TABLE `tm_users`
MODIFY `id_users` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trs_role_menu`
--
ALTER TABLE `trs_role_menu`
MODIFY `id_rolemenu` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `temp_peminjaman`
--
ALTER TABLE `temp_peminjaman`
ADD CONSTRAINT `fk_temp_anggota` FOREIGN KEY (`code_anggota`) REFERENCES `tm_anggota` (`code_anggota`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_temp_buku` FOREIGN KEY (`code_buku`) REFERENCES `tm_buku` (`code`) ON UPDATE CASCADE;

--
-- Constraints for table `tm_buku`
--
ALTER TABLE `tm_buku`
ADD CONSTRAINT `fkey_author` FOREIGN KEY (`code_author`) REFERENCES `tm_penulis` (`code_author`) ON UPDATE CASCADE;

--
-- Constraints for table `tm_users`
--
ALTER TABLE `tm_users`
ADD CONSTRAINT `fk_user_group` FOREIGN KEY (`id_group`) REFERENCES `tm_group` (`id_group`) ON UPDATE CASCADE;

--
-- Constraints for table `trs_role_menu`
--
ALTER TABLE `trs_role_menu`
ADD CONSTRAINT `fk_menu_group` FOREIGN KEY (`id_group`) REFERENCES `tm_group` (`id_group`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_menuall` FOREIGN KEY (`id_menu`) REFERENCES `tm_menu` (`id_menu`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
