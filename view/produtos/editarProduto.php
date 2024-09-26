<div class="container-fluid px-4">
    <h1 class="mt-4"> <?= $nomePagina; ?> </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <?= $nomePagina; ?>
        </div>
        <div class="card-body">
            <!-- formulário de atualização -->
            <form action="model/produtos.php" method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inome" type="text" name="nome" value="<?= $produto[0] ?>" maxlength="60" placeholder="Enter your first name" />
                            <label for="inome"> Nome do Produto</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="icodigo" type="text" name="codigo" value="<?= $produto[1] ?>" maxlength="13" placeholder="Enter your last name" />
                            <label for="icodigo"> Código de Barra (EAN)</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="iprecoCompra" type="text" name="precoCompra" value="<?= $produto[2] ?>" maxlength="8" placeholder="name@example.com" />
                            <label for="iprecoCompra"> Preço de Compra </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="iprecoVenda" type="text" name="precoVenda" value="<?= $produto[3] ?>" maxlength="8" placeholder="Create a password" />
                            <label for="iprecoVenda"> Preço de Venda</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="iestoque" type="text" name="estoque" value="<?= $produto[4] ?>" maxlength="5" placeholder="Confirm password" />
                            <label for="iestoque">Estoque</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="ilinkImagem" type="text" name="linkImagem" value="<?= $produto[5] ?>" placeholder="Confirm password" />
                            <label for="ilinkImagem"> Imagem ( Link da Web)</label>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0 text-center">
                    <input type="hidden" name="produtos" value="atualizar">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="usuario" value="<?=$_SESSION["user"]["nome"];?>">
                    <a href="?produtos=listaProdutos" class="btn btn-warning me-5" type="reset"> Voltar </a>
                    <button class="btn btn-primary " type="submit"> Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#iprecoCompra').mask('000.000,00', {
            reverse: true
        });
        $('#iprecoVenda').mask('000.000,00', {
            reverse: true
        });
    });
</script>

