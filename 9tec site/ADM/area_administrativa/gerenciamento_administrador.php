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
            if (isset($_GET["drop_g"]))
            {
                $cmd_d = $pdo->prepare("DELETE FROM `administracao` WHERE `adm_id` >= 2;");
                $cmd_d->execute();
                mensagem_atencao("Administradores excluidos com sucesso","success");
                
                $url =  '<meta http-equiv="refresh" content="3; url=gerenciamento_administrador.php">';
                echo $url;                

            }

           if (isset($_GET["drop"])) 
            {
                if (!empty($_GET["drop"]))
                 {

                    $id_categs = addslashes($_GET["id"]);
                    $cmd = $pdo->prepare("DELETE FROM `administracao` WHERE `adm_id` = :id_c;");
                    $cmd->bindValue(":id_c",$id_categs);
                    $cmd->execute();                              

                    if (!isset($_GET["pagina"])) 
                    {                     
                       if (!isset($_GET["pesquisado"])) 
                        {                        
                        header("Location: logoff.php");
                        } else if(isset($_GET["pesquisado"]))
                        {
                        header("Location: logoff.php");
                        }
                    } else if (isset($_GET["pagina"])) {
                        if(!isset($_GET["pesquisado"]))
                        {                            
                            header("Location: logoff.php");
                        } else if(isset($_GET["pesquisado"]))
                        {
                           header("Location: logoff.php");
                        }
                    }
                }
            }


            $cmd = $pdo->prepare("SELECT * FROM `administracao` WHERE `adm_id` = '$_SESSION[id]';");
            $cmd->execute(); 
            $resultado = $cmd->fetch(PDO::FETCH_ASSOC);            

            // VERIFICAR SE HÁ ADMINISTRADORES DISPONÍVEIS
            $cmd_yx = $pdo->prepare("SELECT count(*) count FROM `administracao`;");
            $cmd_yx->execute();
            $adm_count = 1;

            $pagina = (!isset($_GET["pagina"])) ? 1 : $_GET["pagina"];

            $cmd;$pesquisa;
        if (!isset($_GET["pesquisado"])) 
        {        
            $cmd = $pdo->prepare("SELECT * FROM `administracao`;");
        } else 
        {
            $pesquisa = addslashes($_GET["pesquisado"]);
            $cmd = $pdo->prepare("SELECT * FROM `administracao` WHERE `adm_nome` LIKE '%$pesquisa%';");
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


            $cmd = $pdo->prepare("SELECT * FROM `as_clientes` LIMIT $inicioExibir,$exibir;");
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>
            let valor_x,valor_y;
        </script>
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

                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_clientes.php">Gerenciamento de clientes</a>                                      
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_administrador.php"> >>> Gerenciamento de administradores</a>
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
                                        <a class="dropdown-item" href="pedidos_dos_clientes.php">Pedidos dos clientes </a>
                                        <a class="dropdown-item" href="gerenciamento_clientes.php">Gerenciamento de clientes</a>
                                        <a class="dropdown-item" href="gerenciamento_administrador.php">Gerenciamento de administradores ( x )</a>
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
                    <h4>Gerenciamento de administradores</h4>

                    <div class="mt-3"></div>
                      <!-- PESQUISA -->
                    <div class="col-lg-6 mt-4">                        
                        <div class="input-group">
                          <?php if($adm_count >= 1): ?>
                            <input type="text" id="campo_pesquisado" class="form-control" placeholder="Digite apenas o nome do administrador para pesquisar" value="<?php 
                            if(isset($_GET["pesquisado"])):
                                echo $_GET["pesquisado"]; 
                            endif;
                            ?>">                                     

                            <a href="javascript:                 
                            <?php if(!isset($_GET["pagina"])): ?>
                                location.href = 'gerenciamento_administrador.php?pesquisado=' + document.querySelector('#campo_pesquisado').value;               
                            <?php else: ?>
                                location.href = 'gerenciamento_administrador.php?pesquisado=' + document.querySelector('#campo_pesquisado').value + '&pagina=' + <?php print $_GET["pagina"]; ?>;               
                            <?php endif; ?>

                            ">
                                <button class="btn btn-info">🔎</button>
                            </a>
                            <?php if(isset($_GET["pesquisado"])): ?>
                                <a  style="margin-left: 5px;" href="gerenciamento_administrador.php"><button class="btn btn-info">desfazer pesquisa</button></a>
                            <?php endif; ?>

                         <?php endif; ?>
                        </div>
                    </div>

                    <?php if($adm_count >= 1): ?>
                    <br>
                    <?php endif; ?>
                    <?php if(!isset($_GET["pesquisado"])){ ?>
                    <a href="adicionar_administrador.php<?php 
                        if(isset($_GET["pagina"])):
                            print "?pagina=" . $_GET["pagina"];
                        endif;
                    ?>">
                        <button class="btn btn-secondary">Adicionar administrador</button></a>
                <?php } ?>

                    <?php if($adm_count >= 1){ 
                            if($_SESSION["id"] == 1):
                    ?>
                    <a href="
                        javascript:
                        valor_y=2;
                        ConfirmDialog('Tem certeza de que deseja excluir todos os administradores?','Excluir administradores');
                    ">
                        <button class="btn btn-secondary">Excluir todos os administradores exceto ADM Master ❌</button>
                    </a>
                        <?php endif; ?>
                    <?php }?>               

                    <hr>
                    <?php if($adm_count <= 0){ ?>
                <div class="col-lg-12 p-4">
                            <div class="alert alert-danger">   
                                <h5>Nenhum administrador foi encontrado</h5>
                    </div>
                </div>
                   <?php }?>  

              
                    <?php if($adm_count >= 1): 
                            if(isset($_GET["pesquisado"]))
                            {
                                $valor_digitado = addslashes($_GET["pesquisado"]);
                                $query = "SELECT * FROM `administracao` WHERE `adm_nome` LIKE '%$valor_digitado%';";
                                if(mysqli_query($con,$query)->num_rows == 0)
                                {?>
                                     <div class="alert alert-danger m-4">
                                    <h5>Não tem nenhum administrador com esse nome</h5>
                                    </div>
                                <?php exit(); 
                            }
                            }
                    ?>
                    <table class="table">
                            <thead>                                
                        <tr align="center">
                            <th>ID</th>
                            <th>Nome</th>
                            <th>ADM e-mail</th>
                            <th>Hora de cadastro</th>
                            <th>Data de cadastro</th>
                            <th>Nível de ADM</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                            </thead>
                            <tbody>
                
                                <?php
                                $query;
                                if(!isset($_GET["pesquisado"])):
                                 $query = "SELECT * FROM `administracao`;";
                                    elseif (isset($_GET["pesquisado"])):
                                 $nome_digitado = addslashes($_GET["pesquisado"]);
                                 $query = "SELECT * FROM `administracao` WHERE `adm_nome` LIKE '%$nome_digitado%';";
                                endif;

                                   if($resultado = mysqli_query($con,$query)){
                                        while($w = $resultado->fetch_assoc()){ 

                                        // DEPURAÇÃO
                                        // print_r($w);
                                ?>
                                        <tr align="center">
                                <td><?= $w["adm_id"]; ?></td>
                                <td><?= $w["adm_nome"]; ?></td>
                                <td><?= $w["adm_email"]; ?></td>
                                <?php if($w["adm_id"] >= 2): ?>
                                <td><?= date('H:i:s',strtotime($w["adm_hora_cad"])); ?></td>
                                <td><?= date('d/m/Y',strtotime($w["adm_data_cad"])); ?></td>
                            <?php else: ?>
                                <td></td>
                                <td></td>
                            <?php endif;?>

                                <td><?php  
                                if($w["adm_id"] == 0 || $w["adm_id"] == 1):
                                print 'ADM Master';
                                else:
                                print 'ADM';
                                endif;

                                ?></td>
                                 
                                <?php if($w["adm_id"] != 1 && $w["adm_id"]  == $_SESSION["id"]): ?>
                                <td>
                                    <a href="
                                
                                    editar_administrador.php?id_adm=<?php print $_SESSION['id'];?>&edit=1<?php 
                                    if(isset($_GET["pagina"]) && !empty($_GET["pagina"])):
                                        print '&pagina=' . $_GET["pagina"];
                                    endif;                                    
                                    ?>
                                     ">
                                <button class="btn btn-secondary">✏️</button></a>
                                </td>
                               <td>    
                                <a href="
                                    javascript:
                                    valor_y=0;valor_x='<?php print $w["adm_id"]; ?>';
                                    ConfirmDialog('Tem certeza de que deseja excluir sua conta?','Excluir conta');
                                ">                                    
                                <button class="btn btn-danger">
                                X
                                </button>
                                </a></td>
                                <?php else:
                                if($w["adm_id"] != 1 && $_SESSION["id"] == 1):
                                    ?>
                                <td><a href="editar_administrador_x.php?id_adm=<?php print $w["adm_id"];?>&edit=1<?php 
                                    if(isset($_GET["pagina"]) && !empty($_GET["pagina"])):
                                        print '&pagina=' . $_GET["pagina"];
                                    endif;
                                ?>">
                                    <button class="btn btn-secondary">✏️</button></a></td>   
                               <td>    
                                <a href="
                                    javascript:
                                    valor_y=0;valor_x='<?php print $w["adm_id"]; ?>';
                                    ConfirmDialog('Você tem certeza de que deseja excluir este administrador?','Excluir administrador');
                                ">                                    
                                <button class="btn btn-danger">
                                X
                                </button>
                                </a></td>
                                <?php else:?>
                                    <td></td>
                                    <td></td>

                                <?php endif; endif; 
                                // DEPURAÇÃO
                                // print '<pre>';print_r($_SESSION["id"]);print '</pre>';
                                ?>
                                  </tr>
                            <?php }} ?>
                      
                      
                            </tbody>
                    </table>
                    <?php endif; ?>
                    <?php include("paginacao_php.php"); ?>       
              </center>
            </div>            
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

<script>
// ConfirmDialog('Tem certeza que quer excluir essa categoria de produtos');

function ConfirmDialog(message,msg2) {
  $('<div></div>').appendTo('body')
    .html('<div><h6>' + message + '</h6></div>')
    .dialog({
      modal: true,
      title: msg2,
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
                location.href = 'gerenciamento_administrador.php?drop=1&id=' + valor_x;
                <?php } else if(isset($_GET["pagina"])) { ?>
                location.href = 'gerenciamento_administrador.php?drop=1&id=' + valor_x + '&pagina=' + <?php  
                if ($_GET["pagina"] == 0) 
                {
                 print $_GET["pagina"] + 1;
                } else 
                {
                 print $_GET["pagina"];
                }
                 ?>;

                <?php } ?>
            <?php elseif (isset($_GET["pesquisado"])): ?>
                <?php if(!isset($_GET["pagina"])){ ?>
                 let caioba = '<?php print $_GET["pesquisado"]; ?>';
                 location.href = 'gerenciamento_administrador.php?drop=1&id=' + valor_x + '&pesquisado=' + caioba;
                <?php } else if(isset($_GET["pagina"])) { ?>
                let caioba = '<?php print $_GET["pesquisado"]; ?>';
                location.href = 'gerenciamento_administrador.php?drop=1&id=' + valor_x + '&pagina=' + <?php 
                  if ($_GET["pagina"] == 0) 
                {
                 print $_GET["pagina"] + 1;
                } else 
                {
                 print $_GET["pagina"];
                } ?> + '&pesquisado=' + caioba;
                <?php } ?>
            <?php endif; ?>
              $(this).dialog("close");        
            } else if(valor_y == 1)
            {
              location.href = 'gerenciamento_administrador.php?exclusao=1';
              $(this).dialog("close"); 
            } else if(valor_y == 2)
            {
              location.href = 'gerenciamento_administrador.php?drop_g=1';
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

    </body>
</html>

