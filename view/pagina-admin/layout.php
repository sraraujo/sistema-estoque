<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=0.9, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Jota Dev" />
    <title> <?= $titulo; ?> </title>
    <!-- SEO -->
    <meta property="og:type" content="Sistema de Gestão"/>
    <meta property="og:title" content="<?= $titulo ?> - sistema de gestão e estoque"/>
    <meta property="og:image" content="https://raw.githubusercontent.com/sraraujo/padaria-xavier/main/imagens/logo1.jpg"/>
    <meta property="og:description" content="Sistema de gestão e estoque para axuliar na empresa <?= $titulo ?>"/>
    <meta property="og:site_name" content="<?= $titulo ?>"/>
    <!-- favicon -->
    <?php include_once "view/componentes/favicon.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="view/template/css/styles.css" rel="stylesheet" />
    <!-- toastfy -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <!-- sidebar horizontal -->
    <?php include_once "view/componentes/sidebar-horizontal.php"; ?>

    <div id="layoutSidenav">

        <!-- sidebar vertical -->
        <?php include_once "view/componentes/sidebar-vertical.php"; ?>

        <div id="layoutSidenav_content">
            <main>
                <?php pageContent(); ?>
            </main>

            <!-- footer -->
            <!-- <?php include_once "view/componentes/footer.php"; ?> -->

        </div>
    </div>
    <!-- iconify -->
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="view/template/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="view/template/assets/demo/chart-area-demo.js"></script>
    <script src="view/template/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="view/template/js/datatables-simple-demo.js"></script>

    <!-- modal -->
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>   

</body>

</html>