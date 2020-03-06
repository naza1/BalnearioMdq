-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2016 a las 11:38:12
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simple_stock`
--

-- CONFIGURACION - TIPOS --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasillos` (LISTO)
--

CREATE TABLE IF NOT EXISTS `pasillos` (
  `id_pasillo` int(11) NOT NULL,
  `nombre_pasillo` varchar(255) NOT NULL,
  `descripcion_pasillo` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pasillos` ( LISTO )
--

INSERT INTO `pasillos` (`id_pasillo`,`nombre_pasillo`,`descripcion_pasillo`, `date_added`) VALUES
(1, 'Pasillo 1', 'Carpas del 101 al 199', '2016-12-19 00:00:00'),
(2, 'Pasillo 2', 'Carpas del 201 al 299', '2016-12-19 21:06:37'),
(3, 'Pasillo 3', 'Carpas del 301 al 399', '2016-12-19 21:06:37'),
(4, 'Pasillo 4', 'Carpas del 401 al 499', '2016-12-19 21:06:37'),
(5, 'Pasillo 5', 'Carpas del 501 al 599', '2016-12-19 21:06:37'),
(6, 'Pasillo 6', 'Carpas del 601 al 699', '2016-12-19 21:06:37'),
(7, 'Pasillo 7', 'Carpas del 701 al 799', '2016-12-19 21:06:37'),
(8, 'Pasillo 8', 'Carpas del 801 al 899', '2016-12-19 21:06:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material identificacion` (LISTO)
--

CREATE TABLE IF NOT EXISTS `material_identificacion` (
  `id_identificacion` int(11) NOT NULL,
  `situacion` varchar (30) NOT NULL,
    `descripcion_material` varchar(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `material acreditacion` ( LISTO )
--

INSERT INTO `material_identificacion` (`id_identificacion`, `situacion`, `descripcion_material`, `date_added`) VALUES
(1, 'Entregado', '' '2016-12-19 00:00:00'),
(2, 'No Entregado', '', '2016-12-19 21:06:37'),
(2, 'Entregado Parcialmente', '', '2016-12-19 21:06:37');
-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `tipos de contrato` (REVISAR)
--

CREATE TABLE IF NOT EXISTS `tipos_contrato` (
  `id_contrato` int(11) NOT NULL,
  `tipo_contrato` varchar(11) NOT NULL,
  `fecha_inicio` datetime  NOT NULL,  --- VER FORMATO
  `fecha_finalizacion` datetime NOT NULL, --- VER FORMATO 
   `descripcion_contrato` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos de contrato` ( LISTO )
--

INSERT INTO `tipos_contrato` (`id_contrato`, `tipo_contrato`,`fecha_inicio`,`fecha_finalizacion`,`descripcion_contrato`,`date_added`) VALUES
(1,'Diario','','', '','2016-12-19 00:00:00'),
(2,'Semanal','','','', '2016-12-19 21:06:37'),
(3,'Quincenal''','','', '2016-12-19 21:06:37'),
(4,'Mensual', '','','','2016-12-19 21:06:37'),
(5,'Temporada','''','', '2016-12-19 21:06:37');
-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `cocheras` (REVISAR)
--

CREATE TABLE IF NOT EXISTS `cocheras` (
  `id_cocheras` int(11) NOT NULL,
  `numero_cochera` varchar(11) NOT NULL,
  `cochera_tipo` int(11) NOT NULL,  
  `tipo_contrato` varchar(11) NOT NULL,
  `nro_patente` varchar(11) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
  
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cocheras` ( LISTo )
--

INSERT INTO `cocheras` (`id_cocheras`, `numero_cochera`,`cochera_tipo`,`tipo_contrato`,`nro_patente`,òbservaciones`date_added`,) VALUES
(1,'679','Semicubierta','Temporada','AC314JL','PAGO','2016-12-19 00:00:00'),
(2,'680','Semicubierta','Temporada','AC314JL','PAGO','2016-12-19 00:00:00'),
(3,'681','Semicubierta','Temporada','AC314JL','PAGO','2016-12-19 00:00:00'),
(4,'682','Semicubierta','Temporada','AC314JL','PAGO','2016-12-19 00:00:00'),
(5,'683','Semicubierta','Temporada','AC314JL','PAGO','2016-12-19 00:00:00'),
-- --------------------------------------------------------











--
-- Estructura de tabla para la tabla `historial`  ( VERIFICAR , VER QUE GUARDAR )
--

CREATE TABLE IF NOT EXISTS `historial` (
  `id_historial` int(11) NOT NULL,
  `id_carpa` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nota` varchar(255) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpa`
--

CREATE TABLE IF NOT EXISTS `carpa` (
  `id_carpa` int(11) NOT NULL,   
  `numero_carpa` int(11) NOT NULL,  
  `tipo_contrato`char (20) NOT NULL,    
  `nombre_pasillo` varchar(255) NOT NULL,       
  `detalle_carpa` varchar(255) NOT NULL,  
  `cochera_1` int(11) NOT NULL,
  `detalle_cochera1` varchar(255) NOT NULL, 
  `cochera_2` int(11) NOT NULL,
  `detalle_cochera1` varchar(255) NOT NULL,
  `nombre_apellido_titular` varchar(255) NOT NULL,  
  `ocupacion_actual` int(2) NOT NULL,
  `date_added` datetime NOT NULL, 

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------





--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cliente_id` int(11) NOT NULL  
  `cliente_nombreyapellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL ,
  `cliente_nro_documento int (11) NOT NULL,
  `cliente_domicilio` varchar (255) NOT NULL,
  `cliente_localidad` varchar (155) NOT NULL,
  `cliente_telefono` int(11) NOT NULL ,  
  `cliente_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT ,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='client data';


--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_nombreyapellido`,`cliente_nro_documento`,`cliente_domicilio`, `cliente_localidad`, `cliente_telefono`, `cliente_email`,`date_added`) VALUES
(1,'Alejandro Miguel Clerc', '24914014', 'Brown 3964', 'Mar del Plata', '0223155985815''alejandroclerc@gmail.com', '2016-12-19 15:06:00'),
(2,'Andrea Blondeau', '24914014', 'Brown 3964', 'Mar del Plata', '0223155985815''alejandroclerc@gmail.com', '2016-12-19 15:06:00'),
(3,'Matias Rodriguez', '24914014', 'Brown 3964', 'Mar del Plata', '0223155985815''alejandroclerc@gmail.com', '2016-12-19 15:06:00');


--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(1, 'Obed', 'Alvarado', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-12-19 15:06:00');





--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `usuario_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `usuario_perfil` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_telefono` int(11) NOT NULL,
  `usuario_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',




INSERT INTO `perfiles` (`cochera_id`, `cochera_tipo`, `cochera_detalle`) VALUES
(1,'Cubierta','Estructura Numerada con Lona'),
(1,'Semi','Estructura Numerada con Media Sombra'),
(2,'Descubierta','Solo espacio numerado en la Playa de Estacionamiento');
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(1, 'Obed', 'Alvarado', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-12-19 15:06:00');



--
-- Estructura de tabla para la tabla `perfiles`

CREATE TABLE IF NOT EXISTS `perfiles` (
  `perfil_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `perfil_tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `perfil_detalle` varchar(100) COLLATE utf8_unicode_ci NOT NULL;


INSERT INTO `perfiles` (`perfil_id`, `perfil_tipo`, `perfil_detalle`) VALUES
(1,'Administrador','Control Total'),
(2,'Administrativo','Procesos Adminitrativos'),
(3,'Seguridad','Ingreso y Egreso de Clientes'),
(4,'Cocheras','Ingreso y Egreso de Vehiculos'),
(5,'Vestuarios','Control de lockers'),
(6,'Recreacion','Control de Eventos'),
(7,'Demo','Demostracion');





--
-- Estructura de tabla para la tabla `cocheras`

CREATE TABLE IF NOT EXISTS `cocheras` (
  `cochera_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `cochera_tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cochera_detalle` varchar(150) COLLATE utf8_unicode_ci NOT NULL);


INSERT INTO `cocheras` (`cochera_id`, `cochera_tipo`, `cochera_detalle`) VALUES
(1,'Cubierta','Estructura Numerada con Lona'),
(1,'Semi','Estructura Numerada con Media Sombra'),
(2,'Descubierta','Solo espacio numerado en la Playa de Estacionamiento');






--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pasilloss`
--
ALTER TABLE `pasillos`
  ADD PRIMARY KEY (`id_pasillo`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `products` (`id_producto`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
