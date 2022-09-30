<?php
//http://localhost/master-php/aprendiendo-php/13-includes
?>


<?php// include 'includes/cabecera.php'; ?>

<?php// include_once 'includes/cabecera.php'; ?>
<!-- include_once te lo incluye una unica vez-->        

<?php// require 'includes/cabecera.php'; ?>
<!-- require hay que incluir el fichero si o si, es mas recomendable que el include -->        

<?php require_once 'includes/cabecera.php'; ?>
<!-- 
require_once hay que incluir el fichero si o si, es mas 
recomendable que el include pero solo te va a permitir 
incluir el include 1 vez. El que mas me gusta a mi es el require_once
-->

<!-- 
Include vs require:

The require() function will stop the execution of the script when an error occurs. 
The include() function does not give a fatal error. The include() function is 
mostly used when the file is not required and the application should continue to 
execute its process when the file is not found.
-->




<!--Contenido-->
<div>
    <h2>Esta es la pagina de inicio</h2>
    <p>Texto de prueba de la pagina de inicio</p>
</div>
<?php var_dump($nombre); ?>

<?php echo "$nombre guardado en la cabecera </br>"; ?>
<?= $nombre . ' en sintaxis abreviada' ?>

<?php// include 'includes/footer.php';  ?>
<?php require_once 'includes/footer.php'; ?>

