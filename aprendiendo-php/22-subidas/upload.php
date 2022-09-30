<?php
// F:\wamp64\www\master-php\aprendiendo-php\22-subidas\images

$archivo = $_FILES['archivo'];
/*
var_dump($archivo);
die(); //cortando la ejecucion
*/
$nombre = $archivo['name'];
$tipo = $archivo['type'];

if($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/gif"){
    echo "Se ha subido la imagen :)";
    if(!is_dir('images')){
        mkdir('images', 0777);
    }
    
    move_uploaded_file($archivo['tmp_name'], 'images/'.$nombre);
    //$archivo['tmp_name'] => archivo guardado en una ruta temporal
    
    header("Refresh: 5; URL=index.php"); //Refresca en 5s y llevame a la URL
    
}
else{
    header("Refresh: 5; URL=index.php"); //Refresca en 5s y llevame a la URL
    echo "Por favor sube una imagen con formato correcto...";
}

?>