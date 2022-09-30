<?php

// Video 324
// http://localhost/master-php/aprendiendo-php-poo/11-errores/index.php?id=22

// Capturar excepciones en codigo susceptible a errores
try{
    
    if(isset($_GET['id'])){
        echo "<h1> El parametro es: {$_GET['id']}</h1> ";
    } else{
        throw new Exception('Faltan parametros por la url');
    }
    
} catch (Exception $e) {
    echo "Ha habido un error: " . $e->getMessage();
} 
//finally {
//    echo "Todo correcto";
//}
