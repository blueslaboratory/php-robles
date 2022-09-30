/**
 * Author:  Alejandro
 * Created: 12 dic. 2021
 */


/*
2. Modificar la comision de los vendedores y ponerla al 0.5% cuando ganan mas
de 50.000
*/
SELECT * FROM vendedores;
UPDATE vendedores SET comision = 0.5 WHERE sueldo >= 50000;




/* 
3. Incrementar el precio de los coches en un 5%
*/
UPDATE coches SET precio = precio*1.05;
SELECT * FROM coches;




/*
4. Sacar todos los vendedores cuya fecha de alta sea posterior al 
1 de Julio de 2018
*/
SELECT * FROM vendedores WHERE fecha_alta >= '2018-07-01';
SELECT * FROM vendedores WHERE fecha_alta <= '2018-07-01';
SELECT * FROM vendedores;

UPDATE vendedores SET fecha_alta = '2017-04-03' WHERE id=8;





/*
5. Mostrar todos los vendedores con su nombre y el numero de dias que llevan
en el concesionario
*/
SELECT nombre, DATEDIFF(CURDATE(), fecha_alta) AS 'DIAS' FROM vendedores;
UPDATE vendedores SET fecha_alta = '2028-12-03' WHERE id='4';




/*
6. Visualizar el nombre y los apellidos de los vendedores en una misma columna,
su fecha de registro y el dia de la semana en la que se registraron
*/
SELECT CONCAT(nombre, ' ', apellidos) AS 'nombre y apellidos',
       fecha_alta, DAYNAME(fecha_alta) 
FROM vendedores;



/*
7. Mostrar nombre y sueldo de los vendedores con cargo de 'AYUDANTE EN TIENDA'
*/
SELECT nombre, sueldo, cargo FROM vendedores WHERE UPPER(cargo) = 'AYUDANTE EN TIENDA';



/*
8. Visualizar todos los coches en cuya marca exista la letra A y cuyo modelo
empiece por la letra F
*/
SELECT * FROM coches WHERE UPPER(marca) LIKE '%A%' AND UPPER(modelo) LIKE 'F%';




/*
9. Mostrar todos los vendedores del grupo 2 ordenados por salario de 
mayor a menor
*/
SELECT * FROM vendedores WHERE grupo_id = 2 ORDER BY sueldo DESC;
SELECT * FROM vendedores WHERE grupo_id = 1 ORDER BY sueldo DESC;
SELECT * FROM vendedores ORDER BY sueldo DESC;



/*
10. Visualizar los apellidos de los vendedores, su fecha y su numero de grupo,
ordenado por fecha, descendente, mostrar los 4 ultimos
*/
SELECT apellidos, fecha_alta, id FROM vendedores ORDER BY fecha_alta DESC LIMIT 4;



/*
11. Visualizar todos los cargos de los vendedores y el numero de vendedores
en cada cargo
*/
SELECT cargo, COUNT(id) FROM vendedores GROUP BY cargo ORDER BY COUNT(id) DESC;



/*
12. Conseguir la masa salarial del concesionario anual
*/
SELECT SUM(sueldo) AS 'Masa Salarial' FROM vendedores;



/*
13. Media de sueldos entre todos los vendedores por grupo
*/

SELECT grupo_id, AVG(sueldo) FROM vendedores GROUP BY grupo_id;

SELECT CEIL(AVG(v.sueldo)) AS 'Media Salarial', g.nombre, g.ciudad 
FROM vendedores v
INNER JOIN grupos g ON g.id = v.grupo_id
GROUP BY grupo_id
ORDER BY v.sueldo;



/*
14. Visualizar las unidades totales vendidas de cada coche a cada cliente.
Mostrando el nombre del producto, numero de cliente y la suma de unidades.
*/

SELECT cl.nombre AS 'Cliente', c.modelo AS 'Coche', SUM(cantidad) AS 'Unidades' 
FROM encargos e
INNER JOIN coches c ON c.id = e.coche_id
INNER JOIN clientes cl ON cl.id = e.cliente_id
GROUP BY e.coche_id, e.cliente_id;



