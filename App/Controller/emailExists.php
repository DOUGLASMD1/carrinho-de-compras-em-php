
<?php
	
	include_once 'addCliente.php';

	if(isset($_POST['email'])){ 
	 
	    $email = $_POST['email'];
	 	
	 	$conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare('SELECT * FROM cliente WHERE email = "'.$email.'"');
        $stmt->execute();
		$count = $stmt->rowCount();
	    if($count > 0){
	        echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../template_store/cadastro.php'>
				<script type=\"text/javascript\">
					alert(\"Email já existente, por favor digite outro!\");
				</script>
				";
	    }else{
	    	addCliente($_POST);
	    }
	}
?>