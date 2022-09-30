<?php

require '../vendor/autoload.php';

// localhost/master-php/aprendiendo-librerias-php/generar-pdf/helloworld.php
// https://github.com/spipu/html2pdf/blob/HEAD/doc/install.md
// NO FUNSIONA Y NO SE POR QUE

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
$html2pdf->output();

