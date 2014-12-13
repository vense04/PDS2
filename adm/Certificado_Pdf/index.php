<?php

require_once ("dompdf/dompdf_config.inc.php");
date_default_timezone_set('America/Sao_Paulo');
$html="<html><body>";
$html.='
	<h1>Certificado do Curso !!!</h1>
	<img src="http://localhost/PDS2/adm/Certificado_Pdf/img/logo.png"/>	
	<hr>	
	<table width="200" border="2" cellpadding="5" cellspacing="5">	
	<tr>
		<td>ID</td>
		<td>Logo</td>
		<td>Nome</td>
		<td>data</td>
	</tr>	
';
$data=date("d/m/Y");
for ($i = 0; $i < 10; $i++) {
	$html.="
		<tr>
			<td>".$i."</td>
			<td>CURSO PDS2</td>	
			<td> Cleber</td>
			<td>".$data."</td>
			
		</tr>
	";
}
$html.="</table></body></html>";
$hmtl=utf8_decode($html);
$dompdf=new DOMPDF();
$dompdf->load_html($hmtl);
$dompdf->render();
$dompdf->stream("certificadoCurso.pdf");

//Essa biblioteca esta diponível em:
?>