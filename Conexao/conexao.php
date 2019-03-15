<?php
class Conexao {
    private $usuario = '';
    private $senha = '';

    public function conexao(){
        return new PDO('mysql:host=localhost;dbname=sistema_alunos', $this->usuario, $this->senha); 
    }
}   
?>