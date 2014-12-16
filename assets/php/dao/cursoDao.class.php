<?php
// Le classe cursoDao
class CursoDao {
	// irá receber uma conexão
	public $bancoDeDados = null;
	// construtor
	public function CursoDao() {
		// retorna a conexão com o banco de dados Utilizando o PDO
		include_once 'conexao.class.php';
		
		$this->bancoDeDados = new Conexao ();
	}
	
	/**
	 * Cadastra um novo curso na base de dados
	 * 
	 * @param Text $detalhes
	 * @param Integer $minimoCertificado
	 * @param String $avatar
	 * @param Integer $codMinistrante ($codUsuario)
	 * @param String $tema
	 * @param String $nome
	 * @param Date $inicio
	 * @param Integer $cargaHoraria
	 * @param Date $fim
	 * @return Integer codCurso
	 */
	
	public function insereCurso($detalhes, $minimoCertificado, $avatar, $codMinistrante, $tema, $nome, $inicio, $cargaHoraria, $fim, $inscricaoInicio, $inscricaoFim) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "INSERT INTO Curso ( 
															detalhes
															, 	minimoCertificado
															, 	avatar
															, 	codMinistrante
															, 	tema
															, 	nome
															, 	inicio
															, 	cargaHoraria
															, 	fim
															,	inscricaoInicio
															,	inscricaoFim ) 
													VALUES ( 
															?
															, 	?
															, 	?
															, 	?
															, 	?
															, 	?
															, 	?
															, 	?
															, 	?
															,	?
															,	?)");
				
			$stmt->bindValue(1, $detalhes);
			$stmt->bindValue(2, $minimoCertificado);
			$stmt->bindValue(3, $avatar);
			$stmt->bindValue(4, $codMinistrante);
			$stmt->bindValue(5, $tema);
			$stmt->bindValue(6, $nome);
			$stmt->bindValue(7, $inicio);
			$stmt->bindValue(8, $cargaHoraria);
			$stmt->bindValue(9, $fim);
			$stmt->bindValue(10, $inscricaoInicio);
			$stmt->bindValue(11, $inscricaoFim);
			$stmt->execute();
			$codCurso = $this->bancoDeDados->lastInsertId();
			$this->bancoDeDados = null;
				
			//Retorna o codCurso gerado neste cadastro o/
			return $codCurso;
			
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
	/**
	 * Lista todos os dados dos cursos
	 * 
	 * @return ResultSet da consulta
	 */
	
	public function selecionaCursos() {
		try {
	
			$stmt = $this->bancoDeDados->prepare( "SELECT
													C.avatar
													,	C.cargaHoraria
													,	C.codCurso
													,	C.codMinistrante
													,	C.detalhes
													,	C.fim
													,	C.inicio
													,	C.inscricaoFim
													,	C.inscricaoInicio
													,	C.minimoCertificado
													,	C.nome
													,	C.tema
													,	U.nome AS Ministrante
												FROM Curso C
												INNER JOIN Usuario U ON
													C.codMinistrante = U.codUsuario");
	
			$stmt->execute();
			$this->bancoDeDados = null;
	
			//Retorna o resultset o/
			return $stmt;
				
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
	/**
	 * Retorna um ResultSet com os dados do curso selecionado
	 * 
	 * @param Integer $codCurso
	 * @return ResultSet da consulta
	 */
	
	public function selecionaCurso($codCurso) {
		try {
	
			$stmt = $this->bancoDeDados->prepare( "SELECT
													C.avatar
													,	C.cargaHoraria
													,	C.codCurso
													,	C.codMinistrante
													,	C.detalhes
													,	C.fim
													,	C.inicio
													,	C.inscricaoFim
													,	C.inscricaoInicio
													,	C.minimoCertificado
													,	C.nome
													,	C.tema
													,	U.nome AS Ministrante
												FROM Curso C
												INNER JOIN Usuario U ON
													C.codMinistrante = U.codUsuario
												WHERE
													C.codCurso = ?");
			$stmt->bindValue(1, $codCurso);
			$stmt->execute();
			$this->bancoDeDados = null;
	
			//Retorna o resultset o/
			return $stmt;
	
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
}
?>