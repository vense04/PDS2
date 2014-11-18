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
	
	// Busca dados para o login
	public function getLogin($usuario) {
		try {
			
			$stmt = $this->bancoDeDados->prepare( "SELECT
														U.codUsuario
														,	U.username
														,	U.senha
														,	U.ativo
														,	U.nome
														,	P.tipoUsuario
														,	P.avatar
													FROM tab_usuario U
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
}
?>