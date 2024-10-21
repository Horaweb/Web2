-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2024 a las 12:04:30
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
-- Base de datos: `presa_automotores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concesionarias`
--

CREATE TABLE `concesionarias` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `lugar` text NOT NULL,
  `direccion` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `concesionarias`
--

INSERT INTO `concesionarias` (`id`, `nombre`, `lugar`, `direccion`, `email`) VALUES
(1, 'PR Autos Tandi', 'Tandil', 'Avellaneda 550', 'automotoresPrTan@gmail.com'),
(2, 'PrCar', 'Belgrano', 'Cordoba 490', 'automotoresPrBel@gmail.com'),
(3, 'Precar', 'Mar Del Plata', 'Colon 1760', 'automotoresPrMdq@gmail.com'),
(4, 'Hascar', 'Pilar', 'Salceda 343', 'hascarAutomotores@gmail.com'),
(5, 'SanPre Automotores', 'Rauch', 'Callao 125', 'automotoresSanPre@gmail.com'),
(6, 'PR Automotores Cordoba', 'Cordoba', 'Peron 2430', 'automotoresPrTan@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `marca` text NOT NULL,
  `modelo` text NOT NULL,
  `tipo` text NOT NULL,
  `año` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `marca`, `modelo`, `tipo`, `año`) VALUES
(1, 'Ford', 'Ranger', 'Camioneta', 2016),
(2, 'Toyota', 'Hilux', 'Camioneta', 2014),
(3, 'Toyota', 'Hilux', 'Camioneta', 2022),
(4, 'Volkswagen', 'Taos', 'Suv', 2024),
(5, 'Volkswagen', 'Vento', 'Auto', 2014),
(6, 'Audi', 'S3', 'Auto', 2009),
(7, 'Ford', 'Focus', 'Auto', 2021),
(8, 'Ford', 'Territori', 'Suv', 2023),
(9, 'Mercedes', 'Glc300', 'Suv', 2022),
(10, 'Mercedes Benz', 'Glc300', 'Suv', 2022),
(11, 'Chevrolet', 'S10', 'Camioneta', 2012),
(12, 'Toyota', 'Rav4', 'Suv', 2024);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `concesionarias`
--
ALTER TABLE `concesionarias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `concesionarias`
--
ALTER TABLE `concesionarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
