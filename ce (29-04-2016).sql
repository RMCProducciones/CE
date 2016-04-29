-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2016 a las 17:27:19
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
-- Estructura de tabla para la tabla `actividad_concurso`
--

CREATE TABLE `actividad_concurso` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `actividad_concurso`
--

INSERT INTO `actividad_concurso` (`id`, `concurso_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `actividad`, `mejoras`, `recursos`, `duracion`, `semana_inicio`, `semana_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, NULL, 'prueba1', 'as', 'asd', 1, 1, 1, 1, NULL, '2016-04-14 19:57:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_soporte`
--

CREATE TABLE `actividad_soporte` (
  `id` int(11) NOT NULL,
  `actividad_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ahorro`
--

CREATE TABLE `ahorro` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `incentivo_ahorro_colectivo` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ahorro`
--

INSERT INTO `ahorro` (`id`, `grupo_id`, `estado_id`, `fecha_registro`, `fecha_inicio`, `incentivo_ahorro_colectivo`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 2, 166, '2016-04-07 00:00:00', '2016-04-05 00:00:00', '48848484', 1, NULL, NULL, NULL, '2016-04-13 18:44:02'),
(2, 1, 167, '2016-04-07 00:00:00', '2016-04-21 00:00:00', '151515', 1, NULL, NULL, NULL, '2016-04-13 18:46:35'),
(3, 6, 166, '2016-04-20 00:00:00', '2016-04-12 00:00:00', '5251', 1, NULL, NULL, NULL, '2016-04-15 19:09:11'),
(4, 7, 166, '2016-05-01 00:00:00', '2016-04-18 00:00:00', '4848', 1, NULL, NULL, NULL, '2016-04-15 19:09:28'),
(5, 6, 166, '2016-04-30 00:00:00', '2016-04-12 00:00:00', '14717878', 1, NULL, NULL, NULL, '2016-04-15 19:12:27'),
(6, 13, 166, '2016-04-17 00:00:00', '2016-04-28 00:00:00', '15155', 1, NULL, NULL, NULL, '2016-04-15 19:13:02'),
(7, 12, 166, '2016-04-29 00:00:00', '2016-04-13 00:00:00', '18518518', 1, NULL, NULL, NULL, '2016-04-15 19:14:31'),
(8, 7, 166, '2016-04-29 00:00:00', '2016-04-11 00:00:00', '187', 1, NULL, NULL, NULL, '2016-04-15 19:18:50'),
(9, 12, 166, '2016-04-23 00:00:00', '2016-04-11 00:00:00', '484484884', 1, NULL, NULL, NULL, '2016-04-15 19:19:20'),
(10, 9, 166, '2016-04-22 00:00:00', '2016-04-29 00:00:00', '1518', 1, NULL, NULL, NULL, '2016-04-15 19:19:38'),
(11, 12, 166, '2016-04-07 00:00:00', '2016-04-26 00:00:00', '48848', 1, NULL, NULL, NULL, '2016-04-15 19:19:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ahorro_soporte`
--

CREATE TABLE `ahorro_soporte` (
  `id` int(11) NOT NULL,
  `ahorro_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_ahorro`
--

CREATE TABLE `asignacion_beneficiario_ahorro` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_comite_compras`
--

CREATE TABLE `asignacion_beneficiario_comite_compras` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_comite_vamos_bien`
--

CREATE TABLE `asignacion_beneficiario_comite_vamos_bien` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asignacion_beneficiario_comite_vamos_bien`
--

INSERT INTO `asignacion_beneficiario_comite_vamos_bien` (`id`, `grupo_id`, `beneficiario_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `habilitacion`, `asignacion`, `contraloria_social`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-03-28 17:49:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_estructura_organizacional`
--

CREATE TABLE `asignacion_beneficiario_estructura_organizacional` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_poliza`
--

CREATE TABLE `asignacion_beneficiario_poliza` (
  `id` int(11) NOT NULL,
  `poliza_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `beneficiario_poliza_otro_programa` tinyint(1) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_programa_capacitacion_financiera`
--

CREATE TABLE `asignacion_beneficiario_programa_capacitacion_financiera` (
  `id` int(11) NOT NULL,
  `programa_capacitacion_financiera_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `participante_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `valoracion_inicial` int(11) NOT NULL,
  `valoracion_final` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_taller`
--

CREATE TABLE `asignacion_beneficiario_taller` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `taller_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_visita`
--

CREATE TABLE `asignacion_beneficiario_visita` (
  `id` int(11) NOT NULL,
  `visita` int(11) NOT NULL,
  `beneficiario` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_beneficiario_visitas`
--

CREATE TABLE `asignacion_beneficiario_visitas` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_contador_grupo`
--

CREATE TABLE `asignacion_contador_grupo` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `contador_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_beneficiario_pasantia`
--

CREATE TABLE `asignacion_grupo_beneficiario_pasantia` (
  `id` int(11) NOT NULL,
  `pasantia_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_beneficiario_ruta`
--

CREATE TABLE `asignacion_grupo_beneficiario_ruta` (
  `id` int(11) NOT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_clear`
--

CREATE TABLE `asignacion_grupo_clear` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `clear_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_comite`
--

CREATE TABLE `asignacion_grupo_comite` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `comite_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_concurso`
--

CREATE TABLE `asignacion_grupo_concurso` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `concurso_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_pasantia`
--

CREATE TABLE `asignacion_grupo_pasantia` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `pasantia_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grupo_ruta`
--

CREATE TABLE `asignacion_grupo_ruta` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_integrante_clear`
--

CREATE TABLE `asignacion_integrante_clear` (
  `id` int(11) NOT NULL,
  `clear_id` int(11) DEFAULT NULL,
  `integrante_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_integrante_comite`
--

CREATE TABLE `asignacion_integrante_comite` (
  `id` int(11) NOT NULL,
  `comite_id` int(11) DEFAULT NULL,
  `integrante_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_organizacion_pasantia`
--

CREATE TABLE `asignacion_organizacion_pasantia` (
  `id` int(11) NOT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `pasantia_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_organizacion_ruta`
--

CREATE TABLE `asignacion_organizacion_ruta` (
  `id` int(11) NOT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_organizacion_territorio_aprendizaje`
--

CREATE TABLE `asignacion_organizacion_territorio_aprendizaje` (
  `id` int(11) NOT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `territorio_aprendizaje_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `habilitacion` tinyint(1) DEFAULT NULL,
  `asignacion` tinyint(1) DEFAULT NULL,
  `contraloria_social` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_talento_seguimiento_fase`
--

CREATE TABLE `asignacion_talento_seguimiento_fase` (
  `id` int(11) NOT NULL,
  `seguimiento_fase_id` int(11) DEFAULT NULL,
  `seguimiento_mot_id` int(11) DEFAULT NULL,
  `talento_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_usuario_beca`
--

CREATE TABLE `asignacion_usuario_beca` (
  `id` int(11) NOT NULL,
  `beca_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_usuario_capacitacion`
--

CREATE TABLE `asignacion_usuario_capacitacion` (
  `id` int(11) NOT NULL,
  `capacitacion_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_usuario_evento`
--

CREATE TABLE `asignacion_usuario_evento` (
  `id` int(11) NOT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beca`
--

CREATE TABLE `beca` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `beca`
--

INSERT INTO `beca` (`id`, `tipo_id`, `modalidad_id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `entidad`, `nombre`, `fecha_publicacion`, `fecha_inicio`, `fecha_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 153, 157, 1, NULL, NULL, 'fds', 'sfd', '2016-04-08 00:00:00', '2016-04-15 00:00:00', '2016-04-13 00:00:00', 1, NULL, '2016-04-13 17:04:50'),
(2, 156, 158, 17, NULL, NULL, 'qwe', 'qwe', '2016-04-23 00:00:00', '2016-04-30 00:00:00', '2016-04-07 00:00:00', 1, NULL, '2016-04-13 17:15:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beca_soporte`
--

CREATE TABLE `beca_soporte` (
  `id` int(11) NOT NULL,
  `beca_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `beneficiario`
--

INSERT INTO `beneficiario` (`id`, `grupo_id`, `tipo_documento_id`, `genero_id`, `pertenencia_etnica_id`, `grupo_indigena_id`, `discapacidad_id`, `estado_civil_id`, `rol_grupo_familiar_id`, `hijos_menores_5_id`, `miembros_nucleo_familiar_id`, `nivel_estudios_id`, `ocupacion_id`, `tipo_vivienda_id`, `tipo_documento_conyugue_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `edad_inscripcion`, `joven_rural`, `corte_sisben`, `puntaje_sisben`, `desplazado`, `red_unidos`, `sabe_leer`, `sabe_escribir`, `direccion`, `rural`, `descripcion`, `corregimiento`, `vereda`, `cacerio`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `numero_documento_conyugue`, `primer_apellido_conyugue`, `segundo_apellido_conyugue`, `primer_nombre_conyugue`, `segundo_nombre_conyugue`, `telefono_fijo_conyugue`, `telefono_celular_conyugue`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 1, 7, 47, 61, 213, 8, 224, 18, 23, 30, 36, 39, NULL, NULL, NULL, '123123', 'cantorr', 'asdfasdf', 'asdf', 'asdfasdf', '2016-03-10 00:00:00', 123, NULL, '1', '23', 1, 1, 1, 1, '<zxxxczxc', 1, NULL, 'asdasd', 'asdasd', 'asdasda', 'as1234123', '123123', '12312@qsd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-03-28 17:48:20', '2016-03-16 15:43:49'),
(2, 1, 1, 6, 45, 60, 214, 8, 221, 19, 21, 29, 35, 38, NULL, NULL, NULL, 'dfadffda', 'prueba1', NULL, 'prueba1', NULL, '2016-04-22 00:00:00', 18, NULL, '16', '185', 0, 0, 0, 0, 'sdsasd', 0, 'asadsads', NULL, NULL, NULL, '54455', '1555415', 'afasfd@correo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2016-04-04 22:49:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario_pasantia`
--

CREATE TABLE `beneficiario_pasantia` (
  `id` int(11) NOT NULL,
  `pasantia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beneficiario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario_ruta`
--

CREATE TABLE `beneficiario_ruta` (
  `id` int(11) NOT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beneficiario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario_soporte`
--

CREATE TABLE `beneficiario_soporte` (
  `id` int(11) NOT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `beneficiario_soporte`
--

INSERT INTO `beneficiario_soporte` (`id`, `beneficiario_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 4, NULL, NULL, '4255f7a1d15e806564928baa1c6e32df1fab09ed.png', 0, '2016-03-28 17:06:10', '2016-03-16 20:57:19'),
(2, 1, 4, NULL, NULL, 'dadf7449e0051d75e1d2f66879942d1bba99f4fa.png', 0, '2016-03-28 17:06:16', '2016-03-28 17:06:10'),
(3, 1, 4, NULL, NULL, '378a36dbc98c8c3fb57c5c8e22053433d25f4e26.png', 0, '2016-03-28 18:11:19', '2016-03-28 18:04:15'),
(4, 1, 4, NULL, NULL, '8d735fce9a930657a3f9ba0e32f5ef1fa4478e49.png', 0, '2016-03-28 18:25:45', '2016-03-28 18:17:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_criterio_grupo_concurso`
--

CREATE TABLE `calificacion_criterio_grupo_concurso` (
  `id` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `criterio_calificacion_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `concurso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_experiencia_exitosa`
--

CREATE TABLE `calificacion_experiencia_exitosa` (
  `id` int(11) NOT NULL,
  `experiencia_exitosa_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camino`
--

CREATE TABLE `camino` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `nodo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `camino`
--

INSERT INTO `camino` (`id`, `grupo_id`, `nodo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `estado`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 2, 1, NULL, NULL, 2, 1, NULL, '2016-04-01 16:09:17'),
(2, 3, 1, NULL, NULL, 2, 1, NULL, '2016-04-14 23:19:09'),
(3, 6, 1, NULL, NULL, 2, 1, NULL, '2016-04-14 23:58:14'),
(4, 7, 1, NULL, NULL, 2, 1, NULL, '2016-04-14 23:58:55'),
(5, 8, 1, NULL, NULL, 2, 1, NULL, '2016-04-14 23:59:36'),
(6, 9, 1, NULL, NULL, 2, 1, NULL, '2016-04-15 00:00:07'),
(7, 10, 1, NULL, NULL, 2, 1, NULL, '2016-04-15 00:00:43'),
(8, 11, 1, NULL, NULL, 2, 1, NULL, '2016-04-15 00:01:15'),
(9, 12, 1, NULL, NULL, 2, 1, NULL, '2016-04-15 00:01:46'),
(10, 13, 1, NULL, NULL, 2, 1, NULL, '2016-04-15 00:02:20'),
(11, 16, 1, NULL, NULL, 2, 1, NULL, '2016-04-28 17:38:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion`
--

CREATE TABLE `capacitacion` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `capacitacion`
--

INSERT INTO `capacitacion` (`id`, `tipo_id`, `modalidad_id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `capacitador`, `nombre`, `fecha_publicacion`, `fecha_inicio`, `fecha_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 162, 165, 1, NULL, NULL, 'pepe', 'qwe', '2016-03-31 00:00:00', '2016-04-08 00:00:00', '2016-04-06 00:00:00', 1, NULL, '2016-04-13 17:18:20'),
(2, 162, 165, 1, NULL, NULL, 'dsaads', 'adsads', '2016-04-11 00:00:00', '2016-04-09 00:00:00', '2016-04-16 00:00:00', 1, NULL, '2016-04-13 22:54:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion_financiera`
--

CREATE TABLE `capacitacion_financiera` (
  `id` int(11) NOT NULL,
  `programa_capacitacion_financiera_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `modulo` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `capacitacion_financiera`
--

INSERT INTO `capacitacion_financiera` (`id`, `programa_capacitacion_financiera_id`, `estado_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `modulo`, `fecha`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 170, NULL, NULL, 1, '2016-04-07 00:00:00', 1, NULL, '2016-04-14 17:03:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion_financiera_soporte`
--

CREATE TABLE `capacitacion_financiera_soporte` (
  `id` int(11) NOT NULL,
  `capacitacion_financiera_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion_soporte`
--

CREATE TABLE `capacitacion_soporte` (
  `id` int(11) NOT NULL,
  `capacitacion_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clear`
--

CREATE TABLE `clear` (
  `id` int(11) NOT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `lugar_realizacion_CLEAR` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clear`
--

INSERT INTO `clear` (`id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_inicio`, `fecha_finalizacion`, `lugar_realizacion_CLEAR`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 91, NULL, NULL, '2016-03-04 00:00:00', '2016-03-17 00:00:00', 'prueba 1', 1, NULL, '2016-03-30 22:56:27'),
(2, 91, NULL, NULL, '2016-04-02 00:00:00', '2016-04-14 00:00:00', 'asd', 1, NULL, '2016-04-15 18:39:12'),
(3, 91, NULL, NULL, '2016-04-13 00:00:00', '2016-04-22 00:00:00', 'etret', 1, NULL, '2016-04-15 18:39:39'),
(4, 91, NULL, NULL, '2016-04-09 00:00:00', '2016-04-15 00:00:00', 'fdaadsds', 1, NULL, '2016-04-15 18:39:54'),
(5, 91, NULL, NULL, '2016-04-20 00:00:00', '2016-04-20 00:00:00', 'asdfsa', 1, NULL, '2016-04-15 18:40:15'),
(6, 91, NULL, NULL, '2016-04-02 00:00:00', '2016-04-27 00:00:00', 'asdffds', 1, NULL, '2016-04-15 18:40:40'),
(7, 91, NULL, NULL, '2016-04-20 00:00:00', '2016-04-05 00:00:00', 'fsadsd', 1, NULL, '2016-04-15 18:40:56'),
(8, 91, NULL, NULL, '2016-04-15 00:00:00', '2016-04-30 00:00:00', 'retre', 1, NULL, '2016-04-15 18:41:20'),
(9, 91, NULL, NULL, '2016-04-22 00:00:00', '2016-04-13 00:00:00', 'tgdhg', 1, NULL, '2016-04-15 18:41:35'),
(10, 91, NULL, NULL, '2016-04-07 00:00:00', '2016-04-06 00:00:00', 'sg', 1, NULL, '2016-04-15 18:41:49'),
(11, 91, NULL, NULL, '2016-04-16 00:00:00', '2016-04-09 00:00:00', 'sdgdgs', 1, NULL, '2016-04-15 18:42:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clear_soporte`
--

CREATE TABLE `clear_soporte` (
  `id` int(11) NOT NULL,
  `clear_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comite`
--

CREATE TABLE `comite` (
  `id` int(11) NOT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `lugar_realizacion_comite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comite`
--

INSERT INTO `comite` (`id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_inicio`, `fecha_finalizacion`, `lugar_realizacion_comite`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 91, NULL, NULL, '2016-03-03 00:00:00', '2016-03-26 00:00:00', 'asddsa', 1, NULL, '2016-03-30 22:47:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comite_soporte`
--

CREATE TABLE `comite_soporte` (
  `id` int(11) NOT NULL,
  `comite_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso`
--

CREATE TABLE `concurso` (
  `id` int(11) NOT NULL,
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
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_inicio_propuesta` datetime DEFAULT NULL,
  `fecha_finalizacion_propuesta` datetime DEFAULT NULL,
  `aprobador` int(11) DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `concurso`
--

INSERT INTO `concurso` (`id`, `tipo_id`, `modalidad_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_bases`, `tematica`, `ambito`, `problematica`, `actividades`, `resultados`, `valor`, `distribucion`, `criterios`, `aprobacion`, `fecha_inicio`, `fecha_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`, `fecha_inicio_propuesta`, `fecha_finalizacion_propuesta`, `aprobador`, `observaciones`) VALUES
(1, 145, 142, NULL, NULL, '2016-03-11 00:00:00', 'sad', 'adsfr', 'asdfasd', 'asdfasdf', 'asdfasdf', '12341234', '1234', 'asdasdsfasd', 0, '2016-03-29 00:00:00', '2016-04-12 00:00:00', 1, NULL, '2016-03-18 16:44:22', NULL, NULL, NULL, NULL),
(2, 144, 143, NULL, NULL, '2016-04-15 00:00:00', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', NULL, NULL, NULL, 1, NULL, '2016-04-14 22:42:30', NULL, NULL, NULL, NULL),
(3, 144, 143, NULL, NULL, '2016-04-09 00:00:00', 'sdfgsf', 'sdgd', 'sd', 'sddsg', 'sdsd', 'dfsgsd', 'sds', 'dsdsdg', NULL, NULL, NULL, 1, NULL, '2016-04-15 18:50:14', NULL, NULL, NULL, NULL),
(4, 144, 143, NULL, NULL, '2016-04-30 00:00:00', 'sd', 'ss', 'ssdf', 's', 'gsdfs', 'sdsdg', 'gsd', 'sfs', NULL, NULL, NULL, 1, NULL, '2016-04-15 18:50:41', NULL, NULL, NULL, NULL),
(5, 144, 143, NULL, NULL, '2016-04-26 00:00:00', 'afsdsdfa', 'sdaffsad', 'adsfdsaf', 'adfssadf', 'fdasafds', 'afsdfads', 'asdfafds', 'asdffdas', NULL, NULL, NULL, 1, NULL, '2016-04-15 18:55:27', NULL, NULL, NULL, NULL),
(6, 144, 143, NULL, NULL, '2016-04-20 00:00:00', 'afsddsfa', 'asdfsdaf', 'sdadsaf', 'sadfdfsa', 'sdafadfs', 'dsasadf', 'dsfaafdsafd', 'sadfasdfafsd', NULL, NULL, NULL, 1, NULL, '2016-04-15 18:57:48', NULL, NULL, NULL, NULL),
(7, 144, 143, NULL, NULL, '2016-04-22 00:00:00', 'fasdafsd', 'fadsafds', 'fdsaafsd', 'fsdaasfd', 'adfsafds', 'afsdafsd', 'afsdafsd', 'adfsadsf', NULL, NULL, NULL, 1, NULL, '2016-04-15 18:58:35', NULL, NULL, NULL, NULL),
(8, 144, 143, NULL, NULL, '2016-04-01 00:00:00', 'ft', 'fuyfyyfu', 'fyufyuuyf', 'fyyf', 'yffyufuy', 'ufyuf', 'fiufi', 'iuvui', NULL, NULL, NULL, 1, NULL, '2016-04-15 18:59:43', NULL, NULL, NULL, NULL),
(9, 144, 143, NULL, NULL, '2016-04-16 00:00:00', 'afdsfds', 'sdafads', 'adsadfs', 'afsdfads', 'sdaf', 'sadfdfsaafsd', 'fsdasadf', 'fadsfa', NULL, NULL, NULL, 1, NULL, '2016-04-15 19:00:05', NULL, NULL, NULL, NULL),
(10, 144, 143, NULL, NULL, '2016-04-15 00:00:00', 'afdsdsf', 'fsadfsad', 'fsdasadf', 'sdfafsda', 'fsdfdsafd', 'dsfa', 'sdfafsda', 'fasdafsd', NULL, NULL, NULL, 1, NULL, '2016-04-15 19:00:23', NULL, NULL, NULL, NULL),
(11, 144, 143, NULL, NULL, '2016-04-21 00:00:00', 'afsddfsa', 'afddfas', 'fdasdfs', 'fadsdfas', 'dsfadfas', 'dfsasadf', 'dfsada', 'dfsaasfd', NULL, NULL, NULL, 1, NULL, '2016-04-15 19:00:53', NULL, NULL, NULL, NULL),
(12, 144, 143, NULL, NULL, '2016-04-21 00:00:00', 's', 'g', 'sgdsg', 'ggf', 'sg', 's', 'dsdff', 'sgssd', NULL, NULL, NULL, 1, NULL, '2016-04-15 19:01:15', NULL, NULL, NULL, NULL),
(13, 144, 143, NULL, NULL, '2016-04-23 00:00:00', 'dfas', 'asfdfasd', 'asdfasfd', 'afsdasdf', 'dsafadsf', 'sadfdsaf', 'sdfafasafs', 'sdafdsaf', NULL, NULL, NULL, 1, NULL, '2016-04-15 19:01:32', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso_soporte`
--

CREATE TABLE `concurso_soporte` (
  `id` int(11) NOT NULL,
  `concurso_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `concurso_soporte`
--

INSERT INTO `concurso_soporte` (`id`, `concurso_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 8, NULL, NULL, 'f820be5ccd5e9380e11628d246a90bd0d2456c59.png', 1, NULL, '2016-03-30 16:55:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id`, `tipo_documento_id`, `genero_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `numero_documento`, `numero_tarjeta`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 7, NULL, NULL, '1022376577', '987654123123', 'Bastidas', 'Perez', 'Itzele', 'Maria', '2016-03-11 00:00:00', '3214567', '3045678945', 'itze@djaj.com', 1, NULL, '2016-03-28 18:51:09'),
(2, 1, 6, NULL, NULL, '4888448', '4848', 'a', 'b', 'c', 'd', '2016-04-19 00:00:00', '7414518', '320484815', 'correo@prueba.com', 1, NULL, '2016-04-15 18:43:38'),
(3, 1, 7, NULL, NULL, '1451517', '1451774', 'z', 'x', 'c', 'v', '2016-04-11 00:00:00', '4234321421', '412343242', 'correo@prueba.com', 1, NULL, '2016-04-15 18:44:37'),
(4, 1, 6, NULL, NULL, '143214234123', '142334212413214', 'q', 'w', 'e', 'r', '2016-04-04 00:00:00', '1344342', '4525425532', 'correo@prueba.com', 1, NULL, '2016-04-15 18:45:01'),
(5, 1, 6, NULL, NULL, '54225225', '32355252', 't', 'y', 'u', 'i', '2016-04-13 00:00:00', '52342523', '52352523234', 'correo@prueba.com', 1, NULL, '2016-04-15 18:45:26'),
(6, 1, 6, NULL, NULL, '44342312', '414133214321', 'p', 'o', 'i', 'u', '2016-04-05 00:00:00', '54546456', '466544564', 'correo@prueba.com', 1, NULL, '2016-04-15 18:45:57'),
(7, 1, 6, NULL, NULL, '454552', '25543254', 'g', 'h', 'j', 'k', '2016-04-25 00:00:00', '5434254', '532543243', 'correo@prueba.com', 1, NULL, '2016-04-15 18:47:00'),
(8, 1, 6, NULL, NULL, '5t56434', '6353664', 'f', 'd', 's', 'a', '2016-04-26 00:00:00', '4523523', '234546356', 'correo@prueba.com', 1, NULL, '2016-04-15 18:47:35'),
(9, 1, 6, NULL, NULL, '532225', '234523', 'm', 'n', 'b', 'v', '2016-01-31 00:00:00', '5234', '4536553', 'correo@prueba.com', 1, NULL, '2016-04-15 18:48:12'),
(10, 1, 6, NULL, NULL, '48949898', '4899848994', 'a', 'd', 'd', 'f', '2016-01-31 00:00:00', '4841545', '158511557157', 'correo@prueba.com', 1, NULL, '2016-04-15 18:48:49'),
(11, 1, 6, NULL, NULL, '11855475', '151515715571', 'd', 'f', 'k', 'k', '2015-12-01 00:00:00', '43254323', '8797798', 'correo@prueba.com', 1, NULL, '2016-04-15 18:49:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador_soporte`
--

CREATE TABLE `contador_soporte` (
  `id` int(11) NOT NULL,
  `contador_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contador_soporte`
--

INSERT INTO `contador_soporte` (`id`, `contador_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 21, NULL, NULL, '01bed22f9aa0e06b6e47a2cd536694b029118399.png', 0, '2016-03-28 19:03:39', '2016-03-28 19:01:29'),
(2, 1, 21, NULL, NULL, '0d163e8c8480e34fb78999ca7a940d67b08df092.png', 0, '2016-03-28 19:06:51', '2016-03-28 19:03:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE `convocatoria` (
  `id` int(11) NOT NULL,
  `poa_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `convocatoria`
--

INSERT INTO `convocatoria` (`id`, `poa_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `numero`, `fecha_inicio`, `fecha_cierre`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(2, 1, NULL, NULL, 12345, '2016-04-14 00:00:00', '2016-04-30 00:00:00', 1, NULL, '2016-04-12 21:17:41'),
(3, 1, NULL, NULL, 1551515, '2016-04-06 00:00:00', '2016-04-28 00:00:00', 1, NULL, '2016-04-12 21:18:57'),
(4, 1, NULL, NULL, 45254554, '2016-04-05 00:00:00', '2016-04-06 00:00:00', 1, NULL, '2016-04-12 21:19:12'),
(5, 1, NULL, NULL, 254, '2016-04-02 00:00:00', '2016-04-03 00:00:00', 1, NULL, '2016-04-12 21:19:25'),
(6, 1, NULL, NULL, 4354534, '2016-04-09 00:00:00', '2016-04-17 00:00:00', 1, NULL, '2016-04-12 21:19:55'),
(7, 1, NULL, NULL, 6554, '2016-04-23 00:00:00', '2016-04-17 00:00:00', 1, NULL, '2016-04-12 21:20:22'),
(8, 1, NULL, NULL, 656565, '2016-04-08 00:00:00', '2016-04-28 00:00:00', 1, NULL, '2016-04-12 21:20:59'),
(9, 1, NULL, NULL, 11, '2016-04-14 00:00:00', '2016-04-19 00:00:00', 1, NULL, '2016-04-12 21:21:13'),
(10, 1, NULL, NULL, 81515518, '2016-04-16 00:00:00', '2016-04-15 00:00:00', 1, NULL, '2016-04-12 21:21:28'),
(11, 1, NULL, NULL, 855111, '2016-04-18 00:00:00', '2016-04-23 00:00:00', 1, NULL, '2016-04-12 21:21:45'),
(12, 1, NULL, NULL, 505554145, '2016-04-08 00:00:00', '2016-04-06 00:00:00', 1, NULL, '2016-04-12 21:22:16'),
(13, 9, NULL, NULL, 1151515, '2016-04-14 00:00:00', '2016-04-15 00:00:00', 1, NULL, '2016-04-26 22:02:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria_soporte`
--

CREATE TABLE `convocatoria_soporte` (
  `id` int(11) NOT NULL,
  `convocatoria_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio_calificacion`
--

CREATE TABLE `criterio_calificacion` (
  `id` int(11) NOT NULL,
  `criterio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maximo_puntaje` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `concurso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `criterio_calificacion`
--

INSERT INTO `criterio_calificacion` (`id`, `criterio`, `maximo_puntaje`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`, `concurso_id`) VALUES
(1, 'fdas', 516561, 1, NULL, NULL, NULL, '2016-04-14 22:58:24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `diagnostico_organizacional` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribucion_premio`
--

CREATE TABLE `distribucion_premio` (
  `id` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `concurso_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `distribucion_premio`
--

INSERT INTO `distribucion_premio` (`id`, `posicion`, `valor`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`, `concurso_id`, `grupo_id`) VALUES
(1, 1, '46884', 1, NULL, NULL, NULL, '2016-04-14 23:04:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_soporte`
--

CREATE TABLE `documento_soporte` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `documento_soporte`
--

INSERT INTO `documento_soporte` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `dominio`, `descripcion`, `abreviatura`, `obligatorio`, `orden`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'grupo_tipo_soporte', 'Acta de interés', 'AI', '0', 0, 1, NULL, '2016-01-06 00:00:00'),
(3, NULL, NULL, 'grupo_tipo_soporte', 'Formato de propuesta ', 'AI', '0', 0, 1, NULL, '2016-01-06 00:00:00'),
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
(19, NULL, NULL, 'clear_tipo_soporte', 'Acta Habilitación Asignación', '', '0', 0, 1, NULL, '2016-01-12 00:00:00'),
(20, NULL, NULL, 'contador_tipo_soporte', 'Documento Identidad', 'DI', '0', 0, 1, NULL, '2016-01-06 00:00:00'),
(21, NULL, NULL, 'contador_tipo_soporte', 'Tarjeta Profesional', 'TP', '0', 0, 1, NULL, '2016-01-06 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructura_organizacional`
--

CREATE TABLE `estructura_organizacional` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_fase`
--

CREATE TABLE `evaluacion_fase` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fase` int(11) DEFAULT NULL,
  `calificacion` decimal(10,0) NOT NULL,
  `aprobado` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_fases`
--

CREATE TABLE `evaluacion_fases` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `calificacion_iea` decimal(10,0) DEFAULT NULL,
  `apto_iea` tinyint(1) DEFAULT NULL,
  `calificacion_pi` decimal(10,0) DEFAULT NULL,
  `apto_pi` tinyint(1) DEFAULT NULL,
  `calificacion_pn` decimal(10,0) DEFAULT NULL,
  `apto_pn` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_fases_soporte`
--

CREATE TABLE `evaluacion_fases_soporte` (
  `id` int(11) NOT NULL,
  `evaluacionfases_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_fase_soporte`
--

CREATE TABLE `evaluacion_fase_soporte` (
  `id` int(11) NOT NULL,
  `evaluacionfase_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `tipo_id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `organizador`, `nombre`, `descripcion`, `fecha_publicacion`, `fecha_inicio`, `fecha_finalizacion`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 161, 18, NULL, NULL, 'prueba', 'Prueba1', 'qwe', '2016-04-07 00:00:00', '2016-04-05 00:00:00', '2016-04-04 00:00:00', 1, NULL, '2016-04-13 17:52:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_soporte`
--

CREATE TABLE `evento_soporte` (
  `id` int(11) NOT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_exitosa`
--

CREATE TABLE `experiencia_exitosa` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `experiencia_exitosa`
--

INSERT INTO `experiencia_exitosa` (`id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_registro`, `numero_empleos`, `ventas_mes`, `produccion_mensual`, `fuentes_financiacion`, `valor_recursos_financiacion`, `tipo_poblacion`, `proceso_productivo`, `testimonio_poblacion`, `acciones_minimizacion_impacto_ambiental`, `impacto_comunidad`, `innovacion`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, NULL, '2016-04-01 00:00:00', 1, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, NULL, '2016-04-13 18:15:37'),
(2, NULL, NULL, NULL, '2016-04-02 00:00:00', 841, 1515, '1415', '1515', '15', '15', '15', '15', '15', '15', '15', '15', 1, NULL, '2016-04-27 22:29:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_exitosa_soporte`
--

CREATE TABLE `experiencia_exitosa_soporte` (
  `id` int(11) NOT NULL,
  `experienciaexitosa_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feria`
--

CREATE TABLE `feria` (
  `id` int(11) NOT NULL,
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
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `feria`
--

INSERT INTO `feria` (`id`, `tipo_id`, `municipio_id`, `fecha_propuesta`, `lugar`, `nombre`, `entidades`, `presentacion`, `objetivo`, `objetivos_especificos`, `fecha_aprobacion`, `fecha_aprobada`, `aprobacion`, `coordinador`, `numero_proyectos_produccion_agropecuaria`, `numero_proyectos_agroindustria`, `numero_proyectos_turismo_rural`, `numero_proyectos_artesanias`, `numero_proyectos_otros_servicios`, `valor_ventas_produccion_agropecuaria`, `valor_ventas_agroindustria`, `valor_ventas_turismo_rural`, `valor_ventas_artesanias`, `valor_ventas_otros_servicios`, `personas_atendidas`, `representantes_instituciones`, `comentarios`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, NULL, 15, '2016-03-10 00:00:00', 'asdasd', 'asdas', 'asdfasd', 'asdas', 'asda', 'asdASDAsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-03-18 21:52:43'),
(2, NULL, 1, '2016-04-08 00:00:00', 'prueba', 'nombre', 'entidad', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:51:07'),
(3, NULL, 1, '2016-04-12 00:00:00', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:51:37'),
(4, NULL, 1, '2016-04-05 00:00:00', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:51:52'),
(5, NULL, 1, '2016-04-05 00:00:00', 'zxc', 'zxc', 'zxc', 'zxc', 'zcx', 'zxc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:52:09'),
(6, NULL, 1, '2016-04-01 00:00:00', 'rty', 'rty', 'ry', 'rty', 'rty', 'rty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:52:25'),
(7, NULL, 1, '2016-04-05 00:00:00', 'fgh', 'fgh', 'fgh', 'fgh', 'fgh', 'fgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:52:44'),
(8, NULL, 1, '2016-04-11 00:00:00', 'vbn', 'vbn', 'vbn', 'vbn', 'vbn', 'vbn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:53:00'),
(9, NULL, 1, '2016-04-06 00:00:00', 'uio', 'uio', 'uio', 'uio', 'uio', 'uio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:53:15'),
(10, NULL, 1, '2016-04-04 00:00:00', 'jkl', 'jkl', 'jkl', 'jkl', 'jkl', 'jkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:53:33'),
(11, NULL, 1, '2016-04-13 00:00:00', 'pñm', 'pñm', 'pñm', 'pñm', 'pñm', 'pñm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-14 23:53:56'),
(12, NULL, 4, '2016-04-23 00:00:00', 'lugar', 'nombreasfddfz', 'entidad', 'presentacion feria', 'objetivo feria', 'objetivos especificos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2016-04-28 18:08:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feria_soporte`
--

CREATE TABLE `feria_soporte` (
  `id` int(11) NOT NULL,
  `feria_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `feria_soporte`
--

INSERT INTO `feria_soporte` (`id`, `feria_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 1, NULL, NULL, '58be1b2a54ecaee57ec343ad7b5757a3e1801169.png', 0, '2016-03-18 22:01:26', '2016-03-18 21:52:56'),
(2, 1, 1, NULL, NULL, 'b262ad7e5cdecc9d17390414f2752fd61573aaf0.png', 1, NULL, '2016-03-18 22:01:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
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
  `corregimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vereda` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cacerio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_identificacion_tributaria` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_constitucion_legal` datetime DEFAULT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_cuenta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `convocatoria_id`, `municipio_id`, `tipo_id`, `figura_legal_constitucion_id`, `entidad_financiera_cuenta_id`, `tipo_cuenta_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_inscripcion`, `codigo`, `nombre`, `direccion`, `rural`, `descripcion`, `corregimiento`, `vereda`, `cacerio`, `numero_identificacion_tributaria`, `fecha_constitucion_legal`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `numero_cuenta`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 91, 171, 206, 190, 176, NULL, NULL, NULL, NULL, 'asd', 'adasdasd', 1, NULL, 'asdas', 'asd', 'aasdasd', '0-0', '2016-03-11 00:00:00', '123123', '1213123', 'asdsd@aasd.com', '12312312123123', 1, NULL, '2016-03-16 15:29:31'),
(2, NULL, 91, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Prueba 1', 'calle falsa 123', 0, 'Barrio', NULL, NULL, NULL, NULL, NULL, '7402222', '3105616147', 'correo@prueba.com', NULL, 1, NULL, '2016-04-01 16:09:17'),
(3, NULL, 91, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'prueba2', 'prueba2', NULL, 'prueba2', NULL, NULL, NULL, NULL, NULL, '747478', '4848487', 'prueba@correo.com', NULL, 1, NULL, '2016-04-14 23:19:09'),
(6, NULL, 91, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Prueba3', 'calle 5', NULL, 'la casa de la esquiba', NULL, NULL, NULL, NULL, NULL, '7406128', '3204996137', 'correo@prueba.com', NULL, 1, NULL, '2016-04-14 23:58:14'),
(7, NULL, 91, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Prueba4', 'c445', NULL, 'ddsadf', NULL, NULL, NULL, NULL, NULL, '7406152', '321041915489', 'correo@prueba.com', NULL, 1, NULL, '2016-04-14 23:58:55'),
(8, NULL, 91, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Prueba 5', 'c484848', NULL, 'yokese', NULL, NULL, NULL, NULL, NULL, '7402414', '32048182852', 'correo@prueba.com', NULL, 1, NULL, '2016-04-14 23:59:36'),
(9, NULL, 91, 174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'prueba6', 'c4848', NULL, 'yokese2', NULL, NULL, NULL, '0-0', NULL, '7401245', '32048481548', 'correo@prueba.com', NULL, 1, NULL, '2016-04-15 00:00:07'),
(10, NULL, 91, 174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Prueba 7', 'calle 5', NULL, 'yokese 3', NULL, NULL, NULL, '0-0', NULL, '7401584', '320248512485', 'correo@prueba.com', NULL, 1, NULL, '2016-04-15 00:00:43'),
(11, NULL, 91, 174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'prueba8', 'calle 5', NULL, 'yokese 4', NULL, NULL, NULL, '0-0', NULL, '7406124', '320415848156', 'correo@prueba.com', NULL, 1, NULL, '2016-04-15 00:01:15'),
(12, NULL, 91, 174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Prueba 9', 'calle 5', NULL, 'yokese 9', NULL, NULL, NULL, '0-0', NULL, '7406148', '320484548185', 'correo@prueba.com', NULL, 1, NULL, '2016-04-15 00:01:46'),
(13, NULL, 91, 174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'prueba 10', 'calle 5', NULL, 'yokese 10', NULL, NULL, NULL, '0-0', NULL, '7401815', '32048157451', 'correo@prueba.com', NULL, 1, NULL, '2016-04-15 00:02:20'),
(16, NULL, 22, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ola ke ase', 'cll5', NULL, 'barrio', NULL, NULL, NULL, NULL, NULL, '7474477', '3204844848', 'correo@prueba.com', NULL, 1, NULL, '2016-04-28 17:38:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_soporte`
--

CREATE TABLE `grupo_soporte` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grupo_soporte`
--

INSERT INTO `grupo_soporte` (`id`, `grupo_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 1, NULL, NULL, '9eca0452df603a1ec243a17840b7cb0374a761f6.png', 0, '2016-03-28 17:52:14', '2016-03-28 17:52:02'),
(2, 1, 1, NULL, NULL, '4fefb841d6954b15f10902923dcd46d32413518f.png', 0, '2016-03-28 17:52:23', '2016-03-28 17:52:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilitacion_fases`
--

CREATE TABLE `habilitacion_fases` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante`
--

CREATE TABLE `integrante` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante_soporte`
--

CREATE TABLE `integrante_soporte` (
  `id` int(11) NOT NULL,
  `integrante_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id` int(11) NOT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `dominio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `zona_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `nodo` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `organizacion` (
  `id` int(11) NOT NULL,
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
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion_pasantia`
--

CREATE TABLE `organizacion_pasantia` (
  `id` int(11) NOT NULL,
  `pasantia_id` int(11) DEFAULT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion_ruta`
--

CREATE TABLE `organizacion_ruta` (
  `id` int(11) NOT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion_soporte`
--

CREATE TABLE `organizacion_soporte` (
  `id` int(11) NOT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion_territorio_aprendizaje`
--

CREATE TABLE `organizacion_territorio_aprendizaje` (
  `id` int(11) NOT NULL,
  `territorio_aprendizaje_id` int(11) DEFAULT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id`, `beneficiario_id`, `tipo_documento_id`, `genero_id`, `pertenencia_etnica_id`, `grupo_indigena_id`, `discapacidad_id`, `estado_civil_id`, `rol_grupo_familiar_id`, `hijos_menores_5_id`, `nivel_estudios_id`, `ocupacion_id`, `tipo_vivienda_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `relacion`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `edad_inscripcion`, `joven_rural`, `desplazado`, `sabe_leer`, `sabe_escribir`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 29, 34, 37, NULL, NULL, 2, '41818', 'uno', 'dos', 'unon', 'dosn', '2016-04-13 00:00:00', 4884, NULL, 0, 0, 0, '1787787848', '320158618561', 'prueba@correo.com', 1, NULL, '2016-04-14 17:26:31'),
(2, NULL, 1, 6, 45, 50, 216, 10, 221, 16, 28, 34, 37, NULL, NULL, 3, '58984', 'q', 'q', 'w', 'd', '2016-04-20 00:00:00', 32, NULL, 0, 0, 0, '4444848448', '488448488484', 'correo@prueba.com', 1, NULL, '2016-04-15 21:27:48'),
(3, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 28, 34, 37, NULL, NULL, 3, '52455245', 'q', 'w', 'e', 'r', '2016-04-13 00:00:00', 18, NULL, 0, 0, 0, '18181', '484848', 'prueba@correo.com', 1, NULL, '2016-04-15 21:30:08'),
(4, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 28, 34, 37, NULL, NULL, 1, '59955995', 'fads', 'asdf', 'dfsa', 'dfas', '2016-04-11 00:00:00', 18, NULL, 0, 0, 0, '1598', '181818', 'prueba@correo.com', 1, NULL, '2016-04-15 21:31:25'),
(5, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 28, 34, 37, NULL, NULL, 1, '848498498', 'a', 'a', 'a', 'a', '2016-04-16 00:00:00', 25, NULL, 0, 0, 0, '25752727', '75257527', 'prueba@correo.com', 1, NULL, '2016-04-15 21:35:28'),
(6, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 28, 34, 37, NULL, NULL, 1, '5188787', 'd', 'd', 'd', 'd', '2016-04-05 00:00:00', 55, NULL, 0, 0, 0, '05848', '48874', 'correo@prueba.com', 1, NULL, '2016-04-15 21:36:17'),
(7, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 28, 34, 37, NULL, NULL, 2, '84449498', 'w', 'w', 'w', 'w', '2016-12-31 00:00:00', 18, NULL, 0, 0, 0, '5115', '1515', 'correo@prueba.com', 1, NULL, '2016-04-15 21:36:45'),
(8, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 28, 34, 37, NULL, NULL, 2, '41811', 'f', 'f', 'f', 'f', '2016-04-07 00:00:00', 18, NULL, 0, 0, 0, '48454', '151551', 'correo@prueba.com', 1, NULL, '2016-04-15 21:37:10'),
(9, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 28, 34, 37, NULL, NULL, 2, '487484185', 'e', 'e', 'e', 'e', '2016-04-11 00:00:00', 18, NULL, 0, 0, 0, '4815185', '1510584185', 'correo@prueba.com', 1, NULL, '2016-04-15 21:37:44'),
(10, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 28, 34, 37, NULL, NULL, 2, '4198498', 'm', 'm', 'm', 'm', '2016-04-12 00:00:00', 18, NULL, 0, 0, 0, '74454', '584', 'correo@prueba.com', 1, NULL, '2016-04-15 21:38:27'),
(11, NULL, 1, 6, 45, 50, 213, 8, 221, 219, 28, 34, 37, NULL, NULL, 4, '59184918', 'x', 'x', 'x', 'x', '2016-12-30 00:00:00', 18, NULL, 0, 0, 0, '5243', '2342', 'prueba@correo.com', 1, NULL, '2016-04-15 21:40:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasantia`
--

CREATE TABLE `pasantia` (
  `id` int(11) NOT NULL,
  `territorio_aprendizaje_id` int(11) DEFAULT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre_pasantia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pasantia`
--

INSERT INTO `pasantia` (`id`, `territorio_aprendizaje_id`, `organizacion_id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre_pasantia`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, 'dfsasadf', 'dsaffsd', 1, NULL, '2016-04-15 19:04:22'),
(3, NULL, NULL, NULL, NULL, NULL, 'afsddfas', 'fadsdfs', 1, NULL, '2016-04-15 19:04:30'),
(4, NULL, NULL, NULL, NULL, NULL, 'dsafasdf', 'asfdfsad', 1, NULL, '2016-04-15 19:04:38'),
(5, NULL, NULL, NULL, NULL, NULL, 'qwerqw', 'qrweweqr', 1, NULL, '2016-04-15 19:04:46'),
(6, NULL, NULL, NULL, NULL, NULL, 'zvc', 'vcxz', 1, NULL, '2016-04-15 19:04:54'),
(7, NULL, NULL, NULL, NULL, NULL, 'tiyiy', 'tiyty', 1, NULL, '2016-04-15 19:05:02'),
(8, NULL, NULL, NULL, NULL, NULL, 'eyr', 'yey', 1, NULL, '2016-04-15 19:05:12'),
(9, NULL, NULL, NULL, NULL, NULL, 'yert', 'fdfd', 1, NULL, '2016-04-15 19:05:19'),
(10, NULL, NULL, NULL, NULL, NULL, 'df', 'dffd', 1, NULL, '2016-04-15 19:05:27'),
(11, NULL, NULL, NULL, NULL, NULL, 'dhffd', 'asdf', 1, NULL, '2016-04-15 19:05:35'),
(12, NULL, NULL, NULL, 1, NULL, 'prueba 44', 'afdsadfsgssg', 1, '2016-04-26 19:17:01', '2016-04-26 19:13:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasantia_soporte`
--

CREATE TABLE `pasantia_soporte` (
  `id` int(11) NOT NULL,
  `pasantia_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinador_feria`
--

CREATE TABLE `patrocinador_feria` (
  `id` int(11) NOT NULL,
  `feria` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_aportado` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_inversion`
--

CREATE TABLE `plan_inversion` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poa`
--

CREATE TABLE `poa` (
  `id` int(11) NOT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `anio` int(11) NOT NULL,
  `presupuesto` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `poa`
--

INSERT INTO `poa` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `anio`, `presupuesto`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 2016, '1516565', 1, NULL, '2016-04-12 20:01:59'),
(5, NULL, NULL, 2015, '51654', 1, NULL, '2016-04-12 22:01:52'),
(6, NULL, NULL, 2014, '1881981', 1, NULL, '2016-04-12 22:44:09'),
(9, NULL, NULL, 2013, '185818181', 1, NULL, '2016-04-12 22:45:05'),
(10, NULL, NULL, 2012, '1', 1, NULL, '2016-04-12 22:45:37'),
(11, NULL, NULL, 2011, '1', 1, NULL, '2016-04-12 22:45:45'),
(12, NULL, NULL, 2009, '1', 1, NULL, '2016-04-12 22:46:01'),
(13, NULL, NULL, 2010, '1', 1, NULL, '2016-04-12 22:46:10'),
(14, NULL, NULL, 2008, '1', 1, NULL, '2016-04-12 22:46:21'),
(15, NULL, NULL, 2007, '1', 1, NULL, '2016-04-12 22:46:32'),
(16, NULL, NULL, 2006, '1', 1, NULL, '2016-04-12 22:46:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poasoporte`
--

CREATE TABLE `poasoporte` (
  `id` int(11) NOT NULL,
  `poa_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza`
--

CREATE TABLE `poliza` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `consecutivo` int(11) NOT NULL,
  `cofinanciacion` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `poliza`
--

INSERT INTO `poliza` (`id`, `grupo_id`, `estado_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `consecutivo`, `cofinanciacion`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 167, NULL, NULL, 44848, '6589488', 1, NULL, '2016-04-14 17:35:18'),
(2, NULL, 166, NULL, NULL, 348948, '48844', 1, NULL, '2016-04-15 19:21:18'),
(3, NULL, 166, NULL, NULL, 261515, '151515', 1, NULL, '2016-04-15 19:21:36'),
(4, NULL, 166, NULL, NULL, 2, '5255', 1, NULL, '2016-04-15 19:21:46'),
(5, NULL, 166, NULL, NULL, 3, '54245', 1, NULL, '2016-04-15 19:21:54'),
(6, NULL, 166, NULL, NULL, 4, '687787', 1, NULL, '2016-04-15 19:22:02'),
(7, NULL, 166, NULL, NULL, 5, '577575', 1, NULL, '2016-04-15 19:22:09'),
(8, NULL, 166, NULL, NULL, 6, '857', 1, NULL, '2016-04-15 19:22:17'),
(9, NULL, 166, NULL, NULL, 7, '76875', 1, NULL, '2016-04-15 19:22:25'),
(10, NULL, 166, NULL, NULL, 8, '87668768', 1, NULL, '2016-04-15 19:22:33'),
(11, NULL, 166, NULL, NULL, 9, '877', 1, NULL, '2016-04-15 19:22:40'),
(12, NULL, 166, NULL, NULL, 9, '58', 1, NULL, '2016-04-15 19:22:52'),
(13, NULL, 166, NULL, NULL, 10, '5118481864', 1, NULL, '2016-04-15 19:23:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza_soporte`
--

CREATE TABLE `poliza_soporte` (
  `id` int(11) NOT NULL,
  `poliza_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_capacitacion_financiera`
--

CREATE TABLE `programa_capacitacion_financiera` (
  `id` int(11) NOT NULL,
  `talento_financiero_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `programa_capacitacion_financiera`
--

INSERT INTO `programa_capacitacion_financiera` (`id`, `talento_financiero_id`, `estado_id`, `municipio_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `lugar`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 169, 1, NULL, NULL, 'asdasd', 1, NULL, '2016-04-14 17:47:43'),
(2, 1, 169, 1, NULL, NULL, 'sdds', 1, NULL, '2016-04-15 19:36:29'),
(3, 1, 169, 1, NULL, NULL, 'qwer', 1, NULL, '2016-04-15 19:36:41'),
(4, 1, 169, 1, NULL, NULL, 'gfd', 1, NULL, '2016-04-15 19:46:13'),
(5, 1, 169, 1, NULL, NULL, 'gsf', 1, NULL, '2016-04-15 19:46:24'),
(6, 1, 169, 1, NULL, NULL, 'sdfgds', 1, NULL, '2016-04-15 19:46:39'),
(7, 1, 169, 1, NULL, NULL, 'sdsd', 1, NULL, '2016-04-15 19:46:49'),
(8, 1, 169, 1, NULL, NULL, 'qwer', 1, NULL, '2016-04-15 19:47:00'),
(9, 1, 169, 1, NULL, NULL, 'gdfs', 1, NULL, '2016-04-15 19:47:10'),
(10, 1, 169, 1, NULL, NULL, 'afsasfdfas', 1, NULL, '2016-04-15 19:47:29'),
(11, 1, 169, 1, NULL, NULL, 'qqwreqwre', 1, NULL, '2016-04-15 19:47:38'),
(12, 1, 169, 1, NULL, NULL, 'fasdasfd', 1, NULL, '2016-04-15 19:47:53'),
(13, 1, 170, 20, NULL, NULL, 'lugar 1', 1, NULL, '2016-04-28 18:37:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_capacitacion_financiera_soporte`
--

CREATE TABLE `programa_capacitacion_financiera_soporte` (
  `id` int(11) NOT NULL,
  `programa_capacitacion_financiera_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permiso` longtext COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `rol`, `permiso`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 1, 'ROLE_USER', '{"component":[{"id":1,"code":"1","path":"#","title":"Gestion Empresarial","checked":true,"module":[{"id":1,"code":"1","path":"#","title":"Formacion de capital social asociativo y desarrollo empresarial","checked":true,"subModule":[{"id":1,"code":"1","path":"gruposGestion","title":"Gestión de Grupos","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"CLEARGestion","title":"Gestión de CLEAR","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestión de seguimiento y monitoreo","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":2,"code":"2","path":"#","title":"Concursos de mejoramiento","checked":false,"subModule":[{"id":1,"code":"1","path":"concursoGestion","title":"Gestion de Concursos","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Gestion de Jurados","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestion de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":3,"code":"3","path":"#","title":"Servicios complementarios","checked":false,"subModule":[{"id":1,"code":"1","path":"#","title":"Participación rutas y pasantias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Participación en talleres","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Participación en Ferias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":4,"code":"4","path":"#","title":"Participación en ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":5,"code":"5","path":"#","title":"Desarrollo de ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]}]}]}', 1, '2016-01-26 16:15:04', '2016-01-18 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id` int(11) NOT NULL,
  `territorio_aprendizaje_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre_ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id`, `territorio_aprendizaje_id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre_ruta`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, NULL, NULL, NULL, 'Prueba 1', 'asdgd', 1, '2016-04-26 19:23:42', '2016-04-28 16:33:54'),
(2, NULL, NULL, NULL, NULL, 'prueba 2', 'afsd51af6afsd', 1, NULL, '2016-04-26 19:04:12'),
(3, NULL, NULL, NULL, NULL, 'asdf', 'asd48dfsafsd', 1, NULL, '2016-04-26 19:04:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_soporte`
--

CREATE TABLE `ruta_soporte` (
  `id` int(11) NOT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_beneficiario_ahorro`
--

CREATE TABLE `seguimiento_beneficiario_ahorro` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_fase`
--

CREATE TABLE `seguimiento_fase` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_mot`
--

CREATE TABLE `seguimiento_mot` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talento`
--

CREATE TABLE `talento` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `talento`
--

INSERT INTO `talento` (`id`, `tipo_id`, `tipo_documento_id`, `genero_id`, `pertenencia_etnica_id`, `grupo_indigena_id`, `rol_grupo_familiar_id`, `municipio_id`, `estado_civil_id`, `nivel_estudios_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `fecha_nacimiento`, `edad_inscripcion`, `joven_rural`, `direccion`, `rural`, `descripcion`, `corregimiento`, `vereda`, `cacerio`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `organizacion`, `fecha_inicio_talento`, `talento_madr`, `talento_otros_lugares`, `actividad_participado`, `area_desempeno_principal`, `area_desempeno_secundario`, `area_desempeno_terciario`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 150, 1, 6, 45, 50, 221, 1, 8, 29, NULL, NULL, '545155445', 'apellido1', 'apellido2', 'nombre1', 'nombre2', '2016-04-05 00:00:00', 15, 0, 'c151515', 0, 'sadsad', 'dsadsadsa', 'dasdsaas', 'dsasdadsa', '1554541478', '11775175175', 'prueba@correo.com', '4554', '2016-04-08 00:00:00', 0, 0, 'dassad', 'sdasad', 'sdasad', 'sdaasd', 1, NULL, '2016-04-13 18:32:45'),
(2, 150, 1, 6, 45, 50, 221, 1, NULL, 28, NULL, NULL, '16515', 'martinez', NULL, 'camilo', NULL, '2016-04-15 00:00:00', 19, 0, 'calle', NULL, 'asdfadfs', NULL, NULL, NULL, '884848484', '320481561841', 'correo@prueba.com', 'afsdfadsdfsa', '2016-04-15 00:00:00', 1, 1, 'afsdafdsfds', 'principal', 'secundario', 'fasddsf', 1, NULL, '2016-04-28 19:35:18'),
(3, 150, 1, 6, 45, 50, 221, 98, NULL, 28, NULL, NULL, '48484884', 'pepe', NULL, 'perez', NULL, '2016-04-21 00:00:00', 19, 1, 'calle', NULL, 'asfdasf', NULL, NULL, NULL, '78481448', '320481561841', 'correo@prueba.com', 'sdafdsaffads', '2016-04-20 00:00:00', 1, 1, 'adsfadsf', 'principall', 'secundarios', 'sgsdggsd', 1, NULL, '2016-04-28 19:37:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talento_soporte`
--

CREATE TABLE `talento_soporte` (
  `id` int(11) NOT NULL,
  `talento_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id` int(11) NOT NULL,
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
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `talento` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id`, `grupo_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha`, `objetivo`, `agenda`, `lugar`, `asistentes`, `observaciones`, `compromisos`, `active`, `fecha_modificacion`, `fecha_creacion`, `talento`) VALUES
(1, NULL, NULL, NULL, '2016-03-02 00:00:00', 'sdafasdf', 'sdafasd', 'dasfasd', 0, 'asdfasd', 'asdfasdfasdf', 1, NULL, '2016-03-18 21:23:35', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_soporte`
--

CREATE TABLE `taller_soporte` (
  `id` int(11) NOT NULL,
  `taller_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `taller_soporte`
--

INSERT INTO `taller_soporte` (`id`, `taller_id`, `tipo_soporte_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `path`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 3, NULL, NULL, '320cd4c376c3f402a09d330d3d86485dcba4c00e.png', 0, '2016-03-18 21:28:19', '2016-03-18 21:23:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `territorio_aprendizaje`
--

CREATE TABLE `territorio_aprendizaje` (
  `id` int(11) NOT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre_territorio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `territorio_aprendizaje`
--

INSERT INTO `territorio_aprendizaje` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre_territorio`, `observaciones`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'territorio1', 'observ', 1, NULL, '2016-04-28 16:33:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
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
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `password`, `salt`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`, `tipo_documento_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`) VALUES
(1, '111111', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '', '', '', '', 0, NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '', '', NULL, '', NULL),
(2, '$2y$13$nug00bsypis8kgwsw0440euZuIkfQpFju5ZOdG7zPn/11McKD4rCm', 'nug00bsypis8kgwsw0440o0o0swgw04', '7031447', '3057129065', 's.cantor@rmcproducciones.com', 1, NULL, '2016-01-12 14:40:51', 1, NULL, NULL, 's.cantor', 's.cantor', 's.cantor@rmcproducciones.com', 's.cantor@rmcproducciones.com', 1, '2016-04-28 15:55:41', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022376577', 'cantor', 'forero', 'juan', 'sebastian'),
(3, '$2y$13$mqri4n4dscg4s8wowoswgetXw8mtQ9h7rz94DZ.ew2lrvlQHtoqzW', 'mqri4n4dscg4s8wowoswgk004cgwogc', '1111111', '1234567897', 'juanc@hotmail.com', 1, NULL, '2016-01-29 17:29:49', 1, NULL, NULL, 'daniel', 'daniel', 'juanc@hotmail.com', 'juanc@hotmail.com', 1, '2016-01-29 18:06:10', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022376577', 'perez', 'bastidas', 'daniel', 'ricardo'),
(4, '$2y$13$fd8601sw4vco0cw8gk0gsu5YDCNEro073Zr6GJ7M9zPfN2ctMGbIu', 'fd8601sw4vco0cw8gk0gs8o8k4s8k8g', '10001001', '10001001', 'marcela.cortes.fonseca@gmail.com', 1, NULL, '2016-02-22 20:18:36', 1, NULL, NULL, 'marcela', 'marcela', 'marcela.cortes.fonseca@gmail.com', 'marcela.cortes.fonseca@gmail.com', 1, '2016-02-23 15:36:35', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '52814557', 'Cortes', NULL, 'Marcela', NULL),
(5, '$2y$13$67yodttax68s0ows80o44eg0oU2e6D3QstOiOFuYA4k2fzJAaNN5G', '67yodttax68s0ows80o44skko0ccw44', '1000100', '1000100', 'jarocha53@ucatolica.edu.com', 1, NULL, '2016-02-22 21:05:36', 1, NULL, NULL, 'j.rocha', 'j.rocha', 'jarocha53@ucatolica.edu.com', 'jarocha53@ucatolica.edu.com', 1, '2016-02-22 21:05:37', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '79884089', 'Rocha', NULL, 'Jhony', NULL),
(6, '$2y$13$2zo4pz4ola2ow0o80s0kceANQhTO0Nw4QjMLpv4yUyPF8ecqHTG7C', '2zo4pz4ola2ow0o80s0kco00osk888o', '342342', '34234234', 'asdasd@asdasd.com', 1, NULL, '2016-03-15 15:09:53', 1, NULL, NULL, 'armandocasas', 'armandocasas', 'asdasd@asdasd.com', 'asdasd@asdasd.com', 1, '2016-03-15 15:48:34', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '123123', 'casas', 'armando', 'armando', 'armando'),
(7, '$2y$13$4ze1n04a0r0oo80s40wkseXr9f0HiB2RWV5utmKc3lhWW9Kt9B6C2', '4ze1n04a0r0oo80s40wksggsoo0kg84', '7406128', '3204996137', 'c.martinez@rmcproducciones.com', 1, NULL, '2016-03-30 22:14:32', 1, NULL, NULL, 'c.martinez', 'c.martinez', 'c.martinez@rmcproducciones.com', 'c.martinez@rmcproducciones.com', 1, '2016-04-29 16:45:08', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022422820', 'Martinez', 'Grisales', 'Cristian', 'Camilo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_concurso`
--
ALTER TABLE `actividad_concurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_39B94E8CF415D168` (`concurso_id`),
  ADD KEY `IDX_39B94E8CDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_39B94E8CAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `actividad_soporte`
--
ALTER TABLE `actividad_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E08E306D6014FACA` (`actividad_id`),
  ADD KEY `IDX_E08E306DE24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_E08E306DDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_E08E306DAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FA45851308D77B2` (`seguimiento_fase_id`),
  ADD KEY `IDX_FA45851DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_FA45851AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `ahorro`
--
ALTER TABLE `ahorro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2F1C7D069C833003` (`grupo_id`),
  ADD KEY `IDX_2F1C7D069F5A440B` (`estado_id`);

--
-- Indices de la tabla `ahorro_soporte`
--
ALTER TABLE `ahorro_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A3A19E2EC5CE259` (`ahorro_id`),
  ADD KEY `IDX_A3A19E2E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_A3A19E2DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_A3A19E2AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_beneficiario_ahorro`
--
ALTER TABLE `asignacion_beneficiario_ahorro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_31D70FA3EC5CE259` (`ahorro_id`),
  ADD KEY `IDX_31D70FA34B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_31D70FA3DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_31D70FA3AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_beneficiario_comite_compras`
--
ALTER TABLE `asignacion_beneficiario_comite_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_66EBC8D19C833003` (`grupo_id`),
  ADD KEY `IDX_66EBC8D14B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_66EBC8D1DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_66EBC8D1AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_beneficiario_comite_vamos_bien`
--
ALTER TABLE `asignacion_beneficiario_comite_vamos_bien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_174C5B769C833003` (`grupo_id`),
  ADD KEY `IDX_174C5B764B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_174C5B76DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_174C5B76AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_beneficiario_estructura_organizacional`
--
ALTER TABLE `asignacion_beneficiario_estructura_organizacional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DF11E8089C833003` (`grupo_id`),
  ADD KEY `IDX_DF11E8084B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_DF11E8084BAB96C` (`rol_id`),
  ADD KEY `IDX_DF11E808DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_DF11E808AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_beneficiario_poliza`
--
ALTER TABLE `asignacion_beneficiario_poliza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_66DA46FDD5746945` (`poliza_id`),
  ADD KEY `IDX_66DA46FD4B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_66DA46FDDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_66DA46FDAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_beneficiario_programa_capacitacion_financiera`
--
ALTER TABLE `asignacion_beneficiario_programa_capacitacion_financiera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D8FF37416B25D3FE` (`programa_capacitacion_financiera_id`),
  ADD KEY `IDX_D8FF37414B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_D8FF3741F6F50196` (`participante_id`),
  ADD KEY `IDX_D8FF3741DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_D8FF3741AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_beneficiario_taller`
--
ALTER TABLE `asignacion_beneficiario_taller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D5437216DC343EA` (`taller_id`),
  ADD KEY `IDX_D5437219C833003` (`grupo_id`),
  ADD KEY `IDX_D5437214B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_D543721DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_D543721AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_beneficiario_visita`
--
ALTER TABLE `asignacion_beneficiario_visita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignacion_beneficiario_visitas`
--
ALTER TABLE `asignacion_beneficiario_visitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_85C360929C833003` (`grupo_id`),
  ADD KEY `IDX_85C360924B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_85C3609229B07FB3` (`nodo_id`),
  ADD KEY `IDX_85C36092DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_85C36092AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_contador_grupo`
--
ALTER TABLE `asignacion_contador_grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F432D0339C833003` (`grupo_id`),
  ADD KEY `IDX_F432D033C31645C0` (`contador_id`),
  ADD KEY `IDX_F432D033DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_F432D033AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_grupo_beneficiario_pasantia`
--
ALTER TABLE `asignacion_grupo_beneficiario_pasantia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_62E864EEBB6D3273` (`pasantia_id`),
  ADD KEY `IDX_62E864EE4B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_62E864EEDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_62E864EEAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_grupo_beneficiario_ruta`
--
ALTER TABLE `asignacion_grupo_beneficiario_ruta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9C201DDBABBC4845` (`ruta_id`),
  ADD KEY `IDX_9C201DDB4B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_9C201DDBDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_9C201DDBAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_grupo_clear`
--
ALTER TABLE `asignacion_grupo_clear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2858D49C9C833003` (`grupo_id`),
  ADD KEY `IDX_2858D49CD30DEA81` (`clear_id`),
  ADD KEY `IDX_2858D49CDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_2858D49CAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_grupo_comite`
--
ALTER TABLE `asignacion_grupo_comite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CC1659E09C833003` (`grupo_id`),
  ADD KEY `IDX_CC1659E0D61C3573` (`comite_id`),
  ADD KEY `IDX_CC1659E0DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_CC1659E0AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_grupo_concurso`
--
ALTER TABLE `asignacion_grupo_concurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B9FE2A369C833003` (`grupo_id`),
  ADD KEY `IDX_B9FE2A36F415D168` (`concurso_id`),
  ADD KEY `IDX_B9FE2A36DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_B9FE2A36AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_grupo_pasantia`
--
ALTER TABLE `asignacion_grupo_pasantia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A7D5E769C833003` (`grupo_id`),
  ADD KEY `IDX_A7D5E76BB6D3273` (`pasantia_id`),
  ADD KEY `IDX_A7D5E76DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_A7D5E76AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_grupo_ruta`
--
ALTER TABLE `asignacion_grupo_ruta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FD8DF9799C833003` (`grupo_id`),
  ADD KEY `IDX_FD8DF979ABBC4845` (`ruta_id`),
  ADD KEY `IDX_FD8DF979DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_FD8DF979AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_integrante_clear`
--
ALTER TABLE `asignacion_integrante_clear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ECDABF1FD30DEA81` (`clear_id`),
  ADD KEY `IDX_ECDABF1F6EA6C980` (`integrante_id`),
  ADD KEY `IDX_ECDABF1F4BAB96C` (`rol_id`),
  ADD KEY `IDX_ECDABF1FDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_ECDABF1FAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_integrante_comite`
--
ALTER TABLE `asignacion_integrante_comite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B8630911D61C3573` (`comite_id`),
  ADD KEY `IDX_B86309116EA6C980` (`integrante_id`),
  ADD KEY `IDX_B86309114BAB96C` (`rol_id`),
  ADD KEY `IDX_B8630911DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_B8630911AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_organizacion_pasantia`
--
ALTER TABLE `asignacion_organizacion_pasantia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_27E7E2A390B1019E` (`organizacion_id`),
  ADD KEY `IDX_27E7E2A3BB6D3273` (`pasantia_id`),
  ADD KEY `IDX_27E7E2A3DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_27E7E2A3AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_organizacion_ruta`
--
ALTER TABLE `asignacion_organizacion_ruta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A4DB9F4390B1019E` (`organizacion_id`),
  ADD KEY `IDX_A4DB9F43ABBC4845` (`ruta_id`),
  ADD KEY `IDX_A4DB9F43DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_A4DB9F43AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_organizacion_territorio_aprendizaje`
--
ALTER TABLE `asignacion_organizacion_territorio_aprendizaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9510DDB190B1019E` (`organizacion_id`),
  ADD KEY `IDX_9510DDB11281CB4C` (`territorio_aprendizaje_id`),
  ADD KEY `IDX_9510DDB1DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_9510DDB1AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_talento_seguimiento_fase`
--
ALTER TABLE `asignacion_talento_seguimiento_fase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D15A7A4F308D77B2` (`seguimiento_fase_id`),
  ADD KEY `IDX_D15A7A4FA193D038` (`seguimiento_mot_id`),
  ADD KEY `IDX_D15A7A4FCD13DD97` (`talento_id`),
  ADD KEY `IDX_D15A7A4FDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_D15A7A4FAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_usuario_beca`
--
ALTER TABLE `asignacion_usuario_beca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FF79C6A31D749D82` (`beca_id`),
  ADD KEY `IDX_FF79C6A3DB38439E` (`usuario_id`),
  ADD KEY `IDX_FF79C6A39F5A440B` (`estado_id`),
  ADD KEY `IDX_FF79C6A3DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_FF79C6A3AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_usuario_capacitacion`
--
ALTER TABLE `asignacion_usuario_capacitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BDD027055B587DA` (`capacitacion_id`),
  ADD KEY `IDX_BDD02705DB38439E` (`usuario_id`),
  ADD KEY `IDX_BDD027059F5A440B` (`estado_id`),
  ADD KEY `IDX_BDD02705DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_BDD02705AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `asignacion_usuario_evento`
--
ALTER TABLE `asignacion_usuario_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_34D8601987A5F842` (`evento_id`),
  ADD KEY `IDX_34D86019DB38439E` (`usuario_id`),
  ADD KEY `IDX_34D86019DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_34D86019AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `beca`
--
ALTER TABLE `beca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8A1280F5A9276E6C` (`tipo_id`),
  ADD KEY `IDX_8A1280F51E092B9F` (`modalidad_id`),
  ADD KEY `IDX_8A1280F558BC1BE0` (`municipio_id`),
  ADD KEY `IDX_8A1280F5DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_8A1280F5AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `beca_soporte`
--
ALTER TABLE `beca_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FCBA20C41D749D82` (`beca_id`),
  ADD KEY `IDX_FCBA20C4E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_FCBA20C4DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_FCBA20C4AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E8D0B6179C833003` (`grupo_id`),
  ADD KEY `IDX_E8D0B617F6939175` (`tipo_documento_id`),
  ADD KEY `IDX_E8D0B617BCE7B795` (`genero_id`),
  ADD KEY `IDX_E8D0B617DA995DEC` (`pertenencia_etnica_id`),
  ADD KEY `IDX_E8D0B6177AAA0F5A` (`grupo_indigena_id`),
  ADD KEY `IDX_E8D0B61713DA6592` (`discapacidad_id`),
  ADD KEY `IDX_E8D0B61775376D93` (`estado_civil_id`),
  ADD KEY `IDX_E8D0B617FFAE2092` (`rol_grupo_familiar_id`),
  ADD KEY `IDX_E8D0B6176313548C` (`hijos_menores_5_id`),
  ADD KEY `IDX_E8D0B61797F167E4` (`miembros_nucleo_familiar_id`),
  ADD KEY `IDX_E8D0B617378258DA` (`nivel_estudios_id`),
  ADD KEY `IDX_E8D0B617D8999C67` (`ocupacion_id`),
  ADD KEY `IDX_E8D0B617B4837970` (`tipo_vivienda_id`),
  ADD KEY `IDX_E8D0B617906677C2` (`tipo_documento_conyugue_id`),
  ADD KEY `IDX_E8D0B617DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_E8D0B617AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `beneficiario_pasantia`
--
ALTER TABLE `beneficiario_pasantia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `beneficiario_ruta`
--
ALTER TABLE `beneficiario_ruta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `beneficiario_soporte`
--
ALTER TABLE `beneficiario_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_492E09224B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_492E0922E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_492E0922DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_492E0922AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `calificacion_criterio_grupo_concurso`
--
ALTER TABLE `calificacion_criterio_grupo_concurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FA6CB6BDB9595895` (`criterio_calificacion_id`),
  ADD KEY `IDX_FA6CB6BD9C833003` (`grupo_id`),
  ADD KEY `IDX_FA6CB6BDF415D168` (`concurso_id`);

--
-- Indices de la tabla `calificacion_experiencia_exitosa`
--
ALTER TABLE `calificacion_experiencia_exitosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_46C93B57D327D072` (`experiencia_exitosa_id`),
  ADD KEY `IDX_46C93B57DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_46C93B57AEADF654` (`usuario_creacion_id`);

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
-- Indices de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A430D21A9276E6C` (`tipo_id`),
  ADD KEY `IDX_5A430D211E092B9F` (`modalidad_id`),
  ADD KEY `IDX_5A430D2158BC1BE0` (`municipio_id`),
  ADD KEY `IDX_5A430D21DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_5A430D21AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `capacitacion_financiera`
--
ALTER TABLE `capacitacion_financiera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_16AFBD3A6B25D3FE` (`programa_capacitacion_financiera_id`),
  ADD KEY `IDX_16AFBD3A9F5A440B` (`estado_id`),
  ADD KEY `IDX_16AFBD3ADADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_16AFBD3AAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `capacitacion_financiera_soporte`
--
ALTER TABLE `capacitacion_financiera_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_242A7B7758BFCBEC` (`capacitacion_financiera_id`),
  ADD KEY `IDX_242A7B77E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_242A7B77DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_242A7B77AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `capacitacion_soporte`
--
ALTER TABLE `capacitacion_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D90B771B5B587DA` (`capacitacion_id`),
  ADD KEY `IDX_D90B771BE24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_D90B771BDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_D90B771BAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `clear`
--
ALTER TABLE `clear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E5B1F10658BC1BE0` (`municipio_id`),
  ADD KEY `IDX_E5B1F106DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_E5B1F106AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `clear_soporte`
--
ALTER TABLE `clear_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_43AB6B2ED30DEA81` (`clear_id`),
  ADD KEY `IDX_43AB6B2EE24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_43AB6B2EDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_43AB6B2EAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `comite`
--
ALTER TABLE `comite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DC01CA9F58BC1BE0` (`municipio_id`),
  ADD KEY `IDX_DC01CA9FDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_DC01CA9FAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `comite_soporte`
--
ALTER TABLE `comite_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6FFBFCDED61C3573` (`comite_id`),
  ADD KEY `IDX_6FFBFCDEE24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_6FFBFCDEDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_6FFBFCDEAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `concurso`
--
ALTER TABLE `concurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_785F9DE6A9276E6C` (`tipo_id`),
  ADD KEY `IDX_785F9DE61E092B9F` (`modalidad_id`),
  ADD KEY `IDX_785F9DE6DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_785F9DE6AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `concurso_soporte`
--
ALTER TABLE `concurso_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_89B5F18DF415D168` (`concurso_id`),
  ADD KEY `IDX_89B5F18DE24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_89B5F18DDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_89B5F18DAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E83EF8FAF6939175` (`tipo_documento_id`),
  ADD KEY `IDX_E83EF8FABCE7B795` (`genero_id`),
  ADD KEY `IDX_E83EF8FADADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_E83EF8FAAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `contador_soporte`
--
ALTER TABLE `contador_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_69814D44C31645C0` (`contador_id`),
  ADD KEY `IDX_69814D44E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_69814D44DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_69814D44AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6D773021BB18C0BA` (`poa_id`),
  ADD KEY `IDX_6D773021DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_6D773021AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `convocatoria_soporte`
--
ALTER TABLE `convocatoria_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9C5592A44EE93BE6` (`convocatoria_id`),
  ADD KEY `IDX_9C5592A4E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_9C5592A4DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_9C5592A4AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `criterio_calificacion`
--
ALTER TABLE `criterio_calificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C5ADD4C2F415D168` (`concurso_id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_40E497EBDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_40E497EBAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `diagnostico_organizacional`
--
ALTER TABLE `diagnostico_organizacional`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_80B0ADF49C833003` (`grupo_id`),
  ADD KEY `IDX_80B0ADF4DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_80B0ADF4AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `distribucion_premio`
--
ALTER TABLE `distribucion_premio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FF5D91EAF415D168` (`concurso_id`),
  ADD KEY `IDX_FF5D91EA9C833003` (`grupo_id`);

--
-- Indices de la tabla `documento_soporte`
--
ALTER TABLE `documento_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D79FEA30DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_D79FEA30AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D9D9BF52308D77B2` (`seguimiento_fase_id`),
  ADD KEY `IDX_D9D9BF52DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_D9D9BF52AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `estructura_organizacional`
--
ALTER TABLE `estructura_organizacional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluacion_fase`
--
ALTER TABLE `evaluacion_fase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CA3109369C833003` (`grupo_id`),
  ADD KEY `IDX_CA310936DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_CA310936AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `evaluacion_fases`
--
ALTER TABLE `evaluacion_fases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D47E6B9B9C833003` (`grupo_id`),
  ADD KEY `IDX_D47E6B9BDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_D47E6B9BAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `evaluacion_fases_soporte`
--
ALTER TABLE `evaluacion_fases_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C069DE2B4D525882` (`evaluacionfases_id`),
  ADD KEY `IDX_C069DE2BE24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_C069DE2BDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_C069DE2BAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `evaluacion_fase_soporte`
--
ALTER TABLE `evaluacion_fase_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CCD6E0E029A9F86E` (`evaluacionfase_id`),
  ADD KEY `IDX_CCD6E0E0E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_CCD6E0E0DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_CCD6E0E0AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_47860B05A9276E6C` (`tipo_id`),
  ADD KEY `IDX_47860B0558BC1BE0` (`municipio_id`),
  ADD KEY `IDX_47860B05DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_47860B05AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `evento_soporte`
--
ALTER TABLE `evento_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1EB2F2B987A5F842` (`evento_id`),
  ADD KEY `IDX_1EB2F2B9E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_1EB2F2B9DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_1EB2F2B9AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `experiencia_exitosa`
--
ALTER TABLE `experiencia_exitosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_380325B19C833003` (`grupo_id`),
  ADD KEY `IDX_380325B1DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_380325B1AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `experiencia_exitosa_soporte`
--
ALTER TABLE `experiencia_exitosa_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E6739A508541B0D4` (`experienciaexitosa_id`),
  ADD KEY `IDX_E6739A50E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_E6739A50DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_E6739A50AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `feria`
--
ALTER TABLE `feria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5574FDFA9276E6C` (`tipo_id`),
  ADD KEY `IDX_5574FDF58BC1BE0` (`municipio_id`);

--
-- Indices de la tabla `feria_soporte`
--
ALTER TABLE `feria_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C27A0DA4627A20A5` (`feria_id`),
  ADD KEY `IDX_C27A0DA4E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_C27A0DA4DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_C27A0DA4AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8C0E9BD33A909126` (`nombre`),
  ADD UNIQUE KEY `UNIQ_8C0E9BD320332D99` (`codigo`),
  ADD KEY `IDX_8C0E9BD34EE93BE6` (`convocatoria_id`),
  ADD KEY `IDX_8C0E9BD358BC1BE0` (`municipio_id`),
  ADD KEY `IDX_8C0E9BD3A9276E6C` (`tipo_id`),
  ADD KEY `IDX_8C0E9BD3BE494C72` (`figura_legal_constitucion_id`),
  ADD KEY `IDX_8C0E9BD33771B82E` (`entidad_financiera_cuenta_id`),
  ADD KEY `IDX_8C0E9BD378814E56` (`tipo_cuenta_id`),
  ADD KEY `IDX_8C0E9BD3DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_8C0E9BD3AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `grupo_soporte`
--
ALTER TABLE `grupo_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5D2EB4619C833003` (`grupo_id`),
  ADD KEY `IDX_5D2EB461E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_5D2EB461DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_5D2EB461AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `habilitacion_fases`
--
ALTER TABLE `habilitacion_fases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_87643E129C833003` (`grupo_id`),
  ADD KEY `IDX_87643E12DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_87643E12AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `integrante`
--
ALTER TABLE `integrante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8AF632F6F6939175` (`tipo_documento_id`),
  ADD KEY `IDX_8AF632F6BCE7B795` (`genero_id`),
  ADD KEY `IDX_8AF632F6378258DA` (`nivel_estudios_id`),
  ADD KEY `IDX_8AF632F6DA995DEC` (`pertenencia_etnica_id`),
  ADD KEY `IDX_8AF632F6DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_8AF632F6AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `integrante_soporte`
--
ALTER TABLE `integrante_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_480A203A6EA6C980` (`integrante_id`),
  ADD KEY `IDX_480A203AE24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_480A203ADADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_480A203AAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C54ECE20DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_C54ECE20AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FE98F5E05A91C08D` (`departamento_id`),
  ADD KEY `IDX_FE98F5E0104EA8FC` (`zona_id`),
  ADD KEY `IDX_FE98F5E0DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_FE98F5E0AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `nodo`
--
ALTER TABLE `nodo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_65AA015BDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_65AA015BAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C200C5A63273AB8` (`linea_productiva_id`),
  ADD KEY `IDX_C200C5A58BC1BE0` (`municipio_id`),
  ADD KEY `IDX_C200C5A51BE510C` (`tipo_documento_contacto_id`),
  ADD KEY `IDX_C200C5ADADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_C200C5AAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `organizacion_pasantia`
--
ALTER TABLE `organizacion_pasantia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EDB08B86BB6D3273` (`pasantia_id`),
  ADD KEY `IDX_EDB08B8690B1019E` (`organizacion_id`),
  ADD KEY `IDX_EDB08B86DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_EDB08B86AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `organizacion_ruta`
--
ALTER TABLE `organizacion_ruta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3206E1A9ABBC4845` (`ruta_id`),
  ADD KEY `IDX_3206E1A990B1019E` (`organizacion_id`),
  ADD KEY `IDX_3206E1A9DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_3206E1A9AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `organizacion_soporte`
--
ALTER TABLE `organizacion_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B775B6F690B1019E` (`organizacion_id`),
  ADD KEY `IDX_B775B6F6E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_B775B6F6DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_B775B6F6AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `organizacion_territorio_aprendizaje`
--
ALTER TABLE `organizacion_territorio_aprendizaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5E54DCC51281CB4C` (`territorio_aprendizaje_id`),
  ADD KEY `IDX_5E54DCC590B1019E` (`organizacion_id`),
  ADD KEY `IDX_5E54DCC5DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_5E54DCC5AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_85BDC5C34B64ABC7` (`beneficiario_id`),
  ADD KEY `IDX_85BDC5C3F6939175` (`tipo_documento_id`),
  ADD KEY `IDX_85BDC5C3BCE7B795` (`genero_id`),
  ADD KEY `IDX_85BDC5C3DA995DEC` (`pertenencia_etnica_id`),
  ADD KEY `IDX_85BDC5C37AAA0F5A` (`grupo_indigena_id`),
  ADD KEY `IDX_85BDC5C313DA6592` (`discapacidad_id`),
  ADD KEY `IDX_85BDC5C375376D93` (`estado_civil_id`),
  ADD KEY `IDX_85BDC5C3FFAE2092` (`rol_grupo_familiar_id`),
  ADD KEY `IDX_85BDC5C36313548C` (`hijos_menores_5_id`),
  ADD KEY `IDX_85BDC5C3378258DA` (`nivel_estudios_id`),
  ADD KEY `IDX_85BDC5C3D8999C67` (`ocupacion_id`),
  ADD KEY `IDX_85BDC5C3B4837970` (`tipo_vivienda_id`),
  ADD KEY `IDX_85BDC5C3DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_85BDC5C3AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `pasantia`
--
ALTER TABLE `pasantia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CBDCE9A61281CB4C` (`territorio_aprendizaje_id`),
  ADD KEY `IDX_CBDCE9A690B1019E` (`organizacion_id`),
  ADD KEY `IDX_CBDCE9A69C833003` (`grupo_id`),
  ADD KEY `IDX_CBDCE9A6DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_CBDCE9A6AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `pasantia_soporte`
--
ALTER TABLE `pasantia_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_774CD3EABB6D3273` (`pasantia_id`),
  ADD KEY `IDX_774CD3EAE24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_774CD3EADADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_774CD3EAAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `patrocinador_feria`
--
ALTER TABLE `patrocinador_feria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plan_inversion`
--
ALTER TABLE `plan_inversion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `poa`
--
ALTER TABLE `poa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_736097E489A50577` (`anio`),
  ADD KEY `IDX_736097E4DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_736097E4AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `poasoporte`
--
ALTER TABLE `poasoporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1513E606BB18C0BA` (`poa_id`),
  ADD KEY `IDX_1513E606E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_1513E606DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_1513E606AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `poliza`
--
ALTER TABLE `poliza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_781134589C833003` (`grupo_id`),
  ADD KEY `IDX_781134589F5A440B` (`estado_id`),
  ADD KEY `IDX_78113458DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_78113458AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `poliza_soporte`
--
ALTER TABLE `poliza_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ADA8C8B9D5746945` (`poliza_id`),
  ADD KEY `IDX_ADA8C8B9E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_ADA8C8B9DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_ADA8C8B9AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1E23DEC6308D77B2` (`seguimiento_fase_id`),
  ADD KEY `IDX_1E23DEC6DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_1E23DEC6AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `programa_capacitacion_financiera`
--
ALTER TABLE `programa_capacitacion_financiera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_66386F135775952` (`talento_financiero_id`),
  ADD KEY `IDX_66386F19F5A440B` (`estado_id`),
  ADD KEY `IDX_66386F158BC1BE0` (`municipio_id`),
  ADD KEY `IDX_66386F1DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_66386F1AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `programa_capacitacion_financiera_soporte`
--
ALTER TABLE `programa_capacitacion_financiera_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AF4898F36B25D3FE` (`programa_capacitacion_financiera_id`),
  ADD KEY `IDX_AF4898F3E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_AF4898F3DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_AF4898F3AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E553F37DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_E553F37AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C3AEF08C1281CB4C` (`territorio_aprendizaje_id`),
  ADD KEY `IDX_C3AEF08C9C833003` (`grupo_id`),
  ADD KEY `IDX_C3AEF08CDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_C3AEF08CAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `ruta_soporte`
--
ALTER TABLE `ruta_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9B269362ABBC4845` (`ruta_id`),
  ADD KEY `IDX_9B269362E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_9B269362DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_9B269362AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `seguimiento_beneficiario_ahorro`
--
ALTER TABLE `seguimiento_beneficiario_ahorro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4D0FDEBD22507D80` (`asignacion_beneficiario_ahorro_id`),
  ADD KEY `IDX_4D0FDEBDDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_4D0FDEBDAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `seguimiento_fase`
--
ALTER TABLE `seguimiento_fase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C0EF2E519C833003` (`grupo_id`),
  ADD KEY `IDX_C0EF2E51DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_C0EF2E51AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `seguimiento_mot`
--
ALTER TABLE `seguimiento_mot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_569ADBF09C833003` (`grupo_id`),
  ADD KEY `IDX_569ADBF0DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_569ADBF0AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `talento`
--
ALTER TABLE `talento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C2CE4CD5A9276E6C` (`tipo_id`),
  ADD KEY `IDX_C2CE4CD5F6939175` (`tipo_documento_id`),
  ADD KEY `IDX_C2CE4CD5BCE7B795` (`genero_id`),
  ADD KEY `IDX_C2CE4CD5DA995DEC` (`pertenencia_etnica_id`),
  ADD KEY `IDX_C2CE4CD57AAA0F5A` (`grupo_indigena_id`),
  ADD KEY `IDX_C2CE4CD5FFAE2092` (`rol_grupo_familiar_id`),
  ADD KEY `IDX_C2CE4CD558BC1BE0` (`municipio_id`),
  ADD KEY `IDX_C2CE4CD575376D93` (`estado_civil_id`),
  ADD KEY `IDX_C2CE4CD5378258DA` (`nivel_estudios_id`),
  ADD KEY `IDX_C2CE4CD5DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_C2CE4CD5AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `talento_soporte`
--
ALTER TABLE `talento_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_30E78B1CD13DD97` (`talento_id`),
  ADD KEY `IDX_30E78B1E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_30E78B1DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_30E78B1AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_139F45849C833003` (`grupo_id`),
  ADD KEY `IDX_139F4584DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_139F4584AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `taller_soporte`
--
ALTER TABLE `taller_soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7C5D43816DC343EA` (`taller_id`),
  ADD KEY `IDX_7C5D4381E24646FA` (`tipo_soporte_id`),
  ADD KEY `IDX_7C5D4381DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_7C5D4381AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `territorio_aprendizaje`
--
ALTER TABLE `territorio_aprendizaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BEEEAF15DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_BEEEAF15AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2265B05D92FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_2265B05DA0D96FBF` (`email_canonical`),
  ADD KEY `IDX_2265B05DF6939175` (`tipo_documento_id`),
  ADD KEY `IDX_2265B05DDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_2265B05DAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_808D9E308D77B2` (`seguimiento_fase_id`),
  ADD KEY `IDX_808D9EDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_808D9EAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B7F148A29C833003` (`grupo_id`),
  ADD KEY `IDX_B7F148A2308D77B2` (`seguimiento_fase_id`),
  ADD KEY `IDX_B7F148A229B07FB3` (`nodo_id`),
  ADD KEY `IDX_B7F148A2DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_B7F148A2AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A786041EDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_A786041EAEADF654` (`usuario_creacion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_concurso`
--
ALTER TABLE `actividad_concurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `actividad_soporte`
--
ALTER TABLE `actividad_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `activos`
--
ALTER TABLE `activos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ahorro`
--
ALTER TABLE `ahorro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `ahorro_soporte`
--
ALTER TABLE `ahorro_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_beneficiario_ahorro`
--
ALTER TABLE `asignacion_beneficiario_ahorro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_beneficiario_comite_compras`
--
ALTER TABLE `asignacion_beneficiario_comite_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_beneficiario_comite_vamos_bien`
--
ALTER TABLE `asignacion_beneficiario_comite_vamos_bien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `asignacion_beneficiario_estructura_organizacional`
--
ALTER TABLE `asignacion_beneficiario_estructura_organizacional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_beneficiario_poliza`
--
ALTER TABLE `asignacion_beneficiario_poliza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_beneficiario_programa_capacitacion_financiera`
--
ALTER TABLE `asignacion_beneficiario_programa_capacitacion_financiera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_beneficiario_taller`
--
ALTER TABLE `asignacion_beneficiario_taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_beneficiario_visita`
--
ALTER TABLE `asignacion_beneficiario_visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_beneficiario_visitas`
--
ALTER TABLE `asignacion_beneficiario_visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_contador_grupo`
--
ALTER TABLE `asignacion_contador_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `asignacion_grupo_beneficiario_pasantia`
--
ALTER TABLE `asignacion_grupo_beneficiario_pasantia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_grupo_beneficiario_ruta`
--
ALTER TABLE `asignacion_grupo_beneficiario_ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_grupo_clear`
--
ALTER TABLE `asignacion_grupo_clear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_grupo_comite`
--
ALTER TABLE `asignacion_grupo_comite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_grupo_concurso`
--
ALTER TABLE `asignacion_grupo_concurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_grupo_pasantia`
--
ALTER TABLE `asignacion_grupo_pasantia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_grupo_ruta`
--
ALTER TABLE `asignacion_grupo_ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_integrante_clear`
--
ALTER TABLE `asignacion_integrante_clear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_integrante_comite`
--
ALTER TABLE `asignacion_integrante_comite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_organizacion_pasantia`
--
ALTER TABLE `asignacion_organizacion_pasantia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_organizacion_ruta`
--
ALTER TABLE `asignacion_organizacion_ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_organizacion_territorio_aprendizaje`
--
ALTER TABLE `asignacion_organizacion_territorio_aprendizaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_talento_seguimiento_fase`
--
ALTER TABLE `asignacion_talento_seguimiento_fase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_usuario_beca`
--
ALTER TABLE `asignacion_usuario_beca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_usuario_capacitacion`
--
ALTER TABLE `asignacion_usuario_capacitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_usuario_evento`
--
ALTER TABLE `asignacion_usuario_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `beca`
--
ALTER TABLE `beca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `beca_soporte`
--
ALTER TABLE `beca_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `beneficiario_pasantia`
--
ALTER TABLE `beneficiario_pasantia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `beneficiario_ruta`
--
ALTER TABLE `beneficiario_ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `beneficiario_soporte`
--
ALTER TABLE `beneficiario_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `calificacion_criterio_grupo_concurso`
--
ALTER TABLE `calificacion_criterio_grupo_concurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `calificacion_experiencia_exitosa`
--
ALTER TABLE `calificacion_experiencia_exitosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `camino`
--
ALTER TABLE `camino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `capacitacion_financiera`
--
ALTER TABLE `capacitacion_financiera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `capacitacion_financiera_soporte`
--
ALTER TABLE `capacitacion_financiera_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `capacitacion_soporte`
--
ALTER TABLE `capacitacion_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clear`
--
ALTER TABLE `clear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `clear_soporte`
--
ALTER TABLE `clear_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comite`
--
ALTER TABLE `comite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `comite_soporte`
--
ALTER TABLE `comite_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `concurso`
--
ALTER TABLE `concurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `concurso_soporte`
--
ALTER TABLE `concurso_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contador`
--
ALTER TABLE `contador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `contador_soporte`
--
ALTER TABLE `contador_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `convocatoria_soporte`
--
ALTER TABLE `convocatoria_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `criterio_calificacion`
--
ALTER TABLE `criterio_calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `diagnostico_organizacional`
--
ALTER TABLE `diagnostico_organizacional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `distribucion_premio`
--
ALTER TABLE `distribucion_premio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `documento_soporte`
--
ALTER TABLE `documento_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estructura_organizacional`
--
ALTER TABLE `estructura_organizacional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evaluacion_fase`
--
ALTER TABLE `evaluacion_fase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evaluacion_fases`
--
ALTER TABLE `evaluacion_fases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evaluacion_fases_soporte`
--
ALTER TABLE `evaluacion_fases_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evaluacion_fase_soporte`
--
ALTER TABLE `evaluacion_fase_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `evento_soporte`
--
ALTER TABLE `evento_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `experiencia_exitosa`
--
ALTER TABLE `experiencia_exitosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `experiencia_exitosa_soporte`
--
ALTER TABLE `experiencia_exitosa_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `feria`
--
ALTER TABLE `feria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `feria_soporte`
--
ALTER TABLE `feria_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `grupo_soporte`
--
ALTER TABLE `grupo_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `habilitacion_fases`
--
ALTER TABLE `habilitacion_fases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `integrante`
--
ALTER TABLE `integrante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `integrante_soporte`
--
ALTER TABLE `integrante_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `nodo`
--
ALTER TABLE `nodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `organizacion_pasantia`
--
ALTER TABLE `organizacion_pasantia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `organizacion_ruta`
--
ALTER TABLE `organizacion_ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `organizacion_soporte`
--
ALTER TABLE `organizacion_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `organizacion_territorio_aprendizaje`
--
ALTER TABLE `organizacion_territorio_aprendizaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `pasantia`
--
ALTER TABLE `pasantia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `pasantia_soporte`
--
ALTER TABLE `pasantia_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `patrocinador_feria`
--
ALTER TABLE `patrocinador_feria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `plan_inversion`
--
ALTER TABLE `plan_inversion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `poa`
--
ALTER TABLE `poa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `poasoporte`
--
ALTER TABLE `poasoporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `poliza`
--
ALTER TABLE `poliza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `poliza_soporte`
--
ALTER TABLE `poliza_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `programa_capacitacion_financiera`
--
ALTER TABLE `programa_capacitacion_financiera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `programa_capacitacion_financiera_soporte`
--
ALTER TABLE `programa_capacitacion_financiera_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ruta_soporte`
--
ALTER TABLE `ruta_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seguimiento_beneficiario_ahorro`
--
ALTER TABLE `seguimiento_beneficiario_ahorro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seguimiento_fase`
--
ALTER TABLE `seguimiento_fase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seguimiento_mot`
--
ALTER TABLE `seguimiento_mot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `talento`
--
ALTER TABLE `talento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `talento_soporte`
--
ALTER TABLE `talento_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `taller_soporte`
--
ALTER TABLE `taller_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `territorio_aprendizaje`
--
ALTER TABLE `territorio_aprendizaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
-- Filtros para la tabla `documento_soporte`
--
ALTER TABLE `documento_soporte`
  ADD CONSTRAINT `FK_D79FEA30AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D79FEA30DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_D9D9BF52308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_D9D9BF52AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D9D9BF52DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `evaluacion_fase`
--
ALTER TABLE `evaluacion_fase`
  ADD CONSTRAINT `FK_CA3109369C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_CA310936AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CA310936DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

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
-- Filtros para la tabla `evaluacion_fase_soporte`
--
ALTER TABLE `evaluacion_fase_soporte`
  ADD CONSTRAINT `FK_CCD6E0E029A9F86E` FOREIGN KEY (`evaluacionfase_id`) REFERENCES `evaluacion_fase` (`id`),
  ADD CONSTRAINT `FK_CCD6E0E0AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CCD6E0E0DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CCD6E0E0E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

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
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `FK_A786041EAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A786041EDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
