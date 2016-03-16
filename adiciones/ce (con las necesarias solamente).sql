-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2016 a las 22:39:54
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

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
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_40E497EBDADD026` (`usuario_modificacion_id`),
  KEY `IDX_40E497EBAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre`, `active`, `fecha_modificacion`, `fecha_creacion`, `codigo`) VALUES
(1, NULL, NULL, 'CAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '19'),
(2, NULL, NULL, 'NARIÑO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '52'),
(3, NULL, NULL, 'ARAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '81'),
(4, NULL, NULL, 'NTE DE SANTANDER', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '54'),
(5, NULL, NULL, 'CESAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '20'),
(6, NULL, NULL, 'LA GUAJIRA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '44'),
(7, NULL, NULL, 'MAGDALENA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '47'),
(8, NULL, NULL, 'META', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '50'),
(9, NULL, NULL, 'BOLIVAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '13'),
(10, NULL, NULL, 'SUCRE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '70'),
(11, NULL, NULL, 'ANTIOQUIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '05'),
(12, NULL, NULL, 'CORDOBA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '23'),
(13, NULL, NULL, 'TOLIMA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '73'),
(14, NULL, NULL, 'VALLE DEL CAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '76'),
(15, NULL, NULL, 'CHOCO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '27'),
(16, NULL, NULL, 'PUTUMAYO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '86'),
(17, NULL, NULL, 'CAQUETA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_soporte`
--

CREATE TABLE IF NOT EXISTS `documento_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `dominio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `obligatorio` tinyint(1) NOT NULL,
  `orden` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D79FEA30DADD026` (`usuario_modificacion_id`),
  KEY `IDX_D79FEA30AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `documento_soporte`
--

