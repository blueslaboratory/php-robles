/**
 * Author:  Alejandro
 * Created: 4 dic. 2021
 * Video: 107,108
 */
CREATE DATABASE blog_master;
USE blog_master;

CREATE TABLE usuarios(
id          INT(255) AUTO_INCREMENT NOT NULL,
nombre      VARCHAR(100) NOT NULL,
apellidos   VARCHAR(100) NOT NULL,
email       VARCHAR(255) NOT NULL,
password    VARCHAR(255) NOT NULL,
fecha       DATE NOT NULL, /* 2021-12-04 */
CONSTRAINT  pk_usuarios PRIMARY KEY(id),
CONSTRAINT  uq_email UNIQUE(email)
)ENGINE = InnoDb;
/*
InnoDb permite que todas las tablas esten interrelacionadas entre si y que las 
claves foraneas funcionen, asi como la integridad referencial
*/

CREATE TABLE categorias(
id          INT(255) AUTO_INCREMENT NOT NULL,
nombre      VARCHAR(100) NOT NULL,
CONSTRAINT  pk_categorias PRIMARY KEY(id)
)ENGINE = InnoDb;


CREATE TABLE entradas(
id              INT(255) AUTO_INCREMENT NOT NULL,
usuario_id      INT(255) NOT NULL,
categoria_id    INT(255) NOT NULL,
titulo          VARCHAR(255) NOT NULL,
descripcion     MEDIUMTEXT,
fecha           DATE NOT NULL,
CONSTRAINT PK_ENTRADAS PRIMARY KEY(id),
CONSTRAINT FK_entrada_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
CONSTRAINT FK_entrada_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)/* ON DELETE CASCADE */
                                                                                   /* ON UPDATE CASCADE*/
                                                                                   /* ON DELETE SET NULL/DEFAULT/NO ACTION*/
)ENGINE = InnoDb;