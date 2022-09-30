<?php


if(isset($_POST)){    
    
    // Cargar la conexion a la BD
    require_once 'includes/conexion.php';

    // Recoger los valores del formulario de actualizacion con mysqli_real_escape_string 
    // para poder poner comillas en los strings: Sara's
    // Sirve para curarnos en salud y tener mas seguridad el tener esos datos y 
    // guardarlos como string a la hora de insertar datos en un formulario
    
    // Operador ternario abajo
    if(isset($_POST['nombre'])){
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    } else{
        $nombre = false;
    }

    // Operadores ternarios
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;    
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    
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
    
    $guardar_usuario = false;
    
    if(count($errores) == 0){
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = true;
        
        // COMPROBAR SI EL EMAIL YA EXISTE
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        
        if($isset_user['id'] == $usuario['id'] || empty($isset_user)){
            // ACTUALIZAR USUARIO EN LA TABLA USUARIOS DE LA DB
            // Hay que pasarlos con comillas!
            
            $sql = "UPDATE usuarios SET ".
                    "nombre = '$nombre', ".
                    "apellidos = '$apellidos', ".
                    "email = '$email' ".
                    "WHERE id = ".$usuario['id'];

            $guardar = mysqli_query($db, $sql);

            if($guardar){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;

                $_SESSION['completado'] = "Tus datos se han actualizado con exito";
            }else{
                $_SESSION['errores']['general'] = "Fallo al actualizar tus datos";
            }
        }else{
            $_SESSION['errores']['general'] = "El usuario ya existe";
        }
        
    }else{
        $_SESSION['errores'] = $errores;
    }
    
}

header('Location: mis-datos.php');

