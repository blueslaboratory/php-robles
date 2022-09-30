<?php

/*
 * http://localhost/master-php/aprendiendo-php-poo/02-constructor/
 */

require_once 'coche.php';

$coche = new Coche("Amarillo", "Renault", "Clio", 150, 200, 5);
$coche1 = new Coche("Verde", "Seat", "Panda", 250, 200, 5);
$coche2 = new Coche("Azul", "Citroen", "Xara", 100, 220, 5);
$coche3 = new Coche("Rojo", "Mercedes", "Clase A", 350, 100, 5);

$coche->color="Rosa";

//echo $coche->mostrarInformacion("Hola Mundo desde 1 metodo"); // No deja: no puedes pasarle un atributo que no sea de tipo coche
echo $coche->mostrarInformacion($coche1);

//$coche->marca="Audi"; // No deja porque es protected
$coche->setMarca("Audi");

//var_dump($coche->modelo); // No deja porque es privada
var_dump($coche->getModelo());


//var_dump($coche);
//var_dump($coche1);
//var_dump($coche2);
//var_dump($coche3);

