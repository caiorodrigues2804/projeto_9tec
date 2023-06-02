<?php 
            require "../conexao.php";
            require "../conexao_2.php";
            require "validador_de_acessos.php";

            if (!isset($_GET["id_pedido"])) 
            {
                header("Location: pedidos_dos_clientes.php");
            } else if(empty($_GET["id_pedido"]))
            {
               header("Location: pedidos_dos_clientes.php");
            }    if (!isset($_GET["cli_id"])) 
            {
                header("Location: pedidos_dos_clientes.php");
            } else if(empty($_GET["cli_id"]))
            {
               header("Location: pedidos_dos_clientes.php");
            } if (!isset($_GET["ref_produto"]) || empty($_GET["ref_produto"])) {
               header("Location: pedidos_dos_clientes.php");
            }


            $cmd = $pdo->prepare("SELECT * FROM `administracao` WHERE `adm_id` = '$_SESSION[id]';");
            $cmd->execute(); 
            $resultado = $cmd->fetch(PDO::FETCH_ASSOC); 

            $stmt = $pdo->prepare("SELECT * FROM `as_pedidos`;");
            $stmt->execute();
            
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
                <div class="mt-2"></div>
                <h5>Visualizar detalhes do pedido</h5>
                <a href="pedidos_dos_clientes.php<?php 
                if(isset($_GET["pagina"])):
                    print '?pagina=' . $_GET["pagina"];
                endif;
                ?>">
                    <button class="btn btn-secondary">Voltar</button>
                </a>
                <hr>
                <h6>Dados do cliente</h6>

                <div class="col-md-8">
                    <?php 
                        $cmd = $pdo->prepare("SELECT * FROM `as_clientes` WHERE `cli_id` = :id_cliente;");
                        $cmd->bindValue(":id_cliente",addslashes($_GET["cli_id"]));
                        $cmd->execute();
                        // print_r($cmd->fetch(PDO::FETCH_ASSOC));

                        while($x = $cmd->fetch(PDO::FETCH_ASSOC)){

                    ?>
                <ul class="list-group" id="tabela">
               
                  <?php foreach($x as $key => $value): 
                        if($key <> 'cli_pass' && $key <> 'dados_extras'):
                   ?>
                    <li class="list-group-item"> <?= ucfirst(str_replace("cli_", "", $key)); ?>: <?= $value ?> </li>
                  <?php 
                    endif;
                    endforeach; ?>            
                </ul>          
                        <?php } ?>
                </div>
                <hr>
                <h6>Pedido</h6>
                    <div class="col-md-8">
                     <ul class="list-group" id="tabela">
                <?php 
                    $id_d = addslashes($_GET["id_pedido"]);
                    foreach(mysqli_query($con,"SELECT * FROM `as_pedidos` WHERE `ped_id` = '$id_d';")->fetch_assoc() as $key => $value):
                    if($key <> 'ped_valor_item' && $key <> 'ped_frete_valor' && $key):  
                ?>
                      <li class="list-group-item"> <?= ucfirst(str_replace('_',' ',str_replace("ped_", "", $key))); ?>: <?= str_replace('-','/',$value); ?> </li>   
                <?php else: ?>
                      <li class="list-group-item"> <?= ucfirst(str_replace('-','/',str_replace('_',' ',str_replace("ped_", "", $key)))); ?>:   
                        R$ <?= number_format($value,2,",","."); ?> </li>   
                <?php endif; ?>
                <?php endforeach; ?>
                    </ul>                   
                </div>
                  <hr>
                <h6><b>Informações do produto</b></h6>
                 <div>
                     <h6>Verifique na sua caixa de e-mail para obter informação do produto(s) que foi solicitado pelo cliente</h6>
                 </div>

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
