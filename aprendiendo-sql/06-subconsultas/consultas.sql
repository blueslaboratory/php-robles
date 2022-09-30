/* 
 SUBCONSULTAS:
    - Consultas que se ejecutan dentro de otras
    - Consiste en utilizar los resultados de la subconsulta para operar en la
      consulta principal
    - Jugando con las claves ajenas/Foreign Keys (FK)
 */
/**
 * Author:  Alejandro
 * Created: 10 dic. 2021
 */

INSERT INTO usuarios VALUES(NULL, "Admin", "Admin", "admin@admin.com", "admin", CURDATE());


# Sacar usuarios con entradas #
SELECT * FROM usuarios WHERE id 
    IN (SELECT usuario_id FROM entradas);
SELECT * FROM usuarios WHERE id 
    NOT IN (SELECT usuario_id FROM entradas);

SELECT usuario_id FROM entradas;


# Sacar los usuarios que en su entrada tengan algun titulo de GTA #
INSERT INTO entradas VALUES(NULL, 3, 1, "Guia de GTA Vice City", "GTA", CURDATE());
SELECT * FROM entradas;
SELECT usuario_id FROM entradas WHERE titulo LIKE "%GTA%";
SELECT nombre, apellidos FROM usuarios WHERE id 
    IN(SELECT usuario_id FROM entradas WHERE titulo LIKE "%GTA%");


# Sacar todas las entradas de la categoria accion utilizando su nombre #
SELECT categoria_id, titulo FROM entradas WHERE categoria_id
    IN (SELECT id FROM categorias WHERE UPPER(nombre) = 'ACCION');
SELECT categoria_id, titulo FROM entradas WHERE categoria_id
    IN (SELECT id FROM categorias WHERE UPPER(nombre) = 'DEPORTES');


# Mostrar las categorias con mas de 3 entradas o mas #
SELECT * FROM categorias WHERE id 
    IN (SELECT categoria_id FROM entradas GROUP BY categoria_id HAVING COUNT(categoria_id) >=3);


SELECT COUNT(categoria_id),categoria_id FROM entradas GROUP BY categoria_id;
SELECT categoria_id FROM entradas;
SELECT categoria_id FROM entradas GROUP BY categoria_id;
SELECT categoria_id FROM entradas GROUP BY categoria_id HAVING COUNT(categoria_id) >=3;


# Mostrar los usuarios que crearon una entrada un viernes, DAYOFWEEK cuenta desde el domingo #
SELECT * FROM usuarios WHERE id 
    IN (SELECT usuario_id FROM entradas WHERE DAYOFWEEK(fecha)=6);

SELECT * FROM entradas WHERE DAYOFWEEK(fecha)=6; /*viernes*/
SELECT * FROM entradas WHERE DAYOFWEEK(fecha)=7; /*sabado*/

INSERT INTO entradas VALUES(NULL, 1, 2, 'Jugando con SQL', 'sql', CURDATE());


# Mostrar el nombre de el usuario que tenga mas entradas #
SELECT nombre FROM usuarios WHERE id = 
    (SELECT usuario_id FROM entradas 
     GROUP BY usuario_id ORDER BY COUNT(id) DESC LIMIT 1);

SELECT CONCAT(nombre, ' ', apellidos) AS 'El usuario con mas entradas' FROM usuarios WHERE id = 
    (SELECT usuario_id FROM entradas 
     GROUP BY usuario_id ORDER BY COUNT(id) DESC LIMIT 1);

/* Con el IN no FUNCIONA */
SELECT CONCAT(nombre, ' ', apellidos) AS 'El usuario con mas entradas' FROM usuarios WHERE id 
    IN (SELECT usuario_id, COUNT(id) FROM entradas
    GROUP BY usuario_id ORDER BY COUNT(id) DESC LIMIT 1);

/* consultas */
SELECT * FROM usuarios;
SELECT nombre FROM usuarios;
SELECT id, CONCAT(nombre, ' ', apellidos) AS 'El usuario con mas entradas' FROM usuarios;

/* subconsultas */
SELECT COUNT(id) FROM entradas;
SELECT usuario_id, COUNT(id) FROM entradas GROUP BY usuario_id;
SELECT usuario_id, COUNT(id) FROM entradas GROUP BY usuario_id ORDER BY COUNT(id) DESC LIMIT 1;



# Mostrar las categorias sin entradas #
SELECT * FROM categorias WHERE id 
    NOT IN (SELECT categoria_id FROM entradas);

INSERT INTO categorias VALUES(NULL, 'Plataformas');
SELECT * FROM categorias;