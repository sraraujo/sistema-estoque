<div class="container-fluid px-4">
  <div class="row d-flex justify-content-betwee align-items-center">
    <h1 class="mt-4 col-6"> <?= $nomePagina; ?> </h1>
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
                <th> Contéudo</th>
                <th> Operador </th>
                <th> Cadastrado em </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($logs as $key => $linha) : 
                $dadosLog = explode(" - ", $linha);

                $dataCadastro = DateTime::createFromFormat('Y/m/d', $dadosLog[2]);
                
              ?>
                <tr>
                  <td> <?= ($key + 1) ?> </td>
                  <td> <?= $dadosLog[0]; ?> </td>
                  <td> <?= $dadosLog[1]; ?> </td>
                  <td> <?= $dadosLog[2]." - ".$dadosLog[3]; ?> </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th> Idº </th>
                <th> Contéudo</th>
                <th> Operador </th>
                <th> Cadastrado em </th>
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