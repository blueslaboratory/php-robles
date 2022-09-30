 /**
 * Author:  Alejandro
 * Created: 4 dic. 2021
 */

# MOSTRAR TODOS LOS REGISTROS / FILAS DE UNA TABLA #
SELECT email, nombre, apellidos FROM usuarios;


# MOSTRAR TODOS LOS CAMPOS #
SELECT * FROM usuarios;


# OPERADORES ARITMETICOS #
SELECT email, (7+7) AS 'OPERACION' FROM usuarios;
SELECT email, (7-7) AS 'OPERACION' FROM usuarios;
SELECT email, (7*7) AS 'OPERACION' FROM usuarios;
SELECT email, (7/7) AS 'OPERACION' FROM usuarios;

SELECT email, (id/7) AS 'OPERACION' FROM usuarios;


# FUNCIONES MATEMATICAS #
SELECT ABS(7.88) AS 'OPERACION' FROM usuarios;
SELECT CEIL(7.88) AS 'OPERACION' FROM usuarios;
SELECT FLOOR(7.88) AS 'OPERACION' FROM usuarios;
SELECT PI() AS 'OPERACION' FROM usuarios;
SELECT RAND() AS 'OPERACION' FROM usuarios;
SELECT ROUND(7.88,1) AS 'OPERACION' FROM usuarios;
SELECT SQRT(7.88) AS 'OPERACION' FROM usuarios;
SELECT TRUNCATE(7.88, 0) AS 'OPERACION' FROM usuarios;


# FUNCIONES PARA TEXTOS #
SELECT UPPER(nombre) FROM usuarios;
SELECT LOWER(nombre) FROM usuarios;
SELECT CONCAT(nombre, ' ', apellidos) as 'CONVERSION' FROM usuarios;
SELECT UPPER(CONCAT(nombre, ' ', apellidos)) as 'CONVERSION' FROM usuarios;
SELECT LENGTH(CONCAT(nombre, ' ', apellidos)) as 'CONVERSION' FROM usuarios;
SELECT TRIM(CONCAT('    ', nombre, '      ', apellidos, '    ')) AS 'CONVERSION' FROM usuarios;


# FUNCIONES DE FECHA #
SELECT email, fecha FROM usuarios;
SELECT email, fecha, CURDATE() AS 'Fecha actual' FROM usuarios;
SELECT email, DATEDIFF(fecha, CURDATE()) AS 'Fecha actual' FROM usuarios;
SELECT email, DAYNAME(fecha) AS 'Fecha actual' FROM usuarios;
SELECT email, DAYOFMONTH(fecha) AS 'Fecha actual' FROM usuarios;
SELECT email, DAYOFWEEK(fecha) AS 'Fecha actual' FROM usuarios;
SELECT email, DAYOFYEAR(fecha) AS 'Fecha actual' FROM usuarios;

SELECT email, MONTH(fecha) AS 'Fecha guardada' FROM usuarios;
SELECT email, YEAR(fecha) AS 'Fecha guardada' FROM usuarios;
SELECT email, DAY(fecha) AS 'Fecha guardada' FROM usuarios;
SELECT email, HOUR(fecha) AS 'Fecha guardada' FROM usuarios;
SELECT email, MINUTE(fecha) AS 'Fecha guardada' FROM usuarios;

SELECT email, CURTIME() AS 'Fecha actual' FROM usuarios;
SELECT email, SYSDATE() AS 'Fecha actual' FROM usuarios;

SELECT email, DATE_FORMAT(fecha, '%d-%m-%Y') FROM usuarios;


# FUNCIONES GENERALES #
SELECT email, ISNULL(apellidos) FROM usuarios;
SELECT email, STRCMP('HOLA', 'HOL1A') FROM usuarios; /*STRCMP: String comparison*/
SELECT VERSION() FROM usuarios;
SELECT USER() FROM usuarios;
SELECT DISTINCT USER() FROM usuarios;
SELECT DISTINCT DATABASE() FROM usuarios;
SELECT EMAIL, IFNULL(apellidos, 'ESTE CAMPO ESTA VACIO') FROM usuarios;
