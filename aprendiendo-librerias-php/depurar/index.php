<?php

// Video: 254
// https://packagist.org/packages/firephp/firephp-core
// localhost/master-php/aprendiendo-librerias-php/depurar/

require_once '../vendor/autoload.php';

$frutas = array("manzanas", "naranjas", "sandias");

\FB::log($frutas);

$nombres = array("ejecutivo" => "Antonio", "empleado" => "Juan");

// Esto me va a mostrar un log de lo que yo quiera
\FB::log($nombres);

echo "Hola Mundo!!".nombres['ejecutivo'];

\FB::log("Muestrame esto por consola");