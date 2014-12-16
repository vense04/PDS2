<?php
// Le classe cursoDao
class MatriculaDao {
	// irá receber uma conexão
	public $bancoDeDados = null;
	// construtor
	public function MatriculaDao() {
		// retorna a conexão com o banco de dados Utilizando o PDO
		include_once 'conexao.class.php';
		
		$this->bancoDeDados = new Conexao ();
	}
	
	/**
	 * Matricula aluno no curso na base de dados
	 * 
	 * @param Integer $cod
	 * @param Integer $codCurso
	 * @param String $data
	 * 
	 */
	
	public function matriculaCurso($cod,$codCurso,$data) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "INSERT INTO Matricula ( 
															 codAluno,codCurso,matriculado) 
													VALUES ( 
															?
															, 	?
															, 	?
															, 	?
															)");
				
			$stmt->bindValue(1, $cod);
			$stmt->bindValue(2, $codCurso);
			$stmt->bindValue(3, $data);
		
			$stmt->execute();
			$this->bancoDeDados = null;
				
			//Retorna o codCurso gerado neste cadastro o/
			return $stmt;
			
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
	
}
?>