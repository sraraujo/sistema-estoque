<?php 

    $cliente = explode(" - ", base64_decode($_GET["token"]));

?>

<div class="container-fluid px-4">
<div class="row d-flex justify-content-betwee align-items-center">
        <h1 class="mt-4 col-sm-12 col-md-6 mb-3"> <?= $nomePagina; ?> </h1>
        <div class="col-sm-12 col-md-6 mb-3 text-end"> <a href="?clientes=listaClientes" class="btn btn-primary mt-4 text-end"> Ver Registro </a> </div>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="?page=dashboard"> Dashboard </a></li>
        <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span class="iconify me-1" data-icon="ion:person-add" style="color: #ffffff;"></span>
            <?= $nomePagina; ?> 
        </div>
        <div class="card-body">
            <!-- formulário de cadastro -->
            <form action="model/clientes.php" method="post">
                <div class="card-body">
                    <div class="row">
                        <!-- nome completo -->
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <h5>
                                    <label for="nome" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #000000;"></span> Nome Completo</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder1="Nome do Produto" maxlength="60" value="<?= $cliente[0] ?>" required>
                                </h5>
                            </div>

                        </div>
                        <!-- e-mail -->
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <h5>
                                    <label for="dataNasc" class="form-label"><span class="iconify" data-icon="fa-solid:calendar-alt" style="color: #000000;"></span> Data Nascimento </label>
                                    <!-- <label for="dataNasc" class="form-label"><span class="iconify" data-icon="eos-icons:container" style="color: #000000;"></span> Data Nascimento </label> -->
                                    <input type="date" class="form-control" id="dataNasc" name="dataNasc" placeholder1="Codigo do Produto" maxlength="60" value="<?= $cliente[1] ?>">
                                </h5>
                            </div>
                        </div>
                        <!-- endereço -->
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <h5>
                                    <label for="endereco" class="form-label"><span class="iconify" data-icon="fa-solid:map-marked-alt" style="color: #000000;"></span> Endereço </label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder1="Codigo do Produto" maxlength="100" value="<?= $cliente[2] ?>" required>
                                </h5>
                            </div>
                        </div>
                        <!-- bairro -->
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <h5>
                                    <label for="bairro" class="form-label"><span class="iconify" data-icon="fa-solid:map-marker-alt" style="color: #000000;"></span> Bairro </label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder1="Codigo do Produto" maxlength="40" value="<?= $cliente[3] ?>" required>
                                </h5>
                            </div>
                        </div>
                        <!-- e-mail -->
                        <div class="col-sm-12 col-md-6 mb-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="email" class="form-label"><span class="iconify" data-icon="fa-solid:envelope" style="color: #000000;"></span> E-mail </label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder1="Codigo do Produto" maxlength="60" value="<?= $cliente[4] ?>" required>
                                </h5>
                            </div>
                        </div>
                        <!-- whatsapp -->
                        <div class="col-sm-12 col-md-6 mb-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="whatsapp" class="form-label"><span class="iconify" data-icon="dashicons:whatsapp" style="color: #000000;"></span> Whatsapp </label>
                                    <input type="text" class="form-control estoque" id="whatsapp" name="whatsapp" placeholder1="Estoque do Produto" value="<?= $cliente[5] ?>" required>
                                </h5>
                            </div>
                        </div>
                        <!-- ativo -->
                        <div class="col-sm-12 col-md-6 mb-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="isActive" class="form-label "><span class="iconify" data-icon="flowbite:bell-active-alt-solid" style="color: #000000;"></span> Ativo ? </label>
                                    <select name="isActive" id="isActive" class="form-select estoque"  aria-label="Default select example">
                                        <option value="" disabled > Selecione </option>
                                        <option value="1" <?= trim($cliente[7]) == "1" ? "selected" : "" ?>> Sim </option>
                                        <option value="0" <?= trim($cliente[7]) != "0" ? "" : "selected" ?>> Não </option>
                                    </select>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 mb-0 text-center">
                    <a href="?clientes=listaClientes" class="btn btn-success me-5" type="reset">
                        <span class="iconify" data-icon="ion:arrow-back" style="color: #ffffff;"></span>
                        Voltar
                    </a>

                    <button class="btn btn-primary " type="submit">
                        <input type="hidden" name="cliente" value="atualizar">
                        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                        <input type="hidden" name="usuario" value="<?= $_SESSION["user"]["nome"]; ?>">
                        <span class="iconify" data-icon="material-symbols:save-sharp" style="color: #ffffff;"></span>
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#telefone').mask('(00) 00000-0000', {
                reverse: true
            });
            $('#whatsapp').mask(' (00) 00000-0000', {
                reverse: true
            });
        });
    </script>