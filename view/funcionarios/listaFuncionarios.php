<div class="container-fluid px-4">
  <div class="row d-flex justify-content-betwee align-items-center">
    <h1 class="mt-4 col-6"> <?= $nomePagina; ?> </h1>
    <div class="col-6 text-end"> <a href="?funcionarios=novoFuncionario" class="btn btn-primary mt-4 text-end"> Novo Funcionário </a> </div>
  </div>

  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active"> <?= $nomePagina; ?> <span id="quantidadeFuncionario"></span> </li>    
  </ol>


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
                <th> N° </th>
                <th> Nome </th>
                <th> E-mail </th>
                <th> WhatsApp</th>
                <th> Cargo </th>
                <th> D. Nasc </th>
                <th> Privilégio </th>
                <th> Ativo? </th>
                <th> Admissão </th>
                <th> Cadastro </th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($funcionarios as $key => $linha) : ?>
                <?php
                  $funcionario = explode(" - ", $linha);
                  $token = base64_encode($linha);
                ?>

                <tr>
                  <td> <?= ($key + 1) ?> </td>
                  <!-- nome -->
                  <td> <?= str_replace("@", "-", $funcionario[0]); ?> </td>
                  <!-- e-mail -->
                  <td> <?= str_replace("/", "-", $funcionario[1]); ?> </td>
                  <!-- wpp -->
                  <td> <?= str_replace("/", "-", $funcionario[5]); ?> </td>
                  <!-- cargo -->
                  <td> <?= $funcionario[6]; ?> </td>
                  <!-- data nascimento -->
                  <td> <?= $funcionario[3]; ?> </td>
                  <!-- privilegio -->
                  <td> <?= $funcionario[8]; ?> </td>
                  <!-- ativo ? -->
                  <td> <?= $funcionario[9]; ?> </td>
                  <!-- Data de admissão -->
                  <td> <?= $funcionario[4]; ?> </td>
                  <!-- data cadastro -->
                  <td> <?= $funcionario[7]; ?> </td>
                  
                  <!-- ações -->
                  <td>
                    <div class="btn-sm-group" role="group">
                      <!-- Editar usu$funcionario -->
                      <a href="?funcionarios=editarFuncionario&token=<?= $token ?>&id=<?= $key ?>" class="btn btn-primary" title="Editar">
                        <span class="iconify" data-icon="ph:pencil-bold"></span>
                      </a>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $key; ?>" title="Excluir">
                        <!-- Deletar Funcionario-->
                        <span class="iconify" data-icon="ph:trash-bold"></span>
                      </button>
                    </div>
                    <!-- Modal -->
                    <form action="model/funcionarios.php" method="post">
                      <div class="modal fade" id="staticBackdrop<?= $key; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel"> Excluir funcionário</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Tem certeza que deseja excluir o funcionário <strong><?= $funcionario[0]; ?></strong>?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Não </button>
                              <input type="hidden" name="funcionario" value="deletar">
                              <input type="hidden" name="nome" value="<?= $funcionario[0]; ?>">
                              <input type="hidden" name="usuario" value="<?=$_SESSION["user"]["nome"]?>">
                              <input type="hidden" name="id" value="<?= $key ?>">
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
            <!-- <tfoot>
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
            </tfoot> -->
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

  });3
</script>

<!-- Dashboard -->
<script>
  let quantidadeFuncionario = document.getElementById("quantidadeFuncionario");

  quantidadeFuncionario.innerText = ' (<?= count($funcionarios); ?>) '
</script>

<!-- Toastfy -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- frase do Toastfy -->
<script>
  function acao(condicao) {

    let frase = ''

    switch (condicao) {

      case "new":
        frase = "Funcionário cadastrado com sucesso!";
        break;

      case "update":
        frase = "Funcionário atualizado com sucesso!";
        break;

      case "delete":
        frase = "Funcionário excluído com sucesso!";
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

  <?= (isset($_GET["user"]) ? "window.onload = msg('" . $_GET['user'] . "')" : " "); ?>
</script>
