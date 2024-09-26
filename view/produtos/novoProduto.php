<div class="container-fluid px-4">
    <h1 class="mt-4"> <?= $nomePagina; ?> </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <!-- <i class="fas fa-table me-1"></i> -->
            <strong> <?= $nomePagina; ?>  </strong>
        </div>
        <div class="card-body">
            <!-- formulário de cadastro -->
            <form action="model/produtos.php" method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="nome" type="text" name="nome" maxlength="60" placeholder="Enter your first name" required />
                            <label for="nome"> Nome do Produto</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="codigo" type="text" name="codigo" maxlength="13" placeholder="Enter your last name" required />
                            <label for="codigo"> Código de Barra (EAN)</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="precoCompra" type="text" name="precoCompra" maxlength="8" placeholder="name@example.com" required />
                            <label for="precoCompra"> Preço de Compra </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="precoVenda" type="text" name="precoVenda" placeholder="Create a password" required />
                            <label for="precoVenda"> Preço de Venda</label>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="iestoque" type="text" name="estoque" maxlength="5" placeholder="Confirm password" required />
                            <label for="iestoque">Estoque</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="ilinkImagem" type="text" name="linkImagem" placeholder="Confirm password" />
                            <label for="ilinkImagem"> Imagem ( Link da Web)</label>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0 text-center">
                    <input type="hidden" name="produtos" value="cadastrar">
                    <input type="hidden" name="usuario" value="<?=$_SESSION["user"]["nome"];?>">
                    <button class="btn btn-warning me-5" type="reset"> Limpar </button>
                    <button class="btn btn-primary " type="submit"> Cadastrar</button>
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
            $('#precoCompra').mask('000.000,00', {
                reverse: true
            });
            $('#precoVenda').mask('000.000,00', {
                reverse: true
            });
        });
    </script>