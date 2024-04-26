-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2024 at 03:31 AM
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
