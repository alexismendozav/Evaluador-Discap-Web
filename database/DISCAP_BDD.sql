CREATE DATABASE discap;
USE discap;

CREATE TABLE niveles (
                    id_nivel INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    grado VARCHAR(5) NOT NULL,
                    nivel VARCHAR (30) NOT NULL);

CREATE TABLE alumnos (
            id_alumno INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
            nombre VARCHAR(45) NOT NULL,
            apellido_paterno VARCHAR(45) NOT NULL,
            apellido_materno VARCHAR(45) NOT NULL,
            curp VARCHAR(18) NOT NULL,
            nacimiento VARCHAR(10) NOT NULL,
            sexo VARCHAR(5) NOT NULL,
            nivel_educativo INT NOT NULL,
            domicilio VARCHAR(100) NOT NULL, 
            diagnostico VARCHAR(50)  NOT NULL);


CREATE TABLE maestros(
            id_maestro INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
            nombre VARCHAR (45) NOT NULL,
            apellido_paterno VARCHAR (45) NOT NULL,
            apellido_materno VARCHAR(45) NOT NULL,
            correo VARCHAR(50) NOT NULL,
            contrasena VARCHAR(50) NOT NULL,
            domicilio VARCHAR(100) NOT NULL,
            nivel_educativo INT NOT NULL);


CREATE TABLE habilidades (
                    id_habilidad INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    nombre VARCHAR(30) NOT NULL,
                    area VARCHAR(30) NOT NULL);

CREATE TABLE evaluaciones (
                    id_evaluacion INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    alumno INT NOT NULL,
                    maestro INT NOT NULL,
                    habilidad INT NOT NULL,
                    lo_logra VARCHAR(5),
                    en_proceso VARCHAR(5),
                    no_logra VARCHAR(5),
                    fecha DATE NOT NULL,
                    observaciones VARCHAR(10000));

ALTER TABLE evaluaciones ADD CONSTRAINT fk_evaluacion_alumno FOREIGN KEY(alumno) REFERENCES alumnos(id_alumno);
ALTER TABLE evaluaciones ADD CONSTRAINT fk_evaluacion_maestro FOREIGN KEY(maestro) REFERENCES maestros(id_maestro);
ALTER TABLE evaluaciones ADD CONSTRAINT fk_evaluacion_habilidad FOREIGN KEY(habilidad) REFERENCES habilidades(id_habilidad);
ALTER TABLE alumnos ADD CONSTRAINT fk_alumnos_nivel FOREIGN KEY(nivel_educativo) REFERENCES niveles(id_nivel);
ALTER TABLE maestros ADD CONSTRAINT fk_maestros_nivel FOREIGN KEY(nivel_educativo) REFERENCES niveles(id_nivel);
 
INSERT INTO niveles VALUES(NULL,'1°','PREESCOLAR'),(NULL,'2°','PREESCOLAR'),(NULL,'3°','PREESCOLAR'),
                           (NULL,'1°','PRIMARIA'),(NULL,'2°','PRIMARIA'),(NULL,'3°','PRIMARIA'), 
                           (NULL,'4°','PRIMARIA'),(NULL,'5°','PRIMARIA'),(NULL,'6°','PRIMARIA'), 
                           (NULL,'1°','SECUNDARIA'),(NULL,'2°','SECUNDARIA'),(NULL,'3°','SECUNDARIA');

INSERT INTO maestros VALUES(NULL,'JESUS','GONZALES','PEREZ','jesus@gmail.com','1234','Conocido',4);

INSERT INTO alumnos VALUES (NULL,'Luis Raul','Otañez','Montiel','ASCD23412346S','09-04-1997','H',1,'CENTRO TEHUACAN PUEBLA','DOWN'),
(NULL,'Alexis Magdiel','Mendoza','Vallarta','ASCD23412346S','15-03-1997','H',4,'CENTRO TEHUACAN PUEBLA','ASPERGER'),
(NULL,'Valeria','Ladino','Nuñez','ASCD23412346S','08-02-1997','H',1,'CENTRO TEHUACAN PUEBLA','NADA');