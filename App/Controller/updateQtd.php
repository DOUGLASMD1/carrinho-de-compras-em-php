<?php
session_start();
include_once '../../DataBase/conexao.php';
include_once 'ClienteController.php';

$user = new ClienteController();

    $conexao = new Conexao();
    $conexao = $conexao->conexao();

    $stmt = $conexao->prepare('UPDATE carrinho_has_produto SET quantidade = :quantidade WHERE produto_idproduto = :idproduto ');
    $stmt->execute( array(
                    ':quantidade' => $_POST['id_quantidade'],
                    ':idproduto' => $_POST['idproduto']
                    )
                );
    $stmt = null;  


header('Location: ../../template_store/cart.php'); 

?>