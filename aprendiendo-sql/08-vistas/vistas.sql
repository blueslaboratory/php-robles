/**
 * Author:  Alejandro
 * Created: 11 dic. 2021
 */

/*
Vistas:
Las podemos definir como una consulta almacenada en la base de datos que se
utiliza como una tabla virtual.
No almacena datos sino que utiliz asociaciones y los datos originales de las
tablas, de forma que siempre se mantiene actualizada
*/


CREATE VIEW entradas_con_nombres AS
# INNER JOIN: es como el de arriba pero mas optimizado #
SELECT e.id, e.titulo, u.nombre AS 'Autor', c.nombre AS 'Categoria'
FROM entradas e
INNER JOIN usuarios u ON e.usuario_id = u.id
INNER JOIN categorias c ON e.categoria_id = c.id;


/* No se diferencia una tabla de una vista */
show tables;
SHOW CREATE VIEW entradas_con_nombres;
SELECT * FROM entradas_con_nombres;
SELECT * FROM entradas_con_nombres WHERE UPPER(autor)= 'BUBBLES';

DROP VIEW entradas_con_nombres;