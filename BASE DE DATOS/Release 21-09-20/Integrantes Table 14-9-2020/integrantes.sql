-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 02:42 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balneario`
--

-- --------------------------------------------------------

--
-- Table structure for table `integrantes`
--

CREATE TABLE `integrantes` (
  `Id` int(5) NOT NULL,
  `dni` int(11) UNSIGNED DEFAULT NULL,
  `edad` int(3) NOT NULL,
  `domicilio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `vinculo_nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado_salud` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asistencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `_id_cliente` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `nombre` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='client data';


--
-- Indexes for dumped tables
--

--
-- Indexes for table `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
