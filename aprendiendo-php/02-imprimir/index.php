<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Imprimir por pantalla - Master en PHP</title>       
    </head>

    <body>
        <h1>Master en PHP - <?php echo 'victorroblesweb.es' ?> - 20211109</h1>
        <!--
            no hay limite al numero de etiquetas de PHP que se imprimen por pantalla
        -->
        <?= 'Bienvenido al curso mas grande de PHP:' ?><br>  
        <?= '(Esta es una sintaxis abreviada de PHP)'?><br>
        
        <?php
            // http://localhost/master-php/aprendiendo-php/02-imprimir/
            // Titular de la seccion
            echo "<h3>Listado de videojuegos</h3>";
            
            /*
               Esta es una lista
               de videojuegos
               modernos
             */
            echo "<ul>"
                . "<li>GTA</li>"
                . "<li>Fifa</li>"
                . "<li>Mario Bros</li>"
               . "</ul>";
            
            // echo '<br>HOLA. HOLA. HOLA<br>';
            
            // Parrafo explicativo
            echo '<p>Esto es todo amigos ' . '-'.' lista de juegos</p>';
        ?>
    </body>
</html>