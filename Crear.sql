-- MySQL Script generated by MySQL Workbench
-- 06/25/18 14:57:46
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Schema DW4_NO_MAS_BULLYING
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DW4_NO_MAS_BULLYING` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `DW4_NO_MAS_BULLYING` ;

-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`nacionalidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_NO_MAS_BULLYING`.`nacionalidad` ;

CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`nacionalidad` (
  `idnacionalidad` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pais` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idnacionalidad`),
  UNIQUE INDEX `idnacionalidad_UNIQUE` (`idnacionalidad` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_NO_MAS_BULLYING`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`usuarios` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `tipo` INT NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `mail` VARCHAR(100) NOT NULL,
  `identificacion` INT NOT NULL,
  `idnacionalidad` INT UNSIGNED NOT NULL,
  `edad` INT UNSIGNED NOT NULL,
  `grado` VARCHAR(50) NOT NULL,
  `sexo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `idusuarios_UNIQUE` (`ID` ASC),
  INDEX `fk_usuarios_nacionalidad1_idx` (`idnacionalidad` ASC),
  CONSTRAINT `fk_usuarios_nacionalidad1`
    FOREIGN KEY (`idnacionalidad`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`nacionalidad` (`idnacionalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`situaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_NO_MAS_BULLYING`.`situaciones` ;

CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`situaciones` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `denunciante` INT UNSIGNED NOT NULL,
  `titulo` VARCHAR(50) NOT NULL,
  `descripcion` BLOB NOT NULL,
  `fecha_creacion` DATETIME NOT NULL,
  `nivel_situacion` VARCHAR(50) NOT NULL,
  `estatus` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `idsituaciones_UNIQUE` (`ID` ASC),
  INDEX `fk_situaciones_usuarios1_idx` (`denunciante` ASC),
  CONSTRAINT `fk_situaciones_usuarios1`
    FOREIGN KEY (`denunciante`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`usuarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`implicados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_NO_MAS_BULLYING`.`implicados` ;

CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`implicados` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `idSituacion` INT UNSIGNED NOT NULL,
  `idUsuario` INT UNSIGNED NOT NULL,
  `rol` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`, `idSituacion`, `idUsuario`),
  INDEX `fk_situaciones_has_usuarios_usuarios2_idx` (`idUsuario` ASC),
  INDEX `fk_situaciones_has_usuarios_situaciones1_idx` (`idSituacion` ASC),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  CONSTRAINT `fk_situaciones_has_usuarios_situaciones1`
    FOREIGN KEY (`idSituacion`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`situaciones` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_situaciones_has_usuarios_usuarios2`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`usuarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_NO_MAS_BULLYING`.`tipos` ;

CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`tipos` (
  `idtipos` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipos`),
  UNIQUE INDEX `idtipos_UNIQUE` (`idtipos` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`publicaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_NO_MAS_BULLYING`.`publicaciones` ;

CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`publicaciones` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `creador` INT UNSIGNED NOT NULL,
  `titulo` VARCHAR(50) NOT NULL,
  `contenido` BLOB NOT NULL,
  `fecha` DATETIME NOT NULL,
  `idtipos` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_publicaciones_usuarios1_idx` (`creador` ASC),
  INDEX `fk_publicaciones_tipos1_idx` (`idtipos` ASC),
  CONSTRAINT `fk_publicaciones_usuarios1`
    FOREIGN KEY (`creador`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`usuarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_publicaciones_tipos1`
    FOREIGN KEY (`idtipos`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`tipos` (`idtipos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`notificaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_NO_MAS_BULLYING`.`notificaciones` ;

CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`notificaciones` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `contenido` BLOB NOT NULL,
  `fecha` DATETIME NOT NULL,
  `rol` INT NOT NULL,
  `implicado` INT UNSIGNED NOT NULL,
   `leido` TINYINT(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_notificaciones_usuarios1_idx` (`implicado` ASC),
  CONSTRAINT `fk_notificaciones_usuarios1`
    FOREIGN KEY (`implicado`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`usuarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`alerta_config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_NO_MAS_BULLYING`.`alerta_config` ;

CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`alerta_config` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cantidad` DECIMAL(2) NULL,
  `rol` INT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`comentarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_NO_MAS_BULLYING`.`comentarios` ;

CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`comentarios` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `creador` INT UNSIGNED NOT NULL,
  `contenido` BLOB NOT NULL,
  `fecha` DATETIME NOT NULL,
  `idSituacion` INT UNSIGNED NULL,
  `idPublicacion` INT UNSIGNED NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `idcomentarios_UNIQUE` (`ID` ASC),
  INDEX `fk_comentarios_situaciones1_idx` (`idSituacion` ASC),
  INDEX `fk_comentarios_usuarios1_idx` (`creador` ASC),
  INDEX `fk_comentarios_publicaciones1_idx` (`idPublicacion` ASC),
  CONSTRAINT `fk_comentarios_situaciones1`
    FOREIGN KEY (`idSituacion`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`situaciones` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarios_usuarios1`
    FOREIGN KEY (`creador`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`usuarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarios_publicaciones1`
    FOREIGN KEY (`idPublicacion`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`publicaciones` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;




-- -----------------------------------------------------
-- Table `DW4_NO_MAS_BULLYING`.`sit_has_padre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DW4_NO_MAS_BULLYING`.`sit_has_padre` (
  `id` INT NOT NULL,
  `usuarios_ID` INT UNSIGNED NOT NULL,
  `notificaciones_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`usuarios_ID`, `notificaciones_ID`, `id`),
  INDEX `fk_usuarios_has_notificaciones_notificaciones1_idx` (`notificaciones_ID` ASC),
  INDEX `fk_usuarios_has_notificaciones_usuarios1_idx` (`usuarios_ID` ASC),
  CONSTRAINT `fk_usuarios_has_notificaciones_usuarios1`
    FOREIGN KEY (`usuarios_ID`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`usuarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_notificaciones_notificaciones1`
    FOREIGN KEY (`notificaciones_ID`)
    REFERENCES `DW4_NO_MAS_BULLYING`.`notificaciones` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Data for table `DW4_NO_MAS_BULLYING`.`nacionalidad`
-- -----------------------------------------------------
START TRANSACTION;
USE `DW4_NO_MAS_BULLYING`;
INSERT INTO `DW4_NO_MAS_BULLYING`.`nacionalidad` (`pais`) VALUES ('Argentina');
INSERT INTO `DW4_NO_MAS_BULLYING`.`nacionalidad` (`pais`) VALUES ('Chile');
INSERT INTO `DW4_NO_MAS_BULLYING`.`nacionalidad` (`pais`) VALUES ('Uruguay');
INSERT INTO `DW4_NO_MAS_BULLYING`.`nacionalidad` (`pais`) VALUES ('Colombia');
INSERT INTO `DW4_NO_MAS_BULLYING`.`nacionalidad` (`pais`) VALUES ('Venezuela');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DW4_NO_MAS_BULLYING`.`usuarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `DW4_NO_MAS_BULLYING`;
INSERT INTO `DW4_NO_MAS_BULLYING`.`usuarios` (`nombre`, `apellido`, `tipo`, `password`, `mail`, `identificacion`, `idnacionalidad`, `edad`, `grado`, `sexo`) VALUES ('Instituto', 'IEA', 1, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'nicolas.galano@gmail.com', 34000001, 1, 30, 'Administrador', 'Masculino');
INSERT INTO `DW4_NO_MAS_BULLYING`.`usuarios` (`nombre`, `apellido`, `tipo`, `password`, `mail`, `identificacion`, `idnacionalidad`, `edad`, `grado`, `sexo`) VALUES ('Daniel', 'Alvez', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'pedagogia@institucion.com', 34000002, 2, 7, 'Segundo', 'Masculino');
INSERT INTO `DW4_NO_MAS_BULLYING`.`usuarios` (`nombre`, `apellido`, `tipo`, `password`, `mail`, `identificacion`, `idnacionalidad`, `edad`, `grado`, `sexo`) VALUES ('Carolina', 'Herrera', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'docente1@institucion.com', 34000003, 1, 8, 'Tercero', 'Femenino');
INSERT INTO `DW4_NO_MAS_BULLYING`.`usuarios` (`nombre`, `apellido`, `tipo`, `password`, `mail`, `identificacion`, `idnacionalidad`, `edad`, `grado`, `sexo`) VALUES ('Elias', 'Fernandez', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'padre1@institucion.com', 34000004, 1, 7, 'Segundo', 'Masculino');
INSERT INTO `DW4_NO_MAS_BULLYING`.`usuarios` (`nombre`, `apellido`, `tipo`, `password`, `mail`, `identificacion`, `idnacionalidad`, `edad`, `grado`, `sexo`) VALUES ('Marcelo', 'Gallardo', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'marcelo.gallardo@institucion.com', 34000005, 1, 9, 'Cuarto', 'Masculino');
INSERT INTO `DW4_NO_MAS_BULLYING`.`usuarios` (`nombre`, `apellido`, `tipo`, `password`, `mail`, `identificacion`, `idnacionalidad`, `edad`, `grado`, `sexo`) VALUES ('Javier', 'Maidana', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'javier.mai@instituto.com', 34000006, 3, 9, 'Cuarto', 'Masculino');
INSERT INTO `DW4_NO_MAS_BULLYING`.`usuarios` (`nombre`, `apellido`, `tipo`, `password`, `mail`, `identificacion`, `idnacionalidad`, `edad`, `grado`, `sexo`) VALUES ('Tito', 'Fuentes', 2, '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'tito@instituto.com', 34000007, 1, 8, 'Tercero', 'Masculino');

COMMIT;



-- -----------------------------------------------------
-- Data for table `DW4_NO_MAS_BULLYING`.`tipos`
-- -----------------------------------------------------
START TRANSACTION;
USE `DW4_NO_MAS_BULLYING`;
INSERT INTO `DW4_NO_MAS_BULLYING`.`tipos` (`nombre`) VALUES ('tipo1');
INSERT INTO `DW4_NO_MAS_BULLYING`.`tipos` (`nombre`) VALUES ('tipo2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `DW4_NO_MAS_BULLYING`.`situaciones`
-- -----------------------------------------------------
START TRANSACTION;
USE `DW4_NO_MAS_BULLYING`;
INSERT INTO `DW4_NO_MAS_BULLYING`.`situaciones` (`denunciante`, `titulo`, `descripcion`, `fecha_creacion`, `nivel_situacion`, `estatus`) VALUES (4, 'Me pegaron', 'Fui agredido en el patio de la escuela a las 12pm cuando unos chicos se rieron de mis zapatillas y me empujaron, me lastime el codo y me tuve que ir de la escuela ', '2018-06-26 09:38:00', 'alto', 'Leído');
INSERT INTO `DW4_NO_MAS_BULLYING`.`situaciones` (`denunciante`, `titulo`, `descripcion`, `fecha_creacion`, `nivel_situacion`, `estatus`) VALUES (2, 'Me insultaron', 'Ayer en clase me insultaron en clase y el profesor no hizo nada', NOW(), 'medio', 'No Leído');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DW4_NO_MAS_BULLYING`.`implicados`
-- -----------------------------------------------------
START TRANSACTION;
USE `DW4_NO_MAS_BULLYING`;
INSERT INTO `DW4_NO_MAS_BULLYING`.`implicados` (`idSituacion`, `idUsuario`, `rol`) VALUES (1, 2, 'victimario');
INSERT INTO `DW4_NO_MAS_BULLYING`.`implicados` (`idSituacion`, `idUsuario`, `rol`) VALUES (1, 4, 'victima');
INSERT INTO `DW4_NO_MAS_BULLYING`.`implicados` (`idSituacion`, `idUsuario`, `rol`) VALUES (2, 2, 'victima');
INSERT INTO `DW4_NO_MAS_BULLYING`.`implicados` (`idSituacion`, `idUsuario`, `rol`) VALUES (2, 5, 'victimario');

COMMIT;

-- -----------------------------------------------------
-- Data for table `DW4_NO_MAS_BULLYING`.`comentarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `DW4_NO_MAS_BULLYING`;
INSERT INTO `DW4_NO_MAS_BULLYING`.`comentarios` (`creador`, `contenido`, `fecha`, `idSituacion`) VALUES (1, 'Gracias por contactarte, perdon por no haber podido ayudarte en el momento, como esta tu codo?',  '2018-06-26 11:38:00', 1);
INSERT INTO `DW4_NO_MAS_BULLYING`.`comentarios` (`creador`, `contenido`, `fecha`, `idSituacion`) VALUES (4, 'Estoy mejor, pero esos chicos van a seguir molestandome', '2018-06-26 11:40:00', 1);
INSERT INTO `DW4_NO_MAS_BULLYING`.`comentarios` (`creador`, `contenido`, `fecha`, `idSituacion`) VALUES (1, 'Vamos a tomar medidas al respecto, por favor no dudes en contactarnos si esto ocurre nuevamente', '2018-06-26 11:52:00', 1);

COMMIT;
