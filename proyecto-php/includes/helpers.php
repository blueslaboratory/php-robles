<?php

function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class = 'alerta alerta-error'>".$errores[$campo].'</div>';
    }
    
    return $alerta;
}

function borrarErrores(){    
    $borrado = false;
    
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
//      $borrado = session_unset($_SESSION['errores']);
//      $borrado = session_unset();
        $borrado = true;
    }
        
    if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
//      $borrado = session_unset($_SESSION['errores_entrada']);
//      $borrado = session_unset(); 
//      comento para que no me muestre los errores de entrada en rojo
        $borrado = true;
    }
    
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
//      $borrado = session_unset($_SESSION['completado']);
//      $borrado = session_unset();
        $borrado = true;
    }
    
    return $borrado;
}

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >=1){
        $resultado = $categorias;
    }
    return $resultado;
}

function conseguirCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id = $id";
    $categorias = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >=1){
        $resultado = mysqli_fetch_assoc($categorias);
    }
    return $resultado;
}

function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', " .
           "CONCAT(u.nombre, ' ', u.apellidos) AS 'usuario' FROM entradas e " . 
           "INNER JOIN categorias c ON e.categoria_id = c.id " .
           "INNER JOIN usuarios u ON e.usuario_id = u.id " .
           "WHERE e.id = $id";
    $entrada = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($entrada && mysqli_num_rows($entrada) >= 1){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    
    return $resultado;
}

function conseguirEntradas($conexion, $limit = null, $categoria = null, $busqueda = null){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
           "INNER JOIN categorias c ON e.categoria_id = c.id ";    
    // Error frecuente: no dejar espacio al final de cada linea para concatenar 
    // con la siguiente
    
    if(!empty($categoria)){
        $sql .= " WHERE e.categoria_id = $categoria ";
    }
    
    if(!empty($busqueda)){
        $sql .= " WHERE e.titulo LIKE '%$busqueda%' ";
    }
    
    
    
    $sql .= " ORDER BY e.id DESC ";
    
    if($limit){
        // $sql = $sql. " LMIT 4"
        $sql .= " LIMIT 4";
    }
    
//    echo $sql;
//    die();
    
    $entradas = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }
    
    return $resultado;
}





?>