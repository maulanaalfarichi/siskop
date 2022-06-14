-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2015 at 11:15 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inkop_pamsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id_bank` varchar(3) NOT NULL,
  `nama_bank` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id_bank`, `nama_bank`, `created_at`, `updated_at`) VALUES
('BCA', 'BANK CENTRAL ASIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BNI', 'BANK NEGARA INDONESIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BRI', 'BANK RAKYAT INDONESIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BTN', 'BANK TABUNGAN NEGARA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MDR', 'BANK MANDIRI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MMT', 'BANK MUAMALAT', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE IF NOT EXISTS `bulan` (
  `id_bulan` int(4) NOT NULL AUTO_INCREMENT,
  `nama_bulan` varchar(60) NOT NULL,
  PRIMARY KEY (`id_bulan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'JANUARI'),
(2, 'FEBRUARI'),
(3, 'MARET'),
(4, 'APRIL'),
(5, 'MEI'),
(6, 'JUNI'),
(7, 'JUNI'),
(8, 'AGUSTUS'),
(9, 'SEPTEMBER'),
(10, 'OKTOBER'),
(11, 'NOVEMBER'),
(12, 'DESEMBER');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE IF NOT EXISTS `claims` (
  `id_claim` int(8) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_rumah` varchar(255) NOT NULL,
  `hubungan` varchar(20) NOT NULL,
  `jenis_pengajuan` varchar(30) NOT NULL,
  `id_peserta` int(8) NOT NULL,
  `id_status` int(2) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_bank` varchar(3) NOT NULL,
  `cabang` varchar(60) NOT NULL,
  `nama_rekening` varchar(60) NOT NULL,
  `no_rekening` varchar(60) NOT NULL,
  PRIMARY KEY (`id_claim`),
  KEY `id_peserta` (`id_peserta`),
  KEY `id_status` (`id_status`),
  KEY `id_bank` (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id_claim`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat_rumah`, `hubungan`, `jenis_pengajuan`, `id_peserta`, `id_status`, `keterangan`, `id_bank`, `cabang`, `nama_rekening`, `no_rekening`) VALUES
(2015010001, 'TOEKO TRIYANTO', 'YOGYAKARTA', '1984-06-19', 'GRIYA KOTA BEKASI 2 BLOK B29/2', 'PESERTA SENDIRI', 'MANFAAT NILAI TUNAI', 2015010002, 1, '', 'BCA', 'KRAMAT', 'TOEKO TRIYANTO', '8736656546464');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', '{"account.read":1,"account.create":1,"account.update":1,"account.destroy":1,"subaccount.read":1,"subaccount.create":1,"subaccount.update":1,"subaccount.destroy":1,"coa.read":1,"coa.create":1,"coa.update":1,"coa.destroy":1,"register.read":1,"register.create":1,"register.update":1,"register.destroy":1,"group.read":1,"group.create":1,"group.update":1,"group.destroy":1,"user.read":1,"user.create":1,"user.update":1,"user.destroy":1}', '2015-01-06 01:32:38', '2015-01-06 01:32:38'),
(2, 'user', '{"account.read":1,"account.create":1,"account.update":1,"account.destroy":1,"subaccount.read":1,"subaccount.create":1,"subaccount.update":1,"subaccount.destroy":1,"coa.read":1,"coa.create":1,"coa.update":1,"coa.destroy":1,"register.read":1,"register.create":1,"register.update":1,"register.destroy":1,"group.read":1,"group.create":1,"group.update":1,"group.destroy":1,"user.read":1,"user.create":1,"user.update":1,"user.destroy":1}', '2015-01-06 01:33:01', '2015-01-06 01:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `manfaats`
--

CREATE TABLE IF NOT EXISTS `manfaats` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_paket` varchar(5) NOT NULL,
  `bulan` int(4) NOT NULL,
  `manfaat` decimal(18,2) NOT NULL,
  `santunan` decimal(18,2) NOT NULL,
  `tambahan` decimal(18,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_paket` (`id_paket`,`bulan`),
  KEY `bulan` (`bulan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `manfaats`
--

INSERT INTO `manfaats` (`id`, `id_paket`, `bulan`, `manfaat`, `santunan`, `tambahan`, `created_at`, `updated_at`) VALUES
(1, 'A-50', 1, '37324.00', '0.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'A-50', 4, '1000000.00', '0.00', '0.00', '2015-01-19 10:05:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pakets`
--

CREATE TABLE IF NOT EXISTS `pakets` (
  `id_paket` varchar(5) NOT NULL,
  `nama_paket` varchar(60) NOT NULL,
  `iuran` decimal(18,2) NOT NULL,
  `premi` decimal(18,2) NOT NULL,
  `operasional` decimal(18,2) NOT NULL,
  `cadangan` decimal(18,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakets`
--

INSERT INTO `pakets` (`id_paket`, `nama_paket`, `iuran`, `premi`, `operasional`, `cadangan`, `created_at`, `updated_at`) VALUES
('A-50', 'A-50000', '50000.00', '9200.00', '5000.00', '35800.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pdams`
--

CREATE TABLE IF NOT EXISTS `pdams` (
  `id_pdam` int(4) NOT NULL AUTO_INCREMENT,
  `nama_pdam` varchar(60) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_pdam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pdams`
--

INSERT INTO `pdams` (`id_pdam`, `nama_pdam`, `alamat`, `telepon`, `fax`, `created_at`, `updated_at`) VALUES
(1, 'PDAM TIRTA HANDAYANI', 'KABUPATEN GUNUNG KIDUL JL. KI AGENG GIRING 12 WONOSARI. GUNUNG KIDUL - 55931', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'PDAM KOTA SURAKARTA', 'JL. ADI SUCIPTO NO 143 SURAKARTA -57145', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pesertas`
--

CREATE TABLE IF NOT EXISTS `pesertas` (
  `id_peserta` int(8) NOT NULL,
  `nama_peserta` varchar(60) NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `id_pdam` int(4) NOT NULL,
  `id_paket` varchar(5) NOT NULL,
  `tanggal_masuk` date NOT NULL DEFAULT '0000-00-00',
  `tanggal_berhenti` date NOT NULL DEFAULT '0000-00-00',
  `tanggal_proses` date NOT NULL DEFAULT '0000-00-00',
  `nama_ahli_waris` varchar(60) NOT NULL,
  `id_bank` varchar(3) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `atas_nama` varchar(60) NOT NULL,
  `id_status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_peserta`),
  KEY `id_pdam` (`id_pdam`),
  KEY `id_paket` (`id_paket`),
  KEY `id_status` (`id_status`),
  KEY `id_bank` (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesertas`
--

INSERT INTO `pesertas` (`id_peserta`, `nama_peserta`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `telpon`, `handphone`, `id_pdam`, `id_paket`, `tanggal_masuk`, `tanggal_berhenti`, `tanggal_proses`, `nama_ahli_waris`, `id_bank`, `nomor_rekening`, `atas_nama`, `id_status`, `created_at`, `updated_at`) VALUES
(2015010002, 'TOEKO TRIYANTO', 'YOGYAKARTA', '1984-06-19', 'L', 'GRIYA KOTA BEKASI 2 B29/2', '085920527954', '085920527954', 1, 'A-50', '2011-01-31', '0000-00-00', '0000-00-00', 'ADITYA PRATAMA SAPUTRA', 'BCA', '87736545554', 'TOEKO TRIYANTO', 0, '2015-01-19 08:47:15', '2015-01-09 01:52:29'),
(2015010003, 'LINA TRI KUSUMAWATI', 'BANDUNG', '1988-01-16', 'P', 'GRIYA KOTA BEKASI 2', '085920527954', '085920527954', 2, 'A-50', '2014-01-02', '1970-01-01', '1970-01-01', 'ADITYA PRATAMA SAPUTRA', 'BCA', '87736545554', 'TOEKO TRIYANTO', 0, '2015-01-19 08:32:02', '2015-01-13 01:28:31'),
(2015010004, 'xxxxxxxx', 'YOGYAKARTA', '1982-01-01', 'P', 'xcxcxz', '085920527954', '085920527954', 1, 'A-50', '2014-12-02', '1970-01-01', '1970-01-01', 'ADITYA PRATAMA SAPUTRA', 'BCA', '87736545554', 'TOEKO TRIYANTO', 0, '2015-01-19 08:48:21', '2015-01-19 00:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(2) NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  `tarif` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `keterangan`, `tarif`, `created_at`, `updated_at`) VALUES
(0, 'AKTIF', 100, '2015-01-13 09:03:07', '0000-00-00 00:00:00'),
(1, 'PENSIUN NORMAL', 100, '2015-01-13 09:03:18', '0000-00-00 00:00:00'),
(2, 'PENSIUN DITUNDA', 40, '2015-01-13 09:03:27', '0000-00-00 00:00:00'),
(3, 'PENSIUN DIPERCEPAT', 40, '2015-01-13 09:03:36', '0000-00-00 00:00:00'),
(4, 'MENINGGAL DUNIA', 100, '2015-01-13 09:03:48', '0000-00-00 00:00:00'),
(5, 'MENINGGAL DUNIA ( BUNUH DIRI )', 100, '2015-01-13 09:04:00', '0000-00-00 00:00:00'),
(6, 'BELUM DIAKTIFKAN', 0, '2015-01-19 00:19:51', '2015-01-19 00:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 5, 1, 0, '2015-01-15 03:17:30', '2015-01-15 03:17:30', NULL),
(2, 3, '127.0.0.1', 1, 0, 0, '2015-01-15 03:19:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(3, 'to.eko.triyanto@gmail.com', 'cPm7iAGUSInX7wenad493f70983f4b46c2855199895719bfc5e031d363bc8ab31f7656e5a618801e', 'admin', 1, 'Hr05ZiJKg5KU4l0qOsnBC1i6Asy8cxgtgfkSNIWZTU', NULL, NULL, NULL, NULL, 'toeko', 'triyanto', '2015-01-06 01:32:00', '2015-01-06 01:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(3, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `claims_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id_peserta`),
  ADD CONSTRAINT `claims_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `claims_ibfk_3` FOREIGN KEY (`id_bank`) REFERENCES `banks` (`id_bank`);

--
-- Constraints for table `manfaats`
--
ALTER TABLE `manfaats`
  ADD CONSTRAINT `manfaats_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `pakets` (`id_paket`);

--
-- Constraints for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD CONSTRAINT `pesertas_ibfk_1` FOREIGN KEY (`id_pdam`) REFERENCES `pdams` (`id_pdam`),
  ADD CONSTRAINT `pesertas_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `pakets` (`id_paket`),
  ADD CONSTRAINT `pesertas_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `pesertas_ibfk_4` FOREIGN KEY (`id_bank`) REFERENCES `banks` (`id_bank`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
