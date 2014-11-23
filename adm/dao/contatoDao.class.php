<?php
// Le classe contatoDao
class ContatoDao {
	// irá receber uma conexão
	public $bancoDeDados = null;
	// construtor
	public function ContatoDao() {
		// retorna a conexão com o banco de dados Utilizando o PDO
		include_once 'conexao.class.php';
		
		$this->bancoDeDados = new Conexao ();
	}
	
	/**
	 * Verifica E-mail
	 * @param String $email
	 * @return PDOStatement (Resultado da consulta)
	 */
public function verificaEmail($email) {
		try {
			
			$stmt = $this->bancoDeDados->prepare( "SELECT
														C.codContato
													FROM Contato C
													WHERE
														C.desContato = ?");
			
			$stmt->bindValue(1, $email);
			$stmt->execute();
			$this->bancoDeDados = null;
			return $stmt;
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
	/**
	 * Insere contato
	 * @param String $contato
	 * @param Integer $tipoContato
	 * @param Integer $codUsuario
	 * @return Integer codContato
	 */
	public function insereContato($contato, $tipoContato, $codUsuario) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "INSERT INTO Contato ( 
														codTipoContato
														,	codUsuario
														,	desContato) 
													VALUES ( 
														?
														,	?
														,	?)");
				
			$stmt->bindValue(1, $tipoContato);
			$stmt->bindValue(2, $codUsuario);
			$stmt->bindValue(3, $contato);
			$stmt->execute();
			$codContato = $this->bancoDeDados->lastInsertId();
			$this->bancoDeDados = null;
				
			//Retorna o codContato gerado neste cadastro o/
			return $codContato;
			
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
}
?>