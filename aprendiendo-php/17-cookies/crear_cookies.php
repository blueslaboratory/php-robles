<?php

/* 
http://localhost/master-php/aprendiendo-php/17-cookies/crear_cookies.php
 
Cookies: es un fichero que se almacena en el ordenador del usuario que visita la
web con el fin de recordar datos o rastrear el comportamiento del mismo en la web
Se almacenan en el cliente; y en el servidor cada vez que se carga la pagina.
*/

// Crear cookies
// setcookie("nombre", "valor que solo puede ser texto", caducidad, ruta, dominio);

// cookie basica
setcookie("micookie", "valor de mi galletita: si te caes 7 veces, levántate 8");

// cookie con expiracion
setcookie("unyear", "valor de mi cookie de 365 dias", time()+(60*60*24*365));

// redireccionando a ver_cookies.php
header('Location: ver_cookies.php');
?>

<!-- 

Nunca llegaria a esta parte del codigo porque el header lo "cortocircuita"
<a href="ver_cookies.php">Ver las cookies<a/>

-->