-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2016 a las 21:40:45
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
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_39B94E8CF415D168` (`concurso_id`),
  KEY `IDX_39B94E8CDADD026` (`usuario_modificacion_id`),
  KEY `IDX_39B94E8CAEADF654` (`usuario_creacion_id`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `taller` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `red_unidos` tinyint(1) DEFAULT NULL,
  `sabe_leer` tinyint(1) DEFAULT NULL,
  `sabe_escribir` tinyint(1) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rural` tinyint(1) NOT NULL,
  `barrio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corregimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vereda` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cacerio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_criterio_grupo_concurso`
--

CREATE TABLE IF NOT EXISTS `calificacion_criterio_grupo_concurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `criterioCalificacion` int(11) NOT NULL,
  `asignacionGrupoConcurso` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `valor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `distribucion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `criterios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aprobacion` tinyint(1) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_785F9DE6A9276E6C` (`tipo_id`),
  KEY `IDX_785F9DE61E092B9F` (`modalidad_id`),
  KEY `IDX_785F9DE6DADD026` (`usuario_modificacion_id`),
  KEY `IDX_785F9DE6AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `grupo_id` int(11) DEFAULT NULL,
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
  KEY `IDX_E83EF8FA9C833003` (`grupo_id`),
  KEY `IDX_E83EF8FAF6939175` (`tipo_documento_id`),
  KEY `IDX_E83EF8FABCE7B795` (`genero_id`),
  KEY `IDX_E83EF8FADADD026` (`usuario_modificacion_id`),
  KEY `IDX_E83EF8FAAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `concurso` int(11) NOT NULL,
  `criterio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maximo_puntaje` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
(1, NULL, NULL, 'CAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(2, NULL, NULL, 'NARIÑO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(3, NULL, NULL, 'ARAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(4, NULL, NULL, 'NTE DE SANTANDER', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(5, NULL, NULL, 'CESAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(6, NULL, NULL, 'LA GUAJIRA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(7, NULL, NULL, 'MAGDALENA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(8, NULL, NULL, 'META', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(9, NULL, NULL, 'BOLIVAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(10, NULL, NULL, 'SUCRE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(11, NULL, NULL, 'ANTIOQUIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(12, NULL, NULL, 'CORDOBA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(13, NULL, NULL, 'TOLIMA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(14, NULL, NULL, 'VALLE DEL CAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(15, NULL, NULL, 'CHOCO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(16, NULL, NULL, 'PUTUMAYO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(17, NULL, NULL, 'CAQUETA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribucion_premio`
--

CREATE TABLE IF NOT EXISTS `distribucion_premio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concurso` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
-- Estructura de tabla para la tabla `evaluacion_fase`
--

