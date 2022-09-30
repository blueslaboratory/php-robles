<?php

/* 
http://localhost/master-php/aprendiendo-php/11-ejercicios/ejercicio1.php

Ejercicio 1 
Crear 2 variables, pais y continente y mostrar su valor por pantalla (imprimir)
Poner un comentario que tipo de dato tienen.
 */

$pais = "United States of America"; //string
$continente = "America";  //string

echo $pais . " - " . gettype($pais) . "<br/>" .
     $continente . " - "  . gettype($continente) . "<br/>";

var_dump($continente, $pais);

?>