INSERT INTO `documento_soporte` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `dominio`, `descripcion`, `abreviatura`, `obligatorio`, `orden`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'grupo_tipo_soporte', 'Acta de interés', 'AI', 0, 0, 1, NULL, '2016-01-06 00:00:00'),
(3, NULL, NULL, 'grupo_tipo_soporte', 'Formato de propuesta ', 'AI', 0, 0, 1, NULL, '2016-01-06 00:00:00'),
(4, NULL, NULL, 'beneficiario_tipo_soporte', 'Documento Identidad', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(5, NULL, NULL, 'beneficiario_tipo_soporte', 'Certificación pertenencia Étnica', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(6, NULL, NULL, 'beneficiario_tipo_soporte', 'Certificación Puntaje SISBEN', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(7, NULL, NULL, 'beneficiario_tipo_soporte', 'Certificación desplazamiento', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(8, NULL, NULL, 'concurso_tipo_soporte', 'Acta del concurso', '', 0, 0, 1, NULL, '2016-01-13 00:00:00'),
(9, NULL, NULL, 'concurso_tipo_soporte', 'Acta2 ', '', 0, 0, 1, NULL, '2016-01-13 00:00:00'),
(10, NULL, NULL, 'pasantia_tipo_soporte', 'soporte prueba', '', 0, 0, 1, NULL, '2016-01-20 00:00:00'),
(11, NULL, NULL, 'ruta_tipo_soporte', 'prueba ruta', '', 0, 0, 1, NULL, '2016-01-20 00:00:00'),
(12, NULL, NULL, 'beneficiario_tipo_soporte', 'Certificación discapacidad', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(13, NULL, NULL, 'beneficiario_tipo_soporte', 'Antecedentes Policia', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(14, NULL, NULL, 'beneficiario_tipo_soporte', 'Antecedentes disciplinarios', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(15, NULL, NULL, 'beneficiario_tipo_soporte', 'Antecedentes Fiscales', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(16, NULL, NULL, 'clear_tipo_soporte', 'Documento de legalización del Clear', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(17, NULL, NULL, 'clear_tipo_soporte', 'Listado Asistentes', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(18, NULL, NULL, 'clear_tipo_soporte', 'Acta Inducción e instalación', '', 0, 0, 1, NULL, '2016-01-12 00:00:00'),
(19, NULL, NULL, 'clear_tipo_soporte', 'Acta Habilitación Asignación', '', 0, 0, 1, NULL, '2016-01-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE IF NOT EXISTS `listas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `dominio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C54ECE20DADD026` (`usuario_modificacion_id`),
  KEY `IDX_C54ECE20AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=255 ;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `dominio`, `descripcion`, `abreviatura`, `orden`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'tipo_documento', 'Cedula de Ciudadanía', 'CC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(2, NULL, NULL, 'tipo_documento', 'Cedula de Extrangería', 'CE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(3, NULL, NULL, 'tipo_documento', 'Pasaporte', 'PA', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(4, NULL, NULL, 'tipo_documento', 'Tarjeta de Identidad', 'TI', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(5, NULL, NULL, 'tipo_documento', 'Registro Civil', 'RC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(6, NULL, NULL, 'genero', 'Masculino', 'M', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(7, NULL, NULL, 'genero', 'Femenino', 'F', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(8, NULL, NULL, 'estado_civil', 'Soltero', 'S', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(9, NULL, NULL, 'estado_civil', 'Casado', 'C', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(10, NULL, NULL, 'estado_civil', 'Unión Libre', 'UL', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(11, NULL, NULL, 'estado_civil', 'Viudo', 'V', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(12, NULL, NULL, 'rol_grupo_familiar', 'Padre', 'JH', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(13, NULL, NULL, 'rol_grupo_familiar', '', 'MH', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(14, NULL, NULL, 'hijos_menores_5', '1', 'HM1', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(15, NULL, NULL, 'hijos_menores_5', '2', 'HM2', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(16, NULL, NULL, 'hijos_menores_5', '3', 'HM3', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(17, NULL, NULL, 'hijos_menores_5', '4', 'HM4', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(18, NULL, NULL, 'hijos_menores_5', '5', 'HM5', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(19, NULL, NULL, 'hijos_menores_5', '6', 'HM6', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(20, NULL, NULL, 'hijos_menores_5', '6 o mas ', 'HMM6', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(21, NULL, NULL, 'miembros_nucleo_familiar', '1', 'MN1', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(22, NULL, NULL, 'miembros_nucleo_familiar', '2', 'MN2', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(23, NULL, NULL, 'miembros_nucleo_familiar', '3', 'MN3', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(24, NULL, NULL, 'miembros_nucleo_familiar', '4', 'MN4', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(25, NULL, NULL, 'miembros_nucleo_familiar', '5', 'MN5', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(26, NULL, NULL, 'miembros_nucleo_familiar', '6', 'MN6', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(27, NULL, NULL, 'miembros_nucleo_familiar', '6 o mas ', 'MNM6', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(28, NULL, NULL, 'nivel_estudios', 'Pre escolar ', 'PE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(29, NULL, NULL, 'nivel_estudios', 'Primaria', 'PRI', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(30, NULL, NULL, 'nivel_estudios', 'Bachillerato', 'BAC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(31, NULL, NULL, 'nivel_estudios', 'Universitaria', 'UNI', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(32, NULL, NULL, 'nivel_estudios', 'Post Grado', 'POST', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(33, NULL, NULL, 'nivel_estudios', 'Ninguno', 'NONE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(34, NULL, NULL, 'ocupacion', 'Empleado', 'EM', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(35, NULL, NULL, 'ocupacion', 'Independiente', 'IN', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(36, NULL, NULL, 'ocupacion', 'Desempleado', 'DES', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(37, NULL, NULL, 'tipo_vivienda', 'Propia', 'PR', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(38, NULL, NULL, 'tipo_vivienda', 'Arriendo', 'ARR', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(39, NULL, NULL, 'tipo_vivienda', 'Familiar', 'FAM', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(40, NULL, NULL, 'tipo_documento_conyuge', 'Cedula de Ciudadania', 'CC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(41, NULL, NULL, 'tipo_documento_conyuge', 'Cedula de Extrangeria', 'CE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(42, NULL, NULL, 'tipo_documento_conyuge', 'Pasaporte', 'PA', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(43, NULL, NULL, 'tipo_documento_conyuge', 'Tarjeta de Identidad', 'TI', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(44, NULL, NULL, 'tipo_documento_conyuge', 'Registro Civil', 'RC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(45, NULL, NULL, 'pertenencia_etnica', 'Indígena', 'IND', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(46, NULL, NULL, 'pertenencia_etnica', 'Afrodecendiente', 'AFRO', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(47, NULL, NULL, 'pertenencia_etnica', 'Palenquedo de san Basilio', 'PASB', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(48, NULL, NULL, 'pertenencia_etnica', 'Raizal', 'RAIZAL', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(49, NULL, NULL, 'pertenencia_etnica', 'ROM', 'ROM', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(50, NULL, NULL, 'grupo_indigena', 'Achagua', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(51, NULL, NULL, 'grupo_indigena', 'Amora', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(52, NULL, NULL, 'grupo_indigena', 'Andoke', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(53, NULL, NULL, 'grupo_indigena', 'Arhuaco', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(54, NULL, NULL, 'grupo_indigena', 'Awa', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(55, NULL, NULL, 'grupo_indigena', 'Bara', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(56, NULL, NULL, 'grupo_indigena', 'Barasana', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(57, NULL, NULL, 'grupo_indigena', 'Bar', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(58, NULL, NULL, 'grupo_indigena', 'Betoye', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(59, NULL, NULL, 'grupo_indigena', 'Bora', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(60, NULL, NULL, 'grupo_indigena', 'Cañamomo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(61, NULL, NULL, 'grupo_indigena', 'Carapana', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(62, NULL, NULL, 'grupo_indigena', 'Chimila', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(63, NULL, NULL, 'grupo_indigena', 'Chiricoa', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(64, NULL, NULL, 'grupo_indigena', 'Cocama', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(65, NULL, NULL, 'grupo_indigena', 'Coconuco', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(66, NULL, NULL, 'grupo_indigena', 'Coreguaje', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(67, NULL, NULL, 'grupo_indigena', 'Coyaima-Natagaima', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(68, NULL, NULL, 'grupo_indigena', 'Desano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(69, NULL, NULL, 'grupo_indigena', 'Dujo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(70, NULL, NULL, 'grupo_indigena', 'Embera', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(71, NULL, NULL, 'grupo_indigena', 'Embera Kat', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(72, NULL, NULL, 'grupo_indigena', 'Embera-Cham', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(73, NULL, NULL, 'grupo_indigena', 'Eperara-Siapidara', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(74, NULL, NULL, 'grupo_indigena', 'Guambiano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(75, NULL, NULL, 'grupo_indigena', 'Guanaca', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(76, NULL, NULL, 'grupo_indigena', 'Guane', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(77, NULL, NULL, 'grupo_indigena', 'Guayabero', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(78, NULL, NULL, 'grupo_indigena', 'Hitnu', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(79, NULL, NULL, 'grupo_indigena', 'Hupdu', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(80, NULL, NULL, 'grupo_indigena', 'Inga', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(81, NULL, NULL, 'grupo_indigena', 'Juhup', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(82, NULL, NULL, 'grupo_indigena', 'Kakua', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(83, NULL, NULL, 'grupo_indigena', 'Kamñnts', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(84, NULL, NULL, 'grupo_indigena', 'Kankuamo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(85, NULL, NULL, 'grupo_indigena', 'Karijona', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(86, NULL, NULL, 'grupo_indigena', 'Kawiyar - Cabiyar', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(87, NULL, NULL, 'grupo_indigena', 'Kof', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(88, NULL, NULL, 'grupo_indigena', 'Kogui', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(89, NULL, NULL, 'grupo_indigena', 'Kubeo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(90, NULL, NULL, 'grupo_indigena', 'Kuiba', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(91, NULL, NULL, 'grupo_indigena', 'Kurripaco', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(92, NULL, NULL, 'grupo_indigena', 'Letuama', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(93, NULL, NULL, 'grupo_indigena', 'Makaguaje', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(94, NULL, NULL, 'grupo_indigena', 'Makuna', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(95, NULL, NULL, 'grupo_indigena', 'Masiguare', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(96, NULL, NULL, 'grupo_indigena', 'Matap', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(97, NULL, NULL, 'grupo_indigena', 'Mira', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(98, NULL, NULL, 'grupo_indigena', 'Mokan', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(99, NULL, NULL, 'grupo_indigena', 'Muinane', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(100, NULL, NULL, 'grupo_indigena', 'Muisca', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(101, NULL, NULL, 'grupo_indigena', 'Nasa - Paez', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(102, NULL, NULL, 'grupo_indigena', 'Nonuya', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(103, NULL, NULL, 'grupo_indigena', 'Nukak', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(104, NULL, NULL, 'grupo_indigena', 'Ocaina', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(105, NULL, NULL, 'grupo_indigena', 'Pasto', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(106, NULL, NULL, 'grupo_indigena', 'Piapoco', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(107, NULL, NULL, 'grupo_indigena', 'Piaroa', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(108, NULL, NULL, 'grupo_indigena', 'Piratapuyo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(109, NULL, NULL, 'grupo_indigena', 'Pisamira', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(110, NULL, NULL, 'grupo_indigena', 'Puinave', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(111, NULL, NULL, 'grupo_indigena', 'Saliba', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(112, NULL, NULL, 'grupo_indigena', 'Sanha', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(113, NULL, NULL, 'grupo_indigena', 'Sena', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(114, NULL, NULL, 'grupo_indigena', 'Sikuani', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(115, NULL, NULL, 'grupo_indigena', 'Siona', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(116, NULL, NULL, 'grupo_indigena', 'Siriano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(117, NULL, NULL, 'grupo_indigena', 'Taiwano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(118, NULL, NULL, 'grupo_indigena', 'Tanimuka', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(119, NULL, NULL, 'grupo_indigena', 'Tariano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(120, NULL, NULL, 'grupo_indigena', 'Tatuyo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(121, NULL, NULL, 'grupo_indigena', 'Tikuna', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(122, NULL, NULL, 'grupo_indigena', 'Totor', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(123, NULL, NULL, 'grupo_indigena', 'Tsiripu', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(124, NULL, NULL, 'grupo_indigena', 'Tucano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(125, NULL, NULL, 'grupo_indigena', 'Tule', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(126, NULL, NULL, 'grupo_indigena', 'Tuyuka', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(127, NULL, NULL, 'grupo_indigena', 'Uawa - Tunebo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(128, NULL, NULL, 'grupo_indigena', 'Uitoto', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(129, NULL, NULL, 'grupo_indigena', 'Wanano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(130, NULL, NULL, 'grupo_indigena', 'Waunan', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(131, NULL, NULL, 'grupo_indigena', 'Wayuu', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(132, NULL, NULL, 'grupo_indigena', 'Wiwa', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(133, NULL, NULL, 'grupo_indigena', 'Yagua', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(134, NULL, NULL, 'grupo_indigena', 'Yanacona', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(135, NULL, NULL, 'grupo_indigena', 'Yauna', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(136, NULL, NULL, 'grupo_indigena', 'Yuko', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(137, NULL, NULL, 'grupo_indigena', 'Yukuna', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(138, NULL, NULL, 'grupo_indigena', 'Yuri', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(139, NULL, NULL, 'grupo_indigena', 'Yurut', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(140, NULL, 1, 'grupo_tipo_soporte', 'Acta de interés ', 'AI', 0, 1, NULL, '2015-12-02 00:00:00'),
(141, NULL, 1, 'grupo_tipo_soporte', 'Formato de propuesta ', 'FP', 0, 1, NULL, '2015-12-02 00:00:00'),
(142, NULL, NULL, 'modalidad', 'Grupal', NULL, 0, 1, NULL, '2015-12-04 00:00:00'),
(143, NULL, NULL, 'modalidad', 'Familiar', NULL, NULL, 1, NULL, '2015-12-04 00:00:00'),
(144, NULL, NULL, 'tipo_concurso', 'Mejoramiento de Condiciones Productivas', NULL, NULL, 1, NULL, '2015-12-04 00:00:00'),
(145, NULL, NULL, 'tipo_concurso', 'Mejoramiento de Condiciones Ambientales', NULL, NULL, 1, NULL, '2015-12-04 00:00:00'),
(146, NULL, NULL, 'tipo_concurso', 'Mejoramiento de la seguriad Alimentaria', NULL, NULL, 0, NULL, '2015-12-04 00:00:00'),
(147, NULL, NULL, 'tipo_concurso', 'Mejoramiento del Capital Social', NULL, NULL, 1, NULL, '0000-00-00 00:00:00'),
(148, NULL, NULL, 'tipo_concurso', 'Mejoramiento de la seguriad Alimentaria', NULL, 0, 1, NULL, '2015-12-04 00:00:00'),
(150, NULL, NULL, 'tipo_talento', 'Talento Rural', 'TT', NULL, 1, NULL, '2015-12-07 00:00:00'),
(151, NULL, NULL, 'tipo_talento', 'Talento Financiero', 'TF', NULL, 1, NULL, '2015-12-07 00:00:00'),
(152, NULL, NULL, 'tipo_talento', 'Talento rural y Talento Financiero', 'TRTF', NULL, 1, NULL, '2015-12-07 00:00:00'),
(153, NULL, NULL, 'tipo_beca', 'Beca de Capacitacion', 'TB', NULL, 1, NULL, '2015-12-07 00:00:00'),
(155, NULL, NULL, 'tipo_beca', 'Beca Especializacion', 'BP', NULL, 1, NULL, '2015-12-07 00:00:00'),
(156, NULL, NULL, 'tipo_beca', 'Beca Condicionada', 'BC', NULL, 1, NULL, '2015-12-07 00:00:00'),
(157, NULL, NULL, 'modalidad_beca', 'Beca Presencial', 'BP', NULL, 1, NULL, '2015-12-07 00:00:00'),
(158, NULL, NULL, 'modalidad_beca', 'Beca a Distancia', NULL, NULL, 1, NULL, '2015-12-07 00:00:00'),
(159, NULL, NULL, 'modalidad_beca', 'Beca Grupal', 'BG', NULL, 1, NULL, '2015-12-07 00:00:00'),
(160, NULL, NULL, 'tipo_capacitacion', 'Capacitacion Financiera', 'CF', NULL, 1, NULL, '2015-12-08 00:00:00'),
(161, NULL, NULL, 'tipo_capacitacion', 'Capacitacion Empresarial', 'CE', NULL, 1, NULL, '2015-12-08 00:00:00'),
(162, NULL, NULL, 'tipo_capacitacion', 'Capacitacion gestion Recursos Humanos ', NULL, NULL, 1, NULL, '2015-12-08 00:00:00'),
(163, NULL, NULL, 'tipo_capacitacion', 'Capacitacion Rural', 'CR', NULL, 1, NULL, '2015-12-08 00:00:00'),
(164, NULL, NULL, 'modalidad_capacitacion', 'Presencial', 'P', NULL, 1, NULL, '2015-12-08 00:00:00'),
(165, NULL, NULL, 'modalidad_capacitacion', 'Virtual', 'V', NULL, 1, NULL, '2015-12-08 00:00:00'),
(166, NULL, NULL, 'estado_ahorro', 'Por Iniciar', 'EA', NULL, 1, NULL, '2015-12-08 00:00:00'),
(167, NULL, NULL, 'estado_ahorro', 'En ahorro', 'EA', NULL, 1, NULL, '2015-12-08 00:00:00'),
(168, NULL, NULL, 'estado_ahorro', 'Finalizado', 'F', NULL, 1, NULL, '2015-12-08 00:00:00'),
(169, NULL, NULL, 'estado_capacitacion_financiera', 'Iniciado', 'IN', NULL, 1, NULL, '2015-12-09 00:00:00'),
(170, NULL, NULL, 'estado_capacitacion_financiera', 'Finalizado', 'FI', NULL, 1, NULL, '2015-12-09 00:00:00'),
(171, NULL, NULL, 'tipo_grupo', 'Formal con negocio', 'FN', NULL, 1, NULL, '2015-12-17 00:00:00'),
(172, NULL, NULL, 'tipo_grupo', 'Formal Sin Negocio', 'FSN', NULL, 1, NULL, '2015-12-17 00:00:00'),
(173, NULL, NULL, 'tipo_grupo', 'No Formal Sin Negocio', 'NFSN', NULL, 1, NULL, '2015-12-17 00:00:00'),
(174, NULL, NULL, 'tipo_grupo', 'No Formal Con Negocio', NULL, NULL, 1, NULL, '2015-12-17 00:00:00'),
(175, NULL, NULL, 'tipo_cuenta', 'Cuenta Ahorros', 'CA', NULL, 1, NULL, '2015-12-17 00:00:00'),
(176, NULL, NULL, 'tipo_cuenta', 'Cuenta Corriente', NULL, NULL, 1, NULL, '2015-12-17 00:00:00'),
(177, NULL, NULL, 'entidad_financiera', 'Bancolombia', 'BC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(178, NULL, NULL, 'entidad_financiera', 'Banco Popular', 'BP', NULL, 1, NULL, '2016-01-05 00:00:00'),
(179, NULL, NULL, 'entidad_financiera', 'Banco CorpBanca', 'BCO', NULL, 1, NULL, '2016-01-05 00:00:00'),
(180, NULL, NULL, 'entidad_financiera', 'Citibank', 'BCO', NULL, 1, NULL, '2016-01-05 00:00:00'),
(181, NULL, NULL, 'entidad_financiera', 'Banco GNB Sudameris', 'GNB', NULL, 1, NULL, '2016-01-05 00:00:00'),
(182, NULL, NULL, 'entidad_financiera', 'BBVA Colombia', 'GNB', NULL, 1, NULL, '2016-01-05 00:00:00'),
(183, NULL, NULL, 'entidad_financiera', 'Banco de Occidente', 'BOC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(184, NULL, NULL, 'entidad_financiera', 'BCSC S.A.', 'BCSC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(185, NULL, NULL, 'entidad_financiera', 'Davivienda', 'BCSC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(186, NULL, NULL, 'entidad_financiera', 'Colpatria Red Multibanca', 'BCSC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(187, NULL, NULL, 'entidad_financiera', 'Banagrario', 'BCSC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(188, NULL, NULL, 'entidad_financiera', 'AV Villas', 'BCSC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(189, NULL, NULL, 'entidad_financiera', 'Procredit', 'BCSC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(190, NULL, NULL, 'entidad_financiera', 'Bancamía S.A.', 'BCSC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(191, NULL, NULL, 'entidad_financiera', 'WWB S.A.', 'BCSC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(192, NULL, NULL, 'entidad_financiera', 'Bancoomeva', 'BCOO', NULL, 1, NULL, '2016-01-05 00:00:00'),
(193, NULL, NULL, 'entidad_financiera', 'Finandina', 'FIN', NULL, 1, NULL, '2016-01-05 00:00:00'),
(194, NULL, NULL, 'entidad_financiera', 'Banco Falabella S.A.', 'BFAL', NULL, 1, NULL, '2016-01-05 00:00:00'),
(195, NULL, NULL, 'entidad_financiera', 'Banco Pichincha S.A.', 'BPI', NULL, 1, NULL, '2016-01-05 00:00:00'),
(196, NULL, NULL, 'entidad_financiera', 'Coopcentral', 'COOP', NULL, 1, NULL, '2016-01-05 00:00:00'),
(197, NULL, NULL, 'entidad_financiera', 'Banco Santander ', 'BSA', NULL, 1, NULL, '2016-01-05 00:00:00'),
(198, NULL, NULL, 'entidad_financiera', 'MUNDO MUJER EL BANCO DE LA COMUNIDAD', 'MUNDO', NULL, 1, NULL, '2016-01-05 00:00:00'),
(199, NULL, NULL, 'entidad_financiera', 'MULTIBANK S.A', 'MULTI', NULL, 1, NULL, '2016-01-05 00:00:00'),
(200, NULL, NULL, 'entidad_financiera', 'BANCOMPARTIR S.A.', 'BANC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(201, NULL, NULL, 'figura_legal_constitucion', 'Asociación ', 'ASC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(202, NULL, NULL, 'figura_legal_constitucion', 'Cooperativa  ', 'COOP', NULL, 1, NULL, '2016-01-05 00:00:00'),
(203, NULL, NULL, 'figura_legal_constitucion', 'Precooperativa  ', 'PRFECO', NULL, 1, NULL, '2016-01-05 00:00:00'),
(204, NULL, NULL, 'figura_legal_constitucion', 'Fundación   ', 'FUN', NULL, 1, NULL, '2016-01-05 00:00:00'),
(205, NULL, NULL, 'figura_legal_constitucion', 'Junta de Acción comunal ', 'JAC', NULL, 1, NULL, '2016-01-05 00:00:00'),
(206, NULL, NULL, 'figura_legal_constitucion', 'Corporaciones ', 'COR', NULL, 1, NULL, '2016-01-05 00:00:00'),
(207, NULL, NULL, 'figura_legal_constitucion', 'Sociedadad Anónima ', 'SA', NULL, 1, NULL, '2016-01-05 00:00:00'),
(208, NULL, NULL, 'figura_legal_constitucion', 'Sociedad por Acciones Simplificada (SAS)', 'SAS', NULL, 1, NULL, '2016-01-05 00:00:00'),
(209, NULL, NULL, 'figura_legal_constitucion', 'Empresa Unipersonal', 'EUN', NULL, 1, NULL, '2016-01-05 00:00:00'),
(210, NULL, NULL, 'figura_legal_constitucion', 'Sociedad Encomandita Simple', 'SESI', NULL, 1, NULL, '2016-01-05 00:00:00'),
(211, NULL, NULL, 'figura_legal_constitucion', 'Sociedad Encomandita por Acciones', 'SESA', NULL, 1, NULL, '2016-01-05 00:00:00'),
(212, NULL, NULL, 'figura_legal_constitucion', 'Sociedad Limitada (Ltda)', 'SLI', NULL, 1, NULL, '2016-01-05 00:00:00'),
(213, NULL, NULL, 'discapacidad', 'Ninguna', 'N', NULL, 1, NULL, '2016-01-05 00:00:00'),
(214, NULL, NULL, 'discapacidad', 'Auditiva', 'A', NULL, 1, NULL, '2016-01-05 00:00:00'),
(215, NULL, NULL, 'discapacidad', 'Visual', 'V', NULL, 1, NULL, '2016-01-05 00:00:00'),
(216, NULL, NULL, 'discapacidad', 'Motriz', 'M', NULL, 1, NULL, '2016-01-05 00:00:00'),
(217, NULL, NULL, 'discapacidad', 'Otra', 'O', NULL, 1, NULL, '2016-01-05 00:00:00'),
(218, NULL, NULL, 'tipo_vivienda', 'Colectiva', 'COLE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(219, NULL, NULL, 'hijos_menores_5', '0', 'HM5', NULL, 1, NULL, '2016-01-05 00:00:00'),
(220, NULL, NULL, 'miembros_nucleo_familiar', '0', 'MNF', NULL, 1, NULL, '2016-01-05 00:00:00'),
(221, NULL, NULL, 'rol_grupo_familiar', 'Jefe de Hogar ', 'RGF', NULL, 1, NULL, '2016-01-06 00:00:00'),
(222, NULL, NULL, 'rol_grupo_familiar', 'Madre', 'RGF', NULL, 1, NULL, '2016-01-06 00:00:00'),
(223, NULL, NULL, 'rol_grupo_familiar', 'Abuelo(A)', 'RGF', NULL, 1, NULL, '2016-01-06 00:00:00'),
(224, NULL, NULL, 'rol_grupo_familiar', 'Hijo(A)', 'RGF', NULL, 1, NULL, '2016-01-06 00:00:00'),
(225, NULL, NULL, 'rol_grupo_familiar', 'Otro', 'RGF', NULL, 1, NULL, '2016-01-06 00:00:00'),
(226, NULL, NULL, 'linea_productiva', 'pruebalinea', NULL, NULL, 1, NULL, '2016-01-11 00:00:00'),
(227, NULL, NULL, 'rol', 'Presidente', 'COLE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(228, NULL, NULL, 'rol', 'Secretario', 'COLE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(229, NULL, NULL, 'rol', 'Tesorero', 'COLE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(230, NULL, NULL, 'rol', 'Suplente 1', 'COLE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(231, NULL, NULL, 'rol', 'Suplente 2', 'COLE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(232, NULL, NULL, 'rol', 'Representante Grupo', 'COLE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(233, NULL, NULL, 'rol', 'Miembro Grupo', 'COLE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(234, NULL, NULL, 'entidad', 'Promotor Rural', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(235, NULL, NULL, 'entidad', 'Representante de la secretaria de agricultura departamental', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(236, NULL, NULL, 'entidad', 'Representante de la Autoridad Ambiental (CAR)', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(237, NULL, NULL, 'entidad', 'Representante del Comité Municipal de Desarrollo Rural - CMDR ', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(238, NULL, NULL, 'entidad', 'Representante de la Alcaldía Municipal', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(239, NULL, NULL, 'entidad', 'Coordinador de la Unidad Nacional de Coordinación ', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(240, NULL, NULL, 'entidad', 'Delegado de la Unidad  Nacional de Cordinación', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(241, NULL, NULL, 'entidad', 'Personero Municipal', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(242, NULL, NULL, 'rubro', 'Terrenos', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(243, NULL, NULL, 'rubro', 'Maquinaria, equipo  o herramientas', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(244, NULL, NULL, 'rubro', 'Infraestructura (Construcciones) ', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(245, NULL, NULL, 'rubro', 'Semovientes y/o Pié de Cria', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(246, NULL, NULL, 'rubro', 'Insumos y Materiales', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(247, NULL, NULL, 'unidad', 'Kilogramo', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(248, NULL, NULL, 'unidad', 'Gramo', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(249, NULL, NULL, 'unidad', 'Tonelada', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(250, NULL, NULL, 'unidad', 'Unidades de Medida', '', NULL, 1, NULL, '2016-01-05 00:00:00'),
(251, NULL, NULL, 'periodicidad', 'Diario', 'F', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(252, NULL, NULL, 'periodicidad', 'Semanal', 'F', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(253, NULL, NULL, 'periodicidad', 'Mensual', 'F', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(254, NULL, NULL, 'periodicidad', 'Por Campaña', 'F', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento_id` int(11) DEFAULT NULL,
  `zona_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FE98F5E05A91C08D` (`departamento_id`),
  KEY `IDX_FE98F5E0104EA8FC` (`zona_id`),
  KEY `IDX_FE98F5E0DADD026` (`usuario_modificacion_id`),
  KEY `IDX_FE98F5E0AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=101 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `departamento_id`, `zona_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre`, `active`, `fecha_modificacion`, `fecha_creacion`, `abreviatura`, `codigo`) VALUES
(1, 1, 1, NULL, 1, 'ARGELIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'ARG', '19050'),
(2, 1, 1, NULL, 1, 'BALBOA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'BAL', '19075'),
(3, 1, 1, NULL, 1, 'GUAPI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'GUA', '19318'),
(4, 1, 1, NULL, 1, 'LOPEZ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'LOP', '19418'),
(5, 1, 1, NULL, 1, 'TIMBIQUI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TIM', '19809'),
(6, 1, 1, NULL, 1, 'EL TAMBO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TAM', '19256'),
(7, 1, 2, NULL, 1, 'TORIBIO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TOR', '19821'),
(8, 1, 2, NULL, 1, 'CALOTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CAL', '19142'),
(9, 1, 2, NULL, 1, 'CORINTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'COR', '19212'),
(10, 1, 2, NULL, 1, 'SANTANDER DE QUILICHAO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SQL', '19698'),
(11, 1, 2, NULL, 1, 'JAMBALO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'JAM', '19364'),
(12, 1, 2, NULL, 1, 'MIRANDA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'MIR', '19455'),
(13, 2, 3, NULL, 1, 'BARBACOAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'BAR', '52079'),
(14, 2, 3, NULL, 1, 'OLAYA HERRERA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'OL', '52490'),
(15, 2, 3, NULL, 1, 'RICAURTE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'RIC', '52612'),
(16, 2, 3, NULL, 1, 'SAN ANDRES DE TUMACO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TUM', '52835'),
(17, 2, 4, NULL, 1, 'LEIVA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'LEI', '52405'),
(18, 2, 4, NULL, 1, 'EL ROSARIO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'ROS', '52256'),
(19, 2, 4, NULL, 1, 'POLICARPA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'POL', '52540'),
(20, 2, 4, NULL, 1, 'SAMANIEGO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SAM', '52678'),
(21, 2, 4, NULL, 1, 'CUMBITARA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CUM', '52233'),
(22, 3, 5, NULL, 1, 'ARAUQUITA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'ARQ', '81065'),
(23, 3, 5, NULL, 1, 'FORTUL', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'FOR', '81300'),
(24, 3, 5, NULL, 1, 'SARAVENA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SAR', '81736'),
(25, 3, 5, NULL, 1, 'TAME', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TAM', '81794'),
(26, 4, 6, NULL, 1, 'ABREGO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'AB', '54003'),
(27, 4, 6, NULL, 1, 'EL TARRA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TAR', '54250'),
(28, 4, 6, NULL, 1, 'HACARI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'HAC', '54344'),
(29, 4, 6, NULL, 1, 'LA PLAYA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'PLA', '54398'),
(30, 4, 6, NULL, 1, 'OCANA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'OC', '54498'),
(31, 4, 6, NULL, 1, 'SAN CALIXTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SCX', '54670'),
(32, 4, 6, NULL, 1, 'TEORAMA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TEO', '54800'),
(33, 4, 6, NULL, 1, 'CONVENCION', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CON', '54206'),
(34, 4, 6, NULL, 1, 'EL CARMEN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CAR', '54245'),
(35, 4, 6, NULL, 1, 'TIBU', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TIB', '54810'),
(36, 5, 7, NULL, 1, 'PUEBLO BELLO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'PUB', '20570'),
(37, 5, 7, NULL, 1, 'VALLEDUPAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'VAL', '20001'),
(38, 6, 7, NULL, 1, 'DIBULLA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'BIB', '44090'),
(39, 6, 7, NULL, 1, 'SAN JUAN DEL CESAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SCE', '44650'),
(40, 7, 7, NULL, 1, 'ARACATACA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'ART', '47053'),
(41, 7, 7, NULL, 1, 'CIENAGA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CIE', '15189'),
(42, 7, 7, NULL, 1, 'FUNDACION', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'FUN', '47288'),
(43, 7, 7, NULL, 1, 'SANTA MARTA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SMT', '47001'),
(44, 7, 7, NULL, 1, 'ALGARROBO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'AL', '47030'),
(45, 8, 8, NULL, 1, 'LA MACARENA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'MAC', '50350'),
(46, 8, 8, NULL, 1, 'MESETAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'ME', '50330'),
(47, 8, 8, NULL, 1, 'PUERTO RICO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'PRI', '50590'),
(48, 8, 8, NULL, 1, 'SAN JUAN DE ARAMA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SAR', '50683'),
(49, 8, 8, NULL, 1, 'URIBE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'UR', '50370'),
(50, 8, 8, NULL, 1, 'VISTA HERMOSA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'VHER', '50711'),
(51, 9, 9, NULL, 1, 'EL CARMEN DE BOLIVAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CBO', '13244'),
(52, 9, 9, NULL, 1, 'SAN JACINTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SJA', '13654'),
(53, 10, 9, NULL, 1, 'OVEJAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'OV', '70508'),
(54, 10, 9, NULL, 1, 'SAN ONOFRE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SON', '70713'),
(55, 11, 10, NULL, 1, 'CACERES', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CAC', '5120'),
(56, 11, 10, NULL, 1, 'CAUCASIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CAU', '5154'),
(57, 11, 10, NULL, 1, 'EL BAGRE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'BAG', '5250'),
(58, 11, 10, NULL, 1, 'NECHI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'NEC', '5495'),
(59, 11, 10, NULL, 1, 'ZARAGOZA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'ZAR', '5895'),
(60, 11, 10, NULL, 1, 'ANORI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'AN', '5040'),
(61, 11, 10, NULL, 1, 'BRICEÑO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'BR', '5107'),
(62, 11, 10, NULL, 1, 'ITUANGO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'ITU', '5361'),
(63, 11, 10, NULL, 1, 'VALDIVIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'VAL', '5854'),
(64, 11, 10, NULL, 1, 'TARAZA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TAR', '5790'),
(65, 12, 11, NULL, 1, 'MONTELIBANO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'MON', '23466'),
(66, 12, 11, NULL, 1, 'PUERTO LIBERTADOR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'PLI', '23580'),
(67, 12, 11, NULL, 1, 'TIERRALTA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TIER', '23807'),
(68, 12, 11, NULL, 1, 'VALENCIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'VAL', '23855'),
(69, 12, 11, NULL, 1, 'SAN JOSE DE URE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SUR', '74'),
(70, 13, 12, NULL, 1, 'ATACO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'AT', '73067'),
(71, 13, 12, NULL, 1, 'CHAPARRAL', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CHA', '73168'),
(72, 13, 12, NULL, 1, 'PLANADAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'PLA', '73555'),
(73, 13, 12, NULL, 1, 'RIOBLANCO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'RBL', '73616'),
(74, 14, 13, NULL, 1, 'FLORIDA ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'FLO', '76275'),
(75, 14, 13, NULL, 1, 'GUADALAJARA DE BUGA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'BUG', '76111'),
(76, 14, 13, NULL, 1, 'PRADERA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'PARA', '76563'),
(77, 14, 13, NULL, 1, 'TULUA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'TUL', '76834'),
(78, 14, 13, NULL, 1, 'BUENAVENTURA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'BU', '76109'),
(79, 15, 14, NULL, 1, 'EL LITORAL DEL SAN JUAN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'LISA', '27250'),
(80, 15, 14, NULL, 1, 'ISTMINA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'IST', '27361'),
(81, 15, 14, NULL, 1, 'NOVITA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'NOV', '27491'),
(82, 15, 14, NULL, 1, 'SIPI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SIP', '27745'),
(83, 15, 14, NULL, 1, 'MEDIO SAN JUAN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'MSJ', '27450'),
(84, 15, 14, NULL, 1, 'SAN JOSE DEL PALMAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SPA', '27660'),
(85, 15, 14, NULL, 1, 'ALTO BAUDO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'ALB', '27025'),
(86, 15, 14, NULL, 1, 'MEDIO BAUDO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'MBA', '27430'),
(87, 15, 14, NULL, 1, 'BAJO BAUDO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'BB', '27077'),
(88, 15, 15, NULL, 1, 'CARMEN DEL DARIEN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CDA', '27150'),
(89, 15, 15, NULL, 1, 'RIOSUCIO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'RIS', '27615'),
(90, 15, 15, NULL, 1, 'UNGUIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'UNG', '27800'),
(91, 11, 15, NULL, 1, 'MUTATA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'MUT', '5480'),
(92, 11, 16, NULL, 1, 'GRANADA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'GRA', '50313'),
(93, 11, 16, NULL, 1, 'SAN CARLOS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SCA', '5649'),
(94, 11, 16, NULL, 1, 'SAN FRANCISCO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SFR', '5652'),
(95, 16, 17, NULL, 1, 'PUERTO LEGUIZAMO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'PLE', '62'),
(96, 16, 17, NULL, 1, 'PUERTO ASIS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'PUA', '86568'),
(97, 16, 17, NULL, 1, 'SAN MIGUEL', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SMI', '86757'),
(98, 16, 17, NULL, 1, 'VALLE DEL GUAMUEZ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'VGM', '86865'),
(99, 17, 18, NULL, 1, 'CARTAGENA DEL CHAIRA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CCH', '18150'),
(100, 17, 18, NULL, 1, 'SAN VICENTE DEL CAGUAN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SVI', '18753');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodo`
--

CREATE TABLE IF NOT EXISTS `nodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fase` int(11) NOT NULL,
  `formal` tinyint(1) NOT NULL,
  `negocio` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_65AA015BDADD026` (`usuario_modificacion_id`),
  KEY `IDX_65AA015BAEADF654` (`usuario_creacion_id`)
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permiso` longtext COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E553F37DADD026` (`usuario_modificacion_id`),
  KEY `IDX_E553F37AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `rol`, `permiso`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 1, 'ROLE_USER', '{"component":[{"id":1,"code":"1","path":"#","title":"Gestion Empresarial","checked":true,"module":[{"id":1,"code":"1","path":"#","title":"Formacion de capital social asociativo y desarrollo empresarial","checked":true,"subModule":[{"id":1,"code":"1","path":"gruposGestion","title":"Gestión de Grupos","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"CLEARGestion","title":"Gestión de CLEAR","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestión de seguimiento y monitoreo","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":2,"code":"2","path":"#","title":"Concursos de mejoramiento","checked":false,"subModule":[{"id":1,"code":"1","path":"concursoGestion","title":"Gestion de Concursos","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Gestion de Jurados","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestion de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":3,"code":"3","path":"#","title":"Servicios complementarios","checked":false,"subModule":[{"id":1,"code":"1","path":"#","title":"Participación rutas y pasantias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Participación en talleres","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Participación en Ferias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":4,"code":"4","path":"#","title":"Participación en ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":5,"code":"5","path":"#","title":"Desarrollo de ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]}]}]}', 1, '2016-01-26 16:15:04', '2016-01-18 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `numero_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05D92FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_2265B05DA0D96FBF` (`email_canonical`),
  KEY `IDX_2265B05DF6939175` (`tipo_documento_id`),
  KEY `IDX_2265B05DDADD026` (`usuario_modificacion_id`),
  KEY `IDX_2265B05DAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `password`, `salt`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`, `tipo_documento_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`) VALUES
(1, '111111', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '', '', '', '', 0, NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '', '', NULL, '', NULL),
(2, '$2y$13$nug00bsypis8kgwsw0440euZuIkfQpFju5ZOdG7zPn/11McKD4rCm', 'nug00bsypis8kgwsw0440o0o0swgw04', '7031447', '3057129065', 's.cantor@rmcproducciones.com', 1, NULL, '2016-01-12 14:40:51', 1, NULL, NULL, 's.cantor', 's.cantor', 's.cantor@rmcproducciones.com', 's.cantor@rmcproducciones.com', 1, '2016-03-14 14:52:31', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022376577', 'cantor', 'forero', 'juan', 'sebastian'),
(3, '$2y$13$mqri4n4dscg4s8wowoswgetXw8mtQ9h7rz94DZ.ew2lrvlQHtoqzW', 'mqri4n4dscg4s8wowoswgk004cgwogc', '1111111', '1234567897', 'juanc@hotmail.com', 1, NULL, '2016-01-29 17:29:49', 1, NULL, NULL, 'daniel', 'daniel', 'juanc@hotmail.com', 'juanc@hotmail.com', 1, '2016-01-29 18:06:10', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022376577', 'perez', 'bastidas', 'daniel', 'ricardo'),
(4, '$2y$13$fd8601sw4vco0cw8gk0gsu5YDCNEro073Zr6GJ7M9zPfN2ctMGbIu', 'fd8601sw4vco0cw8gk0gs8o8k4s8k8g', '10001001', '10001001', 'marcela.cortes.fonseca@gmail.com', 1, NULL, '2016-02-22 20:18:36', 1, NULL, NULL, 'marcela', 'marcela', 'marcela.cortes.fonseca@gmail.com', 'marcela.cortes.fonseca@gmail.com', 1, '2016-02-23 15:36:35', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '52814557', 'Cortes', NULL, 'Marcela', NULL),
(5, '$2y$13$67yodttax68s0ows80o44eg0oU2e6D3QstOiOFuYA4k2fzJAaNN5G', '67yodttax68s0ows80o44skko0ccw44', '1000100', '1000100', 'jarocha53@ucatolica.edu.com', 1, NULL, '2016-02-22 21:05:36', 1, NULL, NULL, 'j.rocha', 'j.rocha', 'jarocha53@ucatolica.edu.com', 'jarocha53@ucatolica.edu.com', 1, '2016-02-22 21:05:37', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '79884089', 'Rocha', NULL, 'Jhony', NULL),
(6, '$2y$13$2zo4pz4ola2ow0o80s0kceANQhTO0Nw4QjMLpv4yUyPF8ecqHTG7C', '2zo4pz4ola2ow0o80s0kco00osk888o', '342342', '34234234', 'asdasd@asdasd.com', 1, NULL, '2016-03-15 15:09:53', 1, NULL, NULL, 'armandocasas', 'armandocasas', 'asdasd@asdasd.com', 'asdasd@asdasd.com', 1, '2016-03-15 15:48:34', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '123123', 'casas', 'armando', 'armando', 'armando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A786041EDADD026` (`usuario_modificacion_id`),
  KEY `IDX_A786041EAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre`, `active`, `fecha_modificacion`, `fecha_creacion`, `abreviatura`) VALUES
(1, NULL, 1, 'Cauca Costa pacifica', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CP'),
(2, NULL, 1, 'Cauca Andino', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CA'),
(3, NULL, 1, 'Nariño Costa Pacifico', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'NP'),
(4, NULL, 1, 'Nariño Andino ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'NA'),
(5, NULL, 1, 'Arauca', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'AR'),
(6, NULL, 1, 'Catatumbo ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CA'),
(7, NULL, 1, 'Sierra Nevada Santa Marta', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SN'),
(8, NULL, 1, 'Region de la macarena ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'MA'),
(9, NULL, 1, 'Montes de Maria', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'MM'),
(10, NULL, 1, 'Nudo de Paramillo Antioquia', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'NP'),
(11, NULL, 1, 'Nudo de Paramillo Cordoba', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'NP'),
(12, NULL, 1, 'Sur del Tolima', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CC'),
(13, NULL, 1, 'Valle del Cauca', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'CC'),
(14, NULL, 1, 'Sur de Choco', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SCBA'),
(15, NULL, 1, 'Medio y bajo Atrato', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'SCBA'),
(16, NULL, 1, 'Oriente Antioque', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'OA'),
(17, NULL, 1, 'Putumayo', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'PU'),
(18, NULL, 1, 'Rio Caguan', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', 'RC');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `FK_40E497EBAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_40E497EBDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `documento_soporte`
--
ALTER TABLE `documento_soporte`
  ADD CONSTRAINT `FK_D79FEA30AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D79FEA30DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `FK_C54ECE20AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C54ECE20DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `FK_FE98F5E0104EA8FC` FOREIGN KEY (`zona_id`) REFERENCES `zona` (`id`),
  ADD CONSTRAINT `FK_FE98F5E05A91C08D` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`),
  ADD CONSTRAINT `FK_FE98F5E0AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FE98F5E0DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `nodo`
--
ALTER TABLE `nodo`
  ADD CONSTRAINT `FK_65AA015BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_65AA015BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `FK_E553F37AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E553F37DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_2265B05DAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_2265B05DDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_2265B05DF6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `FK_A786041EAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A786041EDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
