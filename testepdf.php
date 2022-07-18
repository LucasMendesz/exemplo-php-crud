<?php
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(); // Objeto

$conteudoHtml = "<h2 style='text-align:center'>PHP para PDF</h2>
<p style='color:red;text-shadow:black 2px 2px 5px'>Testando lib domPDF</p>";

$dompdf->loadHtml($conteudoHtml);

//$dompdf->loadHtml('hello world'); // Método

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape'); // Ou portrait

// Render the HTML as PDF
$dompdf->render(); // Método

// Output the generated PDF to Browser
$dompdf->stream(); // Método