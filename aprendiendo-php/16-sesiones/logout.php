<?php
/*
http://localhost/master-php/aprendiendo-php/16-sesiones/logout.php
*/

// hay que inicializar la sesion cuando navegas entre las paginas
session_start();
session_destroy();

?>
<br/>
<a href="index.php">Index<a/>
<br/>
<a href="pagina1.php">Ir a pagina1<a/>
<br/>