/**
 * Author:  Alejandro
 * Created: 2 jun. 2022
 * VÍDEO 356. Crear la BBDD
 * VÍDEO 360. Rellenar la base de datos
 */


DROP DATABASE IF EXISTS laravel_master;
CREATE DATABASE IF NOT EXISTS laravel_master;
USE laravel_master;

CREATE TABLE IF NOT EXISTS users(
id              int(255) auto_increment not null,
role            varchar(20),
name            varchar(100),
surname         varchar(200),
nick            varchar(100),
email           varchar(255),
password        varchar(255),
image           varchar(255),
created_at      datetime,
updated_at      datetime,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL, 'user', 'Victor', 'Robles', 'victorroblesweb', 'victor@victor.com', '1234', null, CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES(NULL, 'user', 'Blues', 'Laboratory', 'blueslaboratory', 'blue@lab.com', '1234', null, CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES(NULL, 'user', 'Alejandro', '', 'alexblue_99', 'alex@lab.com', '1234', null, CURTIME(), CURTIME(), NULL);


CREATE TABLE IF NOT EXISTS images(
id              int(255) auto_increment not null,
user_id         int(255),
image_path      varchar(255),
description     text,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_images PRIMARY KEY(id),
CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

INSERT INTO images VALUES(NULL, 1, 'test.jpg', 'descripcion de prueba 1', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 1, 'playa.jpg', 'descripcion de prueba 2', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 1, 'arena.jpg', 'descripcion de prueba 3', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 1, 'familia.jpg', 'descripcion de prueba 4', CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS comments(
id              int(255) auto_increment not null,
user_id         int(255),
image_id        int(255),
content         text,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_comments PRIMARY KEY (id),
CONSTRAINT fk_comments_users FOREIGN KEY (user_id) REFERENCES users(id),
CONSTRAINT fk_comments_images FOREIGN KEY (image_id) REFERENCES images(id)
)ENGINE=InnoDb;

INSERT INTO comments VALUES(NULL, 1, 4, 'Buena foto de familia!!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 1, 'Buena foto de PLAYA!!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 1, 4, 'que bueno!!', CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS likes(
id              int(255) auto_increment not null,
user_id         int(255),
image_id        int(255),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_likes PRIMARY KEY (id),
CONSTRAINT fk_likes_users FOREIGN KEY (user_id) REFERENCES users(id),
CONSTRAINT fk_likes_images FOREIGN KEY (image_id) REFERENCES images(id)
)ENGINE=InnoDb;

INSERT INTO likes VALUES(NULL, 1, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 1, CURTIME(), CURTIME());