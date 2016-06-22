-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2016 a las 19:24:35
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
-- Estructura de tabla para la tabla `documento_soporte`
--

CREATE TABLE IF NOT EXISTS `documento_soporte` (
`id` int(11) NOT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `dominio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `obligatorio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `documento_soporte`
--

INSERT INTO `documento_soporte` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `dominio`, `descripcion`, `abreviatura`, `obligatorio`, `orden`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'grupo_tipo_soporte', 'Acta de interés', 'AI', '0', 0, 1, NULL, '2016-01-06 00:00:00'),
(3, NULL, NULL, 'grupo_tipo_soporte', 'Formato de propuesta ', 'FP', '0', 0, 1, NULL, '2016-01-06 00:00:00'),
(4, NULL, NULL, 'beneficiario_tipo_soporte', 'Documento Identidad', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(5, NULL, NULL, 'beneficiario_tipo_soporte', 'Certificación pertenencia Étnica', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(6, NULL, NULL, 'beneficiario_tipo_soporte', 'Certificación Puntaje SISBEN', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(7, NULL, NULL, 'beneficiario_tipo_soporte', 'Certificación desplazamiento', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(8, NULL, NULL, 'concurso_tipo_soporte', 'Acta del concurso', '', '0', 0, 1, NULL, '2016-01-13 00:00:00'),
(9, NULL, NULL, 'concurso_tipo_soporte', 'Acta2 ', '', '0', 0, 1, NULL, '2016-01-13 00:00:00'),
(10, NULL, NULL, 'pasantia_tipo_soporte', 'soporte prueba', '', '0', 0, 1, NULL, '2016-01-20 00:00:00'),
(11, NULL, NULL, 'ruta_tipo_soporte', 'prueba ruta', '', '0', 0, 1, NULL, '2016-01-20 00:00:00'),
(12, NULL, NULL, 'beneficiario_tipo_soporte', 'Certificación discapacidad', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(13, NULL, NULL, 'beneficiario_tipo_soporte', 'Antecedentes Policia', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(14, NULL, NULL, 'beneficiario_tipo_soporte', 'Antecedentes disciplinarios', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(15, NULL, NULL, 'beneficiario_tipo_soporte', 'Antecedentes Fiscales', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(16, NULL, NULL, 'clear_tipo_soporte', 'Documento de legalización del Clear', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(17, NULL, NULL, 'clear_tipo_soporte', 'Listado Asistentes', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(18, NULL, NULL, 'clear_tipo_soporte', 'Acta Inducción e instalación', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(19, NULL, NULL, 'clear_tipo_soporte', 'Acta Habilitación Asignación', '', '0', 0, 0, NULL, '2016-01-12 00:00:00'),
(20, NULL, NULL, 'contador_tipo_soporte', 'Documento Identidad', 'DI', '0', 0, 1, NULL, '2016-01-06 00:00:00'),
(21, NULL, NULL, 'contador_tipo_soporte', 'Tarjeta Profesional', 'TP', '0', 0, 1, NULL, '2016-01-06 00:00:00'),
(23, NULL, NULL, 'grupo_tipo_soporte', 'Formato registro de beneficiarios', 'FRB', '0', 0, 1, '2016-05-24 00:00:00', '0000-00-00 00:00:00'),
(24, NULL, NULL, 'grupo_tipo_soporte', 'Certificación bancaria', 'CB', '0', 0, 1, '2016-05-24 00:00:00', '0000-00-00 00:00:00'),
(25, NULL, NULL, 'grupo_tipo_soporte', 'Certificación de existencia (Camara de Comercio)', 'CC', '0', 0, 1, '2016-05-26 00:00:00', '0000-00-00 00:00:00'),
(26, NULL, NULL, 'grupo_tipo_soporte', 'Registro único tributario del Grupo', 'RUTG', '0', 0, 1, '2016-05-26 00:00:00', '0000-00-00 00:00:00'),
(27, NULL, NULL, 'grupo_tipo_soporte', 'Declaración de renta (Año anterior)', 'DRAA', '0', 0, 1, '2016-05-26 00:00:00', '0000-00-00 00:00:00'),
(28, NULL, NULL, 'grupo_tipo_soporte', 'Balance general y estado de resultados', 'BGER', '0', 0, 1, '2016-05-26 00:00:00', '0000-00-00 00:00:00'),
(29, NULL, NULL, 'grupo_tipo_soporte', 'Antecedentes disciplinarios del Grupo (Procuraduria)', 'ADGP', '0', 0, 1, '2016-05-26 00:00:00', '0000-00-00 00:00:00'),
(30, NULL, NULL, 'grupo_tipo_soporte', 'Antecedentes fiscales del Grupo (Contraloría)', 'AFGC', '0', 0, 1, '2016-05-26 00:00:00', '0000-00-00 00:00:00'),
(31, NULL, NULL, 'seguimiento_grupo_tipo_soporte', 'Formato de evaluacion', 'FE', '0', 0, 1, '2016-05-31 00:00:00', '0000-00-00 00:00:00'),
(32, NULL, NULL, 'seguimiento_grupo_tipo_soporte', 'Certificación aportes de contrapartida', 'CAC', '0', 0, 1, '2016-05-31 00:00:00', '0000-00-00 00:00:00'),
(33, NULL, NULL, 'seguimiento_grupo_tipo_soporte', 'Contrato de adhesión', 'CA', '0', 0, 1, '2016-05-31 00:00:00', '0000-00-00 00:00:00'),
(34, NULL, NULL, 'seguimiento_grupo_tipo_soporte', 'Póliza de cumplimiento', 'PC', '0', 0, 1, '2016-05-31 00:00:00', '0000-00-00 00:00:00'),
(35, NULL, NULL, 'visita_tipo_soporte', 'Evidencia de imágenes de la visita', 'EIV', '0', 0, 1, '2016-06-13 00:00:00', '0000-00-00 00:00:00'),
(36, NULL, NULL, 'visita_tipo_soporte', 'Documento de aprobación de interventoria', 'DAI', '0', 0, 1, '2016-06-13 00:00:00', '0000-00-00 00:00:00'),
(37, NULL, NULL, 'visita_tipo_soporte', 'Documento de rechazo de interventoria', 'DRI', '0', 0, 1, '2016-06-13 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento_soporte`
--
ALTER TABLE `documento_soporte`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_D79FEA30DADD026` (`usuario_modificacion_id`), ADD KEY `IDX_D79FEA30AEADF654` (`usuario_creacion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documento_soporte`
--
ALTER TABLE `documento_soporte`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento_soporte`
--
ALTER TABLE `documento_soporte`
ADD CONSTRAINT `FK_D79FEA30AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
ADD CONSTRAINT `FK_D79FEA30DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