CREATE TABLE IF NOT EXISTS `evaluacion_fase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fase` int(11) DEFAULT NULL,
  `calificacion` decimal(10,0) NOT NULL,
  `aprobado` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CA3109369C833003` (`grupo_id`),
  KEY `IDX_CA310936DADD026` (`usuario_modificacion_id`),
  KEY `IDX_CA310936AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_fase_soporte`
--

CREATE TABLE IF NOT EXISTS `evaluacion_fase_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluacionfase_id` int(11) DEFAULT NULL,
  `tipo_soporte_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CCD6E0E029A9F86E` (`evaluacionfase_id`),
  KEY `IDX_CCD6E0E0E24646FA` (`tipo_soporte_id`),
  KEY `IDX_CCD6E0E0DADD026` (`usuario_modificacion_id`),
  KEY `IDX_CCD6E0E0AEADF654` (`usuario_creacion_id`)
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
  `active` tinyint(1) NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5574FDFA9276E6C` (`tipo_id`),
  KEY `IDX_5574FDF58BC1BE0` (`municipio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `fecha_inscripcion` datetime NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `numero_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
(1, 1, 1, NULL, 1, 'ARGELIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(2, 1, 1, NULL, 1, 'BALBOA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(3, 1, 1, NULL, 1, 'GUAPI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(4, 1, 1, NULL, 1, 'LOPEZ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(5, 1, 1, NULL, 1, 'TIMBIQUI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(6, 1, 1, NULL, 1, 'EL TAMBO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(7, 1, 2, NULL, 1, 'TORIBIO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(8, 1, 2, NULL, 1, 'CALOTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(9, 1, 2, NULL, 1, 'CORINTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(10, 1, 2, NULL, 1, 'SANTANDER DE QUILICHAO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(11, 1, 2, NULL, 1, 'JAMBALO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(12, 1, 2, NULL, 1, 'MIRANDA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(13, 2, 3, NULL, 1, 'BARBACOAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(14, 2, 3, NULL, 1, 'OLAYA HERRERA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(15, 2, 3, NULL, 1, 'RICAURTE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(16, 2, 3, NULL, 1, 'SAN ANDRES DE TUMACO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(17, 2, 4, NULL, 1, 'LEIVA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(18, 2, 4, NULL, 1, 'EL ROSARIO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(19, 2, 4, NULL, 1, 'POLICARPA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(20, 2, 4, NULL, 1, 'SAMANIEGO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(21, 2, 4, NULL, 1, 'CUMBITARA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(22, 3, 5, NULL, 1, 'ARAUQUITA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(23, 3, 5, NULL, 1, 'FORTUL', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(24, 3, 5, NULL, 1, 'SARAVENA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(25, 3, 5, NULL, 1, 'TAME', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(26, 4, 6, NULL, 1, 'ABREGO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(27, 4, 6, NULL, 1, 'EL TARRA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(28, 4, 6, NULL, 1, 'HACARI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(29, 4, 6, NULL, 1, 'LA PLAYA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(30, 4, 6, NULL, 1, 'OCANA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(31, 4, 6, NULL, 1, 'SAN CALIXTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(32, 4, 6, NULL, 1, 'TEORAMA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(33, 4, 6, NULL, 1, 'CONVENCION', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(34, 4, 6, NULL, 1, 'EL CARMEN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(35, 4, 6, NULL, 1, 'TIBU', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(36, 5, 7, NULL, 1, 'PUEBLO BELLO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(37, 5, 7, NULL, 1, 'VALLEDUPAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(38, 6, 7, NULL, 1, 'DIBULLA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(39, 6, 7, NULL, 1, 'SAN JUAN DEL CESAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(40, 7, 7, NULL, 1, 'ARACATACA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(41, 7, 7, NULL, 1, 'CIENAGA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(42, 7, 7, NULL, 1, 'FUNDACION', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(43, 7, 7, NULL, 1, 'SANTA MARTA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(44, 7, 7, NULL, 1, 'ALGARROBO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(45, 8, 8, NULL, 1, 'LA MACARENA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(46, 8, 8, NULL, 1, 'MESETAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(47, 8, 8, NULL, 1, 'PUERTO RICO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(48, 8, 8, NULL, 1, 'SAN JUAN DE ARAMA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(49, 8, 8, NULL, 1, 'URIBE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(50, 8, 8, NULL, 1, 'VISTAHERMOSA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(51, 9, 9, NULL, 1, 'EL CARMEN DE BOLIVAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(52, 9, 9, NULL, 1, 'SAN JACINTO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(53, 10, 9, NULL, 1, 'OVEJAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(54, 10, 9, NULL, 1, 'SAN ONOFRE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(55, 11, 10, NULL, 1, 'CACERES', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(56, 11, 10, NULL, 1, 'CAUCASIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(57, 11, 10, NULL, 1, 'EL BAGRE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(58, 11, 10, NULL, 1, 'NECH', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(59, 11, 10, NULL, 1, 'ZARAGOZA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(60, 11, 10, NULL, 1, 'ANORI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(61, 11, 10, NULL, 1, 'BRICEÑO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(62, 11, 10, NULL, 1, 'ITUANGO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(63, 11, 10, NULL, 1, 'VALDIVIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(64, 11, 10, NULL, 1, 'TARAZA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(65, 12, 11, NULL, 1, 'MONTELIBANO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(66, 12, 11, NULL, 1, 'PUERTO LIBERTADOR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(67, 12, 11, NULL, 1, 'TIERRALTA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(68, 12, 11, NULL, 1, 'VALENCIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(69, 12, 11, NULL, 1, 'SAN JOSE DE URE', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(70, 13, 12, NULL, 1, 'ATACO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(71, 13, 12, NULL, 1, 'CHAPARRAL', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(72, 13, 12, NULL, 1, 'PLANADAS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(73, 13, 12, NULL, 1, 'RIOBLANCO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(74, 14, 13, NULL, 1, 'FLORIDA ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(75, 14, 13, NULL, 1, 'GUADALAJARA DE BUGA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(76, 14, 13, NULL, 1, 'PRADERA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(77, 14, 13, NULL, 1, 'TULUA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(78, 14, 13, NULL, 1, 'BUENAVENTURA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(79, 15, 14, NULL, 1, 'EL LITORAL DEL SAN JUAN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(80, 15, 14, NULL, 1, 'ISTMINA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(81, 15, 14, NULL, 1, 'NOVITA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(82, 15, 14, NULL, 1, 'SIPI', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(83, 15, 14, NULL, 1, 'MEDIO SAN JUAN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(84, 15, 14, NULL, 1, 'SAN JOSE DEL PALMAR', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(85, 15, 14, NULL, 1, 'ALTO BAUDO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(86, 15, 14, NULL, 1, 'MEDIO BAUDO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(87, 15, 14, NULL, 1, 'BAJO BAUDO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(88, 15, 15, NULL, 1, 'CARMEN DEL DARIEN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(89, 15, 15, NULL, 1, 'RIOSUCIO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(90, 15, 15, NULL, 1, 'UNGUIA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(91, 11, 15, NULL, 1, 'MUTATA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(92, 11, 16, NULL, 1, 'GRANADA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(93, 11, 16, NULL, 1, 'SAN CARLOS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(94, 11, 16, NULL, 1, 'SAN FRANCISCO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(95, 16, 17, NULL, 1, 'PUERTO LEGUIZAMO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(96, 16, 17, NULL, 1, 'PUERTO ASIS', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(97, 16, 17, NULL, 1, 'SAN MIGUEL', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(98, 16, 17, NULL, 1, 'VALLE DEL GUAMUEZ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(99, 17, 18, NULL, 1, 'CARTAGENA DEL CHAIRA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', ''),
(100, 17, 18, NULL, 1, 'SAN VICENTE DEL CAGUAN', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '', '');

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
  `barrio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corregimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vereda` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cacerio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CBDCE9A61281CB4C` (`territorio_aprendizaje_id`),
  KEY `IDX_CBDCE9A690B1019E` (`organizacion_id`),
  KEY `IDX_CBDCE9A69C833003` (`grupo_id`),
  KEY `IDX_CBDCE9A6DADD026` (`usuario_modificacion_id`),
  KEY `IDX_CBDCE9A6AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `rol`, `permiso`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, 1, 'ROLE_USER', '{"component":[{"id":1,"code":"1","path":"#","title":"Gestion Empresarial","checked":true,"module":[{"id":1,"code":"1","path":"#","title":"Formacion de capital social asociativo y desarrollo empresarial","checked":true,"subModule":[{"id":1,"code":"1","path":"gruposGestion","title":"Gestión de Grupos","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"CLEARGestion","title":"Gestión de CLEAR","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestión de seguimiento y monitoreo","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":2,"code":"2","path":"#","title":"Concursos de mejoramiento","checked":false,"subModule":[{"id":1,"code":"1","path":"concursoGestion","title":"Gestion de Concursos","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Gestion de Jurados","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestion de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":3,"code":"3","path":"#","title":"Servicios complementarios","checked":false,"subModule":[{"id":1,"code":"1","path":"#","title":"Participación rutas y pasantias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Participación en talleres","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Participación en Ferias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":4,"code":"4","path":"#","title":"Participación en ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":5,"code":"5","path":"#","title":"Desarrollo de ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]}]}]}', 1, '2016-01-26 16:15:04', '2016-01-18 00:00:00');

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
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C3AEF08C1281CB4C` (`territorio_aprendizaje_id`),
  KEY `IDX_C3AEF08C9C833003` (`grupo_id`),
  KEY `IDX_C3AEF08CDADD026` (`usuario_modificacion_id`),
  KEY `IDX_C3AEF08CAEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `asistentes` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `compromisos` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comite_compras` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_139F45849C833003` (`grupo_id`),
  KEY `IDX_139F4584DADD026` (`usuario_modificacion_id`),
  KEY `IDX_139F4584AEADF654` (`usuario_creacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `password`, `salt`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`, `tipo_documento_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`) VALUES
(1, '111111', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '', '', '', '', 0, NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '', '', NULL, '', NULL),
(2, '$2y$13$nug00bsypis8kgwsw0440euZuIkfQpFju5ZOdG7zPn/11McKD4rCm', 'nug00bsypis8kgwsw0440o0o0swgw04', '7031447', '3057129065', 's.cantor@rmcproducciones.com', 1, NULL, '2016-01-12 14:40:51', 1, NULL, NULL, 's.cantor', 's.cantor', 's.cantor@rmcproducciones.com', 's.cantor@rmcproducciones.com', 1, '2016-02-23 19:57:44', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022376577', 'cantor', 'forero', 'juan', 'sebastian'),
(3, '$2y$13$mqri4n4dscg4s8wowoswgetXw8mtQ9h7rz94DZ.ew2lrvlQHtoqzW', 'mqri4n4dscg4s8wowoswgk004cgwogc', '1111111', '1234567897', 'juanc@hotmail.com', 1, NULL, '2016-01-29 17:29:49', 1, NULL, NULL, 'daniel', 'daniel', 'juanc@hotmail.com', 'juanc@hotmail.com', 1, '2016-01-29 18:06:10', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022376577', 'perez', 'bastidas', 'daniel', 'ricardo'),
(4, '$2y$13$fd8601sw4vco0cw8gk0gsu5YDCNEro073Zr6GJ7M9zPfN2ctMGbIu', 'fd8601sw4vco0cw8gk0gs8o8k4s8k8g', '10001001', '10001001', 'marcela.cortes.fonseca@gmail.com', 1, NULL, '2016-02-22 20:18:36', 1, NULL, NULL, 'marcela', 'marcela', 'marcela.cortes.fonseca@gmail.com', 'marcela.cortes.fonseca@gmail.com', 1, '2016-02-23 15:36:35', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '52814557', 'Cortes', NULL, 'Marcela', NULL),
(5, '$2y$13$67yodttax68s0ows80o44eg0oU2e6D3QstOiOFuYA4k2fzJAaNN5G', '67yodttax68s0ows80o44skko0ccw44', '1000100', '1000100', 'jarocha53@ucatolica.edu.com', 1, NULL, '2016-02-22 21:05:36', 1, NULL, NULL, 'j.rocha', 'j.rocha', 'jarocha53@ucatolica.edu.com', 'jarocha53@ucatolica.edu.com', 1, '2016-02-22 21:05:37', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '79884089', 'Rocha', NULL, 'Jhony', NULL);

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
  `fecha` datetime NOT NULL,
  `objetivo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `agenda` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lugar` longtext COLLATE utf8_unicode_ci NOT NULL,
  `asistentes` int(11) NOT NULL,
  `comite_compras` tinyint(1) NOT NULL,
  `funcionamiento_comite_compras` int(11) DEFAULT NULL,
  `comite_vamos_bien` tinyint(1) NOT NULL,
  `funcionamiento_comite_vamos_bien` int(11) DEFAULT NULL,
  `logros_compras` longtext COLLATE utf8_unicode_ci NOT NULL,
  `logros_vamos_bien` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contador` tinyint(1) NOT NULL,
  `desempeno_contador` int(11) DEFAULT NULL,
  `observaciones_contador` longtext COLLATE utf8_unicode_ci NOT NULL,
  `observaciones_presupuesto_asignado` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cambios_presupuesto_asignado` tinyint(1) NOT NULL,
  `cambios_razones_presupuesto_asignado` longtext COLLATE utf8_unicode_ci NOT NULL,
  `desempeno_organizacional` longtext COLLATE utf8_unicode_ci NOT NULL,
  `desempeno_productivo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `desempeno_comercial` longtext COLLATE utf8_unicode_ci NOT NULL,
  `desempeno_administrativo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `desempeno_financiero` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cambios_integrantes_grupo` tinyint(1) NOT NULL,
  `cambios_razones_integrantes_grupo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `compromisos` longtext COLLATE utf8_unicode_ci NOT NULL,
  `interventoria` tinyint(1) NOT NULL,
  `razones_interventoria` longtext COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B7F148A29C833003` (`grupo_id`),
  KEY `IDX_B7F148A2308D77B2` (`seguimiento_fase_id`),
  KEY `IDX_B7F148A229B07FB3` (`nodo_id`),
  KEY `IDX_B7F148A2DADD026` (`usuario_modificacion_id`),
  KEY `IDX_B7F148A2AEADF654` (`usuario_creacion_id`)
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
(1, NULL, 1, 'Cauca Costa pacifica', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(2, NULL, 1, 'Cauca Andino', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(3, NULL, 1, 'Nariño Costa Pacifico', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(4, NULL, 1, 'Nariño Andino ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(5, NULL, 1, 'Arauca', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(6, NULL, 1, 'Catatumbo ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(7, NULL, 1, 'Sierra Nevada Santa Marta', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(8, NULL, 1, 'Region de la macarena ', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(9, NULL, 1, 'Montes de Maria', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(10, NULL, 1, 'Nudo de Paramillo Antioquia', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(11, NULL, 1, 'Nudo de Paramillo Cordoba', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(12, NULL, 1, 'Sur del Tolima', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(13, NULL, 1, 'Valle del Cauca', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(14, NULL, 1, 'Sur de Choco', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(15, NULL, 1, 'Medio y bajo Atrato', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(16, NULL, 1, 'Oriente Antioque', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(17, NULL, 1, 'Putumayo', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', ''),
(18, NULL, 1, 'Rio Caguan', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00', '');

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
-- Filtros para la tabla `activos`
--
ALTER TABLE `activos`
  ADD CONSTRAINT `FK_FA45851AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FA45851308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_FA45851DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `ahorro`
--
ALTER TABLE `ahorro`
  ADD CONSTRAINT `FK_2F1C7D069F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_2F1C7D069C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`);

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
  ADD CONSTRAINT `FK_31D70FA3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_31D70FA34B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_31D70FA3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_31D70FA3EC5CE259` FOREIGN KEY (`ahorro_id`) REFERENCES `ahorro` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_comite_compras`
--
ALTER TABLE `asignacion_beneficiario_comite_compras`
  ADD CONSTRAINT `FK_66EBC8D1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_66EBC8D14B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_66EBC8D19C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_66EBC8D1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_comite_vamos_bien`
--
ALTER TABLE `asignacion_beneficiario_comite_vamos_bien`
  ADD CONSTRAINT `FK_174C5B76AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_174C5B764B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_174C5B769C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_174C5B76DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_beneficiario_estructura_organizacional`
--
ALTER TABLE `asignacion_beneficiario_estructura_organizacional`
  ADD CONSTRAINT `FK_DF11E808AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_DF11E8084B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_DF11E8084BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_DF11E8089C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_DF11E808DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

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
-- Filtros para la tabla `asignacion_grupo_beneficiario_pasantia`
--
ALTER TABLE `asignacion_grupo_beneficiario_pasantia`
  ADD CONSTRAINT `FK_62E864EEAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_62E864EE4B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_62E864EEBB6D3273` FOREIGN KEY (`pasantia_id`) REFERENCES `pasantia` (`id`),
  ADD CONSTRAINT `FK_62E864EEDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_beneficiario_ruta`
--
ALTER TABLE `asignacion_grupo_beneficiario_ruta`
  ADD CONSTRAINT `FK_9C201DDBAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9C201DDB4B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_9C201DDBABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_9C201DDBDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_clear`
--
ALTER TABLE `asignacion_grupo_clear`
  ADD CONSTRAINT `FK_2858D49CAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_2858D49C9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_2858D49CD30DEA81` FOREIGN KEY (`clear_id`) REFERENCES `clear` (`id`),
  ADD CONSTRAINT `FK_2858D49CDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_comite`
--
ALTER TABLE `asignacion_grupo_comite`
  ADD CONSTRAINT `FK_CC1659E0AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CC1659E09C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_CC1659E0D61C3573` FOREIGN KEY (`comite_id`) REFERENCES `comite` (`id`),
  ADD CONSTRAINT `FK_CC1659E0DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_concurso`
--
ALTER TABLE `asignacion_grupo_concurso`
  ADD CONSTRAINT `FK_B9FE2A36AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B9FE2A369C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_B9FE2A36DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B9FE2A36F415D168` FOREIGN KEY (`concurso_id`) REFERENCES `concurso` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_pasantia`
--
ALTER TABLE `asignacion_grupo_pasantia`
  ADD CONSTRAINT `FK_A7D5E76AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A7D5E769C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_A7D5E76BB6D3273` FOREIGN KEY (`pasantia_id`) REFERENCES `pasantia` (`id`),
  ADD CONSTRAINT `FK_A7D5E76DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_grupo_ruta`
--
ALTER TABLE `asignacion_grupo_ruta`
  ADD CONSTRAINT `FK_FD8DF979AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FD8DF9799C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_FD8DF979ABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_FD8DF979DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_integrante_clear`
--
ALTER TABLE `asignacion_integrante_clear`
  ADD CONSTRAINT `FK_ECDABF1FAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_ECDABF1F4BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_ECDABF1F6EA6C980` FOREIGN KEY (`integrante_id`) REFERENCES `integrante` (`id`),
  ADD CONSTRAINT `FK_ECDABF1FD30DEA81` FOREIGN KEY (`clear_id`) REFERENCES `clear` (`id`),
  ADD CONSTRAINT `FK_ECDABF1FDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_integrante_comite`
--
ALTER TABLE `asignacion_integrante_comite`
  ADD CONSTRAINT `FK_B8630911AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B86309114BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_B86309116EA6C980` FOREIGN KEY (`integrante_id`) REFERENCES `integrante` (`id`),
  ADD CONSTRAINT `FK_B8630911D61C3573` FOREIGN KEY (`comite_id`) REFERENCES `comite` (`id`),
  ADD CONSTRAINT `FK_B8630911DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_organizacion_pasantia`
--
ALTER TABLE `asignacion_organizacion_pasantia`
  ADD CONSTRAINT `FK_27E7E2A3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_27E7E2A390B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_27E7E2A3BB6D3273` FOREIGN KEY (`pasantia_id`) REFERENCES `pasantia` (`id`),
  ADD CONSTRAINT `FK_27E7E2A3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_organizacion_ruta`
--
ALTER TABLE `asignacion_organizacion_ruta`
  ADD CONSTRAINT `FK_A4DB9F43AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A4DB9F4390B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_A4DB9F43ABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_A4DB9F43DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_organizacion_territorio_aprendizaje`
--
ALTER TABLE `asignacion_organizacion_territorio_aprendizaje`
  ADD CONSTRAINT `FK_9510DDB1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9510DDB11281CB4C` FOREIGN KEY (`territorio_aprendizaje_id`) REFERENCES `territorio_aprendizaje` (`id`),
  ADD CONSTRAINT `FK_9510DDB190B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_9510DDB1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `asignacion_talento_seguimiento_fase`
--
ALTER TABLE `asignacion_talento_seguimiento_fase`
  ADD CONSTRAINT `FK_D15A7A4FAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D15A7A4F308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_D15A7A4FA193D038` FOREIGN KEY (`seguimiento_mot_id`) REFERENCES `seguimiento_mot` (`id`),
  ADD CONSTRAINT `FK_D15A7A4FCD13DD97` FOREIGN KEY (`talento_id`) REFERENCES `talento` (`id`),
  ADD CONSTRAINT `FK_D15A7A4FDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

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
  ADD CONSTRAINT `FK_8A1280F5AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_8A1280F51E092B9F` FOREIGN KEY (`modalidad_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8A1280F558BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_8A1280F5A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8A1280F5DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `beca_soporte`
--
ALTER TABLE `beca_soporte`
  ADD CONSTRAINT `FK_FCBA20C4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FCBA20C41D749D82` FOREIGN KEY (`beca_id`) REFERENCES `beca` (`id`),
  ADD CONSTRAINT `FK_FCBA20C4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_FCBA20C4E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `FK_E8D0B617AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E8D0B61713DA6592` FOREIGN KEY (`discapacidad_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B617378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B6176313548C` FOREIGN KEY (`hijos_menores_5_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B61775376D93` FOREIGN KEY (`estado_civil_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B6177AAA0F5A` FOREIGN KEY (`grupo_indigena_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B617906677C2` FOREIGN KEY (`tipo_documento_conyugue_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B61797F167E4` FOREIGN KEY (`miembros_nucleo_familiar_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_E8D0B6179C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
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
  ADD CONSTRAINT `FK_492E0922AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_492E09224B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_492E0922DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_492E0922E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

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
  ADD CONSTRAINT `FK_33C9673BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_33C9673B29B07FB3` FOREIGN KEY (`nodo_id`) REFERENCES `nodo` (`id`),
  ADD CONSTRAINT `FK_33C9673B9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_33C9673BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD CONSTRAINT `FK_5A430D21AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_5A430D211E092B9F` FOREIGN KEY (`modalidad_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_5A430D2158BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_5A430D21A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
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
-- Filtros para la tabla `capacitacion_financiera_soporte`
--
ALTER TABLE `capacitacion_financiera_soporte`
  ADD CONSTRAINT `FK_242A7B77AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_242A7B7758BFCBEC` FOREIGN KEY (`capacitacion_financiera_id`) REFERENCES `capacitacion_financiera` (`id`),
  ADD CONSTRAINT `FK_242A7B77DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_242A7B77E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `capacitacion_soporte`
--
ALTER TABLE `capacitacion_soporte`
  ADD CONSTRAINT `FK_D90B771BAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D90B771B5B587DA` FOREIGN KEY (`capacitacion_id`) REFERENCES `capacitacion` (`id`),
  ADD CONSTRAINT `FK_D90B771BDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D90B771BE24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `clear`
--
ALTER TABLE `clear`
  ADD CONSTRAINT `FK_E5B1F106AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E5B1F10658BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
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
  ADD CONSTRAINT `FK_DC01CA9FAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_DC01CA9F58BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
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
  ADD CONSTRAINT `FK_785F9DE6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_785F9DE61E092B9F` FOREIGN KEY (`modalidad_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_785F9DE6A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
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
  ADD CONSTRAINT `FK_E83EF8FA9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
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
  ADD CONSTRAINT `FK_9C5592A4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9C5592A44EE93BE6` FOREIGN KEY (`convocatoria_id`) REFERENCES `convocatoria` (`id`),
  ADD CONSTRAINT `FK_9C5592A4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9C5592A4E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

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
  ADD CONSTRAINT `FK_80B0ADF4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_80B0ADF49C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_80B0ADF4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

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
  ADD CONSTRAINT `FK_D9D9BF52AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_D9D9BF52308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_D9D9BF52DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `evaluacion_fase`
--
ALTER TABLE `evaluacion_fase`
  ADD CONSTRAINT `FK_CA310936AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CA3109369C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_CA310936DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `evaluacion_fase_soporte`
--
ALTER TABLE `evaluacion_fase_soporte`
  ADD CONSTRAINT `FK_CCD6E0E0AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CCD6E0E029A9F86E` FOREIGN KEY (`evaluacionfase_id`) REFERENCES `evaluacion_fase` (`id`),
  ADD CONSTRAINT `FK_CCD6E0E0DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CCD6E0E0E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_47860B05AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_47860B0558BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_47860B05A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_47860B05DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `evento_soporte`
--
ALTER TABLE `evento_soporte`
  ADD CONSTRAINT `FK_1EB2F2B9AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_1EB2F2B987A5F842` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`),
  ADD CONSTRAINT `FK_1EB2F2B9DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_1EB2F2B9E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `experiencia_exitosa`
--
ALTER TABLE `experiencia_exitosa`
  ADD CONSTRAINT `FK_380325B1AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_380325B19C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_380325B1DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `experiencia_exitosa_soporte`
--
ALTER TABLE `experiencia_exitosa_soporte`
  ADD CONSTRAINT `FK_E6739A50AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E6739A508541B0D4` FOREIGN KEY (`experienciaexitosa_id`) REFERENCES `experiencia_exitosa` (`id`),
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
  ADD CONSTRAINT `FK_C27A0DA4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C27A0DA4627A20A5` FOREIGN KEY (`feria_id`) REFERENCES `feria` (`id`),
  ADD CONSTRAINT `FK_C27A0DA4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C27A0DA4E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `FK_8C0E9BD3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD33771B82E` FOREIGN KEY (`entidad_financiera_cuenta_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD34EE93BE6` FOREIGN KEY (`convocatoria_id`) REFERENCES `convocatoria` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD358BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD378814E56` FOREIGN KEY (`tipo_cuenta_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD3A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD3BE494C72` FOREIGN KEY (`figura_legal_constitucion_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8C0E9BD3DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `grupo_soporte`
--
ALTER TABLE `grupo_soporte`
  ADD CONSTRAINT `FK_5D2EB461AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_5D2EB4619C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_5D2EB461DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_5D2EB461E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `habilitacion_fases`
--
ALTER TABLE `habilitacion_fases`
  ADD CONSTRAINT `FK_87643E12AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_87643E129C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_87643E12DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `integrante`
--
ALTER TABLE `integrante`
  ADD CONSTRAINT `FK_8AF632F6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_8AF632F6378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8AF632F6BCE7B795` FOREIGN KEY (`genero_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8AF632F6DA995DEC` FOREIGN KEY (`pertenencia_etnica_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_8AF632F6DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_8AF632F6F6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`);

--
-- Filtros para la tabla `integrante_soporte`
--
ALTER TABLE `integrante_soporte`
  ADD CONSTRAINT `FK_480A203AAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_480A203A6EA6C980` FOREIGN KEY (`integrante_id`) REFERENCES `integrante` (`id`),
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
  ADD CONSTRAINT `FK_C200C5AAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C200C5A51BE510C` FOREIGN KEY (`tipo_documento_contacto_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C200C5A58BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_C200C5A63273AB8` FOREIGN KEY (`linea_productiva_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C200C5ADADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `organizacion_pasantia`
--
ALTER TABLE `organizacion_pasantia`
  ADD CONSTRAINT `FK_EDB08B86AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_EDB08B8690B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_EDB08B86BB6D3273` FOREIGN KEY (`pasantia_id`) REFERENCES `pasantia` (`id`),
  ADD CONSTRAINT `FK_EDB08B86DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `organizacion_ruta`
--
ALTER TABLE `organizacion_ruta`
  ADD CONSTRAINT `FK_3206E1A9AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_3206E1A990B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_3206E1A9ABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_3206E1A9DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `organizacion_soporte`
--
ALTER TABLE `organizacion_soporte`
  ADD CONSTRAINT `FK_B775B6F6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B775B6F690B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_B775B6F6DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B775B6F6E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `organizacion_territorio_aprendizaje`
--
ALTER TABLE `organizacion_territorio_aprendizaje`
  ADD CONSTRAINT `FK_5E54DCC5AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_5E54DCC51281CB4C` FOREIGN KEY (`territorio_aprendizaje_id`) REFERENCES `territorio_aprendizaje` (`id`),
  ADD CONSTRAINT `FK_5E54DCC590B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_5E54DCC5DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `FK_85BDC5C3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_85BDC5C313DA6592` FOREIGN KEY (`discapacidad_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C3378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C34B64ABC7` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiario` (`id`),
  ADD CONSTRAINT `FK_85BDC5C36313548C` FOREIGN KEY (`hijos_menores_5_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C375376D93` FOREIGN KEY (`estado_civil_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_85BDC5C37AAA0F5A` FOREIGN KEY (`grupo_indigena_id`) REFERENCES `listas` (`id`),
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
  ADD CONSTRAINT `FK_CBDCE9A6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_CBDCE9A61281CB4C` FOREIGN KEY (`territorio_aprendizaje_id`) REFERENCES `territorio_aprendizaje` (`id`),
  ADD CONSTRAINT `FK_CBDCE9A690B1019E` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id`),
  ADD CONSTRAINT `FK_CBDCE9A69C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
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
  ADD CONSTRAINT `FK_78113458AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_781134589C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_781134589F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `listas` (`id`),
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
  ADD CONSTRAINT `FK_1E23DEC6AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_1E23DEC6308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_1E23DEC6DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

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
-- Filtros para la tabla `programa_capacitacion_financiera_soporte`
--
ALTER TABLE `programa_capacitacion_financiera_soporte`
  ADD CONSTRAINT `FK_AF4898F3AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_AF4898F36B25D3FE` FOREIGN KEY (`programa_capacitacion_financiera_id`) REFERENCES `programa_capacitacion_financiera` (`id`),
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
  ADD CONSTRAINT `FK_C3AEF08CAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C3AEF08C1281CB4C` FOREIGN KEY (`territorio_aprendizaje_id`) REFERENCES `territorio_aprendizaje` (`id`),
  ADD CONSTRAINT `FK_C3AEF08C9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_C3AEF08CDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `ruta_soporte`
--
ALTER TABLE `ruta_soporte`
  ADD CONSTRAINT `FK_9B269362AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9B269362ABBC4845` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`),
  ADD CONSTRAINT `FK_9B269362DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_9B269362E24646FA` FOREIGN KEY (`tipo_soporte_id`) REFERENCES `documento_soporte` (`id`);

--
-- Filtros para la tabla `seguimiento_beneficiario_ahorro`
--
ALTER TABLE `seguimiento_beneficiario_ahorro`
  ADD CONSTRAINT `FK_4D0FDEBDAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_4D0FDEBD22507D80` FOREIGN KEY (`asignacion_beneficiario_ahorro_id`) REFERENCES `asignacion_beneficiario_ahorro` (`id`),
  ADD CONSTRAINT `FK_4D0FDEBDDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `seguimiento_fase`
--
ALTER TABLE `seguimiento_fase`
  ADD CONSTRAINT `FK_C0EF2E51AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C0EF2E519C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_C0EF2E51DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `seguimiento_mot`
--
ALTER TABLE `seguimiento_mot`
  ADD CONSTRAINT `FK_569ADBF0AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_569ADBF09C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_569ADBF0DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `talento`
--
ALTER TABLE `talento`
  ADD CONSTRAINT `FK_C2CE4CD5AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD5378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD558BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD575376D93` FOREIGN KEY (`estado_civil_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD57AAA0F5A` FOREIGN KEY (`grupo_indigena_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_C2CE4CD5A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `listas` (`id`),
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
  ADD CONSTRAINT `FK_139F4584AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_139F45849C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_139F4584DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `taller_soporte`
--
ALTER TABLE `taller_soporte`
  ADD CONSTRAINT `FK_7C5D4381AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_7C5D43816DC343EA` FOREIGN KEY (`taller_id`) REFERENCES `taller` (`id`),
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
  ADD CONSTRAINT `FK_808D9EAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_808D9E308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_808D9EDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `FK_B7F148A2AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_B7F148A229B07FB3` FOREIGN KEY (`nodo_id`) REFERENCES `nodo` (`id`),
  ADD CONSTRAINT `FK_B7F148A2308D77B2` FOREIGN KEY (`seguimiento_fase_id`) REFERENCES `seguimiento_fase` (`id`),
  ADD CONSTRAINT `FK_B7F148A29C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
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
