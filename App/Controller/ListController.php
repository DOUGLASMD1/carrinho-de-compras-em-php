<?php
include_once '../DataBase/conexao.php';

class ListController {

    public function selectList($dados) {
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare("SELECT finalizaCompra.carrinho_idcarrinho, carrinho.cliente_cpf FROM carrinho(cliente_cpf) VALUES(:cpfCliente);");
    }
}

/* SELECT finalizaCompra.carrinho_idcarrinho, carrinho.cliente_cpf, produto.idproduto
FROM ((carrinho_idcarrinho
INNER JOIN carrinho ON )
INNER JOIN produto ON );*/

?>