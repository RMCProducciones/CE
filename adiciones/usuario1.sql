-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2016 a las 15:57:02
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
(3, '$2y$13$mqri4n4dscg4s8wowoswgetXw8mtQ9h7rz94DZ.ew2lrvlQHtoqzW', 'mqri4n4dscg4s8wowoswgk004cgwogc', '1111111', '1234567897', 'juanc@hotmail.com', 1, NULL, '2016-01-29 17:29:49', 1, NULL, NULL, 'daniel', 'daniel', 'juanc@hotmail.com', 'juanc@hotmail.com', 1, '2016-05-04 23:35:51', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022376577', 'perez', 'bastidas', 'daniel', 'ricardo'),
(4, '$2y$13$fd8601sw4vco0cw8gk0gsu5YDCNEro073Zr6GJ7M9zPfN2ctMGbIu', 'fd8601sw4vco0cw8gk0gs8o8k4s8k8g', '10001001', '10001001', 'marcela.cortes.fonseca@gmail.com', 1, NULL, '2016-02-22 20:18:36', 1, NULL, NULL, 'marcela', 'marcela', 'marcela.cortes.fonseca@gmail.com', 'marcela.cortes.fonseca@gmail.com', 1, '2016-02-23 15:36:35', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '52814557', 'Cortes', NULL, 'Marcela', NULL),
(5, '$2y$13$67yodttax68s0ows80o44eg0oU2e6D3QstOiOFuYA4k2fzJAaNN5G', '67yodttax68s0ows80o44skko0ccw44', '1000100', '1000100', 'jarocha53@ucatolica.edu.com', 1, NULL, '2016-02-22 21:05:36', 1, NULL, NULL, 'j.rocha', 'j.rocha', 'jarocha53@ucatolica.edu.com', 'jarocha53@ucatolica.edu.com', 1, '2016-02-22 21:05:37', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '79884089', 'Rocha', NULL, 'Jhony', NULL),
(6, '$2y$13$2zo4pz4ola2ow0o80s0kceANQhTO0Nw4QjMLpv4yUyPF8ecqHTG7C', '2zo4pz4ola2ow0o80s0kco00osk888o', '342342', '34234234', 'asdasd@asdasd.com', 1, NULL, '2016-03-15 15:09:53', 1, NULL, NULL, 'armandocasas', 'armandocasas', 'asdasd@asdasd.com', 'asdasd@asdasd.com', 1, '2016-03-15 15:48:34', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '123123', 'casas', 'armando', 'armando', 'armando'),
(7, '$2y$13$4ze1n04a0r0oo80s40wkseXr9f0HiB2RWV5utmKc3lhWW9Kt9B6C2', '4ze1n04a0r0oo80s40wksggsoo0kg84', '7406128', '3204996137', 'c.martinez@rmcproducciones.com', 1, NULL, '2016-03-30 22:14:32', 1, NULL, NULL, 'c.martinez', 'c.martinez', 'c.martinez@rmcproducciones.com', 'c.martinez@rmcproducciones.com', 1, '2016-05-05 15:37:35', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1022422820', 'Martinez', 'Grisales', 'Cristian', 'Camilo'),
(8, '$2y$13$88rynnqh5f48ss4o8cscwetE5lqiIyx0HirFMbp/JKNXg0qLU/ZSi', '88rynnqh5f48ss4o8cscwg4kcws404k', '777777777', '3107777777', 'admin@correo.com', 1, NULL, '2016-05-04 23:22:59', 1, NULL, NULL, 'admin', 'admin', 'admin@correo.com', 'admin@correo.com', 1, '2016-05-05 00:30:51', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '10000001', 'Administrador', '', '', ''),
(9, '$2y$13$g7vi6n8rxfcwgkwc4os40e4WPRFZYvlwSbDIahbgmNqjZojf6KES2', 'g7vi6n8rxfcwgkwc4os40kko408wo8g', '777777777', '3107777777', 'promotor@correo.com', 1, NULL, '2016-05-05 00:21:10', 1, NULL, NULL, 'promotor', 'promotor', 'promotor@correo.com', 'promotor@correo.com', 1, '2016-05-05 15:35:46', 0, 0, NULL, NULL, '0000-00-00 00:00:00', 'a:1:{i:0;s:13:"ROLE_PROMOTOR";}', 0, NULL, '10000002', 'SANTANDER', 'DE QUILICHAO', 'PROMOTOR', NULL),
(10, '$2y$13$rlfmggh7alwc8gk0s884cezBv1RdYKsam0TjhX5oEbydv0bXhYldC', 'rlfmggh7alwc8gk0s884cko40kssk0w', '77777777', '3107777777', 'coordinador@correo.com', 1, NULL, '2016-05-05 00:34:43', 1, NULL, NULL, 'coordinador', 'coordinador', 'coordinador@correo.com', 'coordinador@correo.com', 1, '2016-05-05 15:35:31', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_COORDINADOR";}', 0, NULL, '10000003', 'CAUCA', NULL, 'COORDINADOR', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
