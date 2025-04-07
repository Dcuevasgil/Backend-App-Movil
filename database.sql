CREATE DATABASE IF NOT EXISTS epvbbdd;
USE epvbbdd;

-- Creacion de tablas

-- Tabla 'genero'
CREATE TABLE IF NOT EXISTS genero(
    id_genero INT NOT NULL AUTO_INCREMENT,
    genero VARCHAR(45) NOT NULL,
    PRIMARY KEY (id_genero)
) ENGINE = InnoDB;

-- Tabla 'ciudad'
CREATE TABLE IF NOT EXISTS ciudad(
    id_ciudad INT NOT NULL AUTO_INCREMENT,
    nombre_ciudad VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_ciudad)
) ENGINE = InnoDB;

-- Tabla 'usuarios'
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuarios INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45) NULL,
    correo VARCHAR(45) NULL,
    contraseña VARCHAR(8) NULL,
    descripcion_personal TEXT NULL,
    foto_perfil VARCHAR(255) NULL,
    imagen_cabecera VARCHAR(255) NULL,
    id_genero INT NOT NULL,  -- Relación con 'genero'
    id_ciudad INT NOT NULL,  -- Relación con 'ciudad'
    genero VARCHAR(45) NOT NULL,  -- Almacena 'Hombre' o 'Mujer'
    nombre_ciudad VARCHAR(255) NOT NULL,  -- Almacena el nombre de la ciudad
    PRIMARY KEY (id_usuarios),
    CONSTRAINT fk_usuarios_genero
        FOREIGN KEY (id_genero)
        REFERENCES genero (id_genero)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
    CONSTRAINT fk_usuarios_ciudad
        FOREIGN KEY (id_ciudad)
        REFERENCES ciudad (id_ciudad)
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
) ENGINE = InnoDB;