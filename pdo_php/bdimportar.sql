-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2019 a las 15:53:59
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE `midatabase` DEFAULT CHARACTER SET utf8mb4;

USE `midatabase`;

--
-- Table structure for table `city`
--


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `batman`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cpu`
--
DROP TABLE IF EXISTS `cpu`;
CREATE TABLE `cpu` (
  `id` int(10) UNSIGNED NOT NULL,
  `marca` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `serie` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cpu`
--

INSERT INTO `cpu` (`id`, `marca`, `serie`, `modelo`) VALUES
(1, 'Asus', '2323dgfdg4', 'a23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaje`
--

DROP TABLE IF EXISTS `personaje`;
CREATE TABLE `personaje` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personaje`
--

INSERT INTO `personaje` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Coto', 'farandula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--
DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `curso_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `creditos` int(10) UNSIGNED NOT NULL,
  `depa_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`curso_id`, `nombre`, `creditos`, `depa_id`) VALUES
(1, 'Base de Datos I', 4, 1),
(2, 'Inteligencia Artificial I', 6, 1),
(3, 'Ingenieria de Software', 5, 1),
(4, 'Base de Datos II', 2, 1),
(5, 'Inteligencia Artificial II', 4, 1),
(6, 'Computacion Grafica', 4, 1),
(7, 'Interaccion Humano Computador', 3, 1),
(8, 'Ingenieria de Software II', 5, 1);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_req`
--

DROP TABLE IF EXISTS `pre_req`;
CREATE TABLE `pre_req` (
  `curso_id_1` tinyint(3) UNSIGNED NOT NULL,
  `curso_id_2` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pre_req`
--

INSERT INTO `pre_req` (`curso_id_1`, `curso_id_2`) VALUES
(1, 5);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `depa_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personaje`
--


--
-- Volcado de datos para la tabla `personaje`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `cpu`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`curso_id`);


--
-- Indices de la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personaje`
--
ALTER TABLE `pre_req`
  ADD PRIMARY KEY (`curso_id_1`);


--
-- Indices de la tabla `personaje`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`depa_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cpu`
--
ALTER TABLE `curso`
  MODIFY `curso_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personaje`
--
ALTER TABLE `personaje`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

-- AUTO_INCREMENT de la tabla `personaje`
--
ALTER TABLE `pre_req`
  MODIFY `curso_id_1` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


-- AUTO_INCREMENT de la tabla `personaje`
--
ALTER TABLE `departamento`
  MODIFY `depa_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
