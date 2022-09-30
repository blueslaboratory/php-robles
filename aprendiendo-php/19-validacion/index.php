<?php
// http://localhost/master-php/aprendiendo-php/19-validacion/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Validacion de formularios PHP</title>
    </head>
    <body>
        <h1>Validar formularios en PHP</h1>
        
        <?php
        
            // si pilla algun error
            if(isset($_GET['error'])){
                $error = $_GET['error'];
                
                if($error == 'faltan_valores'){
                    echo '<strong style="color:red"> Introduce todos los datos en todos los campos del formulario</strong>';
                }                
                if($error == 'nombre'){
                    echo '<strong style="color:red"> Introduce bien el nombre</strong>';
                }
                if($error == 'apellidos'){
                    echo '<strong style="color:red"> Los apellidos no son correctos</strong>';
                }
                if($error == 'edad'){
                    echo '<strong style="color:red"> Introduce una edad correcta</strong>';
                }
                if($error == 'email'){
                    echo '<strong style="color:red"> El correo es erroneo</strong>';
                }
                if($error == 'password'){
                    echo '<strong style="color:red"> Introduce una password de > 5 letras</strong>';
                }
            }
        ?>
        
        <form  method="POST" action="procesar_formulario.php">
            <label for="nombre">Nombre</label><br/>
            <input type="text" name="nombre" required="required" pattern="[a-zA-Z]+"><br/>
            
            <label for="apellidos">Apellidos</label><br/>
            <input type="text" name="apellidos" required="required" pattern="[a-zA-Z]+""><br/>
            
            <label for="edad">Edad</label><br/>
            <input type="number" name="edad" required="required" pattern="[0-9]+"><br/>
            
            <label for="email">Email</label><br/>
            <input type="email" name="email" required="required"><br/>
            
            <label for="password">Password</label><br/>
            <input type="password" name="password" required="required"><br/>
            
            <input type="submit" value="enviar"/>
            
        </form> 
        
    </body>
</html>
