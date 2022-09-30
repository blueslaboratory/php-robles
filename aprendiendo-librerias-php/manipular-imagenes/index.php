<?php

// Video: 253
// http://localhost/master-php/aprendiendo-librerias-php/manipular-imagenes/index_phpthumb.php
// https://packagist.org/packages/masterexploder/phpthumb
// Funciona pero el navegador no abre la imagen y netbeans no refresca la carpeta

require_once '../vendor/autoload.php';

$foto_original = 'mifoto2.jpg';
$guardar_en = 'fotomodificada.jpg';

$thumb = new PHPThumb\GD($foto_original);

// Redimensionar
$thumb->resize(250, 250);

//Recortar
//$thumb->crop(50, 50, 120, 120);
//$thumb->cropFromCenter(100);

$thumb->show();
$thumb->save($guardar_en, 'png');