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

    public static function cadastrar($dados) {
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare("INSERT INTO aluno(nome, bim_1, bim_2, bim_3, bim_4) VALUES(:nome, :nota1, :nota2, :nota3, :nota4);");
        $stmt->bindParam('nome', $dados['nome']);
        $stmt->bindParam('nota1', $dados['nota1']);
        $stmt->bindParam('nota2', $dados['nota2']);
        $stmt->bindParam('nota3', $dados['nota3']);
        $stmt->bindParam('nota4', $dados['nota4']);
        $stmt->execute();
    }
}

?>