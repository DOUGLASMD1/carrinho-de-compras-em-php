
<?php
	
	include_once 'addCliente.php';

	if(isset($_POST['email']) and isset($_POST['cpf'])){ 
	 
	    $email = $_POST['email'];
	 	$cpf = $_POST['cpf'];

	 	$conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare('SELECT * FROM cliente WHERE email = "'.$email.'"');
        $stmt->execute();
		
		$stmt2 = $conexao->prepare('SELECT * FROM cliente WHERE cpf = "'.$cpf.'"');
        $stmt2->execute();
       
        $count2 = $stmt2->rowCount();
		$count = $stmt->rowCount();
		
	    if($count > 0){
	        echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../template_store/cadastro.php'>
				<script type=\"text/javascript\">
					alert(\"Email já existente, por favor digite outro!\");
				</script>
				";
	    }else if( $count2 > 0){
	        echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../template_store/cadastro.php'>
				<script type=\"text/javascript\">
					alert(\"Cpf já existente, por favor digite outro!\");
				</script>
				";
		}else{
	    	addCliente($_POST);
	    }
	}
?>