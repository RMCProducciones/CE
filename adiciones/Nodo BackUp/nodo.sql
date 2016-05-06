-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2016 a las 23:26:22
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodo`
--

CREATE TABLE IF NOT EXISTS `nodo` (
`id` int(11) NOT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fase` int(11) NOT NULL,
  `formal` tinyint(1) NOT NULL,
  `negocio` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `nodo`
--

INSERT INTO `nodo` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre`, `fase`, `formal`, `negocio`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'Convocatoria', -1, 0, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(2, NULL, NULL, 'CLEAR Habilitación', -1, 0, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(3, NULL, NULL, 'Visita previa Formal PN', -1, 1, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(4, NULL, NULL, 'Visita previa No Formal PI', -1, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(5, NULL, NULL, 'Visita previa No Formal IEA', -1, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(6, NULL, NULL, 'CLEAR Asignación Formal MOT', 0, 1, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(7, NULL, NULL, 'Talleres Formal MOT', 0, 1, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(8, NULL, NULL, 'Legalización Fase Formal MOT', 0, 1, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(9, NULL, NULL, 'CLEAR Contraloría Social Formal MOT', 2, 1, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(10, NULL, NULL, 'CLEAR Asignación No Formal MOT', 0, 0, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(11, NULL, NULL, 'Talleres Formal MOT', 0, 0, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(12, NULL, NULL, 'Legalización Fase Formal MOT', 0, 0, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(13, NULL, NULL, 'CLEAR Contraloría Social No Formal MOT', 0, 0, 0, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(14, NULL, NULL, 'CLEAR Asignación No Formal IEA', 1, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(15, NULL, NULL, 'Visita 1 No Formal IEA', 1, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(16, NULL, NULL, 'Visita 2 No Formal IEA', 1, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(17, NULL, NULL, 'Visita 3 No Formal IEA', 1, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(18, NULL, NULL, 'Legalización Fase Formal IEA', 1, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(19, NULL, NULL, 'CLEAR Contraloría Social No Formal IEA', 1, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(20, NULL, NULL, 'CLEAR Asignación No Formal PI', 2, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(21, NULL, NULL, 'Visita 1 No Formal PI', 2, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(22, NULL, NULL, 'Visita 2 No Formal PI', 2, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(23, NULL, NULL, 'Visita 3 No Formal PI', 2, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(24, NULL, NULL, 'Legalización Fase Formal PI', 2, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(25, NULL, NULL, 'CLEAR Contraloría Social No Formal PI', 2, 0, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(26, NULL, NULL, 'CLEAR Asignación Formal PN', 3, 1, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(27, NULL, NULL, 'Visita 1 Formal PN', 3, 1, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(28, NULL, NULL, 'Visita 2 Formal PN', 3, 1, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(29, NULL, NULL, 'Visita 3 Formal PN', 3, 1, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(30, NULL, NULL, 'Legalización Fase Formal PN', 3, 1, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00'),
(31, NULL, NULL, 'CLEAR Contraloría Social Formal PN', 3, 1, 1, 1, '0000-00-00 00:00:00', '2016-01-06 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `nodo`
--
ALTER TABLE `nodo`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_65AA015BDADD026` (`usuario_modificacion_id`), ADD KEY `IDX_65AA015BAEADF654` (`usuario_creacion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `nodo`
--
ALTER TABLE `nodo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nodo`
--
ALTER TABLE `nodo`
ADD CONSTRAINT `FK_65AA015BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
ADD CONSTRAINT `FK_65AA015BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
