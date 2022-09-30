<?php
$error = 'faltan_valores';
// comprueba la condicion y da false no se por que
if(!empty($_POST['nombre']) && 
   !empty($_POST['apellidos']) &&
   !empty($_POST['edad']) &&
   !empty($_POST['email']) && 
   !empty($_POST['password'])){
   //!empty a diferencia de isset comprueba si existe y si hay valores dentro
   
   $error = 'ok';
// echo $error;
   
   $nombre = $_POST['nombre'];
   $apellidos = $_POST['apellidos'];
   $edad = (int)$_POST['edad'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   
   // Validar el nombre
   if(!is_string($nombre) || preg_match("/[0-9]/", $nombre)){
   //if(!is_string($nombre) || !preg_match("/[a-zA-Z]+/", $nombre)){
        $error = 'nombre';
   }
   
   if(!is_string($apellidos) || preg_match("/[0-9]/", $apellidos)){
   //if(!is_string($apellidos) || !preg_match("/[a-zA-Z]+/", $apellidos)){
        $error = 'apellidos';
   }
   
   //if(!is_number($edad) && !preg_match("/[0-9]+/", $edad)){
   if(!is_int($edad) || !filter_var($edad, FILTER_VALIDATE_INT)){
        $error = 'edad';
   }
   
   if(!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = 'email';
   }
   
   if(empty($password) || strlen($password)<5){
        $error = 'password';
   }
   
   
// die();
} else{
//  $error2 = $error;
    $error = 'faltan_valores';
    var_dump($_POST);
    echo $error;
}

if($error!='ok'){
//  echo $error2;
//  header("Location:index.php?error=$error");
    header("Location:index.php?error=$error");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Validacion de formularios</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php if($error == 'ok'): ?>
            <h1>Datos validados correctamente</h1>
                <p><?=$nombre?></p>
                <p><?=$apellidos?></p>
                <p><?=$edad?></p>
                <p><?=$email?></p>
        <?php endif;?>
        
    </body>
</html>