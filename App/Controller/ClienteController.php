<?php

    class ClienteController {

        public function allClientes() {
            $conexao = new Conexao();
            $conexao = $conexao->conexao();
            $stmt = $conexao->prepare("SELECT * FROM cliente;");
            $stmt->execute();
            $clientes = $stmt->fetchAll();
            $stmt = null;
            return $clientes;
        }

        public function cadastrarCliente($dados) {
            $conexao = new Conexao();
            $conexao = $conexao->conexao();
            $stmt = $conexao->prepare('INSERT INTO cliente(cpf, Nome, email, senha, dataNascimento) VALUES(:ecpf, :eNome, :eemail, :esenha, :edataNascimento);');
            $stmt->bindParam(':ecpf', $dados['cpf']);
            $stmt->bindParam(':eNome', $dados['Nome']);
            $stmt->bindParam(':eemail',$dados['email']);
            $stmt->bindParam(':esenha',  md5($dados['senha']));
            $stmt->bindParam(':edataNascimento', $dados['dataNascimento']);
            $result =  $stmt->execute();
            return $result;
        }
    }

?>