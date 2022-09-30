<?php

// recoger los valores dentro de nombre y apellido con las variables tipo GET
// que van a un array a cogerlos
echo "<h1>" . $_POST['nombre'] . "</h1>";
echo "<h1>" . $_POST['apellidos'] . "</h1>";
// echo "<h1>" . $_GET['web'] . "</h1>";

var_dump($_POST);


?>