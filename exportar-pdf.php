<?php
// exportar-pdf.php

//use Diversos\Utilitarios;

use Dompdf\Dompdf;
require_once "vendor/autoload.php";

session_start(); // inicialização a session
//Utilitarios::teste($_SESSION['dados']);

$paragrafo = "";
foreach($_SESSION['dados'] as $fabricante) {
    $paragrafo .= "<p>".$fabricante['nome']."</p>";
}

// Operador de concatenação e atribuição .= 

// Conteúdo HTML para o resumo usando sintaxe heredoc PHP 
$data = date("d/m/y");
$conteudo = <<<HTML
<div style="border: solid 2px; padding: 10px; width: 70%; margin:auto">
    <h2>Resumo de Fabricantes - $data</h2>
    $paragrafo
</div>

HTML;
// echo $conteudo;

$dompdf = new Dompdf();
$dompdf->loadHtml($conteudo);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream();