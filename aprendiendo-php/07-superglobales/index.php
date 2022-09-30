<?php

//20211110
// Variables superglobales
// Podemos acceder a ellas desde cualquier script

// Variables de servidor:
// http://localhost/master-php/aprendiendo-php/07-superglobales/
// http://192.168.56.1/master-php/aprendiendo-php/07-superglobales/

//echo '<h1> $_SERVER['.'SERVER_ADDR'.']'. ' = ';
echo '<h1>';
echo $_SERVER['SERVER_ADDR'];
echo '</h1>';

echo '<h1>';
echo $_SERVER['SERVER_NAME'];
echo '</h1>';

echo '<h1>';
echo $_SERVER['SERVER_SOFTWARE'];
echo '</h1>';

echo '<h1>';
echo $_SERVER['HTTP_USER_AGENT'];
echo '</h1>';

echo '<h1>';
echo $_SERVER['REMOTE_ADDR'];
echo '</h1>';

?>