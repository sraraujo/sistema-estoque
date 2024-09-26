<?php
    // $fornecedor = explode(" - ", base64_decode($token));
    $fornecedor = explode(" - ", base64_decode($_GET['token']));

?>

<div class="container-fluid px-4">
    <h1 class="mt-4"> <?= $nomePagina; ?> </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <!-- <i class="fas fa-table me-1"></i> -->
            <strong> <?= $nomePagina; ?> </strong>
        </div>
        <div class="card-body">
            <!-- formulário de cadastro -->
            <form action="model/fornecedores.php" method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="nome" type="text" name="nome" maxlength="60" value="<?= $fornecedor[0] ?>" placeholder="Enter your first name" required />
                            <label for="nome"> Nome Completo / Razão Social</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="cnpj" type="text" name="cnpj" maxlength="14" value="<?= $fornecedor[1] ?>" placeholder="Enter your E-mail" required />
                            <label for="cnpj"> CNPJ </label>
                        </div>
                    </div>
                </div>
                <!-- email -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="iemail1" type="email" name="email1" value="<?= $fornecedor[2] ?>" placeholder="Enter your E-mail" required />
                            <label for="email1"> E-mail</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="telefone" type="text" name="telefone" value="<?= $fornecedor[3] ?>" placeholder="name@example.com" required />
                            <label for="telefone"> Telefone </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="whatsapp" type="text" name="whatsapp" value="<?= $fornecedor[4] ?>" placeholder="name@example.com" required />
                                <label for="whatsapp"> WhatsApp </label>
                            </div>
                        </div>
                    <div class="mt-4  text-center">
                        <input type="hidden" name="fornecedor" value="atualizar">
                        <input type="hidden" name="id" value="<?= $_GET["id"]; ?>">
                        <input type="hidden" name="DataCadastro" value="<?= $fornecedor[5]; ?>">
                        <input type="hidden" name="usuario" value="<?= $_SESSION["user"]["nome"]; ?>">
                        <a class="btn btn-warning me-5" href="?fornecedores=listaFornecedores">  Voltar </a>
                        <button class="btn btn-primary " type="submit"> Atualizar </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- validador de email e senha -->
<script src="view/assets/js/formulario.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#cnpj').mask('00.000.000/0000-00', {
            reverse: true
        });
        $('#telefone').mask('(00) 0000-0000', {
            reverse: true
        });
        $('#whatsapp').mask('(00) 00000-0000', {
            reverse: true
        });
    });
</script>