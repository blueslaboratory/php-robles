<?php

require_once 'ModeloBase.php';

class Usuario extends ModeloBase{
    public $nombre;
    public $apellidos;
    public $email;
    public $password;
    
    
    public function __construct() {
        parent::__construct();
    }
    
    // GETTERS
    function getNombre() {
        return $this->nombre;
    }
    function getApellidos() {
        return $this->apellidos;
    }
    function getEmail() {
        return $this->email;
    }
    function getPassword() {
        return $this->password;
    }

    // SETTERS
    function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }
    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
        return $this;
    }
    function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    function setPassword($password) {
        $this->password = $password;
        return $this;
    }
    
/*
    public function conseguirTodos($tabla){
        return "Sacando todos los usuarios...";
    }
*/
}
