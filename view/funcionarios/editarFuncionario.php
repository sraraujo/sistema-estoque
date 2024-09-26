<?php

    $funcionario = explode(" - ", base64_decode($_GET["token"]));

    // echo "<pre>";
    // var_dump($funcionario);
    // echo "</pre>";
    // die();

?>

<div class="container-fluid px-4">
    <div class="row d-flex justify-content-betwee align-items-center">
        <h1 class="mt-4 col-sm-12 col-md-6 mb-3"> <?= $nomePagina; ?> </h1>
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
            <form action="model/funcionarios.php" method="post">
                <div class="card-body">
                    <div class="row">
                        <!-- nome completo -->
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <h5>
                                    <label for="nome" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #000000;"></span> Nome Completo</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder1="Nome do Produto" maxlength="60" value="<?= $funcionario[0] ?>" required>
                                </h5>
                            </div>

                        </div>
                        <!-- senha -->
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <h5>
                                    <label for="senha" class="form-label"><span class="iconify" data-icon="heroicons:key-solid" style="color: #000000;"></span> Senha </label>
                                    <input type="text" class="form-control" id="senha" name="senha" placeholder1="Codigo do Produto" maxlength="100" value="<?= $funcionario[2] ?>" required>
                                </h5>
                            </div>
                        </div>
                        <!-- e-mail -->
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <h5>
                                    <label for="dataNasc" class="form-label"><span class="iconify" data-icon="fa-solid:calendar-alt" style="color: #000000;"></span> Data Nascimento </label>
                                    <!-- <label for="dataNasc" class="form-label"><span class="iconify" data-icon="eos-icons:container" style="color: #000000;"></span> Data Nascimento </label> -->
                                    <input type="date" class="form-control" id="dataNasc" name="dataNasc" placeholder1="Codigo do Produto" maxlength="60" value="<?= str_replace("/", "-", $funcionario[3]) ?>">
                                </h5>
                            </div>
                        </div>
                        <!-- bairro -->
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <h5>
                                    <label for="dataAdmissao" class="form-label"><span class="iconify" data-icon="fa-solid:calendar-alt" style="color: #000000;"></span> Data de Admissão </label>
                                    <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao" placeholder1="Codigo do Produto" maxlength="40" value="<?= str_replace("/", "-", $funcionario[4]) ?>" required>
                                </h5>
                            </div>
                        </div>
                        <!-- e-mail -->
                        <div class="col-sm-12 col-md-6 mb-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="email" class="form-label"><span class="iconify" data-icon="fa-solid:envelope" style="color: #000000;"></span> E-mail </label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder1="Codigo do Produto" maxlength="60" value="<?= $funcionario[1] ?>" required>
                                </h5>
                            </div>
                        </div>
                        <!-- whatsapp -->
                        <div class="col-sm-12 col-md-6 mb-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="whatsapp" class="form-label"><span class="iconify" data-icon="dashicons:whatsapp" style="color: #000000;"></span> Whatsapp </label>
                                    <input type="text" class="form-control estoque" id="whatsapp" name="whatsapp" placeholder1="Estoque do Produto" value="<?= str_replace("/", "-", $funcionario[7]); ?>" required>
                                </h5>
                            </div>
                        </div>
                        <!-- dados administração -->
                        <!-- bairro -->
                        <div class="col-sm-12 col-md-4 mb-3">
                            <div class="mb-3">
                                <h5>
                                    <label for="cargo" class="form-label"><span class="iconify" data-icon="bi:person-badge-fill" style="color: #000000;"></span> Cargo </label>
                                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder1="Codigo do Produto" maxlength="40" value="<?= $funcionario[6] ?>" required>
                                </h5>
                            </div>
                        </div>
                        <!-- e-mail -->
                        <div class="col-sm-12 col-md-4 mb-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="privilegio" class="form-label"><span class="iconify" data-icon="mdi:user-access-control" style="color: #000000;"></span> Privilégio </label>
                                    <input type="text" class="form-control" id="privilegio" name="privilegio" placeholder1="Codigo do Produto" maxlength="60" value="<?= ucwords($funcionario[8]); ?>" required>

                                </h5>
                            </div>
                        </div>
                        <!-- whatsapp -->
                        <div class="col-sm-12 col-md-4 mb-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="whatsapp" class="form-label"><span class="iconify" data-icon="dashicons:whatsapp" style="color: #000000;"></span> Ativo ? </label>
                                    <select name="isActive" id="isActive" class="form-select">
                                        <option value="" disabled> Selecione </option>
                                        <option value="Sim" <?= (trim($funcionario[9]) == "Sim") ? "selected" : ""; ?>> Sim</option>
                                        <option value="Não" <?= (trim($funcionario[9]) == "Não") ? "selected" : ""; ?>> Não</option>
                                    </select>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 mb-0 text-center">
                    <a href="?funcionarios=listafuncionarios" class="btn btn-success me-5" type="reset">
                        <span class="iconify" data-icon="ion:arrow-back" style="color: #ffffff;"></span>
                        Voltar
                    </a>

                    <button class="btn btn-primary " type="submit">
                        <input type="hidden" name="funcionario" value="atualizar">
                        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                        <input type="hidden" name="usuario" value="<?=$_SESSION["user"]["nome"]?>">
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