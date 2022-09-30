/**
 * Author:  Alejandro
 * Created: 4 dic. 2021
 */

# INSERTAR NUEVOS REGISTROS #

INSERT INTO usuarios VALUES(null, 'Alejandro', 'Diez', 'alejandro@blueslab.com', '1234', '2021-12-04');
INSERT INTO usuarios VALUES(null, 'Tony', 'Lopez', 'tony@blueslab.com', '1234', '2021-12-04');
INSERT INTO usuarios VALUES(null, 'Bubbles', 'II', 'bubbles@blueslab.com', '1234', '2021-12-04');

SELECT * FROM usuarios;


# INSERTAR FILAS SOLO CON CIERTAS COLUMNAS #
INSERT INTO usuarios(email, password) VALUES('admin@admin.com', 'admin');
