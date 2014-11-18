<?php
//ela herdará os métodos e atributos do PDO através da palavra-chave extends
class Conexao extends PDO {
	//criando a conexão com o banco de dados no localhost(127.0.0.1) e falando o nome do banco, no nosso caso "oo"
	
	private $dsn = "mysql:host=localhost;dbname=certificados;charset=utf8;SET character_set_results = utf8, character_set_client = utf8, character_set_connection = utf8, character_set_database = utf8, character_set_server = utf8";
	private $user = "root";
	private $password = "root";
		
	public $handle = null;

	function __construct() {
		try {
			//aqui ela retornará o PDO em si, veja que usamos parent::_construct()
			if ( $this->handle == null ) {
				
				$dbh = parent::__construct( $this->dsn , $this->user , $this->password );				
				$this->handle = $dbh;
				return $this->handle;
			}
		}
		catch ( PDOException $e ) {
			echo "Conexão falhou. Erro: " . $e->getMessage( );
			return false;
		}
	}
	//aqui criamos um objeto de fechamento da conexão
	function __destruct( ) {
		$this->handle = NULL;
	}
}
?>