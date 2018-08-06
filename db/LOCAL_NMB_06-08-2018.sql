-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-08-2018 a las 06:12:53
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `DW4_NO_MAS_BULLYING`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta_config`
--

CREATE TABLE `alerta_config` (
  `ID` int(10) UNSIGNED NOT NULL,
  `cantidad` decimal(2,0) DEFAULT NULL,
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alerta_config`
--

INSERT INTO `alerta_config` (`ID`, `cantidad`, `rol`) VALUES
(1, '1', 1),
(2, '1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID` int(10) UNSIGNED NOT NULL,
  `creador` int(10) UNSIGNED NOT NULL,
  `contenido` blob NOT NULL,
  `fecha` datetime NOT NULL,
  `idSituacion` int(10) UNSIGNED DEFAULT NULL,
  `idPublicacion` int(10) UNSIGNED DEFAULT NULL,
  `idNotificacion` int(10) UNSIGNED DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID`, `creador`, `contenido`, `fecha`, `idSituacion`, `idPublicacion`, `idNotificacion`, `estado`) VALUES
(48, 1, 0x486f6c61, '2018-08-05 23:42:37', 8, NULL, NULL, 0),
(49, 1, 0x5961206e6f20686179203320636f6d656e746172696f73207365677569646f73, '2018-08-05 23:42:47', 8, NULL, NULL, 0),
(50, 2, 0x416c746f206761746f20656565, '2018-08-05 23:43:35', 2, NULL, NULL, 1),
(51, 1, 0x566f73206761746f, '2018-08-05 23:43:58', NULL, NULL, 8, 1),
(52, 2, 0x6c616c616c616c, '2018-08-05 23:45:34', 2, NULL, NULL, 1),
(53, 1, 0x484f6c61, '2018-08-06 00:02:00', 6, NULL, NULL, 0),
(54, 2, 0x706f7374616161, '2018-08-06 00:04:35', 2, NULL, NULL, 1),
(55, 1, 0x79656168, '2018-08-06 00:04:46', 2, NULL, NULL, 1),
(56, 2, 0x617364617364, '2018-08-06 00:05:31', 2, NULL, NULL, 1),
(57, 2, 0x617364617364, '2018-08-06 00:06:46', 2, NULL, NULL, 1),
(58, 2, 0x617364617364, '2018-08-06 00:30:32', 10, NULL, NULL, 0),
(59, 2, 0x617364617364, '2018-08-06 00:32:13', 10, NULL, NULL, 0),
(60, 2, 0x617364617364, '2018-08-06 00:32:38', 10, NULL, NULL, 0),
(61, 2, 0x66676466676466676466676466, '2018-08-06 00:32:45', 10, NULL, NULL, 0),
(62, 2, 0x61736420617364617364206161732064, '2018-08-06 00:34:14', 10, NULL, NULL, 0),
(63, 2, 0x6b6c616a736c646b6a61736a64, '2018-08-06 00:35:31', 10, NULL, NULL, 0),
(64, 2, 0x617364617364617364, '2018-08-06 00:36:03', 10, NULL, NULL, 0),
(65, 2, 0x3132333132333132, '2018-08-06 00:36:06', 10, NULL, NULL, 0),
(66, 1, 0x617364617364, '2018-08-06 00:51:36', NULL, NULL, 8, 0),
(67, 1, 0x617364617364, '2018-08-06 00:52:01', NULL, NULL, 8, 0),
(68, 1, 0x617364617364617364617364, '2018-08-06 00:52:41', NULL, NULL, 8, 0),
(69, 1, 0x616461732064617364, '2018-08-06 00:52:50', NULL, NULL, 7, 1),
(70, 7, 0x617364617364, '2018-08-06 01:01:56', NULL, NULL, 7, 1),
(71, 7, 0x6d692068696a6f20657320756e2073616e746f, '2018-08-06 01:06:05', NULL, NULL, 7, 1),
(72, 1, 0x6e6164612071756520766572, '2018-08-06 01:06:13', NULL, NULL, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `implicados`
--

CREATE TABLE `implicados` (
  `ID` int(10) UNSIGNED NOT NULL,
  `idSituacion` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `implicados`
--

INSERT INTO `implicados` (`ID`, `idSituacion`, `idUsuario`, `rol`) VALUES
(11, 6, 4, 1),
(12, 6, 6, 2),
(13, 7, 5, 1),
(14, 7, 6, 2),
(15, 8, 3, 1),
(16, 8, 6, 2),
(17, 9, 4, 1),
(18, 9, 7, 2),
(19, 10, 5, 1),
(20, 10, 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `idnacionalidad` int(10) UNSIGNED NOT NULL,
  `pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`idnacionalidad`, `pais`) VALUES
