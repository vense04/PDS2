<?php
// Le classe materiaisDao
class MateriaisDao {
	// irá receber uma conexão
	public $bancoDeDados = null;
	// construtor
	public function MateriaisDao() {
		// retorna a conexão com o banco de dados Utilizando o PDO
		include_once 'conexao.class.php';
		
		$this->bancoDeDados = new Conexao ();
	}
	
	/**
	 * Insere o material upado na base de dados para consulta
	 * 
	 * @param String $url
	 * @param Integer $codCurso
	 * @return Integer codMaterial
	 */
	
	public function insereMaterial($url, $codCurso) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "INSERT INTO Materiais ( 
															url
															, 	codCUrso ) 
													VALUES ( 
															?
															, 	?)");
				
			$stmt->bindValue(1, $url);
			$stmt->bindValue(2, $codCurso);
			$stmt->execute();
			$codMaterial = $this->bancoDeDados->lastInsertId();
			$this->bancoDeDados = null;
				
			//Retorna o codMaterial gerado neste cadastro o/
			return $codMaterial;
			
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
}
?>