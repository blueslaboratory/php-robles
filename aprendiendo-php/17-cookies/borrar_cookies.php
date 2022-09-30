<?php


if(isset($_COOKIE['micookie'])){
    unset($_COOKIE['micookie']);
    setcookie('micookie','', time()-1);
    // la cookie no se va a borrar hasta que yo la caduque
    // es porque es el metodo setcookie y lo seteas a una fecha que no existe
}


if(isset($_COOKIE['unyear'])){
    unset($_COOKIE['unyear']);
    setcookie('unyear','', time()-1);
    // la cookie no se va a borrar hasta que yo la caduque
    // es porque es el metodo setcookie y lo seteas a una fecha que no existe
}


// redireccionando a ver_cookies.php
header('Location: ver_cookies.php');

?>