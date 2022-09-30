<?php

/* 
http://localhost/master-php/aprendiendo-php/15-ejercicios/ejercicio1.php

Ejercicio 1. Hacer un programa en PHP que tenga un array con 8 numeros enteros
y que haga lo siguiente:
 a. Recorrerlo y mostrarlo
 b. Ordenarlo y mostrarlo
 c. Mostrar su longitud
 d. Buscar algun elemento (buscar por el parametro que me llegue por la URL)

*/

// FUNCIONES
function mostrarArray($numeros){
    $resultado = "";
    
    foreach ($numeros as $numero){
        $resultado .= $numero . "<br/>";
    }
    
    return $resultado;
}


$numeros = [1,6,3,4,5,2,7,0];
// $numeros = array(88, 69, 22, 33, 42, 5, 13, 14);


// a
// Si no lo haces con $key no puedes usarlo en el echo (dentro del foreach)
echo "<h1> Apartado a </h1>";
foreach ($numeros as $key => $n){
//foreach ($numeros as $n){
    echo 'key ' . $key . ': ' . $n;
    echo "<br/>";
}
echo "<br/>";

echo mostrarArray($numeros);
echo "<br/>";
echo '<hr/>';


// b
echo "<h1> Apartado b </h1>";
sort($numeros);
var_dump($numeros);
echo "<br/>";

echo mostrarArray($numeros);
echo "<br/>";
echo '<hr/>';


// c
echo "<h1> Apartado c </h1>";
echo 'Longitud: ' . count($numeros);
echo "<br/>";
echo '<hr/>';


// d
echo "<h1> Apartado d </h1>";
$resultado = array_search('7', $numeros);
echo 'array_search(\'7\', $numeros):' . $resultado;
echo "<br/>";
echo '<hr/>';

$resultado = array_search('99', $numeros);
echo 'array_search(\'99\', $numeros):' . $resultado;
echo "<br/>";
echo '<hr/>';



// Busqueda dinamica
// http://localhost/master-php/aprendiendo-php/15-ejercicios/ejercicio1.php?numero=4
echo "<h1> Busqueda dinamica </h1>";
if(isset($_GET['numero'])){
    $busqueda = $_GET['numero'];

    $numero = $busqueda;
//  $numero = 3;
    $search = array_search($numero, $numeros);
    var_dump($search);
    if(!empty($search)){
        echo "El numero $numero existe en el array, en el indice: $search";
    }
    else{
        echo "El numero $numero no existe en el array";
    }
}
?>