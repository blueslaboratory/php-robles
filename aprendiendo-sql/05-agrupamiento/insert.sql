/**
 * Author:  Alejandro
 * Created: 4 dic. 2021
 */

# INSERTS PARA CATEGORIAS #
INSERT INTO categorias VALUES(null, 'Accion');
INSERT INTO categorias VALUES(null, 'Rol');
INSERT INTO categorias VALUES(null, 'Deportes');

# INSERTS PARA ENTRADAS #
INSERT INTO entradas VALUES(null, 1, 1, 'GTA 5', 'review del GTA 5', CURDATE());
INSERT INTO entradas VALUES(null, 1, 2, 'LOL', 'Todo sobre el LOL', CURDATE());
INSERT INTO entradas VALUES(null, 1, 3, 'FIFA 21', 'Review del fifa 21', CURDATE());

INSERT INTO entradas VALUES(null, 2, 1, 'Assasins', 'review del Assasins', CURDATE());
INSERT INTO entradas VALUES(null, 2, 2, 'WOW', 'Todo sobre el WOW', CURDATE());
INSERT INTO entradas VALUES(null, 2, 3, 'PES 21', 'Review del PES 21', CURDATE());

INSERT INTO entradas VALUES(null, 3, 1, 'COD', 'review del GTA 5', CURDATE());
INSERT INTO entradas VALUES(null, 3, 2, 'Minecraft', 'Todo sobre el Minecraft', CURDATE());
INSERT INTO entradas VALUES(null, 3, 3, 'NBA 21', 'Review del NBA 21', CURDATE());
INSERT INTO entradas VALUES(null, 3, 3, 'F1', 'Review del F1 21', CURDATE());

SELECT * FROM categorias;
SELECT * FROM usuarios;
SELECT * FROM entradas;

DESC ENTRADAS;


