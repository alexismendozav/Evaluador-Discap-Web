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
                    nombre VARCHAR(500) NOT NULL,
                    area VARCHAR(100) NOT NULL);

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

INSERT INTO habilidades VALUES (NULL,'Sigue objetos en movimiento','ATENCIÓN VISUAL'),
(NULL,'Atiende objetos próximos y distantes','ATENCIÓN VISUAL'),
(NULL,'Busca el objeto perdido','ATENCIÓN VISUAL'),
(NULL,'Responde a un estímulo sonoro','ATENCIÓN AUDITIVA'),
(NULL,'Busca la fuente sonora','ATENCIÓN AUDITIVA'),
(NULL,'Presenta disociación de labio','CAVIDAD OROFAIAL'),
(NULL,'Presenta disociación de lengua','CAVIDAD OROFAIAL'),
(NULL,'Presenta disociación de mandíbula','CAVIDAD OROFAIAL'),
(NULL,'Reconoce la cabeza','ESQUEMA CORPORAL'),
(NULL,'Reconoce la cabeza','ESQUEMA CORPORAL'),
(NULL,'Reconoce los brazos','ESQUEMA CORPORAL'),
(NULL,'Reconoce las manos','ESQUEMA CORPORAL'),
(NULL,'Reconoce las piernas','ESQUEMA CORPORAL'),
(NULL,'Reconoce los ojos','ESQUEMA CORPORAL'),
(NULL,'Reconoce la boca','ESQUEMA CORPORAL'),
(NULL,'Discrimina sonidos del medio ambiente','LENGUAJE COMPRENSIVO'),
(NULL,'Sigue órdenes de un comando','LENGUAJE COMPRENSIVO'),
(NULL,'Sigie órdenes de dos comandos','LENGUAJE COMPRENSIVO'),
(NULL,'Expresa placer-displacer','COMUNICACIÓN'),
(NULL,'Maneja código elemental de comunicación (si - no)','COMUNICACIÓN'),
(NULL,'Expresa placer-displacer','COMUNICACIÓN'),
(NULL,'Presenta patrón basico de respuesta por palabra hablada','COMUNICACIÓN'),
(NULL,'Presenta patrón basico de respuesta por palabra escrita','COMUNICACIÓN'),
(NULL,'Presenta patrón basico de respuesta por movimiento de cabeza','COMUNICACIÓN'),
(NULL,'Presenta patrón basico de respuesta por movimiento de brazos o manos','COMUNICACIÓN'),
(NULL,'Presenta patrón basico de respuesta por movimientos de piernas o pies','COMUNICACIÓN'),
(NULL,'Presenta patrón basico de respuesta por movimientos oculares','COMUNICACIÓN'),
(NULL,'Repite vocales y silabas simples','COMUNICACIÓN'),
(NULL,'Repite silabas complejas','COMUNICACIÓN'),
(NULL,'Repite palabras','COMUNICACIÓN'),
(NULL,'Elabora frases con cualquier sistema de comunicación','COMUNICACIÓN'),
(NULL,'Responde a preguntas sencillas','COMUNICACIÓN'),
(NULL,'Imita de manera voluntaria movimientos','IMITACIÓN'),
(NULL,'Imita movimientos en forma diferida','IMITACIÓN'),
(NULL,'Sigue órdenes de tres comandos','SIGUE INSTRUCCIONES'),
(NULL,'Tiene concepto de mucho-poco','PRECURSOR NÚMERICO'),
(NULL,'Ordena','PRECURSOR NÚMERICO'),
(NULL,'Fija y mantiene la mirada con el interlocutor','PREOPERACIONAL TEMPRANA'),
(NULL,'Sonrisa social (3 meses de edad)','PREOPERACIONAL TEMPRANA'),
(NULL,'Reconoce su imagen en el espejo (8 mese)','PREOPERACIONAL TEMPRANA'),
(NULL,'Reconoce y responde a voces familiares','PREOPERACIONAL TEMPRANA'),
(NULL,'Reconoce o identifica a la madre o figura sustituta (8-9 meses)','PREOPERACIONAL TEMPRANA'),
(NULL,'Uso del "no"','PREOPERACIONAL TEMPRANA'),
(NULL,'Indiscriminado','PREOPERACIONAL TEMPRANA'),
(NULL,'Adecuado','PREOPERACIONAL TEMPRANA'),
(NULL,'Tiene conciencia de propiedad','PREOPERACIONAL TEMPRANA'),
(NULL,'Puede estar con una persona conocida como el maestro, tíos, amigos de la familia, etc.','PREOPERACIONAL TEMPRANA'),
(NULL,'Participa en la elección de sus alimentos, prendas de vestir y juguetes','PREOPERACIONAL TEMPRANA'),
(NULL,'Discrimina colores primarios: rojo, azul, amarillo','SENSOPERCEPCIÓN'),
(NULL,'Discrimina colores secundarios: naranja, verde, morado','SENSOPERCEPCIÓN'),
(NULL,'Discrimina otros colores: blanco, negro, rosa, café','SENSOPERCEPCIÓN'),
(NULL,'Discrimina formas geométricas basicas: círculo, cuadrado, tríangulo y rectangulo','DISCRIMINACIÓN DE FORMAS'),
(NULL,'Identifica: Día-noche','NOCIONES TEMPOROESPACIALES'),
(NULL,'Identifica: Ayer-hoy-mañana','NOCIONES TEMPOROESPACIALES'),
(NULL,'Conoce los días de la semana','NOCIONES TEMPOROESPACIALES'),
(NULL,'Conoce: meses del año','NOCIONES TEMPOROESPACIALES'),
(NULL,'Diferencia: arriba - abajo','NOCIONES TEMPOROESPACIALES'),
(NULL,'Diferencia: atrás - adelante','NOCIONES TEMPOROESPACIALES'),
(NULL,'Identifica: Derecha - izquierda','LATERALIDAD'),
(NULL,'Identifica: patrón cruzado','LATERALIDAD'),
(NULL,'Identifica: Derecha - izquierda en objetos','LATERALIDAD'),
(NULL,'Recuerda sonidos diferentes 1,2 o 3','MEMORIA AUDITIVA'),
(NULL,'Recuerda secuencias de sonidos diferentes 2 o 3','MEMORIA AUDITIVA'),
(NULL,'Recuerda estímulos visuales 1,2 o 3','MEMORIA VISUAL'),
(NULL,'Recuerda secuencias de estímulos visuales 2 o 3','MEMORIA VISUAL'),
(NULL,'Identifica grande-chico','PRENUMERICOS'),
(NULL,'Identifica largo-corto','PRENUMERICOS'),
(NULL,'Identifica lleno-vacío','PRENUMERICOS'),
(NULL,'Puede hacer relación de 1 a 1','PRENUMERICOS'),
(NULL,'Puede clasificar','PRENUMERICOS'),
(NULL,'Maneja concepto numérico','PRENUMERICOS'),
(NULL,'Identifica las orejas','ESQUEMA CORPORAL'),
(NULL,'Identifica la nariz','ESQUEMA CORPORAL'),
(NULL,'Identifica las cejas','ESQUEMA CORPORAL'),
(NULL,'Identifica las pestañas','ESQUEMA CORPORAL'),
(NULL,'Identifica los dientes','ESQUEMA CORPORAL'),
(NULL,'Identifica el codo','ESQUEMA CORPORAL'),
(NULL,'Identifica la muñeca','ESQUEMA CORPORAL'),
(NULL,'Identifica el tobillo','ESQUEMA CORPORAL'),
(NULL,'Respeta espacios gráficos','ESCRITURA'),
(NULL,'Reconoce vocales maypusculas y minúsculas','ESCRITURA'),
(NULL,'Reconoce constantes mayúsculas minúsculas','ESCRITURA'),
(NULL,'Reconoce su nombre escrito','ESCRITURA'),
(NULL,'Escribe su nombre','ESCRITURA'),
(NULL,'Escribe enunciados','ESCRITURA'),
(NULL,'Escribe al dictado','ESCRITURA'),
(NULL,'Lee sílabas','LECTURA'),
(NULL,'Lee palabras','LECTURA'),
(NULL,'Lee frases','LECTURA'),
(NULL,'Comprende frases que él lee','LECTURA'),
(NULL,'Comprende textos que él lee','LECTURA'),
(NULL,'Realiza conteo','CÁLCULO'),
(NULL,'Reconoce números anteriores y posteriores','CÁLCULO'),
(NULL,'Tiene concepto de unidad','CÁLCULO'),
(NULL,'Tiene concepto de decena','CÁLCULO'),
(NULL,'Tiene concepto de centena','CÁLCULO'),
(NULL,'Tiene concepto de unidades de millar','CÁLCULO'),
(NULL,'Tiene concepto de decenas de millar','CÁLCULO'),
(NULL,'Tiene concepto de de centenas de millar','CÁLCULO'),
(NULL,'Realiza secuencia numérica escrita','CÁLCULO'),
(NULL,'Resuelve sumas sencillas con unidades','CÁLCULO'),
(NULL,'Resuelve sumas sencillas con decenas','CÁLCULO'),
(NULL,'Resuelve sumas sencillas con centenas','CÁLCULO'),
(NULL,'Resuelve restas sencillas con unidades','CÁLCULO'),
(NULL,'Resuelve restas sencillas con decenas','CÁLCULO'),
(NULL,'Resuelve restas sencillas con centenas','CÁLCULO'),
(NULL,'Resuelve multiplicaciones con multiplicador de una cifra','CÁLCULO'),
(NULL,'Resuelve multiplicaciones con multiplicador de dos cifras','CÁLCULO'),
(NULL,'Resuelve multiplicaciones con multiplicador de tres cifras','CÁLCULO'),
(NULL,'Resuelve divisiones con divisor de una cifra','CÁLCULO'),
(NULL,'Resuelve divisiones con divisor de dos cifras','CÁLCULO'),
(NULL,'Resuelve divisiones con divisor de tres cifras','CÁLCULO'),
(NULL,'Resuelve problemas sencillos de suma y resta','CÁLCULO'),
(NULL,'Usa calculadora','CÁLCULO');











