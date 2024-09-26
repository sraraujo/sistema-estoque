<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <!-- dashboard -->
                <a class="nav-link" href="?dados=dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <!-- registrar vendas -->
                <div class="" id="">
                    <nav class=" nav">
                        <a class="nav-link" href="?vendas=novaVenda">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="1.2rem" height="1.2rem" viewBox="0 0 32 32"><path fill="currentColor" d="M4 7a1 1 0 0 0 0 2h2.22l2.624 10.5c.223.89 1.02 1.5 1.937 1.5h12.47c.903 0 1.67-.6 1.907-1.47L27.75 10h-2.094l-2.406 9H10.78L8.157 8.5A1.984 1.984 0 0 0 6.22 7zm18 14c-1.645 0-3 1.355-3 3s1.355 3 3 3s3-1.355 3-3s-1.355-3-3-3m-9 0c-1.645 0-3 1.355-3 3s1.355 3 3 3s3-1.355 3-3s-1.355-3-3-3m3-14v5h-3l4 4l4-4h-3V7zm-3 16c.564 0 1 .436 1 1s-.436 1-1 1s-1-.436-1-1s.436-1 1-1m9 0c.564 0 1 .436 1 1s-.436 1-1 1s-1-.436-1-1s.436-1 1-1"/></svg>
                            Nova Venda
                        </a>
                    </nav>
                </div>
                <!-- Hsitorico de vendas -->
                <div class="" id="">
                    <nav class=" nav">
                        <a class="nav-link" href="?vendas=listaVendas">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="0.9rem" height="1.2rem" viewBox="0 0 384 512"><path fill="currentColor" d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48M96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24m0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24m0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24m96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24s-24-10.7-24-24s10.7-24 24-24m128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8z"/></svg>
                            Histórico de Vendas
                        </a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Módulos</div>
                <!-- produtos -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7l8.7 5l8.7-5M12 22V12"/></g></svg>
                    Estoque
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="?produtos=listaProdutos"> Lista de Produtos </a>
                        <a class="nav-link" href="?produtos=novoProduto"> Novo Produto </a>
                    </nav>
                </div>
                <?php if($_SESSION["user"]["privilegio"] == "Administrador"):?>
                    <!-- funcionario -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#funcionarios" aria-expanded="false" aria-controls="funcionarios">
                        <div class="sb-nav-link-icon">
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><path fill="currentColor" d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5S4.5 6.505 4.5 8.5S6.005 12 8 12"/></svg>
                        Funcionários
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="funcionarios" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="?funcionarios=listaFuncionarios">Lista de Funcionários</a>
                            <a class="nav-link" href="?funcionarios=novoFuncionario">Novo Funcionário</a>
                        </nav>
                    </div>
                <?php endif; ?>
                <!-- clientes -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#cliente" aria-expanded="false" aria-controls="cliente">
                    <div class="sb-nav-link-icon">
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><path fill="currentColor" d="M12 5.5A3.5 3.5 0 0 1 15.5 9a3.5 3.5 0 0 1-3.5 3.5A3.5 3.5 0 0 1 8.5 9A3.5 3.5 0 0 1 12 5.5M5 8c.56 0 1.08.15 1.53.42c-.15 1.43.27 2.85 1.13 3.96C7.16 13.34 6.16 14 5 14a3 3 0 0 1-3-3a3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3a3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.54 5.54 0 0 0 1.13-3.96c.45-.27.97-.42 1.53-.42M5.5 18.25c0-2.07 2.91-3.75 6.5-3.75s6.5 1.68 6.5 3.75V20h-13zM0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9c-.59.68-.95 1.62-.95 2.65V20zm24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65c2.56.34 4.45 1.51 4.45 2.9z"/></svg>
                    Clientes
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="cliente" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="?clientes=listaClientes">Lista de Clientes</a>
                        <a class="nav-link" href="?clientes=novoCliente">Novo Cliente</a>
                    </nav>
                </div>
                <!-- fornecedores -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#fornecedores" aria-expanded="false" aria-controls="fornecedores">
                    <div class="sb-nav-link-icon">
                    </div> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="1.5rem" height="1.2rem" viewBox="0 0 640 512"><path fill="currentColor" d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48v320c0 26.5 21.5 48 48 48h16c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16M160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48m320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48m80-208H416V144h44.1l99.9 99.9z"/></svg>
                    Fornecedores
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="fornecedores" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="?fornecedores=listaFornecedores"> Ver Fornecedores </a>
                        <a class="nav-link" href="?fornecedores=novoFornecedor"> Novo Fornecedor</a>
                    </nav>
                </div>
                <?php if($_SESSION["user"]["privilegio"] == "Administrador"):?>
                    <!-- Adminsitrativo -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#administrativo" aria-expanded="false" aria-controls="administrativo">
                        <div class="sb-nav-link-icon">
                        <!-- <i class="fas fa-columns"></i> -->
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><path fill="currentColor" d="M3 20h18v2H3zm18-1H3L2.147 7.81A2 2 0 1 1 5 6a2 2 0 0 1-.024.3l2.737 2.189l2.562-4.486A1.95 1.95 0 0 1 10 3a2 2 0 0 1 4 0a1.95 1.95 0 0 1-.276 1.004l2.558 4.485l2.741-2.19A2 2 0 0 1 19 6a2 2 0 1 1 2.853 1.81ZM4.92 17h14.16l.73-8.77l-4.106 3.281L12 5.017l-3.71 6.494l-4.1-3.28Z"/></svg>
                        Administrativo
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="administrativo" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="?admin=historico"> Históricos </a>
                            <a class="nav-link" href="?admin=sistemaPonto"> Sistema de ponto</a>
                        </nav>
                    </div>
                <?php endif;?>
                <!-- Sair -->
                <div class="" id="">
                    <nav class=" nav">
                        <a class="nav-link" href="view/pagina-admin/logout.php">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-2" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><path fill="currentColor" d="M4 15h2v5h12V4H6v5H4V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1zm6-4V8l5 4l-5 4v-3H2v-2z"/></svg>
                            Sair    
                        </a>
                    </nav>
                </div>                
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small"> Logado às: <?= str_replace(":", "h", $_SESSION["user"]["hora"]); ?></div>
            Nome: <?= $_SESSION["user"]["nome"]; ?>
        </div>
    </nav>
</div>
