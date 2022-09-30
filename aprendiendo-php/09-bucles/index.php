<?php

/* 
   20211113
   http://localhost/master-php/aprendiendo-php/09-bucles/

   BUCLE WHILE 
   Estructura de control que itera o repite la ejecucion de una serie de 
   instrucciones tantas veces como sea necesario en base a una condicion

   while (condicicion){
     bloque de instrucciones
     otra instruccion
   }
*/

$numero = 0;
while($numero<=100){
    echo "$numero ";    
    if($numero != 100){
        echo ", ";
    }
    $numero++;
}

// Para entrar en este 2do bucle tendria que setear $numero = 0
while($numero<=100){
    echo "<p>$numero</p>";
    $numero++;
}

echo "<hr>";



// Ejemplo
if(isset($_GET['numero'])){
    // isset comprueba si existe una variable o no
    // casteando: cambiar tipo de dato
    $numero = (int)$_GET['numero']; 
    // pasamos una variable a traves del metodo GET en la URL:
    // http://localhost/master-php/aprendiendo-php/09-bucles/?numero=33
    // http://localhost/master-php/aprendiendo-php/09-bucles/?numero=8
    // http://localhost/master-php/aprendiendo-php/09-bucles/?numero=12
}
else{
    $numero = 1;
}

echo "<h1>Tabla de multiplicar del numero $numero </h1>";

$contador = 0;
while($contador <= 10){
    echo "$numero x $contador = ".($numero*$contador)."<br/>";
    $contador++;
}
echo "<hr/>";



/* DO WHILE
do{
    BLOQUE DE INSTRUCCIONES
} while(condicion);
*/


$edad = 18;
$contador = 1;

do{
    echo "Tienes acceso al local privado $contador <br/>";
    $contador++;
}while($edad>=18 && $contador <= 10);


?>

