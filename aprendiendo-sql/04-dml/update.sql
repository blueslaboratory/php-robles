/**
 * Author:  Alejandro
 * Created: 4 dic. 2021
 */

# MODIFICAR FILAS / ACTUALIZAR DATOS #

UPDATE usuarios SET fecha = '2019-07-09' WHERE UPPER(nombre) = 'ADMIN';
UPDATE usuarios SET fecha = CURDATE() WHERE UPPER(nombre) = 'ADMIN';