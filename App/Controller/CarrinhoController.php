<?php
include_once '../DataBase/conexao.php';

class CarrinhoController {

    public function addCarrinho($dados) {
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare("INSERT INTO carrinho(cliente_cpf) VALUES(:cpfCliente);");
        $stmt->bindParam('cpfCliente', $dados['cpf']);
        $stmt->execute();
        $carrinhoId = $conexao->lastInsertId();

        $stmt = $conexao->prepare("INSERT INTO carrinho_has_produto(carrinho_idcarrinho, produto_idproduto) VALUES(:carrinho, :produto);");
        $stmt->bindParam('carrinho', $carrinhoId);
        $stmt->bindParam('produto', $dados['idproduto']);
        $stmt->execute();
        $stmt = null;

        return true;
    }
}

?>