<?php

    include_once "../controller/config.php";
    include_once "../model/registrarLogs.php";
    include_once "../view/assets/classes/Funcionario.php";

    if (isset($_POST["funcionario"])) {

        switch ($_POST["funcionario"]) {

            case "novo":

                $usuario = $_POST["usuario"];
                $conteudo = "Cadastro de funcionário: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");

                
                // apagando funcionario
                unset($_POST["funcionario"], $_POST["email2"], $_POST["senha2"], $_POST["usuario"]);

                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                $dataNasc = $_POST["dataNasc"];
                $dataAdmissao = $_POST["dataAdmissao"];
                $whatsapp = $_POST["whatsapp"];
                $cargo = $_POST["cargo"];
                $dataCadastro = date("d/m/Y @ H:i");
                $privilegio = "Funcionário";
                $isActive = "Não";

                $funcionario = new Funcionario( $nome, $email, $senha, $dataNasc, $dataAdmissao, $whatsapp, $cargo, $dataCadastro, $privilegio, $isActive );
                
                $dados = array_values($funcionario->dadosToArray());
                
                // criando / abrindo o arquivo
                $produto = fopen("../dataBase/funcionarios.txt", "a+");
                // escrendo o funcionario no arquivo
                fwrite($produto, implode(" - ", $dados) . PHP_EOL);
                // fechando o arquivo
                fclose($produto);
                
                $msg = "text=new";
                registrarLogs($conteudo, $usuario, $data); // regsitrar no log

                break;

            case "atualizar":

                $usuario = $_POST["usuario"];
                $conteudo = "Atualização de funcionário: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");
                $id = $_POST["id"];
                // apagando funcionario
                unset($_POST["funcionario"], $_POST["id"], $_POST["usuario"]);

                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                $dataNasc = $_POST["dataNasc"];
                $dataAdmissao = $_POST["dataAdmissao"];
                $whatsapp = $_POST["whatsapp"];
                $cargo = $_POST["cargo"];
                $dataCadastro = date("d/m/Y @ H:i E");
                $privilegio = "Funcionário";
                $isActive = $_POST["isActive"];

                $funcionario = new Funcionario( $nome, $email, $senha, $dataNasc, $dataAdmissao, $whatsapp, $cargo, $dataCadastro, $privilegio, $isActive );

                $dados = array_values($funcionario->dadosToArray());

                $lista = file("../dataBase/funcionarios.txt");

                $lista[$id] = implode(" - ", $dados) . PHP_EOL;

                // abrindo o arquivo
                $produtos = fopen("../dataBase/funcionarios.txt", "w+");
                // escrevendo no arquivo
                fwrite($produtos, implode("", $lista));
                // fechando o arquivo
                fclose($produtos);

                $msg = "text=update";
                registrarLogs($conteudo, $usuario, $data); // regsitrar no log
                break;

            case "deletar":

                $usuario = $_POST["usuario"];
                $conteudo = "Exclusão de funcionário: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");
                
                $id = $_POST["id"];
                $lista = file("../dataBase/funcionarios.txt");

                unset($_POST["id"], $_POST["funcionario"], $lista[$id], $_POST["usuario"], $_POST["nome"]);

                // abrindo o arquivo
                $funcionarios = fopen("../dataBase/funcionarios.txt", "w+");
                // escrevenndo no arquivo
                fwrite($funcionarios, implode("", $lista));
                // fechando o arquivo
                fclose($funcionarios);
                
                $msg = "text=delete";
                registrarLogs($conteudo, $usuario, $data); // regsitrar no log
                break;
        }

        header("location: ../index.php?funcionarios=listaFuncionarios&$msg");

    } else{

        header("location: ../index.php");

    }

?>