<?php

/* 
http://localhost/master-php/aprendiendo-php/21-directorios/
 */

// Crear la carpeta
if(!is_dir('mi_carpeta')){
    mkdir('mi_carpeta', 0777) or die('No se puede crear la carpeta');
    //F:\wamp64\www\master-php\aprendiendo-php\21-directorios
    //0777 son todos los permisos
}
else{
    echo "Ya existe la carpeta";
}

// Borrar la carpeta
// mdir('mi_carpeta');
echo '<hr><h1>Contenido carpeta</h1>';
if($gestor = opendir('./mi_carpeta')){
    while(false !== ($archivo = readdir($gestor))){
        // !== no identico (compara que el tipo de dato sea distinto)
        if ($archivo != '.' && $archivo != '..'){
            //el '.' es el directorio actual y el '..' se refiere al directorio anterior
            echo $archivo . '</br>';
        }
        
    }
}

?>