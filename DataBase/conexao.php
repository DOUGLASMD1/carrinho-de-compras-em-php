<?php
	
	class Conexao{

	    private $usuario = 'root';
	    private $senha = '';

	    /**
	 	* Conecta com o MySQL usando PDO
	 	*/
		public function conexao(){
	    	return new PDO('mysql:host=localhost;dbname=carrinhoCompras; charset=utf8', $this->usuario, $this->senha);
		}

		/**
		 * Cria o hash da senha, usando MD5 e SHA-1
		 */
		public function make_hash($str){
		    return sha1(md5($str));
		}	 
	 
		/**
		 * Verifica se o usuário está logado
		 */
		public function isLoggedIn(){
		    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
		        return false;
		    }
		    return true;
		}
	}   
?>