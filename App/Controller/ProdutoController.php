<?php

class ProdutoController {

    public function allProdutos(){
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare("SELECT * FROM produto;");
        $stmt->execute();
        $produtos = $stmt->fetchAll();
        $stmt = null;
        return $produtos;
    }
}

?>