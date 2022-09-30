<h1>Listado de usuarios</h1>

<!-- 
http://localhost/master-php/aprendiendo-php-mvc/?controller=Usuario&action=mostrarTodos
-->

<?php while($usuario = $todos_los_usuarios->fetch_object()):?>
    <?=$usuario->email?> - <?=$usuario->fecha?> <br/>
<?php endwhile; ?>
