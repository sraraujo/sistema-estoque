<div class="container-fluid px-4">
<div class="row d-flex justify-content-betwee align-items-center">
        <h1 class="mt-4 col-6"> <?= $nomePagina; ?> </h1>
        <div class="col-6 text-end"> <a href="?vendas=listaVendas" class="btn btn-primary mt-4 text-end"> Ver Vendas </a> </div>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="?page=dashboard"> Dashboard </a></li>
        <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <!-- <i class="fas fa-table me-1"></i> -->
            <strong> <?= $nomePagina; ?>  </strong>
        </div>
        <div class="card-body">
            <!-- formulário de cadastro -->
            <form action="model/vendas.php" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mt-2">
                            <div class="mb-md-4">
                                <h5>
                                    <label for="nome" class="form-label"> Nome / Descrição</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder1="Nome do Produto" maxlength="60" required>
                                </h5>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 mt-2">
                            <div class="mb-md-4">
                                <h5>
                                    <label for="valorUnitario" class="form-label"> Valor Unitário </label>
                                    <input type="text" class="form-control estoque valorUnitario" id="valorUnitario" name="valorUnitario" oninput="valorTotal.innerHTML = `R$ ${ (Number(quantidade.value) * Number(valorUnitario.value)).toFixed(2) }`" placeholder1="R$" required>
                                </h5>
                            </div>
                        </div>

                        <div class="row mt-md-3">
                            <div class="col-sm-12 col-md-4 mt-2">
                                <div class="mb-3">
                                    <h5>
                                        <label for="quantidade" class="form-label"> Quantidade </label>
                                        <input type="text" class="form-control" id="quantidade" name="quantidade" oninput="valorTotal.innerHTML = ` R$ ${ (Number(quantidade.value.replace(',', '.' ) * Number(valorUnitario.value.replace(',', '.' ))).toFixed(2)) } `" placeholder1="Codigo do Produto" maxlength="4" required>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-2">
                                <div class="mb-3">
                                    <h5>
                                        <label for="quantidade" class="form-label"> Valor Total </label>
                                        <output  class="form-control " id="valorTotal"> R$  </output>
                                        <!-- <input type="text" class="form-control" id="valorTotal" name="quantidade" placeholder1="Codigo do Produto" maxlength="4" value="" required disabled> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-2">
                                <div class="mb-3">
                                    <h5>
                                        <label for="formaPagamento" class="form-label">
                                            <!-- <span class="iconify" data-icon="material-symbols:point-of-sale-sharp" style="color: #000000;"></span> -->
                                            Forma de Pagamento
                                        </label>
                                    </h5>
                                    <!-- <input type="text" class="form-control valorUnitario" id="exampleFormControlInput1" placeholder1="Preço de Compra"> -->
                                    <select name="formaPagamento" id="formaPagamento" class="form-control" required>
                                        <option value="" disabled selected> Selecione </option>
                                        <option value="Dinheiro"> Dinheiro </option>
                                        <option value="Pix"> Pix </option>
                                        <option value="Cartão"> Cartão </option>
                                        <option value="Prazo"> À prazo </option>
                                        <option value="Vale"> Vale </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-4 mb-0 text-center">
                    <button class="btn btn-warning me-5" type="reset">
                        <span class="iconify" data-icon="ph:trash-bold" style="color: #000000;"></span>
                        Limpar
                    </button>

                    <button class="btn btn-primary " type="submit">
                        <span class="iconify" data-icon="material-symbols:save-sharp" style="color: #ffffff;"></span>
                        <input type="hidden" name="vendas" value="entradas">
                        <input type="hidden" name="usuario" value="<?=$_SESSION["user"]["nome"]?>">
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

    <!-- mascaras -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.valorUnitario').mask('000.000.000,00', {
                reverse: true
            });
            $('.valorTotal').mask('000.000.000,00', {
                reverse: true
            });
            $('#quantidade').mask('0.000', {
                reverse: true
            });
        });
    </script>
<!-- Toastfy -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<!-- frase do Toastfy -->
<script>
  function acao(condicao) {

    let frase = ''

    switch (condicao) {

      case "new":
        frase = "Venda cadastrada com sucesso!";
        break;

      case "update":
        frase = "Venda atualizada com sucesso!";
        break;

      case "delete":
        frase = "Venda excluída com sucesso!";
        break;
    }

    return frase;

  }

  function msg(condicao) {

    let frase = acao(condicao)

    Toastify({
      text: frase,
      duration: 3000,
      // destination: "",
      // newWindow: true,
      close: true,
      gravity: "top", // `top` or `bottom` 
      position: "right", // `left`, `center` or `right`
      stopOnFocus: true, // Prevents dismissing of toast on hover
      style: {
        background: "#00c541",
      },
    }).showToast();

  }

  <?= (isset($_GET["text"]) ? "window.onload = msg('" . $_GET['text'] . "')" : " "); ?>
</script>
