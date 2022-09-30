<?php

/* 
Herencia: la posibilidad de compartir atributos y metodos entre clases
 */

class Persona{
    public $nombre;
    public $apellidos;
    public $altura;
    public $edad;
    
    
    // Click raton boton derecho: insert code
    // GETTERS (la visibilidad por defecto es publica)
    function getNombre() {
        return $this->nombre;
    }
    function getApellidos() {
        return $this->apellidos;
    }
    function getAltura() {
        return $this->altura;
    }
    function getEdad() {
        return $this->edad;
    }

    
    // SETTERS
    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }
    function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }
    function setAltura($altura): void {
        $this->altura = $altura;
    }
    function setEdad($edad): void {
        $this->edad = $edad;
    }
    
    
    public function hablar(){
        return "Estoy hablando";
    }
    
    public function caminar(){
        return "Estoy caminando";
    }
}


class Informatico extends Persona{
    
    public $lenguajes;
    public $experienciaProgramador;
    
    public function __construct() {
        $this->lenguajes = "HTML, CSS, PHP, JS, etc";
        $this->experienciaProgramador = 10;
    }


    public function sabeLenguajes($lenguajes){
        $this->lenguajes = $lenguajes;
        
        return $this->lenguajes;
    }
    
    public function programar(){
        return "Soy programador";
    }
    
    public function repararOrdenador(){
        return "Reparar ordenadores";
    }
    
    public function hacerOfimatica(){
        return "Estoy escribiendo en word";
    }
}

class TecnicoRedes extends Informatico{
    public $auditarRedes;
    public $experienciaRedes;
    
    public function __construct() {
        parent::__construct();
        
        $this->auditarRedes = 'experto';
        $this->experienciaRedes = 5;
    }
    
    public function auditoria(){
        return "Estoy auditando una red";
    }
}