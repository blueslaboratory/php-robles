<?php

// Es POST porque el metodo es POST, si no seria GET
// http://localhost/master-php/aprendiendo-php/18-formularios/guardar.php

if(isset($_POST['titulo']) && isset($_POST['descripcion'])){
    echo "<h1>".$_POST['titulo']."</h1>";
    echo '<h2>'.$_POST['descripcion'].'</h2>';
}
elseif(!isset($_POST['titulo']) || !isset($_POST['descripcion'])){
    echo 'La variable $_POST[\'titulo\'] o $_POST[\'descripcion\'] no ha sido enviada';
}
else{
    echo 'Error desconocido, esta pagina no se hace responsable';
}

?>