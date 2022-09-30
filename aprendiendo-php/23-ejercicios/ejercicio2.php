<?php

/* 
Ejercicio 2.
 * 1. Una funcion
 * 2. Validar un email con filter_var
 * 3. Recoger variable por get y validarla
 * 4. Mostrar el resultado

http://localhost/master-php/aprendiendo-php/23-ejercicios/ejercicio2.php
http://localhost/master-php/aprendiendo-php/23-ejercicios/ejercicio2.php?email=hola@hola.com
Intentos: I
 */

function validarEmail($email){
    $status = "No valido";
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $status = "Valido";
    }
    
    return $status;
}

if(isset($_GET['email'])){
    echo validarEmail($_GET["email"]);
}
else{
    echo "Pasa por get un email...";
}