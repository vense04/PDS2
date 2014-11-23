<?php
// Le classe UsuarioDao
class UsuarioDao {
	// irá receber uma conexão
	public $bancoDeDados = null;
	// construtor
	public function UsuarioDao() {
		// retorna a conexão com o banco de dados Utilizando o PDO
		include_once 'conexao.class.php';
		
		$this->bancoDeDados = new Conexao ();
	}
	
	/**
	 * Busca dados para validar o login
	 * ativo = 1 (somente os Válidos)
	 * @param String $usuario
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

	/**
	 * Cadastra de um novo usuário
	 * @param String $nome
	 * @param String $senha
	 * @param String $username
	 * @param Integer $tipoUsuario
	 * @param String $avatar
	 * @return Integer (codUsuario)
	 */
	public function registro($nome, $senha, $username, $tipoUsuario, $avatar) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "INSERT INTO Usuario (
														avatar
														,	senha
														,	username
														,	nome
														, 	tipoUsuario
													) values (
														?
														,	?
														,	?
														,	?
														,	?)");
			$stmt->bindValue(1, $avatar);
			$stmt->bindValue(2, $senha);
			$stmt->bindValue(3, $username);
			$stmt->bindValue(4, $nome);
			$stmt->bindValue(5, $tipoUsuario);
			$stmt->execute();
			$codUsuario = $this->bancoDeDados->lastInsertId();
			$this->bancoDeDados = null;
			
			//Retorna o codUsuário gerado neste cadastro o/
			return $codUsuario;
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
}
?>