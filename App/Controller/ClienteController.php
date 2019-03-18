<?php

    include_once 'DataBase/conexao.php';

    class ClienteController {

        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $senha = md5(isset($_POST['senha'])) ? $_POST['senha'] : null;
        $dataNascimento = isset($_POST['dataNascimento']) ? $_POST['dataNascimento'] : null;
 
        if (empty($cpf) || empty($nome) || empty($email) || empty($senha) || empty($dataNascimento)){
            echo "Volte e preencha todos os campos";
            exit;
        }

        public function allClientes(){
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
            $stmt = $conexao->prepare("INSERT INTO cliente(cpf, nome, email, senha, dataNascimento) VALUES(:cpf, :nome, :email, :senha, :dataNascimento);");
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':dataNascimento', $dataNascimento);
            if ($stmt->execute()){
                header('Location: index.php');
            }else{
                echo "Erro ao cadastrar";
                print_r($stmt->errorInfo());
            }
        }
    }

?>