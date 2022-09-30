<?php

// http://localhost/master-php/aprendiendo-php/12-funciones/predefinidas.php
// https://www.php.net/manual/es/function.date.php
// debuggear
$nombre = "Blue";
var_dump($nombre);


// Fechas
echo date('d-m-Y') . "</br>";
echo date('d-M-Y') . "</br>";
echo date('Y-m-d h:i:sa') . "</br>";
echo time() . "</br>"; //Devuelve el momento actual medido como el número de segundos desde la Época Unix (1 de Enero de 1970 00:00:00 GMT). 
echo "</br>";


// Matematicas
echo "Raiz cuadrada de 10: " . sqrt(10) . "</br>";
echo "Numero aleatorio entre 10 y 40: " . rand(10, 40) . "</br>";
echo "Numero pi: " . pi() . "</br>";
echo "Redondear: " . round(6.896234, 2) . "</br>";
echo "</br>";

// Mas funciones generales
echo 'gettype($nombre): ' . gettype($nombre);
echo "</br>";


// Detectar tipado
if(is_string($nombre)){
    echo "Esa variable es un String";
}
echo "</br>";


if(!is_float($nombre)){
    echo "La variable no es un numero con decimales";
}
echo "</br>";



// Comprobar si existe una variable
//if(isset($nombre)){
if(isset($edad)){
    echo "La variable existe";
}
else{
    echo "La variable no existe";
}
echo "</br>";


// Limpiar espacios
$frase = "    mi contenido     ";
var_dump(trim($frase));
echo "</br>";


// Eliminar variables / indices 
$year = 2020;
unset($year);
var_dump($year);


// Comprobar variables vacias: (todas estan vacias)
$texto = "";
$texto = NULL;
$texto = FALSE;
$texto = TRUE;
$texto = "    ";

if(empty(trim($texto))){
    echo "La variable texto esta vacia";
    // quita los espacios del ultimo texto quedando la variable vacia
}
else{
    echo "La variable tiene contenido";
}
echo "</br>";
    


// Contar caracteres de un string
$cadena = "123456789";
echo strlen($cadena);
echo "</br>";


// Encontrar un caracter
$frase = "La vida es bella";
echo "Encontra un caracter, strpos = " . strpos($frase, "vida");// 0,1,2,3
echo "</br>";


// Reemplazar palabras de un string
$frase = str_replace("vida", "moto", $frase);
echo $frase;
echo "</br>";


// MAYUSCULAS Y minusculas
echo strtolower($frase);
echo "</br>";
echo strtoupper($frase);
?>