/*
15. Mostrar los 2 clientes con mayor numero de encargos y cuantos hicieron
*/
SELECT cliente_id, COUNT(id) FROM encargos 
GROUP BY cliente_id ORDER BY 2 DESC LIMIT 2; 

INSERT INTO encargos VALUES(NULL, 4, 4, 3, CURDATE());

SELECT c.nombre, COUNT(e.id) FROM encargos e 
INNER JOIN clientes c ON c.id = e.cliente_id
GROUP BY cliente_id ORDER BY 2 DESC LIMIT 2;




/*
16. Obtener un listado de clientes atendidos por el vendedor 'DAVID LOPEZ'
*/

/*podria haber un IN*/
SELECT * FROM clientes WHERE vendedor_id = 
    (SELECT id FROM vendedores WHERE UPPER(nombre) = 'DAVID' AND
                                     UPPER (apellidos) = 'LOPEZ');

UPDATE clientes SET vendedor_id=4 WHERE id =3;
UPDATE clientes SET vendedor_id=4 WHERE id =5;
UPDATE clientes SET vendedor_id=2 WHERE id =6;




/*
17.Obtener un listado con los encargos realizados por 'FRUTERIA ANTONIA INC'
*/
SELECT * FROM encargos WHERE cliente_id IN
    (SELECT id FROM clientes WHERE UPPER(nombre) = 'FRUTERIA ANTONIA INC');

SELECT e.id AS 'Nr Encargo', c.nombre, co.modelo, cantidad, e.fecha FROM encargos e
INNER JOIN clientes c ON c.id = e.cliente_id
INNER JOIN coches co ON co.id = e.coche_id
WHERE e.cliente_id IN
    (SELECT id FROM clientes WHERE UPPER(nombre) = 'FRUTERIA ANTONIA INC');




/*
18. Listar los clientes que han hecho algun encargo del coche mercedes ranchera
*/
SELECT * FROM clientes WHERE id IN
    (SELECT cliente_id FROM encargos);

SELECT * FROM clientes WHERE id IN
    (SELECT cliente_id FROM encargos WHERE coche_id IN 
        (SELECT id FROM coches WHERE UPPER(MODELO) LIKE '%MERCEDES RANCHERA%'));



/*
19. Obtener los vendedores con 2 o mas clientes
*/
SELECT * FROM vendedores WHERE id IN
    (SELECT vendedor_id FROM clientes);

SELECT * FROM vendedores WHERE id IN
    (SELECT vendedor_id FROM clientes 
     GROUP BY vendedor_id HAVING COUNT(id)>=2);

SELECT * FROM clientes;



/*
20. Seleccionar el grupo en el que trabaja el vendedor con mayor salario
y mostrar el nombre del grupo
*/
SELECT * FROM grupos WHERE id IN
    (SELECT grupo_id FROM vendedores WHERE sueldo = 
        (SELECT MAX(sueldo) FROM vendedores));

SELECT * FROM vendedores ORDER BY sueldo DESC limit 1;



/*
21. Obtener los nombres y ciudades de los clientes con encargos de >3 unidades
*/
SELECT nombre, ciudad FROM clientes WHERE id IN
    (SELECT cliente_id FROM encargos WHERE cantidad >= 3);



/*
22. Mostrar listado de clientes (numero de cliente y el nombre)
mostrar tambien el numero de vendedor y su nombre
*/
SELECT c.id AS 'C id', c.nombre, v.id AS 'V id', 
       CONCAT(v.nombre,' ',v.apellidos) AS 'Vendedor'
FROM clientes c, vendedores v
WHERE c.vendedor_id = v.id;




/*
23. Listar todos los encargos realizados con la marca del coche y el nombre
del cliente
*/
SELECT e.id, co.marca, c.nombre FROM encargos e
INNER JOIN coches co ON co.id = e.coche_id
INNER JOIN clientes c ON c.id = e.cliente_id;




