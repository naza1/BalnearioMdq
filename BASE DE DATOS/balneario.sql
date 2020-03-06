-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 06:57 PM
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
-- Table structure for table `carpa`
--

CREATE TABLE `carpa` (
  `id_carpa` int(11) NOT NULL,
  `numero_carpa` int(11) NOT NULL,
  `tipo_contrato` char(20) NOT NULL,
  `nombre_pasillo` varchar(255) NOT NULL,
  `detalle_carpa` varchar(255) NOT NULL,
  `cochera_1` int(11) NOT NULL,
  `detalle_cochera1` varchar(255) NOT NULL,
  `cochera_2` int(11) NOT NULL,
  `detalle_cochera2` varchar(255) NOT NULL,
  `nombre_apellido_titular` varchar(255) NOT NULL,
  `ocupacion_actual` int(2) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dni` int(11) NOT NULL,
  `domicilio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='client data';

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `dni`, `domicilio`, `localidad`, `telefono`, `email`, `date_added`) VALUES
(1, 'Alejandro Miguel Clerc', 24914014, 'Brown 3964', 'Mar del Plata', '0223155985815', 'alejandroclerc@gmail.com', '2016-12-19 15:06:00'),
(2, 'Andrea Blondeau', 24914014, 'Brown 3964', 'Mar del Plata', '0223155985815', 'alejandroclerc@gmail.com', '2016-12-19 15:06:00'),
(3, 'Matias Rodriguez', 24914017, 'Brown 3964', 'Mar del Plata', '0223155985815', 'alejandroclerc@gmail.com', '2016-12-19 15:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `cocheras`
--

CREATE TABLE `cocheras` (
  `id_cochera` int(11) NOT NULL,
  `numero_cochera` varchar(11) NOT NULL,
  `cochera_tipo` varchar(30) NOT NULL,
  `tipo_contrato` varchar(11) NOT NULL,
  `nro_patente` varchar(11) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cocheras`
--

INSERT INTO `cocheras` (`id_cochera`, `numero_cochera`, `cochera_tipo`, `tipo_contrato`, `nro_patente`, `observaciones`, `date_added`) VALUES
(1, '679', 'Semicubierta', 'Temporada', 'AC314JL', 'PAGO', '2016-12-19 00:00:00'),
(2, '680', 'Semicubierta', 'Temporada', 'AC314JL', 'PAGO', '2016-12-19 00:00:00'),
(3, '681', 'Semicubierta', 'Temporada', 'AC314JL', 'PAGO', '2016-12-19 00:00:00'),
(4, '682', 'Semicubierta', 'Temporada', 'AC314JL', 'PAGO', '2016-12-19 00:00:00'),
(5, '683', 'Semicubierta', 'Temporada', 'AC314JL', 'PAGO', '2016-12-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `material_identificacion`
--

CREATE TABLE `material_identificacion` (
  `id_identificacion` int(11) NOT NULL,
  `situacion` varchar(30) NOT NULL,
  `descripcion_material` varchar(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material_identificacion`
--

INSERT INTO `material_identificacion` (`id_identificacion`, `situacion`, `descripcion_material`, `date_added`) VALUES
(1, 'Entregado', '', '2016-12-19 00:00:00'),
(2, 'No Entregado', '', '2016-12-19 21:06:37'),
(3, 'Entregado Parcialmente', '', '2016-12-19 21:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `pasillos`
--

CREATE TABLE `pasillos` (
  `id_pasillo` int(11) NOT NULL,
  `nombre_pasillo` varchar(255) NOT NULL,
  `descripcion_pasillo` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasillos`
--

INSERT INTO `pasillos` (`id_pasillo`, `nombre_pasillo`, `descripcion_pasillo`, `date_added`) VALUES
(12, 'Pasillo1 ', 'Carpas del 101 al 199', '2020-01-15 16:15:44'),
(2, 'Pasillo 2', 'Carpas del 201 al 299', '2016-12-19 21:06:37'),
(3, 'Pasillo 3', 'Carpas del 301 al 399', '2016-12-19 21:06:37'),
(4, 'Pasillo 4', 'Carpas del 401 al 499', '2016-12-19 21:06:37'),
(5, 'Pasillo 5', 'Carpas del 501 al 599', '2016-12-19 21:06:37'),
(6, 'Pasillo 6', 'Carpas del 601 al 699', '2016-12-19 21:06:37'),
(7, 'Pasillo 7', 'Carpas del 701 al 799', '2016-12-19 21:06:37'),
(8, 'Pasillo 8', 'Carpas del 801 al 899', '2016-12-19 21:06:37'),
(10, 'Pasillo 9', 'Carpas del 901 al 999', '2020-01-14 01:58:54'),
(11, 'Pasillo 9', 'Carpas del 901 al 999', '2020-01-14 02:05:32'),
(13, 'PRUEBA', 'PRUEBA', '2020-01-15 16:29:03'),
(14, '303', '303', '2020-01-15 16:39:04'),
(15, 'SORETE', '', '2020-01-15 16:46:31'),
(16, 'pepe', 'pepe', '2020-01-15 18:05:10'),
(17, 'SEMANAL', 'PEPE', '2020-01-15 18:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `perfil_tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `perfil_detalle` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`perfil_id`, `perfil_tipo`, `perfil_detalle`) VALUES
(1, 'Administrador', 'Control Total'),
(2, 'Administrativo', 'Procesos Adminitrativos'),
(3, 'Seguridad', 'Ingreso y Egreso de Clientes'),
(4, 'Cocheras', 'Ingreso y Egreso de Vehiculos'),
(5, 'Vestuarios', 'Control de lockers'),
(6, 'Recreacion', 'Control de Eventos'),
(7, 'Demo', 'Demostracion');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `precio_producto` double NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipos_cochera`
--

CREATE TABLE `tipos_cochera` (
  `tipocochera_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `cochera_tipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cochera_detalle` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_cochera`
--

INSERT INTO `tipos_cochera` (`tipocochera_id`, `cochera_tipo`, `cochera_detalle`) VALUES
(1, 'Cubierta', 'Estructura Numerada con Lona'),
(1, 'Semi', 'Estructura Numerada con Media Sombra'),
(2, 'Descubierta', 'Solo espacio numerado en la Playa de Estacionamiento');

-- --------------------------------------------------------

--
-- Table structure for table `tipos_contrato`
--

CREATE TABLE `tipos_contrato` (
  `id_contrato` int(11) NOT NULL,
  `tipo_contrato` varchar(11) NOT NULL,
  `descripcion_contrato` varchar(25) DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipos_contrato`
--

INSERT INTO `tipos_contrato` (`id_contrato`, `tipo_contrato`, `descripcion_contrato`, `date_added`) VALUES
(1, 'Diario', '', '2016-12-19 00:00:00'),
(2, 'Semanal', '', '2016-12-19 21:06:37'),
(3, 'Quincenal', '', '2016-12-19 21:06:37'),
(4, 'Mensual', '', '2016-12-19 21:06:37'),
(5, 'Temporada', '', '2016-12-19 21:06:37'),
(11, 'Especial', 'Prueba', '2020-01-15 19:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(1, 'Obed', 'Alvarado', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-12-19 15:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `nombres` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_nombre` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `usuario_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `usuario_perfil` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_telefono` int(11) NOT NULL,
  `usuario_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasillos`
--
ALTER TABLE `pasillos`
  ADD PRIMARY KEY (`id_pasillo`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`);

--
-- Indexes for table `tipos_contrato`
--
ALTER TABLE `tipos_contrato`
  ADD PRIMARY KEY (`id_contrato`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pasillos`
--
ALTER TABLE `pasillos`
  MODIFY `id_pasillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipos_contrato`
--
ALTER TABLE `tipos_contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
