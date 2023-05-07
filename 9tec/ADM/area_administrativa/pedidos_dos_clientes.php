<?php 
            require "../conexao.php";
            require "../conexao_2.php";
            require "validador_de_acessos.php";

            if (isset($_GET["concluido_g"])) 
            {
                if ($_GET["concluido_g"] >= 1)
                {
                   $cmd = $pdo->prepare("UPDATE `as_pedidos` SET `concluido` = '1';");
                   $cmd->execute();

                   if (isset($_GET["pagina"]))
                    {
                        header("Location: pedidos_dos_clientes.php?pagina=" . $_GET["pagina"]);
                    } else if (!isset($_GET["pagina"])) {
                        header("Location: pedidos_dos_clientes.php");
                    }

                } else if($_GET["concluido_g"] <= 0) 
                {
                    $cmd = $pdo->prepare("UPDATE `as_pedidos` SET `concluido` = '0';");
                    $cmd->execute();

                    if (isset($_GET["pagina"]))
                    {
                        header("Location: pedidos_dos_clientes.php?pagina=" . $_GET["pagina"]);
                    } else if (!isset($_GET["pagina"])) {
                        header("Location: pedidos_dos_clientes.php");
                    }
                }
            }

            if (isset($_GET["pedido_concluido"])) 
            {
                if (!empty($_GET["pedido_concluido"]))
                 {


                // DEPURAÇÃO
                // $cmd = $pdo->prepare("SELECT * FROM `as_pedidos` WHERE `ped_id` = :pedido_id");
                // $cmd->bindValue(":pedido_id",addslashes($_GET["pedido_concluido"]));
                // $cmd->execute();

                // print_r($cmd->fetchAll(PDO::FETCH_ASSOC)["concluido"]);
                // $valor = intval($cmd->fetchAll(PDO::FETCH_ASSOC)["concluido"]);
                // print gettype($valor);

                // if($valor <= 0):


                //     $cmd = $pdo->prepare("UPDATE `as_pedidos` SET `concluido` = '1' WHERE `ped_id` = :pedido_id;");
                //     $cmd->bindValue(":pedido_id",addslashes($_GET["pedido_concluido"]));
                //     $cmd->execute();

                // elseif ($valor >= 1):
                //     print 'Entrou!';

                //     $cmd = $pdo->prepare("UPDATE `as_pedidos` SET `concluido` = '0' WHERE `ped_id` = :pedido_id;");
                //     $cmd->bindValue(":pedido_id",addslashes($_GET["pedido_concluido"]));
                //     $cmd->execute();

                // endif;


                $id_pedido = addslashes($_GET["pedido_concluido"]);
                $x = mysqli_query($con,"SELECT * FROM `as_pedidos` WHERE `ped_id` = '$id_pedido';")->fetch_assoc();
                $valor = intval($x["concluido"]);                

                 if($valor <= 0):


                    $cmd = $pdo->prepare("UPDATE `as_pedidos` SET `concluido` = '1' WHERE `ped_id` = :pedido_id;");
                    $cmd->bindValue(":pedido_id",addslashes($_GET["pedido_concluido"]));
                    $cmd->execute();

                    if(isset($_GET["pagina"])):
                        header("Location:  pedidos_dos_clientes.php?pagina=" . $_GET["pagina"]);
                    elseif (!isset($_GET["pagina"])):
                        header("Location:  pedidos_dos_clientes.php");
                    endif;

                elseif ($valor >= 1):

                    // DEPURAÇÃO
                    // print 'Entrou!';

                    $cmd = $pdo->prepare("UPDATE `as_pedidos` SET `concluido` = '0' WHERE `ped_id` = :pedido_id;");
                    $cmd->bindValue(":pedido_id",addslashes($_GET["pedido_concluido"]));
                    $cmd->execute();

                  if(isset($_GET["pagina"])):
                        header("Location: pedidos_dos_clientes.php?pagina=" . $_GET["pagina"]);
                    elseif (!isset($_GET["pagina"])):
                        header("Location:  pedidos_dos_clientes.php");
                    endif;

                endif;

                }
            }
        // DEPURAÇÃO
        // for($x = 0;$x < 20;$x++)
        // {
        //    $cmd = $pdo->prepare("INSERT INTO `as_pedidos` (`ped_id`, `ped_data`, `ped_hora`, `ped_cliente`, `ped_cod`, `ped_ref`, `ped_pag_status`, `ped_pag_forma`, `ped_pag_tipo`, `ped_pag_codigo`, `ped_frete_valor`, `ped_frete_tipo`, `ped_valor_item`) VALUES (NULL, '2023-05-01', '21:30:06', '1', '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, '0.00', 'sedex', '21159.98');");
        //    $cmd->execute();
        // }

        // DEPURAÇÃO
        // print_r($_SESSION["id"]);

        if (isset($_GET["drop"]))
        {
            if (!empty($_GET["id"])) {
                $cmd = $pdo->prepare("DELETE FROM `as_pedidos` WHERE `ped_id` = :id");                
                $cmd->bindValue(":id",addslashes($_GET["id"]));    
                $cmd->execute();


                $cmd = $pdo->prepare("DELETE FROM `as_pedidos_itens` WHERE `item_id` = :id");
                $cmd->bindValue(":id",addslashes($_GET["id"]));    
                $cmd->execute();

            }
        }

            $cmd = $pdo->prepare("SELECT * FROM `administracao` WHERE `adm_id` = '$_SESSION[id]';");
            $cmd->execute(); 
            $resultado = $cmd->fetch(PDO::FETCH_ASSOC); 

            $stmt = $pdo->prepare("SELECT COUNT(*) count FROM `as_pedidos`;");
            $stmt->execute();
            $qtd_pedidos = ($stmt->fetch(PDO::FETCH_OBJ)->count);

            $pagina = (!isset($_GET["pagina"])) ? 1 : $_GET["pagina"];

            $cmd;$pesquisa;
        if (!isset($_GET["pesquisado"])) 
        {        
            $cmd = $pdo->prepare("SELECT * FROM `as_pedidos`;");
        } else 
        {
            $pesquisa = addslashes($_GET["pesquisado"]);
            $cmd = $pdo->prepare("SELECT * FROM `as_pedidos` WHERE `pro_nome` LIKE '%$pesquisa%';");
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


            $cmd = $pdo->prepare("SELECT * FROM `as_pedidos` LIMIT $inicioExibir,$exibir;");
            $cmd->execute();
            $result1 = $cmd->fetchAll();

            // DEPURAÇÃO
            // print '<pre>';print_r($result1);print '</pre>';

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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pedidos_dos_clientes.php"> >>> Pedidos dos clientes
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
                                        <a class="dropdown-item" href="produtos.php">Produtos</a>
                                        <a class="dropdown-item" href="pedidos_dos_clientes.php">Pedidos dos clientes ( x )</a>
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
                    <h4>Pedidos dos clientes</h4>
                    <h5>Pedidos realizados: <?= $qtd_pedidos ?></h5>
                    
                      <a class="btn btn-secondary mt-2" href="
                                    javascript:
                                           ConfirmDialog('Você tem certeza que deseja excluir todos os pedidos registrados? Esta ação não poderá ser desfeita.');
                                        ">
                    Excluir todos os pedidos ❌
                    </a>

                    <br>
                    <a href="
                    <?php 
                    if(!isset($_GET["pagina"])){ ?>
                    pedidos_dos_clientes.php?concluido_g=1
                    <?php } else if(isset($_GET["pagina"])){ ?>
                    pedidos_dos_clientes.php?concluido_g=1&pagina=<?= $_GET["pagina"] ?>
                    <?php } ?>
                    ">
                        <button class="btn btn-secondary btn-sm mt-2">Marcar todos os pedidos como concluído</button>
                    </a>

                    <a href="
                    <?php 
                    if(!isset($_GET["pagina"])){ ?>
                    pedidos_dos_clientes.php?concluido_g=0
                    <?php } else if(isset($_GET["pagina"])){ ?>
                    pedidos_dos_clientes.php?concluido_g=0&pagina=<?= $_GET["pagina"] ?>
                    <?php } ?>
                    ">
                    <button class="btn btn-secondary btn-sm mt-2">
                    Marcar todos os pedidos como não concluído          
                    </button>   
                    </a>                 

                    <hr>
<?php if($qtd_pedidos >= 1): ?>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr align="center">
                                    <th scope="col">ID</th>                                    
                                    <th scope="col">Valor do produto</th>
                                    <th scope="col">Data e hora</th>
                                    <th scope="col">Valor do frete</th>
                                    <th scope="col">Pagamento já foi realizado?</th>
                                    <th scope="col">Pedido concluído?</th>
                                    <th  style="word-break: break-all;width: 180px;" scope="col">Detalhes do pedido</th>
                                    <th scope="col">Excluir pedido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dados_s = mysqli_query($con,"SELECT * FROM `as_pedidos`  LIMIT $inicioExibir,$exibir;");                
                                
                                while($x = mysqli_fetch_assoc($dados_s)){

                                // DEPURAÇÃO
                                // print_r($x);

                                ?>
                                <tr align="center">

                                <td>                                     
                                    <?= $x["ped_id"];?>                                    
                                </td>
                                <td>
                                    <?php if($x["concluido"] <= 0){ ?>
                                    R$ <?= number_format($x["ped_valor_item"],2,',','.');?>
                                    <?php } else if($x["concluido"] >= 1){ ?>
                                    <strike>R$ <?= number_format($x["ped_valor_item"],2,',','.');?></strike>
                                    <?php } ?> 
                                        
                                </td>
                                <td>
                                    <?php if($x["concluido"] <= 0){ ?>
                                    <?= $x["ped_hora"];?> <?= date('d/m/Y', strtotime($x["ped_data"])); ?>
                                    <?php } else if($x["concluido"] >= 1) { ?>
                                    <strike> <?= $x["ped_hora"];?> <?= date('d/m/Y', strtotime($x["ped_data"])); ?> </strike>
                                    <?php } ?>                                     
                                </td>
                                <td>

                              <?php      
                            if($x["concluido"] <= 0):                              
                                    if(number_format($x["ped_frete_valor"],2,',','.') == '0,00')
                                    {
                                    print 'Frete grátis';
                                    } else {
                                    print 'R$ ' . number_format($x["ped_frete_valor"],2,',','.');
                                    }
                            elseif ($x["concluido"] >= 1):
                                    if(number_format($x["ped_frete_valor"],2,',','.') == '0,00')
                                    {
                                    print '<strike>Frete grátis</strike>';
                                    } else {
                                    print '<strike>R$ ' . number_format($x["ped_frete_valor"],2,',','.') . '</strike>';
                                    }
                            endif;
                                ?>
                                    
                                </td>
                                <td>
                                    <?php if($x["concluido"] <= 0): ?>
                                    <?= ($x["ped_pag_status"] == 'SIM') ? 'Sim ✔' : 'Não ❌'; ?>
                                <?php elseif ($x["concluido"] >= 1): ?>
                                    <strike><?= ($x["ped_pag_status"] == 'SIM') ? 'Sim ✔' : 'Não ❌'; ?></strike>
                                <?php endif; ?>
                                        
                                </td>
                                <td>
                                    <?php
                                        if($x["concluido"] <= 0):                                            
                                     ?>
                                        <a href="
                                        <?php 
                                            if(isset($_GET["pagina"])):
                                                print 'pedidos_dos_clientes.php?pagina=' . $_GET["pagina"] . "&pedido_concluido=" . $x["ped_id"];
                                            elseif (!isset($_GET["pagina"])):
                                                print 'pedidos_dos_clientes.php?pedido_concluido=' . $x["ped_id"];
                                            endif;
                                        ?>
                                        ">                                            
                                        <button class="btn btn-secondary">Marcar sim</button>
                                        </a>
                                    <?php elseif ($x["concluido"] >= 1): ?>
                                          <a href="
                                        <?php 
                                            if(isset($_GET["pagina"])):
                                                print 'pedidos_dos_clientes.php?pagina=' . $_GET["pagina"] . "&pedido_concluido=" . $x["ped_id"];
                                            elseif (!isset($_GET["pagina"])):
                                                print 'pedidos_dos_clientes.php?pedido_concluido=' . $x["ped_id"];
                                            endif;
                                        ?>
                                        ">   
                                        <button class="btn btn-secondary">Marcar não</button>
                                    </a>
                                    <?php endif; ?>
                                </td>
                                <td><button class="btn btn-secondary">Visualizar 👁</button></td>
                                <td>
                                          <a class="btn btn-danger" href="
                                             javascript:
                                           valor_y = 0;valor_x = (<?php print $x["ped_id"];?>);
                                           ConfirmDialog('Você tem certeza de que deseja excluir este produto?');
                                        ">   X </a>
                                </td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
<?php else: ?>
    <div class="col-lg-12 p-4">
        <div class="alert alert-danger">          
                <h5>Nenhum pedido foi encontrado!</h5>            
        </div>
    </div>
<?php endif; ?>
<?php include("paginacao_php.php") ?>
              </center>
            </div>            
        </div>
<?php for($x = 0;$x < 1;$x++){?><br><?php }  ?>
<script>
// ConfirmDialog('Tem certeza que quer excluir essa categoria de produtos');

function ConfirmDialog(message) {
  $('<div></div>').appendTo('body')
    .html('<div><h6>' + message + '</h6></div>')
    .dialog({
      modal: true,
      title: 'Excluir pedido',
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
                location.href = 'pedidos_dos_clientes.php?drop=1&id=' + valor_x;
                <?php } else if(isset($_GET["pagina"])) { ?>
                location.href = 'pedidos_dos_clientes.php?drop=1&id=' + valor_x + '&pagina=' + <?= $_GET["pagina"] ?>;
                <?php } ?>
            <?php elseif (isset($_GET["pesquisado"])): ?>
                <?php if(!isset($_GET["pagina"])){ ?>
                 let caioba = '<?php print $_GET["pesquisado"]; ?>';
                 location.href = 'pedidos_dos_clientes.php?drop=1&id=' + valor_x + '&pesquisado=' + caioba;
                <?php } else if(isset($_GET["pagina"])) { ?>
                let caioba = '<?php print $_GET["pesquisado"]; ?>';
                location.href = 'pedidos_dos_clientes.php?drop=1&id=' + valor_x + '&pagina=' + <?= $_GET["pagina"] ?> + caioba;
                <?php } ?>
            <?php endif; ?>
              $(this).dialog("close");        
            } else if(valor_y >= 1)
            {
              location.href = 'pedidos_dos_clientes.php?exclusao=1';
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
// console.log(screen.width)
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
