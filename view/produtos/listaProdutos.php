<?php $quantidadeProduto = count($dados); $custoEstoque = 0; $valorEstoque = 0; $lucroEstoque = 0;  ?>

<div class="container-fluid px-4">
  <div class="row d-flex justify-content-betwee align-items-center">
    <h1 class="mt-4 col-6"> <?= $nomePagina; ?> </h1>
    <div class="col-6 text-end"> <a href="?produtos=novoProduto" class="btn btn-primary mt-4 text-end"> Novo Produto </a> </div>
  </div>

  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
  </ol>

  <!-- Dashboard -->
  <div class="row">
    <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-sm-1 mb-md-4">
        <div class="card-header">
          <spam class="fw-bold">Produtos Cadastrados: </spam>
          <br>
          <spam class="small" id="quantidadeProduto"> 0 </spam>
        </div>
        <!-- <div class="card-header d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="#">View Details</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>        
        </div> -->
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-danger text-white mb-sm-1 mb-md-4">
        <div class="card-header">
          <spam class="fw-bold">Custo de Estoque: </spam>
          <br>
          <spam class="small" id="custoEstoque"> 0 </spam>
        </div>
        <!-- <div class="card-header d-flex align-items-center justify-content-between">        
        </div> -->
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-dark text-white mb-sm-1 mb-md-4">
        <div class="card-header">
          <spam class="fw-bold"> Valor do Estoque: </spam>
          <br>
          <spam class="small" id="valorEstoque"> 0 </spam>
        </div>
        <!-- <div class="card-header d-flex align-items-center justify-content-between">        
        </div> -->
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-success text-white mb-sm-1 mb-md-4">
        <div class="card-header">
          <spam class="fw-bold"> Lucro do Estoque: </spam>
          <br>
          <spam class="small" id="lucroEstoque"> 0 </spam>
        </div>
        <!-- <div class="card-header d-flex align-items-center justify-content-between">
        </div> -->
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card  my-4">
        <div class="card-header bg-primary text-white">
          <!-- <i class="fas fa-table me-1"></i> -->
          <strong> <?= $nomePagina; ?> </strong>
        </div>
        <!-- Tabela -->
        <div class="card-body">
          <table class="table table-striped table-hover table-responsive" id="datatablesSimple">
            <thead>
              <tr>
                <th> Nº </th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Códgio de Barra (EAN)</th>
                <th>Preço de Compra</th>
                <th>Preço de Venda</th>
                <th>Estoque</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($dados as $key => $linha) : ?>
                <?php
                $produto = explode(" - ", $linha);
                $token = base64_encode($linha);
                $custoEstoque += floatval($produto[2]) * floatval($produto[4]);
                $valorEstoque += floatval($produto[3]) * floatval($produto[4]);
                $lucroEstoque += (floatval($produto[3]) * floatval($produto[4])) - (floatval($produto[2]) * floatval($produto[4]));
                ?>
                <tr>
                  <td> <?= ($key + 1) ?> </td>
                  <td> <img src=" <?= $produto[5]; ?> " alt=" <?= $produto[0]; ?>" class="" width="50px" height="60px"> </td>
                  <td> <?= $produto[0]; ?> </td>
                  <td> <?= $produto[1]; ?> </td>
                  <td> R$ <?= number_format(floatval($produto[2]), 2, ",", "."); ?> </td>
                  <td> R$ <?= number_format(floatval($produto[3]), 2, ",", "."); ?> </td>
                  <td> <?= number_format(floatval($produto[4]), 0, "", "."); ?> </td>
                  <!-- ações -->
                  <td>
                    <div class="btn-sm-group" role="group">
                      <!-- Editar produto -->
                      <a href="?produtos=editarProduto&token=<?= $token ?>&id=<?= $key ?>" class="btn btn-primary" title="Editar">
                        <span class="iconify" data-icon="ph:pencil-bold"></span>
                      </a>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $key; ?>" title="Excluir">
                        <!-- Deletar Produto-->
                        <span class="iconify" data-icon="ph:trash-bold"></span>
                      </button>
                    </div>
                    <!-- Modal -->
                    <form action="model/produtos.php" method="post">
                      <div class="modal fade" id="staticBackdrop<?= $key; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel"> Excluir Produto</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Tem certeza que deseja excluir o produto <strong><?= $produto[0]; ?></strong>?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Não </button>
                              <input type="hidden" name="produtos" value="deletar">
                              <input type="hidden" name="id" value="<?= $key ?>">
                              <input type="hidden" name="nome" value="<?=$produto[0];?>">
                              <input type="hidden" name="usuario" value="<?=$_SESSION["user"]["nome"];?>">
                              <input type="hidden" name="">
                              <button type="submit" class="btn btn-danger"> Sim, excluir! </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th> Nº </th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Códgio de Barra (EAN)</th>
                <th>Preço de Compra</th>
                <th>Preço de Venda</th>
                <th>Estoque</th>
                <th>Ações</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      responsive: true,
    });

  });
</script>

<!-- Dashboard -->
<script>
  let quantidadeProduto = document.getElementById("quantidadeProduto");
  let custoEstoque = document.getElementById("custoEstoque");
  let valorEstoque = document.getElementById("valorEstoque");
  let lucroEstoque = document.getElementById("lucroEstoque");


  quantidadeProduto.innerText = ' <?= $quantidadeProduto ?> <?= (($quantidadeProduto == 1) ? "Produto" : "Produtos") ?>'
  custoEstoque.innerText = 'R$ <?= number_format($custoEstoque, 2, ",", ".") ?>'
  valorEstoque.innerText = 'R$ <?= number_format($valorEstoque, 2, ",", ".") ?>'
  lucroEstoque.innerText = 'R$ <?= number_format($lucroEstoque, 2, ",", ".") ?>'
</script>

<!-- Toastfy -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- frase do Toastfy -->
<script>
  function acao(condicao) {

    let frase = ''

    switch (condicao) {

      case "new":
        frase = "Produto cadastrado com sucesso!";
        break;

      case "update":
        frase = "Produto atualizado com sucesso!";
        break;

      case "delete":
        frase = "Produto excluído com sucesso!";
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

  <?= (isset($_GET["produto"]) ? "window.onload = msg('" . $_GET['produto'] . "')" : " "); ?>
</script>
