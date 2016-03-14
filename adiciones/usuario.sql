-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-01-2016 a las 22:39:15
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 7.0.1

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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `telefono_fijo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `tipo_documento_id`, `usuario_modificacion_id`, `usuario_creacion_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `numero_documento`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `telefono_fijo`, `telefono_celular`, `correo_electronico`, `active`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, NULL, NULL, 'admin', 'admin', 'j.bolanos@rmcproducciones.com', 'j.bolanos@rmcproducciones.com', 1, '7m19pcsc3ao8s8wo4k840o84008sg8g', '$2y$13$7m19pcsc3ao8s8wo4k840ewf/o08DsbZhC/TF8laWfgeKhJ/FEPI.', '2016-01-08 22:38:44', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '90000000', 'Producciones', NULL, 'RMC', NULL, '358 6283', '3003676932', 'j.bolanos@rmcproducciones.com', 1, NULL, '2016-01-08 22:38:43');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_2265B05DAEADF654` FOREIGN KEY (`usuario_creacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_2265B05DDADD026` FOREIGN KEY (`usuario_modificacion_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_2265B05DF6939175` FOREIGN KEY (`tipo_documento_id`) REFERENCES `listas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
