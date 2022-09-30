<?php

// http://localhost/master-php/aprendiendo-php/05-constantes/

// Constantes 
// Es un contenedor de informacion que no puede variar
// Se definen utilizando la funcion define 

define('nombre', 'Blue');
define('web', 'blueslaboratory.com');

echo "<h2 style=". '"text-decoration: underline";>' ."Define y variables: </h2>";
echo "<h3>Define 'nombre': ".nombre.'</h3>';
echo "<h3>Define 'web': ".web.'</h3>';


$web = "victorrobleweb.es/academy";
echo '<h3>$web: '.$web.'</h3>';


// Constantes predefinidas
echo PHP_OS . '</br>';
echo PHP_VERSION . '</br>';
echo PHP_EXTENSION_DIR . '</br>';
echo __LINE__ . '</br>';

function holaMundo(){
    echo __FUNCTION__;
}

holaMundo();

?>