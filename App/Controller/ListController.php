<?php
/**
 * Este arquivo retorna todos os pedidos concluidos do cliente.
 */
include_once '../DataBase/conexao.php';

class ListController {

    public static function selectList() {
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare('SELECT pedidoConcluido.nomeProduto, pedidoConcluido.valorProduto, pedidoConcluido.imagemProduto, pedidoConcluido.qtdProduto
        FROM pedidoConcluido 
        WHERE pedidoConcluido.cliente_cpf = "'.$_SESSION["user_cpf"].'";');
        $stmt->execute();
        $pCarrinho = $stmt->fetchAll();
        $stmt = null;
        return $pCarrinho;
    }
}

/*SELECT produto.nome, produto.valor FROM finalizacompra INNER JOIN carrinho ON carrinho.idcarrinho = finalizacompra.carrinho_idcarrinho INNER JOIN carrinho_has_produto ON carrinho.idcarrinho = carrinho_has_produto.carrinho_idcarrinho INNER JOIN produto ON produto.idproduto = carrinho_has_produto.produto_idproduto WHERE carrinho.cliente_cpf = "000000";*/

?>