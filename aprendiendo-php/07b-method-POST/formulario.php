<?php
// http://localhost/master-php/aprendiendo-php/07b-method-POST/formulario.php
// http://192.168.56.1/master-php/aprendiendo-php/07b-method-POST/formulario.php
?>


<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Formulario en PHP</title>
    </head>
    <body>
        <h1>Formulario en PHP</h1>
        <form method="POST" action="recibir.php">
        <!-- 
        los parametros GET aparecen en la URL, los POST no
        action: a que pagina quiero que me lleve el formulario
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


