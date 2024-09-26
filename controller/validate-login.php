<?php

    include_once "../model/registrarLogs.php";

    // logar
    if (isset($_POST["action"])=="login" ) {

        $dados = file("../dataBase/funcionarios.txt");

        foreach($dados as $dado){

            $aux = explode(" - ", $dado);

            $email = trim($aux[1]);
            $senha = trim($aux[2]);
            $ativo = trim($aux[9]);
            $privilegio = trim($aux[8]);
            
            $aux = explode(" ", $aux[0]); // transforma o nome em array
            $nome = $aux[0]; // pega o primeiro nome
            $sobrenome = (end($aux) == $nome) ? "" : end($aux); // pegando o último nome
   
            if ($_POST["email"] == $email && sha1($_POST["senha"]) == $senha && $ativo == 'Sim') {

                date_default_timezone_set("America/Fortaleza");

                $infor["nome"]= $nome." ".$sobrenome;
                $infor["hora"]=date("H:i");
                $infor["privilegio"] = $privilegio;

                $usuario =  $infor["nome"];
                $conteudo = "Login de: ".$infor["nome"];
                $data = date("Y/m/d - H:i:s");
                registrarLogs($conteudo, $usuario, $data); // regsitrar no log

                $token = $infor["hora"];

                session_start(); // Inicia a sessão

                $_SESSION["user"]=$infor;
            }
        }

            // unset($_POST, $infor);

        header("location: ../index.php");
        
    } else {
        header("location: ../index.php");
    }


?>