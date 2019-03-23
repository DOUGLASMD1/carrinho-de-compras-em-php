<?php
include_once '../DataBase/conexao.php';

class ListController {

    public static function selectList() {
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare('SELECT produto.nome, produto.valor, produto.imagem, carrinho_has_produto.quantidade
        FROM finalizacompra 
        INNER JOIN carrinho ON carrinho.idcarrinho = finalizacompra.carrinho_idcarrinho 
        INNER JOIN carrinho_has_produto ON carrinho.idcarrinho = carrinho_has_produto.carrinho_idcarrinho 
        INNER JOIN produto ON produto.idproduto = carrinho_has_produto.produto_idproduto 
        WHERE carrinho.cliente_cpf ='.$_SESSION["user_cpf"].' AND finalizaCompra.status = "CL";');
        $stmt->execute();
        $pCarrinho = $stmt->fetchAll();
        $stmt = null;
        return $pCarrinho;
    }
}

/*SELECT produto.nome, produto.valor FROM finalizacompra INNER JOIN carrinho ON carrinho.idcarrinho = finalizacompra.carrinho_idcarrinho INNER JOIN carrinho_has_produto ON carrinho.idcarrinho = carrinho_has_produto.carrinho_idcarrinho INNER JOIN produto ON produto.idproduto = carrinho_has_produto.produto_idproduto WHERE carrinho.cliente_cpf = "000000";*/

?>