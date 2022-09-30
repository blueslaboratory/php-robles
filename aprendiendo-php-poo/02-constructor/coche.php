<?php
// Programacion orientada a Objetos en PHP (POO)

// Definir una clase: molde para crear mas objetos de tipo Coche con caracteristicas 
// parecidas

class Coche{
    
    // Atributos o propiedades (variables), se puede hacer en una sola linea
    
    // PUBLIC: podemos acceder desde cualquier lugar, dentro de la clase actual,
    //         dentro de clases que hereden esta clase o fuera de la clase 
    public $color;
    
    // PROTECTED: podemos acceder desde la clase que los define y desde clases 
    // que hereden esta clase
    protected $marca;
    
    // PRIVATE: unicamente se puede acceder desde esta clase
    private $modelo;
    
    public $velocidad;
    public $caballaje;
    public $plazas;
    
    // Constructor (siempre debe ser public)
    public function __construct($color, $marca, $modelo, $velocidad, $caballaje, $plazas) {
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballaje = $caballaje;
        $this->plazas = $plazas;
    }
    
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
    
    public function getModelo(){
        return $this->modelo;
    }
    
    public function setMarca($marca){
        $this->marca = $marca;
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
    
    public function mostrarInformacion(Coche $miObjeto){
        
        if(is_object($miObjeto)){
            $informacion = "<h1>Informacion del coche</h1>";
            $informacion .= "Color: " .$miObjeto->color;
            $informacion .= "</br>Modelo: " .$miObjeto->modelo;        
            $informacion .= "</br>Velocidad: " .$miObjeto->velocidad;
        }else{
            $informacion = "Tu dato es este:  $miObjeto";
        }
        
        return $informacion;
    }
} // fin definicion de la clase