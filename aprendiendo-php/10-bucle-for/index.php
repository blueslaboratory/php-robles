<?php

/*  
20211113
http://localhost/master-php/aprendiendo-php/10-bucle-for

FOR
for(variable contador, condicion, actualizando contador){
    bloque de instrucciones
}

*/

$resultado = 0;
echo "Resultado suma incremental: ";
for($i=0; $i<=100; $i++){
//  $resultado =  $resultado + $i;
    $resultado += $i;
    echo $resultado;
    if($i!=100){
        echo ", ";
    }
}

echo "<h1> El resultado es: $resultado</h1>";
echo "<hr/>";



// Ejemplo tabla multiplicar con el bucle for
if(isset($_GET['numero'])){
    // isset comprueba si existe una variable o no
    // casteando: cambiar tipo de dato
    $numero = (int)$_GET['numero']; 
    // pasamos una variable a traves del metodo GET en la URL:
    // http://localhost/master-php/aprendiendo-php/10-bucle-for/?numero=33
    // http://localhost/master-php/aprendiendo-php/10-bucle-for/?numero=7
    // http://localhost/master-php/aprendiendo-php/10-bucle-for/?numero=12
}
else{
    $numero = 1;
}

echo "<h1>Tabla de multiplicar del numero $numero </h1>";


for($contador = 0; $contador <= 10; $contador++){
    if($numero == 12){
        echo "No se pueden mostrar estas operaciones prohibidas secretas";
        break;
    }
    
    echo "$numero x $contador = ".($numero*$contador)."<br/>";
}
echo "<hr/>";

?>