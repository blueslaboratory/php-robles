<?php

// Operadores aritmeticos
// http://localhost/master-php/aprendiendo-php/06-operadores/

$numero1 = 55;
$numero2 = 33;

// las operaciones es recomendable ponerlas entre parentesis
echo 'suma: ' .($numero1 + $numero2) .'<br/>';
echo 'resta: ' .($numero1 - $numero2) .'<br/>';
echo 'multiplicacion: ' .($numero1 * $numero2) .'<br/>';
echo 'division: ' .($numero1/$numero2). '<br/>';
echo 'resto: ' .($numero1%$numero2). '<br/>';


// Operadores incremento y decremento
$year = 2019;

//Incremento
$year++;
echo "<h1>$year</h1>";

//Decremento
$year--;
echo "<h1>$year</h1>";

//Pre-Incremento
//$year = 1+ $year
++$year;
echo "<h1>$year</h1>";

//Pre-Decremento
//$year = -1+ $year
--$year;
echo "<h1>$year</h1>";



//Operadores de asignacion
$edad = 55;
echo $edad.'</br>';

// $edad = $edad+5;
echo ($edad+=5);
echo ($edad-=5);
echo ($edad*=5);
echo ($edad/=5);

?>