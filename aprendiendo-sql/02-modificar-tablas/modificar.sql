/**
 * Author:  Alejandro
 * Created: 4 dic. 2021
 */

# RENOMBRAR TABLA  #
ALTER TABLE usuarios RENAME TO usuarios_renom;


# CAMBIAR EL NOMBRE DE UNA COLUMNA #
ALTER TABLE usuarios_renom CHANGE apellidos apellido VARCHAR(255) NULL;

/*
desc usuarios_renom;
select * from usuarios_renom;
*/

# MODIFICAR COLUMNA SIN CAMBIAR NOMBRE #
ALTER TABLE usuarios_renom MODIFY apellido CHAR(40) NOT NULL;


# ANADIR COLUMNA #
ALTER TABLE usuarios_renom ADD website VARCHAR(100) NULL;


# ANADIR RESTRICCION A COLUMNA # 
ALTER TABLE usuarios_renom ADD CONSTRAINT uq_email UNIQUE(email);


# BORRAR UNA COLUMNA #
ALTER TABLE usuarios_renom DROP website;