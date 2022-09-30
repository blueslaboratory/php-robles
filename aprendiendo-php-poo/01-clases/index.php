<!--
Sesion 220
http://localhost/master-php/aprendiendo-php-poo/01-clases/
-->

<h1>Hola mundo PHP POO!</h1>

<?php
// Programacion orientada a Objetos en PHP (POO)

// Definir una clase: molde para crear mas objetos de tipo Coche con caracteristicas 
// parecidas

class Coche{
    
    // Atributos o propiedades (variables), se puede hacer en una sola linea
    public $color = "rojo";
    public $marca = "Ferrari";
    public $modelo = "Spider";
    public $velocidad = 300;
    public $caballaje = 500;
    public $plazas = 2;
    
    // Metodos (antes funciones): son acciones que hace el objeto
    public function getColor(){
        // Busca en esta clase la propiedad X
        return $this->color;
    }
    
    public function setColor($color){
        $this->color = $color;
    }
    
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    
    public function acelerar(){
        $this->velocidad++;
    }
    
    public function frenar(){
        $this->velocidad--;
    }
    
    public function getVelocidad(){
        return $this->velocidad;
    }
} // fin definicion de la clase

// Crear un objeto / instanciar la clase
$coche = new Coche();
// var_dump($coche);

// Usar los metodos:
echo "Velocidad: " . $coche->getVelocidad() . "km/h" . "</br>";

$coche->setColor("naranja");
echo "El color del coche es: " . $coche->getColor().'</br>';

$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->frenar();

echo "velocidad de coche: ".$coche->getVelocidad()."km/h"."</br>";

$coche2 = new Coche();
$coche2->setColor("morado");
$coche2->setModelo("Enzo");

var_dump($coche);
var_dump($coche2);