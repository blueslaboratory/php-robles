<?php
/*
http://localhost/master-php/aprendiendo-php/16-sesiones/pagina1.php
Ir de pagina1 a logout y volver de logout a pagina1 para comprobar session_destroy
*/
session_start(); // para poder usar las sesiones

// echo $variable_normal; //da error porque no existe en este fichero
// se ve mientras dure la sesion
echo $_SESSION['variable_persistente'];
echo '<br/><br/>';
echo '$_SESSION[\'variable_persistente\'] -> no se puede ver desde logout, despues de hacer session_destroy(), <br/> solo se puede ver si se inicializa en el index';


?>
<br/>
<a href="index.php">Index<a/>
<br/>