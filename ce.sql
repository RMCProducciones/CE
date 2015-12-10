-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2015 a las 14:14:06
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
-- Estructura de tabla para la tabla `actividad_concurso`
--

CREATE TABLE IF NOT EXISTS `actividad_concurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actividad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mejoras` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recursos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duracion` int(11) NOT NULL,
  `semana_inicio` int(11) NOT NULL,
  `semana_finalizacion` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `concurso_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_39B94E8CF415D168` (`concurso_id`),
  KEY `IDX_39B94E8CDADD026` (`usuario_modificacion_id`),
  KEY `IDX_39B94E8CAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ahorro`
--

CREATE TABLE IF NOT EXISTS `ahorro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `incentivo_ahorro_colectivo` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2F1C7D069C833003` (`grupo_id`),
  KEY `IDX_2F1C7D069F5A440B` (`estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ahorro`
--

INSERT INTO `ahorro` (`id`, `fecha_registro`, `fecha_inicio`, `incentivo_ahorro_colectivo`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`, `grupo_id`, `estado_id`) VALUES
(1, '2015-12-13 00:00:00', '2015-12-17 00:00:00', '122', 1, NULL, NULL, NULL, '2015-12-08 16:27:46', NULL, NULL),
(2, '2015-12-20 00:00:00', '2015-12-11 00:00:00', '213', 1, NULL, NULL, NULL, '2015-12-08 16:29:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_ahorro`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_ahorro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiario_ahorro_otro_programa` tinyint(1) NOT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_ahorro_activacion` decimal(10,0) NOT NULL,
  `meta_ahorro_mensual` decimal(10,0) NOT NULL,
  `plan_ahorro_individual` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ahorro_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_31D70FA3EC5CE259` (`ahorro_id`),
  KEY `IDX_31D70FA34B64ABC7` (`beneficiario_id`),
  KEY `IDX_31D70FA3DADD026` (`usuario_modificacion_id`),
  KEY `IDX_31D70FA3AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_poliza`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_poliza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiario_poliza_otro_programa` tinyint(1) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `poliza_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_66DA46FDD5746945` (`poliza_id`),
  KEY `IDX_66DA46FD4B64ABC7` (`beneficiario_id`),
  KEY `IDX_66DA46FDDADD026` (`usuario_modificacion_id`),
  KEY `IDX_66DA46FDAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_programa_capacitacion_financiera`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_programa_capacitacion_financiera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valoracion_inicial` int(11) NOT NULL,
  `valoracion_final` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `programa_capacitacion_financiera_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `participante_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8FF37416B25D3FE` (`programa_capacitacion_financiera_id`),
  KEY `IDX_D8FF37414B64ABC7` (`beneficiario_id`),
  KEY `IDX_D8FF3741F6F50196` (`participante_id`),
  KEY `IDX_D8FF3741DADD026` (`usuario_modificacion_id`),
  KEY `IDX_D8FF3741AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_clear`
--

CREATE TABLE IF NOT EXISTS `asignacion_grupo_clear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clear` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `habilitacion` tinyint(1) NOT NULL,
  `asignacion` tinyint(1) NOT NULL,
  `contraloria_social` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2858D49C9C833003` (`grupo_id`),
  KEY `IDX_2858D49CDADD026` (`usuario_modificacion_id`),
  KEY `IDX_2858D49CAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_integrante_clear`
--

CREATE TABLE IF NOT EXISTS `asignacion_integrante_clear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clear` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `integrante_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ECDABF1F6EA6C980` (`integrante_id`),
  KEY `IDX_ECDABF1F4BAB96C` (`rol_id`),
  KEY `IDX_ECDABF1FDADD026` (`usuario_modificacion_id`),
  KEY `IDX_ECDABF1FAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_usuario_beca`
--

CREATE TABLE IF NOT EXISTS `asignacion_usuario_beca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_asignacion` datetime NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `beca_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FF79C6A31D749D82` (`beca_id`),
  KEY `IDX_FF79C6A3DB38439E` (`usuario_id`),
  KEY `IDX_FF79C6A39F5A440B` (`estado_id`),
  KEY `IDX_FF79C6A3DADD026` (`usuario_modificacion_id`),
  KEY `IDX_FF79C6A3AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_usuario_capacitacion`
--

CREATE TABLE IF NOT EXISTS `asignacion_usuario_capacitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_asignacion` datetime NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `capacitacion_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BDD027055B587DA` (`capacitacion_id`),
  KEY `IDX_BDD02705DB38439E` (`usuario_id`),
  KEY `IDX_BDD027059F5A440B` (`estado_id`),
  KEY `IDX_BDD02705DADD026` (`usuario_modificacion_id`),
  KEY `IDX_BDD02705AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_usuario_evento`
--

CREATE TABLE IF NOT EXISTS `asignacion_usuario_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_34D8601987A5F842` (`evento_id`),
  KEY `IDX_34D86019DB38439E` (`usuario_id`),
  KEY `IDX_34D86019DADD026` (`usuario_modificacion_id`),
  KEY `IDX_34D86019AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beca`
--

CREATE TABLE IF NOT EXISTS `beca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `modalidad_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8A1280F5A9276E6C` (`tipo_id`),
  KEY `IDX_8A1280F51E092B9F` (`modalidad_id`),
  KEY `IDX_8A1280F558BC1BE0` (`municipio_id`),
  KEY `IDX_8A1280F5DADD026` (`usuario_modificacion_id`),
  KEY `IDX_8A1280F5AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `beca`
--

INSERT INTO `beca` (`id`, `entidad`, `nombre`, `fecha_publicacion`, `fecha_inicio`, `fecha_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`, `tipo_id`, `modalidad_id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, 'fdsfsaf', 'sdafsadfasdf', '2015-12-19 00:00:00', '2015-12-10 00:00:00', '2015-12-20 00:00:00', 1, NULL, '2015-12-07 23:31:28', 156, 158, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE IF NOT EXISTS `beneficiario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `pertenencia_etnica_id` int(11) DEFAULT NULL,
  `grupo_indigena_id` int(11) DEFAULT NULL,
  `estado_civil_id` int(11) DEFAULT NULL,
  `rol_grupo_familiar_id` int(11) DEFAULT NULL,
  `hijos_menores_5_id` int(11) DEFAULT NULL,
  `miembros_nucleo_familiar_id` int(11) DEFAULT NULL,
  `nivel_estudios_id` int(11) DEFAULT NULL,
  `ocupacion_id` int(11) DEFAULT NULL,
  `tipo_vivienda_id` int(11) DEFAULT NULL,
  `tipo_documento_conyugue_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `numero_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `edad_inscripcion` int(11) NOT NULL,
  `joven_rural` tinyint(1) DEFAULT NULL,
  `corte_sisben` decimal(10,0) DEFAULT NULL,
  `puntaje_sisben` decimal(10,0) DEFAULT NULL,
  `desplazado` tinyint(1) DEFAULT NULL,
  `red_unidos` tinyint(1) DEFAULT NULL,
  `sabe_leer` tinyint(1) DEFAULT NULL,
  `sabe_escribir` tinyint(1) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rural` tinyint(1) NOT NULL,
  `barrio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `corregimiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vereda` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cacerio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_documento_conyugue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_apellido_conyugue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundo_apellido_conyugue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_nombre_conyugue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundo_nombre_conyugue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_fijo_conyugue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular_conyugue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `discapacidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E8D0B6179C833003` (`grupo_id`),
  KEY `IDX_E8D0B617F6939175` (`tipo_documento_id`),
  KEY `IDX_E8D0B617BCE7B795` (`genero_id`),
  KEY `IDX_E8D0B617DA995DEC` (`pertenencia_etnica_id`),
  KEY `IDX_E8D0B6177AAA0F5A` (`grupo_indigena_id`),
  KEY `IDX_E8D0B61775376D93` (`estado_civil_id`),
  KEY `IDX_E8D0B617FFAE2092` (`rol_grupo_familiar_id`),
  KEY `IDX_E8D0B6176313548C` (`hijos_menores_5_id`),
  KEY `IDX_E8D0B61797F167E4` (`miembros_nucleo_familiar_id`),
  KEY `IDX_E8D0B617378258DA` (`nivel_estudios_id`),
  KEY `IDX_E8D0B617D8999C67` (`ocupacion_id`),
  KEY `IDX_E8D0B617B4837970` (`tipo_vivienda_id`),
  KEY `IDX_E8D0B617906677C2` (`tipo_documento_conyugue_id`),
  KEY `IDX_E8D0B617DADD026` (`usuario_modificacion_id`),
  KEY `IDX_E8D0B617AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_experiencia_exitosa`
--

CREATE TABLE IF NOT EXISTS `calificacion_experiencia_exitosa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `experiencia_exitosa_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_46C93B57D327D072` (`experiencia_exitosa_id`),
  KEY `IDX_46C93B57DADD026` (`usuario_modificacion_id`),
  KEY `IDX_46C93B57AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion`
--

CREATE TABLE IF NOT EXISTS `capacitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacitador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `modalidad_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A430D21A9276E6C` (`tipo_id`),
  KEY `IDX_5A430D211E092B9F` (`modalidad_id`),
  KEY `IDX_5A430D2158BC1BE0` (`municipio_id`),
  KEY `IDX_5A430D21DADD026` (`usuario_modificacion_id`),
  KEY `IDX_5A430D21AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `capacitacion`
--

INSERT INTO `capacitacion` (`id`, `capacitador`, `nombre`, `fecha_publicacion`, `fecha_inicio`, `fecha_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`, `tipo_id`, `modalidad_id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, 'dasfasdfasdfdsfg', 'sdfgfdhgafdgadsgfsg', '2015-12-20 00:00:00', '2015-12-17 00:00:00', '2015-12-18 00:00:00', 1, NULL, '2015-12-08 13:37:24', NULL, NULL, 11, NULL, NULL),
(2, 'juan pedro', 'klkajkajajaj', '2015-12-04 00:00:00', '2016-01-01 00:00:00', '2015-12-11 00:00:00', 1, NULL, '2015-12-08 13:46:57', NULL, NULL, 13, NULL, NULL),
(3, 'EDWIN ahahahahahahah', 'csdhjuddsdffdsdfjjdjk', '2015-12-20 00:00:00', '2015-12-12 00:00:00', '2015-12-10 00:00:00', 1, NULL, '2015-12-08 13:56:43', 160, 164, 1, NULL, NULL),
(4, 'fgsdfgdfsg', '3terfg', '2015-12-12 00:00:00', '2015-12-10 00:00:00', '2015-12-20 00:00:00', 1, NULL, '2015-12-08 14:19:45', 163, 164, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion_financiera`
--

CREATE TABLE IF NOT EXISTS `capacitacion_financiera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `programa_capacitacion_financiera_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16AFBD3A6B25D3FE` (`programa_capacitacion_financiera_id`),
  KEY `IDX_16AFBD3A9F5A440B` (`estado_id`),
  KEY `IDX_16AFBD3ADADD026` (`usuario_modificacion_id`),
  KEY `IDX_16AFBD3AAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clear`
--

CREATE TABLE IF NOT EXISTS `clear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `lugar_realizacion_CLEAR` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E5B1F10658BC1BE0` (`municipio_id`),
  KEY `IDX_E5B1F106DADD026` (`usuario_modificacion_id`),
  KEY `IDX_E5B1F106AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clear`
--

INSERT INTO `clear` (`id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_inicio`, `fecha_finalizacion`, `lugar_realizacion_CLEAR`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, NULL, NULL, '2015-11-06 00:00:00', '2015-11-27 00:00:00', 0, 1, NULL, '2015-11-18 23:04:46'),
(2, 1, NULL, NULL, '2015-11-14 00:00:00', '2015-11-21 00:00:00', 0, 1, NULL, '2015-11-23 21:38:38'),
(3, 1, NULL, NULL, '2015-11-15 00:00:00', '2015-11-12 00:00:00', 0, 1, NULL, '2015-11-27 16:01:49'),
(4, 1, NULL, NULL, '2015-12-22 00:00:00', '2015-12-13 00:00:00', 0, 1, NULL, '2015-12-02 15:43:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso`
--

CREATE TABLE IF NOT EXISTS `concurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_bases` datetime NOT NULL,
  `tematica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ambito` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `problematica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actividades` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resultados` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `distribucion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `criterios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aprobacion` tinyint(1) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `modalidad_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_785F9DE6A9276E6C` (`tipo_id`),
  KEY `IDX_785F9DE61E092B9F` (`modalidad_id`),
  KEY `IDX_785F9DE6DADD026` (`usuario_modificacion_id`),
  KEY `IDX_785F9DE6AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `concurso`
--

INSERT INTO `concurso` (`id`, `fecha_bases`, `tematica`, `ambito`, `problematica`, `actividades`, `resultados`, `valor`, `distribucion`, `criterios`, `aprobacion`, `fecha_inicio`, `fecha_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`, `tipo_id`, `modalidad_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, '2015-12-20 00:00:00', 'dsfsdf', 'dsfsdf', 'dsfsd', 'dsfsdf', 'dsfsdf', 'dsfsdf', 'dsfsdf', 'dsfsdf', NULL, NULL, NULL, 1, NULL, '2015-12-04 20:35:21', NULL, NULL, NULL, NULL),
(2, '2015-12-24 00:00:00', 'ESTA TEMATICA AEASDASDASD ASDASD ASDASD', 'SADFADSFASD', 'ASDFASDF', 'ADSFADSF', 'ASDFASDF', 'ADSFASDF', 'ADSFASDF', 'ADSFASDFASDF', NULL, NULL, NULL, 1, NULL, '2015-12-04 20:49:10', NULL, NULL, NULL, NULL),
(3, '2015-12-18 00:00:00', 'dsfdasdasfasdf', 'asdfasdadsf', 'sdafa', 'adsfasd', 'adsfas', 'ADSfasdf', 'asdfasdf', 'dsafasdf', NULL, NULL, NULL, 1, NULL, '2015-12-04 22:11:03', NULL, 143, NULL, NULL),
(4, '2015-12-13 00:00:00', 'czxcz<cxzx', 'czxvzxcv', 'xczvzxcv', 'zxcvzxcv', 'xzcvzxcv', 'xczvzxcv', 'zcxvzxcv', 'czxvzcxvczvzcv', NULL, NULL, NULL, 1, NULL, '2015-12-04 22:26:32', 144, 143, NULL, NULL),
(5, '2015-12-19 00:00:00', 'esto es para hacer tal cosa', 'sdasd', 'adsfadf', 'adsfasdf', 'sdafdsaf', 'sdfsadf', 'asdfadf', 'adsfasdf', NULL, NULL, NULL, 1, NULL, '2015-12-07 13:19:12', 147, 142, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE IF NOT EXISTS `convocatoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poa_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `numero` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6D773021BB18C0BA` (`poa_id`),
  KEY `IDX_6D773021DADD026` (`usuario_modificacion_id`),
  KEY `IDX_6D773021AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `convocatoria`
--

INSERT INTO `convocatoria` (`id`, `poa_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_inicio`, `fecha_cierre`, `fecha_modificacion`, `fecha_creacion`, `numero`, `active`) VALUES
(1, 1, NULL, NULL, '2011-04-17 00:00:00', '2013-05-28 00:00:00', NULL, '2015-11-11 23:28:00', 1, 0),
(2, 1, NULL, NULL, '2011-04-17 00:00:00', '2013-05-28 00:00:00', NULL, '2015-11-11 23:29:25', 1, 0),
(3, 1, NULL, NULL, '2011-04-17 00:00:00', '2013-05-28 00:00:00', NULL, '2015-11-11 23:33:04', 1, 0),
(4, 1, NULL, NULL, '2011-04-17 00:00:00', '2013-05-28 00:00:00', NULL, '2015-11-11 23:34:56', 1, 0);

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
  PRIMARY KEY (`id`),
  KEY `IDX_40E497EBDADD026` (`usuario_modificacion_id`),
  KEY `IDX_40E497EBAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'CAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(2, NULL, NULL, 'NARI?O', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(3, NULL, NULL, 'ARAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(4, NULL, NULL, 'NTE DE SANTANDER', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(5, NULL, NULL, 'CESAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(6, NULL, NULL, 'LA GUAJIRA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(7, NULL, NULL, 'MAGDALENA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(8, NULL, NULL, 'META', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(9, NULL, NULL, 'BOLIVAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(10, NULL, NULL, 'SUCRE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(11, NULL, NULL, 'ANTIOQUIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(12, NULL, NULL, 'CORDOBA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(13, NULL, NULL, 'TOLIMA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(14, NULL, NULL, 'VALLE DEL CAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(15, NULL, NULL, 'CHOCO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(16, NULL, NULL, 'PUTUMAYO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(17, NULL, NULL, 'CAQUETA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organizador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_47860B05A9276E6C` (`tipo_id`),
  KEY `IDX_47860B0558BC1BE0` (`municipio_id`),
  KEY `IDX_47860B05DADD026` (`usuario_modificacion_id`),
  KEY `IDX_47860B05AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `organizador`, `nombre`, `descripcion`, `fecha_publicacion`, `fecha_inicio`, `fecha_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`, `tipo_id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, 'asdfasdfadsfadsf', 'adsfasdfasdf', 'dasfasfasdf', '2015-12-26 00:00:00', '2015-12-04 00:00:00', '2015-12-12 00:00:00', 1, NULL, '2015-12-08 14:41:29', 162, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_exitosa`
--

CREATE TABLE IF NOT EXISTS `experiencia_exitosa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` datetime NOT NULL,
  `numero_empleos` int(11) NOT NULL,
  `ventas_mes` int(11) NOT NULL,
  `produccion_mensual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fuentes_financiacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_recursos_financiacion` decimal(10,0) NOT NULL,
  `tipo_poblacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proceso_productivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `testimonio_poblacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acciones_minimizacion_impacto_ambiental` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `impacto_comunidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `innovacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_380325B19C833003` (`grupo_id`),
  KEY `IDX_380325B1DADD026` (`usuario_modificacion_id`),
  KEY `IDX_380325B1AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `experiencia_exitosa`
--

INSERT INTO `experiencia_exitosa` (`id`, `fecha_registro`, `numero_empleos`, `ventas_mes`, `produccion_mensual`, `fuentes_financiacion`, `valor_recursos_financiacion`, `tipo_poblacion`, `proceso_productivo`, `testimonio_poblacion`, `acciones_minimizacion_impacto_ambiental`, `impacto_comunidad`, `innovacion`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, '2015-12-20 00:00:00', 1, -3, 'fdsfds', 'asdfdsf', '5445464', 'dsfasdf', 'dsfaasdf', 'adsfsdfad', 'sfasdfasdf', 'asdfasdfasdf', 'asdfadsfsadf', 'asdfadsfadsfasdf', 1, NULL, '2015-12-07 17:32:40', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `convocatoria_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `figura_legal_constitucion_id` int(11) DEFAULT NULL,
  `entidad_financiera_cuenta_id` int(11) DEFAULT NULL,
  `tipo_cuenta_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_inscripcion` datetime NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rural` tinyint(1) NOT NULL,
  `barrio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corregimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vereda` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cacerio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_identificacion_tributaria` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_constitucion_legal` datetime DEFAULT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8C0E9BD320332D99` (`codigo`),
  KEY `IDX_8C0E9BD34EE93BE6` (`convocatoria_id`),
  KEY `IDX_8C0E9BD358BC1BE0` (`municipio_id`),
  KEY `IDX_8C0E9BD3A9276E6C` (`tipo_id`),
  KEY `IDX_8C0E9BD3BE494C72` (`figura_legal_constitucion_id`),
  KEY `IDX_8C0E9BD33771B82E` (`entidad_financiera_cuenta_id`),
  KEY `IDX_8C0E9BD378814E56` (`tipo_cuenta_id`),
  KEY `IDX_8C0E9BD3DADD026` (`usuario_modificacion_id`),
  KEY `IDX_8C0E9BD3AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `convocatoria_id`, `municipio_id`, `tipo_id`, `figura_legal_constitucion_id`, `entidad_financiera_cuenta_id`, `tipo_cuenta_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_inscripcion`, `codigo`, `nombre`, `direccion`, `rural`, `barrio`, `corregimiento`, `vereda`, `cacerio`, `numero_identificacion_tributaria`, `fecha_constitucion_legal`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2010-01-01 00:00:00', 'AAA111', 'ASDFSADF', 'ASDF', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3102343243', 'sdsdf@sdfsdf', 0, NULL, NULL),
(2, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2010-01-01 00:00:00', 'AAA112', 'werwer', 'asdfds', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '234324', 'asdfs@asdfdsf', 0, NULL, NULL),
(3, NULL, 23, NULL, NULL, NULL, NULL, NULL, NULL, '2010-01-01 00:00:00', 'ASDFSD', 'ASDF', 'SADF', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '234234', 'asdf@asdf', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_soporte`
--

CREATE TABLE IF NOT EXISTS `grupo_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5D2EB4619C833003` (`grupo_id`),
  KEY `IDX_5D2EB461E24646FA` (`tipo_soporte_id`),
  KEY `IDX_5D2EB461DADD026` (`usuario_modificacion_id`),
  KEY `IDX_5D2EB461AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `grupo_soporte`
--

INSERT INTO `grupo_soporte` (`id`, `grupo_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 140, NULL, NULL, 'png', 1, NULL, '2015-12-02 15:29:34'),
(2, 1, 141, NULL, NULL, 'd183559a00ef10833175f0dac6500ea275af3d81.png', 0, '2015-12-03 19:59:16', '2015-12-03 19:59:02'),
(3, 1, 141, NULL, NULL, '8dda62cff36115848bf6f97e447b7bb1bede97b7.png', 1, NULL, '2015-12-03 19:59:16'),
(4, 1, 140, NULL, NULL, '95db73dfd28a96042e46fd94aec6726b2a671d34.png', 0, '2015-12-03 20:00:23', '2015-12-03 20:00:10'),
(5, 1, 140, NULL, NULL, '2f02b7c062f681ad3a0f7fc9c3fa236bbf83c8bd.png', 1, NULL, '2015-12-03 20:00:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante_clear`
--

CREATE TABLE IF NOT EXISTS `integrante_clear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `nivel_estudios_id` int(11) DEFAULT NULL,
  `pertenencia_etnica_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `numero_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `entidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_celular2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_380CDB55F6939175` (`tipo_documento_id`),
  KEY `IDX_380CDB55BCE7B795` (`genero_id`),
  KEY `IDX_380CDB5558BC1BE0` (`municipio_id`),
  KEY `IDX_380CDB55378258DA` (`nivel_estudios_id`),
  KEY `IDX_380CDB55DA995DEC` (`pertenencia_etnica_id`),
  KEY `IDX_380CDB55DADD026` (`usuario_modificacion_id`),
  KEY `IDX_380CDB55AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `integrante_clear`
--

INSERT INTO `integrante_clear` (`id`, `tipo_documento_id`, `genero_id`, `municipio_id`, `nivel_estudios_id`, `pertenencia_etnica_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `entidad`, `cargo`, `direccion`, `telefono_fijo`, `telefono_celular`, `telefono_celular2`, `correo_electronico`, `foto`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(10, 1, 6, 1, NULL, 50, NULL, NULL, '1022376577', 'cantor', 'forero', 'juan', 'Sebastian', '2015-12-19 00:00:00', 'RMC Producciones', 'Ingeniero Mecatronico', 'callek', '983484489', '893423894', NULL, 'juanchhh@hotmaaa.com', NULL, 1, NULL, '2015-12-02 19:36:13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=171 ;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `dominio`, `descripcion`, `abreviatura`, `orden`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'tipo_documento', 'Cedula de Ciudadania', 'CC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(2, NULL, NULL, 'tipo_documento', 'Cedula de Extrangeria', 'CE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(3, NULL, NULL, 'tipo_documento', 'Pasaporte', 'PA', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(4, NULL, NULL, 'tipo_documento', 'Tarjeta de Identidad', 'TI', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(5, NULL, NULL, 'tipo_documento', 'Registro Civil', 'RC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(6, NULL, NULL, 'genero', 'Masculino', 'M', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(7, NULL, NULL, 'genero', 'Femenino', 'F', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(8, NULL, NULL, 'estado_civil', 'Soltero', 'S', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(9, NULL, NULL, 'estado_civil', 'Casado', 'C', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(10, NULL, NULL, 'estado_civil', 'Union Libre', 'UL', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(11, NULL, NULL, 'estado_civil', 'Viudo', 'V', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(12, NULL, NULL, 'rol_grupo_familiar', 'Jefe de Hogar ', 'JH', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(13, NULL, NULL, 'rol_grupo_familiar', 'Miembro del Hogar', 'MH', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
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
(28, NULL, NULL, 'nivel-estudios-id', 'Pre escolar ', 'PE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(29, NULL, NULL, 'nivel-estudios-id', 'Primaria', 'PRI', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(30, NULL, NULL, 'nivel-estudios-id', 'Bachillerato', 'BAC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(31, NULL, NULL, 'nivel-estudios-id', 'Universitaria', 'UNI', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(32, NULL, NULL, 'nivel-estudios-id', 'Post Grado', 'POST', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(33, NULL, NULL, 'nivel-estudios-id', 'Ninguno', 'NONE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(34, NULL, NULL, 'ocupacion', 'Empleado', 'EM', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(35, NULL, NULL, 'ocupacion', 'Independiente', 'IN', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(36, NULL, NULL, 'ocupacion', 'Desempleado', 'DES', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(37, NULL, NULL, 'tipo_vivienda', 'Propia', 'PR', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(38, NULL, NULL, 'tipo_vivienda', 'Arriendo', 'ARR', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(39, NULL, NULL, 'tipo_vivienda', 'Alquilada', 'ALQ', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(40, NULL, NULL, 'tipo_documento_conyuge', 'Cedula de Ciudadania', 'CC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(41, NULL, NULL, 'tipo_documento_conyuge', 'Cedula de Extrangeria', 'CE', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(42, NULL, NULL, 'tipo_documento_conyuge', 'Pasaporte', 'PA', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(43, NULL, NULL, 'tipo_documento_conyuge', 'Tarjeta de Identidad', 'TI', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(44, NULL, NULL, 'tipo_documento_conyuge', 'Registro Civil', 'RC', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(45, NULL, NULL, 'grupo_indigena', 'Indigena', 'IND', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(46, NULL, NULL, 'grupo_indigena', 'Afrodecendiente', 'AFRO', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(47, NULL, NULL, 'grupo_indigena', 'Palenquedo de san Basilio', 'PASB', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(48, NULL, NULL, 'grupo_indigena', 'Raizal', 'RAIZAL', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(49, NULL, NULL, 'grupo_indigena', 'ROM', 'ROM', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(50, NULL, NULL, 'pertenencia_etnica', 'Achagua', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(51, NULL, NULL, 'pertenencia_etnica', 'Amor?a', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(52, NULL, NULL, 'pertenencia_etnica', 'Andoke', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(53, NULL, NULL, 'pertenencia_etnica', 'Arhuaco', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(54, NULL, NULL, 'pertenencia_etnica', 'Awa', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(55, NULL, NULL, 'pertenencia_etnica', 'Bara', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(56, NULL, NULL, 'pertenencia_etnica', 'Barasana', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(57, NULL, NULL, 'pertenencia_etnica', 'Bar', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(58, NULL, NULL, 'pertenencia_etnica', 'Betoye', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(59, NULL, NULL, 'pertenencia_etnica', 'Bora', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(60, NULL, NULL, 'pertenencia_etnica', 'Ca?amomo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(61, NULL, NULL, 'pertenencia_etnica', 'Carapana', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(62, NULL, NULL, 'pertenencia_etnica', 'Chimila', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(63, NULL, NULL, 'pertenencia_etnica', 'Chiricoa', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(64, NULL, NULL, 'pertenencia_etnica', 'Cocama', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(65, NULL, NULL, 'pertenencia_etnica', 'Coconuco', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(66, NULL, NULL, 'pertenencia_etnica', 'Coreguaje', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(67, NULL, NULL, 'pertenencia_etnica', 'Coyaima-Natagaima', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(68, NULL, NULL, 'pertenencia_etnica', 'Desano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(69, NULL, NULL, 'pertenencia_etnica', 'Dujo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(70, NULL, NULL, 'pertenencia_etnica', 'Embera', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(71, NULL, NULL, 'pertenencia_etnica', 'Embera Kat', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(72, NULL, NULL, 'pertenencia_etnica', 'Embera-Cham', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(73, NULL, NULL, 'pertenencia_etnica', 'Eperara-Siapidara', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(74, NULL, NULL, 'pertenencia_etnica', 'Guambiano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(75, NULL, NULL, 'pertenencia_etnica', 'Guanaca', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(76, NULL, NULL, 'pertenencia_etnica', 'Guane', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(77, NULL, NULL, 'pertenencia_etnica', 'Guayabero', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(78, NULL, NULL, 'pertenencia_etnica', 'Hitnu', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(79, NULL, NULL, 'pertenencia_etnica', 'Hupdu', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(80, NULL, NULL, 'pertenencia_etnica', 'Inga', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(81, NULL, NULL, 'pertenencia_etnica', 'Juhup', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(82, NULL, NULL, 'pertenencia_etnica', 'Kakua', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(83, NULL, NULL, 'pertenencia_etnica', 'Kam?nts', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(84, NULL, NULL, 'pertenencia_etnica', 'Kankuamo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(85, NULL, NULL, 'pertenencia_etnica', 'Karijona', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(86, NULL, NULL, 'pertenencia_etnica', 'Kawiyar? - Cabiyar', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(87, NULL, NULL, 'pertenencia_etnica', 'Kof', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(88, NULL, NULL, 'pertenencia_etnica', 'Kogui', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(89, NULL, NULL, 'pertenencia_etnica', 'Kubeo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(90, NULL, NULL, 'pertenencia_etnica', 'Kuiba', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(91, NULL, NULL, 'pertenencia_etnica', 'Kurripaco', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(92, NULL, NULL, 'pertenencia_etnica', 'Letuama', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(93, NULL, NULL, 'pertenencia_etnica', 'Makaguaje', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(94, NULL, NULL, 'pertenencia_etnica', 'Makuna', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(95, NULL, NULL, 'pertenencia_etnica', 'Masiguare', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(96, NULL, NULL, 'pertenencia_etnica', 'Matap', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(97, NULL, NULL, 'pertenencia_etnica', 'Mira', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(98, NULL, NULL, 'pertenencia_etnica', 'Mokan', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(99, NULL, NULL, 'pertenencia_etnica', 'Muinane', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(100, NULL, NULL, 'pertenencia_etnica', 'Muisca', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(101, NULL, NULL, 'pertenencia_etnica', 'Nasa - P?ez', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(102, NULL, NULL, 'pertenencia_etnica', 'Nonuya', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(103, NULL, NULL, 'pertenencia_etnica', 'Nukak', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(104, NULL, NULL, 'pertenencia_etnica', 'Ocaina', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(105, NULL, NULL, 'pertenencia_etnica', 'Pasto', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(106, NULL, NULL, 'pertenencia_etnica', 'Piapoco', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(107, NULL, NULL, 'pertenencia_etnica', 'Piaroa', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(108, NULL, NULL, 'pertenencia_etnica', 'Piratapuyo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(109, NULL, NULL, 'pertenencia_etnica', 'Pisamira', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(110, NULL, NULL, 'pertenencia_etnica', 'Puinave', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(111, NULL, NULL, 'pertenencia_etnica', 'S?liba', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(112, NULL, NULL, 'pertenencia_etnica', 'S?nha', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(113, NULL, NULL, 'pertenencia_etnica', 'Sen?', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(114, NULL, NULL, 'pertenencia_etnica', 'Sikuani', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(115, NULL, NULL, 'pertenencia_etnica', 'Siona', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(116, NULL, NULL, 'pertenencia_etnica', 'Siriano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(117, NULL, NULL, 'pertenencia_etnica', 'Taiwano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(118, NULL, NULL, 'pertenencia_etnica', 'Tanimuka', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(119, NULL, NULL, 'pertenencia_etnica', 'Tariano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(120, NULL, NULL, 'pertenencia_etnica', 'Tatuyo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(121, NULL, NULL, 'pertenencia_etnica', 'Tikuna', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(122, NULL, NULL, 'pertenencia_etnica', 'Totor', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(123, NULL, NULL, 'pertenencia_etnica', 'Tsiripu', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(124, NULL, NULL, 'pertenencia_etnica', 'Tucano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(125, NULL, NULL, 'pertenencia_etnica', 'Tule', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(126, NULL, NULL, 'pertenencia_etnica', 'Tuyuka', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(127, NULL, NULL, 'pertenencia_etnica', 'U?wa - Tunebo', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(128, NULL, NULL, 'pertenencia_etnica', 'Uitoto', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(129, NULL, NULL, 'pertenencia_etnica', 'Wanano', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(130, NULL, NULL, 'pertenencia_etnica', 'Waunan', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(131, NULL, NULL, 'pertenencia_etnica', 'Wayuu', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(132, NULL, NULL, 'pertenencia_etnica', 'Wiwa', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(133, NULL, NULL, 'pertenencia_etnica', 'Yagua', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(134, NULL, NULL, 'pertenencia_etnica', 'Yanacona', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(135, NULL, NULL, 'pertenencia_etnica', 'Yauna', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(136, NULL, NULL, 'pertenencia_etnica', 'Yuko', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(137, NULL, NULL, 'pertenencia_etnica', 'Yukuna', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(138, NULL, NULL, 'pertenencia_etnica', 'Yuri', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(139, NULL, NULL, 'pertenencia_etnica', 'Yurut', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
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
(170, NULL, NULL, 'estado_capacitacion_financiera', 'Finalizado', 'FI', NULL, 1, NULL, '2015-12-09 00:00:00');

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
  PRIMARY KEY (`id`),
  KEY `IDX_FE98F5E05A91C08D` (`departamento_id`),
  KEY `IDX_FE98F5E0104EA8FC` (`zona_id`),
  KEY `IDX_FE98F5E0DADD026` (`usuario_modificacion_id`),
  KEY `IDX_FE98F5E0AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=101 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `departamento_id`, `zona_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 1, NULL, 1, 'ARGELIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(2, 1, 1, NULL, 1, 'BALBOA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(3, 1, 1, NULL, 1, 'GUAPI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(4, 1, 1, NULL, 1, 'LOPEZ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(5, 1, 1, NULL, 1, 'TIMBIQUI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(6, 1, 1, NULL, 1, 'EL TAMBO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(7, 1, 2, NULL, 1, 'TORIBIO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(8, 1, 2, NULL, 1, 'CALOTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(9, 1, 2, NULL, 1, 'CORINTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(10, 1, 2, NULL, 1, 'SANTANDER DE QUILICHAO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(11, 1, 2, NULL, 1, 'JAMBALO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(12, 1, 2, NULL, 1, 'MIRANDA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(13, 2, 3, NULL, 1, 'BARBACOAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(14, 2, 3, NULL, 1, 'OLAYA HERRERA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(15, 2, 3, NULL, 1, 'RICAURTE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(16, 2, 3, NULL, 1, 'SAN ANDRES DE TUMACO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(17, 2, 4, NULL, 1, 'LEIVA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(18, 2, 4, NULL, 1, 'EL ROSARIO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(19, 2, 4, NULL, 1, 'POLICARPA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(20, 2, 4, NULL, 1, 'SAMANIEGO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(21, 2, 4, NULL, 1, 'CUMBITARA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(22, 3, 5, NULL, 1, 'ARAUQUITA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(23, 3, 5, NULL, 1, 'FORTUL', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(24, 3, 5, NULL, 1, 'SARAVENA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(25, 3, 5, NULL, 1, 'TAME', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(26, 4, 6, NULL, 1, 'ABREGO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(27, 4, 6, NULL, 1, 'EL TARRA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(28, 4, 6, NULL, 1, 'HACARI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(29, 4, 6, NULL, 1, 'LA PLAYA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(30, 4, 6, NULL, 1, 'OCAÑA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(31, 4, 6, NULL, 1, 'SAN CALIXTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(32, 4, 6, NULL, 1, 'TEORAMA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(33, 4, 6, NULL, 1, 'CONVENCION', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(34, 4, 6, NULL, 1, 'EL CARMEN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(35, 4, 6, NULL, 1, 'TIBU', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(36, 5, 7, NULL, 1, 'PUEBLO BELLO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(37, 5, 7, NULL, 1, 'VALLEDUPAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(38, 6, 7, NULL, 1, 'DIBULLA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(39, 6, 7, NULL, 1, 'SAN JUAN DEL CESAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(40, 7, 7, NULL, 1, 'ARACATACA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(41, 7, 7, NULL, 1, 'CIENAGA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(42, 7, 7, NULL, 1, 'FUNDACION', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(43, 7, 7, NULL, 1, 'SANTA MARTA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(44, 7, 7, NULL, 1, 'ALGARROBO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(45, 8, 8, NULL, 1, 'LA MACARENA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(46, 8, 8, NULL, 1, 'MESETAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(47, 8, 8, NULL, 1, 'PUERTO RICO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(48, 8, 8, NULL, 1, 'SAN JUAN DE ARAMA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(49, 8, 8, NULL, 1, 'URIBE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(50, 8, 8, NULL, 1, 'VISTAHERMOSA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(51, 9, 9, NULL, 1, 'EL CARMEN DE BOLIVAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(52, 9, 9, NULL, 1, 'SAN JACINTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(53, 10, 9, NULL, 1, 'OVEJAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(54, 10, 9, NULL, 1, 'SAN ONOFRE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(55, 11, 10, NULL, 1, 'CACERES', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(56, 11, 10, NULL, 1, 'CAUCASIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(57, 11, 10, NULL, 1, 'EL BAGRE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(58, 11, 10, NULL, 1, 'NECH', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(59, 11, 10, NULL, 1, 'ZARAGOZA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(60, 11, 10, NULL, 1, 'ANORI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(61, 11, 10, NULL, 1, 'BRICE?O', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(62, 11, 10, NULL, 1, 'ITUANGO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(63, 11, 10, NULL, 1, 'VALDIVIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(64, 11, 10, NULL, 1, 'TARAZA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(65, 12, 11, NULL, 1, 'MONTELIBANO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(66, 12, 11, NULL, 1, 'PUERTO LIBERTADOR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(67, 12, 11, NULL, 1, 'TIERRALTA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(68, 12, 11, NULL, 1, 'VALENCIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(69, 12, 11, NULL, 1, 'SAN JOSE DE URE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(70, 13, 12, NULL, 1, 'ATACO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(71, 13, 12, NULL, 1, 'CHAPARRAL', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(72, 13, 12, NULL, 1, 'PLANADAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(73, 13, 12, NULL, 1, 'RIOBLANCO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(74, 14, 13, NULL, 1, 'FLORIDA ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(75, 14, 13, NULL, 1, 'GUADALAJARA DE BUGA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(76, 14, 13, NULL, 1, 'PRADERA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(77, 14, 13, NULL, 1, 'TULUA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(78, 14, 13, NULL, 1, 'BUENAVENTURA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(79, 15, 14, NULL, 1, 'EL LITORAL DEL SAN JUAN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(80, 15, 14, NULL, 1, 'ISTMINA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(81, 15, 14, NULL, 1, 'NOVITA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(82, 15, 14, NULL, 1, 'SIPI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(83, 15, 14, NULL, 1, 'MEDIO SAN JUAN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(84, 15, 14, NULL, 1, 'SAN JOSE DEL PALMAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(85, 15, 14, NULL, 1, 'ALTO BAUDO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(86, 15, 14, NULL, 1, 'MEDIO BAUDO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(87, 15, 14, NULL, 1, 'BAJO BAUDO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(88, 15, 15, NULL, 1, 'CARMEN DEL DARIEN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(89, 15, 15, NULL, 1, 'RIOSUCIO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(90, 15, 15, NULL, 1, 'UNGUIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(91, 11, 15, NULL, 1, 'MUTAT?', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(92, 11, 16, NULL, 1, 'GRANADA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(93, 11, 16, NULL, 1, 'SAN CARLOS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(94, 11, 16, NULL, 1, 'SAN FRANCISCO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(95, 16, 17, NULL, 1, 'PUERTO LEGUIZAMO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(96, 16, 17, NULL, 1, 'PUERTO ASIS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(97, 16, 17, NULL, 1, 'SAN MIGUEL', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(98, 16, 17, NULL, 1, 'VALLE DEL GUAMUEZ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(99, 17, 18, NULL, 1, 'CARTAGENA DEL CHAIRA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(100, 17, 18, NULL, 1, 'SAN VICENTE DEL CAGUAN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE IF NOT EXISTS `participante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relacion` int(11) NOT NULL,
  `numero_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `edad_inscripcion` int(11) NOT NULL,
  `joven_rural` tinyint(1) DEFAULT NULL,
  `desplazado` tinyint(1) NOT NULL,
  `discapacidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sabe_leer` tinyint(1) NOT NULL,
  `sabe_escribir` tinyint(1) NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `pertenencia_etnica_id` int(11) DEFAULT NULL,
  `grupo_indigena_id` int(11) DEFAULT NULL,
  `estado_civil_id` int(11) DEFAULT NULL,
  `rol_grupo_familiar_id` int(11) DEFAULT NULL,
  `hijos_menores_5_id` int(11) DEFAULT NULL,
  `nivel_estudios_id` int(11) DEFAULT NULL,
  `ocupacion_id` int(11) DEFAULT NULL,
  `tipo_vivienda_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_85BDC5C34B64ABC7` (`beneficiario_id`),
  KEY `IDX_85BDC5C3F6939175` (`tipo_documento_id`),
  KEY `IDX_85BDC5C3BCE7B795` (`genero_id`),
  KEY `IDX_85BDC5C3DA995DEC` (`pertenencia_etnica_id`),
  KEY `IDX_85BDC5C37AAA0F5A` (`grupo_indigena_id`),
  KEY `IDX_85BDC5C375376D93` (`estado_civil_id`),
  KEY `IDX_85BDC5C3FFAE2092` (`rol_grupo_familiar_id`),
  KEY `IDX_85BDC5C36313548C` (`hijos_menores_5_id`),
  KEY `IDX_85BDC5C3378258DA` (`nivel_estudios_id`),
  KEY `IDX_85BDC5C3D8999C67` (`ocupacion_id`),
  KEY `IDX_85BDC5C3B4837970` (`tipo_vivienda_id`),
  KEY `IDX_85BDC5C3DADD026` (`usuario_modificacion_id`),
  KEY `IDX_85BDC5C3AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id`, `relacion`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `edad_inscripcion`, `joven_rural`, `desplazado`, `discapacidad`, `sabe_leer`, `sabe_escribir`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`, `beneficiario_id`, `tipo_documento_id`, `genero_id`, `pertenencia_etnica_id`, `grupo_indigena_id`, `estado_civil_id`, `rol_grupo_familiar_id`, `hijos_menores_5_id`, `nivel_estudios_id`, `ocupacion_id`, `tipo_vivienda_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, 0, 'sadasd', 'sadasd', 'sad', 'sadasd', 'sadasd', '2015-12-12 00:00:00', 12, NULL, 1, '1', 1, 1, 'sdasd', 'asdasd', 'asdasd@fdsfsdfsdf.sadasd', 1, NULL, '2015-12-09 21:57:32', NULL, 1, 6, 50, 46, 8, 12, 14, NULL, 34, 37, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poa`
--

CREATE TABLE IF NOT EXISTS `poa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `anio` int(11) NOT NULL,
  `presupuesto` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_736097E489A50577` (`anio`),
  KEY `IDX_736097E4DADD026` (`usuario_modificacion_id`),
  KEY `IDX_736097E4AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `poa`
--

INSERT INTO `poa` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `anio`, `presupuesto`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 2014, '300000000', 1, NULL, '2015-11-11 14:25:53'),
(3, NULL, NULL, 2015, '30000000', 1, NULL, '2015-11-11 23:27:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza`
--

CREATE TABLE IF NOT EXISTS `poliza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_781134589C833003` (`grupo_id`),
  KEY `IDX_78113458DADD026` (`usuario_modificacion_id`),
  KEY `IDX_78113458AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `poliza`
--

INSERT INTO `poliza` (`id`, `active`, `fecha_modificacion`, `fecha_creacion`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, 1, NULL, '2015-12-08 17:45:38', NULL, NULL, NULL),
(2, 1, NULL, '2015-12-08 17:47:36', NULL, NULL, NULL),
(3, 1, NULL, '2015-12-08 17:47:47', NULL, NULL, NULL),
(4, 1, NULL, '2015-12-09 22:22:49', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza_soporte`
--

CREATE TABLE IF NOT EXISTS `poliza_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consecutivo` int(11) NOT NULL,
  `cofinanciacion` decimal(10,0) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `poliza_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ADA8C8B9D5746945` (`poliza_id`),
  KEY `IDX_ADA8C8B9E24646FA` (`tipo_soporte_id`),
  KEY `IDX_ADA8C8B99F5A440B` (`estado_id`),
  KEY `IDX_ADA8C8B9DADD026` (`usuario_modificacion_id`),
  KEY `IDX_ADA8C8B9AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_capacitacion_financiera`
--

CREATE TABLE IF NOT EXISTS `programa_capacitacion_financiera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `talento_financiero_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_66386F135775952` (`talento_financiero_id`),
  KEY `IDX_66386F19F5A440B` (`estado_id`),
  KEY `IDX_66386F158BC1BE0` (`municipio_id`),
  KEY `IDX_66386F1DADD026` (`usuario_modificacion_id`),
  KEY `IDX_66386F1AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `programa_capacitacion_financiera`
--

INSERT INTO `programa_capacitacion_financiera` (`id`, `lugar`, `active`, `fecha_modificacion`, `fecha_creacion`, `talento_financiero_id`, `estado_id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, 'la casa de pohh', 1, NULL, '2015-12-09 20:26:44', 1, 170, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_beneficiario_ahorro`
--

CREATE TABLE IF NOT EXISTS `seguimiento_beneficiario_ahorro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_apertura` datetime NOT NULL,
  `saldo_apertura` decimal(10,0) NOT NULL,
  `incentivo_apertura` decimal(10,0) NOT NULL,
  `fecha_corte_1` datetime NOT NULL,
  `saldo_corte_1` decimal(10,0) NOT NULL,
  `incentivo_corte_1` decimal(10,0) NOT NULL,
  `fecha_corte_2` datetime NOT NULL,
  `saldo_corte_2` decimal(10,0) NOT NULL,
  `incentivo_corte_2` decimal(10,0) NOT NULL,
  `fecha_corte_final` datetime NOT NULL,
  `saldo_corte_final` decimal(10,0) NOT NULL,
  `incentivo_corte_final` decimal(10,0) NOT NULL,
  `numero_incumplimiento` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `asignacion_beneficiario_ahorro_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4D0FDEBD22507D80` (`asignacion_beneficiario_ahorro_id`),
  KEY `IDX_4D0FDEBDDADD026` (`usuario_modificacion_id`),
  KEY `IDX_4D0FDEBDAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talento`
--

CREATE TABLE IF NOT EXISTS `talento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `edad_inscripcion` int(11) NOT NULL,
  `joven_rural` tinyint(1) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rural` tinyint(1) DEFAULT NULL,
  `barrio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corregimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vereda` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cacerio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio_talento` datetime NOT NULL,
  `talento_madr` tinyint(1) NOT NULL,
  `talento_otros_lugares` tinyint(1) NOT NULL,
  `actividad_participado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_desempeno_principal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_desempeno_secundario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area_desempeno_terciario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `pertenencia_etnica_id` int(11) DEFAULT NULL,
  `grupo_indigena_id` int(11) DEFAULT NULL,
  `rol_grupo_familiar_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `estado_civil_id` int(11) DEFAULT NULL,
  `nivel_estudios_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C2CE4CD5A9276E6C` (`tipo_id`),
  KEY `IDX_C2CE4CD5F6939175` (`tipo_documento_id`),
  KEY `IDX_C2CE4CD5BCE7B795` (`genero_id`),
  KEY `IDX_C2CE4CD5DA995DEC` (`pertenencia_etnica_id`),
  KEY `IDX_C2CE4CD57AAA0F5A` (`grupo_indigena_id`),
  KEY `IDX_C2CE4CD5FFAE2092` (`rol_grupo_familiar_id`),
  KEY `IDX_C2CE4CD558BC1BE0` (`municipio_id`),
  KEY `IDX_C2CE4CD575376D93` (`estado_civil_id`),
  KEY `IDX_C2CE4CD5378258DA` (`nivel_estudios_id`),
  KEY `IDX_C2CE4CD5DADD026` (`usuario_modificacion_id`),
  KEY `IDX_C2CE4CD5AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `talento`
--

INSERT INTO `talento` (`id`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `edad_inscripcion`, `joven_rural`, `direccion`, `rural`, `barrio`, `corregimiento`, `vereda`, `cacerio`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `organizacion`, `fecha_inicio_talento`, `talento_madr`, `talento_otros_lugares`, `actividad_participado`, `area_desempeno_principal`, `area_desempeno_secundario`, `area_desempeno_terciario`, `active`, `fecha_modificacion`, `fecha_creacion`, `tipo_id`, `tipo_documento_id`, `genero_id`, `pertenencia_etnica_id`, `grupo_indigena_id`, `rol_grupo_familiar_id`, `municipio_id`, `estado_civil_id`, `nivel_estudios_id`, `usuario_modificacion_id`, `usuario_creacion_id`) VALUES
(1, 'dfas', 'dxfdsad', 'dfasd', 'asdfasd', 'dasfasdf', '2015-12-16 00:00:00', 0, 1, 'sdafasdf', 0, NULL, 'dsfdasf', 'sadfasdf', 'sdfadf', 'asdfasdf', 'sadfasdf', 'adsfadsfsdaf@asdjkldf.com', 'dasfadsfsdf', '2015-12-11 00:00:00', 1, 1, 'sadfadsf', 'sdfasdf', 'sadfsadf', 'sdafadsf', 1, NULL, '2015-12-07 21:40:09', 144, 1, 6, 64, 46, 12, 1, 8, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `salt`, `nombres`, `apellidos`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 'Admin', '111111', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

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
  PRIMARY KEY (`id`),
  KEY `IDX_A786041EDADD026` (`usuario_modificacion_id`),
  KEY `IDX_A786041EAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 1, 'Cauca Costa pacifica', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(2, NULL, 1, 'Cauca Andino', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(3, NULL, 1, 'Nariño Costa Pacifico', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(4, NULL, 1, 'Nariño Andino ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(5, NULL, 1, 'Arauca', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(6, NULL, 1, 'Catatumbo ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(7, NULL, 1, 'Sierra Nevada Santa Marta', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(8, NULL, 1, 'Region de la macarena ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(9, NULL, 1, 'Montes de Maria', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(10, NULL, 1, 'Nudo de Paramillo Antioquia', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(11, NULL, 1, 'Nudo de Paramillo Cordoba', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(12, NULL, 1, 'Sur del Tolima', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(13, NULL, 1, 'Valle del Cauca', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(14, NULL, 1, 'Sur de Choco', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(15, NULL, 1, 'Medio y bajo Atrato', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(16, NULL, 1, 'Oriente Antioque', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(17, NULL, 1, 'Putumayo', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(18, NULL, 1, 'Rio Caguan', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_concurso`
--
ALTER TABLE `actividad_concurso`
  ADD CONSTRAINT `FK_39B94E8CAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_39B94E8CDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_39B94E8CF415D168` FOREIGN KEY (`concurso_id`) REFERENCES `concurso` (`id`);

--
-- Filtros para la tabla `ahorro`
--
ALTER TABLE `ahorro`
  ADD CONSTRAINT `FK_2F1C7D069F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_2F1C7D069C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_ahorro`
--
ALTER TABLE `asignacion_beneficiario_ahorro`
  ADD CONSTRAINT `FK_31D70FA3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_31D70FA34B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_31D70FA3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_31D70FA3EC5CE259` FOREIGN KEY (`ahorro_id`) REFERENCES `ahorro` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_poliza`
--
ALTER TABLE `asignacion_beneficiario_poliza`
  ADD CONSTRAINT `FK_66DA46FDAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_66DA46FD4B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_66DA46FDD5746945` FOREIGN KEY (`poliza_id`) REFERENCES `poliza` (`id`),
  ADD CONSTRAINT `FK_66DA46FDDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_programa_capacitacion_financiera`
--
ALTER TABLE `asignacion_beneficiario_programa_capacitacion_financiera`
  ADD CONSTRAINT `FK_D8FF3741AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D8FF37414B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_D8FF37416B25D3FE` FOREIGN KEY (`programa_capacitacion_financiera_id`) REFERENCES `programa_capacitacion_financiera` (`id`),
  ADD CONSTRAINT `FK_D8FF3741DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D8FF3741F6F50196` FOREIGN KEY (`participante_id`) REFERENCES `participante` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_clear`
--
ALTER TABLE `asignacion_grupo_clear`
  ADD CONSTRAINT `FK_2858D49CAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_2858D49C9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_2858D49CDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_integrante_clear`
--
ALTER TABLE `asignacion_integrante_clear`
  ADD CONSTRAINT `FK_ECDABF1FAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_ECDABF1F4BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_ECDABF1F6EA6C980` FOREIGN KEY (`integrante_id`) REFERENCES `integrante_clear` (`id`),
  ADD CONSTRAINT `FK_ECDABF1FDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_usuario_beca`
--
ALTER TABLE `asignacion_usuario_beca`
  ADD CONSTRAINT `FK_FF79C6A3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FF79C6A31D749D82` FOREIGN KEY (`beca_id`) REFERENCES `beca` (`id`),
  ADD CONSTRAINT `FK_FF79C6A39F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_FF79C6A3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FF79C6A3DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_usuario_capacitacion`
--
ALTER TABLE `asignacion_usuario_capacitacion`
  ADD CONSTRAINT `FK_BDD02705AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_BDD027055B587DA` FOREIGN KEY (`capacitacion_id`) REFERENCES `capacitacion` (`id`),
  ADD CONSTRAINT `FK_BDD027059F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_BDD02705DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_BDD02705DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_usuario_evento`
--
ALTER TABLE `asignacion_usuario_evento`
  ADD CONSTRAINT `FK_34D86019AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_34D8601987A5F842` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`),
  ADD CONSTRAINT `FK_34D86019DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_34D86019DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `beca`
--
ALTER TABLE `beca`
  ADD CONSTRAINT `FK_8A1280F51E092B9F` FOREIGN KEY (`modalidad_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8A1280F558BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_8A1280F5A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8A1280F5AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_8A1280F5DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `FK_E8D0B617378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B6176313548C` FOREIGN KEY (`hijos_menores_5_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B61775376D93` FOREIGN KEY (`estado_civil_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B6177AAA0F5A` FOREIGN KEY (`grupo_indigena_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B617906677C2` FOREIGN KEY (`tipo_documento_conyugue_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B61797F167E4` FOREIGN KEY (`miembros_nucleo_familiar_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B6179C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_E8D0B617AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E8D0B617B4837970` FOREIGN KEY (`tipo_vivienda_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B617BCE7B795` FOREIGN KEY (`genero_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B617D8999C67` FOREIGN KEY (`ocupacion_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B617DA995DEC` FOREIGN KEY (`pertenencia_etnica_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B617DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E8D0B617F6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B617FFAE2092` FOREIGN KEY (`rol_grupo_familiar_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `calificacion_experiencia_exitosa`
--
ALTER TABLE `calificacion_experiencia_exitosa`
  ADD CONSTRAINT `FK_46C93B57AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_46C93B57D327D072` FOREIGN KEY (`experiencia_exitosa_id`) REFERENCES `experiencia_exitosa` (`id`),
  ADD CONSTRAINT `FK_46C93B57DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD CONSTRAINT `FK_5A430D211E092B9F` FOREIGN KEY (`modalidad_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_5A430D2158BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_5A430D21A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_5A430D21AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_5A430D21DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `capacitacion_financiera`
--
ALTER TABLE `capacitacion_financiera`
  ADD CONSTRAINT `FK_16AFBD3AAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_16AFBD3A6B25D3FE` FOREIGN KEY (`programa_capacitacion_financiera_id`) REFERENCES `programa_capacitacion_financiera` (`id`),
  ADD CONSTRAINT `FK_16AFBD3A9F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_16AFBD3ADADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `clear`
--
ALTER TABLE `clear`
  ADD CONSTRAINT `FK_E5B1F10658BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_E5B1F106AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E5B1F106DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `concurso`
--
ALTER TABLE `concurso`
  ADD CONSTRAINT `FK_785F9DE61E092B9F` FOREIGN KEY (`modalidad_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_785F9DE6A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_785F9DE6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_785F9DE6DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD CONSTRAINT `FK_6D773021AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_6D773021BB18C0BA` FOREIGN KEY (`poa_id`) REFERENCES `poa` (`id`),
  ADD CONSTRAINT `FK_6D773021DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `FK_40E497EBAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_40E497EBDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_47860B0558BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_47860B05A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_47860B05AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_47860B05DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `experiencia_exitosa`
--
ALTER TABLE `experiencia_exitosa`
  ADD CONSTRAINT `FK_380325B19C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_380325B1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_380325B1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `FK_8C0E9BD33771B82E` FOREIGN KEY (`entidad_financiera_cuenta_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD34EE93BE6` FOREIGN KEY (`convocatoria_id`) REFERENCES `convocatoria` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD358BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD378814E56` FOREIGN KEY (`tipo_cuenta_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD3A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD3BE494C72` FOREIGN KEY (`figura_legal_constitucion_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `grupo_soporte`
--
ALTER TABLE `grupo_soporte`
  ADD CONSTRAINT `FK_5D2EB4619C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_5D2EB461AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_5D2EB461DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_5D2EB461E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `integrante_clear`
--
ALTER TABLE `integrante_clear`
  ADD CONSTRAINT `FK_380CDB55378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_380CDB5558BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_380CDB55AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_380CDB55BCE7B795` FOREIGN KEY (`genero_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_380CDB55DA995DEC` FOREIGN KEY (`pertenencia_etnica_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_380CDB55DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_380CDB55F6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`);

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
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `FK_85BDC5C3378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C34B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_85BDC5C36313548C` FOREIGN KEY (`hijos_menores_5_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C375376D93` FOREIGN KEY (`estado_civil_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C37AAA0F5A` FOREIGN KEY (`grupo_indigena_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_85BDC5C3B4837970` FOREIGN KEY (`tipo_vivienda_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C3BCE7B795` FOREIGN KEY (`genero_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C3D8999C67` FOREIGN KEY (`ocupacion_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C3DA995DEC` FOREIGN KEY (`pertenencia_etnica_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_85BDC5C3F6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C3FFAE2092` FOREIGN KEY (`rol_grupo_familiar_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `poa`
--
ALTER TABLE `poa`
  ADD CONSTRAINT `FK_736097E4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_736097E4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `poliza`
--
ALTER TABLE `poliza`
  ADD CONSTRAINT `FK_78113458AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_781134589C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_78113458DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `poliza_soporte`
--
ALTER TABLE `poliza_soporte`
  ADD CONSTRAINT `FK_ADA8C8B9AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_ADA8C8B99F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_ADA8C8B9D5746945` FOREIGN KEY (`poliza_id`) REFERENCES `poliza` (`id`),
  ADD CONSTRAINT `FK_ADA8C8B9DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_ADA8C8B9E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `programa_capacitacion_financiera`
--
ALTER TABLE `programa_capacitacion_financiera`
  ADD CONSTRAINT `FK_66386F1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_66386F135775952` FOREIGN KEY (`talento_financiero_id`) REFERENCES `talento` (`id`),
  ADD CONSTRAINT `FK_66386F158BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_66386F19F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_66386F1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `seguimiento_beneficiario_ahorro`
--
ALTER TABLE `seguimiento_beneficiario_ahorro`
  ADD CONSTRAINT `FK_4D0FDEBDAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_4D0FDEBD22507D80` FOREIGN KEY (`asignacion_beneficiario_ahorro_id`) REFERENCES `asignacion_beneficiario_ahorro` (`id`),
  ADD CONSTRAINT `FK_4D0FDEBDDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `talento`
--
ALTER TABLE `talento`
  ADD CONSTRAINT `FK_C2CE4CD5378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD558BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD575376D93` FOREIGN KEY (`estado_civil_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD57AAA0F5A` FOREIGN KEY (`grupo_indigena_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD5A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD5AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD5BCE7B795` FOREIGN KEY (`genero_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD5DA995DEC` FOREIGN KEY (`pertenencia_etnica_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD5DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD5F6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD5FFAE2092` FOREIGN KEY (`rol_grupo_familiar_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `FK_A786041EAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A786041EDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
