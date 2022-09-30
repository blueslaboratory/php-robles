/**
 * Author:  Alejandro
 * Created: 4 dic. 2021
 */

# CONSULTA CON 1 CONDICION # 
SELECT * FROM usuarios WHERE email = 'admin@admin.com';

/*
OPERADORES LOGICOS DE COMPARACION:
igual           =
distinto        !=
menor           <
mayor           >
menor o igual   <=
mayor o igual   >=
entre           between A and B
en              in
es nulo         is null
no nulo         is not null
como            like
no es como      not like
*/

/*
OPERADORES LOGICOS:
O       OR
Y       AND
NO      NOT
*/

/*
COMODINES:
Cualquier cantidad de caracteres: %
Un caracter desconocido: _
*/ 

# EJEMPLOS #
# 1. Mostrar nombres y apellidos de todos los usuarios registrados en 2019 #
SELECT nombre, apellidos FROM usuarios WHERE YEAR(fecha) = '2021';

# 2. Mostrar nombres y apellidos de todos los usuarios QUE NO se registraron en 2019 #
SELECT nombre, apellidos FROM usuarios WHERE YEAR(fecha) != '2021' OR ISNULL(fecha);

# 3. Email en cuyo apellido se incluya la letra E y que su contrasena sea 1234 #
SELECT email FROM usuarios WHERE apellidos LIKE '%e%' AND password = 1234;

# 4. Sacar todos los registros de la tabla usuarios cuyo year sea PAR #
SELECT * FROM usuarios WHERE(YEAR(fecha)%2 = 0);
SELECT * FROM usuarios WHERE(YEAR(fecha)%2 != 0); # IMPAR #

# 5. Sacar todos los registros de la tabla usuarios cuyo nombre tenga >5 letras
# y que se hayan registrado antes de 2022 y mostrar el nombre en MAYUS
SELECT UPPER(nombre) AS 'Nombre', apellidos FROM usuarios WHERE LENGTH(nombre)>5 AND YEAR(fecha) < 2022;


/*
ORDENAR Y LIMITAR
*/

SELECT * FROM usuarios ORDER BY id DESC;
SELECT * FROM usuarios ORDER BY fecha DESC;
SELECT * FROM usuarios ORDER BY fecha ASC;

SELECT * FROM usuarios LIMIT 3;
SELECT * FROM usuarios LIMIT 3,2; # 0,1,2,3: posiciones 2-3 #
SELECT * FROM usuarios LIMIT 0,2;
SELECT * FROM usuarios LIMIT 0,4;