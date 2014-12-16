<?php
require_once ("dompdf/dompdf_config.inc.php");
date_default_timezone_set ( 'America/Sao_Paulo' );

if (isset ( $_POST ["certificado"] )) {
	$certifica = $_POST ["certificado"];
	
	$json = json_decode ( $certifica, true );
	
	$nome = $json ["nome"];
	$cod = $json ["cod"];
	$curso = $json ["curso"];
	$cargah = $json ["cargah"];
	$dataini = $json ["dataini"];
	$datafim = $json ["datafim"];
	
	
	
	$html = "<html><body>";
	$html .= '
	<h1>Certificado do Curso !!!</h1>
	<img src="img/logo.png"/>
	<hr>
			
	Declaramos que ' . $nome . 'ministrou a oficina no ' . $curso . ' , realizado pelo Núcleo de Assuntos Estudantis - 
			NAE do Centro Municipal de Estudos e Projetos Educacionais Julieta Diniz, no dia 13 de novembro de 2014, 
			com carga horária de ' . $cargah . '.
			
			
			
	<table width="200" border="2" cellpadding="5" cellspacing="5">
	<tr>
		<td>ID</td>
		<td>Logo</td>
		<td>Nome</td>
		<td>data</td>
	</tr>
';
	$data = date ( "d/m/Y" );
	for($i = 0; $i < 7; $i ++) {
		$html .= "
		<tr>
			<td>" . $i . "</td>
			<td>CURSO PDS2</td>
			<td> Cleber</td>
			<td>" . $data . "</td>
		
		</tr>
	";
	}
	$html .= "</table></body></html>";
	$hmtl = utf8_decode ( $html );
	$dompdf = new DOMPDF ();
	$dompdf->set_paper("legal","landscape");
	$dompdf->load_html ( $hmtl );
	$dompdf->render ();
	$pdf = $dompdf->output ();

	$caminho = "../ws/pdf/" . $cod . $nome.".pdf";
// 	$criapdf = ;
	if (file_put_contents ( $caminho, $pdf )) {
		echo $caminho;
 	} else {
 		echo "erro";
	}
}

?>