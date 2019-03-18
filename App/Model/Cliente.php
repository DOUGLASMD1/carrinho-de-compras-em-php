<?php

    class Cliente {

        private $cpf;
        private $nome;
        private $dataNascimento;
        private $email;
        private $senha;

        //Metodos get para Cliente
        public function getCpf(){
            return $this->cpf;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getDataNascimento(){
            return $this->dataNascimento;
        }

        public function getEmail(){
            return $this->email;
        }
        
        public function getSenha(){
            return $this->senha;
        }

        //Metodos set para Cliente
        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setDataNascimento($dataNascimento) {
            $this->dataNascimento = $dataNascimento;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

    }

?>