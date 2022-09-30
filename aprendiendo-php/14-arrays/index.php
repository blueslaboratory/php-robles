<?php

/* 
http://localhost/master-php/aprendiendo-php/14-arrays

Arrays
Un array es una coleccion o un conjunto de datos/valores, bajo un unico nombre
Para acceder a esos valores podemos usar un indice numerico o alfanumerico

*/


$pelicula = "Batman";
$peliculas = array('Batman', 'Spiderman', 'El señor de los anillos');
$cantantes = ['2pac', 'Drake', 'Jennifer Lopez'];

var_dump($peliculas[1]);// array empieza en 0: 1 saca Spiderman
var_dump($peliculas[2]);// array empieza en 0: 1 saca El sir de los rings

var_dump($cantantes);
echo "<br/>";
echo "<hr/>";

echo $peliculas[0];
echo "<br/>";   
echo $cantantes[2];
echo "<br/>";
echo "<hr/>";


// Recorrer con FOR
echo "<h1>Listado de peliculas</h1>";

// Recorrer chars
echo "<ul>";
for($i=0; $i<count($peliculas); $i++){
    echo "<li>" . $pelicula[$i] . "</li>"; 
    // pelicula en singular: recorre la var pelicula = Batman
    // con la longitud del array peliculas = 3
}
echo "</ul>";

// Recorrer array
echo "<ol>";
for($i=0; $i<count($peliculas); $i++){
    echo "<li>" . $peliculas[$i] . "</li>";
}
echo "</ol>";


// Recorrer con foreach
echo "<hr/>";
echo "<h1>Listado de cantantes</h1>";
echo "<ul>";
foreach ($cantantes as $cantante){
    echo "<li>" . $cantante . "</li>";
}
echo "</ul>";
echo "<br/>";
echo "<hr/>";   



// Arrays asociativos: Indices con valor alfanumerico, GET y POST son asociativos
echo "<h1>Arrays asociativos</h1>";
$personas = array(
    'nombre' => 'Blue',
    'apellidos' => 'Lab',
    'web' => 'blueslaboratory.com'
    );
    
var_dump($personas);
echo "<br/>";
//echo "<hr/>";

echo $personas['web'];
echo "<br/>";
echo var_dump($_GET);
//http://localhost/master-php/aprendiendo-php/14-arrays/?hola=1&nombre=paco
echo "<br/>";
echo "<hr/>";   



// Arrays multidimensionales: arrays con arrays dentro
echo "<h1>Arrays multidimensionales</h1>";
$contactos = array(
    array(
        'nombre' => 'Antonio',
        'email' => 'antonio@antonio.com'
    ),
    array(
        'nombre' => 'Luis',
        'email' => 'luis@luis.com'
    ),
    array(
        'nombre' => 'Salvador',
        'email' => 'salvador@salvador.com'
    )
);

var_dump($contactos);
echo "<hr/>";

echo $contactos[1]['nombre'] . "<br/>";
echo $contactos[2]['email'] . "<br/>";
echo "<br/>";
echo "<hr/>";



foreach ($contactos as $key => $contacto){
    var_dump($contacto['nombre']);
}
echo "<hr/>";

foreach ($contactos as $contacto){
    var_dump($contacto['nombre']);
}

?>