(1, 'Argentina'),
(2, 'Chile'),
(3, 'Uruguay'),
(4, 'Colombia'),
(5, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `ID` int(10) UNSIGNED NOT NULL,
  `contenido` blob,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` int(11) NOT NULL,
  `implicado` int(10) UNSIGNED NOT NULL,
  `leido` tinyint(1) NOT NULL,
  `padre` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`ID`, `contenido`, `fecha`, `rol`, `implicado`, `leido`, `padre`) VALUES
(7, NULL, '2018-08-05 20:56:49', 2, 6, 0, 7),
(8, NULL, '2018-08-06 00:14:00', 2, 6, 0, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `ID` int(10) UNSIGNED NOT NULL,
  `creador` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `contenido` blob NOT NULL,
  `fecha` datetime NOT NULL,
  `idtipos` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situaciones`
--

CREATE TABLE `situaciones` (
  `ID` int(10) UNSIGNED NOT NULL,
  `denunciante` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` blob NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `nivel_situacion` varchar(50) NOT NULL,
  `estatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `situaciones`
--

INSERT INTO `situaciones` (`ID`, `denunciante`, `titulo`, `descripcion`, `fecha_creacion`, `nivel_situacion`, `estatus`) VALUES
(1, 4, 'Me pegaron', 0x46756920616772656469646f20656e20656c20706174696f206465206c612065736375656c612061206c6173203132706d206375616e646f20756e6f7320636869636f7320736520726965726f6e206465206d6973207a61706174696c6c61732079206d6520656d70756a61726f6e2c206d65206c617374696d6520656c20636f646f2079206d65207475766520717565206972206465206c612065736375656c6120, '2018-06-26 09:38:00', 'alto', 1),
(2, 2, 'Me insultaron', 0x4179657220656e20636c617365206d6520696e73756c7461726f6e20656e20636c617365207920656c2070726f6665736f72206e6f2068697a6f206e616461, '2018-08-05 20:05:46', 'medio', 1),
(6, 1, 'asdasd asd', 0x6173206461736461646164612061, '2018-08-05 20:16:13', 'alto', 1),
(7, 1, 'asdfasdf asd', 0x2061736466617364666173646620, '2018-08-05 20:16:33', 'medio', 1),
(8, 1, 'asdf sadf asdf asd df', 0x6173646661732066617364206673642066, '2018-08-05 20:16:44', 'alto', 1),
(9, 2, 'asdasd asdas d', 0x61736420617364617364617364, '2018-08-06 00:07:38', 'medio', 1),
(10, 2, 'asdasd asdaasd as d', 0x61207364617364617320646173646164, '2018-08-06 00:09:38', 'alto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sit_has_padre`
--

CREATE TABLE `sit_has_padre` (
  `id` int(11) NOT NULL,
  `usuarios_ID` int(10) UNSIGNED NOT NULL,
  `notificaciones_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `idtipos` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`idtipos`, `nombre`) VALUES
(1, 'tipo1'),
(2, 'tipo2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `idnacionalidad` int(10) UNSIGNED NOT NULL,
  `edad` int(10) UNSIGNED NOT NULL,
  `grado` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nombre`, `apellido`, `tipo`, `password`, `mail`, `identificacion`, `idnacionalidad`, `edad`, `grado`, `sexo`) VALUES
(1, 'Instituto', 'IEA', 1, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'nicolas.galano@gmail.com', 34000001, 1, 30, 'Administrador', 'Masculino'),
(2, 'Daniel', 'Alvez', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'pedagogia@institucion.com', 34000002, 2, 7, 'Segundo', 'Masculino'),
(3, 'Carolina', 'Herrera', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'docente1@institucion.com', 34000003, 1, 8, 'Tercero', 'Femenino'),
(4, 'Elias', 'Fernandez', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'padre1@institucion.com', 34000004, 1, 7, 'Segundo', 'Masculino'),
(5, 'Marcelo', 'Gallardo', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'marcelo.gallardo@institucion.com', 34000005, 1, 9, 'Cuarto', 'Masculino'),
(6, 'Javier', 'Maidan', 2, '$2y$10$JW//88vSpet6lBPDkYWVjejdNYQQY.aD17GMGpDc5a2DsrNh4eLKK', 'javier.mai@instituto.com', 34000006, 3, 1, 'Cuarto', 'Masculino'),
(7, 'Tito', 'Fuentes', 3, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'tito@instituto.com', 34000007, 1, 8, 'Tercero', 'Masculino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerta_config`
--
ALTER TABLE `alerta_config`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `idcomentarios_UNIQUE` (`ID`),
  ADD KEY `fk_comentarios_situaciones1_idx` (`idSituacion`),
  ADD KEY `fk_comentarios_usuarios1_idx` (`creador`),
  ADD KEY `fk_comentarios_publicaciones1_idx` (`idPublicacion`),
  ADD KEY `fk_comentarios_notificaciones1` (`idNotificacion`);

--
-- Indices de la tabla `implicados`
--
ALTER TABLE `implicados`
  ADD PRIMARY KEY (`ID`,`idSituacion`,`idUsuario`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`),
  ADD KEY `fk_situaciones_has_usuarios_usuarios2_idx` (`idUsuario`),
  ADD KEY `fk_situaciones_has_usuarios_situaciones1_idx` (`idSituacion`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`idnacionalidad`),
  ADD UNIQUE KEY `idnacionalidad_UNIQUE` (`idnacionalidad`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`),
  ADD KEY `fk_notificaciones_usuarios1_idx` (`implicado`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`),
  ADD KEY `fk_publicaciones_usuarios1_idx` (`creador`),
  ADD KEY `fk_publicaciones_tipos1_idx` (`idtipos`);

--
-- Indices de la tabla `situaciones`
--
ALTER TABLE `situaciones`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `idsituaciones_UNIQUE` (`ID`),
  ADD KEY `fk_situaciones_usuarios1_idx` (`denunciante`);

--
-- Indices de la tabla `sit_has_padre`
--
ALTER TABLE `sit_has_padre`
  ADD PRIMARY KEY (`usuarios_ID`,`notificaciones_ID`,`id`),
  ADD KEY `fk_usuarios_has_notificaciones_notificaciones1_idx` (`notificaciones_ID`),
  ADD KEY `fk_usuarios_has_notificaciones_usuarios1_idx` (`usuarios_ID`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`idtipos`),
  ADD UNIQUE KEY `idtipos_UNIQUE` (`idtipos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `idusuarios_UNIQUE` (`ID`),
  ADD KEY `fk_usuarios_nacionalidad1_idx` (`idnacionalidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerta_config`
--
ALTER TABLE `alerta_config`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `implicados`
--
ALTER TABLE `implicados`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  MODIFY `idnacionalidad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `situaciones`
--
ALTER TABLE `situaciones`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `idtipos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_notificaciones1` FOREIGN KEY (`idNotificacion`) REFERENCES `notificaciones` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_publicaciones1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_situaciones1` FOREIGN KEY (`idSituacion`) REFERENCES `situaciones` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_usuarios1` FOREIGN KEY (`creador`) REFERENCES `usuarios` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `implicados`
--
ALTER TABLE `implicados`
  ADD CONSTRAINT `fk_situaciones_has_usuarios_situaciones1` FOREIGN KEY (`idSituacion`) REFERENCES `situaciones` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_situaciones_has_usuarios_usuarios2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `fk_notificaciones_usuarios1` FOREIGN KEY (`implicado`) REFERENCES `usuarios` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `fk_publicaciones_tipos1` FOREIGN KEY (`idtipos`) REFERENCES `tipos` (`idtipos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicaciones_usuarios1` FOREIGN KEY (`creador`) REFERENCES `usuarios` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `situaciones`
--
ALTER TABLE `situaciones`
  ADD CONSTRAINT `fk_situaciones_usuarios1` FOREIGN KEY (`denunciante`) REFERENCES `usuarios` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sit_has_padre`
--
ALTER TABLE `sit_has_padre`
  ADD CONSTRAINT `fk_usuarios_has_notificaciones_notificaciones1` FOREIGN KEY (`notificaciones_ID`) REFERENCES `notificaciones` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_notificaciones_usuarios1` FOREIGN KEY (`usuarios_ID`) REFERENCES `usuarios` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_nacionalidad1` FOREIGN KEY (`idnacionalidad`) REFERENCES `nacionalidad` (`idnacionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
