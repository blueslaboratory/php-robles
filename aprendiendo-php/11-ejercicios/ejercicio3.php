<?php

/* 
 http://localhost/master-php/aprendiendo-php/11-ejercicios/ejercicio3.php
 
 Ejercicio 3 
 Escribir un programa que imprima por pantalla los cuadrados (un numero multiplicado
 por si mismo) de los 40 primeros numeros naturales.
 PD: Utilizar bucle while.
 */

$contador = 0;

echo "<h2> CON EL WHILE </h2><br/>";
while($contador<=40){
    echo "Cuadrado del $contador: ($contador*$contador) = " . ($contador*$contador);
    echo "<br/>";
    $contador++;
}
echo "<br/><hr/>";

echo "<h2> CON EL FOR </h2><br/>";
for($contador=0; $contador<=40; $contador++){
    echo "Cuadrado del $contador: ($contador*$contador) = " . ($contador*$contador);
    echo "<br/>";
}



?>