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

            if (!isset($_GET["id_cliente"])) {
                header("Location: gerenciamento_clientes.php");
            } else if (empty($_GET["id_cliente"])) {
                header("Location: gerenciamento_clientes.php");
            }

            // COLOCAR NO FORMATO CPF
            function formatCnpjCpf($value)
            {
              $CPF_LENGTH = 11;
              $cnpj_cpf = preg_replace("/\D/", '', $value);
              
              if (strlen($cnpj_cpf) === $CPF_LENGTH) {
                return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
              } 
              
              return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
            }
            function formatarRG($rg) {
            // Remover caracteres não numéricos
            $rg = preg_replace('/[^0-9]/', '', $rg);

            // Verificar se o RG possui a quantidade correta de dígitos
            if (strlen($rg) !== 9) {
                return "RG inválido";
            }

            // Aplicar a formatação do RG (XX.XXX.XXX-X)
            $rg_formatado = substr($rg, 0, 2) . '.' . substr($rg, 2, 3) . '.' . substr($rg, 5, 3) . '-' . substr($rg, 8);

            return $rg_formatado;
        }
        function formatarCEP($cep) {
            // Remover caracteres não numéricos
            $cep = preg_replace('/[^0-9]/', '', $cep);

            // Verificar se o CEP possui a quantidade correta de dígitos
            if (strlen($cep) !== 8) {
                return "CEP inválido";
            }

            // Aplicar a formatação do CEP (XXXXX-XXX)
            $cep_formatado = substr($cep, 0, 5) . '-' . substr($cep, 5);

            return $cep_formatado;
        }
        function formatarTelefone($telefone) {
        // Remover caracteres não numéricos
        $telefone = preg_replace('/[^0-9]/', '', $telefone);

        // Verificar o tamanho do número
        $tamanho = strlen($telefone);
        if ($tamanho < 10 || $tamanho > 11) {
            return "Número inválido";
        }

        // Formatar o número de telefone
        if ($tamanho === 10) {
            $telefone_formatado = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 4) . '-' . substr($telefone, 6);
        } else {
            $telefone_formatado = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7);
        }

        return $telefone_formatado;
    }


            $valor_cli = addslashes($_GET["id_cliente"]);
            $cmd_y = $pdo->prepare("SELECT * FROM `as_clientes` WHERE `cli_id` = :cl_d;");
            $cmd_y->bindValue(":cl_d","$valor_cli");
            $cmd_y->execute();
            $resultado = $cmd_y->fetch(PDO::FETCH_ASSOC);

            // DEPURAÇÃO
            // print_r($resultado);
                
           
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

                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gerenciamento_clientes.php"> >>>  Gerenciamento de clientes</a>                                      
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
<!------ dados do cadastro ---->
<section class="row" id="cadastro">
   <div class="mt-4"></div>
   <h4>Visualizar detalhes do dados</h4>
   <hr>
   <div class="md-4">       
   <a href="gerenciamento_clientes.php<?php 
        if(isset($_GET["pagina"])):
            print '?pagina=' . $_GET["pagina"];
        endif;

    ?>"><button class="btn btn-success">Voltar</button></a>
   </div>
   <br><br>
        </section>
<ul class="list-group">
    <!-- NOME -->
    <li class="list-group-item">
        <label>Nome:</label>
        <h6><?= $resultado["cli_nome"]; ?></h6>
    </li>

    <!-- SOBRENOME -->
    <li class="list-group-item">
        <label>Sobrenome:</label>
        <h6><?= $resultado["cli_sobrenome"]; ?></h6>
    </li>

    <!-- DATA DE NASCIMENTO -->
    <li class="list-group-item">
        <label>Data Nasc:</label>
        <h6><?= str_replace('-','/',$resultado["cli_data_nasc"]); ?></h6>
    </li>

    <!-- RG -->
    <li class="list-group-item">
        <label>RG:</label>
        <h6><?= formatarRG($resultado["cli_rg"]) ?></h6>
    </li>

    <!-- CPF -->
    <li class="list-group-item">
        <label>CPF:</label>
        <h6><?= formatCnpjCpf($resultado["cli_cpf"]); ?></h6>
    </li>

    <!-- DDD -->
    <li class="list-group-item">
        <label>DDD:</label>
        <h6><?= $resultado["cli_ddd"] ?></h6>
    </li>

    <!-- FONE -->
    <li class="list-group-item">
        <label>Fone:</label>
        <h6><?= formatarTelefone($resultado["cli_fone"]); ?></h6>
    </li>

    <!-- CELULAR -->
    <li class="list-group-item">
        <label>Celular:</label>
        <h6><?= formatarTelefone($resultado["cli_celular"]); ?></h6>
    </li>

    <!-- ENDEREÇO -->
    <li class="list-group-item">
        <label>Endereço:</label>
        <h6><?= $resultado["cli_endereco"]; ?></h6>
    </li>

    <!-- NÚMERO -->
    <li class="list-group-item">
        <label>Número:</label>
        <h6><?= $resultado["cli_numero"] ?></h6>
    </li>

    <!-- BAIRRO -->
    <li class="list-group-item">
        <label>Bairro:</label>
        <h6><?= $resultado["cli_bairro"] ?></h6>
    </li>

    <!-- CIDADE -->
    <li class="list-group-item">
        <label>Cidade:</label>
        <h6><?= $resultado["cli_cidade"] ?></h6>
    </li>

    <!-- UF -->
    <li class="list-group-item">
        <label>UF:</label>
        <h6><?= $resultado["cli_uf"] ?></h6>
    </li>

    <!-- CEP -->
    <li class="list-group-item">
        <label>CEP:</label>
        <h6><?= formatarCEP($resultado["cli_cep"]); ?></h6>
    </li>

    <!-- EMAIL -->
    <li class="list-group-item">
        <label>Email:</label>
        <h6><?= $resultado["cli_email"] ?></h6>
    </li>

    <!-- Data de cadastro -->
    <li class="list-group-item">
        <label>Data de cadastro:</label>
        <h6><?= date("d/m/Y", strtotime($resultado["cli_data_cad"])); ?></h6>
    </li>

    <!-- Qtd de pedidos feitos -->
    <li class="list-group-item">
        <label>Quantidade de pedidos feitos</label>
        <h6><?php
              $query = "SELECT COUNT(*) as qtd_pedidos FROM as_clientes inner join as_pedidos ON as_pedidos.ped_cliente = as_clientes.cli_id WHERE as_pedidos.ped_cliente = $_GET[id_cliente];";
                                print_r(mysqli_query($con,$query)->fetch_assoc()["qtd_pedidos"]);
         ?></h6>
    </li>
</ul>

 

        <hr>
<br>
        <h5>Status da conta</h5>
        <?php if($resultado["status_clientes"] == 0): ?>
            <br>
            <h5>Este cliente está com acesso ativo</h5>
        <?php elseif ($resultado["status_clientes"] == 1): ?>
            <br>
            <h5>Este cliente está com acesso bloqueado</h5>
        <?php endif; ?>
      
<br>
        
</section>  
        <div class="mb-4"></div>
    </body>
</html>
