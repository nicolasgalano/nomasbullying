-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-08-2018 a las 12:13:43
-- Versión del servidor: 5.6.39
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nomasbul_demo`
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
(1, '3', 1),
(2, '3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID` int(10) UNSIGNED NOT NULL,
  `creador` int(10) UNSIGNED NOT NULL,
  `contenido` blob,
  `fecha` datetime NOT NULL,
  `idSituacion` int(10) UNSIGNED DEFAULT NULL,
  `idPublicacion` int(10) UNSIGNED DEFAULT NULL,
  `idNotificacion` int(10) UNSIGNED DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `ID` int(10) UNSIGNED NOT NULL,
  `creador` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `contenido` blob,
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
  `estatus` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `id` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL
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
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID_UNIQUE` (`id`);

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
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `implicados`
--
ALTER TABLE `implicados`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  MODIFY `idnacionalidad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `situaciones`
--
ALTER TABLE `situaciones`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `idtipos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_nacionalidad1` FOREIGN KEY (`idnacionalidad`) REFERENCES `nacionalidad` (`idnacionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
