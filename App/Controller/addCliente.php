	<?php

		include_once '../../DataBase/conexao.php';
		include_once 'ClienteController.php';
		
		$cliente = new ClienteController();
		$result = $cliente->cadastrarCliente($_POST);

		if ($result){
    		header('Location: ../../template_store/index.php');
		}else{
    		echo "Erro ao cadastrar";
    		$result->errorInfo();
		}
	?>