<?php
// Le classe enderecoDao
class EnderecoDao {
	// irá receber uma conexão
	public $bancoDeDados = null;
	// construtor
	public function EnderecoDao() {
		// retorna a conexão com o banco de dados Utilizando o PDO
		include_once 'conexao.class.php';
		
		$this->bancoDeDados = new Conexao ();
	}
	
	/**
	 * Insere um endereço na base de dados
	 * 
	 * @param String $complemento
	 * @param String $logradouro
	 * @param String $codUsuario
	 * @param Integer $codCurso
	 * @param String $cep
	 * @param String $cidade
	 * @param String $estado
	 * @param Integer $numero
	 * @return Integer Código do endereço gerado
	 */
	
	public function insereEndereco($complemento, $logradouro, $codUsuario, $codCurso, $cep, $cidade, $estado, $numero) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "INSERT INTO Endereco ( 
															complemento
															, 	logradouro
															, 	codUsuario
															, 	codCurso
															, 	cep
															, 	cidade
															, 	estado
															, 	numero ) 
													VALUES ( 
															?
															, 	?
															, 	?
															, 	?
															, 	?
															, 	?
															, 	?
															, 	?)");
				
			$stmt->bindValue(1, $complemento);
			$stmt->bindValue(2, $logradouro);
			$stmt->bindValue(3, $codUsuario);
			$stmt->bindValue(4, $codCurso);
			$stmt->bindValue(5, $cep);
			$stmt->bindValue(6, $cidade);
			$stmt->bindValue(7, $estado);
			$stmt->bindValue(8, $numero);
			$stmt->execute();
			$codEndereco = $this->bancoDeDados->lastInsertId();
			$this->bancoDeDados = null;
				
			//Retorna o codEndereco gerado neste cadastro o/
			return $codEndereco;
			
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
}
?>