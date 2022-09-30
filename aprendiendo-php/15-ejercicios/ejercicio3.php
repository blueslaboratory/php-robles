<?php

/* 
Ejercicio 3
// http://localhost/master-php/aprendiendo-php/15-ejercicios/ejercicio3.php
 
Programa que compruebe si una variable esta vacia y si esta vacia rellenarla
con un texto en minusculas y mostrarlo en mayusculas y negrita. 

Intentos: I
 */

$texto="";

if(empty($texto)){
    $texto = "¡Hola, soy el relleno de la variable texto!";
    $textoMayus = strtoupper($texto);
    
    echo "<strong>$textoMayus</strong>";
}
else{
    echo "La variable tiene contenido dentro: " . $texto;
}
?>