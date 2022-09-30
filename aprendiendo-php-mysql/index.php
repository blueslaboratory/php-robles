<?php
// http://localhost/master-php/aprendiendo-php-mysql/
// Video 177. Conexion y consultas

// Conecta a la base de datos
// $conexion = mysqli_connect($host, $username, $passwd, $dbname, $port, $socket);
// Es el puerto utilizado por mysql, se descubre con el boton derecho en el
// icono de Wamp -> Herramientas
$conexion = mysqli_connect("localhost", "root", "", "phpmysql", 3308);


// Comprobar si la conexion es correcta
if(mysqli_connect_errno()){
    echo "La conexion a la base de datos MySQL ha fallado: ".mysqli_connect_error();
} else{
    echo "Conexion realizada correctamente! :)";
}


// Consulta para configurar la codificacion de caracteres
mysqli_query($conexion, "SET NAMES 'utf8'");

// Consulta SELECT desde PHP
$query = mysqli_query($conexion, "SELECT * FROM notas");
// $notas = mysqli_fetch_assoc($query);

while($nota = mysqli_fetch_assoc($query)){
//  var_dump($nota);
    echo '<br/>';
    echo "<h2>".$nota['titulo']."</h2>";
    echo $nota['descripcion'];
}

echo '<hr/>';
 
// Insertar en la BBDD desde PHP
$sql = "INSERT INTO notas VALUES(null, 'Nota desde PHP', 'Esto es una nota de PHP', 'green')";
$insert = mysqli_query($conexion, $sql);

if($insert){
    echo "DATOS INSERTADOS CORRECTAMENTE";
} else{
    echo "ERROR: ".mysqli_error($conexion);
}