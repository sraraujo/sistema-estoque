<?php

    function pageValidate() {

        // Produtos
        if (isset($_GET["produtos"])) {

            switch ($_GET["produtos"]) {

                case "novoProduto";
                    $nomePagina = "Cadastrar Novo Produto";
                    include_once "view/produtos/novoProduto.php";
                    break;

                case "listaProdutos";
                    $nomePagina = "Lista de Produtos";
                    $dados = file("dataBase/produtos.txt");
                    include_once "view/produtos/listaProdutos.php";
                    break;

                case "editarProduto";
                    $nomePagina = "Atualizar Produto";
                    $produto = explode(" - ", base64_decode($_GET["token"]));
                    $id = $_GET["id"];
                    include_once "view/produtos/editarProduto.php";
                    break;

                default;
                    include_once "view/pagina-admin/404.php";
            }

        // vendas    
        } else if (isset($_GET["vendas"])) {

            switch ($_GET["vendas"]) {

                case "listaVendas";
                    $nomePagina = "Vendas";
                    $vendas = file("dataBase/vendas.txt");
                    include_once "view/vendas/listaVendas.php";
                    break;

                case "novaVenda";
                    $nomePagina = "Nova Venda";
                    include_once "view/vendas/novaVenda.php";
                    break;

                case "editarVenda";
                    $nomePagina = "Atualizar Venda";
                    include_once "view/vendas/editarVenda.php";
                    break;

                default;
                    include_once "view/pagina-admin/404.php";
            }

        // funcionarios    
        } else if (isset($_GET["funcionarios"]) && $_SESSION["user"]["privilegio"] == "Administrador") {

            switch ($_GET["funcionarios"]) {

                case "listaFuncionarios";
                    $nomePagina = "Funcionários";
                    $funcionarios = file("dataBase/funcionarios.txt");
                    include_once "view/funcionarios/listaFuncionarios.php";
                    break;

                case "novoFuncionario";
                    $nomePagina = "Novo Funcionários";
                    include_once "view/funcionarios/novoFuncionario.php";
                    break;

                case "editarFuncionario";
                    $nomePagina = "Atualizar Funcionário";
                    include_once "view/funcionarios/editarFuncionario.php";
                    break;

                default;
                    include_once "view/pagina-admin/404.php";
            }

        // clientes    
        } else if (isset($_GET["clientes"])) {

            switch ($_GET["clientes"]) {

                case "listaClientes";
                    $nomePagina = "Clientes";
                    $clientes = file("dataBase/clientes.txt");
                    include_once "view/clientes/listaClientes.php";
                    break;

                case "novoCliente";
                    $nomePagina = "Novo Cliente";
                    include_once "view/clientes/novoCliente.php";
                    break;

                case "editarCliente";
                    $nomePagina = "Atualizar Cliente";
                    include_once "view/clientes/editarCliente.php";
                    break;

                default;
                    include_once "view/pagina-admin/404.php";
            }

        // fornecedores    
        } else if (isset($_GET["fornecedores"])) {

            switch ($_GET["fornecedores"]) {

                case "listaFornecedores";
                    $nomePagina = "Lista de Fornecedores";
                    $fornecedores = file("dataBase/fornecedores.txt");
                    include_once "view/fornecedores/listaFornecedores.php";
                    break;

                case "novoFornecedor";
                    $nomePagina = "Novo Fornecedor";
                    include_once "view/fornecedores/novoFornecedor.php";
                    break;

                case "editarFornecedor";
                    $nomePagina = "Atualizar Fornecedor";
                    $fornecedores = file("dataBase/fornecedores.txt");
                    include_once "view/fornecedores/editarFornecedor.php";
                    break;

                default;
                    include_once "view/pagina-admin/404.php";
            }
        

        // clientes
        } else if (isset($_GET["clientes"])) {

            switch ($_GET["clientes"]) {

                case "listaClientes";
                    $nomePagina = "Clientes";
                    $clientes = file("dataBase/clientes.txt");
                    include_once "view/clientes/listaClientes.php";
                    break;

                case "novoCliente";
                    $nomePagina = "Novo Cliente";
                    include_once "view/clientes/novoCliente.php";
                    break;

                case "editarCliente";
                    $nomePagina = "Atualizar Cliente";
                    include_once "view/clientes/editarCliente.php";
                    break;

                default;
                    include_once "view/pagina-admin/404.php";
            }

        // dados
        } else if (isset($_GET["admin"])) {

            switch ($_GET["admin"]) {

                // dashboard    
                case "dashboard";
                    $nomePagina = "Dashboard";
                    $admin = file("dataBase/produtos.txt");
                    include_once "view/pagina-admin/dashboard.php";
                    break;

                // caixa
                case "caixa";
                    $nomePagina = "Caixa";
                    include_once "view/pagina-admin/caixa.php";
                    break;
                // historico
                case "historico";
                    if ($_SESSION["user"]["privilegio"] == "Administrador"){
                            $nomePagina = "Histórico de Atividades";
                            $logs = file("dataBase/logs.txt");
                            include_once "view/pagina-admin/listaHistorico.php";
                            break;
                    } else{
                        echo "<script> alert('Acesso Negado!') </script>";
                        break;
                    }
                default;
                    include_once "view/pagina-admin/404.php";
                }
        
        // página não localizada
        } else {
            $nomePagina = "Dashboard";
            $dados = file("dataBase/produtos.txt");
            include_once "view/pagina-admin/dashboard.php";
        }
    }
?>