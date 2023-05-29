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
            // CATEGORIAS
            $categorias = (mysqli_query($con,"SELECT * FROM `as_produtos`;")->num_rows);
           

            if (isset($_GET["adicionar"])) {
                if (!empty($_GET["adicionar"])) {
                    if (isset($_POST["categoria_nome"])) {
                            // print 'Entrou';
                            $categoria_nome = addslashes($_POST["categoria_nome"]);

                            // VERIFICA SE EXISTE OU NÃO
                            $cmd = $pdo->prepare("SELECT COUNT(*) FROM `as_categorias` WHERE `cate_nome` = :categ");
                            $cmd->bindValue(":categ",$categoria_nome);
                            $cmd->execute();
                            $resultado = $cmd->fetch(PDO::FETCH_ASSOC);
                            // print_r($resultado);
                            if ($resultado["COUNT(*)"] <= 0):
                            $cmd = $pdo->prepare("INSERT INTO `as_categorias` (`cate_nome`,`cate_slug`) VALUES (:categ,:categ)");
                            $cmd->bindValue(":categ",$categoria_nome);
                            $cmd->execute();
                            mensagem_atencao("O categoria de produto " . $categoria_nome . " foi adicionado com sucesso!","success");
                            elseif ($resultado["COUNT(*)"] >= 1):
                                mensagem_atencao("Ops!! Já existe essa categoria com esse nome","danger");
                            endif;                            


                    }
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="produtos.php"> >>> Produtos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pedidos_dos_clientes.php">Pedidos dos clientes
                    <?php include('notificacao_adm.php'); ?>
                    </a>     

                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_clientes.php">Gerenciamento de clientes</a>                                      
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
                                        <a class="dropdown-item" href="pedidos_dos_clientes.php">
                                        Pedidos dos clientes
                                               <?php include('notificacao_adm.php'); ?>
                                      </a>
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

                    <div class="mt-4"></div>
                    <h4>Adicionar categorias de produtos</h4>
                    <div class="mt-4"></div>
                    <a href="categorias.php"><button class="btn btn-secondary">Voltar</button></a>
                    <div class="mt-2"></div>
                    <hr>
                    <form action="adicionar_categoria_produtos.php?adicionar=1" method="post">
                        <div class="col-lg-6">
                            
                               <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend3">Digite o nome</span>
                                </div>
                                <input type="text" class="form-control" id="validationServerUsername" aria-describedby="inputGroupPrepend3" min="3" name="categoria_nome" required>

                        </div>  
                        <br>
                        <button class="btn btn-success">Adicionar</button>
                    </form>

              </center>


            </div>
            
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
