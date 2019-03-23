<?php
session_start();
include_once '../../DataBase/conexao.php';
include_once 'ClienteController.php';

$user = new ClienteController();
$result = $user->isLoggedIn();

if($result == true){
    $produto = $_GET['produto'];
    $conexao = new Conexao();
    $conexao = $conexao->conexao();
    $stmt = $conexao->prepare('SELECT idcarrinho FROM carrinho WHERE carrinho.cliente_cpf ="'.$_SESSION["user_cpf"].'";');
    $stmt->execute();
    $resultado = $stmt->fetch();
    $qts = 1;
    if($resultado == true){
        $stmt = $conexao->prepare("INSERT INTO carrinho_has_produto(carrinho_idcarrinho, produto_idproduto, quantidade) VALUES(:carrinho, :produto, :quantidade);");
        $stmt->bindParam(':carrinho', $resultado[0]);
        $stmt->bindParam(':produto', $produto);
        $stmt->bindParam(':quantidade', $qts);
        $stmt->execute();
        $stmt = null;    
    }else{
        $stmt = $conexao->prepare("INSERT INTO carrinho(cliente_cpf) VALUES(:cpfCliente);");
        $stmt->bindParam(':cpfCliente', $_SESSION['user_cpf']);
        $stmt->execute();
        $carrinhoId = $conexao->lastInsertId();

        $stmt = $conexao->prepare("INSERT INTO carrinho_has_produto(carrinho_idcarrinho, produto_idproduto, quantidade) VALUES(:carrinho, :produto, :equantidade);");
        $stmt->bindParam(':carrinho', $carrinhoId);
        $stmt->bindParam(':produto', $produto);
        $stmt->bindParam(':equantidade', $qts);
        $stmt->execute();
        $stmt = null;  
    }
    header('Location: ../../template_store/shop.php'); 
}else{
    header('Location: ../../template_store/login.php'); 
}


?>