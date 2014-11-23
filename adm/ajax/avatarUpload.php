<?php 
	if(!empty($_FILES["avatar"])){ 
		// Se o array $_FILES não estiver vazio 
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
		echo $upload->salvar("../img/", $_FILES['avatar']); 
	} 
	else {
		print "Nenhum arquivo escolhido my friend.";
	}
?>