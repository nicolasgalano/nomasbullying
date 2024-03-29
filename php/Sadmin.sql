-- MySQL Script generated by MySQL Workbench
-- 08/04/18 19:59:56
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema DW4_SUPERADMIN
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DW4_SUPERADMIN
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DW4_SUPERADMIN` DEFAULT CHARACTER SET utf8 ;
USE `DW4_SUPERADMIN` ;

-- -----------------------------------------------------
-- Table `DW4_SUPERADMIN`.`instituciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_SUPERADMIN`.`instituciones` ;

CREATE TABLE IF NOT EXISTS `DW4_SUPERADMIN`.`instituciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `institucion` VARCHAR(100) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `sdominio` VARCHAR(45) NOT NULL,
  `fecha_ins` DATE NOT NULL,
  `estado` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DW4_SUPERADMIN`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DW4_SUPERADMIN`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `DW4_SUPERADMIN`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `mail` VARCHAR(100) NOT NULL,
  `identificacion` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- -----------------------------------------------------
-- Data for table `DW4_SUPERADMIN`.`instituciones`
-- -----------------------------------------------------
START TRANSACTION;
USE `DW4_SUPERADMIN`;
INSERT INTO `DW4_SUPERADMIN`.`instituciones` (`id`, `institucion`, `nombre`, `sdominio`, `fecha_ins`, `estado`) VALUES (DEFAULT, 'Instituto Virgen Maria', 'Alberto Gomez', 'virgenmaria', '2018-06-26', 'A');
INSERT INTO `DW4_SUPERADMIN`.`instituciones` (`id`, `institucion`, `nombre`, `sdominio`, `fecha_ins`, `estado`) VALUES (DEFAULT, 'Instituto San Antonio', 'Pedro Lopez', 'sanantonio', '2018-06-27', 'A');
INSERT INTO `DW4_SUPERADMIN`.`instituciones` (`id`, `institucion`, `nombre`, `sdominio`, `fecha_ins`, `estado`) VALUES (DEFAULT, 'Instituto Esteban Echeverria', 'Victoria Campos', 'estebane', '2018-06-27', 'I');

COMMIT;

-- -----------------------------------------------------
-- Data for table `DW4_SUPERADMIN`.`usuarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `DW4_SUPERADMIN`;
INSERT INTO `DW4_SUPERADMIN`.`usuarios` (`id`, `nombre`, `apellido`, `password`, `mail`, `identificacion`) VALUES (DEFAULT, 'Juan', 'Francisconi', '$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm', 'juan@nomasbullying.com', 31000000);

COMMIT;