/**
 * Author:  Alejandro
 * Created: 3 dic. 2021
 */

/*
20211202

Sentencias básicas de PHP:

status;
create database blog_master;
show databases;
use blog_master;
show tables;
drop database blog_master;

20211204
drop table usuarios;
*/


/* 
CREAR TABLA
*/

/*
int(nº cifras)                      ENTERO (maximo 4294967295)
integer(nº cifras)                  ENTERO
varchar (nº caracteres)             STRING/ALFANUMERICO (maximo 255)
char (nº caracteres)                STRING/ALFANUMERICO
float (nº cifras, nº decimales)     DECIMAL/COMA FLOTANTE
date, time, timestamp

// STRINGS MAS GRANDES
TEXT        (65535 caracteres)
MEDIUMTEXT  (16 millones caracteres)
LONGTEXT    (4 billones de caracteres)


// ENTEROS MAS GRANDES
MEDIUMINT
BIGINT
*/


CREATE TABLE usuarios(
id                int(11) AUTO_INCREMENT NOT NULL,
/* AUTO_INCREMENT SOLO DISPONIBLE PARA CLAVES PRIMARIAS*/
nombre            varchar(100) NOT NULL,
apellidos         varchar(255) DEFAULT 'hola que tal',
email             varchar(100) NOT NULL,
password          varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY (id) 
);

/*
DESCRIBE USUARIOS;
DROP TABLE usuarios;
*/

/*
Nota:
Usuario: administrador
Pw:      1234

*/