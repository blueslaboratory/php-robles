<?php

/*
 http://localhost/master-php/aprendiendo-php/20-ficheros/
 20211115
*/

// Abrir archivo
$archivo = fopen("fichero_texto.txt", "a+");
// segundo parametro es el permiso a+ que permite R/W
// r solo permitiria leer

// Leer contenido
while(!feof($archivo)){
    $contenido = fgets($archivo);
    echo $contenido . "<br/>";
}

// Escribir
fwrite($archivo, "<br/>**** Soy un texto metido desde PHP 20211115 ****");


// Cerrar archivo
fclose($archivo);


// Copiar un fichero
// F:\wamp64\www\master-php\aprendiendo-php\20-ficheros
echo copy('fichero_texto.txt', 'fichero_copiado.txt') or die("Error al copiar");
// se pueden usar sin echo que devuelve 1 porque es true


// Renombrar
echo rename('fichero_copiado.txt','archivito_recopiadito.txt');


// Eliminar
echo unlink('archivito_recopiadito.txt') or die('Error al borrar');


// Comprobar si existe
if(file_exists("fichero_texto.txt")){
    echo "El archivo existe!";
}
else{
    echo "NO existe";
}
?>