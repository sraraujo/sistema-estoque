<?php

    include_once "../controller/config.php";
    include_once "../model/registrarLogs.php";

    if (isset($_POST["vendas"])) {

        switch ($_POST["vendas"]) {

            case "entradas":

                $usuario = $_POST["usuario"];
                $conteudo = "Cadastro de venda: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");

                unset($_POST["vendas"],  $_POST["usuario"]); // apagando variáveis que não serão mais usadas

                $_POST["nome"] = ucwords($_POST["nome"]);
                $_POST["valorUnitario"] = str_replace(",", ".", str_replace(".", "", $_POST["valorUnitario"]));
                $_POST["data"] = str_replace("@", "às", date("d/m/Y @ H:i"));

                $produto = fopen("../dataBase/vendas.txt", "a+");   // criando / abrindo o arquivo
                fwrite($produto, implode(" - ", $_POST) . PHP_EOL); // escrendo as vendas no arquivo
                fclose($produto);                                   // fechando o arquivo
                
                registrarLogs($conteudo, $usuario, $data); // regsitrar no log
                $msg = "text=new"; // texto do status da ação
                break;

            case "atualizar":

                $usuario = $_POST["usuario"];
                $conteudo = "Edição de venda: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");

                $id = $_POST["id"];
                // apagando vendas
                unset($_POST["vendas"], $_POST["id"], $_POST["usuario"]);

                $_POST["nome"] = trim(ucwords($_POST["nome"]));
                $_POST["preco"] = str_replace(",", ".", str_replace(".", "", $_POST["preco"]));
                $_POST["data"] = str_replace("@", "às", date("d/m/Y @ H:i"));
                // $_POST["user"] = (isset($_POST["user"]) ? $_POST["user"] : "Administrador");

                $lista = file("../dataBase/vendas.txt");

                $lista[$id] = implode(" - ", $_POST) . PHP_EOL;

                // abrindo o arquivo
                $produtos = fopen("../dataBase/vendas.txt", "w+");
                // escrevendo no arquivo
                fwrite($produtos, implode("", $lista));
                // fechando o arquivo
                fclose($produtos);

                registrarLogs($conteudo, $usuario, $data); // regsitrar no log
                $msg = "text=update";
                break;

            case "deletar":

                $usuario = $_POST["usuario"];
                $conteudo = "Exclusão de venda: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");

                $id = $_POST["id"];
                $lista = file("../dataBase/vendas.txt");

                unset($_POST["id"], $_POST["vendas"], $lista[$id], $_POST["usuario"]);

                // abrindo o arquivo
                $produtos = fopen("../dataBase/vendas.txt", "w+");
                // escrevenndo no arquivo
                fwrite($produtos, implode("", $lista));
                // fechando o arquivo
                fclose($produtos);

                registrarLogs($conteudo, $usuario, $data); // regsitrar no log
                $msg = "text=delete";
                break;
        }

        header("location: ../index.php?vendas=listaVendas&$msg");

    } else{

        header("location: ../index.php");

    }

?>