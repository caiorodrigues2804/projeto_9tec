<?php   
            require "../conexao.php";
            require "../conexao_2.php";
            require "validador_de_acessos.php";

            function mensagem_atencao($mesangem_nome,$cor)
            {
?>
        <div class="alert alert-<?= $cor; ?>">
                <p><?= $mesangem_nome; ?></p>
        </div>
<?php 
            } 

            if (!isset($_GET["id_cliente"])) {
                header("Location: gerenciamento_clientes.php");
            } else if (empty($_GET["id_cliente"])) {
                header("Location: gerenciamento_clientes.php");
            }

            $valor_cli = addslashes($_GET["id_cliente"]);
            $cmd_y = $pdo->prepare("SELECT * FROM `as_clientes` WHERE `cli_id` = :cl_d;");
            $cmd_y->bindValue(":cl_d","$valor_cli");
            $cmd_y->execute();
            $resultado = $cmd_y->fetch(PDO::FETCH_ASSOC);

            // DEPURAÇÃO
            // print_r($resultado);
                
            if (isset($_GET["alteracao"]) && !empty($_GET["alteracao"])) {
                if (isset($_POST)) {

                    // DEPURAÇÃO
                    // print_r($_POST);
                    // print 'Entrou';

                    $cmd_y2 = $pdo->prepare("SELECT * FROM `as_clientes`;");
                    $cmd_y2->execute();

                    $arr_dados = [];
                    $bolota = 0;


                    $query = "UPDATE `as_clientes` SET ";
                    foreach($cmd_y2->fetch(PDO::FETCH_ASSOC) as $key => $value):                        
                        if ($key <> 'cli_id' && $key <> 'cli_pass' && $key <> 'cli_pass' && $key <> 'cli_data_cad' && $key <> 'cli_hora_cad' && $key <> 'dados_extras' && $key <> 'status_clientes') 
                        {                            
                        $query .=  '`' . $key . '` = ' . "'" . $_POST[$key] . "', ";                 
                        } else if($key == 'status_clientes')
                        {
                            $valida_acesso;
                            if ($_POST['acesso_de_cliente'] == 'ativar_acesso')
                            {
                                $valida_acesso = 0;
                            } else if($_POST['acesso_de_cliente'] == 'bloquear_acesso')
                            {
                                $valida_acesso = 1;
                            }

                        $query .=  '`' . $key . '` = ' . $valida_acesso;                 
                        }
                               
                    endforeach;

                    $query .= " WHERE `cli_id` = " . addslashes($_GET["id_cliente"]);
                    $cmd_y_d = $pdo->prepare($query);
                    $cmd_y_d->execute();

                    
                    $url =  '<meta http-equiv="refresh" content="0; url=editar_cliente.php?id_cliente=' . $_GET["id_cliente"] . '">';
                    echo $url;                    

                }
            }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ADM</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>


        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">
                    <img src="../img/logo2.png" style="padding-right: 40px;" width="200px">
                    <br/>Área Administrativa
                </div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="produtos.php">Produtos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pedidos_dos_clientes.php">Pedidos dos clientes
                    <?php include('notificacao_adm.php'); ?>
                    </a>     

                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_clientes.php"> >>>  Gerenciamento de clientes</a>                                      
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_administrador.php">Gerenciamento de administradores</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="detalhes_da_conta.php">Detalhes da conta</a>                 
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logoff.php">Sair da conta</a>                    
                </div>
            </div>

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="produtos.php">Produtos ( x )</a>
                                        <a class="dropdown-item" href="pedidos_dos_clientes.php">Pedidos dos clientes</a>
                                        <a class="dropdown-item" href="gerenciamento_clientes.php">Gerenciamento de clientes</a>
                                        <a class="dropdown-item" href="gerenciamento_administrador.php">Gerenciamento de administradores</a>
                                        <a class="dropdown-item" href="detalhes_da_conta.php">Detalhes da conta</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logoff.php">Sair da conta</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


              <center>
<!------ dados do cadastro ---->
<section class="row" id="cadastro">
   <div class="mt-4"></div>
   <h4>Editar dados do cliente</h4>
   <hr>
   <div class="md-4">       
   <a href="gerenciamento_clientes.php"><button class="btn btn-success">Voltar</button></a>
   </div>
   <br><br>
