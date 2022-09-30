<?php

/* 
http://localhost/master-php/aprendiendo-php/11-ejercicios/ejercicio2.php

Ejercicio 2
Escribe un script que nos devuelva por pantalla todos los numeros pares que hay
del 1 al 100
*/

for ($i=0; $i<=100; $i++){
    if($i%2 == 0){
        echo $i;
        if($i!=100){
            echo ', ';
        }
    }
}



?>