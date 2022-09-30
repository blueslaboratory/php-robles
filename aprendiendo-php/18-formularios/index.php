<?php
// http://localhost/master-php/aprendiendo-php/18-formularios
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Formularios PHP y HTML</title>
    </head>
    <body>
        <h1>Formulario</h1>
        <form action="index.php" method="GET" enctype="multipar/form-data">
            <!--
            action="index.php" 
            Al darle a submit, llevame a index.php
            
            action: hace referencia a donde va a ir la informacion del doctype
            enctype="multipar/form-data": permite enviar archivos desde el 
            formulario al servidor
            
            https://stackoverflow.com/questions/4526273/what-does-enctype-multipart-form-data-mean
            What does enctype='multipart/form-data' mean in an HTML form and 
            when should we use it?
            use multipart/form-data when your form includes any 
            <input type="file"> elements
            -->
            
            
            <!--
            cambiar el metodo a GET y POST para ver las diferencias en la URL:
            
            http://localhost/master-php/aprendiendo-php/18-formularios/index.php?apellido=AJO&sexo=hombre&sexo=mujer&color=%23808080&date=2021-11-03&correo=blue%40red.com&archivo=&email2=blue%40red.com&numero=69&pass=1234&continente=Europa
            
            
            -->
            
            
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" disabled="disabled" value="Blue"/>
            <br/>
            
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" autofocus="autofocus" 
                   maxlength="14" minlength="3" pattern="[A-Z]+"
                   required ="required" placeholder="Mete tu apellido EN MAYUS"/>
            <br/>
            
            <label for="boton">Boton:</label>
            <input type="button" name="boton" value="Click"/>
            <br/>
            
            <label for="sexo">Sexo:</label>
                Hombre<input type="checkbox" name="sexo" value="hombre" checked="checked"/>
                Mujer<input type="checkbox" name="sexo" value="mujer"/>
            <br/>
            
            <label for="color">Color:</label>
            <input type="color" name="color"/>
            <br/>
            
            <label for="date">Fecha:</label>
            <input type="date" name="date"/>
            <br/>
            
            <label for="correo">Correo:</label>
            <input type="email" name="correo"/>
            <br/>
            
            <label for="archivo">Archivo:</label>
            <input type="file" name="archivo" multiple="multiple"/>
            <br/>
            
            <label for="email2">Email2:</label>
            <input type="hidden" name="email2" value="blue@red.com"/>
            <br/>
            
            <label for="numero">Numero:</label>
            <input type="number" name="numero"/>
            <br/>
            
            <label for="pass">Password:</label>
            <input type="password" name="pass"/>
            <br/>
            
            <label for="continente">Continente:</label>
            <br/>
            <input type="radio" name="continente" value="America del Sur"/>America del Sur
            <br/>
            <input type="radio" name="continente" value="Europa"/>Europa 
            <br/>
            <input type="radio" name="continente" value="America del Norte"/>America del Norte
            <br/>
            <input type="radio" name="continente" value="Asia"/>Asia
            <br/>
            
            <label for="web">Pagina web:</label>
            <input type="url" name="wb"/>
            <br/>
            <!-- http:// -->
            
            Textarea:
            <br/>
            <textarea></textarea>
            <br/>
            
            Peliculas:
            <select name="peliculas">
                <option value="Spiderman">Spiderman</option>
                <option value="Batman">Batman</option>
                <option value="La jungla de cristal">La jungla de cristal</option>
                <option value="Gran Torino">Gran Torino</option>
            </select>
            <br/>
            
            <input type="submit" value="enviar"/>
        </form>
    </body>
</html>
