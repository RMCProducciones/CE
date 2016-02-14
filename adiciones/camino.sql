-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-02-2016 a las 15:50:19
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camino`
--

CREATE TABLE `camino` (
  `id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `nodo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `camino`
--

INSERT INTO `camino` (`id`, `estado`, `active`, `fecha_modificacion`, `fecha_creacion`, `grupo_id`, `nodo_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, 2, 1, '0000-00-00 00:00:00', '2016-02-13 00:00:00', 1, 1, NULL, 1),
(2, 2, 1, '0000-00-00 00:00:00', '2016-02-13 00:00:00', 2, 1, NULL, 1),
(3, 2, 1, '0000-00-00 00:00:00', '2016-02-13 00:00:00', 3, 1, NULL, 1),
(4, 2, 1, '0000-00-00 00:00:00', '2016-02-13 00:00:00', 4, 1, NULL, 1),
(5, 2, 1, '0000-00-00 00:00:00', '2016-02-13 00:00:00', 5, 1, NULL, 1),
(6, 2, 1, '0000-00-00 00:00:00', '2016-02-13 00:00:00', 6, 1, NULL, 1),
(9, 1, 1, NULL, '2016-02-14 00:29:19', 4, 2, NULL, NULL),
(10, 1, 1, NULL, '2016-02-14 03:29:02', 6, 2, NULL, NULL),
(11, 3, 1, NULL, '2016-02-14 03:38:55', 4, 2, NULL, NULL),
(12, 2, 1, NULL, '2016-02-14 03:38:55', 6, 2, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camino`
--
ALTER TABLE `camino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_33C9673B9C833003` (`grupo_id`),
  ADD KEY `IDX_33C9673B29B07FB3` (`nodo_id`),
  ADD KEY `IDX_33C9673BDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_33C9673BAEADF654` (`usuario_creacion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camino`
--
ALTER TABLE `camino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camino`
--
ALTER TABLE `camino`
  ADD CONSTRAINT `FK_33C9673B29B07FB3` FOREIGN KEY (`nodo_id`) REFERENCES `nodo` (`id`),
  ADD CONSTRAINT `FK_33C9673B9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_33C9673BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_33C9673BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
