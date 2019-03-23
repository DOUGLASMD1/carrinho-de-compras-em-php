<?php
	session_start();
	include_once '../../DataBase/conexao.php';
	include_once 'ClienteController.php';
		
	$cpf = $_SESSION["user_cpf"];
	$municipio = $_POST['id_cidade'];
	$status = 'AB';
	$conn = new Conexao();
	$conn = $conn->conexao();
	$stmt = $conn->prepare('
	SELECT gerou.carrinho_idcarrinho, produto.idproduto FROM produto 
	INNER JOIN
		(SELECT carrinho_has_produto.produto_idproduto, carrinho_has_produto.quantidade, carrinho_has_produto.carrinho_idcarrinho FROM carrinho_has_produto
			INNER JOIN produto ON carrinho_has_produto.produto_idproduto = produto.idproduto
			INNER JOIN carrinho ON carrinho_has_produto.carrinho_idcarrinho = carrinho.idcarrinho 
		    WHERE carrinho.cliente_cpf = "'.$cpf.'"
		GROUP BY carrinho_has_produto.produto_idproduto) as gerou 

	ON produto.idproduto = gerou.produto_idproduto
    GROUP BY produto.nome;');

	$total = 0;
	$stmt->execute();
	$resultado_carrinho = $stmt->fetch();
	$stmt = null
	$stmt2 = $conn->prepare('INSERT INTO finalizacompra(carrinho_idcarrinho, status, municipio_Id
) VALUES(:carrinho_idcarrinho, :status, :municipio_Id);');

    $stmt2->bindParam(':carrinho_idcarrinho', $resultado_carrinho[0]);
    $stmt2->bindParam(':status', $status);
    $stmt2->bindParam(':municipio_Id', $municipio);
    $stmt2->execute();
    $stmt2 = null;
    $stmt3 = $conn->prepare('DELETE FROM carrinho_has_produto WHERE carrinho_idcarrinho = :carrinho_idproduto');
    $stmt3->execute( array(
                    ':carrinho_idproduto' => $resultado_carrinho[0])
                );
    $stmt3 = null;
    header('Location: ../../template_store/order-complete.php'); 
?>