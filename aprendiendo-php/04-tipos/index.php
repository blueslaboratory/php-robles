<?php

/* 
 // http://localhost/master-php/aprendiendo-php/04-tipos/
 
 TIPOS DE DATOS:
 - Entero (int / integer) = 99
 - Coma flotante / decimales (float / double) = 3.45
 - Cadenas (String) = "Hola yo soy un string"
 - Booleano (boolean) = true false
 - Null
 - Array (Coleccion de datos)
 - Objetos
 
 Las variables no pueden empezar por un numero o simbolos reservados del lenguaje:
 - /*ñó
 */

$numero = 100;
$decimal = 27.9;
$texto = 'Soy un texto $numero';
$texto0 = 'Soy un texto '.$numero;
$texto1 = "Soy un texto $numero"; // si te fijas esto te lo pilla por las ""
$texto2 =  "esto' es una \" prueba '\r";
$verdadero = true;
$nula = null;

echo $texto.' con comillas simples, no cojo la variable <br/>';
echo $texto0.' con comillas simples y operador . <br/>';
echo $texto1.' con comillas dobles <br/>';
echo $texto2.' con caracteres raros y comillas <br/><br/>';

echo '$numero: '.gettype($numero).'<br/;>'; //gettype funcion que me dice el tipo de dato
echo '$decimal: '.gettype($decimal).'<br/;>';
echo '$texto: '.gettype($texto).'<br/;>';
echo '$verdadero: '.gettype($verdadero).'<br/;>';
echo '$nula: '.gettype($nula).'<br/;>';



// Debugging
$mi_nombre = "Gandalf the Grey";
var_dump($mi_nombre);
?>