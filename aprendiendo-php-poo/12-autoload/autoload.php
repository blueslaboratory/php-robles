<?php

function app_autoloade($class){
    require 'clases/' . $class . '.php';
}

spl_autoload_register('app_autoloade');

?>