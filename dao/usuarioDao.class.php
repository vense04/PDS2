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
														,	U.validaCadastro
														,	U.nome
														,	U.tipoUsuario
														,	U.avatar
														,	U.ativo
													FROM Usuario U
													WHERE
														U.username = ?");
			$stmt->bindValue(1, $usuario);
			$stmt->execute();
			$this->bancoDeDados = null;
			return $stmt;
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
	/**
	 * Verifica existência de usuário já cadastrado
	 * @param String $usuario
	 * @return PDOStatement (Resultado da consulta)
	 */
	public function verificaUsuario($usuario) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "SELECT
														U.username
														,	U.cpfCnpj
													FROM Usuario U
													WHERE
														U.username = ?
													OR
														U.cpfCnpj = ?");
			$stmt->bindValue(1, $usuario);
			$stmt->bindValue(2, $usuario);
			$stmt->execute();
			$this->bancoDeDados = null;
			return $stmt;
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
	/**
	 * Atualiza o status de um determinado usuário, retorna 1 para true e 0 para false
	 * @param String $usuario (Username)
	 * @param Integer $ativo (1 ativo, 0 desativado)
	 * @return number (1 true ou sucesso, 0 false ou fracasso, usuário não encontrado etc...)
	 */
	public function statusUsuario($usuario, $ativo) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "UPDATE
													Usuario
													SET
														ativo = ?
													Where
														username = ?");
			$stmt->bindValue(1, $ativo);
			$stmt->bindValue(2, $usuario);
			$stmt->execute();
			$this->bancoDeDados = null;
			return $stmt->rowCount();
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}

	/**
	 * Cadastra de um novo usuário
	 * @param String $nome
	 * @param String $senha
	 * @param String $validaCadastro
	 * @param String $username
	 * @param Integer $tipoUsuario
	 * @param String $avatar
	 * @return Integer (codUsuario)
	 */
	public function registro($nome, $senha, $validaCadastro, $username, $tipoUsuario, $avatar) {
		try {
				
			$stmt = $this->bancoDeDados->prepare( "INSERT INTO Usuario (
														avatar
														,	senha
														,	validaCadastro
														,	username
														,	nome
														, 	tipoUsuario
													) values (
														?
														,	?
														,	?
														,	?
														,	?
														,	?)");
			$stmt->bindValue(1, $avatar);
			$stmt->bindValue(2, $senha);
			$stmt->bindValue(3, $validaCadastro);
			$stmt->bindValue(4, $username);
			$stmt->bindValue(5, $nome);
			$stmt->bindValue(6, $tipoUsuario);
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