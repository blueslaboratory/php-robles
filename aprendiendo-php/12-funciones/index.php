<?php

/* 
13-11-2021
http://localhost/master-php/aprendiendo-php/12-funciones

FUNCIONES:
Una funcion es un conjunto de instrucciones agrupadas bajo un nombre concreto
y que pueden reutilizarse solamente invocando a la funcion tantas veces como queramos

function nombreDeMiFuncion($parametro){
  BLOQUE/CONJUNTO DE INSTRUCCIONES
 } 

nombreDeMiFuncion($mi_parametro);
nombreDeMiFuncion($mi_parametro);
 */

// Ejemplo1
echo "<h1>EJEMPLO 1 </h1>";
function muestraNombres(){
    echo "Blue Laboratory <br/>";
    echo "Red Laboratory <br/>";
    echo "Green Laboratory <br/>";
    echo "Orange Laboratory <br/><br/>";
}

// Invocar funcion
muestraNombres();
muestraNombres();
echo "<hr/>";


// Ejemplo 2
echo "<h1>EJEMPLO 2 </h1>";
function tabla($numero){
//  var_dump($numero);
//  echo $numero;
    echo "<h3>Tabla de multiplicar del numero: $numero</h3>";
    for($i=1; $i<=10; $i++){
        echo "$numero x $i = " . ($numero*$i) . "<br/>";
    }
}
tabla(77);
echo "<hr/>";


if(isset($_GET['numero'])){
    tabla($_GET['numero']);
    //http://localhost/master-php/aprendiendo-php/12-funciones/?numero=33
    tabla(2);
    tabla(9);
}
else{
    echo "No hay numero para sacar la tabla";
}
echo "<br/>";
echo "<hr/>";


// Tablas de multiplicar del 1-10
for($i=0; $i<=10; $i++){
    tabla($i);
}
echo "<br/>";
echo "<hr/>";


// Ejemplo 3
echo "<h1>EJEMPLO 3 </h1>";
function calculadora($numero1, $numero2, $negrita = false){
    // $negrita es un parametro opcional, por defecto es false
    // Conjunto de instrucciones a ejecutar
    $suma = $numero1 + $numero2;
    $resta = $numero1 - $numero2;
    $multi = $numero1 * $numero2;
    $div = $numero1 / $numero2;
    
    if($negrita!=false){
//  if($negrita==true){
//  if($negrita){
            
        echo "<h1>";
    }
    
    echo "CALCULADORA: <br/>";
    echo "n1 = $numero1, n2 = $numero2<br/><br/>";
    echo "Suma: $suma <br/>";
    echo "Resta: $resta <br/>";
    echo "Multiplicacion: $multi <br/>";
    echo "Division: $div <br/>";
    echo "Negrita: $negrita";
    echo "<hr/>";    
    
    if($negrita){
        echo "</h1>";
    }
    
    return false;
}

calculadora(10, 30, true);
calculadora(12, 5);
calculadora(6, 3, false);
echo "<br/>";



// Funcion devuelveNombre
function devuelveNombre($nombre){
    return "El nombre es: $nombre";
}

echo "Funcion devuelveNombre:" . "<br/>";
echo devuelveNombre("Blue's Laboratory");
echo "<br/>";
echo "<hr/>";




// Ejemplo 3b
echo "<h1>EJEMPLO 3b </h1>";
function calculadora2($numero1, $numero2, $negrita = false){
    // $negrita es un parametro opcional
    // Conjunto de instrucciones a ejecutar
    $suma = $numero1 + $numero2;
    $resta = $numero1 - $numero2;
    $multi = $numero1 * $numero2;
    $div = $numero1 / $numero2;
    
    $cadena_texto = "";
    
    
    
    if($negrita){
        $cadena_texto .= "<h1>";
    }
    
    $cadena_texto .=  "CALCULADORA2: <br/>";
    $cadena_texto .=  "n1 = $numero1, n2 = $numero2<br/><br/>";
    $cadena_texto .=  "Suma: $suma <br/>";
    $cadena_texto .=  "Resta: $resta <br/>";
    $cadena_texto .=  "Multiplicacion: $multi <br/>";
    $cadena_texto .=  "Division: $div <br/>";
    
    $cadena_texto .=  "Negrita: $negrita";
    
    $cadena_texto .=  "<hr/>";
    
    
    if($negrita){
        $cadena_texto .=  "</h1>";
    }
    
    var_dump($cadena_texto);
    
    return $cadena_texto;
}


echo "No imprime la calculadora porque falta el echo, solo el var_dump:";
calculadora2(10, 30, true); // no imprime la calculadora porque falta el echo

echo "<hr>";
echo calculadora2(10, 30, true);
echo calculadora2(12, 5);
echo calculadora2(6, 3, false);




// Ejemplo 4 Anidando funciones
echo "<h1>EJEMPLO 4 </h1>";

function getNombre($nombre){
    $text = "El nombre es: $nombre";
    return $text;
}

function getApellidos($apellidos){
    $text = "Los apellidos son: $apellidos";
    return $text;
}

function devuelveNombre2($nombre, $apellidos){
    $text = getNombre($nombre) 
            ."<br/>".
            getApellidos($apellidos);
    return $text;
}

echo devuelveNombre2("Blue's", "Laboratory");
//echo "<br/>";
//echo getNombre("Alejandro");
echo "<br/>";
echo "<hr/>";


?>