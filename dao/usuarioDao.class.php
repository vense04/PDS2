<?php
class UsuarioDao {
	// irá receber uma conexão
	public $bancoDeDados = null;
	// construtor
	public function UsuarioDao() {
		// retorna a conexão com o banco de dados Utilizando o PDO
		include 'dao/conexao.class.php';
		
		$this->bancoDeDados = new Conexao ();
	}
	
	// Retorna uma lista com todos os usuários do sistema
	public function getUsuarios() {
		try {
			
			$stmt = $this->bancoDeDados->query ( "SELECT
										*
									FROM tab_usuario" );
			$this->bancoDeDados = null;
			return $stmt;
		} catch ( PDOException $ex ) {
			echo "Erro: " . $ex->getMessage ();
		}
	}
	
	// Busca dados para o login
	public function getLogin($usuario) {
		try {
			
			$stmt = $this->bancoDeDados->prepare( "SELECT
														U.codUsuario
														,	U.nomUsuario
														,	U.senha
														,	U.ativo
														,	U.imagem
														,	P.nomPessoa
														,	P.codPessoa
														,	(SELECT 
																GROUP_CONCAT(A.nomArea) 
															FROM tab_area A 
															WHERE 
																A.codArea IN (	SELECT 
																					UA.codArea 
																				FROM tab_usuario_acesso UA 
																				WHERE 
																					UA.codUsuario = U.codUsuario)) AS acesso
													FROM tab_usuario U
													INNER JOIN tab_pessoa P ON
														P.codPessoa = U.codPessoa
													WHERE
														U.nomUsuario = ?");
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