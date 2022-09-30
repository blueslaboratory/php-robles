<?php
// 199 Login e identificacion de usuarios

// Iniciar la sesion y la conexion a la DB
require_once 'includes/conexion.php';

// Recoger los datos del formulario
if(isset($_POST)){
    
    // Borrar error antiguo
    if(isset($_SESSION['error_login'])){
//      session_unset($_SESSION['error_login']);
        session_unset();
        var_dump($_SESSION['error_login']);
    }
    
    // Recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);
    
    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
//        var_dump($usuario);
//        die();
        
        // Comprobar la password / cifrar
//        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
//        var_dump($password_segura);
//        die();
        
        
        $verify = password_verify($password, $usuario['password']);
//        echo $password. '--------';
//        echo $usuario['password']. '--------';
//        echo $verify;
        
        if($verify){            
            // Utilizar una sesion para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;

//           var_dump($usuario);
            
        } else{
            // Si algo falla enviar una sesion con el fallo
            $_SESSION['error_login'] =  "Login incorrecto!!";
            
            echo "1";
            var_dump($_SESSION['error_login']);
        }      
        
    }else{
        // mensaje de error
        $_SESSION['error_login'] =  "Login incorrecto!!";
    }
    
   
}


// Redirigir al index.php
header('Location: index.php');
?>