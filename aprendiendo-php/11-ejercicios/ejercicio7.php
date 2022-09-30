<?php

/* 
Ejercicio 7.
Hacer un programa que muestre todos los numeros entre 2 numeros que nos lleguen
por la URL($GET) que sean impares 

http://localhost/master-php/aprendiendo-php/11-ejercicios/ejercicio7.php
http://localhost/master-php/aprendiendo-php/11-ejercicios/ejercicio7.php?numero1=14&numero2=69
http://localhost/master-php/aprendiendo-php/11-ejercicios/ejercicio7.php?numero1=99&numero2=33
 
*/



//Recogiendo numeros con la URL
if(isset($_GET['numero1']) && isset($_GET['numero2'])){
    
    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];
    $numero3 = 0;
    
    if($numero1<$numero2){
        echo "<h1>Numeros impares entre $numero1 y $numero2: </h1>";
        for($i=$numero1; $i<=$numero2; $i++){
            if ($i%2!=0){
                echo "$i";
                if ($i!=$numero2){
                    echo ", ";
                }
            }
                
        }
    }
    else{
        $numero3=$numero2;
        $numero2=$numero1;
        $numero1=$numero3;
        
        echo "<h1>Numeros impares entre $numero1 y $numero2: </h1>";
        
        for($i=$numero1; $i<=$numero2; $i++){
            if ($i%2!=0){
                echo "$i";
                if ($i!=$numero2){
                    echo ", ";
                }
            }
        }
    }
}
else {
    echo "<h1>Introduce correctamente los valores por la URL </h1>";
}


?>