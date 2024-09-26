<div class="container-fluid px-4">
    <h1 class="mt-4"> <?= $nomePagina; ?> </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"> <?= $nomePagina; ?> </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-table me-1"></i>
            <?= $nomePagina; ?>
        </div>
        <div class="card-body">
            <!-- formulário de cadastro -->
            <form action="model/funcionarios.php" method="post">
                <!-- nome e data de nascimento -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-floating mb-md-3">
                            <input class="form-control" id="inome" type="text" name="nome" maxlength="60" placeholder="Enter your first name" required />
                            <label for="inome"> Nome Completo</label>
                        </div>
                    </div>                    
                </div>
                <!-- email -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="iemail1" type="email" name="email" placeholder="Enter your E-mail" onblur="validateEmail()" required />
                            <label for="iemail1"> E-mail</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="iemail2" type="email" name="email2" placeholder="Enter your E-mail" onblur="validateEmail()" required />
                            <label for="iemail2"> Confirmar e-mail</label>
                        </div>
                    </div>
                </div>
                <!-- senha -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="isenha1" type="password" name="senha" placeholder="Enter your E-mail" onblur="validateSenha()" required />
                            <label for="isenha1"> Senha </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="isenha2" type="password" name="senha2" placeholder="Enter your E-mail" onblur="validateSenha()" required />
                            <label for="isenha2"> Confirmar Senha </label>
                        </div>
                    </div>
                </div>
                <!-- data nascimento e wpp -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="idataNasc" type="date" name="dataNasc" placeholder="Enter your E-mail" required />
                            <label for="idataNasc"> Data de Nascimento</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="dataAdmissao" type="date" name="dataAdmissao" placeholder="Create a password" required />
                            <label for="dataAdmissao"> Data de Admissão</label>
                        </div>
                    </div>
                </div>
                <!-- wpp -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="whatsapp" type="text" name="whatsapp" placeholder="Create a password" required />
                            <label for="whatsapp"> WhatsApp</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mb-0 text-center">
                    <input class="form-control" id="cargo" type="hidden" name="cargo" value="Funcionário" placeholder="name@example.com" required />
                    <input type="hidden" name="funcionario" value="novo">
                    <input type="hidden" name="usuario" value="<?=$_SESSION["user"]["nome"];?>">

                    <button class="btn btn-warning me-5" type="reset"> Limpar </button>
                    <button class="btn btn-primary " type="submit"> Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- validador de email e senha -->
<script src="view/assets/js/formulario.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#telefone').mask('(00) 0000-0000', {
            reverse: true
        });
        $('#whatsapp').mask('(00) 00000-0000', {
            reverse: true
        });
    });
</script>
