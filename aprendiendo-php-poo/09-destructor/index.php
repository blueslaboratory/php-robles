<?php

// http://localhost/master-php/aprendiendo-php-poo/09-destructor/

class Usuario{
    public $nombre;
    public $email;
    
    public function __construct() {
        $this->nombre = "Blue's Laboratory";
        $this->email = "blue@laboratory.com";
        echo "Creando el objeto <br/>"; 
        // no se suelen imprimir cosas en el constructor
    }
    
    public function __toString() {
        return "Hola, {$this->nombre}, estas registrado con {$this->email} <br/>";
    }


    // El destruct se ejecuta al final del programa, en este caso, al final del
    // bucle for
    public function __destruct() {
        echo "Destruyendo el objeto";
    }
    
}

$usuario = new Usuario();
echo $usuario->email . "<br/>";
echo $usuario . "<br/>";

for($i=0; $i<=33; $i++){
    echo $i."<br/>";
}