<?php

// http://localhost/master-php/aprendiendo-php-poo/10-call/

class Persona{
    private $nombre;
    private $edad;
    private $ciudad;
    
    public function __construct($nombre, $edad, $ciudad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->ciudad = $ciudad;        
    }
    
    public function __call($name, $arguments) {
//      return "No existe el metodo";
        $prefix_metodo = substr($name, 0, 3);
        
        if($prefix_metodo == 'get'){
            $nombre_metodo = substr(strtolower($name), 3);
            
            if(!isset($this->$nombre_metodo)){
                return "El metodo que estas invocando no existe!";
            }
            
            // $this->nombre
            return $this->$nombre_metodo;
        }else{
            return "El metodo que estas invocando no existe!";
        }
        
        return $nombre_metodo;
    }
}



$persona = new Persona("Pedro", 77, "Madrid"); 
echo $persona->getNombre();
echo $persona->getEdad();
echo $persona->getCiudad() . "</br>";
echo $persona->getHola();// si la propiedad no existe da error