-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-11-2015 a las 15:27:18
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

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
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `id` int(11) NOT NULL,
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
  `tipo_CLEAR` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `lugar_realizacion_CLEAR` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE `convocatoria` (
  `id` int(11) NOT NULL,
  `poa_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `mot` tinyint(1) NOT NULL,
  `iea` tinyint(1) NOT NULL,
  `pi` tinyint(1) NOT NULL,
  `pn` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `usuario_modificacion_id`, `usuario_creacion_id`, `nombre`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, 'CAUCA', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
(2, NULL, NULL, 'NARIÑO', 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00'),
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
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `convocatoria_id`, `municipio_id`, `tipo_id`, `figura_legal_constitucion_id`, `entidad_financiera_cuenta_id`, `tipo_cuenta_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `fecha_inscripcion`, `codigo`, `nombre`, `direccion`, `rural`, `barrio`, `corregimiento`, `vereda`, `cacerio`, `numero_identificacion_tributaria`, `fecha_constitucion_legal`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-01-01 00:00:00', 'AAA111', 'ASDFSADF', 'ASDF', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3102343243', 'sdsdf@sdfsdf', 0, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-01-01 00:00:00', 'AAA112', 'werwer', 'asdfds', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '234324', 'asdfs@asdfdsf', 0, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-01-01 00:00:00', 'ASDFSD', 'ASDF', 'SADF', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '234234', 'asdf@asdf', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes_clear`
--

CREATE TABLE `integrantes_clear` (
  `id` int(11) NOT NULL,
  `clear_id` int(11) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `pertenencia_etnica_id` int(11) DEFAULT NULL,
  `nivel_estudios_id` int(11) DEFAULT NULL,
  `grupo_indigena_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `numero_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `entidad_representa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo_entidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
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
(139, NULL, NULL, 'pertenencia_etnica', 'Yurut', '', 0, 1, '0000-00-00 00:00:00', '2015-11-05 00:00:00');

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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, NULL, NULL, 2014, '300000000', 1, NULL, '2015-11-11 14:25:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `salt`, `nombres`, `apellidos`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `usuario_modificacion`, `fecha_modificacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 'Admin', '111111', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

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
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `clear`
--
ALTER TABLE `clear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E5B1F10658BC1BE0` (`municipio_id`),
  ADD KEY `IDX_E5B1F106DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_E5B1F106AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6D773021BB18C0BA` (`poa_id`),
  ADD KEY `IDX_6D773021DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_6D773021AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_40E497EBDADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_40E497EBAEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
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
-- Indices de la tabla `integrantes_clear`
--
ALTER TABLE `integrantes_clear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_952BF316D30DEA81` (`clear_id`),
  ADD KEY `IDX_952BF316F6939175` (`tipo_documento_id`),
  ADD KEY `IDX_952BF316BCE7B795` (`genero_id`),
  ADD KEY `IDX_952BF316DA995DEC` (`pertenencia_etnica_id`),
  ADD KEY `IDX_952BF316378258DA` (`nivel_estudios_id`),
  ADD KEY `IDX_952BF3167AAA0F5A` (`grupo_indigena_id`),
  ADD KEY `IDX_952BF316DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_952BF316AEADF654` (`usuario_creacion_id`);

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
-- Indices de la tabla `poa`
--
ALTER TABLE `poa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_736097E489A50577` (`anio`),
  ADD KEY `IDX_736097E4DADD026` (`usuario_modificacion_id`),
  ADD KEY `IDX_736097E4AEADF654` (`usuario_creacion_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clear`
--
ALTER TABLE `clear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `integrantes_clear`
--
ALTER TABLE `integrantes_clear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `poa`
--
ALTER TABLE `poa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `clear`
--
ALTER TABLE `clear`
  ADD CONSTRAINT `FK_E5B1F10658BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_E5B1F106AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_E5B1F106DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

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
-- Filtros para la tabla `integrantes_clear`
--
ALTER TABLE `integrantes_clear`
  ADD CONSTRAINT `FK_952BF316378258DA` FOREIGN KEY (`nivel_estudios_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_952BF3167AAA0F5A` FOREIGN KEY (`grupo_indigena_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_952BF316AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_952BF316BCE7B795` FOREIGN KEY (`genero_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_952BF316D30DEA81` FOREIGN KEY (`clear_id`) REFERENCES `clear` (`id`),
  ADD CONSTRAINT `FK_952BF316DA995DEC` FOREIGN KEY (`pertenencia_etnica_id`) REFERENCES `listas` (`id`),
  ADD CONSTRAINT `FK_952BF316DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_952BF316F6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`);

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
-- Filtros para la tabla `poa`
--
ALTER TABLE `poa`
  ADD CONSTRAINT `FK_736097E4AEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_736097E4DADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `FK_A786041EAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_A786041EDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
