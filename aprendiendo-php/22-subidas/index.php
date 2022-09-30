<?php
//http://localhost/master-php/aprendiendo-php/22-subidas/
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Subir archivos PHP</title>
    </head>
    <body>
        <h1>Subir imagenes con PHP</h1>
        
        <form action="upload.php" method = "POST" enctype="multipart/form-data">
            <input type="file" name="archivo"/>
            <input type="submit" name="enviar"/>
        </form>
        
        <!--
            action="upload.php" 
            Al darle a submit, llevame a upload.php
            
            action: hace referencia a donde va a ir la informacion del doctype
            enctype="multipar/form-data": permite enviar archivos desde el 
            formulario al servidor
            
            https://stackoverflow.com/questions/4526273/what-does-enctype-multipart-form-data-mean
            What does enctype='multipart/form-data' mean in an HTML form and 
            when should we use it?
            use multipart/form-data when your form includes any 
            <input type="file"> elements
        -->
        
        <h1>Listado de imagenes</h1>
        <?php
            $gestor = opendir('./images');
            if($gestor):
                while(($image = readdir($gestor)) !== false):
                // !== no identico (compara que el tipo de dato sea distinto)
                    if($image != '.' && $image != '..'){
                    //el '.' es el directorio actual y el '..' se refiere al directorio anterior
                        echo "<img src='images/$image' width='200px'/><br/>";
                    }
                    
                endwhile;
            
            endif;
        ?>
    </body>
    
    
    
    
</html>