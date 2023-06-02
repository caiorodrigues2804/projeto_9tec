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

       

            if(isset($_GET["add"])):
                if(isset($_POST)):
                    if($_POST["senha"] == $_POST["confirm_senha"])
                    {
                        $senha_adm = hash('SHA512',md5(md5($_POST["senha"])));
                        $cmd = $pdo->prepare("INSERT INTO `administracao` (`adm_nome`,`adm_email`,`adm_pass`,`adm_data_cad`,`adm_hora_cad`) VALUES (:adm_nome_s,:adm_email_s,:adm_pass_s,:adm_data_s,:adm_hora_s);");
                        $cmd->bindValue(":adm_nome_s",addslashes($_POST["nome"]));
                        $cmd->bindValue(":adm_email_s",addslashes($_POST["email"]));
                        $cmd->bindValue(":adm_pass_s",addslashes($senha_adm));
                        $cmd->bindValue(":adm_data_s",addslashes(date('Y-m-d')));
                        $cmd->bindValue(":adm_hora_s",addslashes(date('H:i:s')));
                        $cmd->execute();
                        mensagem_atencao("Administrador adicionado com sucesso","success");
                        $url =  '<meta http-equiv="refresh" content="3; url=adicionar_administrador.php">';
                        echo $url;

                    } else 
                    {
                        mensagem_atencao("As senhas estão incorretas","danger");
                        $url =  '<meta http-equiv="refresh" content="3; url=adicionar_administrador.php">';
                        echo $url;
                    }

                endif;
            endif;
                
           
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

                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_clientes.php">Gerenciamento de clientes</a>                                      
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_administrador.php"> >>>  Gerenciamento de administradores</a>
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
                    <h4>Adicionar administrador</h4>
                <div class="mt-4"></div>
                    <a href="gerenciamento_administrador.php<?php 
                        if(isset($_GET["pagina"])):
                            print "?pagina=" . $_GET["pagina"];
                        endif;

                    ?>"><button class="btn btn-secondary">Voltar</button></a>
                <hr>

                <form action="adicionar_administrador.php?add=1" method="post">
                    
                 <div class="form-group">
                        <br/>
                        <label for="exampleInputEmail1">Nome de usuário do administrador:</label>
                        <div class="col-md-5">
                        <input type="text" minlength="5" maxlength="40" class="form-control" name="nome" required>
                        </div>  
                        <small>Limite de caracteres é 40</small>
                        <br/><br/>

                        <label for="exampleInputEmail1">Email:</label>
                        <div class="col-md-5">
                        <input type="email" minlength="25" maxlength="254" class="form-control" name="email" required>
                        </div>    
                        <small>Limite de caracteres é 254</small>
                        <br/><br/>

                        <label for="exampleInputEmail1">Senha:</label>
                        <div class="col-md-5">
                        <input type="password" minlength="6" maxlength="38" class="form-control" name="senha" required>
                        </div>  
                        <small>Limite de caracteres é 38</small>
                        <br/><br/>
                        
                        <label for="exampleInputEmail1">Repita a senha:</label>
                        <div class="col-md-5">
                        <input type="password" minlength="6" maxlength="38" class="form-control" name="confirm_senha" required>
                        </div>  
                        <small>Limite de caracteres é 38</small>
                        <br/><br/>   

                        <button type="submit" class="btn btn-success">Adicionar administrador</button>

                 </div>
                 </form>

              </center> 
<!------ dados do cadastro ---->
<section class="row" id="cadastro">
   
        
</section>  

        <div class="mb-4"></div>
    </body>
</html>
