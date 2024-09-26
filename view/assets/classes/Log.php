<?php

    class Log{
        
        private $conteudo;
        private $usuario;
        private $data;

        public function __construct($conteudo, $usuario, $data){
            $this->conteudo = $conteudo;
            $this->usuario = $usuario;
            $this->data = $data;
        }

        public function dadosToarray(){
            return (array) $this;
        }

    }

?>