<?php

// Conexion
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog_master';
$port = 3308;

//mysqli_connect($database, $username, $password, $server, $port)
//Esta es la f() de por defecto pero es como a continuacion:

$db = mysqli_connect($server, $username, $password, $database, $port);
mysqli_query($db, "SET NAMES 'utf8'");


// Iniciar la sesion
if(!isset($_SESSION)){
    session_start();
}
?>