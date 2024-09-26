<?php

    include_once "../controller/config.php";
    include_once "../model/registrarLogs.php";

    if (isset($_POST["cliente"])) {

        switch ($_POST["cliente"]) {

            case "novo":

                // usuario, conteudo, data - variáveis criadas para serem registradas no log
                $usuario = $_POST["usuario"];
                $conteudo = "Registro de venda: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");
                
                unset($_POST["cliente"], $_POST["usuario"]); // apagando cliente e usuario

                $_POST["nome"] = ucwords($_POST["nome"]);
                $_POST["dataNasc"] = ((empty($_POST["dataNasc"]) ? date("Y-m-d") : $_POST["dataNasc"]));
                $_POST["endereco"] = ucwords($_POST["endereco"]);
                $_POST["bairro"] = ucwords($_POST["bairro"]);
                $_POST["email"] = mb_strtolower($_POST["email"]);
                $_POST["whatsapp"] = "(".$_POST["whatsapp"];
                $_POST["isActive"] = 0;
                $_POST["DataCadastro"] = date("Y-m-d");

                // criando / abrindo o arquivo
                $cliente = fopen("../dataBase/clientes.txt", "a+");
                // escrendo o cliente no arquivo
                fwrite($cliente, implode(" - ", $_POST) . PHP_EOL);
                // fechando o arquivo
                fclose($cliente);

                $msg = "text=new";

                registrarLogs($conteudo, $usuario, $data); // regsitrar no log
                
                break;

            case "atualizar":

                // usuario, conteudo, data - variáveis criadas para serem registradas no log
                $usuario = $_POST["usuario"];
                $conteudo = "Atualização do cliente: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");

                $id = $_POST["id"];
                // apagando cliente
                unset($_POST["cliente"], $_POST["id"], $_POST["usuario"]);

                $_POST["nome"] = ucwords($_POST["nome"]);
                $_POST["dataNasc"] = ((empty($_POST["dataNasc"]) ? date("Y-m-d") : $_POST["dataNasc"]));
                $_POST["endereco"] = ucwords($_POST["endereco"]);
                $_POST["bairro"] = ucwords($_POST["bairro"]);
                $_POST["email"] = mb_strtolower($_POST["email"]);
                $_POST["whatsapp"] = "(".$_POST["whatsapp"];
                $_POST["isActive"] = $_POST["isActive"];
                $_POST["DataCadastro"] = date("Y-m-d");

                $cliente = file("../dataBase/clientes.txt");

                $cliente[$id] = implode(" - ", $_POST) . PHP_EOL;

                // abrindo o arquivo
                $clientes = fopen("../dataBase/clientes.txt", "w+");
                // escrevendo no arquivo
                fwrite($clientes, implode("", $cliente));
                // fechando o arquivo
                fclose($clientes);

                registrarLogs($conteudo, $usuario, $data); // regsitrar no log
                $msg = "text=update";
                break;

            case "deletar":
                // usuario, conteudo, data - variáveis criadas para serem registradas no log
                $usuario = $_POST["usuario"];
                $conteudo = "Exclusão do cliente: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");

                $id = $_POST["id"];
                $cliente = file("../dataBase/clientes.txt");

                unset($_POST["id"], $_POST["cliente"], $cliente[$id], $_POST["usuario"]);

                // abrindo o arquivo
                $clientes = fopen("../dataBase/clientes.txt", "w+");
                // escrevenndo no arquivo
                fwrite($clientes, implode("", $cliente));
                // fechando o arquivo
                fclose($clientes);

                registrarLogs($conteudo, $usuario, $data); // regsitrar no log
                $msg = "text=delete";
                break;
        }

        header("location: ../index.php?clientes=listaClientes&$msg");

    } else{

        header("location: ../index.php");

    }

?>