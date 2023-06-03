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

            $cmd = $pdo->prepare("SELECT COUNT(*) qtd FROM `administracao` WHERE `adm_id` = :validador_s;");
            $cmd->bindValue(":validador_s",addslashes($_GET["id_adm"]),PDO::PARAM_INT);
            $cmd->execute();
            $verificador_x = ($cmd->fetch(PDO::FETCH_ASSOC)["qtd"]);
            if($verificador_x <= 0)
            {
                header("Location: detalhes_da_conta.php");
                exit();
            }


            if (!isset($_GET["id_adm"])) 
            {
            if(isset($_GET["edit"]) && !empty($_GET["edit"])):
                if($_GET["edit"] == 1):
                header("Location: gerenciamento_administrador.php");
                elseif ($_GET["edit"] == 2):
                header("Location: detalhes_da_conta.php");
                endif;
            else:
                header("Location: detalhes_da_conta.php");
            endif;
            }  

            if (empty($_GET["id_adm"])) 
            {
            if(isset($_GET["edit"]) && !empty($_GET["edit"])):
                if($_GET["edit"] == 1):
                header("Location: gerenciamento_administrador.php");
                elseif ($_GET["edit"] == 2):
                header("Location: detalhes_da_conta.php");
                endif;
            else:
                header("Location: detalhes_da_conta.php");
            endif;
            }  if (!isset($_GET["edit"])) {
                header("Location: detalhes_da_conta.php");
            } if (empty($_GET["edit"])) {
                header("Location: detalhes_da_conta.php");
            } if ($_GET["id_adm"] == 1) {
                header("Location: detalhes_da_conta.php");
            }

            $senha_adm;
            if (isset($_GET["senha"])) {

                if ($_POST["senha"] == $_POST["confirm_senha"])
                {
                $senha_adm = hash('SHA512', md5(md5(addslashes($_POST["senha"]))));
                $cmd = $pdo->prepare("SELECT COUNT(*) count FROM `administracao` WHERE `adm_pass` = :senha_s_d01 AND `adm_id` = :adm_id_s_d01;");
                $cmd->bindValue(":senha_s_d01",$senha_adm);
                $cmd->bindValue(":adm_id_s_d01",addslashes($_GET["id_adm"]),PDO::PARAM_INT);
                $cmd->execute();
                $verificador = $cmd->fetch(PDO::FETCH_ASSOC)["count"];

                if ($verificador <= 0) 
                {
                  $cmd = $pdo->prepare("UPDATE `administracao` SET `adm_pass` = :senha_s_d02 WHERE `adm_id` = :adm_id_s_d02;");
                  $cmd->bindValue(":senha_s_d02",$senha_adm);
                  $cmd->bindValue(":adm_id_s_d02",addslashes($_GET["id_adm"]),PDO::PARAM_INT);
                  $cmd->execute();

                    if(!isset($_GET["pagina"])):

                    mensagem_atencao("Sua senha foi alterada com sucesso","success");
                    $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                    echo $url;

                 

                    elseif (empty($_GET["pagina"])):

                    mensagem_atencao("Sua senha foi alterada com sucesso","success");
                    $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                    echo $url;

                   

                    else:

                    mensagem_atencao("Sua senha foi alterada com sucesso","success");
                    $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '&pagina=' . $_GET["pagina"] . '">';
                    echo $url;    

                    endif;

                } else if($verificador >= 1)
                {
                    if(!isset($_GET["pagina"])):

                    mensagem_atencao("Você está usando sua senha anterior, tente uma nova senha","danger");
                    $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                    echo $url;

                    elseif (empty($_GET["pagina"])):

                    mensagem_atencao("Você está usando sua senha anterior, tente uma nova senha","danger");
                    $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                    echo $url;
                    
                    else:

                    mensagem_atencao("Você está usando sua senha anterior, tente uma nova senha","danger");
                    $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '&pagina=' . $_GET["pagina"] . '">';
                    echo $url;    

                    endif;
                    
                }
                
                } else 
                {
                    if(!isset($_GET["pagina"])):

                    mensagem_atencao("As senhas não correspondem","danger");
                    $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                    echo $url;

                    elseif (empty($_GET["pagina"])):

                    mensagem_atencao("As senhas não correspondem","danger");
                    $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                    echo $url;
                    
                    else:

                    mensagem_atencao("As senhas não correspondem","danger");
                    $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '&pagina=' . $_GET["pagina"] . '">';
                    echo $url;    

                    endif;
                }
            }
            if(isset($_GET["dados"]))
            {
                if (isset($_POST)) {
                   
                                        
                        $cmd = $pdo->prepare("SELECT COUNT(*) count FROM `administracao` WHERE `adm_nome` = :adm_nome_d AND `adm_id` <> :adm_id_s_03;");
                        $cmd->bindValue(":adm_nome_d",addslashes($_POST["nome"]), PDO::PARAM_STR);
                        $cmd->bindValue(":adm_id_s_03",addslashes($_SESSION["id"]), PDO::PARAM_STR);
                        $cmd->execute();
                        $existe_ou_nao=0;
                        $existe_ou_nao = $existe_ou_nao += intval($cmd->fetch(PDO::FETCH_ASSOC)["count"]);

                        $cmd = $pdo->prepare("SELECT COUNT(*) count FROM `administracao` WHERE `adm_email` = :adm_email_d AND `adm_id` <> :adm_id_s_03;");
                        $cmd->bindValue(":adm_email_d",addslashes($_POST["email"]), PDO::PARAM_STR);
                        $cmd->bindValue(":adm_id_s_03",addslashes($_SESSION["id"]), PDO::PARAM_STR);
                        $cmd->execute();

                        $existe_ou_nao = $existe_ou_nao += intval($cmd->fetch(PDO::FETCH_ASSOC)["count"]);


                        if ($existe_ou_nao >= 1) 
                        {

                        if(!isset($_GET["pagina"])):

                        mensagem_atencao("Já existe alguém com esses e-mail, nome de usuário administrativo cadastrados","danger");
                        $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                        echo $url;

                        elseif (empty($_GET["pagina"])):

                        mensagem_atencao("Já existe alguém com esses e-mail, nome de usuário administrativo cadastrados","danger");
                        $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                        echo $url;
                        
                        else:

                        mensagem_atencao("Já existe alguém com esses e-mail, nome de usuário administrativo cadastrados","danger");
                        $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '&pagina=' . $_GET["pagina"] . '">';
                        echo $url;    

                        endif;

                        } else if($existe_ou_nao <= 0)
                        {
                            $cmd = $pdo->prepare("UPDATE `administracao` SET `adm_nome` = :adm_nome_d,`adm_email` = :adm_email_d WHERE `adm_id` = :adm_id_s_03;");
                            $cmd->bindValue(":adm_nome_d",addslashes($_POST["nome"]), PDO::PARAM_STR);
                            $cmd->bindValue(":adm_email_d",addslashes($_POST["email"]), PDO::PARAM_STR);
                            $cmd->bindValue(":adm_id_s_03",$_SESSION["id"], PDO::PARAM_STR);
                            $cmd->execute();

                              if(!isset($_GET["pagina"])):

                            mensagem_atencao("Atualizado com sucesso!","success");
                            $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                            echo $url;

                            elseif (empty($_GET["pagina"])):

                            mensagem_atencao("Atualizado com sucesso!","success");
                            $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '">';
                            echo $url;
                            
                            else:

                            mensagem_atencao("Atualizado com sucesso!","success");
                            $url =  '<meta http-equiv="refresh" content="5; url=editar_administrador.php?id_adm=' . $_GET["id_adm"] . '&edit=' . $_GET["edit"] . '&pagina=' . $_GET["pagina"] . '">';
                            echo $url;    

                            endif;

                        }
                 
                }
            }

            $cmd = $pdo->prepare("SELECT * FROM `administracao` WHERE `adm_id` = '$_SESSION[id]';");
            $cmd->execute(); 
            $resultado = $cmd->fetch(PDO::FETCH_ASSOC);            


            // if(isset($_GET["add"])):
            //     if(isset($_POST)):
            //         if($_POST["senha"] == $_POST["confirm_senha"])
            //         {

            //             $cmd = $pdo->prepare("SELECT COUNT(*) count FROM `administracao` WHERE `adm_nome` = :adm_nome_d OR `adm_email` = :adm_email_d;");
            //             $cmd->bindValue(":adm_nome_d",addslashes($_POST["nome"]), PDO::PARAM_STR);
            //             $cmd->bindValue(":adm_email_d",addslashes($_POST["email"]), PDO::PARAM_STR);
            //             $cmd->execute();
            //             $existe_ou_nao = $cmd->fetch(PDO::FETCH_ASSOC)["count"];

            //             if ($existe_ou_nao <= 0) 
            //             {
                        
            //                 mensagem_atencao("Dados atualizado com sucesso","success");
            //                 $url =  '<meta http-equiv="refresh" content="3; url=adicionar_administrador.php">';
            //                 echo $url;                        
            //             } else
            //             {
            //                  mensagem_atencao("Ops! já existe esse administrador com esses dados","danger");
            //                 $url =  '<meta http-equiv="refresh" content="3; url=adicionar_administrador.php">';
            //                 echo $url;
            //             }

            //         } else 
            //         {
            //             mensagem_atencao("As senhas estão incorretas","danger");
            //             $url =  '<meta http-equiv="refresh" content="3; url=adicionar_administrador.php">';
            //             echo $url;
            //         }

            //     endif;
            // endif;
                
           
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_administrador.php">
                        <?php if($_GET["edit"] == 1): ?>
                         >>>  
                        <?php endif; ?>
                    Gerenciamento de administradores</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="detalhes_da_conta.php">  <?php if($_GET["edit"] == 2): ?> >>> <?php endif; ?> Detalhes da conta</a>                 
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
                                        <a class="dropdown-item" href="pedidos_dos_clientes.php">Pedidos dos clientes</a>
                                        <a class="dropdown-item" href="gerenciamento_clientes.php">Gerenciamento de clientes</a>
                                        <a class="dropdown-item" href="gerenciamento_administrador.php">Gerenciamento de administradores</a>
                                        <a class="dropdown-item" href="detalhes_da_conta.php"> ( x ) Detalhes da conta</a>
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
                    <h4>Alterar meus dados</h4>
                <div class="mt-4"></div>
                    <a href="<?php
                        if($_GET["edit"] == 1):
                            print 'gerenciamento_administrador';
                        elseif ($_GET["edit"] == 2):
                            print 'detalhes_da_conta';
                        endif;

                     ?>.php<?php 

                        if(isset($_GET["pagina"])):
                            print "?pagina=" . $_GET["pagina"];
                        endif;

                    ?>"><button class="btn btn-secondary">Voltar</button></a>
                <hr>

                                  
                 <div class="form-group">
                        <br/>
                        <h5>Alterar nome de usuário do administrador, E-mail</h5>
                        <div class="mt-4"></div>
                        <!-- ============================================================== -->
                        <form action="editar_administrador.php?dados=1&id_adm=<?php print $_SESSION['id'];?>&edit=<?php print $_GET['edit']; ?><?php 
                            if(isset($_GET["pagina"])):
                                print '&pagina=' . $_GET["pagina"];
                            endif;
                        ?>" method="post">
                        <label for="exampleInputEmail1">Nome de usuário do administrador:</label>
                        <div class="col-md-5">
                        <input type="text" value="<?= $resultado["adm_nome"] ?>" minlength="5" maxlength="40" class="form-control" name="nome" required>
                        </div>  
                        <small>Limite de caracteres é 40</small>
                        <br/><br/>

                        <label for="exampleInputEmail1">Email:</label>
                        <div class="col-md-5">
                        <input type="email" value="<?= $resultado["adm_email"] ?>" minlength="19" maxlength="254" class="form-control" name="email" required>
                        </div>    
                        <small>Limite de caracteres é 254</small>
                        <br/><br/>
                        <button type="submit" class="btn btn-success">Atualizar</button>
                        </form>
                        <div class="mt-4"></div>
                        <!-- ============================================================== -->

                        <hr>

                        <!-- // ==================== SENHA ================= // -->
                        <h5>Alterar senha</h5>
                        <br>
                        <form action="editar_administrador.php?senha=1&id_adm=<?php print $_SESSION['id'];?>&edit=<?php print $_GET['edit']; ?><?php if(isset($_GET['pagina']) && !empty($_GET['pagina'])){
                            print '&pagina=' . $_GET["pagina"];
                        }?>" method="post">


                        <label for="exampleInputEmail1">Senha:</label>
                        <div class="col-md-5">
                        <input type="password" minlength="6" placeholder="Digite aqui sua nova senha" maxlength="38" class="form-control" name="senha" required>
                        </div>  
                        <small>Limite de caracteres é 38</small>
                        <br/><br/>
                        
                        <label for="exampleInputEmail1">Repita a senha:</label>
                        <div class="col-md-5">
                        <input type="password" minlength="6" placeholder="Repita sua nova senha" maxlength="38" class="form-control" name="confirm_senha" required>
                        </div>  
                        <small>Limite de caracteres é 38</small>
                        <br/><br/>   

                        <button type="submit" class="btn btn-success">Atualizar senha</button>

                        </form>

                        <!-- // ============================================ // -->   

                 </div>
                 </form>

              </center> 
<!------ dados do cadastro ---->
<section class="row" id="cadastro">
   
        
</section>  

        <div class="mb-4"></div>
    </body>
</html>
