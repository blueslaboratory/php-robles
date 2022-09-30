<?php

/* 
Para mostrar el valor de las cookies tengo que usar $_COOKIE que es una variable
superglobal, es un array asociativo.
 */

if(isset($_COOKIE['micookie'])){
    echo "<h1>" . $_COOKIE['micookie'] . "</h1>";
} 
else{
    echo "No existe la cookie" . "</br>";
}

if(isset($_COOKIE['unyear'])){
    echo "<h1>" . $_COOKIE['unyear'] . "</h1>";
} 
else{
    echo "No existe la cookie" . "</br>";
}

?>

<a href="crear_cookies.php">Crear mis cookies</a>
<a href="borrar_cookies.php">Borrar mis cookies</a>