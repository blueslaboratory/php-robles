/**
 * Author:  Alejandro
 * Created: 4 ene. 2022
 * Video: 246
 */

CREATE DATABASE notas_master;
USE notas_master;

CREATE TABLE usuarios(
id          INT(255) AUTO_INCREMENT NOT NULL,
nombre      VARCHAR(100) NOT NULL,
apellidos   VARCHAR(100) NOT NULL,
email       VARCHAR(255) NOT NULL,
password    VARCHAR(255) NOT NULL,
fecha       DATE NOT NULL,
CONSTRAINT  pk_usuarios PRIMARY KEY(id),
CONSTRAINT  uq_email UNIQUE(email)
)ENGINE = InnoDb;
/*
InnoDb permite que todas las tablas esten interrelacionadas entre si y que las 
claves foraneas funcionen, asi como la integridad referencial
*/


CREATE TABLE notas(
id              INT(255) AUTO_INCREMENT NOT NULL,
usuario_id      INT(255) NOT NULL,
titulo          VARCHAR(255) NOT NULL,
descripcion     MEDIUMTEXT,
fecha           DATE NOT NULL,
CONSTRAINT PK_ENTRADAS PRIMARY KEY(id),
CONSTRAINT FK_entrada_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE = InnoDb;

/* ON DELETE CASCADE */
/* ON UPDATE CASCADE*/
/* ON DELETE SET NULL/DEFAULT/NO ACTION*/