<?php   
            require "../conexao.php";
            require "../conexao_2.php";
            require "validador_de_acessos.php";
            // print_r($_SESSION["id"]);

            $cmd = $pdo->prepare("SELECT * FROM `administracao` WHERE `adm_id` = '$_SESSION[id]';");
            $cmd->execute(); 
            $resultado = $cmd->fetch(PDO::FETCH_ASSOC); 

            $cmd_s = $pdo->prepare("SELECT * FROM `as_produtos`;");
            $cmd_s->execute(); 
            $resultado_s = $cmd_s->fetchAll(PDO::FETCH_ASSOC); 

            // DEBUGGER
            // print_r($resultado_s);

            // PRODUTOS
            $produtos_retornados = (mysqli_query($con,"SELECT * FROM `as_produtos`;")->num_rows);
            // CATEGORIAS
            $categorias = (mysqli_query($con,"SELECT * FROM `as_categorias`;")->num_rows);

            $pagina = (!isset($_GET["pagina"])) ? 1 : $_GET["pagina"];

         if (isset($_GET["drop"])) 
            {
                if (!empty($_GET["drop"]))
                 {
                    $id_categs = addslashes($_GET["id"]);
                    $cmd = $pdo->prepare("DELETE FROM `as_produtos` WHERE `pro_id` = :id_c;");
                    $cmd->bindValue(":id_c",$id_categs);
                    $cmd->execute();
                    if (!isset($_GET["pagina"])) 
                    {                     
                       if (!isset($_GET["pesquisado"])) 
                        {                        
                        header("Location: produtos.php");
                        } else if(isset($_GET["pesquisado"]))
                        {
                        header("Location: produtos.php?pesquisado=" . $_GET["pesquisado"]);
                        }
                    } else if (isset($_GET["pagina"])) {
                        if(!isset($_GET["pesquisado"]))
                        {                            
                            header("Location: produtos.php?pagina=" . $_GET["pagina"]);
                        } else if(isset($_GET["pesquisado"]))
                        {
                            header("Location: produtos.php?pagina=" . $_GET["pagina"] . "&pesquisado=" . $_GET["pesquisado"]);
                        }
                    }
                }
            }
         if (isset($_GET["exclusao"]))
         {
            if (!empty($_GET["exclusao"]))
             {
                 $comando = $pdo->prepare("TRUNCATE TABLE `as_produtos`;");
                 $comando->execute();
                 mysqli_query($con,"INSERT INTO `as_produtos` (`pro_id`, `pro_categoria`, `pro_nome`, `pro_desc`, `pro_peso`, `pro_valor`, `pro_altura`, `pro_largura`, `pro_comprimento`, `pro_img`, `pro_slug`, `pro_estoque`, `pro_modelo`, `pro_ref`, `pro_fabricante`, `pro_ativo`, `pro_frete_free`, `pro_descricao_extra`) VALUES (0, NULL, NULL, NULL, '0.000', '0.00', '0', '0', '0', NULL, NULL, '0', NULL, NULL, NULL, 'NAO', 'NAO', NULL);");
                 mysqli_query($con,"UPDATE `as_produtos` SET `pro_id` = '0' WHERE `pro_id` = '1';");
                 header("Location: produtos.php");
             }    
         }

        $cmd;$pesquisa;
        if (!isset($_GET["pesquisado"])) 
        {        
            $cmd = $pdo->prepare("SELECT * FROM `as_produtos`;");
        } else 
        {
            $pesquisa = addslashes($_GET["pesquisado"]);
            $cmd = $pdo->prepare("SELECT * FROM `as_produtos` WHERE `pro_nome` LIKE '%$pesquisa%';");
        }
            $cmd->execute();
            $result = $cmd->fetchAll();

            // DEPURAÇÃO
            // print_r($result);

            $exibir = 8;

            $total = ceil((count($result)/$exibir));

            // DEPURAÇÃO
            // echo $total;

            $inicioExibir = ($exibir * $pagina) - $exibir;

            $inicioExibir;
            if($inicioExibir < 0)
            {
            $inicioExibir = 0;
            }

            $cmd = $pdo->prepare("SELECT * FROM `as_produtos` LIMIT $inicioExibir,$exibir;");
            $cmd->execute();
            $result1 = $cmd->fetchAll();
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

        <script>let valor_y,valor_x;</script>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pedidos_dos_clientes.php">Pedidos dos clientes  <?php include('notificacao_adm.php'); ?></a>  


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
                    <h4>Produtos</h4>
                    <div class="mt-3"></div>
