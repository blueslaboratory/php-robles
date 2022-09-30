<?php

/*
http://localhost/master-php/aprendiendo-php/16-sesiones

Sesion: 
Almacena y persiste datos del usuario mientras navega en un sitio web hasta que 
cierra sesion o cierra el navegador; Una vez se cierra el navegador, la sesion 
desaparece
 */

// iniciar la sesion
session_start();

// variable local
$variable_normal = "Soy una cadena de texto";

// variable de sesion: la puedo utilizar en cualquier parte de mi dominio
$_SESSION['variable_persistente'] = "HOLA SOY UNA SESION ACTIVA";

echo $variable_normal."<br/>";
echo $_SESSION['variable_persistente'];

?>
<br/>
<a href="pagina1.php">Ir a pagina1<a/>
<br/>
<a href="logout.php">Logout<a/>