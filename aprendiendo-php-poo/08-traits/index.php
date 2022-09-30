<?php

// http://localhost/master-php/aprendiendo-php-poo/08-traits/

trait Utilidades{
    public function mostrarNombre(){
        echo "<h1>El nombre es ".$this->nombre."</h1>";
    }
}

class Coche{
    public $nombre;
    public $marca;
    
    use Utilidades;
}

class Persona{
    public $nombre;
    public $apellidos;
    
    use Utilidades;
}

class Videojuego{
    public $nombre;
    public $year;
    
    use Utilidades;
}



$coche = new Coche();
$coche->nombre = "Ferrari Testarossa";
$coche->mostrarNombre();

$persona = new Persona();
$persona->nombre = "Agatha Christie";
$persona->mostrarNombre();

$videojuego = new Videojuego();
$videojuego->nombre = "Golden Sun";
$videojuego->mostrarNombre();

var_dump($videojuego);



?>