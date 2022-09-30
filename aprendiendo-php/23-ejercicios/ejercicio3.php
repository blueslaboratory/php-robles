<?php

/*
Ejercicio 3. Hacer una interfaz de usuario (formulario) con 2 inputs y 4 botones: 
sumar, restar, dividir y multiplicar
http://localhost/master-php/aprendiendo-php/23-ejercicios/ejercicio3.php
*/

if(isset($_POST['n1']) && 
   isset($_POST['n2']) && 
   is_numeric($_POST['n1']) &&
   is_numeric($_POST['n2'])){
    
    if(isset($_POST['sumar'])){
        $resultado = "El resultado es: " . ($_POST['n1'] + $_POST['n2']);
        var_dump($_POST);
    }
    if(isset($_POST['restar'])){
        $resultado = "El resultado es: " . ($_POST['n1'] - $_POST['n2']);
    }
    if(isset($_POST['multiplicar'])){
        $resultado = "El resultado es: " . ($_POST['n1'] * $_POST['n2']);
    }
    if(isset($_POST['dividir'])){
        $resultado = "El resultado es: " . ($_POST['n1'] / $_POST['n2']);
    }
}
elseif(!is_numeric($_POST['n1']) || !is_numeric($_POST['n2'])){
    echo '<p style = "color: red;">n1 or n2 non numeric</p>';
    $resultado = false;
    var_dump($_POST);
}
elseif(strlen($_POST['n1']) == 0 || strlen($_POST['n2']) == 0 ){
    // Es curioso los trata como strings.
    // Por aqui no entra, porque entra antes por el otro, si comentas el 
    // elseif anterior entra por aqui
    echo '<p style = "color: red;">strlen de n1 or n2 == 0</p>';
    $resultado = false;
    var_dump($_POST);
}
else{
    $resultado = false;
    var_dump($_POST);
}

?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Calculadora PHP</title>
    </head>
    <body>
        <h1>Calculadora en PHP</h1>
        <form action="" method="POST">
            <label for="n1">Numero 1</label><br/>
            <input type="number" name="n1" /><br/><br/>
            
            <label for="n2">Numero 2</label><br/>
            <input type="number" name="n2" /><br/><br/>
            
            <input type="submit" value="sumar" name="sumar"/>
            <input type="submit" value="restar" name="restar"/>
            <input type="submit" value="multiplicar" name="multiplicar"/>
            <input type="submit" value="dividir" name="dividir"/>
            
        </form>
        
        <?php
        // RESULTADO
            if($resultado != false):
                echo "<h2>$resultado</h2>";
            else:
                echo 'Ha habido un error, faltan valores numericos:';
                echo '<br/>';
                echo '$_POST[\'n1\']: ' . $_POST['n1']; 
                echo '<br/>';
                echo '$_POST[\'n2\']: ' . $_POST['n2']; 
            endif;
        ?>
    </body>
    
</html>