/*
24. Listar los encargos con el nombre del coche, el nombre del cliente y
el nombre de la ciudad pero unicamente cuando sean de Barcelona
*/
SELECT * FROM clientes;

SELECT e.id, co.modelo, c.nombre, c.ciudad FROM encargos e
INNER JOIN coches co ON co.id = e.coche_id
INNER JOIN clientes c ON c.id = e.cliente_id
WHERE UPPER(c.ciudad) = 'BARCELONA';



/*
25. Obtener una lista de los nombres de los clientes con el importe de sus 
encargos acumulados
*/
SELECT nombre, SUM(precio*cantidad) AS 'Importe'
FROM clientes ci
INNER JOIN encargos en ON ci.id = en.cliente_id
INNER JOIN coches co ON en.coche_id = co.id
GROUP BY ci.nombre
ORDER BY 2 ASC;

SELECT * FROM encargos;
SELECT * FROM coches;
SELECT * FROM clientes;




/*
26. Sacar vendedores que tienen jefe y sacar el nombre del jefe
*/
SELECT CONCAT(v1.nombre,' ', v1.apellidos) AS 'Vendedor', 
       CONCAT(v2.nombre,' ', v2.apellidos) AS 'Jefe' 
FROM vendedores v1
INNER JOIN vendedores v2 ON v1.jefe = v2.id;




/*
27. Visualizar los nombres de los clientes y la cantidad de encargos
realizados incluyendo los que no hayan realizado encargos
*/
INSERT INTO clientes VALUES(NULL, 5, 'Tienda Organica Inc', 'Murcia', 0, CURDATE());

SELECT c.id, c.nombre FROM clientes c
RIGHT JOIN encargos e ON c.id = e.cliente_id;

SELECT c.id, c.nombre, COUNT(e.id) FROM clientes c
LEFT JOIN encargos e ON c.id = e.cliente_id
GROUP BY 1;
/* 
Es con 1 left join para que te saque los que no tienen encargos
GROUP BY 1 es como group by c.nombre
*/



/*
28. Mostrar todos los vendedores tengan o no clientes y mostrar el numero
de clientes. Se deben mostrar tengan o no clientes
Intentos: II
*/
SELECT v.nombre, v.apellidos, COUNT(c.id) FROM vendedores v
LEFT JOIN clientes c ON c.vendedor_id = v.id;

SELECT v.nombre, v.apellidos, COUNT(c.id) FROM vendedores v
LEFT JOIN clientes c ON c.vendedor_id = v.id
GROUP BY v.id;

/* Ya funciona bien */
SELECT v.nombre, v.apellidos, COUNT(c.id) FROM clientes c
RIGHT JOIN vendedores v ON v.id = c.vendedor_id 
GROUP BY v.id;
/*
- (INNER) JOIN: Returns records that have matching values in both tables
- LEFT (OUTER) JOIN: Returns all records from the left table, and the matched 
  records from the right table
- RIGHT (OUTER) JOIN: Returns all records from the right table, and the matched 
  records from the left table
- FULL (OUTER) JOIN: Returns all records when there is a match in either left 
  or right table
*/



/*
29. Crear una vista llamada vendedoresA que incluira todos los vendedores
del grupo que se llame 'Vendedores A'
Intentos: II
*/
SELECT * FROM grupos;

CREATE VIEW vendedoresA AS
    SELECT * FROM vendedores WHERE grupo_id IN
        (SELECT id FROM grupos WHERE UPPER(nombre) = 'VENDEDORES A');

SHOW TABLES;
SELECT * FROM VENDEDORESA;



/*
30. Mostrar los datos del vendedor con mas antiguedad en el concesionario
*/
SELECT * FROM vendedores ORDER BY fecha_alta ASC LIMIT 1;



/*
30 plus: Obtener los el coche con mas unidades vendidas
Intentos: II
Los LIMIT no se pueden utilizar en una subconsulta
*/
SELECT * FROM coches WHERE id IN
    (SELECT coche_id FROM encargos WHERE cantidad IN
        (SELECT MAX(cantidad) FROM encargos));

SELECT * FROM encargos;