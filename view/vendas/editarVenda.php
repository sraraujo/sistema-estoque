<?php

    $id = $_GET["id"];
    $produto = explode("-", base64_decode($_GET["token"]));

?>

<div class="container-fluid px-4">
    <div class="row d-flex justify-content-betwee align-items-center">
        <h1 class="mt-4 col-6"> <?= $nomePagina; ?> </h1>
    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="?page=dashboard"> Dashboard </a></li>
        <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-table me-1"></i>
            <?= $nomePagina; ?>
        </div>
        <div class="card-body">
            <!-- formulário de cadastro -->
            <form action="model/vendas.php" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mt-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="nome" class="form-label"><span class="iconify" data-icon="fluent-mdl2:product-variant" style="color: #000000;"></span> Nome / Descrição</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder1="Nome do Produto" maxlength="60" required value="<?= $produto[0]; ?>">
                                </h5>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6 mt-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="preco" class="form-label"><span class="iconify" data-icon="solar:tag-price-bold" style="color: #000000;"></span> Valor Unitário </label>
                                    <input type="text" class="form-control estoque" id="preco" name="preco"  placeholder1="Estoque do Produto" required value="<?= $produto[1]; ?>">
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mt-2">
                            <div class="mb-3">
                                <h5>
                                    <label for="quantidade" class="form-label"><span class="iconify" data-icon="eos-icons:container" style="color: #000000;"></span> Quantidade </label>
                                    <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder1="Codigo do Produto" maxlength="4" required value="<?= $produto[2]; ?>">
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="mb-3">
                                <h5>
                                    <label for="formaPagamento" class="form-label">
                                        <span class="iconify" data-icon="material-symbols:point-of-sale-sharp" style="color: #000000;"></span>
                                        Forma de Pagamento
                                    </label>
                                </h5>
                                <!-- <input type="text" class="form-control preco" id="exampleFormControlInput1" placeholder1="Preço de Compra"> -->
                                <select name="formaPagamento" id="formaPagamento" class="form-control" required>
                                    <option value="" disabled > Selecione </option>
                                    <option value="Dinheiro" <?= (trim($produto[3])) == "Dinheiro" ? "selected" : ""; ?>> Dinheiro </option>
                                    <option value="Pix" <?= (trim($produto[3])) == "Pix" ? "selected" : ""; ?>> Pix </option>
                                    <option value="Cartão" <?= (trim($produto[3])) == "Cartão" ? "selected" : ""; ?> > Cartão </option>
                                    <option value="Prazo" <?= (trim($produto[3])) == "Prazo" ? "selected" : ""; ?> > À prazo </option>
                                    <option value="Vale" <?= (trim($produto[3])) == "Vale" ? "selected" : ""; ?> > Vale </option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-4 mb-0 text-center">
                    <a href="?vendas=listaVendas" class="btn btn-warning me-5" type="reset">
                        <span class="iconify" data-icon="lets-icons:back" style="color: #000000;"></span>
                        Voltar
                    </a>

                    <button class="btn btn-primary " type="submit">
                        <input type="hidden" name="vendas" value="atualizar">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="hidden" name="nome" value="<?= $produto[0]; ?>">
                        <input type="hidden" name="usuario" value="<?= $_SESSION["user"]["nome"]?>">
                        <span class="iconify" data-icon="material-symbols:save-sharp" style="color: #ffffff;"></span>
                        Registrar
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
            $('#preco').mask('000.000,00', {
                reverse: true
            });
            $('#quantidade').mask('0.000', {
                reverse: true
            });
        });
    </script>