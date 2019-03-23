<?php
/**
 * Classe que contém as funcionalidades de retornar todos os clientes, cadastro de clientes, 
 * login, sair do sistema e verificar se um cliente está logado.
 */

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
            $senha = md5($dados['senha']);
            $stmt = $conexao->prepare('INSERT INTO cliente(cpf, Nome, email, senha, dataNascimento) VALUES(:ecpf, :eNome, :eemail, :esenha, :edataNascimento);');
            $stmt->bindParam(':ecpf', $dados['cpf']);
            $stmt->bindParam(':eNome', $dados['Nome']);
            $stmt->bindParam(':eemail',$dados['email']);
            $stmt->bindParam(':esenha',  $senha);
            $stmt->bindParam(':edataNascimento', $dados['dataNascimento']);
            $result =  $stmt->execute();
            return $result;
        }

        public function login($email, $senha) {
            $conexao = new Conexao();
            $conexao = $conexao->conexao();  
            $stmt = $conexao->prepare("SELECT cpf, email, senha, nome FROM cliente WHERE email = :email AND senha = :senha");
            $stmt->execute(array('email' => $email, 'senha' => $senha));
            if ($stmt->rowcount() > 0) {
                $result = $stmt->fetch();
                $_SESSION['logged_in'] = true;
                $_SESSION['user_email'] = $result['email'];
                $_SESSION['user_cpf'] = $result['cpf'];
                $_SESSION['user_nome'] = $result['nome'];
                return true;
            }else {
                return false;
            }
        }

        public function logout(){
            session_destroy();
        }

        public function isLoggedIn(){
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                return true;
            }
            return false;
        }

    }

?>