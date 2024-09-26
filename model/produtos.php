<?php

    include_once "../controller/config.php";
    include_once "../model/registrarLogs.php";

    if (isset($_POST["produtos"])){

        switch ($_POST["produtos"]){

            case "cadastrar":

                $usuario = $_POST["usuario"];
                $conteudo = "Cadastro de produto: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");
                
                unset($_POST["produtos"], $_POST["usuario"]);
                
                $_POST['nome'] = ucwords($_POST["nome"]);
                $_POST['precoCompra'] = str_replace(",", ".", str_replace(".", "", $_POST["precoCompra"]));
                $_POST['precoVenda'] = str_replace(",", ".", str_replace(".", "", $_POST["precoVenda"]));
                $_POST["linkImagem"] = (empty($_POST["linkImagem"]) ? "view/assets/imagens/sem-imagem.png" : $_POST["linkImagem"]);
                
                $produtos = fopen("../dataBase/produtos.txt", "a+");
                fwrite($produtos, implode(" - ", $_POST).PHP_EOL);
                fclose($produtos);
                
                $produtos = "&produto=new";
                registrarLogs($conteudo, $usuario, $data); // regsitrar no log
                
                break;
        
            case "atualizar":

                $id = $_POST["id"];
                $usuario = $_POST["usuario"];
                $conteudo = "Atualização de produto: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");
                
                unset($_POST["produtos"], $_POST["id"], $_POST["usuario"]);

                $_POST['nome'] = ucwords($_POST["nome"]);
                $_POST['precoCompra'] = str_replace(",", ".", str_replace(".", "", $_POST["precoCompra"]));
                $_POST['precoVenda'] = str_replace(",", ".", str_replace(".", "", $_POST["precoVenda"]));
                
                $todosProdutos = file("../dataBase/produtos.txt");
                $todosProdutos["$id"] = implode(" - ", $_POST).PHP_EOL;

                $produtos = fopen("../database/produtos.txt", "w+");
                fwrite($produtos, implode("", $todosProdutos));
                fclose($produtos);
                
                $produtos = "&produto=update";
                registrarLogs($conteudo, $usuario, $data); // regsitrar no log

                break;
            
            case "deletar":
                
                $usuario = $_POST["usuario"];
                $conteudo = "Exclusão do produto: ".ucwords($_POST["nome"]);
                $data = date("Y/m/d - H:i:s");
                $id = $_POST["id"];

                $todosProdutos = file("../dataBase/produtos.txt");
                unset($todosProdutos["$id"], $_POST["produtos"], $_POST["id"], $_POST["usuario"], $_POST["nome"]);
                
                $produtos = fopen("../dataBase/produtos.txt", "w+");
                fwrite($produtos, implode("", $todosProdutos));
                fclose($produtos);
                
                $produtos = "&produto=delete";
                registrarLogs($conteudo, $usuario, $data); // regsitrar no log

                break;
        }

        header("location: ../index.php?produtos=listaProdutos".$produtos);
                
    } else {

        header("location: ../index.php");
    
    }

?>