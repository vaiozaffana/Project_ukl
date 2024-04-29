-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2024 at 03:46 AM
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
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE IF NOT EXISTS `guru` (
  `idGuru` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) DEFAULT NULL,
  `no_telp` int DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `bidang_keahlian` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`idGuru`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE IF NOT EXISTS `kelas` (
  `idKelas` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `idMapel` int DEFAULT NULL,
  PRIMARY KEY (`idKelas`),
  KEY `idMapel` (`idMapel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

DROP TABLE IF EXISTS `mapel`;
CREATE TABLE IF NOT EXISTS `mapel` (
  `idMapel` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idMapel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

DROP TABLE IF EXISTS `materi`;
CREATE TABLE IF NOT EXISTS `materi` (
  `idMateri` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(225) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `idMapel` int DEFAULT NULL,
  PRIMARY KEY (`idMateri`),
  KEY `idMapel` (`idMapel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

DROP TABLE IF EXISTS `pertemuan`;
CREATE TABLE IF NOT EXISTS `pertemuan` (
  `idPertemuan` int NOT NULL AUTO_INCREMENT,
  `durasi` varchar(200) DEFAULT NULL,
  `tanggal_waktu` date DEFAULT NULL,
  `userId` int DEFAULT NULL,
  `idKelas` int DEFAULT NULL,
  `idGuru` int DEFAULT NULL,
  PRIMARY KEY (`idPertemuan`),
  KEY `userId` (`userId`),
  KEY `idKelas` (`idKelas`),
  KEY `idGuru` (`idGuru`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `role`) VALUES
(1, 'vaioprasa', '$2y$10$ePmGmvyuipa8Bxl7dtKvHeK3emyi9pIuKSl3Z74I1.6KIljwWaure', 'user'),
(18, 'pashajimoji151', '$2y$10$zo7JcOEyxaQ6snEAEyCn2ucO4WMXkSfJsjdwFvtobw/LB9Nw06s2W', 'user'),
(10, 'vaiojimoji', '$2y$10$VkD2SEL/IWRa1500a7We.uj59sEdhKKcu2fPCLp0zCDOy.QEvgIoG', 'user'),
(11, 'vaiojimoji151', '$2y$10$YHpKlfCx4JXEBCNsERXuKOAFGfQmzKXIE.IrV4i2iYyoI7KO2Djvm', 'user'),
(12, 'admin', '$2y$10$FzuVz9dxGjgy6PKx92XoGe8QVLov/K2mBuzPBQ6h8LBQBYvrgP9RS', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
