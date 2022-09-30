<?php

// HE CONSEGUIDO QUE ESTE ME FUNCIONE!
// Antes de instalar el paquete hay que acceder a la carpeta de nuestro proyecto
// localhost/master-php/aprendiendo-librerias-php/
// localhost/master-php/aprendiendo-librerias-php/index_dompdf.php
// https://github.com/dompdf/dompdf
// https://packagist.org/packages/dompdf/dompdf

require '../vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// coger el html
$html = file_get_contents("http://localhost/master-php/aprendiendo-librerias-php/generar-pdf/pdf_para_generar.php");

// instantiate and use the dompdf class
$dompdf = new Dompdf();

// Esto te crearia un pdf con el texto 'Hola Mundo!'
// $dompdf->loadHtml('Hola Mundo!');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Cargamos el contenido HTML
$dompdf->load_html(utf8_decode($html));

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('MiPDF.pdf');
