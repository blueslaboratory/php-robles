<?php

/* 
 http://localhost/master-php/aprendiendo-php/12-funciones/variables.php
 http://localhost/master-php/aprendiendo-php/12-funciones/variables.php?horario=Noches
 
 - Variables locales: Son las que se definen dentro de una funcion y no pueden ser
 usadas fuera de la funcion, a no ser que hagamos un return
 - Variables globales: Son las que se declaran fuera de una funcion y estan disponibles
 dentro y fuera de las funciones.
 */

$frase = "Ni los genios son tan genios ni los mediocres tan mediocres";

echo $frase;
echo "<hr>";

function holaMundo(){
//  probar a comentar global: (el programa no la reconoce)
    global $frase;
    echo "<h1>$frase</h1>";
    
    $year = 2019;
    echo "<h1>$year</h1>";
    
    return $year;
}

echo "return: " . holaMundo();
echo "<hr/>";
echo "<br/>";




// Funciones variables
// http://localhost/master-php/aprendiendo-php/12-funciones/variables.php?horario=Noches

function buenosDias(){
    echo "<h2>Hola! Buenos dias :)</h2>";
}

function buenasTardes(){
    echo "<h2>Hey! Que tal la siesta?!</h2>";
}

function buenasNoches(){
    echo "<h2>Hasta mañana, descansa!</h2>";
}

$horario1 = "Dias";
$horario2 = "Tardes";
$horario3 = $_GET['horario'];

$miFuncion1 =  "buenos".$horario1;
$miFuncion2 =  "buenas".$horario2;
$miFuncion3 =  "buenas".$horario3;

echo $miFuncion1();
echo $miFuncion2();
echo $miFuncion3();

?>