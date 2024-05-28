-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2024 at 02:22 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `tanggal_pembayaran` date DEFAULT NULL,
  `jumlah_pembayaran` int DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  UNIQUE KEY `fk_userId` (`userId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_pembayaran`, `jumlah_pembayaran`, `metode_pembayaran`, `userId`) VALUES
(31, '2024-05-28', 2000000, 'gopay', 44);

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

DROP TABLE IF EXISTS `pertemuan`;
CREATE TABLE IF NOT EXISTS `pertemuan` (
  `idPertemuan` int NOT NULL AUTO_INCREMENT,
  `durasi` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`idPertemuan`),
  KEY `fk_pertemuan_userId` (`userId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`idPertemuan`, `durasi`, `tanggal`, `waktu`, `userId`) VALUES
(23, '30 menit', '2024-05-29', '22:00:00', 44);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` enum('admin','user','pelajar') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user',
  `email` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `role`, `email`) VALUES
(20, 'admin', 'admin1', 'admin', 'adminbimbel@admin.com'),
(44, 'vaiozaffana', 'vaiozaffana1', 'pelajar', 'vaiozaffana@user.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
