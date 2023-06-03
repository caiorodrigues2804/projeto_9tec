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

if (!isset($_GET['id'])) 
{ 
    header("Location: categorias.php");
}  if(empty($_GET['id']))
{
    header("Location: categorias.php");
}
    $cate_iden = $_GET["id"];
    $cate_iden = addslashes($cate_iden);

    $cmd = $pdo->prepare("SELECT * FROM `as_categorias` WHERE `cate_id` = :d_b;");
    $cmd->bindValue(":d_b",$cate_iden);
    $cmd->execute();
    $resultado = $cmd->fetch(PDO::FETCH_ASSOC);

            $cate_iden = addslashes($_GET["id"]);
            if(mysqli_query($con,"SELECT * FROM `as_categorias` WHERE `cate_id` = '$cate_iden';")->num_rows <= 0)
            {
                header("Location: categorias.php");
            }
          
    // DEBUGGER
    // print_r($resultado);

    if (isset($_GET["alteracao"])) 
    {
            if (!empty($_GET["alteracao"])) {
                if (isset($_POST["categoria_nome"])) {

                    // DEBUGGER
                    // print_r($_POST);

                    $id_cate = addslashes($_GET["id"]);
                    $nome_categ = addslashes($_POST["categoria_nome"]);
                    $cmd = $pdo->prepare("SELECT COUNT(*) count FROM `as_categorias` WHERE `cate_id` <> :ca_id AND `cate_nome` = :ca_nome;");
                    $cmd->bindValue(":ca_id",$id_cate);
                    $cmd->bindValue(":ca_nome",$nome_categ);
                    $cmd->execute();
                    if(($cmd->fetch(PDO::FETCH_OBJ)->count) <= 0):                        
                        $cmd = $pdo->prepare("UPDATE `as_categorias` SET `cate_nome` = :ca_nomes, `cate_slug` = :ca_slugs WHERE `cate_id` = :cate_id;");
                        $cmd->bindValue(":ca_nomes",$nome_categ);
                        $cmd->bindValue(":ca_slugs",$nome_categ);
                        $cmd->bindValue(":cate_id",$id_cate);
                        $cmd->execute();
                        header("Location: editar_categoria.php?id=" . $id_cate . "&alteracao_s=1");
                    else:
                        mensagem_atencao("Ops!! Já existe esse nome","danger");
                    endif;

                }
            }
    }

    if (isset($_GET["alteracao_s"]))
    {
        if (!empty($_GET["alteracao_s"])) 
        {
                mensagem_atencao("Foi alterado com sucesso!","success");
                $url =  '<meta http-equiv="refresh" content="2; url=editar_categoria.php?id=' . $_GET["id"] . '">';
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

                    <div class="mt-4"></div>
                    <h4>Editar</h4>
                    <div class="mt-4"></div>

                    <a href="

                    <?php 
                    if(!isset($_GET["pesquisado"])){
                    if(!isset($_GET["pagina"])): ?>
                    categorias.php
                    <?php elseif (isset($_GET["pagina"])): ?>
                    categorias.php?pagina=<?php print $_GET["pagina"]; ?>
                    <?php endif; 
                    } else if($_GET["pesquisado"]){
                        if(!isset($_GET["pagina"])):
                    ?>
                        categorias.php?pesquisado=<?php print $_GET["pesquisado"]; ?>
                        <?php elseif (isset($_GET["pagina"])): ?>
                        categorias.php?pesquisado=<?php print $_GET["pesquisado"]; ?>&pagina=<?php print $_GET["pagina"]; ?>
                        <?php endif; ?>
                    <?php } ?>
                    ">
                        <button class="btn btn-secondary">
                            Voltar
                        </button>
                    </a>

                    <div class="mt-2"></div>
                    <hr>
                    <form action="editar_categoria.php?alteracao=1&id=<?= $_GET["id"]; ?>" method="post">
                        <div class="col-lg-6">
                                                           
                                <input type="text" class="form-control" id="validationServerUsername" aria-describedby="inputGroupPrepend3" value="<?= $resultado["cate_nome"]; ?>" min="3" name="categoria_nome" required>

                        </div>  
                        <br>
                        <button class="btn btn-success">Aplicar alteração</button>
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
