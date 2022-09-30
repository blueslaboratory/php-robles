<?php


/*
http://localhost/master-php/aprendiendo-php/08-condicionales/

// Condicionales
 if(condicion){
  instrucciones
 } else{
  otras instrucciones
 }

// Operadores de comparacion
 ==  igual
 === identico (compara que sea el mismo tipo de dato)
 !=  diferente
 <>  diferente
 !== no identico
 <   menor que
 >   mayor que
 <=  menor o igual que
 >=  mayor o igual que
  
  
 // Operadores logicos
  && AND Y
  || OR O
  !  NOT NO
  and, or
*/


// Ejemplo 1
echo "<h1>Ejemplo 1</h1>";

$color ="rojo";
//$color ="azul";

if($color == "rojo"){
    echo "El color es rojo";
} else {
    echo "El color no es rojo";
}
echo "</br>";
echo "<hr>";


// Ejemplo 2
echo "<h1>Ejemplo 2</h1>";

$year = 2028;
if($year <= 2019){
    echo "Estamos en 2019 o antes";
} else{
    echo "Estamos mas alla del 2019";
}
echo "</br>";
echo "<hr>";


// Ejemplo 3
echo "<h1>Ejemplo 3</h1>";

$nombre = "David Extremadura";
$ciudad = "Madrid";
$continente = "Europa";
$edad = 42;
$mayoria_edad = 18;

if($edad>= $mayoria_edad){
    echo "<h4>$nombre es mayor de edad </h4>";
    if($continente == "Europa"){
        echo "<h4>y es de $ciudad ($continente)</h4>";
    }else{
        echo "No es Europeo";
    }
}else{
    echo "<h4>$nombre NO es mayor de edad </h4>";
}
echo "</br>";
echo "<hr>";


// Ejemplo 4
echo "<h1>Ejemplo 4</h1>";

$dia = 3;
if ($dia == 1){
    echo "Es Lunes";
} 
else{
    if($dia == 2){
        echo "Es Martes";
    } 
    else{
        if($dia == 3){
            echo "Es Miercoles";
        }
        else{
            if($dia == 4){
                echo "Es Jueves";
            }
            else{
                 if($dia == 5){
                    echo "Es Viernes";
                 }
                 else{
                    echo "Es fin de semana ";
                 }
            }
        }
    }
}
echo "</br>";
echo "<hr>";


// Ejemplo 4b
echo "<h1>Ejemplo 4b</h1>";

if($dia == 1){
    echo "LUNES";
}elseif($dia == 2){
    echo "MARTES";
}elseif($dia == 3){
    echo "MIERCOLES";
}elseif($dia == 4){
    echo "JUEVES";
}elseif($dia == 5){
    echo "VIERNES";
}else{
    echo "Es fin de semana";
}
echo "</br>";
echo "<hr>";



// Ejemplo 4c
echo "<h1>Ejemplo 4c</h1>";
$dia = 99;

switch($dia){
    case 1:
        echo "LUNES";
        break;
    case 2:
        echo "MARTES";
        break;
    case 3:
        echo "MIERCOLES";
        break;
    case 4:
        echo "JUEVES";
        break;
    case 5:
        echo "VIERNES";
    default:
        echo "Es fin de semana";
}
echo "</br>";
echo "<hr>";



// Ejemplo 5
echo "<h1>Ejemplo 5</h1>";
$edad1 = 18;
$edad2 = 64;
$edad_oficial = 20;

if ($edad_oficial >= $edad1 && $edad_oficial <= $edad2){
    echo "Esta en edad de trabajar";
}else{
    echo "NO PUEDE TRABAJAR";
}
echo "</br>";
echo "<hr>";



$pais = "Francia";
if($pais == "Mexico" || $pais == "Espana" || $pais == "Colombia"){
    echo "En este pais se habla espanhol";
} else{
    echo "No se habla espanhol";
}
echo "</br>";
echo "<hr>";



echo "<h1>Ejemplo 6 - GOTO</h1>";
// GOTO
goto marca;
echo "<h3>Instruccion 1</h3>";
echo "<h3>Instruccion 2</h3>";
echo "<h3>Instruccion 3</h3>";
echo "<h3>Instruccion 4</h3>";

marca:
echo "<h3> Me he saltado 4 echos </h3>"
?>