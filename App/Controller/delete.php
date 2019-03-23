<?php

	session_start();
	include_once '../../DataBase/conexao.php';
	include_once 'ClienteController.php';

	$user = new ClienteController();

    $conexao = new Conexao();
    $conexao = $conexao->conexao();

    $stmt = $conexao->prepare('DELETE FROM carrinho_has_produto WHERE produto_idproduto = :idproduto ');
    $stmt->execute( array(
                    ':idproduto' => $_GET['produto']
                    )
                );
    $stmt = null;  


header('Location: ../../template_store/cart.php'); 

?>