/**
 * Author:  Alejandro
 * Created: 4 dic. 2021
 */

# CONSULTAS AGRUPAMIENTO #
SELECT titulo, categoria_id
FROM entradas GROUP BY categoria_id;

/* No funsiona: */
SELECT nombre FROM categorias;

SELECT e.categoria_id, c.nombre, e.titulo
FROM categorias c, entradas e GROUP BY categoria_id;

/* Funsiona: */
SELECT e.categoria_id, c.nombre, e.titulo
FROM categorias c, entradas e
WHERE e.categoria_id = c.id GROUP BY e.categoria_id;



SELECT COUNT(titulo) AS 'NUMERO DE ENTRADAS', categoria_id 
FROM entradas GROUP BY categoria_id;



# CONSULTAS AGRUPAMIENTO CON CONDICIONES#
SELECT COUNT(titulo) AS 'NUMERO DE ENTRADAS', categoria_id
FROM entradas GROUP BY categoria_id;

SELECT COUNT(titulo) AS 'NUMERO DE ENTRADAS', categoria_id
FROM entradas GROUP BY categoria_id HAVING COUNT(titulo)>=3;

SELECT COUNT(titulo) AS 'NUMERO DE ENTRADAS', categoria_id
FROM entradas GROUP BY categoria_id HAVING COUNT(titulo)!=3;
/*
cuando hacemos consultas de agrupamiento no es adecuado utilizar un WHERE, porque
el WHERE actua sobre una columna no sobre un GRUPO DE DATOS.
HAVING es lo mismo que el WHERE para las consultas normales pero sirve para las
consultas de agrupamiento
*/


/*
AVG         Sacar la media
COUNT       Contar el nº de elementos
MAX         Valor maximo del grupo
MIN         Valor minimo del grupo
SUM         Sumar todo el contenido del grupo
*/

SELECT * FROM entradas;
SELECT AVG(id) AS 'Media de entradas' FROM entradas;
SELECT MAX(id) AS 'Maximo ID', 'titulo' FROM entradas;
SELECT MIN(id) AS 'Minimo ID', 'titulo' FROM entradas;
SELECT SUM(id) AS 'Suma ID', 'titulo' FROM entradas;