<?php

class database{
    public static function conectar(){
        $conexion = new mysqli("localhost", "root", "", "notas_master", 3308);
                     // mysqli_connect($host, $username, $passwd, $dbname, $port)
        $conexion->query("SET NAMES 'utf8'");
        
        return $conexion;
    }
    
}
