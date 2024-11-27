-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2024 a las 03:39:09
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
-- Base de datos: `registro_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(100) NOT NULL,
  `invitado` varchar(100) DEFAULT NULL,
  `cc_invitado` varchar(100) DEFAULT NULL,
  `invitado1` varchar(100) DEFAULT NULL,
  `cc_invitado1` varchar(100) DEFAULT NULL,
  `invitado2` varchar(100) DEFAULT NULL,
  `cc_invitado2` varchar(100) DEFAULT NULL,
  `novedad` text DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `est_inv1` varchar(100) DEFAULT NULL,
  `est_inv2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `invitado`, `cc_invitado`, `invitado1`, `cc_invitado1`, `invitado2`, `cc_invitado2`, `novedad`, `estado`, `est_inv1`, `est_inv2`) VALUES
(5, 'german camilo bernal ', '1032479967', 'monica cristina muñoz narvaez', '30746153', 'german Eduardo bernaññ rivas', '11545848', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(6, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(7, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(8, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(9, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(10, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(11, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(12, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(13, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(14, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(15, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente'),
(16, 'cristian velancazar', '1475472033', 'su primera madre', '1254766320', 'su segundo padre', '6547892144', 'sin novedad', 'Aucente', 'Aucente', 'Aucente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
