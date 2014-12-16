<?php 
	class Upload{ 

		// Função que irá fazer o upload da imagem 
		public function salvar($caminho, $file){ 
			// Retiramos acentos, espaços e hífens do nome da imagem 
// 			$file['name'] = $this->tirarAcento(($file['name']));
 
			$value = explode(".", $file['name']);
			$extension = strtolower(array_pop($value));   //Line 32
			// the file name is before the last "."
			$file['name'] = date("YmdHisu") . "." . $extension;  //Line 34
			
			
			// Atribuímos caminho e nome da imagem a uma variável apenas 
			$uploadfile = $caminho.$file['name'];

			// Guardamos na variável tipo o formato do arquivo enviado
			$tipo = strtolower($extension);
			
			if (!move_uploaded_file($file['tmp_name'], $uploadfile)) { 
				switch($file['error']){ 
					case 1: 
						$mensagem = "<font color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</font>"; 
						break; 
					case 2: 
						$mensagem = "<font color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</font>"; 
						break; 
					case 3: 
						$mensagem = "<font color='#F00'>O upload do arquivo foi feito parcialmente.</font>"; 
						break;
					case 4: 
						$mensagem = "<font color='#F00'>Não foi feito o upload de arquivo.</font>"; 
						break; 
				} // -> fim switch // Se a imagem temporária for movida } /* -> fim if */ 
			}	
			 // -> fim else 
				// Retornamos a mensagem com o erro ou sucesso 
				return $uploadfile; 
			} // -> fim function salvar() } // -> fim classe 
			
		}
		
?>

<!-- Leia mais em: Upload de imagens com redimensionamento em PHP http://www.devmedia.com.br/upload-de-imagens-com-redimensionamento-em-php/26005#ixzz3JkDtwWj1 -->