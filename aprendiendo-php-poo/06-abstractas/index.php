<?php

// http://localhost/master-php/aprendiendo-php-poo/06-abstractas/

abstract class Ordenador{
    public $encendido;
    
    abstract public function encender();
//    {
//        $this->encendido = true;
//    }
    
    public function apagar(){
        $this->encendido = false;
    }
}


class PcAsus extends Ordenador{
    public $software;
    
    public function arrancarSoftware(){
        $this->software = true;
    }
    
    public function encender(){
        $this->encendido = true;
    }
}

$ordenador = new PcAsus();
$ordenador->arrancarSoftware();
$ordenador->encender();
$ordenador->apagar();
var_dump($ordenador);
?>