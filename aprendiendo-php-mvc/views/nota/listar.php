<h1>Listado de notas</h1>


<!-- 
http://localhost/master-php/aprendiendo-php-mvc/?controller=Nota&action=listar
-->

<?php while($nota = $notas->fetch_object()):?>
    <?=$nota->titulo?> - <?=$nota->fecha?> <br/>
<?php endwhile; ?>
