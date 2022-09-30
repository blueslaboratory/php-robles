/**
 * Author:  Alejandro
 * Created: 11 dic. 2021
 */

/*
CONSULTA MULTITABLA:
Son consultas que sirven para consultar varias tablas en una sola sentencia
Recorren todas las filas de todas las tablas y por ello puede llegar a ser muy
pesado, por lo que se recomiendan los inner joins por eficiencia
*/

SELECT * FROM entradas;



# Mostrar las entradas con el nombre del autor y el nombre de la categoria #
SELECT titulo FROM entradas, usuarios, categorias;
SELECT entradas.titulo FROM entradas, usuarios, categorias;

SELECT entradas.titulo, usuarios.nombre, categorias.nombre
FROM entradas, usuarios, categorias;

SELECT e.titulo, u.nombre, c.nombre 
FROM entradas e, usuarios u, categorias c;

SELECT e.id, e.titulo, u.nombre AS 'Autor', c.nombre AS 'Categoria'
FROM entradas e, usuarios u, categorias c
WHERE e.usuario_id = u.id;

SELECT e.id, e.titulo, u.nombre AS 'Autor', c.nombre AS 'Categoria'
FROM entradas e, usuarios u, categorias c
WHERE e.usuario_id = u.id AND e.categoria_id = c.id;



# INNER JOIN: es como el de arriba pero mas optimizado #
SELECT e.id, e.titulo, u.nombre AS 'Autos'
FROM entradas e /* tabla principal */
INNER JOIN usuarios u ON e.usuario_id = u.id; 

SELECT e.id, e.titulo, u.nombre AS 'Autor', c.nombre AS 'Categoria'
FROM entradas e /* tabla principal */
INNER JOIN usuarios u ON e.usuario_id = u.id
INNER JOIN categorias c ON e.categoria_id = c.id;




# Mostrar el nombre de las categorias y al lado cuantas entradas tienen #
SELECT c.nombre, COUNT(e.id) FROM categorias c, entradas e
WHERE e.categoria_id = c.id;

SELECT c.nombre, COUNT(e.id) FROM categorias c, entradas e
WHERE e.categoria_id = c.id GROUP BY e.categoria_id;

# INNER JOIN: tabla entradas#
SELECT c.nombre, COUNT(e.id) FROM categorias c
INNER JOIN entradas e ON e.categoria_id = c.id;

SELECT c.nombre, COUNT(e.id) FROM categorias c
INNER JOIN entradas e ON e.categoria_id = c.id
GROUP BY e.categoria_id;

# LEFT JOIN: tabla categorias #
SELECT c.nombre, COUNT(e.id) FROM categorias c
LEFT JOIN entradas e ON e.categoria_id = c.id
GROUP BY e.categoria_id;

# RIGHT JOIN #
SELECT c.nombre, COUNT(e.id) FROM entradas e
RIGHT JOIN categorias c ON e.categoria_id = c.id
GROUP BY e.categoria_id;




# Mostrar el email de los usuarios y al lado cuantas entradas tienen #
SELECT u.email, e.titulo, e.usuario_id FROM usuarios u, entradas e
WHERE e.usuario_id = u.id;

SELECT email, COUNT(titulo) FROM usuarios u, entradas e
WHERE e.usuario_id = u.id GROUP BY e.usuario_id;