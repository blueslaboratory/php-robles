<?php

/* 
http://localhost/master-php/aprendiendo-php/15-ejercicios/ejercicio2.php
 
Ejercicio 2
Escribir un programa que agrege valores numericos a un array mientras que su 
longitud sea menor a 120 y luego mostrarlo por pantalla
 
Intentos: I 
 
 */

$coleccion = array();

for($i=0; $i<120; $i++){
    // Hay 2 formas:
    
    array_push($coleccion, $i);
    // $coleccion[] = $i;
}

var_dump($coleccion);

echo '<br/> <hr/>';
echo $coleccion[42];

?>

