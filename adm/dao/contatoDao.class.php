<?php
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
	 * @param $email
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
}
?>