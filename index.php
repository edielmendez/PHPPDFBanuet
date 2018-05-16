
<?php
// reference the Dompdf namespace
use Dompdf\Dompdf;
require_once 'vendor/autoload.php';
// instantiate and use the dompdf class

$templade = file_get_contents("SOLICITUD.html");

$titular = "Maria de los Angeles Moya Sosa";
$dia = "06";
$mes = "04";
$ano = "93";
$edad = "25";
$garantia_si = TRUE;
$domicilio = "La hacienda";
$numDomicilio = 15;
$colonia = "Loma linda";
$municipio = "Oaxaca de Juarez";
$cp = "68024";
$domicilioTrabajo = "La hacienda";
$numDomicilioTrabajo = 15;
$coloniaTrabajo = "Loma linda";
$municipioTrabajo = "Oaxaca de Juarez";
$cpTrabajo = "68024";
$celular = "951 123 4566";
$email = "email_email@gmail.com";
$metodo_de_cobranza = "TD";
$numero_tarjeta = "1111 1111 1111 1111";
$fecha_expiracion = "00/00";
$banco  = "BANORTE";
$cliente = "cliente";
$templade = str_replace("{titular}", $titular, $templade);
$nomina = "UABJO";
$dia_fecha = "15";
$mes_fecha = "Mayo";
$ano_fecha = "2018";
$tipo_pago_tarjeta = "tarjeta";
$txtNomina = "UABJO";
$claveinterbancaria = "123456789123456789";
$left_firma_cliente = "480px";
$top_firma_cliente = "450px";

/*detalles del plan*/
$nombre_plan = "PLAN TEPEYAC";
$precio_plan = "$26,300";
$anticipo = "$1,500";
$saldo = "$15,000";
$numero_pagos = 36;
$cantidad_mensual = "$5,000";
$cantidad_quincenal = "$15,000";
$modalidad_pago = "Quincenal";
$dias_de_pago = "1 de cada mes";
$total = "$50,000";

if($garantia_si){
	$templade = str_replace("{garantia_si}", "X", $templade);	
	$templade = str_replace("{garantia_no}", "", $templade);	
}else{
	$templade = str_replace("{garantia_no}", "X", $templade);
	$templade = str_replace("{garantia_si}", "", $templade);	
}

$templade = str_replace("{titular}", $titular, $templade);
$templade = str_replace("{dia}", $dia, $templade);
$templade = str_replace("{mes}", $mes, $templade);
$templade = str_replace("{ano}", $ano, $templade);
$templade = str_replace("{edad}", $edad, $templade);
$templade = str_replace("{domicilio}", $domicilio, $templade);
$templade = str_replace("{numDomicilio}", $numDomicilio, $templade);
$templade = str_replace("{colonia}", $colonia, $templade);
$templade = str_replace("{municipio}", $municipio, $templade);
$templade = str_replace("{cp}", $cp, $templade);
$templade = str_replace("{domicilioTrabajo}", $domicilioTrabajo, $templade);
$templade = str_replace("{numDomicilioTrabajo}", $numDomicilioTrabajo, $templade);
$templade = str_replace("{coloniaTrabajo}", $coloniaTrabajo, $templade);
$templade = str_replace("{municipioTrabajo}", $municipioTrabajo, $templade);
$templade = str_replace("{cpTrabajo}", $cpTrabajo, $templade);
$templade = str_replace("{email}", $email, $templade);
$templade = str_replace("{celular}", $celular, $templade);
$templade = str_replace("{cliente}", $cliente, $templade);

$templade = str_replace("{nombre_plan}", $nombre_plan, $templade);
$templade = str_replace("{precio_plan}", $precio_plan, $templade);
$templade = str_replace("{anticipo}", $anticipo, $templade);
$templade = str_replace("{saldo}", $saldo, $templade);
$templade = str_replace("{numero_pagos}", $numero_pagos, $templade);
$templade = str_replace("{cantidad_mensual}", $cantidad_mensual, $templade);
$templade = str_replace("{cantidad_quincenal}", $cantidad_quincenal, $templade);
$templade = str_replace("{modalidad_pago}", $modalidad_pago, $templade);
$templade = str_replace("{dias_de_pago}", $dias_de_pago, $templade);
$templade = str_replace("{total}", $total, $templade);
$templade = str_replace("{dia_fecha}", $dia_fecha, $templade);
$templade = str_replace("{mes_fecha}", $mes_fecha, $templade);
$templade = str_replace("{ano_fecha}", $ano_fecha, $templade);