<?php if($produtos_retornados >= 1){ ?>
                    <!-- PESQUISA -->
                    <div class="col-lg-6 mt-4">                        
                        <div class="input-group">
                           
                            <input type="text" id="campo_pesquisado" class="form-control" placeholder="Digite o nome do produto para pesquisar" value="<?php 
                            if(isset($_GET["pesquisado"])):
                                echo $_GET["pesquisado"]; 
                            endif;
                            ?>">                                     

                            <a href="javascript:                            
                                location.href = 'produtos.php?pesquisado=' + document.querySelector('#campo_pesquisado').value;               

                            ">
                                <button class="btn btn-info">🔎</button>
                            </a>
                            <?php if(isset($_GET["pesquisado"])): ?>
                                <a  style="margin-left: 5px;" href="produtos.php"><button class="btn btn-info">desfazer pesquisa</button></a>
                            <?php endif; ?>

                        </div>
                    </div>
                    <br> 
<?php } ?>
<?php if($categorias == 0){ ?>
                    <a href="categorias.php"><button class="btn btn-success">Categoria de produtos</button></a>
<?php } else if($categorias >= 1){ ?>
                    <a href="adicionar_produto.php"><button class="btn btn-success">Adicionar produto</button></a>
                    <a href="categorias.php"><button class="btn btn-success">Categoria de produtos</button></a>
<?php } ?>
<?php if($produtos_retornados >= 1){ ?>
    <a href="
     javascript:
              valor_y = 1;
              ConfirmDialog('Você tem certeza de que deseja excluir todos os produtos?');
    ">
                    <button class="btn btn-danger">Excluir todos os produtos</button>        
    </a>
<?php } ?>
                    <hr>
<?php if($produtos_retornados >= 1){ ?>
  <table class="table">
                        <thead>
                            <tr align="center">
                                <th scope="col">ID</th>
                                <th id="imagem_produtos" scope="col">Imagem</th>
                                <th scope="col">Nome</th>                                
                                <th scope="col">Valor</th> 
                                <th scope="col">Categoria</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                           
                                <?php 
                                $query;
                                if(!isset($_GET["pesquisado"])):
                                    $query = "SELECT * FROM `as_produtos` WHERE `pro_id` <> '0' LIMIT $inicioExibir,$exibir;";
                                elseif (isset($_GET["pesquisado"])):
                                    $query = "SELECT * FROM `as_produtos` WHERE `pro_nome` LIKE '%$pesquisa%' AND `pro_id` <> '0' LIMIT $inicioExibir,$exibir;";
                                endif;
                                    if($resultado = mysqli_query($con,$query)){
                                        while($x = $resultado->fetch_assoc()){
                                ?>
                                 <tr align="center">
                                    <td><?= $x["pro_id"]; ?></td>
                                    <td id="imagem_produtos"><img style="width: 90px;" src="<?= $x["pro_img"]; ?>"></td>
                                    <td><?= $x["pro_nome"]; ?></td>
                                    <td>R$                                         
                                        <?= number_format($x["pro_valor"],2,",","."); ?>
                                        </td>
                                    <td>
                                        <?php 
                                    $dados = mysqli_query($con,"SELECT cate_nome FROM as_produtos INNER JOIN as_categorias ON pro_categoria = cate_id WHERE pro_id = '$x[pro_id]'");
                                    print_r($dados->fetch_assoc()["cate_nome"]);
                                     
                                        ?>
                                    </td>
                                    <td>                                       
                                            <a href="editar_produto.php?id=<?= $x["pro_id"]; ?>">
                                                <button class="btn btn-secondary">✏️</button>
                                            </a>                                    
                                    </td>
                                    <td>   
                                        <a href="
                                             javascript:
                                           valor_y = 0;valor_x = (<?php print $x["pro_id"];?>);
                                           ConfirmDialog('Você tem certeza de que deseja excluir este produto?');
                                        ">                                    
                                        <button class="btn btn-danger">X</button>
                                        </a> 
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                        </thead>
                    </table>
<?php } ?>
<?php include("paginacao_php.php") ?>
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
      title: 'Excluir produto',
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
                location.href = 'produtos.php?drop=1&id=' + valor_x;
                <?php } else if(isset($_GET["pagina"])) { ?>
                location.href = 'produtos.php?drop=1&id=' + valor_x + '&pagina=' + <?= $_GET["pagina"] ?>;
                <?php } ?>
            <?php elseif (isset($_GET["pesquisado"])): ?>
                <?php if(!isset($_GET["pagina"])){ ?>
                 let caioba = '<?php print $_GET["pesquisado"]; ?>';
                 location.href = 'produtos.php?drop=1&id=' + valor_x + '&pesquisado=' + caioba;
                <?php } else if(isset($_GET["pagina"])) { ?>
                let caioba = '<?php print $_GET["pesquisado"]; ?>';
                location.href = 'produtos.php?drop=1&id=' + valor_x + '&pagina=' + <?= $_GET["pagina"] ?> + caioba;
                <?php } ?>
            <?php endif; ?>
              $(this).dialog("close");        
            } else if(valor_y >= 1)
            {
              location.href = 'produtos.php?exclusao=1';
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
    console.log(screen.width)
if (screen.width < 1280) {
        document.querySelectorAll("#imagem_produtos")[0].style.display = 'none';
        document.querySelectorAll("#imagem_produtos")[1].style.display = 'none';
}
</script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
