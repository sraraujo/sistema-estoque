<?php

    $quantidadeProduto = count($dados);
    $custoEstoque = 0;
    $valorEstoque = 0;
    $lucroEstoque = 0;

    foreach ($dados as $key => $linha) {

        $produto = explode(" - ", $linha);

        $custoEstoque += floatval($produto[2]) * floatval($produto[4]);
        $valorEstoque += floatval($produto[3]) * floatval($produto[4]);
        $lucroEstoque += (floatval($produto[3]) * floatval($produto[4])) - (floatval($produto[2]) * floatval($produto[4]));
    }

?>

<div class="container-fluid px-4">
    <h1 class="mt-4"> <?= $nomePagina; ?> </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
    </ol>
    
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header"> Quantidade de Produtos </div>
                <div class="card-header d-flex align-items-center justify-content-between">
                    <!-- <a class="small text-white stretched-link" href="#">View Details</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                    
                    <h5> <?= $quantidadeProduto; ?> produtos cadastrados </h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-header"> Custo de Estoque </div>
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5> R$ <?= number_format($custoEstoque, 2, ",", "."); ?> </h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-black text-white mb-4">
                <div class="card-header"> Valor do Estoque </div>
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5> R$ <?= number_format($valorEstoque, 2, ",", "."); ?> </h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-header"> Lucro do Estoque </div>
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5> R$ <?= number_format($lucroEstoque, 2, ",", "."); ?> </h5>
                </div>
            </div>
        </div>
    </div>
</div>