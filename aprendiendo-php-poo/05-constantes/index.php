<?php

class Usuario{
    const URL_COMPLETA = "http://localhost/master-php/aprendiendo-php-poo/05-constantes/";
    public $email;
    public $password;
    
    function getEmail() {
        return $this->email;
    }
    function getPassword() {
        return $this->password;
    }

    function setEmail($email): void {
        $this->email = $email;
    }
    function setPassword($password): void {
        $this->password = $password;
    }


}

echo Usuario::URL_COMPLETA; 


//$usuario = new Usuario();
//echo $usuario::URL_COMPLETA;
//echo $usuario->URL_COMPLETA; //error
//var_dump($usuario);