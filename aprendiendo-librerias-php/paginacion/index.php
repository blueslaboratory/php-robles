<?php

// Video: 252
// http://localhost/master-php/aprendiendo-librerias-php/paginacion/
// https://packagist.org/packages/stefangabos/zebra_pagination
// composer require stefangabos/zebra_pagination

require_once '../vendor/autoload.php';

// Conexion a la DB
$conexion = new mysqli("localhost", "root", "", "notas_master", 3308);
     // mysqli_connect($host, $username, $passwd, $dbname, $port)
$conexion->query("SET NAMES 'utf8'");

// Consulta para contar elementos totales
$consulta = $conexion->query("SELECT COUNT(id) as 'total' FROM notas");
// $consulta = $conexion->query("SELECT * FROM notas");
$numero_elementos = $consulta->fetch_object()->total; 
// $numero_elementos = $consulta->numrows;
$numero_elementos_pagina = 2;

// var_dump($numero_elementos);

// Hacer paginacion
$pagination = new Zebra_Pagination();

// Numero total de elementos a paginar
$pagination->records($numero_elementos);

// Numero de elementos por pagina
$pagination->records_per_page($numero_elementos_pagina);

$page = $pagination->get_page();


$empieza_aqui = ($page - 1)*$numero_elementos_pagina;
$sql = "SELECT * FROM notas LIMIT $empieza_aqui,$numero_elementos_pagina";
$notas = $conexion->query($sql);

//echo $sql;
//die();

echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';
while($nota = $notas->fetch_object()){
    echo "<h1>{$nota->titulo}</h1>";
    echo "<h3>{$nota->descripcion}</h3></hr>";
}

$pagination->render();