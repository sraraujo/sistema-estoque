<?php

    class Funcionario{
        
        private $nome;
        private $email;
        private $senha;
        private $dataNasc;
        private $dataAdmissao;
        private $whatsapp;
        private $cargo;
        private $dataCadastro;
        private $privilegio;
        private $isActive;

        public function __construct($nome, $email, $senha, $dataNasc, $dataAdmissao, $whatsapp, $cargo, $dataCadastro, $privilegio, $isActive){

            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->dataNasc = $dataNasc;
            $this->dataAdmissao = $dataAdmissao;
            $this->whatsapp = $whatsapp;
            $this->cargo = $cargo;
            $this->dataCadastro = $dataCadastro;
            $this->privilegio = $privilegio;
            $this->isActive = $isActive;
        }

        public function dadosToarray(){
            return (array) $this;
        }
    }
?>