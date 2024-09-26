<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Login - Sistema de Estoque </title>
        <!-- SEO -->
        <meta property="og:type" content="Sistema de Gestão"/>
        <meta property="og:title" content="Panificadora Xavier - sistema de gestão e estoque"/>
        <meta property="og:image" content="https://raw.githubusercontent.com/sraraujo/padaria-xavier/main/imagens/logo1.jpg"/>
        <meta property="og:description" content="Sistema de gestão e estoque para auxiliar na empresa Panificadora Xavier"/>
        <meta property="og:site_name" content="Panificadora Xavier"/>
        <!-- favicon -->
        <?php include_once "view/componentes/favicon.php"; ?>
        <link href="view/assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"> Sistema de Estoque  </h3></div>
                                    <div class="card-body">
                                        <form action="controller/validate-login.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required />
                                                <label for="inputEmail"> Email </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="senha" type="password" placeholder="Password" required />
                                                <label for="inputPassword"> Senha </label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-start-end mt-4 mb-4">
                                                <input type="hidden" name="action" value="login">
                                                <button type="submit" class="btn btn-primary"> Entrar </button>
                                            </div>
                                            <div class="small d-flex align-items-center justify-content-center my-1">
                                                <!-- <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label> -->
                                                <p>Não tem uma conta?  <a class="small" href="?admin=novoFuncionario"> Cadastre-se </a></p>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center py-3">
                                        <div class="small">
                                             Contato: suporte@email.com
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center small">
                            <div class="text-muted"> Jonas Araújo &copy; Sistema de Estoque 2024 || Contato: jap_araujo@hotmail.com </div>

                            <div class="small">
                                <!-- Contato: suporte@email.com -->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="view/assets/js/scripts.js"></script>
    </body>
</html>
