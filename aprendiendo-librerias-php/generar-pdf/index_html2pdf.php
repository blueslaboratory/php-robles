<?php

// localhost/master-php/aprendiendo-librerias-php/
// NO FUNCIONA Y NO SE POR QUE

require '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$html2pdf = new HTML2Pdf();

// Recoger la vista a imprimir
ob_start();
require_once 'pdf_para_generar.php';
$html = ob_get_clean();


$html2pdf->writeHTML($html);
$html2pdf->Output('pdf_generado.pdf');
