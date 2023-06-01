<?php 
            require "../conexao.php";
            require "../conexao_2.php";
            require "validador_de_acessos.php";
 

      
            // DEPURAÇÃO
            // print '<pre>';print_r($result1);print '</pre>';
          function encurtador_textos($texto,$qtd_texto)
          {
                   $texto_qtd = substr($texto,0,$qtd_texto);
                   if (strlen($texto_qtd) >= $qtd_texto) 
                    {
                            return substr($texto,0,$qtd_texto) . '...';
                    } else {
                            return $texto_qtd;
                    }    
          }

            $stmt = $pdo->prepare("SELECT COUNT(*) count FROM `as_clientes`;");
            $stmt->execute();
            $qtd_pedidos = ($stmt->fetch(PDO::FETCH_OBJ)->count);

            $pagina = (!isset($_GET["pagina"])) ? 1 : $_GET["pagina"];

            $cmd;$pesquisa;
        if (!isset($_GET["pesquisado"])) 
        {        
            $cmd = $pdo->prepare("SELECT * FROM `as_clientes`;");
        } else 
        {
            $pesquisa = addslashes($_GET["pesquisado"]);
            $cmd = $pdo->prepare("SELECT * FROM `as_clientes` WHERE `cli_nome` LIKE '%$pesquisa%';");
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

                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_clientes.php"> >>> Gerenciamento de clientes</a>                                      
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
                                        <a class="dropdown-item" href="pedidos_dos_clientes.php">Pedidos dos clientes </a>
                                        <a class="dropdown-item" href="gerenciamento_clientes.php">Gerenciamento de clientes ( x )</a>
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
                    <h4>Gerenciamento de clientes</h4>
                    <!-- PESQUISA -->
                    <div class="col-lg-6 mt-4">                        
                        <div class="input-group">
                           
                            <input type="text" id="campo_pesquisado" class="form-control" placeholder="Digite o nome do produto para pesquisar" value="<?php 
                            if(isset($_GET["pesquisado"])):
                                echo $_GET["pesquisado"]; 
                            endif;
                            ?>">                                     

                            <a href="javascript:                            
                                location.href = 'gerenciamento_clientes.php?pesquisado=' + document.querySelector('#campo_pesquisado').value;               

                            ">
                                <button class="btn btn-info">🔎</button>
                            </a>
                            <?php if(isset($_GET["pesquisado"])): ?>
                                <a  style="margin-left: 5px;" href="gerenciamento_clientes.php"><button class="btn btn-info">desfazer pesquisa</button></a>
                            <?php endif; ?>

                        </div>
                    </div>
                    <hr>                    
                <table  class="table"> 
                    <thead>
                     <tr align="center">
                        <th>ID</th>         
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Cidade</th> 
                        <th>UF</th> 
                        <th style="font-size: 12px;">Qtd(s) pedidos feitos</th>               
                        <th>Status</th> 
                        <th>Editar</th> 
                        <th>Excluir</th> 
                        <th>+ Detalhes</th> 
                     </tr>                      
                    </thead>
                    <tbody>
                    <?php 
                    if (!isset($_GET["pesquisado"]) && !empty($_GET["pesquisado"]))
                    {                    
                          $query = "SELECT * FROM `as_clientes` WHERE `cli_nome` LIKE '%$_GET[pesquisado]%';";
                    }             
                    else 
                    {                        
                        $query = "SELECT * FROM `as_clientes`;";
                  
                    }
                   
                    // DEBUGGER
                    // print $query;

                         if($resultado = mysqli_query($con,$query)){
                            while($w = $resultado->fetch_assoc()){  ?>
                      <tr align="center"> 
                            <td><?php print $w["cli_id"]; ?></td>     
                            <td><?php 
                                $texto_qtd = $w["cli_nome"]. ' ' . $w["cli_sobrenome"];
                                print encurtador_textos($texto_qtd,24);
                                ?>
                            <td> 
                                <?php
                                $texto_qtd = $w["cli_endereco"];
                                print encurtador_textos($texto_qtd,24);        
                                ?>
                            </td>
                            <td> 
                                <?php

                                $texto_qtd = $w["cli_cidade"];
                                print encurtador_textos($texto_qtd,15);        

                                ?>
                            </td>
                            <td>
                                <?php 
                                print $w["cli_uf"];
                                ?>
                            </td>
                            <td><?php 

                                $query = "SELECT COUNT(*) as qtd_pedidos FROM as_clientes inner join as_pedidos ON as_pedidos.ped_cliente = as_clientes.cli_id WHERE as_pedidos.ped_cliente = $w[cli_id];";
                                print_r(mysqli_query($con,$query)->fetch_assoc()["qtd_pedidos"]);

                                ?>                            
                            </td>
                            <td>
                                <?php 
                                    if($w["status_clientes"] == 0):
                                        print 'ATIVO';
                                    elseif ($w["status_clientes"] == 1):
                                        print 'BLOQUEADO';                                    
                                    endif;
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-secondary">✏️</button>
                            </td>
                            <td>
                                <button class="btn btn-danger">X</button>
                            </td>
                            <td>
                                <button class="btn btn-secondary">Exibir</button>
                            </td>
                      </tr>
                      <?php   }
                    }
                    ?>
                                                       
            
                         
                    

                    </tbody>
                </table>
            <?php include("paginacao_php.php") ?>
              </center>
            </div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
