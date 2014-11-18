<?php
class UsuarioDao {
	// irá receber uma conexão
	public $bancoDeDados = null;
	// construtor
	public function UsuarioDao() {
		// retorna a conexão com o banco de dados Utilizando o PDO
		include_once 'dao/conexao.class.php';
		
		$this->bancoDeDados = new Conexao ();
	}
	
	/**
	 * Busca dados para validar o login
	 * ativo = 1 (somente os Válidos)
	 * @param $usuario
	 * @return PDOStatement (Resultado da consulta)
	 */
	public function getLogin($usuario) {
		try {
			
			$stmt = $this->bancoDeDados->prepare( "SELECT
														U.codUsuario
														,	U.username
														,	U.senha
														,	U.nome
														,	U.tipoUsuario
														,	U.avatar
													FROM Usuario U
													WHERE
														U.username = ?
													AND
														U.ativo = 1");
			$stmt->bindValue(1, $usuario);
			$stmt->execute();
			$this->bancoDeDados = null;
			return $stmt;
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
}
?>