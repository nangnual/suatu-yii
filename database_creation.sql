-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for suatuyii
CREATE DATABASE IF NOT EXISTS `suatuyii` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `suatuyii`;

-- Dumping structure for table suatuyii.jawaban_peserta
CREATE TABLE IF NOT EXISTS `jawaban_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal_ujian` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `id_peserta_test` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jawaban_peserta_soal_ujian` (`id_soal_ujian`),
  KEY `fk_jawaban_peserta_peserta_ujian` (`id_peserta_test`),
  CONSTRAINT `fk_jawaban_peserta_peserta_ujian` FOREIGN KEY (`id_peserta_test`) REFERENCES `peserta_test` (`id`),
  CONSTRAINT `fk_jawaban_peserta_soal_ujian` FOREIGN KEY (`id_soal_ujian`) REFERENCES `soal_ujian` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table suatuyii.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table suatuyii.peserta_test
CREATE TABLE IF NOT EXISTS `peserta_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `waktuStartUjian` datetime NOT NULL,
  `durasiUjian` int(11) NOT NULL,
  `statusUjian` int(1) NOT NULL DEFAULT '0',
  `isFinished` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`id_user`),
  KEY `fk_peserta_test_ujian` (`id_ujian`),
  CONSTRAINT `fk_peserta_test_ujian` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table suatuyii.soal_ujian
CREATE TABLE IF NOT EXISTS `soal_ujian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian` int(11) NOT NULL,
  `soal` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_soal_ujian_ujian` (`id_ujian`),
  CONSTRAINT `fk_soal_ujian_ujian` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table suatuyii.ujian
CREATE TABLE IF NOT EXISTS `ujian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_test` varchar(255) DEFAULT NULL,
  `waktu_test` datetime DEFAULT NULL,
  `durasi_test` int(11) DEFAULT NULL,
  `instruksi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table suatuyii.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `true_password` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `authKey` varchar(32) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
