<?php

// Video: 267

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'tienda_master', 3308);
        $db->query("SET NAMES 'UTF8'");
        return $db;
    }
}

?>