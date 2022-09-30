<?php

/* 
 http://localhost/master-php/aprendiendo-php/11-ejercicios/ejercicio4.php
 http://localhost/master-php/aprendiendo-php/11-ejercicios/ejercicio4.php?numero1=2&numero2=6
 Ejercicio 4
 Recoger 2 numeros por la URL (Parametros GET y hacer todas las operaciones basicas
 de una calculadora (suma, resta, multiplicacion y division) de esos 2 numeros

 Intentos: I 
 */

//Recogiendo numeros con la URL
if(isset($_GET['numero1']) && isset($_GET['numero2'])){ // Ojo al par de isset
    
    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];
    
    echo "<h1>Calculadora</h1>";
    echo "Suma ($numero1+$numero2) = " . ($numero1+$numero2) . "<br/>";
    echo "Resta ($numero1-$numero2) = " . ($numero1-$numero2) . "<br/>";
    echo "Multiplicacion ($numero1*$numero2) = " . ($numero1*$numero2) . "<br/>";
    echo "Division ($numero1/$numero2) = " . ($numero1/$numero2) . "<br/>";
}
else {
    echo "<h1>Introduce correctamente los valores por la URL </h1>";
}
?>