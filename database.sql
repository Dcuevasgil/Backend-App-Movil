-- Active: 1747766558264@@127.0.0.1@3306
CREATE DATABASE IF NOT EXISTS epvtrainerbbdd;
USE epvtrainerbbdd;

-- -----------------------------------------------------
-- Table `epvtrainerbbdd`.`localidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epvtrainerbbdd`.`localidades` (
  `id_localidad` INT NOT NULL AUTO_INCREMENT,
  `nombre_localidad` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_localidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epvtrainerbbdd`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epvtrainerbbdd`.`perfil` (
  `id_perfil` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `contraseña` VARCHAR(45) NULL,
  `descripcion_personal` TEXT NULL DEFAULT NULL,
  `sexo` ENUM('H', 'M') NULL DEFAULT NULL,
  `foto_usuario` TEXT NULL DEFAULT NULL,
  `fecha_creacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `localidad_id` INT NOT NULL,
  PRIMARY KEY (`id_perfil`),
  INDEX `fk_perfil_localidades_idx` (`localidad_id` ASC) VISIBLE,
  CONSTRAINT `fk_perfil_localidades`
    FOREIGN KEY (`localidad_id`)
    REFERENCES `epvtrainerbbdd`.`localidades` (`id_localidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;