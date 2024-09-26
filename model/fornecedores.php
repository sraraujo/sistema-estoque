<?php

    include_once "../controller/config.php";
    include_once "../model/registrarLogs.php";

    if (isset($_POST["fornecedor"])) {

        switch ($_POST["fornecedor"]) {

            case "novo":
                // usuario, conteudo, data - variáveis criadas para serem registradas no log
                $conteudo = "Cadastro do fornecedor: ".ucwords($_POST["nome"]);
                $usuario = $_POST["usuario"];
                $data = date("Y/m/d - H:i:s");

                // apagando fornecedor
                unset($_POST["fornecedor"],  $_POST["email2"], $_POST["usuario"]);

                $_POST["nome"] = ucwords($_POST["nome"]);
                $_POST["cnpj"] = str_replace("-", "@", $_POST["cnpj"]);
                $_POST["email1"] = mb_strtolower($_POST["email1"]);
                $_POST["whatsapp"] = "(".$_POST["whatsapp"];
                $_POST["telefone"] = "(".$_POST["telefone"];
                $_POST["DataCadastro"] = date("Y/m/d");

                // criando / abrindo o arquivo
                $fornecedor = fopen("../dataBase/fornecedores.txt", "a+");
                // escrendo o fornecedor no arquivo
                fwrite($fornecedor, implode(" - ", $_POST) . PHP_EOL);
                // fechando o arquivo
                fclose($fornecedor);

                $msg = "text=new";

                registrarLogs($conteudo, $usuario, $data); // regsitrar no log

                break;

            case "atualizar":

                // usuario, conteudo, data - variáveis criadas para serem registradas no log
                $conteudo = "Atualização do fornecedor: ".ucwords($_POST["nome"]);
                $usuario = $_POST["usuario"];
                $data = date("Y/m/d - H:i:s");

                $id = $_POST["id"];
                // apagando fornecedor
                unset($_POST["fornecedor"], $_POST["id"], $_POST["usuario"]);

                $_POST["nome"] = ucwords($_POST["nome"]);
                $_POST["cnpj"] = str_replace("@", "-", $_POST["cnpj"]);
                $_POST["email1"] = mb_strtolower($_POST["email1"]);
                $_POST["telefone"] = "(".$_POST["telefone"];
                $_POST["whatsapp"] = "(".$_POST["whatsapp"];
                $_POST["DataCadastro"] = (isset ($_POST["DataCadastro"])) ? $_POST["DataCadastro"] : date("Y/m/d");

                $fornecedor = file("../dataBase/fornecedores.txt");

                $fornecedor[$id] = implode(" - ", $_POST);

                // abrindo o arquivo
                $fornecedors = fopen("../dataBase/fornecedores.txt", "w+");
                // escrevendo no arquivo
                fwrite($fornecedors, implode("", $fornecedor));
                // fechando o arquivo
                fclose($fornecedors);

                $msg = "text=update";

                registrarLogs($conteudo, $usuario, $data); // regsitrar no log

                break;

            case "deletar":
                // usuario, conteudo, data - variáveis criadas para serem registradas no log
                $usuario = $_POST["usuario"];
                $data = date("Y/m/d - H:i:s");
                $conteudo = "Exclusão do fornecedor: ".ucwords($_POST["nomeFornecedor"]);

                $id = $_POST["id"];
                $fornecedor = file("../dataBase/fornecedores.txt");

                unset($_POST["id"], $_POST["fornecedor"], $fornecedor[$id], $_POST["usuario"]);

                // abrindo o arquivo
                $fornecedors = fopen("../dataBase/fornecedores.txt", "w+");
                // escrevenndo no arquivo
                fwrite($fornecedors, implode("", $fornecedor));
                // fechando o arquivo
                fclose($fornecedors);

                $msg = "text=delete";

                registrarLogs($conteudo, $usuario, $data); // regsitrar no log

                break;

                die();

        }

        header("location: ../index.php?fornecedores=listaFornecedores&$msg");

    } else{

        header("location: ../index.php");

    }

?>