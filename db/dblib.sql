-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2014 at 01:53 PM
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
-- Table structure for table `tm_anggota`
--

CREATE TABLE IF NOT EXISTS `tm_anggota` (
`id_anggota` int(11) NOT NULL,
  `code_anggota` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(50) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tm_buku`
--

CREATE TABLE IF NOT EXISTS `tm_buku` (
`id_buku` int(5) NOT NULL,
  `id_author` int(5) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tm_buku`
--

INSERT INTO `tm_buku` (`id_buku`, `id_author`, `code`, `name`, `poy`, `publisher`, `tgl_datang`, `status`, `created`, `createdby`, `updated`, `updatedby`) VALUES
(1, 1, 'DIG001', 'AutoCAD 2D Mechanical', 2014, 'DigTuts', '2014-11-26', 'Ready', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM'),
(2, 1, 'DIG002', 'AutoCAD 2D Building', 2014, 'DigTuts', '2014-11-26', 'Ready', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM'),
(3, 1, 'DIG003', 'AutoCAD 3D Buiding', 2014, 'DigTuts', '2014-11-27', 'Ready', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM'),
(4, 1, 'DIG004', 'Mechanical Dekstop Fundamental', 2014, 'DigTuts', '2014-11-27', 'Ready', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM'),
(5, 1, 'DIG005', 'Mechanical Dekstop Enginee', 2014, 'DigTuts', '2014-11-27', 'Ready', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM'),
(6, 1, 'DIG006', 'Inventor Fundamental', 2014, 'DigTuts', '2014-11-28', 'Ready', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM'),
(8, 1, 'DIG007', 'Inventor For Manufacture Machine', 2014, 'DigTuts', '2014-11-28', 'Ready', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM'),
(9, 1, 'DIG008', '3D Max', 2014, 'DigTuts', '2014-11-29', 'Ready', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM');

-- --------------------------------------------------------

--
-- Table structure for table `tm_penulis`
--

CREATE TABLE IF NOT EXISTS `tm_penulis` (
`id_author` int(5) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `createdby` varchar(50) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updatedby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tm_penulis`
--

INSERT INTO `tm_penulis` (`id_author`, `first_name`, `last_name`, `email`, `created`, `createdby`, `updated`, `updatedby`) VALUES
(1, 'Ganda', 'Surya Agita, ST', 'manndasuryaagita@gmail.com', '2014-11-27 17:00:00', 'SYSTEM', '2014-11-27 17:00:00', 'SYSTEM');

-- --------------------------------------------------------

--
-- Table structure for table `tm_users`
--

CREATE TABLE IF NOT EXISTS `tm_users` (
`id_users` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sess_id` varchar(100) DEFAULT NULL,
  `active` enum('Y','N') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tm_users`
--

INSERT INTO `tm_users` (`id_users`, `username`, `password`, `name`, `sess_id`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'ptpr9s9n4d6t68h25ng6agu8t2', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tm_anggota`
--
ALTER TABLE `tm_anggota`
 ADD PRIMARY KEY (`id_anggota`), ADD UNIQUE KEY `code_anggota` (`code_anggota`);

--
-- Indexes for table `tm_buku`
--
ALTER TABLE `tm_buku`
 ADD PRIMARY KEY (`id_buku`), ADD UNIQUE KEY `code` (`code`), ADD KEY `Fkey_Penulis` (`id_author`);

--
-- Indexes for table `tm_penulis`
--
ALTER TABLE `tm_penulis`
 ADD PRIMARY KEY (`id_author`);

--
-- Indexes for table `tm_users`
--
ALTER TABLE `tm_users`
 ADD PRIMARY KEY (`id_users`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tm_anggota`
--
ALTER TABLE `tm_anggota`
MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tm_buku`
--
ALTER TABLE `tm_buku`
MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tm_penulis`
--
ALTER TABLE `tm_penulis`
MODIFY `id_author` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tm_users`
--
ALTER TABLE `tm_users`
MODIFY `id_users` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tm_buku`
--
ALTER TABLE `tm_buku`
ADD CONSTRAINT `Fkey_Penulis` FOREIGN KEY (`id_author`) REFERENCES `tm_penulis` (`id_author`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