switch ($metodo_de_cobranza) {
	case 'TC':
		$templade = str_replace("{TC}", "X", $templade);
		$templade = str_replace("{TD}", "", $templade);
		$templade = str_replace("{OXXO}", "", $templade);
		$templade = str_replace("{Nomina}", "", $templade);

		switch ($tipo_pago_tarjeta) {
			case 'trasferencia':
				$campo_dinamico = "<p class=MsoNormal style='margin-bottom:3.0pt;line-height:normal;tab-stops:108.75pt'><span style='font-size:10.0pt'>CLABE INTERBANCARIA ".$claveinterbancaria."<o:p></o:p></span></p>";
				$templade = str_replace("{campo_dinamico}",$campo_dinamico, $templade);
				$firma = "<img src='images/firma.fw.png' style='position:absolute;left:480px;top:450px'>";
				$templade = str_replace("{firma_cliente}",$firma, $templade);
				$firma_agente = "<img src='images/firma.fw.png' style='position:absolute;left:320px;top:905px'>";
				$templade = str_replace("{firma_agente}",$firma_agente, $templade);
				break;
			case 'tarjeta':
				$campo_dinamico = "<p class=MsoNormal style='margin-bottom:3.0pt;line-height:normal;tab-stops:108.75pt'><span style='font-size:10.0pt'>".utf8_decode("Número de tarjeta:  ".$numero_tarjeta)."<span style='mso-spacerun:yes'></span><span style='mso-spacerun:yes'></span>".utf8_decode("&nbsp;&nbsp;&nbsp;&nbsp;Fecha de expiración:  ".$fecha_expiracion)."<span style='mso-spacerun:yes'></span>&nbsp;&nbsp;&nbsp;&nbsp;Banco:  ".utf8_decode($banco)."<span style='mso-spacerun:yes'></span><o:p></o:p></span></p>";
				$templade = str_replace("{campo_dinamico}",$campo_dinamico, $templade);
				$firma = "<img src='images/firma.fw.png' style='position:absolute;left:480px;top:450px'>";
				$templade = str_replace("{firma_cliente}",$firma, $templade);
				$firma_agente = "<img src='images/firma.fw.png' style='position:absolute;left:320px;top:905px'>";
				$templade = str_replace("{firma_agente}",$firma_agente, $templade);
				break;
		}
		
		break;
	case 'TD':
		$templade = str_replace("{TC}", "", $templade);
		$templade = str_replace("{TD}", "X", $templade);
		$templade = str_replace("{OXXO}", "", $templade);
		$templade = str_replace("{Nomina}", "", $templade);
	
		switch ($tipo_pago_tarjeta) {
			case 'trasferencia':
				$campo_dinamico = "<p class=MsoNormal style='margin-bottom:3.0pt;line-height:normal;tab-stops:108.75pt'><span style='font-size:10.0pt'>CLABE INTERBANCARIA ".$claveinterbancaria."<o:p></o:p></span></p>";
				$templade = str_replace("{campo_dinamico}",$campo_dinamico, $templade);
				$firma = "<img src='images/firma.fw.png' style='position:absolute;left:480px;top:450px'>";
				$templade = str_replace("{firma_cliente}",$firma, $templade);
				$firma_agente = "<img src='images/firma.fw.png' style='position:absolute;left:320px;top:905px'>";
				$templade = str_replace("{firma_agente}",$firma_agente, $templade);
				break;
			case 'tarjeta':
				$campo_dinamico = "<p class=MsoNormal style='margin-bottom:3.0pt;line-height:normal;tab-stops:108.75pt'><span style='font-size:10.0pt'>".utf8_decode("Número de tarjeta:  ".$numero_tarjeta)."<span style='mso-spacerun:yes'></span><span style='mso-spacerun:yes'></span>".utf8_decode("&nbsp;&nbsp;&nbsp;&nbsp;Fecha de expiración:  ".$fecha_expiracion)."<span style='mso-spacerun:yes'></span>&nbsp;&nbsp;&nbsp;&nbsp;Banco:  ".utf8_decode($banco)."<span style='mso-spacerun:yes'></span><o:p></o:p></span></p>";
				$templade = str_replace("{campo_dinamico}",$campo_dinamico, $templade);
				$firma = "<img src='images/firma.fw.png' style='position:absolute;left:480px;top:450px'>";
				$templade = str_replace("{firma_cliente}",$firma, $templade);
				$firma_agente = "<img src='images/firma.fw.png' style='position:absolute;left:320px;top:905px'>";
				$templade = str_replace("{firma_agente}",$firma_agente, $templade);
				break;
		}
		
		# code...
		break;
	case 'OXXO':
		$templade = str_replace("{TC}", "", $templade);
		$templade = str_replace("{TD}", "", $templade);
		$templade = str_replace("{OXXO}", "X", $templade);
		$templade = str_replace("{Nomina}", "", $templade);
		$templade = str_replace("{campo_dinamico}","", $templade);
		$firma = "<img src='images/firma.fw.png' style='position:absolute;left:480px;top:430px'>";
		$templade = str_replace("{firma_cliente}",$firma, $templade);
		$firma_agente = "<img src='images/firma.fw.png' style='position:absolute;left:320px;top:885px'>";
		$templade = str_replace("{firma_agente}",$firma_agente, $templade);
		break;
	case 'Nomina':
		$templade = str_replace("{TC}", "", $templade);
		$templade = str_replace("{TD}", "", $templade);
		$templade = str_replace("{OXXO}", "", $templade);
		$templade = str_replace("{Nomina}", "X", $templade);
		$campo_dinamico = "<p class=MsoNormal style='margin-bottom:3.0pt;line-height:normal;tab-stops:108.75pt'><span style='font-size:10.0pt'>NOMINA :  ".$txtNomina."<o:p></o:p></span></p>";
		$templade = str_replace("{campo_dinamico}",$campo_dinamico, $templade);
		$firma = "<img src='images/firma.fw.png' style='position:absolute;left:480px;top:450px'>";
		$templade = str_replace("{firma_cliente}",$firma, $templade);
		$firma_agente = "<img src='images/firma.fw.png' style='position:absolute;left:320px;top:905px'>";
		$templade = str_replace("{firma_agente}",$firma_agente, $templade);
		break;

}

$dompdf = new Dompdf();
$dompdf->loadHtml(utf8_encode($templade));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();



?>