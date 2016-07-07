-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2016 a las 16:07:14
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
  `concurso_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `actividad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mejoras` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recursos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duracion` int(11) NOT NULL,
  `semana_inicio` int(11) NOT NULL,
  `semana_finalizacion` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_39B94E8CF415D168` (`concurso_id`),
  KEY `IDX_39B94E8CDADD026` (`usuario_modificacion_id`),
  KEY `IDX_39B94E8CAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `actividad_concurso`
--

INSERT INTO `actividad_concurso` (`id`, `concurso_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `actividad`, `mejoras`, `recursos`, `duracion`, `semana_inicio`, `semana_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, NULL, 'Carreras de marranos', 'Hcerlos mas rapidos', '5000000', 3, 3, 3, 1, NULL, '2016-06-14 18:01:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_soporte`
--

CREATE TABLE IF NOT EXISTS `actividad_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actividad_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E08E306D6014FACA` (`actividad_id`),
  KEY `IDX_E08E306DE24646FA` (`tipo_soporte_id`),
  KEY `IDX_E08E306DDADD026` (`usuario_modificacion_id`),
  KEY `IDX_E08E306DAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE IF NOT EXISTS `activos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seguimiento_fase_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `rubro` int(11) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad_medida` int(11) NOT NULL,
  `cantidad_inicial` decimal(10,0) NOT NULL,
  `valor_inicial` decimal(10,0) NOT NULL,
  `cantidad_final` decimal(10,0) NOT NULL,
  `valor_final` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FA45851308D77B2` (`seguimiento_fase_id`),
  KEY `IDX_FA45851DADD026` (`usuario_modificacion_id`),
  KEY `IDX_FA45851AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ahorro`
--

CREATE TABLE IF NOT EXISTS `ahorro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `incentivo_ahorro_colectivo` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2F1C7D069C833003` (`grupo_id`),
  KEY `IDX_2F1C7D069F5A440B` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ahorro_soporte`
--

CREATE TABLE IF NOT EXISTS `ahorro_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ahorro_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A3A19E2EC5CE259` (`ahorro_id`),
  KEY `IDX_A3A19E2E24646FA` (`tipo_soporte_id`),
  KEY `IDX_A3A19E2DADD026` (`usuario_modificacion_id`),
  KEY `IDX_A3A19E2AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_ahorro`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_ahorro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ahorro_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `beneficiario_ahorro_otro_programa` tinyint(1) NOT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_ahorro_activacion` decimal(10,0) NOT NULL,
  `meta_ahorro_mensual` decimal(10,0) NOT NULL,
  `plan_ahorro_individual` decimal(10,0) NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_31D70FA3EC5CE259` (`ahorro_id`),
  KEY `IDX_31D70FA34B64ABC7` (`beneficiario_id`),
  KEY `IDX_31D70FA3DADD026` (`usuario_modificacion_id`),
  KEY `IDX_31D70FA3AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_comite_compras`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_comite_compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_66EBC8D19C833003` (`grupo_id`),
  KEY `IDX_66EBC8D14B64ABC7` (`beneficiario_id`),
  KEY `IDX_66EBC8D1DADD026` (`usuario_modificacion_id`),
  KEY `IDX_66EBC8D1AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `asignacion_beneficiario_comite_compras`
--

INSERT INTO `asignacion_beneficiario_comite_compras` (`id`, `grupo_id`, `beneficiario_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `habilitacion`, `asignacion`, `contraloria_social`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 4, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-05-24 23:11:41'),
(2, 3, 6, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:59:33'),
(3, 3, 8, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:59:39'),
(4, 3, 7, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:59:43'),
(5, 3, 11, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:59:47'),
(6, 4, 20, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 18:32:57'),
(7, 4, 21, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 18:33:00'),
(8, 4, 24, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 18:33:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_comite_vamos_bien`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_comite_vamos_bien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_174C5B769C833003` (`grupo_id`),
  KEY `IDX_174C5B764B64ABC7` (`beneficiario_id`),
  KEY `IDX_174C5B76DADD026` (`usuario_modificacion_id`),
  KEY `IDX_174C5B76AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `asignacion_beneficiario_comite_vamos_bien`
--

INSERT INTO `asignacion_beneficiario_comite_vamos_bien` (`id`, `grupo_id`, `beneficiario_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `habilitacion`, `asignacion`, `contraloria_social`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 3, 5, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:58:27'),
(2, 3, 7, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:58:31'),
(3, 3, 8, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:58:35'),
(4, 3, 11, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:58:39'),
(5, 3, 13, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:58:43'),
(6, 3, 9, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:58:46'),
(7, 3, 12, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:58:50'),
(8, 4, 20, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 18:11:30'),
(11, 4, 22, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 18:12:16'),
(13, 4, 24, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 18:14:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_estructura_organizacional`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_estructura_organizacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DF11E8089C833003` (`grupo_id`),
  KEY `IDX_DF11E8084B64ABC7` (`beneficiario_id`),
  KEY `IDX_DF11E8084BAB96C` (`rol_id`),
  KEY `IDX_DF11E808DADD026` (`usuario_modificacion_id`),
  KEY `IDX_DF11E808AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `asignacion_beneficiario_estructura_organizacional`
--

INSERT INTO `asignacion_beneficiario_estructura_organizacional` (`id`, `grupo_id`, `beneficiario_id`, `rol_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `habilitacion`, `asignacion`, `contraloria_social`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 3, 227, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2016-05-24 22:45:49'),
(2, 3, 5, 227, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2016-06-07 16:59:10'),
(3, 3, 6, 228, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2016-06-07 16:59:16'),
(4, 3, 8, 230, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2016-06-07 16:59:22'),
(5, 4, 20, 230, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2016-06-28 18:16:18'),
(6, 4, 22, 227, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2016-06-28 18:16:23'),
(7, 4, 23, 232, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2016-06-28 18:16:30'),
(8, 4, 25, 233, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2016-06-28 18:16:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_poliza`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_poliza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poliza_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `beneficiario_poliza_otro_programa` tinyint(1) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
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
  `programa_capacitacion_financiera_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `participante_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `valoracion_inicial` int(11) NOT NULL,
  `valoracion_final` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8FF37416B25D3FE` (`programa_capacitacion_financiera_id`),
  KEY `IDX_D8FF37414B64ABC7` (`beneficiario_id`),
  KEY `IDX_D8FF3741F6F50196` (`participante_id`),
  KEY `IDX_D8FF3741DADD026` (`usuario_modificacion_id`),
  KEY `IDX_D8FF3741AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_taller`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_taller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taller_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D5437216DC343EA` (`taller_id`),
  KEY `IDX_D5437219C833003` (`grupo_id`),
  KEY `IDX_D5437214B64ABC7` (`beneficiario_id`),
  KEY `IDX_D543721DADD026` (`usuario_modificacion_id`),
  KEY `IDX_D543721AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `asignacion_beneficiario_taller`
--

INSERT INTO `asignacion_beneficiario_taller` (`id`, `taller_id`, `grupo_id`, `beneficiario_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 4, 22, NULL, NULL, 1, NULL, '2016-06-28 21:41:16'),
(2, 1, 4, 23, NULL, NULL, 1, NULL, '2016-06-28 21:41:19'),
(3, 1, 4, 25, NULL, NULL, 1, NULL, '2016-06-28 21:41:23'),
(4, 1, 4, 27, NULL, NULL, 1, NULL, '2016-06-28 21:41:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_visita`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_visita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visita` int(11) NOT NULL,
  `beneficiario` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_visitas`
--

CREATE TABLE IF NOT EXISTS `asignacion_beneficiario_visitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `nodo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_85C360929C833003` (`grupo_id`),
  KEY `IDX_85C360924B64ABC7` (`beneficiario_id`),
  KEY `IDX_85C3609229B07FB3` (`nodo_id`),
  KEY `IDX_85C36092DADD026` (`usuario_modificacion_id`),
  KEY `IDX_85C36092AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_contador_grupo`
--

CREATE TABLE IF NOT EXISTS `asignacion_contador_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `contador_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F432D0339C833003` (`grupo_id`),
  KEY `IDX_F432D033C31645C0` (`contador_id`),
  KEY `IDX_F432D033DADD026` (`usuario_modificacion_id`),
  KEY `IDX_F432D033AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `asignacion_contador_grupo`
--

INSERT INTO `asignacion_contador_grupo` (`id`, `grupo_id`, `contador_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `habilitacion`, `asignacion`, `contraloria_social`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 2, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-05-24 21:33:55'),
(2, 3, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-07 16:59:59'),
(4, 4, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 16:48:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_beneficiario_pasantia`
--

CREATE TABLE IF NOT EXISTS `asignacion_grupo_beneficiario_pasantia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasantia_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_62E864EEBB6D3273` (`pasantia_id`),
  KEY `IDX_62E864EE4B64ABC7` (`beneficiario_id`),
  KEY `IDX_62E864EEDADD026` (`usuario_modificacion_id`),
  KEY `IDX_62E864EEAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_beneficiario_ruta`
--

CREATE TABLE IF NOT EXISTS `asignacion_grupo_beneficiario_ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9C201DDBABBC4845` (`ruta_id`),
  KEY `IDX_9C201DDB4B64ABC7` (`beneficiario_id`),
  KEY `IDX_9C201DDBDADD026` (`usuario_modificacion_id`),
  KEY `IDX_9C201DDBAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_clear`
--

CREATE TABLE IF NOT EXISTS `asignacion_grupo_clear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `clear_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2858D49C9C833003` (`grupo_id`),
  KEY `IDX_2858D49CD30DEA81` (`clear_id`),
  KEY `IDX_2858D49CDADD026` (`usuario_modificacion_id`),
  KEY `IDX_2858D49CAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `asignacion_grupo_clear`
--

INSERT INTO `asignacion_grupo_clear` (`id`, `grupo_id`, `clear_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `habilitacion`, `asignacion`, `contraloria_social`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(8, 3, 3, NULL, NULL, 1, NULL, NULL, 1, NULL, '2016-06-08 17:00:21'),
(9, 3, 4, NULL, NULL, NULL, 1, NULL, 1, NULL, '2016-06-28 19:01:50'),
(10, 4, 7, NULL, NULL, 1, NULL, NULL, 1, NULL, '2016-06-28 19:30:53'),
(11, 4, 8, NULL, NULL, NULL, 1, NULL, 1, NULL, '2016-06-28 21:22:59'),
(12, 4, 9, NULL, NULL, NULL, NULL, 1, 1, NULL, '2016-06-28 21:49:50'),
(13, 4, 10, NULL, NULL, NULL, 1, NULL, 1, NULL, '2016-06-28 22:02:12'),
(14, 4, 11, NULL, NULL, NULL, NULL, 1, 1, NULL, '2016-06-28 22:22:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_comite`
--

CREATE TABLE IF NOT EXISTS `asignacion_grupo_comite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `comite_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CC1659E09C833003` (`grupo_id`),
  KEY `IDX_CC1659E0D61C3573` (`comite_id`),
  KEY `IDX_CC1659E0DADD026` (`usuario_modificacion_id`),
  KEY `IDX_CC1659E0AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_concurso`
--

CREATE TABLE IF NOT EXISTS `asignacion_grupo_concurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `concurso_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B9FE2A369C833003` (`grupo_id`),
  KEY `IDX_B9FE2A36F415D168` (`concurso_id`),
  KEY `IDX_B9FE2A36DADD026` (`usuario_modificacion_id`),
  KEY `IDX_B9FE2A36AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `asignacion_grupo_concurso`
--

INSERT INTO `asignacion_grupo_concurso` (`id`, `grupo_id`, `concurso_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `habilitacion`, `asignacion`, `contraloria_social`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-14 18:41:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_pasantia`
--

CREATE TABLE IF NOT EXISTS `asignacion_grupo_pasantia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `pasantia_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A7D5E769C833003` (`grupo_id`),
  KEY `IDX_A7D5E76BB6D3273` (`pasantia_id`),
  KEY `IDX_A7D5E76DADD026` (`usuario_modificacion_id`),
  KEY `IDX_A7D5E76AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_ruta`
--

CREATE TABLE IF NOT EXISTS `asignacion_grupo_ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FD8DF9799C833003` (`grupo_id`),
  KEY `IDX_FD8DF979ABBC4845` (`ruta_id`),
  KEY `IDX_FD8DF979DADD026` (`usuario_modificacion_id`),
  KEY `IDX_FD8DF979AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_integrante_clear`
--

CREATE TABLE IF NOT EXISTS `asignacion_integrante_clear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clear_id` int(11) DEFAULT NULL,
  `integrante_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ECDABF1FD30DEA81` (`clear_id`),
  KEY `IDX_ECDABF1F6EA6C980` (`integrante_id`),
  KEY `IDX_ECDABF1F4BAB96C` (`rol_id`),
  KEY `IDX_ECDABF1FDADD026` (`usuario_modificacion_id`),
  KEY `IDX_ECDABF1FAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `asignacion_integrante_clear`
--

INSERT INTO `asignacion_integrante_clear` (`id`, `clear_id`, `integrante_id`, `rol_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(2, 7, 1, 227, NULL, NULL, 0, NULL, '2016-06-28 19:28:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_integrante_comite`
--

CREATE TABLE IF NOT EXISTS `asignacion_integrante_comite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comite_id` int(11) DEFAULT NULL,
  `integrante_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B8630911D61C3573` (`comite_id`),
  KEY `IDX_B86309116EA6C980` (`integrante_id`),
  KEY `IDX_B86309114BAB96C` (`rol_id`),
  KEY `IDX_B8630911DADD026` (`usuario_modificacion_id`),
  KEY `IDX_B8630911AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_integrante_concurso`
--

CREATE TABLE IF NOT EXISTS `asignacion_integrante_concurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concurso_id` int(11) DEFAULT NULL,
  `integrante_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DF32DF4BF415D168` (`concurso_id`),
  KEY `IDX_DF32DF4B6EA6C980` (`integrante_id`),
  KEY `IDX_DF32DF4B4BAB96C` (`rol_id`),
  KEY `IDX_DF32DF4BDADD026` (`usuario_modificacion_id`),
  KEY `IDX_DF32DF4BAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_organizacion_pasantia`
--

CREATE TABLE IF NOT EXISTS `asignacion_organizacion_pasantia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organizacion_id` int(11) DEFAULT NULL,
  `pasantia_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_27E7E2A390B1019E` (`organizacion_id`),
  KEY `IDX_27E7E2A3BB6D3273` (`pasantia_id`),
  KEY `IDX_27E7E2A3DADD026` (`usuario_modificacion_id`),
  KEY `IDX_27E7E2A3AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_organizacion_ruta`
--

CREATE TABLE IF NOT EXISTS `asignacion_organizacion_ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organizacion_id` int(11) DEFAULT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A4DB9F4390B1019E` (`organizacion_id`),
  KEY `IDX_A4DB9F43ABBC4845` (`ruta_id`),
  KEY `IDX_A4DB9F43DADD026` (`usuario_modificacion_id`),
  KEY `IDX_A4DB9F43AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_organizacion_territorio_aprendizaje`
--

CREATE TABLE IF NOT EXISTS `asignacion_organizacion_territorio_aprendizaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organizacion_id` int(11) DEFAULT NULL,
  `territorio_aprendizaje_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9510DDB190B1019E` (`organizacion_id`),
  KEY `IDX_9510DDB11281CB4C` (`territorio_aprendizaje_id`),
  KEY `IDX_9510DDB1DADD026` (`usuario_modificacion_id`),
  KEY `IDX_9510DDB1AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_talento_seguimiento_fase`
--

CREATE TABLE IF NOT EXISTS `asignacion_talento_seguimiento_fase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seguimiento_fase_id` int(11) DEFAULT NULL,
  `seguimiento_mot_id` int(11) DEFAULT NULL,
  `talento_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D15A7A4F308D77B2` (`seguimiento_fase_id`),
  KEY `IDX_D15A7A4FA193D038` (`seguimiento_mot_id`),
  KEY `IDX_D15A7A4FCD13DD97` (`talento_id`),
  KEY `IDX_D15A7A4FDADD026` (`usuario_modificacion_id`),
  KEY `IDX_D15A7A4FAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_usuario_beca`
--

CREATE TABLE IF NOT EXISTS `asignacion_usuario_beca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beca_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
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
  `capacitacion_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
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
  `evento_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
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
  `tipo_id` int(11) DEFAULT NULL,
  `modalidad_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `entidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8A1280F5A9276E6C` (`tipo_id`),
  KEY `IDX_8A1280F51E092B9F` (`modalidad_id`),
  KEY `IDX_8A1280F558BC1BE0` (`municipio_id`),
  KEY `IDX_8A1280F5DADD026` (`usuario_modificacion_id`),
  KEY `IDX_8A1280F5AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beca_soporte`
--

CREATE TABLE IF NOT EXISTS `beca_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beca_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FCBA20C41D749D82` (`beca_id`),
  KEY `IDX_FCBA20C4E24646FA` (`tipo_soporte_id`),
  KEY `IDX_FCBA20C4DADD026` (`usuario_modificacion_id`),
  KEY `IDX_FCBA20C4AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `discapacidad_id` int(11) DEFAULT NULL,
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
  `red_unidos` tinyint(1) NOT NULL,
  `sabe_leer` tinyint(1) DEFAULT NULL,
  `sabe_escribir` tinyint(1) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rural` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corregimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vereda` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cacerio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  KEY `IDX_E8D0B6179C833003` (`grupo_id`),
  KEY `IDX_E8D0B617F6939175` (`tipo_documento_id`),
  KEY `IDX_E8D0B617BCE7B795` (`genero_id`),
  KEY `IDX_E8D0B617DA995DEC` (`pertenencia_etnica_id`),
  KEY `IDX_E8D0B6177AAA0F5A` (`grupo_indigena_id`),
  KEY `IDX_E8D0B61713DA6592` (`discapacidad_id`),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `beneficiario`
--

INSERT INTO `beneficiario` (`id`, `grupo_id`, `tipo_documento_id`, `genero_id`, `pertenencia_etnica_id`, `grupo_indigena_id`, `discapacidad_id`, `estado_civil_id`, `rol_grupo_familiar_id`, `hijos_menores_5_id`, `miembros_nucleo_familiar_id`, `nivel_estudios_id`, `ocupacion_id`, `tipo_vivienda_id`, `tipo_documento_conyugue_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `edad_inscripcion`, `joven_rural`, `corte_sisben`, `puntaje_sisben`, `desplazado`, `red_unidos`, `sabe_leer`, `sabe_escribir`, `direccion`, `rural`, `descripcion`, `corregimiento`, `vereda`, `cacerio`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `numero_documento_conyugue`, `primer_apellido_conyugue`, `segundo_apellido_conyugue`, `primer_nombre_conyugue`, `segundo_nombre_conyugue`, `telefono_fijo_conyugue`, `telefono_celular_conyugue`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(2, 2, 1, 6, 46, NULL, 215, 8, 221, 219, 220, 28, 34, 37, NULL, NULL, NULL, '1022376577', 'Cantor', 'Forero', 'Juan', 'Sebastian', '2016-05-12 00:00:00', 23, NULL, '3', '61', 0, 1, 0, 0, 'vereda la casita', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-05-20 19:23:37'),
(3, 1, 1, 6, 49, NULL, 213, 8, 221, 219, 220, 28, 34, 37, NULL, NULL, NULL, '123456789', 'Morales', NULL, 'Juan', 'Alberto', '2016-05-19 00:00:00', 23, NULL, '3', '12', 1, 1, 1, 1, 'vereda la casita', 0, 'Al lado del palo de Mango', NULL, NULL, NULL, '1234578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-05-24 21:42:00'),
(4, 1, 1, 6, 46, NULL, 213, 8, 221, 219, 220, 28, 34, 37, NULL, NULL, NULL, '13457894651', 'Perez', NULL, 'Diana', 'Maria', '2016-05-18 00:00:00', 21, NULL, NULL, NULL, 0, 0, 0, 0, 'vereda la casona', 0, 'Al Lado del Manzano', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-05-24 21:44:11'),
(5, 3, 1, 6, 47, NULL, 213, 8, 221, 219, 220, 28, 34, 37, NULL, NULL, NULL, '1022376577', 'Ruiz', NULL, 'Alonso', NULL, '2016-06-10 00:00:00', 23, NULL, '3', '14', 0, 0, 0, 0, 'vereda la casita', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:19:26'),
(6, 3, 1, 6, 48, NULL, 213, 8, 221, 219, 220, 28, 34, 37, NULL, NULL, NULL, '13457894651', 'Perez', NULL, 'Luis', NULL, '2016-06-18 00:00:00', 32, NULL, '3', '52', 0, 0, 0, 0, 'vereda la casona', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:20:15'),
(7, 3, 1, 7, 46, NULL, 213, 8, 225, 219, 220, 28, 34, 37, NULL, NULL, NULL, '321465789', 'Casas', NULL, 'Armando', NULL, '2016-06-17 00:00:00', 32, NULL, '4', '65', 0, 0, 0, 0, 'vereda la casona', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:22:44'),
(8, 3, 1, 6, 48, NULL, 214, 8, 223, 219, 220, 28, 34, 37, NULL, NULL, NULL, '45678945645', 'Almada', NULL, 'Pedro', NULL, '2016-06-17 00:00:00', 65, NULL, '4', '54', 0, 0, 0, 0, 'vereda la casona', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:25:43'),
(9, 3, 1, 6, 47, NULL, 213, 8, 223, 219, 220, 32, 34, 37, NULL, NULL, NULL, '4578945612', 'Alboran', NULL, 'Juan', NULL, '2016-06-10 00:00:00', 78, NULL, '4', '65', 1, 1, 1, 1, 'vereda la casona', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:30:11'),
(10, 3, 1, 6, 47, NULL, 213, 8, 224, 219, 220, 31, 34, 38, NULL, NULL, NULL, '9645741654', 'Aponte', NULL, 'Julian', NULL, '2016-06-15 00:00:00', 45, NULL, '4', '65', 1, 1, 0, 1, 'vereda la casona', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:31:11'),
(11, 3, 1, 6, 45, 57, 213, 8, 222, 219, 220, 33, 35, 37, NULL, NULL, NULL, '6457134567', 'bora', NULL, 'Sofia', NULL, '2016-06-17 00:00:00', 23, NULL, '5', '12', 1, 1, 0, 0, 'vereda la casona', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:32:08'),
(12, 3, 1, 6, 47, NULL, 213, 8, 222, 17, 26, 31, 36, 38, NULL, NULL, NULL, '45678945641', 'Pacheco', NULL, 'Ludys', NULL, '2016-06-17 00:00:00', 23, NULL, '1', '23', 0, 0, 0, 0, 'vereda la casita', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:33:15'),
(13, 3, 1, 6, 46, NULL, 215, 8, 223, 16, 24, 28, 36, 39, NULL, NULL, NULL, '6457894512', 'Olmer', NULL, 'Vviiiana', NULL, '2016-06-16 00:00:00', 69, NULL, '1', '35', 1, 1, 0, 0, 'vereda la casita', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:34:03'),
(14, 3, 1, 6, 46, NULL, 213, 8, 221, 219, 23, 30, 36, 39, NULL, NULL, NULL, '7845612456', 'Arellano', NULL, 'Itzzele', NULL, '2016-06-11 00:00:00', 35, NULL, '3', '45', 1, 0, 1, 1, 'vereda la casona', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:38:58'),
(15, 3, 1, 6, 46, NULL, 213, 8, 224, 219, 220, 28, 34, 37, NULL, NULL, NULL, '4578945612434', 'Malo', NULL, 'Julian', NULL, '2016-06-08 00:00:00', 32, NULL, '1', '65', 0, 0, 1, 0, 'vereda la casita', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:43:43'),
(16, 3, 1, 6, 46, NULL, 213, 8, 221, 219, 220, 28, 34, 37, NULL, NULL, NULL, '452342341233', 'Garnica', NULL, 'Fernanda', NULL, '2016-06-22 00:00:00', 12, NULL, '3', '56', 1, 1, 1, 1, 'vereda la casita', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:46:02'),
(17, 3, 1, 6, 49, NULL, 213, 8, 221, 219, 220, 32, 34, 37, NULL, NULL, NULL, '364578945123', 'Gonzalez', NULL, 'Mauricio', NULL, '2016-06-25 00:00:00', 13, NULL, '3', '1232', 0, 0, 0, 0, 'casa 3', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:47:08'),
(18, 3, 1, 6, 47, NULL, 213, 8, 224, 219, 220, 28, 34, 37, NULL, NULL, NULL, '45651234654', 'Manosalva', NULL, 'reikon', NULL, '2016-06-18 00:00:00', 46, NULL, '3', '41', 0, 0, 0, 0, 'asdasd', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:50:04'),
(19, 3, 1, 6, 47, NULL, 216, 8, 225, 219, 220, 30, 35, 39, NULL, NULL, NULL, '124789456455', 'Rocha', NULL, 'POh', NULL, '2016-06-26 00:00:00', 221, NULL, '1', '231', 0, 0, 0, 0, 'casa 3', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-01 16:51:12'),
(20, 4, 1, 7, 46, NULL, 214, 8, 221, 16, 220, 32, 35, 39, NULL, NULL, NULL, '1022376577', 'Cantor EDITADO', 'Forero', 'Juan', 'Sebastian', '2016-06-22 00:00:00', 23, NULL, '3', '14', 1, 1, 1, 1, 'vereda la casona', 1, 'Al Lado del Manzano', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-06-28 17:42:54', '2016-06-28 16:58:25'),
(21, 4, 1, 6, 45, NULL, 215, 8, 221, 17, 25, 31, 35, 39, NULL, NULL, NULL, '1247894561', 'Bastidas eDITADO', NULL, 'Daniel', NULL, '2016-06-18 00:00:00', 45, NULL, '4', '65', 1, 1, 1, 1, 'casa 3', 1, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-06-28 17:43:26', '2016-06-28 17:03:51'),
(22, 4, 1, 6, 49, NULL, 215, 8, 224, 16, 24, 28, 36, 39, NULL, NULL, NULL, '4578945', 'Fernandez', NULL, 'Jhnonny', NULL, '2016-06-11 00:00:00', 45, NULL, '3', '41', 0, 1, 0, 0, 'vereda la casita', 1, 'Al lado del palo de Mango', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:04:58'),
(23, 4, 1, 6, 45, 56, 216, 8, 225, 17, 24, 28, 34, 37, NULL, NULL, NULL, '45678945641', 'Paramo', NULL, 'Pedro', NULL, '2016-06-16 00:00:00', 36, NULL, '4', '63', 1, 1, 0, 0, 'casa 4', 1, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:06:31'),
(24, 4, 1, 6, 47, NULL, 217, 8, 223, 17, 22, 31, 34, 37, NULL, NULL, NULL, '7894641246', 'marrugo', NULL, 'Gabriel', NULL, '2016-06-08 00:00:00', 43, NULL, '3', '13', 0, 1, 0, 0, 'vereda la casita', 0, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:08:09'),
(25, 4, 1, 6, 47, NULL, 215, 8, 223, 18, 24, 31, 35, 39, NULL, NULL, NULL, '3214578945', 'Alvis', NULL, 'Andres', NULL, '2016-06-17 00:00:00', 53, NULL, '6', '32', 0, 1, 1, 1, 'vereda la casita', 0, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:09:00'),
(26, 4, 4, 7, 46, NULL, 216, 8, 222, 16, 25, 32, 35, 39, NULL, NULL, NULL, '777445452', 'Garnica', NULL, 'Fernanda', NULL, '2016-06-16 00:00:00', 45, NULL, '3', '12', 1, 0, 1, 1, 'vereda la casona', 0, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:09:50'),
(27, 4, 1, 7, 47, NULL, 215, 8, 222, 18, 23, 28, 35, 39, NULL, NULL, NULL, '1234579542', 'Perez', NULL, 'Maria', NULL, '2016-06-16 00:00:00', 32, NULL, '4', '32', 0, 1, 1, 1, 'vereda la casita', 0, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:10:36'),
(28, 4, 1, 6, 46, NULL, 217, 8, 222, 17, 24, 32, 35, 39, NULL, NULL, NULL, '9645123456', 'Aldemar', NULL, 'Sofia', NULL, '2016-06-10 00:00:00', 32, NULL, '4', '32', 1, 1, 0, 0, 'vereda la casita', 0, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:18:13'),
(30, 4, 1, 7, 48, NULL, 215, 8, 13, 15, 22, 28, 34, 37, NULL, NULL, NULL, '2314657842', 'Artunduaga', NULL, 'Nasly', NULL, '2016-06-10 00:00:00', 32, NULL, '1', '32', 0, 0, 0, 0, 'vereda la casita', 0, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:26:32'),
(31, 4, 2, 6, 46, NULL, 214, 8, 223, 16, 23, 31, 34, 39, NULL, NULL, NULL, '1245789456', 'Rocha', NULL, 'Alonso', NULL, '2016-06-08 00:00:00', 65, NULL, '3', '42', 0, 1, 1, 1, 'vereda la casita', 1, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:30:38'),
(32, 4, 1, 6, 46, NULL, 214, 8, 224, 16, 23, 30, 35, 218, NULL, NULL, NULL, '4561278456', 'Almada', NULL, 'Andres', NULL, '2016-06-08 00:00:00', 32, NULL, '3', '21', 0, 0, 1, 0, 'vereda la casita', 1, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:31:23'),
(33, 4, 1, 6, 46, NULL, 216, 8, 224, 17, 24, 28, 35, 39, NULL, NULL, NULL, '3214578465', 'Casas', NULL, 'Armando', NULL, '2016-06-25 00:00:00', 63, NULL, '3', '35', 0, 1, 0, 0, 'vereda la casita', 0, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:32:33'),
(34, 4, 1, 6, 45, 51, 217, 8, 223, 16, 22, 31, 35, 39, NULL, NULL, NULL, '3214567845', 'Arellano', NULL, 'Daniel', NULL, '2016-06-12 00:00:00', 29, NULL, '3', '56', 1, 1, 1, 1, 'vereda la casita', 0, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:34:32'),
(35, 4, 1, 6, 48, NULL, 214, 8, 225, 16, 22, 31, 35, 218, NULL, NULL, NULL, '1345678452', 'Casas', NULL, 'Andres', NULL, '2016-06-23 00:00:00', 35, NULL, '3', '42', 1, 1, 1, 0, 'vereda la casita', 1, 'vereda la piña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-06-28 17:51:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario_pasantia`
--

CREATE TABLE IF NOT EXISTS `beneficiario_pasantia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasantia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beneficiario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario_ruta`
--

CREATE TABLE IF NOT EXISTS `beneficiario_ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beneficiario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario_soporte`
--

CREATE TABLE IF NOT EXISTS `beneficiario_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiario_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_492E09224B64ABC7` (`beneficiario_id`),
  KEY `IDX_492E0922E24646FA` (`tipo_soporte_id`),
  KEY `IDX_492E0922DADD026` (`usuario_modificacion_id`),
  KEY `IDX_492E0922AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `beneficiario_soporte`
--

INSERT INTO `beneficiario_soporte` (`id`, `beneficiario_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 2, 4, NULL, NULL, '30291e422c1a618a3a278fb2b599265d95fdc1fc.jpeg', 0, '2016-05-20 19:33:30', '2016-05-20 19:23:54'),
(2, 3, 4, NULL, NULL, '2611726d23c170a123b53e3004954c41047854de.png', 0, '2016-05-26 16:42:58', '2016-05-25 22:40:41'),
(3, 34, 12, NULL, NULL, '0c5edc99d42771f568797e8cb5753e103f90b87c.png', 1, NULL, '2016-06-28 18:03:48'),
(4, 20, 4, NULL, NULL, '86c73e48ac4ce59530453f7fe1ed55d1237c7d8c.png', 0, '2016-06-28 18:08:28', '2016-06-28 18:07:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_criterio_grupo_concurso`
--

CREATE TABLE IF NOT EXISTS `calificacion_criterio_grupo_concurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `criterio_calificacion_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `concurso_id` int(11) DEFAULT NULL,
  `puntaje` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FA6CB6BDB9595895` (`criterio_calificacion_id`),
  KEY `IDX_FA6CB6BD9C833003` (`grupo_id`),
  KEY `IDX_FA6CB6BDF415D168` (`concurso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `calificacion_criterio_grupo_concurso`
--

INSERT INTO `calificacion_criterio_grupo_concurso` (`id`, `criterio_calificacion_id`, `grupo_id`, `concurso_id`, `puntaje`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 1, 1, 2, 50, 1, NULL, NULL, NULL, '2016-06-21 21:45:51'),
(2, 1, 1, 2, 100, 1, NULL, NULL, NULL, '2016-06-21 21:45:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_experiencia_exitosa`
--

CREATE TABLE IF NOT EXISTS `calificacion_experiencia_exitosa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `experiencia_exitosa_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_46C93B57D327D072` (`experiencia_exitosa_id`),
  KEY `IDX_46C93B57DADD026` (`usuario_modificacion_id`),
  KEY `IDX_46C93B57AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camino`
--

CREATE TABLE IF NOT EXISTS `camino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `nodo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_33C9673B9C833003` (`grupo_id`),
  KEY `IDX_33C9673B29B07FB3` (`nodo_id`),
  KEY `IDX_33C9673BDADD026` (`usuario_modificacion_id`),
  KEY `IDX_33C9673BAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=81 ;

--
-- Volcado de datos para la tabla `camino`
--

INSERT INTO `camino` (`id`, `grupo_id`, `nodo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `estado`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 5, 1, NULL, NULL, 2, 1, NULL, '2016-05-05 23:24:35'),
(2, 6, 1, NULL, NULL, 2, 1, NULL, '2016-05-06 14:36:41'),
(3, 7, 1, NULL, NULL, 2, 1, NULL, '2016-05-06 14:48:25'),
(4, 8, 1, NULL, NULL, 2, 1, NULL, '2016-05-06 17:26:46'),
(5, 9, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 13:52:40'),
(6, 10, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 13:54:01'),
(7, 11, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 13:54:39'),
(8, 12, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 13:55:57'),
(9, 13, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:03:27'),
(10, 17, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:05:03'),
(11, 18, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:06:20'),
(12, 19, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:21:15'),
(13, 20, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:21:16'),
(14, 21, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:21:18'),
(15, 22, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:21:30'),
(16, 23, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:21:34'),
(17, 26, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:24:09'),
(20, 28, 1, NULL, NULL, 2, 1, NULL, '2016-05-07 14:25:45'),
(21, 19, 2, NULL, NULL, 1, 1, NULL, '2016-05-07 15:10:17'),
(22, 19, 2, NULL, NULL, 2, 1, NULL, '2016-05-07 18:29:56'),
(23, 1, 1, NULL, NULL, 2, 1, NULL, '2016-05-18 21:22:24'),
(24, 2, 1, NULL, NULL, 2, 1, NULL, '2016-05-18 22:15:45'),
(27, 1, 2, NULL, NULL, 3, 1, NULL, '2016-05-31 19:16:18'),
(28, 2, 2, NULL, NULL, 3, 1, NULL, '2016-05-31 19:16:18'),
(29, 3, 1, NULL, NULL, 2, 1, NULL, '2016-05-31 20:47:25'),
(53, 3, 2, NULL, NULL, 1, 1, NULL, '2016-06-08 17:00:21'),
(54, 3, 2, NULL, NULL, 2, 1, NULL, '2016-06-08 17:04:48'),
(55, 3, 3, NULL, NULL, 1, 1, NULL, '2016-06-08 17:04:48'),
(56, 3, 3, NULL, NULL, 2, 1, NULL, '2016-06-08 18:24:15'),
(57, 4, 1, NULL, NULL, 2, 1, NULL, '2016-06-28 16:23:19'),
(58, 3, 26, NULL, NULL, 1, 1, NULL, '2016-06-28 19:01:50'),
(59, 4, 2, NULL, NULL, 1, 1, NULL, '2016-06-28 19:30:53'),
(60, 4, 2, NULL, NULL, 2, 1, NULL, '2016-06-28 21:17:59'),
(61, 4, 6, NULL, NULL, 1, 1, NULL, '2016-06-28 21:23:00'),
(62, 4, 6, NULL, NULL, 2, 1, NULL, '2016-06-28 21:24:51'),
(63, 4, 7, NULL, NULL, 1, 1, NULL, '2016-06-28 21:33:56'),
(64, 4, 7, NULL, NULL, 2, 1, NULL, '2016-06-28 21:42:11'),
(65, 4, 8, NULL, NULL, 1, 1, NULL, '2016-06-28 21:42:11'),
(66, 4, 8, NULL, NULL, 2, 1, NULL, '2016-06-28 21:44:15'),
(67, 4, 9, NULL, NULL, 1, 1, NULL, '2016-06-28 21:49:50'),
(68, 4, 9, NULL, NULL, 2, 1, NULL, '2016-06-28 21:50:45'),
(69, 4, 26, NULL, NULL, 1, 1, NULL, '2016-06-28 22:02:12'),
(70, 4, 26, NULL, NULL, 2, 1, NULL, '2016-06-28 22:12:50'),
(71, 4, 27, NULL, NULL, 1, 1, NULL, '2016-06-28 22:14:04'),
(72, 4, 27, NULL, NULL, 2, 1, NULL, '2016-06-28 22:16:38'),
(73, 4, 28, NULL, NULL, 1, 1, NULL, '2016-06-28 22:16:38'),
(74, 4, 28, NULL, NULL, 2, 1, NULL, '2016-06-28 22:17:14'),
(75, 4, 29, NULL, NULL, 1, 1, NULL, '2016-06-28 22:17:14'),
(76, 4, 29, NULL, NULL, 2, 1, NULL, '2016-06-28 22:18:30'),
(77, 4, 30, NULL, NULL, 1, 1, NULL, '2016-06-28 22:18:30'),
(78, 4, 30, NULL, NULL, 2, 1, NULL, '2016-06-28 22:18:50'),
(79, 4, 31, NULL, NULL, 1, 1, NULL, '2016-06-28 22:22:36'),
(80, 4, 31, NULL, NULL, 2, 1, NULL, '2016-06-28 22:23:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion`
--

CREATE TABLE IF NOT EXISTS `capacitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_id` int(11) DEFAULT NULL,
  `modalidad_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `capacitador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A430D21A9276E6C` (`tipo_id`),
  KEY `IDX_5A430D211E092B9F` (`modalidad_id`),
  KEY `IDX_5A430D2158BC1BE0` (`municipio_id`),
  KEY `IDX_5A430D21DADD026` (`usuario_modificacion_id`),
  KEY `IDX_5A430D21AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion_financiera`
--

CREATE TABLE IF NOT EXISTS `capacitacion_financiera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programa_capacitacion_financiera_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `modulo` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16AFBD3A6B25D3FE` (`programa_capacitacion_financiera_id`),
  KEY `IDX_16AFBD3A9F5A440B` (`estado_id`),
  KEY `IDX_16AFBD3ADADD026` (`usuario_modificacion_id`),
  KEY `IDX_16AFBD3AAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion_financiera_soporte`
--

CREATE TABLE IF NOT EXISTS `capacitacion_financiera_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacitacion_financiera_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_242A7B7758BFCBEC` (`capacitacion_financiera_id`),
  KEY `IDX_242A7B77E24646FA` (`tipo_soporte_id`),
  KEY `IDX_242A7B77DADD026` (`usuario_modificacion_id`),
  KEY `IDX_242A7B77AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion_soporte`
--

CREATE TABLE IF NOT EXISTS `capacitacion_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacitacion_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D90B771B5B587DA` (`capacitacion_id`),
  KEY `IDX_D90B771BE24646FA` (`tipo_soporte_id`),
  KEY `IDX_D90B771BDADD026` (`usuario_modificacion_id`),
  KEY `IDX_D90B771BAEADF654` (`usuario_creacion_id`)
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
  `lugar_realizacion_CLEAR` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E5B1F10658BC1BE0` (`municipio_id`),
  KEY `IDX_E5B1F106DADD026` (`usuario_modificacion_id`),
  KEY `IDX_E5B1F106AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `clear`
--

INSERT INTO `clear` (`id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_inicio`, `fecha_finalizacion`, `lugar_realizacion_CLEAR`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(3, 91, NULL, NULL, '2016-05-14 00:00:00', '2016-05-28 00:00:00', 'La escuela', 1, NULL, '2016-05-27 16:58:20'),
(4, 91, NULL, NULL, '2016-05-14 00:00:00', '2016-05-21 00:00:00', 'La escuela editada', 1, NULL, '2016-06-30 16:21:29'),
(7, 3, NULL, NULL, '2016-06-01 00:00:00', '2016-06-05 00:00:00', 'RMC Producciones', 1, NULL, '2016-06-28 19:03:56'),
(8, 85, NULL, NULL, '2016-06-10 00:00:00', '2016-06-12 00:00:00', 'RMC Producciones 2', 1, NULL, '2016-06-28 21:22:47'),
(9, 69, NULL, NULL, '2016-06-17 00:00:00', '2016-06-26 00:00:00', 'RMC Producciones 3', 1, NULL, '2016-06-28 21:49:38'),
(10, 96, NULL, NULL, '2016-06-26 00:00:00', '2016-06-30 00:00:00', 'RMC Producciones 4', 1, NULL, '2016-06-28 22:01:13'),
(11, 66, NULL, NULL, '2016-06-26 00:00:00', '2016-06-29 00:00:00', 'Iglesia', 1, NULL, '2016-06-28 22:22:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clear_soporte`
--

CREATE TABLE IF NOT EXISTS `clear_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clear_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_43AB6B2ED30DEA81` (`clear_id`),
  KEY `IDX_43AB6B2EE24646FA` (`tipo_soporte_id`),
  KEY `IDX_43AB6B2EDADD026` (`usuario_modificacion_id`),
  KEY `IDX_43AB6B2EAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `clear_soporte`
--

INSERT INTO `clear_soporte` (`id`, `clear_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 3, 16, NULL, NULL, 'a60616839333d409a6edf6eb5f08fa52d2279049.png', 0, '2016-05-27 18:16:45', '2016-05-27 17:54:37'),
(2, 3, 16, NULL, NULL, '0539f006a0a83e73ba0bb8dcf8e6f7025c91f7f0.png', 0, '2016-06-01 17:40:00', '2016-05-31 19:16:17'),
(3, 4, 16, NULL, NULL, '029b94046a9191de12c356b7f67e158248e37d5b.png', 1, NULL, '2016-05-31 21:19:49'),
(4, 3, 16, NULL, NULL, '9bd5f690c078b52c8f8b649a8193e413c4f56611.png', 0, '2016-06-02 18:10:42', '2016-06-01 17:40:00'),
(5, 3, 16, NULL, NULL, 'aca5d4cea2b996eb61064faed87fcaef4209e202.png', 0, '2016-06-02 18:58:20', '2016-06-02 18:10:42'),
(6, 3, 16, NULL, NULL, 'd000282a06139e6ea7efe8e5c9624732f80650e5.png', 0, '2016-06-03 22:20:15', '2016-06-02 18:58:20'),
(7, 3, 16, NULL, NULL, 'e9bf78747f53c18e19eb1da334097781714f353d.png', 0, '2016-06-07 18:15:15', '2016-06-03 22:20:15'),
(8, 3, 16, NULL, NULL, '88885e07f93008456abb8343d194bc495eaae040.png', 0, '2016-06-08 17:04:47', '2016-06-07 18:15:15'),
(9, 3, 18, NULL, NULL, '166efd9ac24bd8cad9e32140f26fbc58256974f9.png', 1, NULL, '2016-06-08 17:04:40'),
(10, 3, 16, NULL, NULL, '1ed98172f0f02d533f51b46af2b2ea2c1ef167a1.png', 1, NULL, '2016-06-08 17:04:48'),
(11, 7, 18, NULL, NULL, 'f2425b09375381f8cc1fc083aace53cdd45e2d18.png', 1, NULL, '2016-06-28 19:24:28'),
(12, 7, 16, NULL, NULL, '350c3837ba9ff74c937a17bbbda1ff182c6b7704.pdf', 1, NULL, '2016-06-28 21:17:59'),
(13, 8, 18, NULL, NULL, '85948ad63d64de1009876fe62ad16e1351f97f5d.pdf', 1, NULL, '2016-06-28 21:24:36'),
(14, 8, 16, NULL, NULL, '21129f74f0efcd9b304f58159296a8e3431e3503.pdf', 1, NULL, '2016-06-28 21:24:51'),
(15, 9, 18, NULL, NULL, '9e22290053bdafdb66e474745f9b64d4169030f8.pdf', 1, NULL, '2016-06-28 21:50:28'),
(16, 9, 16, NULL, NULL, '44c33a79914a16cf1e59fbb5bb85d87745f9df4c.pdf', 1, NULL, '2016-06-28 21:50:44'),
(17, 10, 18, NULL, NULL, '9bc3c2ef3b32da1b2f4be091a1941274b7c8f595.pdf', 1, NULL, '2016-06-28 22:01:54'),
(18, 10, 16, NULL, NULL, '2ce73b57b3204210e9b63b468ad9f9f0511ba8ef.pdf', 1, NULL, '2016-06-28 22:12:50'),
(19, 11, 18, NULL, NULL, 'c14810a80073fdb452f51871f02413389b7c7fd7.pdf', 1, NULL, '2016-06-28 22:23:02'),
(20, 11, 16, NULL, NULL, 'fce58f3c286d389763508dcc7fc7194e2228c271.pdf', 1, NULL, '2016-06-28 22:23:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comite`
--

CREATE TABLE IF NOT EXISTS `comite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `lugar_realizacion_comite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DC01CA9F58BC1BE0` (`municipio_id`),
  KEY `IDX_DC01CA9FDADD026` (`usuario_modificacion_id`),
  KEY `IDX_DC01CA9FAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comite_soporte`
--

CREATE TABLE IF NOT EXISTS `comite_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comite_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6FFBFCDED61C3573` (`comite_id`),
  KEY `IDX_6FFBFCDEE24646FA` (`tipo_soporte_id`),
  KEY `IDX_6FFBFCDEDADD026` (`usuario_modificacion_id`),
  KEY `IDX_6FFBFCDEAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso`
--

CREATE TABLE IF NOT EXISTS `concurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_id` int(11) DEFAULT NULL,
  `modalidad_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_bases` datetime NOT NULL,
  `tematica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ambito` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `problematica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actividades` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resultados` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `distribucion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `criterios` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aprobacion` tinyint(1) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `fecha_inicio_propuesta` datetime DEFAULT NULL,
  `fecha_finalizacion_propuesta` datetime DEFAULT NULL,
  `aprobador` int(11) DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_785F9DE6A9276E6C` (`tipo_id`),
  KEY `IDX_785F9DE61E092B9F` (`modalidad_id`),
  KEY `IDX_785F9DE6DADD026` (`usuario_modificacion_id`),
  KEY `IDX_785F9DE6AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `concurso`
--

INSERT INTO `concurso` (`id`, `tipo_id`, `modalidad_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_bases`, `tematica`, `ambito`, `problematica`, `actividades`, `resultados`, `valor`, `distribucion`, `criterios`, `aprobacion`, `fecha_inicio`, `fecha_finalizacion`, `fecha_inicio_propuesta`, `fecha_finalizacion_propuesta`, `aprobador`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(2, 144, 143, NULL, NULL, '2016-06-10 00:00:00', 'Marranos', 'Marranos', 'Marranos', 'Marranos', 'Marranos', NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-10 00:00:00', '2016-06-18 00:00:00', NULL, NULL, 1, NULL, '2016-06-13 18:21:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso_soporte`
--

CREATE TABLE IF NOT EXISTS `concurso_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concurso_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_89B5F18DF415D168` (`concurso_id`),
  KEY `IDX_89B5F18DE24646FA` (`tipo_soporte_id`),
  KEY `IDX_89B5F18DDADD026` (`usuario_modificacion_id`),
  KEY `IDX_89B5F18DAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE IF NOT EXISTS `contador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `numero_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_tarjeta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E83EF8FAF6939175` (`tipo_documento_id`),
  KEY `IDX_E83EF8FABCE7B795` (`genero_id`),
  KEY `IDX_E83EF8FADADD026` (`usuario_modificacion_id`),
  KEY `IDX_E83EF8FAAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id`, `tipo_documento_id`, `genero_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `numero_documento`, `numero_tarjeta`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 6, NULL, NULL, '1022376577', '64564654', 'Cantor', 'Forero', 'Juan', 'Sebastian', '2016-05-19 00:00:00', '4034567', '3012345789', 'juancddd@hotma.com', 1, NULL, '2016-05-24 21:29:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador_soporte`
--

CREATE TABLE IF NOT EXISTS `contador_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contador_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_69814D44C31645C0` (`contador_id`),
  KEY `IDX_69814D44E24646FA` (`tipo_soporte_id`),
  KEY `IDX_69814D44DADD026` (`usuario_modificacion_id`),
  KEY `IDX_69814D44AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE IF NOT EXISTS `convocatoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poa_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6D773021BB18C0BA` (`poa_id`),
  KEY `IDX_6D773021DADD026` (`usuario_modificacion_id`),
  KEY `IDX_6D773021AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `convocatoria`
--

INSERT INTO `convocatoria` (`id`, `poa_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `numero`, `fecha_inicio`, `fecha_cierre`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, NULL, 2, '2016-05-13 00:00:00', '2016-05-12 00:00:00', 1, '2016-05-25 18:47:25', '2016-05-25 15:50:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria_soporte`
--

CREATE TABLE IF NOT EXISTS `convocatoria_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `convocatoria_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9C5592A44EE93BE6` (`convocatoria_id`),
  KEY `IDX_9C5592A4E24646FA` (`tipo_soporte_id`),
  KEY `IDX_9C5592A4DADD026` (`usuario_modificacion_id`),
  KEY `IDX_9C5592A4AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio_calificacion`
--

CREATE TABLE IF NOT EXISTS `criterio_calificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concurso_id` int(11) DEFAULT NULL,
  `criterio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maximo_puntaje` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C5ADD4C2F415D168` (`concurso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `criterio_calificacion`
--

INSERT INTO `criterio_calificacion` (`id`, `concurso_id`, `criterio`, `maximo_puntaje`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 2, 'este criterio', 432, 1, NULL, NULL, NULL, '2016-06-14 21:00:15');

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
-- Estructura de tabla para la tabla `diagnostico_organizacional`
--

CREATE TABLE IF NOT EXISTS `diagnostico_organizacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_visita` datetime NOT NULL,
  `promotor` int(11) DEFAULT NULL,
  `productivaA` smallint(6) NOT NULL,
  `productivaB` smallint(6) NOT NULL,
  `productivaC` smallint(6) NOT NULL,
  `productivaD` smallint(6) NOT NULL,
  `productivaE` smallint(6) NOT NULL,
  `productivaF` smallint(6) NOT NULL,
  `comercialA` smallint(6) NOT NULL,
  `comercialB` smallint(6) NOT NULL,
  `comercialC` smallint(6) NOT NULL,
  `comercialD` smallint(6) NOT NULL,
  `comercialE` smallint(6) NOT NULL,
  `financieraA` smallint(6) NOT NULL,
  `financieraB` smallint(6) NOT NULL,
  `financieraC` smallint(6) NOT NULL,
  `financieraD` smallint(6) NOT NULL,
  `financieraE` smallint(6) NOT NULL,
  `financieraF` smallint(6) NOT NULL,
  `administrativaA` smallint(6) NOT NULL,
  `administrativaB` smallint(6) NOT NULL,
  `administrativaC` smallint(6) NOT NULL,
  `administrativaD` smallint(6) NOT NULL,
  `administrativaE` smallint(6) NOT NULL,
  `organizacionalA` smallint(6) NOT NULL,
  `organizacionalB` smallint(6) NOT NULL,
  `organizacionalC` smallint(6) NOT NULL,
  `organizacionalD` smallint(6) NOT NULL,
  `organizacionalE` smallint(6) NOT NULL,
  `organizacionalF` smallint(6) NOT NULL,
  `totalProductiva` smallint(6) DEFAULT NULL,
  `totalComercial` smallint(6) DEFAULT NULL,
  `totalFinanciera` smallint(6) DEFAULT NULL,
  `totalAdministrativa` smallint(6) DEFAULT NULL,
  `totalOrganizacional` smallint(6) DEFAULT NULL,
  `total` smallint(6) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_80B0ADF49C833003` (`grupo_id`),
  KEY `IDX_80B0ADF4DADD026` (`usuario_modificacion_id`),
  KEY `IDX_80B0ADF4AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `diagnostico_organizacional`
--

INSERT INTO `diagnostico_organizacional` (`id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_visita`, `promotor`, `productivaA`, `productivaB`, `productivaC`, `productivaD`, `productivaE`, `productivaF`, `comercialA`, `comercialB`, `comercialC`, `comercialD`, `comercialE`, `financieraA`, `financieraB`, `financieraC`, `financieraD`, `financieraE`, `financieraF`, `administrativaA`, `administrativaB`, `administrativaC`, `administrativaD`, `administrativaE`, `organizacionalA`, `organizacionalB`, `organizacionalC`, `organizacionalD`, `organizacionalE`, `organizacionalF`, `totalProductiva`, `totalComercial`, `totalFinanciera`, `totalAdministrativa`, `totalOrganizacional`, `total`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 3, NULL, NULL, '2016-06-09 00:00:00', NULL, 1, 2, 2, 3, 1, 1, 2, 3, 2, 1, 1, 1, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 10, 9, 16, 15, 18, 86, 1, NULL, '2016-06-08 18:24:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribucion_premio`
--

CREATE TABLE IF NOT EXISTS `distribucion_premio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concurso_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `posicion` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FF5D91EAF415D168` (`concurso_id`),
  KEY `IDX_FF5D91EA9C833003` (`grupo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `distribucion_premio`
--

INSERT INTO `distribucion_premio` (`id`, `concurso_id`, `grupo_id`, `posicion`, `valor`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 3, '5000000', 1, NULL, NULL, NULL, '2016-06-15 22:49:36'),
(2, NULL, NULL, 3, '5000000', 1, NULL, NULL, NULL, '2016-06-15 22:49:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seguimiento_fase_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `periodicidad` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socio_organizacion` tinyint(1) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `edad_al_ingreso` decimal(10,0) NOT NULL,
  `sexo` int(11) NOT NULL,
  `remuneracion__bruta_anual` decimal(10,0) NOT NULL,
  `periodo_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D9D9BF52308D77B2` (`seguimiento_fase_id`),
  KEY `IDX_D9D9BF52DADD026` (`usuario_modificacion_id`),
  KEY `IDX_D9D9BF52AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructura_organizacional`
--

CREATE TABLE IF NOT EXISTS `estructura_organizacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `cargo` int(11) NOT NULL,
  `beneficiario` int(11) NOT NULL,
  `fecha_inicio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_finalizacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_fases`
--

CREATE TABLE IF NOT EXISTS `evaluacion_fases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `calificacion_iea` decimal(10,0) DEFAULT NULL,
  `apto_iea` tinyint(1) DEFAULT NULL,
  `calificacion_pi` decimal(10,0) DEFAULT NULL,
  `apto_pi` tinyint(1) DEFAULT NULL,
  `calificacion_pn` decimal(10,0) DEFAULT NULL,
  `apto_pn` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D47E6B9B9C833003` (`grupo_id`),
  KEY `IDX_D47E6B9BDADD026` (`usuario_modificacion_id`),
  KEY `IDX_D47E6B9BAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `evaluacion_fases`
--

INSERT INTO `evaluacion_fases` (`id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `calificacion_iea`, `apto_iea`, `calificacion_pi`, `apto_pi`, `calificacion_pn`, `apto_pn`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 3, NULL, NULL, NULL, 0, NULL, 0, '80', 1, 1, NULL, '2016-06-03 22:19:49'),
(2, 4, NULL, NULL, NULL, 0, NULL, 0, '-70', 1, 1, NULL, '2016-06-28 22:12:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_fases_soporte`
--

CREATE TABLE IF NOT EXISTS `evaluacion_fases_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluacionfases_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C069DE2B4D525882` (`evaluacionfases_id`),
  KEY `IDX_C069DE2BE24646FA` (`tipo_soporte_id`),
  KEY `IDX_C069DE2BDADD026` (`usuario_modificacion_id`),
  KEY `IDX_C069DE2BAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `organizador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_47860B05A9276E6C` (`tipo_id`),
  KEY `IDX_47860B0558BC1BE0` (`municipio_id`),
  KEY `IDX_47860B05DADD026` (`usuario_modificacion_id`),
  KEY `IDX_47860B05AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_soporte`
--

CREATE TABLE IF NOT EXISTS `evento_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evento_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1EB2F2B987A5F842` (`evento_id`),
  KEY `IDX_1EB2F2B9E24646FA` (`tipo_soporte_id`),
  KEY `IDX_1EB2F2B9DADD026` (`usuario_modificacion_id`),
  KEY `IDX_1EB2F2B9AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_exitosa`
--

CREATE TABLE IF NOT EXISTS `experiencia_exitosa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  KEY `IDX_380325B19C833003` (`grupo_id`),
  KEY `IDX_380325B1DADD026` (`usuario_modificacion_id`),
  KEY `IDX_380325B1AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_exitosa_soporte`
--

CREATE TABLE IF NOT EXISTS `experiencia_exitosa_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `experienciaexitosa_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E6739A508541B0D4` (`experienciaexitosa_id`),
  KEY `IDX_E6739A50E24646FA` (`tipo_soporte_id`),
  KEY `IDX_E6739A50DADD026` (`usuario_modificacion_id`),
  KEY `IDX_E6739A50AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feria`
--

CREATE TABLE IF NOT EXISTS `feria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `fecha_propuesta` datetime NOT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entidades` longtext COLLATE utf8_unicode_ci NOT NULL,
  `presentacion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `objetivo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `objetivos_especificos` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_aprobacion` datetime DEFAULT NULL,
  `fecha_aprobada` datetime DEFAULT NULL,
  `aprobacion` tinyint(1) DEFAULT NULL,
  `coordinador` int(11) DEFAULT NULL,
  `numero_proyectos_produccion_agropecuaria` int(11) DEFAULT NULL,
  `numero_proyectos_agroindustria` int(11) DEFAULT NULL,
  `numero_proyectos_turismo_rural` int(11) DEFAULT NULL,
  `numero_proyectos_artesanias` int(11) DEFAULT NULL,
  `numero_proyectos_otros_servicios` int(11) DEFAULT NULL,
  `valor_ventas_produccion_agropecuaria` decimal(10,0) DEFAULT NULL,
  `valor_ventas_agroindustria` decimal(10,0) DEFAULT NULL,
  `valor_ventas_turismo_rural` decimal(10,0) DEFAULT NULL,
  `valor_ventas_artesanias` decimal(10,0) DEFAULT NULL,
  `valor_ventas_otros_servicios` decimal(10,0) DEFAULT NULL,
  `personas_atendidas` int(11) DEFAULT NULL,
  `representantes_instituciones` int(11) DEFAULT NULL,
  `comentarios` longtext COLLATE utf8_unicode_ci,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `fecha_inicio_propuesta` datetime DEFAULT NULL,
  `fecha_finalizacion_propuesta` datetime DEFAULT NULL,
  `aprobador` int(11) DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5574FDFA9276E6C` (`tipo_id`),
  KEY `IDX_5574FDF58BC1BE0` (`municipio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `feria`
--

INSERT INTO `feria` (`id`, `tipo_id`, `municipio_id`, `fecha_propuesta`, `lugar`, `nombre`, `entidades`, `presentacion`, `objetivo`, `objetivos_especificos`, `fecha_aprobacion`, `fecha_aprobada`, `aprobacion`, `coordinador`, `numero_proyectos_produccion_agropecuaria`, `numero_proyectos_agroindustria`, `numero_proyectos_turismo_rural`, `numero_proyectos_artesanias`, `numero_proyectos_otros_servicios`, `valor_ventas_produccion_agropecuaria`, `valor_ventas_agroindustria`, `valor_ventas_turismo_rural`, `valor_ventas_artesanias`, `valor_ventas_otros_servicios`, `personas_atendidas`, `representantes_instituciones`, `comentarios`, `fecha_inicio`, `fecha_finalizacion`, `fecha_inicio_propuesta`, `fecha_finalizacion_propuesta`, `aprobador`, `observacion`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, NULL, 1, '2016-06-09 00:00:00', 'La iglesia', 'Feria de emprendimiento', 'LaCAR', 'P', 'Presentar Emprendimientos', 'sad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-06-14 22:03:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feria_soporte`
--

CREATE TABLE IF NOT EXISTS `feria_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feria_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C27A0DA4627A20A5` (`feria_id`),
  KEY `IDX_C27A0DA4E24646FA` (`tipo_soporte_id`),
  KEY `IDX_C27A0DA4DADD026` (`usuario_modificacion_id`),
  KEY `IDX_C27A0DA4AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `fecha_inscripcion` datetime DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rural` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_identificacion_tributaria` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_constitucion_legal` datetime DEFAULT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_cuenta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8C0E9BD33A909126` (`nombre`),
  UNIQUE KEY `UNIQ_8C0E9BD320332D99` (`codigo`),
  KEY `IDX_8C0E9BD34EE93BE6` (`convocatoria_id`),
  KEY `IDX_8C0E9BD358BC1BE0` (`municipio_id`),
  KEY `IDX_8C0E9BD3A9276E6C` (`tipo_id`),
  KEY `IDX_8C0E9BD3BE494C72` (`figura_legal_constitucion_id`),
  KEY `IDX_8C0E9BD33771B82E` (`entidad_financiera_cuenta_id`),
  KEY `IDX_8C0E9BD378814E56` (`tipo_cuenta_id`),
  KEY `IDX_8C0E9BD3DADD026` (`usuario_modificacion_id`),
  KEY `IDX_8C0E9BD3AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `convocatoria_id`, `municipio_id`, `tipo_id`, `figura_legal_constitucion_id`, `entidad_financiera_cuenta_id`, `tipo_cuenta_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_inscripcion`, `codigo`, `nombre`, `direccion`, `rural`, `descripcion`, `numero_identificacion_tributaria`, `fecha_constitucion_legal`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `numero_cuenta`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 91, 173, NULL, 180, 175, NULL, NULL, NULL, NULL, 'Los Fundadores', 'Vereda la Palma', 1, 'Por la segunda subida después del acerico', NULL, NULL, NULL, NULL, NULL, '1231231', 1, '2016-05-18 22:14:06', '2016-05-18 21:22:23'),
(2, NULL, 87, 174, 204, NULL, NULL, NULL, NULL, NULL, NULL, 'La Polleria editado', 'Vereda el Vino', 0, NULL, '190547237-7', '2016-05-04 00:00:00', '7031447', NULL, NULL, NULL, 1, '2016-05-19 21:44:01', '2016-05-18 22:15:45'),
(3, 1, 8, 173, NULL, NULL, NULL, NULL, NULL, '2016-05-31 21:19:49', 'CA-CAL-1-2016/05-003', 'Seguimiento', 'Vereda el Vino', 1, 'Cerca a la carretera principal', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-05-31 20:47:25'),
(4, 1, 47, 171, 207, 178, 175, NULL, NULL, '2016-06-28 21:17:59', 'MA-PRI-4-2016/06-004', 'Aviatur Editado', 'Vereda el Vino', 1, 'Pasando la escuela a 10 minutos de la tienda de doña Pepa', '-0', NULL, NULL, NULL, NULL, '345784513754-9', 1, '2016-06-28 16:28:51', '2016-06-28 16:23:19');

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
(1, 2, 1, NULL, NULL, 'e605b166758b8b82fb973c8bab3e013d50b2cd42.png', 0, '2016-05-24 20:55:29', '2016-05-24 19:03:51'),
(2, 2, 1, NULL, NULL, 'daefe75c3ff7b94a2e4d6d90dd24adb1ebbeeb19.png', 1, NULL, '2016-05-24 20:57:05'),
(3, 4, 1, NULL, NULL, '1ed0ec07493ea2f95564e0ed8d74bacbaeb768cc.png', 0, '2016-06-28 16:41:56', '2016-06-28 16:38:44'),
(4, 4, 3, NULL, NULL, 'da521bd6b1d4c717873d5cfb6542c5e731036369.pdf', 1, NULL, '2016-06-28 16:39:03'),
(5, 4, 24, NULL, NULL, '9348dbb8ad3e13f9f6d9ec6a68b35394c2233367.pdf', 1, NULL, '2016-06-28 21:46:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilitacion_fases`
--

CREATE TABLE IF NOT EXISTS `habilitacion_fases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `mot_formal` tinyint(1) DEFAULT NULL,
  `mot_no_formal` tinyint(1) DEFAULT NULL,
  `iea` tinyint(1) DEFAULT NULL,
  `pi` tinyint(1) DEFAULT NULL,
  `pn` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_87643E129C833003` (`grupo_id`),
  KEY `IDX_87643E12DADD026` (`usuario_modificacion_id`),
  KEY `IDX_87643E12AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `habilitacion_fases`
--

INSERT INTO `habilitacion_fases` (`id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `mot_formal`, `mot_no_formal`, `iea`, `pi`, `pn`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 3, NULL, NULL, 0, 0, 0, NULL, 1, 1, NULL, '2016-06-08 17:01:15'),
(2, 4, NULL, NULL, 1, 0, 0, NULL, 0, 1, NULL, '2016-06-28 21:12:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante`
--

CREATE TABLE IF NOT EXISTS `integrante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
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
  KEY `IDX_8AF632F6F6939175` (`tipo_documento_id`),
  KEY `IDX_8AF632F6BCE7B795` (`genero_id`),
  KEY `IDX_8AF632F6378258DA` (`nivel_estudios_id`),
  KEY `IDX_8AF632F6DA995DEC` (`pertenencia_etnica_id`),
  KEY `IDX_8AF632F6DADD026` (`usuario_modificacion_id`),
  KEY `IDX_8AF632F6AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `integrante`
--

INSERT INTO `integrante` (`id`, `tipo_documento_id`, `genero_id`, `nivel_estudios_id`, `pertenencia_etnica_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `entidad`, `cargo`, `direccion`, `telefono_fijo`, `telefono_celular`, `telefono_celular2`, `correo_electronico`, `foto`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 2, 6, 32, NULL, NULL, NULL, '123456789', 'Cantor', 'Contreras', 'Juan', 'Alberto', '2016-06-24 00:00:00', 'Promotor Rural', 'Veedor', 'calle 67# 76 -48', '3456789412', '3054678945', NULL, 'juanec888@hotmail.caaaa', NULL, 1, NULL, '2016-06-14 16:06:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante_soporte`
--

CREATE TABLE IF NOT EXISTS `integrante_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `integrante_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_480A203A6EA6C980` (`integrante_id`),
  KEY `IDX_480A203AE24646FA` (`tipo_soporte_id`),
  KEY `IDX_480A203ADADD026` (`usuario_modificacion_id`),
  KEY `IDX_480A203AAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=256 ;

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
(171, NULL, NULL, 'tipo_grupo', 'Formal Con Negocio', 'FN', NULL, 1, NULL, '2016-04-11 18:00:31'),
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
(254, NULL, NULL, 'periodicidad', 'Por Campaña', 'F', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(255, NULL, NULL, 'evento_tipo_soporte', 'Prueba de documento evento', NULL, NULL, 1, NULL, '2016-04-11 17:57:17');

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
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE IF NOT EXISTS `organizacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linea_productiva_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `tipo_documento_contacto_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre_organizacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inscripcion` datetime NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rural` tinyint(1) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_documento_contacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido_contacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido_contacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_nombre_contacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_nombre_contacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_fijo_contacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular_contacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo_electronico_contacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ruta` tinyint(1) NOT NULL,
  `pasantia` tinyint(1) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C200C5A63273AB8` (`linea_productiva_id`),
  KEY `IDX_C200C5A58BC1BE0` (`municipio_id`),
  KEY `IDX_C200C5A51BE510C` (`tipo_documento_contacto_id`),
  KEY `IDX_C200C5ADADD026` (`usuario_modificacion_id`),
  KEY `IDX_C200C5AAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`id`, `linea_productiva_id`, `municipio_id`, `tipo_documento_contacto_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre_organizacion`, `tipo_producto`, `fecha_inscripcion`, `codigo`, `nombre`, `direccion`, `rural`, `descripcion`, `numero_documento_contacto`, `primer_apellido_contacto`, `segundo_apellido_contacto`, `primer_nombre_contacto`, `segundo_nombre_contacto`, `telefono_fijo_contacto`, `telefono_celular_contacto`, `correo_electronico_contacto`, `ruta`, `pasantia`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 226, 91, 4, NULL, NULL, 'Doria', 'Pasta', '2016-06-05 00:00:00', NULL, NULL, 'calle la victoria', 0, 'Esta es para la victorai', '10976537634', 'Forero', 'Villamizar', 'Juan', 'Doria', '2232312', '87627123123', 'Judaaa@hotr.com', 0, 0, 'esta es una empresa seria', 1, NULL, '2016-06-15 18:54:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion_pasantia`
--

CREATE TABLE IF NOT EXISTS `organizacion_pasantia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasantia_id` int(11) DEFAULT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EDB08B86BB6D3273` (`pasantia_id`),
  KEY `IDX_EDB08B8690B1019E` (`organizacion_id`),
  KEY `IDX_EDB08B86DADD026` (`usuario_modificacion_id`),
  KEY `IDX_EDB08B86AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion_ruta`
--

CREATE TABLE IF NOT EXISTS `organizacion_ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_id` int(11) DEFAULT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3206E1A9ABBC4845` (`ruta_id`),
  KEY `IDX_3206E1A990B1019E` (`organizacion_id`),
  KEY `IDX_3206E1A9DADD026` (`usuario_modificacion_id`),
  KEY `IDX_3206E1A9AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion_soporte`
--

CREATE TABLE IF NOT EXISTS `organizacion_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organizacion_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B775B6F690B1019E` (`organizacion_id`),
  KEY `IDX_B775B6F6E24646FA` (`tipo_soporte_id`),
  KEY `IDX_B775B6F6DADD026` (`usuario_modificacion_id`),
  KEY `IDX_B775B6F6AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion_territorio_aprendizaje`
--

CREATE TABLE IF NOT EXISTS `organizacion_territorio_aprendizaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `territorio_aprendizaje_id` int(11) DEFAULT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5E54DCC51281CB4C` (`territorio_aprendizaje_id`),
  KEY `IDX_5E54DCC590B1019E` (`organizacion_id`),
  KEY `IDX_5E54DCC5DADD026` (`usuario_modificacion_id`),
  KEY `IDX_5E54DCC5AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE IF NOT EXISTS `participante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiario_id` int(11) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `pertenencia_etnica_id` int(11) DEFAULT NULL,
  `grupo_indigena_id` int(11) DEFAULT NULL,
  `discapacidad_id` int(11) DEFAULT NULL,
  `estado_civil_id` int(11) DEFAULT NULL,
  `rol_grupo_familiar_id` int(11) DEFAULT NULL,
  `hijos_menores_5_id` int(11) DEFAULT NULL,
  `nivel_estudios_id` int(11) DEFAULT NULL,
  `ocupacion_id` int(11) DEFAULT NULL,
  `tipo_vivienda_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
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
  `sabe_leer` tinyint(1) NOT NULL,
  `sabe_escribir` tinyint(1) NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_85BDC5C34B64ABC7` (`beneficiario_id`),
  KEY `IDX_85BDC5C3F6939175` (`tipo_documento_id`),
  KEY `IDX_85BDC5C3BCE7B795` (`genero_id`),
  KEY `IDX_85BDC5C3DA995DEC` (`pertenencia_etnica_id`),
  KEY `IDX_85BDC5C37AAA0F5A` (`grupo_indigena_id`),
  KEY `IDX_85BDC5C313DA6592` (`discapacidad_id`),
  KEY `IDX_85BDC5C375376D93` (`estado_civil_id`),
  KEY `IDX_85BDC5C3FFAE2092` (`rol_grupo_familiar_id`),
  KEY `IDX_85BDC5C36313548C` (`hijos_menores_5_id`),
  KEY `IDX_85BDC5C3378258DA` (`nivel_estudios_id`),
  KEY `IDX_85BDC5C3D8999C67` (`ocupacion_id`),
  KEY `IDX_85BDC5C3B4837970` (`tipo_vivienda_id`),
  KEY `IDX_85BDC5C3DADD026` (`usuario_modificacion_id`),
  KEY `IDX_85BDC5C3AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasantia`
--

CREATE TABLE IF NOT EXISTS `pasantia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `territorio_aprendizaje_id` int(11) DEFAULT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre_pasantia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aprobacion` tinyint(1) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `fecha_inicio_propuesta` datetime DEFAULT NULL,
  `fecha_finalizacion_propuesta` datetime DEFAULT NULL,
  `aprobador` int(11) DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CBDCE9A61281CB4C` (`territorio_aprendizaje_id`),
  KEY `IDX_CBDCE9A690B1019E` (`organizacion_id`),
  KEY `IDX_CBDCE9A69C833003` (`grupo_id`),
  KEY `IDX_CBDCE9A6DADD026` (`usuario_modificacion_id`),
  KEY `IDX_CBDCE9A6AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pasantia`
--

INSERT INTO `pasantia` (`id`, `territorio_aprendizaje_id`, `organizacion_id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre_pasantia`, `observaciones`, `aprobacion`, `fecha_inicio`, `fecha_finalizacion`, `fecha_inicio_propuesta`, `fecha_finalizacion_propuesta`, `aprobador`, `observacion`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'Pasantia de EJEMPLO', 'Esta pasantia es un inicio', NULL, NULL, NULL, '2016-06-09 00:00:00', '2016-06-03 00:00:00', NULL, NULL, 1, NULL, '2016-06-15 17:06:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasantia_soporte`
--

CREATE TABLE IF NOT EXISTS `pasantia_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasantia_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_774CD3EABB6D3273` (`pasantia_id`),
  KEY `IDX_774CD3EAE24646FA` (`tipo_soporte_id`),
  KEY `IDX_774CD3EADADD026` (`usuario_modificacion_id`),
  KEY `IDX_774CD3EAAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinador_feria`
--

CREATE TABLE IF NOT EXISTS `patrocinador_feria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feria` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_aportado` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_inversion`
--

CREATE TABLE IF NOT EXISTS `plan_inversion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seguimientoFase` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `actividad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad_medida` int(11) NOT NULL,
  `cantidad` decimal(10,0) NOT NULL,
  `valor_unitario` decimal(10,0) NOT NULL,
  `valor_total` decimal(10,0) NOT NULL,
  `tiempo_ejecucion` int(11) NOT NULL,
  `cantidad_visita1` decimal(10,0) NOT NULL,
  `valor_unitario_visita1` decimal(10,0) NOT NULL,
  `valor_total_visita1` decimal(10,0) NOT NULL,
  `tiempo_ejecucion_visita1` int(11) NOT NULL,
  `cantidad_visita2` decimal(10,0) NOT NULL,
  `valor_unitario_visita2` decimal(10,0) NOT NULL,
  `valor_total_visita2` decimal(10,0) NOT NULL,
  `tiempo_ejecucion_visita2` int(11) NOT NULL,
  `cantidad_visita3` decimal(10,0) NOT NULL,
  `valor_unitario_visita3` decimal(10,0) NOT NULL,
  `valor_total_visita3` decimal(10,0) NOT NULL,
  `tiempo_ejecucion_visita3` int(11) NOT NULL,
  `cumplio` tinyint(1) NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poasoporte`
--

CREATE TABLE IF NOT EXISTS `poasoporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poa_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1513E606BB18C0BA` (`poa_id`),
  KEY `IDX_1513E606E24646FA` (`tipo_soporte_id`),
  KEY `IDX_1513E606DADD026` (`usuario_modificacion_id`),
  KEY `IDX_1513E606AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza`
--

CREATE TABLE IF NOT EXISTS `poliza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `consecutivo` int(11) NOT NULL,
  `cofinanciacion` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_781134589C833003` (`grupo_id`),
  KEY `IDX_781134589F5A440B` (`estado_id`),
  KEY `IDX_78113458DADD026` (`usuario_modificacion_id`),
  KEY `IDX_78113458AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza_soporte`
--

CREATE TABLE IF NOT EXISTS `poliza_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poliza_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ADA8C8B9D5746945` (`poliza_id`),
  KEY `IDX_ADA8C8B9E24646FA` (`tipo_soporte_id`),
  KEY `IDX_ADA8C8B9DADD026` (`usuario_modificacion_id`),
  KEY `IDX_ADA8C8B9AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE IF NOT EXISTS `produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seguimiento_fase_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `periodicidad` int(11) DEFAULT NULL,
  `producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad_medida` int(11) NOT NULL,
  `cantidad_inicial` decimal(10,0) NOT NULL,
  `valor_inicial` decimal(10,0) NOT NULL,
  `cantidad_final` decimal(10,0) NOT NULL,
  `valor_final` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1E23DEC6308D77B2` (`seguimiento_fase_id`),
  KEY `IDX_1E23DEC6DADD026` (`usuario_modificacion_id`),
  KEY `IDX_1E23DEC6AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_capacitacion_financiera`
--

CREATE TABLE IF NOT EXISTS `programa_capacitacion_financiera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `talento_financiero_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_66386F135775952` (`talento_financiero_id`),
  KEY `IDX_66386F19F5A440B` (`estado_id`),
  KEY `IDX_66386F158BC1BE0` (`municipio_id`),
  KEY `IDX_66386F1DADD026` (`usuario_modificacion_id`),
  KEY `IDX_66386F1AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_capacitacion_financiera_soporte`
--

CREATE TABLE IF NOT EXISTS `programa_capacitacion_financiera_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programa_capacitacion_financiera_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AF4898F36B25D3FE` (`programa_capacitacion_financiera_id`),
  KEY `IDX_AF4898F3E24646FA` (`tipo_soporte_id`),
  KEY `IDX_AF4898F3DADD026` (`usuario_modificacion_id`),
  KEY `IDX_AF4898F3AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `territorio_aprendizaje_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre_ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aprobacion` tinyint(1) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `fecha_inicio_propuesta` datetime DEFAULT NULL,
  `fecha_finalizacion_propuesta` datetime DEFAULT NULL,
  `aprobador` int(11) DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C3AEF08C1281CB4C` (`territorio_aprendizaje_id`),
  KEY `IDX_C3AEF08C9C833003` (`grupo_id`),
  KEY `IDX_C3AEF08CDADD026` (`usuario_modificacion_id`),
  KEY `IDX_C3AEF08CAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id`, `territorio_aprendizaje_id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre_ruta`, `observaciones`, `aprobacion`, `fecha_inicio`, `fecha_finalizacion`, `fecha_inicio_propuesta`, `fecha_finalizacion_propuesta`, `aprobador`, `observacion`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, NULL, NULL, 'Ruta de EJEMPLO', 'A', NULL, NULL, NULL, '2016-06-10 00:00:00', '2016-06-15 00:00:00', NULL, NULL, 1, NULL, '2016-06-15 18:20:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_soporte`
--

CREATE TABLE IF NOT EXISTS `ruta_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9B269362ABBC4845` (`ruta_id`),
  KEY `IDX_9B269362E24646FA` (`tipo_soporte_id`),
  KEY `IDX_9B269362DADD026` (`usuario_modificacion_id`),
  KEY `IDX_9B269362AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_beneficiario_ahorro`
--

CREATE TABLE IF NOT EXISTS `seguimiento_beneficiario_ahorro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asignacion_beneficiario_ahorro_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  KEY `IDX_4D0FDEBD22507D80` (`asignacion_beneficiario_ahorro_id`),
  KEY `IDX_4D0FDEBDDADD026` (`usuario_modificacion_id`),
  KEY `IDX_4D0FDEBDAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_fase`
--

CREATE TABLE IF NOT EXISTS `seguimiento_fase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fase` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `actividad_productiva` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_actividad_productiva` longtext COLLATE utf8_unicode_ci NOT NULL,
  `logros` longtext COLLATE utf8_unicode_ci,
  `resultado_componente_organizacional` longtext COLLATE utf8_unicode_ci,
  `resultado_componente_productivo` longtext COLLATE utf8_unicode_ci,
  `resultado_componente_comercial` longtext COLLATE utf8_unicode_ci,
  `resultado_componente_administrativo` longtext COLLATE utf8_unicode_ci,
  `resultado_componente_financiero` longtext COLLATE utf8_unicode_ci,
  `observaciones` longtext COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C0EF2E519C833003` (`grupo_id`),
  KEY `IDX_C0EF2E51DADD026` (`usuario_modificacion_id`),
  KEY `IDX_C0EF2E51AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `seguimiento_fase`
--

INSERT INTO `seguimiento_fase` (`id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fase`, `fecha_inicio`, `fecha_finalizacion`, `actividad_productiva`, `descripcion_actividad_productiva`, `logros`, `resultado_componente_organizacional`, `resultado_componente_productivo`, `resultado_componente_comercial`, `resultado_componente_administrativo`, `resultado_componente_financiero`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 4, NULL, NULL, 3, '2016-06-10 00:00:00', '2016-06-29 00:00:00', 'Gallinas de pelea', 'Pelea de Gallinas', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 1, '2016-06-28 22:18:50', '2016-06-28 22:14:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_grupo_soporte`
--

CREATE TABLE IF NOT EXISTS `seguimiento_grupo_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `nodo_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9469D5749C833003` (`grupo_id`),
  KEY `IDX_9469D57429B07FB3` (`nodo_id`),
  KEY `IDX_9469D574E24646FA` (`tipo_soporte_id`),
  KEY `IDX_9469D574DADD026` (`usuario_modificacion_id`),
  KEY `IDX_9469D574AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `seguimiento_grupo_soporte`
--

INSERT INTO `seguimiento_grupo_soporte` (`id`, `grupo_id`, `nodo_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 3, 26, 31, NULL, NULL, '7b3883a07205bc4c0cac839b37a4549296e1898c.png', 1, NULL, '2016-06-03 22:14:27'),
(2, 3, 26, 32, NULL, NULL, '9fe2955b98277fe90c11023c08ce2c2e7295bdf4.png', 1, NULL, '2016-06-03 22:14:40'),
(3, 3, 26, 33, NULL, NULL, '9023dfb8bb59c38f20cc937847feb674c67003cd.png', 1, NULL, '2016-06-03 22:14:48'),
(4, 3, 26, 34, NULL, NULL, '5c28a231b66c9f9fa7ec177841a2c3cdbcad1f9d.png', 1, NULL, '2016-06-03 22:14:57'),
(5, 4, 26, 31, NULL, NULL, '8c109c20fac18fd88492dfc17803d71fa6a627ca.pdf', 1, NULL, '2016-06-28 22:05:57'),
(6, 4, 26, 32, NULL, NULL, 'e36ca26481cd2259151ea80163f2da6a5cf2d101.pdf', 1, NULL, '2016-06-28 22:11:00'),
(7, 4, 26, 33, NULL, NULL, 'fee4cf1429dd1969bf12bcef2571a3c0ac71f4e0.pdf', 1, NULL, '2016-06-28 22:11:09'),
(8, 4, 26, 34, NULL, NULL, 'be800c61701e88906f4c9c95cb2de791a12f260d.pdf', 1, NULL, '2016-06-28 22:11:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_mot`
--

CREATE TABLE IF NOT EXISTS `seguimiento_mot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fase` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `indentificacion_recursos_tangibles` longtext COLLATE utf8_unicode_ci,
  `indentificacion_recursos_financieros` longtext COLLATE utf8_unicode_ci,
  `indentificacion_recursos_intangibles` longtext COLLATE utf8_unicode_ci,
  `indentificacion_opciones_viables` longtext COLLATE utf8_unicode_ci,
  `viabilidad_negocio` longtext COLLATE utf8_unicode_ci,
  `observaciones` longtext COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_569ADBF09C833003` (`grupo_id`),
  KEY `IDX_569ADBF0DADD026` (`usuario_modificacion_id`),
  KEY `IDX_569ADBF0AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `seguimiento_mot`
--

INSERT INTO `seguimiento_mot` (`id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fase`, `fecha_inicio`, `fecha_finalizacion`, `indentificacion_recursos_tangibles`, `indentificacion_recursos_financieros`, `indentificacion_recursos_intangibles`, `indentificacion_opciones_viables`, `viabilidad_negocio`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 4, NULL, NULL, 0, '2016-06-10 00:00:00', '2016-06-10 00:00:00', '500000', '500000', '5000000', '5000000', '5000000', 'El marranito quedo bien', 1, '2016-06-28 21:44:15', '2016-06-28 21:33:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talento`
--

CREATE TABLE IF NOT EXISTS `talento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `numero_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `edad_inscripcion` int(11) DEFAULT NULL,
  `joven_rural` tinyint(1) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rural` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corregimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vereda` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cacerio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talento_soporte`
--

CREATE TABLE IF NOT EXISTS `talento_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `talento_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_30E78B1CD13DD97` (`talento_id`),
  KEY `IDX_30E78B1E24646FA` (`tipo_soporte_id`),
  KEY `IDX_30E78B1DADD026` (`usuario_modificacion_id`),
  KEY `IDX_30E78B1AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE IF NOT EXISTS `taller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `objetivo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `agenda` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lugar` longtext COLLATE utf8_unicode_ci NOT NULL,
  `asistentes` int(11) DEFAULT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `compromisos` longtext COLLATE utf8_unicode_ci NOT NULL,
  `talento` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_139F45849C833003` (`grupo_id`),
  KEY `IDX_139F4584DADD026` (`usuario_modificacion_id`),
  KEY `IDX_139F4584AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha`, `objetivo`, `agenda`, `lugar`, `asistentes`, `observaciones`, `compromisos`, `talento`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 4, NULL, NULL, '2016-06-10 00:00:00', 'El marranito mas Gordito', 'Bañar al marranito \r\nMaquillar el marranito', 'Granja la aurora', 4, 'Gana el mas gordito', 'Que no se vea Palanca', NULL, 1, '2016-06-28 21:39:48', '2016-06-28 21:38:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_soporte`
--

CREATE TABLE IF NOT EXISTS `taller_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taller_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7C5D43816DC343EA` (`taller_id`),
  KEY `IDX_7C5D4381E24646FA` (`tipo_soporte_id`),
  KEY `IDX_7C5D4381DADD026` (`usuario_modificacion_id`),
  KEY `IDX_7C5D4381AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `taller_soporte`
--

INSERT INTO `taller_soporte` (`id`, `taller_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 24, NULL, NULL, 'e5f8f8e9fed02e73d5e3574725b5cae2afeff1d0.pdf', 1, NULL, '2016-06-28 21:38:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `territorio_aprendizaje`
--

CREATE TABLE IF NOT EXISTS `territorio_aprendizaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre_territorio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BEEEAF15DADD026` (`usuario_modificacion_id`),
  KEY `IDX_BEEEAF15AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `territorio_aprendizaje`
--

INSERT INTO `territorio_aprendizaje` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre_territorio`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'Territorio Aprendizaje 1', 'Buen territorio para el aprendizaje', 1, NULL, '2016-06-15 17:05:26');

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
  `municipio_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05D92FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_2265B05DA0D96FBF` (`email_canonical`),
  KEY `IDX_2265B05DF6939175` (`tipo_documento_id`),
  KEY `IDX_2265B05DDADD026` (`usuario_modificacion_id`),
  KEY `IDX_2265B05DAEADF654` (`usuario_creacion_id`),
  KEY `IDX_2265B05D58BC1BE0` (`municipio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `password`, `salt`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`, `tipo_documento_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `municipio_id`) VALUES
(1, '111111', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '', '', '', '', 0, NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '', '', NULL, '', NULL, NULL),
(2, '$2y$13$nug00bsypis8kgwsw0440euZuIkfQpFju5ZOdG7zPn/11McKD4rCm', 'nug00bsypis8kgwsw0440o0o0swgw04', '7031447', '3057129065', 's.cantor@rmcproducciones.com', 1, NULL, '2016-01-12 14:40:51', 1, NULL, NULL, 's.cantor', 's.cantor', 's.cantor@rmcproducciones.com', 's.cantor@rmcproducciones.com', 1, '2016-05-17 22:45:36', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022376577', 'cantor', 'forero', 'juan', 'sebastian', NULL),
(3, '$2y$13$mqri4n4dscg4s8wowoswgetXw8mtQ9h7rz94DZ.ew2lrvlQHtoqzW', 'mqri4n4dscg4s8wowoswgk004cgwogc', '1111111', '1234567897', 'juanc@hotmail.com', 1, NULL, '2016-01-29 17:29:49', 1, NULL, NULL, 'daniel', 'daniel', 'juanc@hotmail.com', 'juanc@hotmail.com', 1, '2016-01-29 18:06:10', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022376577', 'perez', 'bastidas', 'daniel', 'ricardo', NULL),
(4, '$2y$13$fd8601sw4vco0cw8gk0gsu5YDCNEro073Zr6GJ7M9zPfN2ctMGbIu', 'fd8601sw4vco0cw8gk0gs8o8k4s8k8g', '10001001', '10001001', 'marcela.cortes.fonseca@gmail.com', 1, NULL, '2016-02-22 20:18:36', 1, NULL, NULL, 'marcela', 'marcela', 'marcela.cortes.fonseca@gmail.com', 'marcela.cortes.fonseca@gmail.com', 1, '2016-02-23 15:36:35', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '52814557', 'Cortes', NULL, 'Marcela', NULL, NULL),
(5, '$2y$13$67yodttax68s0ows80o44eg0oU2e6D3QstOiOFuYA4k2fzJAaNN5G', '67yodttax68s0ows80o44skko0ccw44', '1000100', '1000100', 'jarocha53@ucatolica.edu.com', 1, NULL, '2016-02-22 21:05:36', 1, NULL, NULL, 'j.rocha', 'j.rocha', 'jarocha53@ucatolica.edu.com', 'jarocha53@ucatolica.edu.com', 1, '2016-02-22 21:05:37', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '79884089', 'Rocha', NULL, 'Jhony', NULL, NULL),
(6, '$2y$13$2zo4pz4ola2ow0o80s0kceANQhTO0Nw4QjMLpv4yUyPF8ecqHTG7C', '2zo4pz4ola2ow0o80s0kco00osk888o', '342342', '34234234', 'asdasd@asdasd.com', 1, NULL, '2016-03-15 15:09:53', 1, NULL, NULL, 'armandocasas', 'armandocasas', 'asdasd@asdasd.com', 'asdasd@asdasd.com', 1, '2016-03-15 15:48:34', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '123123', 'casas', 'armando', 'armando', 'armando', NULL),
(7, '$2y$13$7i5guui0my8sg8g04c4cseaBzpGoGFu2n/uGRv6LtJOOmHqeBRDlm', '7i5guui0my8sg8g04c4cso00g48480c', '3432423', '45345325', 'admin@correo.com', 1, NULL, '2016-05-06 13:47:08', 1, NULL, NULL, 'admin', 'admin', 'admin@correo.com', 'admin@correo.com', 1, '2016-05-25 18:47:15', 0, 0, NULL, NULL, NULL, 'a:2:{i:0;s:10:"ROLE_ADMIN";i:1;s:10:"ROLE_ADMIN";}', 0, NULL, '77777', 'admin', 'admin', 'admin', 'admin', NULL),
(8, '$2y$13$896qxybdoaskck80kk44oetX8FUhdHfNiOo3IRIdyAXR65FzuAEZG', '896qxybdoaskck80kk44ogowg44g400', '654364634', '5464564', 'coordinador@correo.com', 1, NULL, '2016-05-06 13:51:46', 1, NULL, NULL, 'coordinador', 'coordinador', 'coordinador@correo.com', 'coordinador@correo.com', 1, '2016-06-27 16:04:49', 0, 0, NULL, NULL, NULL, 'a:2:{i:0;s:16:"ROLE_COORDINADOR";i:1;s:16:"ROLE_COORDINADOR";}', 0, NULL, '435452', 'coordinador', 'coordinador', 'coordinador', 'coordinador', NULL),
(9, '$2y$13$hta12a098pkcsw0sgck4kuqV2HDXiQ0IMx.XzcQHMplVc1dXfv26m', 'hta12a098pkcsw0sgck4k40ww44sgsw', '4353535', '4535345', 'promotor@correo.com', 1, NULL, '2016-05-06 13:57:18', 1, NULL, NULL, 'promotor', 'promotor', 'promotor@correo.com', 'promotor@correo.com', 1, '2016-05-07 14:54:55', 0, 0, NULL, NULL, NULL, 'a:2:{i:0;s:13:"ROLE_PROMOTOR";i:1;s:13:"ROLE_PROMOTOR";}', 0, NULL, '3242424', 'promotor', 'promotor', 'promotor', 'promotor', NULL),
(10, '$2y$13$hbfo6c715wgg0k8gkwscoeG5f/ohVcDPEmjVhXfPg7iwew9dy81w6', 'hbfo6c715wgg0k8gkwscog8kg0kwo8c', '7031447', '3015794684', 's.cantor@rmcproducciones.om', 1, NULL, '2016-06-28 16:09:46', 1, NULL, NULL, 'administrador', 'administrador', 's.cantor@rmcproducciones.om', 's.cantor@rmcproducciones.om', 1, '2016-07-05 15:45:47', 0, 0, NULL, NULL, NULL, 'a:1:{s:5:"admin";s:10:"ROLE_ADMIN";}', 0, NULL, '1022376577', 'Cantor', NULL, 'Sebastian', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seguimiento_fase_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `periodicidad` int(11) DEFAULT NULL,
  `producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad_medida` int(11) NOT NULL,
  `valor_unitario_inicial` decimal(10,0) NOT NULL,
  `cantidad_vendida_inicial` decimal(10,0) NOT NULL,
  `valor_ventas_inicial` decimal(10,0) NOT NULL,
  `cantidad_consumo_inicial` decimal(10,0) NOT NULL,
  `valor_unitario_final` decimal(10,0) NOT NULL,
  `cantidad_vendida_final` decimal(10,0) NOT NULL,
  `valor_ventas_final` decimal(10,0) NOT NULL,
  `cantidad_consumo_final` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_808D9E308D77B2` (`seguimiento_fase_id`),
  KEY `IDX_808D9EDADD026` (`usuario_modificacion_id`),
  KEY `IDX_808D9EAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `seguimiento_fase_id` int(11) DEFAULT NULL,
  `nodo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `objetivo` longtext COLLATE utf8_unicode_ci,
  `agenda` longtext COLLATE utf8_unicode_ci,
  `lugar` longtext COLLATE utf8_unicode_ci,
  `asistentes` int(11) DEFAULT NULL,
  `comite_compras` tinyint(1) DEFAULT NULL,
  `funcionamiento_comite_compras` int(11) DEFAULT NULL,
  `comite_vamos_bien` tinyint(1) DEFAULT NULL,
  `funcionamiento_comite_vamos_bien` int(11) DEFAULT NULL,
  `logros_compras` longtext COLLATE utf8_unicode_ci,
  `logros_vamos_bien` longtext COLLATE utf8_unicode_ci,
  `contador` tinyint(1) DEFAULT NULL,
  `desempeno_contador` int(11) DEFAULT NULL,
  `observaciones_contador` longtext COLLATE utf8_unicode_ci,
  `observaciones_presupuesto_asignado` longtext COLLATE utf8_unicode_ci,
  `cambios_presupuesto_asignado` tinyint(1) DEFAULT NULL,
  `cambios_razones_presupuesto_asignado` longtext COLLATE utf8_unicode_ci,
  `desempeno_organizacional` longtext COLLATE utf8_unicode_ci,
  `desempeno_productivo` longtext COLLATE utf8_unicode_ci,
  `desempeno_comercial` longtext COLLATE utf8_unicode_ci,
  `desempeno_administrativo` longtext COLLATE utf8_unicode_ci,
  `desempeno_financiero` longtext COLLATE utf8_unicode_ci,
  `cambios_integrantes_grupo` tinyint(1) DEFAULT NULL,
  `cambios_razones_integrantes_grupo` longtext COLLATE utf8_unicode_ci,
  `observaciones` longtext COLLATE utf8_unicode_ci,
  `compromisos` longtext COLLATE utf8_unicode_ci,
  `interventoria` tinyint(1) DEFAULT NULL,
  `razones_interventoria` longtext COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B7F148A29C833003` (`grupo_id`),
  KEY `IDX_B7F148A2308D77B2` (`seguimiento_fase_id`),
  KEY `IDX_B7F148A229B07FB3` (`nodo_id`),
  KEY `IDX_B7F148A2DADD026` (`usuario_modificacion_id`),
  KEY `IDX_B7F148A2AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id`, `grupo_id`, `seguimiento_fase_id`, `nodo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha`, `objetivo`, `agenda`, `lugar`, `asistentes`, `comite_compras`, `funcionamiento_comite_compras`, `comite_vamos_bien`, `funcionamiento_comite_vamos_bien`, `logros_compras`, `logros_vamos_bien`, `contador`, `desempeno_contador`, `observaciones_contador`, `observaciones_presupuesto_asignado`, `cambios_presupuesto_asignado`, `cambios_razones_presupuesto_asignado`, `desempeno_organizacional`, `desempeno_productivo`, `desempeno_comercial`, `desempeno_administrativo`, `desempeno_financiero`, `cambios_integrantes_grupo`, `cambios_razones_integrantes_grupo`, `observaciones`, `compromisos`, `interventoria`, `razones_interventoria`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 4, 1, 27, NULL, 1, '2016-06-23 00:00:00', 'Visualziar las gallinas', 'Visualziar las gallinas', 'Visualziar las gallinas', 23, 1, NULL, 1, NULL, 'Visualziar las gallinas', 'Visualziar las gallinas', 1, NULL, 'Visualziar las gallinas', NULL, 0, NULL, 'Visualziar las gallinas', 'Visualziar las gallinas', 'Visualziar las gallinas', 'Visualziar las gallinas', 'Visualziar las gallinas', 0, NULL, 'Visualziar las gallinas', 'Visualziar las gallinas', 0, NULL, 1, NULL, '2016-06-28 22:16:38'),
(2, 4, 1, 28, NULL, 1, '2016-06-11 00:00:00', 'Visualziar las gallinas', 'Visualziar las gallinas', 'Visualziar las gallinas', 0, 1, NULL, 1, NULL, 'Visualziar las gallinas', 'Visualziar las gallinas', 1, NULL, 'Visualziar las gallinas', NULL, 0, NULL, 'Visualziar las gallinas', 'Visualziar las gallinas', 'Visualziar las gallinas', 'Visualziar las gallinas', 'Visualziar las gallinas', 0, NULL, 'Visualziar las gallinas', 'Visualziar las gallinas', 0, NULL, 1, NULL, '2016-06-28 22:17:14'),
(3, 4, 1, 29, NULL, 1, '2016-06-24 00:00:00', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 23, 1, NULL, 1, NULL, 'La Cochera de los amrranos', 'La Cochera de los amrranos', 1, NULL, 'La Cochera de los amrranos', NULL, 0, NULL, 'La Cochera de los amrranos', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 'La Cochera de los amrranos', 0, NULL, 'La Cochera de los amrranos', 'La Cochera de los amrranos', 0, NULL, 1, NULL, '2016-06-28 22:18:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita_soporte`
--

CREATE TABLE IF NOT EXISTS `visita_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `nodo_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_95CA1EEC9C833003` (`grupo_id`),
  KEY `IDX_95CA1EEC29B07FB3` (`nodo_id`),
  KEY `IDX_95CA1EECE24646FA` (`tipo_soporte_id`),
  KEY `IDX_95CA1EECDADD026` (`usuario_modificacion_id`),
  KEY `IDX_95CA1EECAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
-- Filtros para la tabla `actividad_concurso`
--
ALTER TABLE `actividad_concurso`
  ADD CONSTRAINT `FK_39B94E8CAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_39B94E8CDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_39B94E8CF415D168` FOREIGN KEY (`concurso_id`) REFERENCES `concurso` (`id`);

--
-- Filtros para la tabla `actividad_soporte`
--
ALTER TABLE `actividad_soporte`
  ADD CONSTRAINT `FK_E08E306D6014FACA` FOREIGN KEY (`actividad_id`) REFERENCES `actividad_concurso` (`id`),
  ADD CONSTRAINT `FK_E08E306DAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E08E306DDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E08E306DE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `activos`
--
ALTER TABLE `activos`
  ADD CONSTRAINT `FK_FA45851308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_FA45851AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FA45851DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `ahorro`
--
ALTER TABLE `ahorro`
  ADD CONSTRAINT `FK_2F1C7D069C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_2F1C7D069F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `ahorro_soporte`
--
ALTER TABLE `ahorro_soporte`
  ADD CONSTRAINT `FK_A3A19E2AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A3A19E2DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A3A19E2E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`),
  ADD CONSTRAINT `FK_A3A19E2EC5CE259` FOREIGN KEY (`ahorro_id`) REFERENCES `ahorro` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_ahorro`
--
ALTER TABLE `asignacion_beneficiario_ahorro`
  ADD CONSTRAINT `FK_31D70FA34B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_31D70FA3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_31D70FA3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_31D70FA3EC5CE259` FOREIGN KEY (`ahorro_id`) REFERENCES `ahorro` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_comite_compras`
--
ALTER TABLE `asignacion_beneficiario_comite_compras`
  ADD CONSTRAINT `FK_66EBC8D14B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_66EBC8D19C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_66EBC8D1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_66EBC8D1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_comite_vamos_bien`
--
ALTER TABLE `asignacion_beneficiario_comite_vamos_bien`
  ADD CONSTRAINT `FK_174C5B764B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_174C5B769C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_174C5B76AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_174C5B76DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_estructura_organizacional`
--
ALTER TABLE `asignacion_beneficiario_estructura_organizacional`
  ADD CONSTRAINT `FK_DF11E8084B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_DF11E8084BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_DF11E8089C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_DF11E808AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_DF11E808DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_poliza`
--
ALTER TABLE `asignacion_beneficiario_poliza`
  ADD CONSTRAINT `FK_66DA46FD4B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_66DA46FDAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_66DA46FDD5746945` FOREIGN KEY (`poliza_id`) REFERENCES `poliza` (`id`),
  ADD CONSTRAINT `FK_66DA46FDDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_programa_capacitacion_financiera`
--
ALTER TABLE `asignacion_beneficiario_programa_capacitacion_financiera`
  ADD CONSTRAINT `FK_D8FF37414B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_D8FF37416B25D3FE` FOREIGN KEY (`programa_capacitacion_financiera_id`) REFERENCES `programa_capacitacion_financiera` (`id`),
  ADD CONSTRAINT `FK_D8FF3741AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D8FF3741DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D8FF3741F6F50196` FOREIGN KEY (`participante_id`) REFERENCES `participante` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_taller`
--
ALTER TABLE `asignacion_beneficiario_taller`
  ADD CONSTRAINT `FK_D5437214B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_D5437216DC343EA` FOREIGN KEY (`taller_id`) REFERENCES `taller` (`id`),
  ADD CONSTRAINT `FK_D5437219C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_D543721AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D543721DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_visitas`
--
ALTER TABLE `asignacion_beneficiario_visitas`
  ADD CONSTRAINT `FK_85C3609229B07FB3` FOREIGN KEY (`nodo_id`) REFERENCES `nodo` (`id`),
  ADD CONSTRAINT `FK_85C360924B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_85C360929C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_85C36092AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_85C36092DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_contador_grupo`
--
ALTER TABLE `asignacion_contador_grupo`
  ADD CONSTRAINT `FK_F432D0339C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_F432D033AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_F432D033C31645C0` FOREIGN KEY (`contador_id`) REFERENCES `contador` (`id`),
  ADD CONSTRAINT `FK_F432D033DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_beneficiario_pasantia`
--
ALTER TABLE `asignacion_grupo_beneficiario_pasantia`
  ADD CONSTRAINT `FK_62E864EE4B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_62E864EEAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_62E864EEBB6D3273` FOREIGN KEY (`pasantia_id`) REFERENCES `pasantia` (`id`),
  ADD CONSTRAINT `FK_62E864EEDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_beneficiario_ruta`
--
ALTER TABLE `asignacion_grupo_beneficiario_ruta`
  ADD CONSTRAINT `FK_9C201DDB4B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_9C201DDBABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_9C201DDBAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9C201DDBDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_clear`
--
ALTER TABLE `asignacion_grupo_clear`
  ADD CONSTRAINT `FK_2858D49C9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_2858D49CAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_2858D49CD30DEA81` FOREIGN KEY (`clear_id`) REFERENCES `clear` (`id`),
  ADD CONSTRAINT `FK_2858D49CDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_comite`
--
ALTER TABLE `asignacion_grupo_comite`
  ADD CONSTRAINT `FK_CC1659E09C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_CC1659E0AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CC1659E0D61C3573` FOREIGN KEY (`comite_id`) REFERENCES `comite` (`id`),
  ADD CONSTRAINT `FK_CC1659E0DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_concurso`
--
ALTER TABLE `asignacion_grupo_concurso`
  ADD CONSTRAINT `FK_B9FE2A369C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_B9FE2A36AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B9FE2A36DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B9FE2A36F415D168` FOREIGN KEY (`concurso_id`) REFERENCES `concurso` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_pasantia`
--
ALTER TABLE `asignacion_grupo_pasantia`
  ADD CONSTRAINT `FK_A7D5E769C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_A7D5E76AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A7D5E76BB6D3273` FOREIGN KEY (`pasantia_id`) REFERENCES `pasantia` (`id`),
  ADD CONSTRAINT `FK_A7D5E76DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_ruta`
--
ALTER TABLE `asignacion_grupo_ruta`
  ADD CONSTRAINT `FK_FD8DF9799C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_FD8DF979ABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_FD8DF979AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FD8DF979DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_integrante_clear`
--
ALTER TABLE `asignacion_integrante_clear`
  ADD CONSTRAINT `FK_ECDABF1F4BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_ECDABF1F6EA6C980` FOREIGN KEY (`integrante_id`) REFERENCES `integrante` (`id`),
  ADD CONSTRAINT `FK_ECDABF1FAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_ECDABF1FD30DEA81` FOREIGN KEY (`clear_id`) REFERENCES `clear` (`id`),
  ADD CONSTRAINT `FK_ECDABF1FDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_integrante_comite`
--
ALTER TABLE `asignacion_integrante_comite`
  ADD CONSTRAINT `FK_B86309114BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_B86309116EA6C980` FOREIGN KEY (`integrante_id`) REFERENCES `integrante` (`id`),
  ADD CONSTRAINT `FK_B8630911AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B8630911D61C3573` FOREIGN KEY (`comite_id`) REFERENCES `comite` (`id`),
  ADD CONSTRAINT `FK_B8630911DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_integrante_concurso`
--
ALTER TABLE `asignacion_integrante_concurso`
  ADD CONSTRAINT `FK_DF32DF4BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_DF32DF4B4BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_DF32DF4B6EA6C980` FOREIGN KEY (`integrante_id`) REFERENCES `integrante` (`id`),
  ADD CONSTRAINT `FK_DF32DF4BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_DF32DF4BF415D168` FOREIGN KEY (`concurso_id`) REFERENCES `concurso` (`id`);

--
-- Filtros para la tabla `asignacion_organizacion_pasantia`
--
ALTER TABLE `asignacion_organizacion_pasantia`
  ADD CONSTRAINT `FK_27E7E2A390B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_27E7E2A3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_27E7E2A3BB6D3273` FOREIGN KEY (`pasantia_id`) REFERENCES `pasantia` (`id`),
  ADD CONSTRAINT `FK_27E7E2A3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_organizacion_ruta`
--
ALTER TABLE `asignacion_organizacion_ruta`
  ADD CONSTRAINT `FK_A4DB9F4390B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_A4DB9F43ABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_A4DB9F43AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A4DB9F43DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_organizacion_territorio_aprendizaje`
--
ALTER TABLE `asignacion_organizacion_territorio_aprendizaje`
  ADD CONSTRAINT `FK_9510DDB11281CB4C` FOREIGN KEY (`territorio_aprendizaje_id`) REFERENCES `territorio_aprendizaje` (`id`),
  ADD CONSTRAINT `FK_9510DDB190B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_9510DDB1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9510DDB1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_talento_seguimiento_fase`
--
ALTER TABLE `asignacion_talento_seguimiento_fase`
  ADD CONSTRAINT `FK_D15A7A4F308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_D15A7A4FA193D038` FOREIGN KEY (`seguimiento_mot_id`) REFERENCES `seguimiento_mot` (`id`),
  ADD CONSTRAINT `FK_D15A7A4FAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D15A7A4FCD13DD97` FOREIGN KEY (`talento_id`) REFERENCES `talento` (`id`),
  ADD CONSTRAINT `FK_D15A7A4FDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_usuario_beca`
--
ALTER TABLE `asignacion_usuario_beca`
  ADD CONSTRAINT `FK_FF79C6A31D749D82` FOREIGN KEY (`beca_id`) REFERENCES `beca` (`id`),
  ADD CONSTRAINT `FK_FF79C6A39F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_FF79C6A3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FF79C6A3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FF79C6A3DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_usuario_capacitacion`
--
ALTER TABLE `asignacion_usuario_capacitacion`
  ADD CONSTRAINT `FK_BDD027055B587DA` FOREIGN KEY (`capacitacion_id`) REFERENCES `capacitacion` (`id`),
  ADD CONSTRAINT `FK_BDD027059F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_BDD02705AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_BDD02705DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_BDD02705DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_usuario_evento`
--
ALTER TABLE `asignacion_usuario_evento`
  ADD CONSTRAINT `FK_34D8601987A5F842` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`),
  ADD CONSTRAINT `FK_34D86019AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
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
-- Filtros para la tabla `beca_soporte`
--
ALTER TABLE `beca_soporte`
  ADD CONSTRAINT `FK_FCBA20C41D749D82` FOREIGN KEY (`beca_id`) REFERENCES `beca` (`id`),
  ADD CONSTRAINT `FK_FCBA20C4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FCBA20C4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FCBA20C4E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `FK_E8D0B61713DA6592` FOREIGN KEY (`discapacidad_id`) REFERENCES `listas` (`id`),
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
-- Filtros para la tabla `beneficiario_soporte`
--
ALTER TABLE `beneficiario_soporte`
  ADD CONSTRAINT `FK_492E09224B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_492E0922AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_492E0922DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_492E0922E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `calificacion_criterio_grupo_concurso`
--
ALTER TABLE `calificacion_criterio_grupo_concurso`
  ADD CONSTRAINT `FK_FA6CB6BD9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_FA6CB6BDB9595895` FOREIGN KEY (`criterio_calificacion_id`) REFERENCES `criterio_calificacion` (`id`),
  ADD CONSTRAINT `FK_FA6CB6BDF415D168` FOREIGN KEY (`concurso_id`) REFERENCES `concurso` (`id`);

--
-- Filtros para la tabla `calificacion_experiencia_exitosa`
--
ALTER TABLE `calificacion_experiencia_exitosa`
  ADD CONSTRAINT `FK_46C93B57AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_46C93B57D327D072` FOREIGN KEY (`experiencia_exitosa_id`) REFERENCES `experiencia_exitosa` (`id`),
  ADD CONSTRAINT `FK_46C93B57DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `camino`
--
ALTER TABLE `camino`
  ADD CONSTRAINT `FK_33C9673B29B07FB3` FOREIGN KEY (`nodo_id`) REFERENCES `nodo` (`id`),
  ADD CONSTRAINT `FK_33C9673B9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_33C9673BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_33C9673BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

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
  ADD CONSTRAINT `FK_16AFBD3A6B25D3FE` FOREIGN KEY (`programa_capacitacion_financiera_id`) REFERENCES `programa_capacitacion_financiera` (`id`),
  ADD CONSTRAINT `FK_16AFBD3A9F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_16AFBD3AAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_16AFBD3ADADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `capacitacion_financiera_soporte`
--
ALTER TABLE `capacitacion_financiera_soporte`
  ADD CONSTRAINT `FK_242A7B7758BFCBEC` FOREIGN KEY (`capacitacion_financiera_id`) REFERENCES `capacitacion_financiera` (`id`),
  ADD CONSTRAINT `FK_242A7B77AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_242A7B77DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_242A7B77E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `capacitacion_soporte`
--
ALTER TABLE `capacitacion_soporte`
  ADD CONSTRAINT `FK_D90B771B5B587DA` FOREIGN KEY (`capacitacion_id`) REFERENCES `capacitacion` (`id`),
  ADD CONSTRAINT `FK_D90B771BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D90B771BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D90B771BE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `clear`
--
ALTER TABLE `clear`
  ADD CONSTRAINT `FK_E5B1F10658BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_E5B1F106AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E5B1F106DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `clear_soporte`
--
ALTER TABLE `clear_soporte`
  ADD CONSTRAINT `FK_43AB6B2EAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_43AB6B2ED30DEA81` FOREIGN KEY (`clear_id`) REFERENCES `clear` (`id`),
  ADD CONSTRAINT `FK_43AB6B2EDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_43AB6B2EE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `comite`
--
ALTER TABLE `comite`
  ADD CONSTRAINT `FK_DC01CA9F58BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_DC01CA9FAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_DC01CA9FDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `comite_soporte`
--
ALTER TABLE `comite_soporte`
  ADD CONSTRAINT `FK_6FFBFCDEAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_6FFBFCDED61C3573` FOREIGN KEY (`comite_id`) REFERENCES `comite` (`id`),
  ADD CONSTRAINT `FK_6FFBFCDEDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_6FFBFCDEE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `concurso`
--
ALTER TABLE `concurso`
  ADD CONSTRAINT `FK_785F9DE61E092B9F` FOREIGN KEY (`modalidad_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_785F9DE6A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_785F9DE6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_785F9DE6DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `concurso_soporte`
--
ALTER TABLE `concurso_soporte`
  ADD CONSTRAINT `FK_89B5F18DAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_89B5F18DDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_89B5F18DE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`),
  ADD CONSTRAINT `FK_89B5F18DF415D168` FOREIGN KEY (`concurso_id`) REFERENCES `concurso` (`id`);

--
-- Filtros para la tabla `contador`
--
ALTER TABLE `contador`
  ADD CONSTRAINT `FK_E83EF8FAAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E83EF8FABCE7B795` FOREIGN KEY (`genero_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E83EF8FADADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E83EF8FAF6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `contador_soporte`
--
ALTER TABLE `contador_soporte`
  ADD CONSTRAINT `FK_69814D44AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_69814D44C31645C0` FOREIGN KEY (`contador_id`) REFERENCES `contador` (`id`),
  ADD CONSTRAINT `FK_69814D44DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_69814D44E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD CONSTRAINT `FK_6D773021AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_6D773021BB18C0BA` FOREIGN KEY (`poa_id`) REFERENCES `poa` (`id`),
  ADD CONSTRAINT `FK_6D773021DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `convocatoria_soporte`
--
ALTER TABLE `convocatoria_soporte`
  ADD CONSTRAINT `FK_9C5592A44EE93BE6` FOREIGN KEY (`convocatoria_id`) REFERENCES `convocatoria` (`id`),
  ADD CONSTRAINT `FK_9C5592A4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9C5592A4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9C5592A4E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `criterio_calificacion`
--
ALTER TABLE `criterio_calificacion`
  ADD CONSTRAINT `FK_C5ADD4C2F415D168` FOREIGN KEY (`concurso_id`) REFERENCES `concurso` (`id`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `FK_40E497EBAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_40E497EBDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `diagnostico_organizacional`
--
ALTER TABLE `diagnostico_organizacional`
  ADD CONSTRAINT `FK_80B0ADF49C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_80B0ADF4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_80B0ADF4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `distribucion_premio`
--
ALTER TABLE `distribucion_premio`
  ADD CONSTRAINT `FK_FF5D91EA9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_FF5D91EAF415D168` FOREIGN KEY (`concurso_id`) REFERENCES `concurso` (`id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_D9D9BF52308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_D9D9BF52AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D9D9BF52DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `evaluacion_fases`
--
ALTER TABLE `evaluacion_fases`
  ADD CONSTRAINT `FK_D47E6B9B9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_D47E6B9BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D47E6B9BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `evaluacion_fases_soporte`
--
ALTER TABLE `evaluacion_fases_soporte`
  ADD CONSTRAINT `FK_C069DE2B4D525882` FOREIGN KEY (`evaluacionfases_id`) REFERENCES `evaluacion_fases` (`id`),
  ADD CONSTRAINT `FK_C069DE2BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C069DE2BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C069DE2BE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_47860B0558BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_47860B05A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_47860B05AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_47860B05DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `evento_soporte`
--
ALTER TABLE `evento_soporte`
  ADD CONSTRAINT `FK_1EB2F2B987A5F842` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`),
  ADD CONSTRAINT `FK_1EB2F2B9AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_1EB2F2B9DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_1EB2F2B9E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `experiencia_exitosa`
--
ALTER TABLE `experiencia_exitosa`
  ADD CONSTRAINT `FK_380325B19C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_380325B1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_380325B1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `experiencia_exitosa_soporte`
--
ALTER TABLE `experiencia_exitosa_soporte`
  ADD CONSTRAINT `FK_E6739A508541B0D4` FOREIGN KEY (`experienciaexitosa_id`) REFERENCES `experiencia_exitosa` (`id`),
  ADD CONSTRAINT `FK_E6739A50AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E6739A50DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E6739A50E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `feria`
--
ALTER TABLE `feria`
  ADD CONSTRAINT `FK_5574FDF58BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_5574FDFA9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `feria_soporte`
--
ALTER TABLE `feria_soporte`
  ADD CONSTRAINT `FK_C27A0DA4627A20A5` FOREIGN KEY (`feria_id`) REFERENCES `feria` (`id`),
  ADD CONSTRAINT `FK_C27A0DA4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C27A0DA4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C27A0DA4E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

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
  ADD CONSTRAINT `FK_5D2EB461E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `habilitacion_fases`
--
ALTER TABLE `habilitacion_fases`
  ADD CONSTRAINT `FK_87643E129C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_87643E12AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_87643E12DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `integrante`
--
ALTER TABLE `integrante`
  ADD CONSTRAINT `FK_8AF632F6378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8AF632F6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_8AF632F6BCE7B795` FOREIGN KEY (`genero_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8AF632F6DA995DEC` FOREIGN KEY (`pertenencia_etnica_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8AF632F6DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_8AF632F6F6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `integrante_soporte`
--
ALTER TABLE `integrante_soporte`
  ADD CONSTRAINT `FK_480A203A6EA6C980` FOREIGN KEY (`integrante_id`) REFERENCES `integrante` (`id`),
  ADD CONSTRAINT `FK_480A203AAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_480A203ADADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_480A203AE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

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
-- Filtros para la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD CONSTRAINT `FK_C200C5A51BE510C` FOREIGN KEY (`tipo_documento_contacto_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C200C5A58BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_C200C5A63273AB8` FOREIGN KEY (`linea_productiva_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C200C5AAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C200C5ADADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `organizacion_pasantia`
--
ALTER TABLE `organizacion_pasantia`
  ADD CONSTRAINT `FK_EDB08B8690B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_EDB08B86AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_EDB08B86BB6D3273` FOREIGN KEY (`pasantia_id`) REFERENCES `pasantia` (`id`),
  ADD CONSTRAINT `FK_EDB08B86DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `organizacion_ruta`
--
ALTER TABLE `organizacion_ruta`
  ADD CONSTRAINT `FK_3206E1A990B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_3206E1A9ABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_3206E1A9AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_3206E1A9DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `organizacion_soporte`
--
ALTER TABLE `organizacion_soporte`
  ADD CONSTRAINT `FK_B775B6F690B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_B775B6F6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B775B6F6DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B775B6F6E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `organizacion_territorio_aprendizaje`
--
ALTER TABLE `organizacion_territorio_aprendizaje`
  ADD CONSTRAINT `FK_5E54DCC51281CB4C` FOREIGN KEY (`territorio_aprendizaje_id`) REFERENCES `territorio_aprendizaje` (`id`),
  ADD CONSTRAINT `FK_5E54DCC590B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_5E54DCC5AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_5E54DCC5DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `FK_85BDC5C313DA6592` FOREIGN KEY (`discapacidad_id`) REFERENCES `listas` (`id`),
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
-- Filtros para la tabla `pasantia`
--
ALTER TABLE `pasantia`
  ADD CONSTRAINT `FK_CBDCE9A61281CB4C` FOREIGN KEY (`territorio_aprendizaje_id`) REFERENCES `territorio_aprendizaje` (`id`),
  ADD CONSTRAINT `FK_CBDCE9A690B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_CBDCE9A69C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_CBDCE9A6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CBDCE9A6DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `pasantia_soporte`
--
ALTER TABLE `pasantia_soporte`
  ADD CONSTRAINT `FK_774CD3EAAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_774CD3EABB6D3273` FOREIGN KEY (`pasantia_id`) REFERENCES `pasantia` (`id`),
  ADD CONSTRAINT `FK_774CD3EADADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_774CD3EAE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `poa`
--
ALTER TABLE `poa`
  ADD CONSTRAINT `FK_736097E4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_736097E4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `poasoporte`
--
ALTER TABLE `poasoporte`
  ADD CONSTRAINT `FK_1513E606AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_1513E606BB18C0BA` FOREIGN KEY (`poa_id`) REFERENCES `poa` (`id`),
  ADD CONSTRAINT `FK_1513E606DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_1513E606E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `poliza`
--
ALTER TABLE `poliza`
  ADD CONSTRAINT `FK_781134589C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_781134589F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_78113458AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_78113458DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `poliza_soporte`
--
ALTER TABLE `poliza_soporte`
  ADD CONSTRAINT `FK_ADA8C8B9AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_ADA8C8B9D5746945` FOREIGN KEY (`poliza_id`) REFERENCES `poliza` (`id`),
  ADD CONSTRAINT `FK_ADA8C8B9DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_ADA8C8B9E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD CONSTRAINT `FK_1E23DEC6308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_1E23DEC6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_1E23DEC6DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `programa_capacitacion_financiera`
--
ALTER TABLE `programa_capacitacion_financiera`
  ADD CONSTRAINT `FK_66386F135775952` FOREIGN KEY (`talento_financiero_id`) REFERENCES `talento` (`id`),
  ADD CONSTRAINT `FK_66386F158BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_66386F19F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_66386F1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_66386F1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `programa_capacitacion_financiera_soporte`
--
ALTER TABLE `programa_capacitacion_financiera_soporte`
  ADD CONSTRAINT `FK_AF4898F36B25D3FE` FOREIGN KEY (`programa_capacitacion_financiera_id`) REFERENCES `programa_capacitacion_financiera` (`id`),
  ADD CONSTRAINT `FK_AF4898F3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_AF4898F3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_AF4898F3E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `FK_E553F37AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E553F37DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `FK_C3AEF08C1281CB4C` FOREIGN KEY (`territorio_aprendizaje_id`) REFERENCES `territorio_aprendizaje` (`id`),
  ADD CONSTRAINT `FK_C3AEF08C9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_C3AEF08CAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C3AEF08CDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `ruta_soporte`
--
ALTER TABLE `ruta_soporte`
  ADD CONSTRAINT `FK_9B269362ABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_9B269362AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9B269362DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9B269362E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `seguimiento_beneficiario_ahorro`
--
ALTER TABLE `seguimiento_beneficiario_ahorro`
  ADD CONSTRAINT `FK_4D0FDEBD22507D80` FOREIGN KEY (`asignacion_beneficiario_ahorro_id`) REFERENCES `asignacion_beneficiario_ahorro` (`id`),
  ADD CONSTRAINT `FK_4D0FDEBDAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_4D0FDEBDDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `seguimiento_fase`
--
ALTER TABLE `seguimiento_fase`
  ADD CONSTRAINT `FK_C0EF2E519C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_C0EF2E51AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C0EF2E51DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `seguimiento_grupo_soporte`
--
ALTER TABLE `seguimiento_grupo_soporte`
  ADD CONSTRAINT `FK_9469D57429B07FB3` FOREIGN KEY (`nodo_id`) REFERENCES `nodo` (`id`),
  ADD CONSTRAINT `FK_9469D5749C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_9469D574AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9469D574DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9469D574E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `seguimiento_mot`
--
ALTER TABLE `seguimiento_mot`
  ADD CONSTRAINT `FK_569ADBF09C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_569ADBF0AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_569ADBF0DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

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
-- Filtros para la tabla `talento_soporte`
--
ALTER TABLE `talento_soporte`
  ADD CONSTRAINT `FK_30E78B1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_30E78B1CD13DD97` FOREIGN KEY (`talento_id`) REFERENCES `talento` (`id`),
  ADD CONSTRAINT `FK_30E78B1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_30E78B1E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `taller`
--
ALTER TABLE `taller`
  ADD CONSTRAINT `FK_139F45849C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_139F4584AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_139F4584DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `taller_soporte`
--
ALTER TABLE `taller_soporte`
  ADD CONSTRAINT `FK_7C5D43816DC343EA` FOREIGN KEY (`taller_id`) REFERENCES `taller` (`id`),
  ADD CONSTRAINT `FK_7C5D4381AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_7C5D4381DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_7C5D4381E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `territorio_aprendizaje`
--
ALTER TABLE `territorio_aprendizaje`
  ADD CONSTRAINT `FK_BEEEAF15AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_BEEEAF15DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_2265B05D58BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_2265B05DAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_2265B05DDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_2265B05DF6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `FK_808D9E308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_808D9EAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_808D9EDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `FK_B7F148A229B07FB3` FOREIGN KEY (`nodo_id`) REFERENCES `nodo` (`id`),
  ADD CONSTRAINT `FK_B7F148A2308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_B7F148A29C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_B7F148A2AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B7F148A2DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `visita_soporte`
--
ALTER TABLE `visita_soporte`
  ADD CONSTRAINT `FK_95CA1EECAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_95CA1EEC29B07FB3` FOREIGN KEY (`nodo_id`) REFERENCES `nodo` (`id`),
  ADD CONSTRAINT `FK_95CA1EEC9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_95CA1EECDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_95CA1EECE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `FK_A786041EAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A786041EDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
