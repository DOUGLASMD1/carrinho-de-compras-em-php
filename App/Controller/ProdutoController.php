<?php
/**
 * Arquivo que retorna todos os produtos disponiveis do db
 */
include_once '../DataBase/conexao.php';

class ProdutoController {

    public static function allProdutos(){
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