-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2015 at 02:30 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inkop_pamsiacc`
--

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE IF NOT EXISTS `klasifikasi` (
  `id_klasifikasi` int(1) NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'AKTIVA', '2015-01-14 14:23:17', '0000-00-00 00:00:00'),
(2, 'KEWAJIBAN', '2015-01-14 14:23:17', '0000-00-00 00:00:00'),
(3, 'EKUITAS', '2015-01-14 14:23:40', '0000-00-00 00:00:00'),
(4, 'PENDAPATAN', '2015-01-14 14:23:40', '0000-00-00 00:00:00'),
(5, 'BEBAN', '2015-01-14 14:24:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rekenings`
--

CREATE TABLE IF NOT EXISTS `rekenings` (
  `id_rekening` int(6) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `id_klasifikasi` int(1) NOT NULL,
  `parent_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_rekening`),
  KEY `id_klasifikasi` (`id_klasifikasi`),
  KEY `parent_id` (`parent_id`),
  KEY `id_klasifikasi_2` (`id_klasifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekenings`
--

INSERT INTO `rekenings` (`id_rekening`, `nama_rekening`, `id_klasifikasi`, `parent_id`, `created_at`, `updated_at`) VALUES
(100000, 'AKTIVA', 1, 100000, '2015-01-13 17:00:00', '2015-01-13 17:00:00'),
(110000, 'AKTIVA LANCAR', 1, 100000, '2015-01-14 14:34:02', '0000-00-00 00:00:00'),
(111000, 'KAS DITANGAN', 1, 110000, '2015-01-14 14:43:30', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekenings`
--
ALTER TABLE `rekenings`
  ADD CONSTRAINT `rekenings_ibfk_1` FOREIGN KEY (`id_klasifikasi`) REFERENCES `klasifikasi` (`id_klasifikasi`),
  ADD CONSTRAINT `rekenings_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `rekenings` (`id_rekening`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
