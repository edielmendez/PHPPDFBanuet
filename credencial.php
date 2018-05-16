<?php 
use Dompdf\Dompdf;
use Dompdf\Options;	
require_once 'vendor/autoload.php';
// instantiate and use the dompdf class

$templade = file_get_contents("plantillas/credencial.html");
$options = new Options();
$options->set('defaultFont', 'Courier');
$options->set('isRemoteEnabled', TRUE);
$options->set('debugKeepTemp', TRUE);
$options->set('isHtml5ParserEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->output(['isRemoteEnabled' => TRUE]);
$dompdf->loadHtml($templade);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
 ?>