<?php


if(isset($_POST)){    
    
    // Cargar la conexion a la BD
    require_once 'includes/conexion.php';

    // Iniciar sesion
    if(!isset($_SESSION)){
        session_start();
    }
    
    
    // Operador ternario abajo
    
    // Recoger los valores del formulario de registro con mysqli_real_escape_string 
    // para poder poner comillas en los strings: Sara's
    // Sirve para curarnos en salud y tener mas seguridad el tener esos datos y 
    // guardarlos como string a la hora de insertar datos en un formulario
    
    if(isset($_POST['nombre'])){
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    } else{
        $nombre = false;
    }

    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;    
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
    
    // Array de errores
    $errores = array();
    
    
    // Validar los datos antes de guardarlos en la BD
    // Validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    } else{
        $nombre_validado = false;
        echo $errores['nombre'] = "El nombre no es valido";
    }

    // Validar apellidos    
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    } else{
        $apellidos_validado = false;
        echo $errores['apellidos'] = "Los apellidos no son validos";
    }
    
    // Validar el email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    } else{
        $email_validado = false;
        echo $errores['email'] = "El email no es valido";
    }
    
    // Validar la contrasena
    if(!empty($password)){
        $password_validado = true;
    } else{
        $password_validado = false;
        echo $errores['password'] = "La password esta vacia";
    }
    
    
    $guardar_usuario = false;
    
    if(count($errores) == 0){
        $guardar_usuario = true;
        
        // Cifrar la password: me cifra la password 4 veces
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        
//      var_dump($password);
//      var_dump($password_segura);
//      var_dump(password_verify($password, $password_segura));
//      die();
        
        // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA DB
        // Hay que pasarlos con comillas!
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        
//      var_dump(mysqli_error($db));
//      die();
        
        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con exito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
    
//  var_dump($errores);
//  var_dump($_POST);
}

header('Location: index.php');