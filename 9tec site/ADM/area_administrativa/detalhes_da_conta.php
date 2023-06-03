<?php 
            require "../conexao.php";
            require "../conexao_2.php";
            require "validador_de_acessos.php";

            // print_r($_SESSION["id"]);

            $cmd = $pdo->prepare("SELECT * FROM `administracao` WHERE `adm_id` = '$_SESSION[id]';");
            $cmd->execute(); 
            $resultado = $cmd->fetch(PDO::FETCH_ASSOC); 

            if (isset($_GET["exclusao"])) 
            {
                if (isset($_GET["id"]) && !empty($_GET["id"])) 
                {
                    $admId = $_GET["id"]; // Obtém o valor do parâmetro

                    // Verifica se o parâmetro é um número válido
                    if (!is_numeric($admId)) {
                        // Trate o erro adequadamente, exiba uma mensagem de erro ou redirecione o usuário
                        die("ID inválido.");
                    }

                    $sql = "DELETE FROM `administracao` WHERE `adm_id` = :admId";

                    try {
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(":admId", $admId, PDO::PARAM_INT);
                        $stmt->execute();?>
                        <script>window.alert("Você foi desconectado");</script>
                        <?php 
                        $url =  '<meta http-equiv="refresh" content="0; url=logoff.php">';
                        echo $url;
                        

                        $rowCount = $stmt->rowCount(); // Obtém o número de linhas afetadas
                        // Faça algo com $rowCount, se necessário
                    } catch (PDOException $e) {
                        // Trate o erro adequadamente, exiba uma mensagem de erro ou registre o erro em um log
                        die("Erro ao executar a consulta: " . $e->getMessage());
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_administrador.php">Gerenciamento de administradores</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="detalhes_da_conta.php"> >>> Detalhes da conta</a>                 
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
                                        <a class="dropdown-item" href="gerenciamento_administrador.php">Gerenciamento de administradores</a>
                                        <a class="dropdown-item" href="detalhes_da_conta.php">Detalhes da conta  ( x )</a>
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
                    <h4>Detalhes da conta</h4>
                    <br>
                    <?php if($_SESSION["id"] != 1): ?>
                    <a href="editar_administrador.php?id_adm=<?php print $_SESSION['id'];?>&edit=2"><button class="btn btn-secondary">Alterar meus dados</button></a>
                    <a href="
                    javascript:
                    valor_x = '<?php print $_SESSION["id"]; ?>';
                    ConfirmDialog('Deseja confirmar a exclusão da sua conta?','Excluir conta');
                    "> 
                    <button class="btn btn-secondary">Excluir conta ❌</button>                       
                    </a>
                    <?php endif; ?>
                    <hr>

                  
                    <table class="table">
                        <thead class="table">
                            <tr align="center">
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Hora de cadastro</th>
                            <th>Data de cadastro</th>                            
                            </tr>
                                <tbody>
                            <tr align="center">
                                    <td><?=  $resultado["adm_id"]; ?></td>
                                    <td><?=  $resultado["adm_nome"]; ?></td>
                                    <td><?=  $resultado["adm_email"]; ?></td>
                                    <td><?=  $resultado["adm_hora_cad"]; ?></td>
                                    <td><?=  str_replace('-','/',$resultado["adm_data_cad"]); ?></td>
                            </tr>
                                </tbody>    
                        </thead>
                    </table>
                
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
          
          location.href = 'detalhes_da_conta.php?exclusao=1&id=' + valor_x;

          $(this).dialog("close");
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
