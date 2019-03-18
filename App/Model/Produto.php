<?php
include_once '../../DataBase/conexao.php';

class Produto {
    private idProduto;
    private nome;
    private descricao;
    private valor;

    public function getIdProduto(){
        return $this->idProduto;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome(){
        return $this->nome = $nome;
    }    
    
    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setDescricao(){
        return $this->descricao = $descricao;
    }

    public function getValor(){
        return $this->valor;
    }
        
    public function setValor(){
        return $this->valor = $valor;
    }

}


?>