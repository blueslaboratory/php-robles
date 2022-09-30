<?php

/* 

http://localhost/master-php/aprendiendo-php/15-ejercicios/ejercicio4.php
 
Ejercicio 4
Crear un script en php que tenga 4 variables, una de tipo
array, otra de tipo string, otra int y otra booleana y que imprima un mensaje
segun el tipo de variable que sea
 */

function mostrarTipo($tipo){
    
    $stringTipo="";
    
    if(is_array($tipo)){
        $stringTipo= 'soy un array';
    }   
    elseif(is_string($tipo)) {
        $stringTipo= 'soy un string';
    }
    elseif(is_bool($tipo)){
        $stringTipo= 'soy boolean';
    }
    elseif(is_integer($tipo)){
        $stringTipo= 'soy integer';
    }
    else{
        $stringTipo= 'soy tipo unknown';
    }
    
    return $stringTipo;
}

$array = array('1','2','3','4');
$string = 'yo soy string';
$boolean = false;
$integer = 8;

echo $array[0] . ' - ' . mostrarTipo($array);
echo '</br>';
echo $string . ' - ' .  mostrarTipo($string);
echo '</br>';
echo $boolean . ' - ' .  mostrarTipo($boolean);
echo '</br>';
echo $integer . ' - ' .  mostrarTipo($integer);

?>
