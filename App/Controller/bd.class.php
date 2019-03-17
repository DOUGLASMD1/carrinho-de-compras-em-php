<?php

class bd{

	//host
	private $host = 'localhost';

	//usuario
	private $usuario = 'carrinhoCompras';

	//senha
	private $senha = '';

	//banco de dados
	private $bd = '';

	private $conn=NULL;


	public function conecta_mysql(){

		//cria conexao
		$this->conn = mysqli_connect($this->host, $this->usuario, $this->senha, $this->bd);

		//ajusta charset de comunicação entre aplicação e bd
		mysqli_set_charset($this->conn, 'utf8');

		//verificar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySQL: ' .mysqli_connect_error();
		}

		return $this->conn;
	}

	function __construct()
	{
		$this->conecta_mysql();
	}

	public function exec($query,$type,$param){
		$stmt=$this->conn->prepare($query);
		$stmt->bind_param($type,...$param);
		$stmt->execute();
		return $stmt->get_result();
	}

	public function desconecta_mysql(){
		mysqli_close($this->conn);
	}

	function __destruct(){
		$this->desconecta_mysql();
	}

}

?>
