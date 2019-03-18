<?php
include_once 'DataBase/conexao.php';

class ClienteController {

    public static function allClientes(){
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare("SELECT * FROM cliente;");
        $stmt->execute();
        $clientes = $stmt->fetchAll();
        $stmt = null;
        return $clientes;
    }

    public static function cadastrarCliente($dados) {
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare("INSERT INTO cliente(cpf, nome, dataNascimento, email, senha) VALUES(:valueCpf, :valueNome, :valueDataNascimento, :valueEmail, :valueSenha);");
        $stmt->bindParam('valueCpf', $dados['valueCpf']);
        $stmt->bindParam('valueNome', $dados['valueNome']);
        $stmt->bindParam('valueDataNascimento', $dados['valueDataNascimento']);
        $stmt->bindParam('valueEmail', $dados['valueEmail']);
        $stmt->bindParam('valueSenha', $dados['valueSenha']);
        $stmt->execute();
    }
}

?>