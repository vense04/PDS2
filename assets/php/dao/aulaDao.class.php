<?php
// Le classe aulaDao
class AulaDao {
	// irá receber uma conexão
	public $bancoDeDados = null;
	// construtor
	public function AulaDao() {
		// retorna a conexão com o banco de dados Utilizando o PDO
		include_once 'conexao.class.php';
		
		$this->bancoDeDados = new Conexao ();
	}
	
	/**
	 * Insere um dia de aula na base de dados
	 * 
	 * @param Date $dia
	 * @param Integer $codCurso
	 * @return Integer codAula
	 */
	
	public function insereAula($dia, $codCurso) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "INSERT INTO Aula ( 
															dia
															, 	codCurso ) 
													VALUES ( 
															?
															, 	?)");
				
			$stmt->bindValue(1, $dia);
			$stmt->bindValue(2, $codCurso);
			$stmt->execute();
			$codAula = $this->bancoDeDados->lastInsertId();
			$this->bancoDeDados = null;
				
			//Retorna o codAula gerado neste cadastro o/
			return $codAula;
			
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
}
?>