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

            $this->nome = ucwords($nome);
            $this->email = mb_strtolower($email);
            $this->senha = sha1($senha);
            $this->dataNasc = str_replace("-", "/", $dataNasc);
            $this->dataAdmissao = str_replace("-", "/",$dataAdmissao);
            $this->whatsapp = "(".str_replace("-", "/", $whatsapp);
            $this->cargo = ucwords($cargo);
            $this->dataCadastro = str_replace("@", "às", $dataCadastro);
            $this->privilegio = (isset($privilegio)) ? ucwords($privilegio) : "Funcionário";
            $this->isActive = (isset($isActive) ? ucwords($isActive) : "Não");

        }

        public function dadosToarray(){
            return (array) $this;
        }
    }

?>