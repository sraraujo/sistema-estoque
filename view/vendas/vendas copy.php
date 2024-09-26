<?php
$quantidadeRegistros = count($vendas);
$dinheiro = 0;
$pix = 0;
$cartao = 0;
$prazo = 0;
$vale = 0;
$aux = 0;
?>

<div class="container-fluid px-4">
    <div class="row d-flex justify-content-betwee align-items-center">
        <h1 class="mt-4 col-6"> <?= $nomePagina; ?> </h1>
        <div class="col-6 text-end"> <a href="?page=caixa" class="btn btn-primary mt-4 text-end"> Novo Registro </a> </div>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
    </ol>

    <!-- Dashboard -->
    <div class="row">
        <div class="col-xl-3 col-md-4 col-xl-4">
            <div class="card bg-primary text-white mb-sm-1 mb-md-4">
                <div class="card-header">
                    <spam class="fw-bold">Registros Cadastrados: </spam>
                    <br>
                    <spam class="small" id="quantidadeRegistros"> 0 </spam>
                </div>
                <!-- <div class="card-header d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>        
                </div> -->
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-xl-4">
            <div class="card bg-success text-white mb-sm-1 mb-md-4">
                <div class="card-header">
                    <spam class="fw-bold">Vendas em Dinheiro: </spam>
                    <br>
                    <spam class="small" id="dinheiro"> 0 </spam>
                </div>
                <!-- <div class="card-header d-flex align-items-center justify-content-between"></div> -->
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-xl-4">
            <div class="card bg-dark text-white mb-sm-1 mb-md-4">
                <div class="card-header">
                    <spam class="fw-bold"> Vendas em Pix: </spam>
                    <br>
                    <spam class="small" id="pix"> 0 </spam>
                </div>
                <!-- <div class="card-header d-flex align-items-center justify-content-between">        
                </div> -->
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-xl-4">
            <div class="card bg-secondary text-white mb-sm-1 mb-md-4">
                <div class="card-header">
                    <spam class="fw-bold"> Vendas em Cartão: </spam>
                    <br>
                    <spam class="small" id="cartao"> 0 </spam>
                </div>
                <!-- <div class="card-header d-flex align-items-center justify-content-between">
                </div> -->
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-xl-4">
            <div class="card bg-danger text-white mb-sm-1 mb-md-4">
                <div class="card-header">
                    <spam class="fw-bold"> Vendas à Prazo: </spam>
                    <br>
                    <spam class="small" id="prazo"> 0 </spam>
                </div>
                <!-- <div class="card-header d-flex align-items-center justify-content-between">
                </div> -->
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-xl-4">
            <div class="card bg-info text-white mb-sm-1 mb-md-4">
                <div class="card-header">
                    <spam class="fw-bold"> Vale: </spam>
                    <br>
                    <spam class="small" id="vale"> 0 </spam>
                </div>
                <!-- <div class="card-header d-flex align-items-center justify-content-between">
                </div> -->
            </div>
        </div>
    </div>

    <!-- div tabela -->
    <div class="row">
        <div class="col-12">
            <div class="card  my-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table me-1"></i>
                    <?= $nomePagina; ?>
                </div>
                <!-- Tabela -->
                <div class="card-body">
                    <table class="table table-striped table-hover table-responsive" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th> Nº </th>
                                <th> Nome </th>
                                <th> Quantidade </th>
                                <th> Valor </th>
                                <th> Forma de pagamento </th>
                                <th> Operador</th>
                                <th> Ações </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($vendas as $key => $linha) : ?>
                                <?php

                                $produto = explode(" - ", $linha);

                                switch (trim($produto[3])) {

                                    case "Dinheiro";
                                        $dinheiro += $produto[2];
                                        break;

                                    case "Pix";
                                        $pix += $produto[2];
                                        break;

                                    case "Cartão";
                                        $cartao += $produto[2];
                                        break;

                                    case "Prazo";
                                        $prazo += $produto[2];
                                        break;

                                    case "Vale";
                                        $vale += $produto[2];
                                        break;
                                }

                                ?>
                                <tr>
                                    <td> <?= ($key + 1) ?> </td>
                                    <td> <?= $produto[0]; ?> </td>
                                    <td> <?= $produto[1]; ?> </td>
                                    <td> R$ <?= number_format($produto[2], 2, ",", "."); ?> </td>
                                    <td> <?= $produto[3]; ?> </td>
                                    <td> <?= (isset($produto[4]) ? $produto[4] : "Adminsitrador"); ?> </td>
                                    <!-- ações -->
                                    <td>
                                        <div class="btn-sm-group" role="group">
                                            <!-- Editar produto -->
                                            <a href="?page=editarProduto&token=<?= $token ?>&id=<?= $key ?>" class="btn btn-primary" title="Editar">
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
                                                            <input type="hidden" name="action" value="deletar">
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

<!-- tabela responsiva -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true,
        });

    });
</script>

<!-- Dashboard -->
<script>
    let quantidadeRegistros = document.getElementById("quantidadeRegistros");
    let dinheiro = document.getElementById("dinheiro");
    let pix = document.getElementById("pix");
    let cartao = document.getElementById("cartao");
    let prazo = document.getElementById("prazo");
    let vale = document.getElementById("vale");


    quantidadeRegistros.innerText = '<?= $quantidadeRegistros <= 1 ? "$quantidadeRegistros registro" : "$quantidadeRegistros registros"; ?>'
    dinheiro.innerText = 'R$ <?= number_format($dinheiro, 2, ",", "."); ?>'
    pix.innerText = 'R$ <?= number_format($pix, 2, ",", "."); ?>'
    cartao.innerText = 'R$ <?= number_format($cartao, 2, ",", "."); ?>'
    prazo.innerText = 'R$ <?= number_format($prazo, 2, ",", "."); ?>'
    vale.innerText = 'R$ <?= number_format($vale, 2, ",", "."); ?>'
</script>