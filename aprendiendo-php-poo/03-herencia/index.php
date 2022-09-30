<?php
// http://localhost/master-php/aprendiendo-php-poo/03-herencia/

require_once 'clases.php';

$persona = new Persona();
//$persona->setNombre("Neo");
var_dump($persona);


$informatico = new Informatico();
//$informatico->setAltura(1.90);
//echo $informatico->sabeLenguajes("HTML, CSS, PHP, JS, etc");
var_dump($informatico);


$tecnico = new TecnicoRedes();
var_dump($tecnico);
?>