<form name="cadcliente" id="cadcliente" method="post" action="editar_cliente.php?id_cliente=<?= $_GET["id_cliente"];?>&alteracao=1">
        
        <!-- NOME -->
        <div class="col-md-4">
            
            <label>Nome:</label>
            <input type="text" name="cli_nome" minlength="3" value="<?= $resultado["cli_nome"] ?>" class="form-control" required>

        </div>

        <!-- SOBRENOME -->
        <div class="col-md-4">
            
            <label>Sobrenome:</label>
            <input type="text" name="cli_sobrenome" minlength="3" value="<?= $resultado["cli_sobrenome"] ?>" class="form-control" required>

        </div>

        <!-- DATA DE NASCIMENTO -->
        <div class="col-md-3">
            
            <label>Data Nasc:</label>
            <input type="date" name="cli_data_nasc"  value="<?= $resultado["cli_data_nasc"] ?>" class="form-control" required>

        </div>

        <!-- RG -->
        <div class="col-md-2">
            
            <label>RG:</label>
            <input type="text" name="cli_rg"  value="<?= $resultado["cli_rg"] ?>" class="form-control" required>

        </div>

        <!-- CPF -->
        <div class="col-md-2">
            
            <label>CPF:</label>
            <input type="text" name="cli_cpf" class="form-control" value="<?= $resultado["cli_cpf"] ?>" minlength="11" maxlength="11" required>

        </div>

        <!-- DDD -->
        <div class="col-md-2">
            
            <label>DDD:</label>
            <input type="number" name="cli_ddd"  class="form-control" value="<?= $resultado["cli_ddd"] ?>" min="10" max="99" required>

        </div>

        <!-- FONE -->
        <div class="col-md-3">
            
            <label>Fone:</label>
            <input type="number" name="cli_fone"  value="<?= $resultado["cli_fone"] ?>" class="form-control" required>

        </div>

        <!-- CELULAR -->
        <div class="col-md-3">
            
            <label>Celular:</label>
            <input type="number" name="cli_celular"  value="<?= $resultado["cli_celular"] ?>" class="form-control" required>

        </div>
     
        
        <!-- ENDEREÇO -->
        <div class="col-md-6">
            
            <label>Endereço:</label>
            <input type="text" name="cli_endereco"  class="form-control" value="<?= $resultado["cli_endereco"] ?>"  minlength="4" required>

        </div>

        <!-- NÚMERO -->
        <div class="col-md-2">
            
            <label>Número:</label>
            <input type="text" name="cli_numero"  class="form-control" value="<?= $resultado["cli_numero"] ?>" required>

        </div>


        <!-- BAIRRO -->
        <div class="col-md-4">
            
            <label>Bairro:</label>
            <input type="text" name="cli_bairro"  class="form-control" minlength="3" value="<?= $resultado["cli_bairro"] ?>"  required>

        </div>

        <!-- CIDADE -->
        <div class="col-md-4">
            
            <label>Cidade:</label>
            <input type="text" name="cli_cidade"  class="form-control" minlength="3" value="<?= $resultado["cli_cidade"] ?>" required>

        </div>
        
        <!-- UF -->
        <div class="col-md-2">
            
            <label>UF:</label>
            <input type="text" name="cli_uf"  class="form-control" maxlength="2" minlength="2" value="<?= $resultado["cli_uf"] ?>" required>

        </div>

            <!-- CEP -->
        <div class="col-md-2">
            
            <label>CEP:</label>
            <input type="text" name="cli_cep"  class="form-control" minlength="8" maxlength="8"  value="<?= $resultado["cli_cep"] ?>" required>

        </div>

        <!-- EMAIL -->
        <div class="col-md-4">
        
            <label>Email:</label>
            <input type="email" name="cli_email"   value="<?= $resultado["cli_email"] ?>"  class="form-control" required>
        </div>    

        <hr>
        <h5>Status da conta</h5>
        <?php if($resultado["status_clientes"] == 0): ?>
            <br>
            <h5>Este cliente está com acesso ativo</h5>
        <?php elseif ($resultado["status_clientes"] == 1): ?>
            <br>
            <h5>Este cliente está com acesso bloqueado</h5>
        <?php endif; ?>
        <br>
        <select name="acesso_de_cliente">
            <?php if($resultado["status_clientes"] == 0): ?>
            <option value="ativar_acesso" selected>Ativar acesso</option>
            <option value="bloquear_acesso">Bloquear acesso</option>
        <?php elseif ($resultado["status_clientes"] == 1): ?>
            <option value="ativar_acesso">Ativar acesso</option>
            <option value="bloquear_acesso" selected>Bloquear acesso</option>
            <?php endif; ?>
        </select>

        <div class="mt-4"></div>
        <button class="btn btn-success">Aplicar alteração</button>
</section>  
        <div class="mb-4"></div>
    </body>
</html>
