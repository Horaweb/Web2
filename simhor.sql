-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2024 a las 02:32:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simhor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `automotor`
--

CREATE TABLE `automotor` (
  `id_automotor` int(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `año` int(4) NOT NULL,
  `kilometraje` int(6) NOT NULL,
  `precio` int(10) NOT NULL,
  `dominio` varchar(20) DEFAULT NULL,
  `clave_foranea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `automotor`
--

INSERT INTO `automotor` (`id_automotor`, `marca`, `modelo`, `año`, `kilometraje`, `precio`, `dominio`, `clave_foranea`) VALUES
(1, 'ford', 'kuga', 2019, 55000, 25500000, 'ac567dd', 1),
(2, 'ford', 'mondeo', 2023, 20000, 32400000, 'ad345bb', 4),
(3, 'ford', 'focus', 2017, 50000, 15000000, 'ab435cc', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(10) NOT NULL,
  `nombre_sucursal` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre_sucursal`, `direccion`, `telefono`, `email`) VALUES
(1, 'sucursal_tandil', 'avenida_avellaneda345', 249445647, 'sucursaltandil@gmail.com'),
(2, 'sucursal_la_plata', 'avenida_7_6754', 221345678, 'sucursallaplata@gmail.com'),
(3, 'sucursal_recoleta', 'cerrito_560', 1134567788, 'sucursalrecoleta@gmail.com'),
(4, 'sucursal_palermo', 'avenida_santa_fe_3498', 112234556, 'sucursalpalermo@gmail.com'),
(5, 'sucursal_belgrano', 'cabildo_3560', 11345654, 'sucursalbelgrano@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `automotor`
--
ALTER TABLE `automotor`
  ADD PRIMARY KEY (`id_automotor`),
  ADD UNIQUE KEY `dominio` (`dominio`),
  ADD KEY `claveForanea` (`clave_foranea`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `automotor`
--
ALTER TABLE `automotor`
  MODIFY `id_automotor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `automotor`
--
ALTER TABLE `automotor`
  ADD CONSTRAINT `automotor_ibfk_1` FOREIGN KEY (`clave_foranea`) REFERENCES `sucursal` (`id_sucursal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
