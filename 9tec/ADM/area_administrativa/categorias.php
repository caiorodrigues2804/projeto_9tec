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
            $categorias = (mysqli_query($con,"SELECT * FROM `as_categorias`;")->num_rows);
            $pagina = (!isset($_GET["pagina"])) ? 1 : $_GET["pagina"];

        $cmd;$pesquisa;
        if (!isset($_GET["pesquisado"])) 
        {        
            $cmd = $pdo->prepare("SELECT * FROM `as_categorias`;");
        } else 
        {
            $pesquisa = addslashes($_GET["pesquisado"]);
            $cmd = $pdo->prepare("SELECT * FROM `as_categorias` WHERE `cate_nome` LIKE '%$pesquisa%';");
        }
            $cmd->execute();
            $result = $cmd->fetchAll();

            // DEPURAÇÃO
            // print_r($result);

            $exibir = 10;

            $total = ceil((count($result)/$exibir));

            // DEPURAÇÃO
            // echo $total;

            $inicioExibir = ($exibir * $pagina) - $exibir;
     

            $cmd = $pdo->prepare("SELECT * FROM `as_categorias` LIMIT $inicioExibir,$exibir;");
            $cmd->execute();
            $result1 = $cmd->fetchAll();

            // DEPURAÇÃO
            // print_r($result1);

            if (isset($_GET["drop"])) 
            {
                if (!empty($_GET["drop"]))
                 {
                    $id_categs = addslashes($_GET["id"]);
                    $cmd = $pdo->prepare("DELETE FROM `as_categorias` WHERE `cate_id` = :id_c;");
                    $cmd->bindValue(":id_c",$id_categs);
                    $cmd->execute();
                    $cmd = $pdo->prepare("DELETE FROM `as_produtos` WHERE `pro_categoria` = :id_c;");
                    $cmd->bindValue(":id_c",$id_categs);
                    $cmd->execute();                    

                    if (!isset($_GET["pagina"])) 
                    {                     
                       if (!isset($_GET["pesquisado"])) 
                        {                        
                        header("Location: categorias.php");
                        } else if(isset($_GET["pesquisado"]))
                        {
                        header("Location: categorias.php?pesquisado=" . $_GET["pesquisado"]);
                        }
                    } else if (isset($_GET["pagina"])) {
                        if(!isset($_GET["pesquisado"]))
                        {                            
                            header("Location: categorias.php?pagina=" . $_GET["pagina"]);
                        } else if(isset($_GET["pesquisado"]))
                        {
                            header("Location: categorias.php?pagina=" . $_GET["pagina"] . "&pesquisado=" . $_GET["pesquisado"]);
                        }
                    }
                }
            }

         if (isset($_GET["exclusao"]))
         {
            if (!empty($_GET["exclusao"]))
             {
                 $comando = $pdo->prepare("TRUNCATE TABLE `as_categorias`;");
                 $comando->execute();
                 $comando = $pdo->prepare("TRUNCATE TABLE `as_produtos`;");
                 $comando->execute();
                 header("Location: categorias.php");
             }    
         }
        
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ADM</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
 
        <script>let valor_x,valor_y</script>
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
                    <h4>Categorias de produtos</h4>
                    <div class="mt-4"></div>
                    <a href="produtos.php"><button class="btn btn-secondary">Voltar</button></a>
                    <div class="mt-2"></div>

                        <a href="adicionar_categoria_produtos.php">
                            <button class="btn btn-success">Adicionar categoria de produtos</button>
                        </a>
                        <?php 
                            if(mysqli_query($con,"SELECT * FROM `as_categorias`;")->num_rows >= 1):
                        ?>
                        <a href="
                        javascript:
                          valor_y = 1;
                          ConfirmDialog('Você tem certeza de que deseja excluir todas as categorias de produtos? <br/> Todos os produtos também foram associados a essas categorias serão excluídos.');
                        ">
                            <button class="btn btn-danger">Excluir todas as categorias</button>
                        </a>

                    <?php endif; ?>
                    <br/>
                      <?php 
                            if(mysqli_query($con,"SELECT * FROM `as_categorias`;")->num_rows >= 1):
                        ?>
                    <!-- PESQUISA -->
                    <div class="col-lg-6 mt-4">                        
                        <div class="input-group">
                           
                            <input type="text" id="campo_pesquisado" class="form-control" placeholder="Digite o nome da categoria para pesquisar" value="<?php 
                            if(isset($_GET["pesquisado"])):
                                echo $_GET["pesquisado"]; 
                            endif;
                            ?>">                                     

                            <a href="javascript:                            
                                location.href = 'categorias.php?pesquisado=' + document.querySelector('#campo_pesquisado').value;               

                            ">
                                <button class="btn btn-info">🔎</button>
                            </a>
                            <?php if(isset($_GET["pesquisado"])): ?>
                                <a  style="margin-left: 5px;" href="categorias.php"><button class="btn btn-info">desfazer pesquisa</button></a>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endif; ?>
                    <hr>
                    <?php if($categorias >= 1): ?>
                    <table class="table">
                        <thead>
                            <tr align="center">
                                <th scope="col">ID</th>
                                <th scope="col">Nome da categoria</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                           
                                <?php 
                                $query;
                                if(!isset($_GET["pesquisado"])):
                                    $query = "SELECT * FROM `as_categorias` LIMIT $inicioExibir,$exibir;";
                                elseif (isset($_GET["pesquisado"])):
                                    $query = "SELECT * FROM `as_categorias` WHERE `cate_nome` LIKE '%$pesquisa%' LIMIT $inicioExibir,$exibir;";
                                endif;
                                    if($resultado = mysqli_query($con,$query)){
                                        while($x = $resultado->fetch_assoc()){
                                ?>
                                 <tr align="center">
                                    <td><?= $x["cate_id"]; ?></td>
                                    <td><?= $x["cate_nome"]; ?></td>
                                    <td>
                                        <a href="
                                        <?php 
                                        if(!isset($_GET["pesquisado"])){
                                        if(!isset($_GET["pagina"])): ?>
                                        editar_categoria.php?id=<?= $x["cate_id"]; ?>
                                        <?php elseif (isset($_GET["pagina"])): ?>
                                        editar_categoria.php?id=<?= $x["cate_id"]; ?>&pagina=<?= $_GET["pagina"];?>
                                        <?php endif; 
                                    } else if(isset($_GET["pesquisado"])){
                                        ?>
                                        <?php if(!isset($_GET["pagina"])): ?>
                                        editar_categoria.php?id=<?= $x["cate_id"]; ?>&pesquisado=<?= $_GET["pesquisado"];?>
                                        <?php elseif (isset($_GET["pagina"])): ?>
                                        editar_categoria.php?id=<?= $x["cate_id"]; ?>&pagina=<?= $_GET["pagina"];?>&pesquisado=<?= $_GET["pesquisado"]; ?>
                                        <?php endif; ?>
                                    <?php } ?>
                                        ">                                            
                                            <button class="btn btn-secondary">✏️</button>
                                        </a>
                                    </td>
                                    <td>
                                       <a href="
                                        javascript:
                                           valor_y = 0;valor_x = (<?php print $x["cate_id"];?>);
                                           ConfirmDialog('Você tem certeza de que deseja excluir esta categoria de produtos? <br/>Todos os produtos que foram relacionados a essa categoria também serão excluídos.');
                                       ">
                                        <button class="btn btn-danger">X</button>
                                        </a> 
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                        </thead>
                    </table>
                <?php elseif($categorias <= 0): ?>
                    <div class="col-md-8">
                    <div class="alert alert-danger"><p style="font-size: 20px;">Ops!! Nenhuma categoria de produto foi encontrada. Adicione uma nova categoria de produtos</p></div>
                    </div>                    
                <?php endif; ?>
                <?php include("paginacao_php.php"); ?>

              </center>         
            </div>            
        </div>

<script>
// ConfirmDialog('Tem certeza que quer excluir essa categoria de produtos');

function ConfirmDialog(message) {
  $('<div></div>').appendTo('body')
    .html('<div><h6>' + message + '</h6></div>')
    .dialog({
      modal: true,
      title: 'Excluir categoria de produtos',
      zIndex: 10000,
      autoOpen: true,
      width: 'auto',
      resizable: false,
      buttons: {
        Sim: function() {
          // $(obj).removeAttr('onclick');                                
          // $(obj).parents('.Parent').remove();
            if(valor_y == 0)
            {
            <?php if(!isset($_GET["pesquisado"])): ?>
                <?php if(!isset($_GET["pagina"])){ ?>
                location.href = 'categorias.php?drop=1&id=' + valor_x;
                <?php } else if(isset($_GET["pagina"])) { ?>
                location.href = 'categorias.php?drop=1&id=' + valor_x + '&pagina=' + <?= $_GET["pagina"] ?>;
                <?php } ?>
            <?php elseif (isset($_GET["pesquisado"])): ?>
                <?php if(!isset($_GET["pagina"])){ ?>
                 let caioba = '<?php print $_GET["pesquisado"]; ?>';
                 location.href = 'categorias.php?drop=1&id=' + valor_x + '&pesquisado=' + caioba;
                <?php } else if(isset($_GET["pagina"])) { ?>
                let caioba = '<?php print $_GET["pesquisado"]; ?>';
                location.href = 'categorias.php?drop=1&id=' + valor_x + '&pagina=' + <?= $_GET["pagina"] ?> + caioba;
                <?php } ?>
            <?php endif; ?>
              $(this).dialog("close");        
            } else if(valor_y >= 1)
            {
              location.href = 'categorias.php?exclusao=1';
              $(this).dialog("close"); 
            }

        },
        Nao: function() {
 

          $(this).dialog("close");
        }
      },
      close: function(event, ui) {
        $(this).remove();
      }
    });
};

// let bolota = 0;
// for (var i = 0;i <= document.querySelectorAll("#valor_indice").length; i++) 
// {
//     bolota+=1;
//     document.querySelectorAll("#valor_indice")[i].innerText = bolota;
// }
</script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
