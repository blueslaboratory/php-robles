<h1>Hola Mundo MVC</h1>

<?php
// Video: 241-247

// http://localhost/master-php/aprendiendo-php-mvc/
// http://localhost/master-php/aprendiendo-php-mvc/?action=crear
// http://localhost/master-php/aprendiendo-php-mvc/?action=mostrarTodos

// http://localhost/master-php/aprendiendo-php-mvc/?controller=UsuarioController&action=crear
// http://localhost/master-php/aprendiendo-php-mvc/?controller=UsuarioController&action=mostrarTodos

// http://localhost/master-php/aprendiendo-php-mvc/?controller=Usuario&action=crear
// http://localhost/master-php/aprendiendo-php-mvc/?controller=Usuario&action=mostrarTodos
// http://localhost/master-php/aprendiendo-php-mvc/?controller=Nota&action=listar


// Controlador frontal:

//require_once 'controllers/UsuarioController.php';
//require_once 'controllers/NotaController.php';
require_once 'autoload.php';

if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}else{
    echo "La pagina que buscas no existe";
    exit();
}



if(class_exists($nombre_controlador)){
    
    $controlador = new $nombre_controlador;
    
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }else{
        echo "La pagina que buscas no existe";
    }    
}else{
    echo "La pagina que buscas no existe";
}

//$controlador = new UsuarioController();
//$controlador->mostrarTodos();
//$controlador->crear();

