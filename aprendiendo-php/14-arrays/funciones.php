<?php

/* 
http://localhost/master-php/aprendiendo-php/14-arrays/funciones.php
*/

$cantantes = ['2pac', 'Drake', 'JLo', 'Alejandro'];
$numeros = [1,8,3,4,5,2];

//array sort
echo '<h1>array sort: asort($cantantes)</h1>';
asort($cantantes);
var_dump($cantantes);
echo '<hr/>';

//array reverse sort
echo '<h1>array reverse sort: arsort($cantantes)</h1>';
arsort($cantantes);
var_dump($cantantes);
echo '<hr/>';

echo '<h1>sort($cantantes)</h1>';
sort($cantantes);
var_dump($cantantes);
echo '<hr/>';

echo '<h1>sort($numeros)</h1>';
sort($numeros);
var_dump($numeros);
echo '<hr/>';


// Anadir elementos array
echo '<h1>Anadir elementos array: $cantantes[] = "Natos"</h1>';
$cantantes[] = "Natos";
var_dump($cantantes);
echo '<hr/>';

echo '<h1>Anadir elementos array: array_push($cantantes, "Waor")</h1>';
array_push($cantantes, "Waor");
var_dump($cantantes);
echo '<hr/>';


// Eliminar elementos array
echo '<h1>Eliminar elementos array: array_pop($cantantes)</h1>';
array_pop($cantantes);
var_dump($cantantes);
echo '<hr/>';

echo '<h1>Eliminar elementos array: unset($cantantes[1])</h1>';
unset($cantantes[1]);// Alejandro
var_dump($cantantes);
echo '<hr/>';


// Aleatorio: elige un cantante aleatorio y coge su indice
echo '<h1>Aleatorio: array_rand($cantantes)</h1>';
echo array_rand($cantantes) . "<br/>";
$indice = array_rand($cantantes);
echo $cantantes[$indice];
echo '<hr/>';


// Dar la vuelta a numeros, no lo guarda en el array
echo '<h1>Aleatorio: array_reverse($numeros)</h1>';
array_reverse($numeros);
array_reverse($numeros);

var_dump($numeros);
var_dump(array_reverse($numeros));
echo '<hr/>';


// Buscar dentro de un array
echo '<h1>Buscar dentro de un array: array_search(\'Drake\', $cantantes)</h1>';
$resultado = array_search('Drake', $cantantes); //puesto 2
//$resultado = array_search('Drake33', $cantantes);
var_dump($resultado);
echo '<hr/>';


// Contar numero de elementos
echo '<h1>Contar numero de elementos: count($cantantes)</h1>';
echo var_dump($cantantes);
echo 'count($cantantes): ' . count($cantantes);
echo '</br>';
echo 'sizeof($cantantes): ' . sizeof($cantantes);
echo '<hr/>';
?>