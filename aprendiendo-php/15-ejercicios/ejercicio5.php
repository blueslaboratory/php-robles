<?php

/* 
http://localhost/master-php/aprendiendo-php/15-ejercicios/ejercicio5.php

Ejercicio 5
Crear un array con el contenido de la tabla:
ACCION  AVENTURA    DEPORTES
GTA     ASSASINS    FIFA 19
COD     CRASH       PES 20
PUGB    Prince of   MOTOGP 21
        Persia
 
Cada columna debe ir en un fichero separado(includes).
INTENTOS: I
 */

$tabla = array(
    "ACCION" => array("GTA 5", "Call of Duty", "LOL"),
    "AVENTURA" => array("Assasins Creed", "Crash Bandicoot", "Prince of Persia"),
    "DEPORTES" => array("Fifa 19", "PES 20", "MOTO GP 21")
);

//var_dump($tabla);
//Para sacar los indices de la tabla
var_dump($tabla);
echo '<hr/>';
$categorias = var_dump(array_keys($tabla));
$categorias = array_keys($tabla);

?>

<table border ="1">
    
    <?php require_once 'ejercicio5/encabezado.php'; ?>
    <?php require_once 'ejercicio5/filas.php'; ?>
    
    <?php require_once 'ejercicio5/primeraFila.php'; ?>
    <?php require_once 'ejercicio5/segundaFila.php'; ?>
    <?php require_once 'ejercicio5/terceraFila.php'; ?>
    
</table>


<!-- 

Include vs include_once
This is a behavior similar to the include statement, with the only difference being that if the code from a file has already been included, it will not be included again, and include_once returns true. As the name suggests, the file will be included just once.

Include vs required
The require() function will stop the execution of the script when an error occurs. The include() function does not give a fatal error. The include() function is mostly used when the file is not required and the application should continue to execute its process when the file is not found

-->