<?php
// Segurança do sistema
include_once '../include/seguranca.php';

// Houve uma requisição post
if (!empty($_POST)) {
	//Instanciando dados do formulários
	$codUsuario = (isSet($_POST["cod"])) ? diferenteVazio($_POST["cod"]) : false;
	
	//Valida os campos e cadastra o caboclo caso esteja tudo oks
	if ($codUsuario) {
		include_once '../dao/matriculaDao.class.php';
		$cursoDao = new CursoDao();
		$codCurso = $cursoDao->insereCurso($descricao, $minimoCertificado, $avatar, $codUsuario, $tema, $nome, converteData($dataInicio), $cargaHoraria, converteData($dataFim), converteData($periodo[0]), converteData($periodo[1]));
		
		
	}
	
	
}

/**
 * Verifica se o campo informado não é vazio, retorna false se vazio e o campo caso != de vazio o/
 * @param String $campo
 * @return Ambigous <String, boolean>
 */
function diferenteVazio($campo) {
	return ($campo != "") ? $campo : false;
}

/**
 * Recebe a imagem do usuário, realiza o upload e retorna o caminha da mesma no servidor
 * @param String $avatar
 * @return string
 */
function uploadAvatar($avatar) {
		// Incluímos o arquivo com a classe 
		include_once '../util/classupload.php'; 
		// Associamos a classe à variável $upload 
		$upload = new UploadImagem(); 
		// Determinamos nossa largura máxima permitida para a imagem 
		$upload->width = 250; 
		// Determinamos nossa altura máxima permitida para a imagem 
		$upload->height = 250; 
		// Exibimos a mensagem com sucesso ou erro retornada pela função salvar. 
		//Se for sucesso, a mensagem também é um link para a imagem enviada. 
		return $upload->salvar("../../avatar/", $avatar); 
}

/**
 * Recebe os arquivos submetidos no formulário e os salva no servidor
 * 
 * @param File $arquivo
 * @param String $nomeCurso
 * @return string
 */
function uploadArquivoCurso($arquivo, $nomeCurso) {
	// Incluímos o arquivo com a classe
	include_once '../util/classupload.php';
	// Associamos a classe à variável $upload
	$upload = new UploadImagem();
	// Determinamos nossa largura máxima permitida para a imagem
	$upload->width = 250;
	// Determinamos nossa altura máxima permitida para a imagem
	$upload->height = 250;
	// Exibimos a mensagem com sucesso ou erro retornada pela função salvar.
	//Se for sucesso, a mensagem também é um link para a imagem enviada.
	return $upload->salvar("../../" + $nomeCurso + "/", $arquivo);
}

/**
 * Converte o formato da data para o do MySql
 * 
 * @param date Formato Pt-Br 01/01/2012
 * @return Formato Mysql 2012-01-01
 */
function converteData($data) {
	return date('Y-m-d', strtotime(str_replace('/', '-', $data)));
}

?>