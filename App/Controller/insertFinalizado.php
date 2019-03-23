<?php
	session_start();
	include_once '../../DataBase/conexao.php';
	include_once 'ClienteController.php';
		
	$cpf = $_SESSION["user_cpf"];
	$municipio = $_POST['id_cidade'];
	$status = 'CL';

	$conn = new Conexao();
	$conn = $conn->conexao();
	$stmt0 = $conn->prepare('SELECT carrinho.idcarrinho FROM carrinho WHERE carrinho.cliente_cpf = "'.$_SESSION["user_cpf"].'"');
	$stmt0->execute();
	$result = $stmt0->fetch();
	$stmt0 = null;

	$stmt2 = $conn->prepare('INSERT INTO finalizacompra(carrinho_idcarrinho, status, municipio_Id
	) VALUES(:carrinho_idcarrinho, :status, :municipio_Id);');
	$stmt2->bindParam(':carrinho_idcarrinho', $result[0]);
	$stmt2->bindParam(':status', $status);
	$stmt2->bindParam(':municipio_Id', $municipio);
	$stmt2->execute();
	$stmt2 = null;

	$stmt = $conn->prepare('SELECT produto.nome, produto.valor, produto.imagem, carrinho_has_produto.quantidade
        FROM finalizacompra 
        INNER JOIN carrinho ON carrinho.idcarrinho = finalizacompra.carrinho_idcarrinho 
        INNER JOIN carrinho_has_produto ON carrinho.idcarrinho = carrinho_has_produto.carrinho_idcarrinho 
        INNER JOIN produto ON produto.idproduto = carrinho_has_produto.produto_idproduto 
        WHERE carrinho.cliente_cpf = "'.$_SESSION["user_cpf"].'" AND finalizaCompra.status = "CL";');
    $stmt->execute();
    $pCarrinho = $stmt->fetchAll();
	$stmt = null;

	foreach($pCarrinho as $row){
	$stmt1 = $conn->prepare('INSERT INTO pedidoconcluido(cliente_cpf, nomeProduto, valorProduto,
	imagemProduto, qtdProduto) VALUES(:cliente_cpf, :nomeProduto, :valorProduto, :imagemProduto, :qtdProduto);');
	    $stmt1->execute( array(
			    	':cliente_cpf' => $_SESSION["user_cpf"],
			    	':nomeProduto' => $row[0],
				    ':valorProduto' => $row[1],
				    ':imagemProduto' => $row[2],
				    ':qtdProduto' => $row[3]
		    	)
			);	
	}
    $stmt1 = null;

    $stmt3 = $conn->prepare('DELETE FROM carrinho_has_produto WHERE carrinho_idcarrinho = :carrinho_idproduto');
    $stmt3->bindParam(':carrinho_idproduto', $result[0]);
    $stmt3->execute();
    $stmt3 = null;
	
	$stmt5 = $conn->prepare('DELETE FROM finalizacompra WHERE finalizacompra.carrinho_idcarrinho = :carrinho_idcarrinho');
    $stmt5->bindParam(':carrinho_idcarrinho', $result[0]);
    $stmt5->execute();
    $stmt5 = null;

    header('Location: ../../template_store/order-complete.php?enviar="'.$_POST["enviar"].'"'); 
?>