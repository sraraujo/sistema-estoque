<?php $quantidadeClientes = count($clientes); ?>

<div class="container-fluid px-4">
  <div class="row d-flex justify-content-betwee align-items-center">
    <h1 class="mt-4 col-6"> <?= $nomePagina; ?> </h1>
    <div class="col-6 text-end"> <a href="?clientes=novoCliente" class="btn btn-primary mt-4 text-end"> Novo Cliente </a> </div>
  </div>

  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active"> <?= $nomePagina; ?> <spam class="" id="quantidadeClientes"> </spam> </li>
  </ol>

  <div class="row">
    <div class="col-12">
      <div class="card  my-4">
        <div class="card-header bg-primary text-white">
          <!-- <span class="iconify me-1" data-icon="fluent:database-person-24-filled" style="color: #ffffff;"></span> -->
          <strong> <?= $nomePagina; ?> </strong>
        </div>
        <!-- Tabela -->
        <div class="card-body">
          <table class="table table-striped table-hover table-responsive" id="datatablesSimple">
            <thead>
              <tr>
                <th> Idº </th>
                <th> Nome </th>
                <th> Data Nasc </th>
                <th> Endereço </th>
                <th> Bairro </th>
                <th> E-mail </th>
                <th> WhatsApp </th>
                <th> Ativo ? </th>
                <th> Cadastrado em </th>
                <th> Ações </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($clientes as $key => $linha) : 
                $cadaCliente = explode(" - ", $linha);
                $token = base64_encode($linha);

                $data = DateTime::createFromFormat('Y-m-d', $cadaCliente[1]);
                $cadaCliente[1] = $data->format("d-m-Y");

                $dataCadastro = DateTime::createFromFormat('Y-m-d', trim($cadaCliente[7]));
                $cadaCliente[7] = $dataCadastro->format("d-m-Y");
              ?>
                <tr>
                  <td> <?= ($key + 1) ?> </td>
                  <td> <?= $cadaCliente[0]; ?> </td>
                  <td> <?= $cadaCliente[1]; ?> </td>
                  <!-- <td> <?= $cadaCliente[2]; ?> </td> -->
                  <td> <?= $cadaCliente[2]; ?> </td>
                  <td> <?= $cadaCliente[3]; ?> </td>
                  <td> <?= $cadaCliente[4]; ?> </td>
                  <td> <?= $cadaCliente[5]; ?> </td>
                  <td> <?= ($cadaCliente[6] == 0) ? "Não" : "Sim"; ?> </td>
                  <td> <?= $cadaCliente[7]; ?> </td>
                  <!-- ações -->
                  <td>
                    <div class="btn-sm-group" role="group">
                      <!-- Editar cadaCliente -->
                      <a href="?clientes=editarCliente&token=<?= $token ?>&id=<?= $key ?>" class="btn btn-primary" title="Editar">
                        <span class="iconify" data-icon="ph:pencil-bold"></span>
                      </a>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $key; ?>" title="Excluir">
                        <!-- Deletar Cliente-->
                        <span class="iconify" data-icon="ph:trash-bold"></span>
                      </button>
                    </div>
                    <!-- Modal -->
                    <form action="model/clientes.php" method="post">
                      <div class="modal fade" id="staticBackdrop<?= $key; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel"> Excluir Cliente</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Tem certeza que deseja excluir o cliente <strong><?= $cadaCliente[0]; ?></strong>?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Não </button>
                              <input type="hidden" name="cliente" value="deletar">
                              <input type="hidden" name="id" value="<?= $key ?>">
                              <input type="hidden" name="nome" value="<?= $cadaCliente[0] ?>">
                              <input type="hidden" name="usuario" value="<?= $_SESSION["user"]["nome"]; ?>">
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
  let quantidadeClientes = document.getElementById("quantidadeClientes");

  quantidadeClientes.innerText = '(<?= $quantidadeClientes ?>)';
</script>

<!-- Toastfy -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- frase do Toastfy -->
<script>
  function acao(condicao) {

    let frase = ''

    switch (condicao) {

      case "new":
        frase = "Cliente cadastrado com sucesso!";
        break;

      case "update":
        frase = "Cliente atualizado com sucesso!";
        break;

      case "delete":
        frase = "Cliente excluído com sucesso!";
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
