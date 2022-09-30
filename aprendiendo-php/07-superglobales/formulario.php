<?php
// http://localhost/master-php/aprendiendo-php/07-superglobales/formulario.php
?>


<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Formulario en PHP</title>
    </head>
    <body>
        <h1>Formulario en PHP</h1>
        <form method="GET" action="recibir.php">
        <!-- 
        los parametros GET aparecen en la URL, los POST no
        action: a que pagina me lleve el formulario
        -->
            <p>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre"/>
            </p>
            
            <p>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos"/>
            </p>
            
            <input type="submit" value="enviar datos"/>
            
        </form>
        
    </body>
</html>


