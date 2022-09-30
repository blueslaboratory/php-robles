<?php

// http://localhost/master-php/aprendiendo-librerias-php/manipular-imagenes/
// https://packagist.org/packages/intervention/image

require_once '../vendor/autoload.php';


$foto_original = 'mifoto.jpg';
$guardar_en = 'fotomodificada.jpg';

// open an image file
 $img = Intervention\Image\ImageManagerStatic::make($foto_original);
 //$imagen = new Intervention\Image\Image();
//$imagen->make($foto_original);
// $img = $imagen->make($foto_original);

// now you are able to resize the instance
$img->resize(320, 240);

// and insert a watermark for example
$img->insert('public/watermark.png');

// finally we save the image as a new file
$img->save($guardar_en);