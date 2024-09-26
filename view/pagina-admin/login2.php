<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="view/assets/login-estilo/style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>

    <div class="main">
        <div class="container">
            <center>
                <div class="middle">
                    <div id="login">

                        <form action="controller/validate.php" method="post">

                            <fieldset class="clearfix">

                                <p>
                                    <span class="fa fa-user"></span>
                                    <input type="text" name="email" Placeholder="Email" required>
                                </p> <!-- JS because of IE support; better: placeholder="Username" -->

                                <p>
                                    <span class="fa fa-lock"></span>
                                    <input type="password" name="senha" Placeholder="Senha" required>
                                </p> <!-- JS because of IE support; better: placeholder="Password" -->
                                <input type="hidden" name="action" value="login">

                                <div>
                                    <!-- <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Cadastrar?</a></span> -->
                                    <button type="submit" class="btn btn-success" value=""> Entrar </button>
                                </div>

                            </fieldset>
                            <div class="clearfix"></div>
                        </form>

                        <div class="clearfix"></div>

                    </div> <!-- end login -->
                    <div class="logo">LOGO

                        <div class="clearfix"></div>
                    </div>

                </div>
            </center>
        </div>
    </div>

</body>

</html>