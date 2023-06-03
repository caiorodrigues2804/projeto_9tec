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
            if (!isset($_GET['id'])) 
            { 
                header("Location: produtos.php");
            }  if(empty($_GET['id']))
            {
                header("Location: produtos.php");
            }

            $cmd = $pdo->prepare("SELECT COUNT(*) count FROM `as_produtos` WHERE `pro_id` = :id_d_produto;");
            $cmd->bindValue(":id_d_produto",addslashes($_GET["id"]),PDO::PARAM_INT);
            $cmd->execute();

            $verificador_d = ($cmd->fetch(PDO::FETCH_OBJ)->count);
            if ($verificador_d <= 0) 
            {
                header("Location: produtos.php");
            }


            
            $cmd_d = $pdo->prepare("SELECT * FROM `as_categorias`;");
            $cmd_d->execute();
            $arr = $cmd_d->fetchall(PDO::FETCH_ASSOC);

            $id = addslashes($_GET["id"]);
            if(mysqli_query($con,"SELECT * FROM `as_produtos` WHERE `pro_id` = '$id';")->num_rows <= 0)
            {
                header("Location: produtos.php");
            }
          
            

             $dados = mysqli_query($con,"SELECT cate_nome FROM as_produtos INNER JOIN as_categorias ON pro_categoria = cate_id WHERE pro_id = $id");
           

            $cmd_d_01 = $pdo->prepare("SELECT * FROM `as_produtos` WHERE `pro_id` = :identificador");
            $cmd_d_01->bindValue(":identificador",$id);
            $cmd_d_01->execute();
            $x_y = $cmd_d_01->fetch(PDO::FETCH_ASSOC);
      
            // DEBUGGER
            // print '<pre>';
            //     print_r($arr);
            // print '</pre>';

            if (isset($_GET["editar"])) 
            {
                if (!empty($_GET["editar"])) 
                {
                      if(isset($_POST["alteracao_produtos"]))
                      {
                        // DEPURAÇÃO 
                        // print '<pre>';
                        //     print_r($_POST);
                        // print '</pre>';

                        $erros = [];

                        if(!$peso = filter_input(INPUT_POST,"peso_do_produto",FILTER_VALIDATE_FLOAT)):
                          $erros[] = "Peso precisa ser um float";
                        endif;

                        if(!$valor = filter_input(INPUT_POST,"valor_do_produto",FILTER_VALIDATE_FLOAT)):
                          $erros[] = "Valor precisa ser um float";
                        endif;

                        if(!$altura = filter_input(INPUT_POST,"altura_do_produto",FILTER_VALIDATE_FLOAT)):
                          $erros[] = "Altura do produto precisa ser um float";
                        endif;

                        if(!$largura_do_produto = filter_input(INPUT_POST,"largura_do_produto",FILTER_VALIDATE_FLOAT)):
                          $erros[] = "Largura do produto precisa ser um float";
                        endif;

                        if(!$comprimento_do_produto = filter_input(INPUT_POST,"comprimento_do_produto",FILTER_VALIDATE_FLOAT)):
                          $erros[] = "Comprimento do produto precisa ser um float";
                        endif;

                        // if(!$imagem_produto_url = filter_input(INPUT_POST,"comprimento_do_produto",FILTER_VALIDATE_URL)):
                        //   $erros[] = "Endereço da imagem precisar ser endereço de URL";
                        // endif;


                        // Exibindo mensagens
                            if(!empty($erros)):

                                foreach($erros as $erro):
                                    echo "<li> $erro </li>";            
                                endforeach;

                                else:
                                   
                                $nome_produto = addslashes($_POST["nome_do_produto"]);
                                $sql = $pdo->prepare("SELECT COUNT(*) count FROM `as_produtos` WHERE `pro_id` <> :ids AND `pro_nome` = :n_p");
                                $sql->bindValue(":n_p",$nome_produto);
                                $sql->bindValue(":ids",addslashes($_GET["id"]));
                                $sql->execute();
                                if($sql->fetch(PDO::FETCH_OBJ)->count <= 0)
                                {   
                                    // DEBUGGER
                                    // print '<pre>';
                                    //     print_r($_POST);
                                    // print '</pre>';

                                    $cmd_02 = $pdo->prepare("SELECT * FROM `as_categorias` WHERE `cate_nome` = :d");
                                    $cmd_02->bindValue(":d",addslashes($_POST["categoria_do_produto"]));
                                    $cmd_02->execute();

                                    $_POST["categoria_do_nome"] = ($cmd_02->fetch(PDO::FETCH_OBJ)->cate_id);
                                    $_POST["pro_ativo"] = 'sim';

                                    $arr = [
                                        $_POST["categoria_do_nome"],
                                        $_POST["nome_do_produto"],
                                        $_POST["descricao_do_produto"],
                                        $_POST["peso_do_produto"],
                                        $_POST["valor_do_produto"],
                                        $_POST["altura_do_produto"],
                                        $_POST["largura_do_produto"],
                                        $_POST["comprimento_do_produto"],
                                        $_POST["url_imagem_produto"],
                                        $_POST["url_imagem_produto"],
                                        $_POST["estoque_do_produto"],
                                        $_POST["modelo_do_produto"],
                                        $_POST["ref_do_produto"],
                                        $_POST["fabricante_do_produto"],
                                        $_POST["pro_ativo"],
                                        $_POST["subtitulo_produto"]
                                    ];

                                    // SELECT cate_nome FROM as_categorias INNER JOIN as_produtos ON as_categorias.cate_id = as_produtos.pro_categoria WHERE pro_id = 1;
                                    

                                    $cmd = $pdo->prepare("SELECT * FROM `as_produtos`;");
                                    $cmd->execute();
                                    $valor = $cmd->fetch(PDO::FETCH_ASSOC);
                                    $query = "UPDATE `as_produtos` SET ";
                                    $x = -1;
                                    foreach($valor as $key => $value):
                                        if($key <> 'pro_id' && $key <> 'pro_frete_free'):
                                            $x += 1;
                                            $query .= "`". $key . "` = '" . $arr[$x] . "',";
                                        endif;
                                    endforeach;
                                    $query .= "00";
                                    $query = str_replace(",00","",$query);
                                    $query .= " WHERE `pro_id` = $id";

                                    // DEPURAÇÃO
                                    // print $query;
                                    
                                    $cmd_d_02 = $pdo->prepare($query);
                                    $cmd_d_02->execute();
                                    
                                    // DEPURAÇÃO
                                    // exit();

                                    $url =  '<meta http-equiv="refresh" content="0; url=editar_produto.php?edit_sucesso=1&id=' . $id . '">';
                                    echo $url;


                                }  else 
                                {
                                    mensagem_atencao("Já existe esse nome de produto","danger");
                                } 
                                 
                            endif;                            


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
                    <h4>Editar produto</h4>
                    <div class="mt-4"></div>

                 <a href="

                    <?php 
                    if(!isset($_GET["pesquisado"])){
                    if(!isset($_GET["pagina"])): ?>
                    produtos.php
                    <?php elseif (isset($_GET["pagina"])): ?>
                    produtos.php?pagina=<?php print $_GET["pagina"]; ?>
                    <?php endif; 
                    } else if($_GET["pesquisado"]){
                        if(!isset($_GET["pagina"])):
                    ?>
                        produtos.php?pesquisado=<?php print $_GET["pesquisado"]; ?>
                        <?php elseif (isset($_GET["pagina"])): ?>
                        produtos.php?pesquisado=<?php print $_GET["pesquisado"]; ?>&pagina=<?php print $_GET["pagina"]; ?>
                        <?php endif; ?>
                    <?php } ?>
                    ">
                        <button class="btn btn-secondary">
                            Voltar
                        </button>
                    </a>

                    <hr>

                    <form action="editar_produto.php?editar=1&id=<?= $_GET["id"]; ?>" method="post">
                  
                    <label><h5>Selecione a categoria do produto</h5></label>
                    <div class="col-lg-6">


                    <!-- CATEGORIA DO PRODUTO -->
                    <select name="categoria_do_produto" id="produto_selecionado" class="form-control" required>
                        <?php foreach ($arr as $key => $value): ?>                                
                                <option value="<?php print_r($value["cate_nome"]); ?>"><?php print_r($value["cate_nome"]); ?></option>
                        <?php endforeach;    ?>
                    </select>    

                    <input type="hidden" id="valor_produto_selecionado" value="<?php print_r($dados->fetch_assoc()["cate_nome"]);?>">
                    </div>
                    <!-- / CATEGORIA DO PRODUTO -->

                    <br>

                    <!-- NOME DO PRODUTO -->
                    <div class="col-md-8">                        
                    
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Nome do produto</div>
                            </div>
                            <input class="form-control"  minlength="3" maxlength="24" value="<?= $x_y["pro_nome"]; ?>" type="text" name="nome_do_produto" required>                      
                        </div>
                    </div> 
                    <div class="mt-2"></div>
                    <small>Quantidade máxima de caracteres é de 24</small>
                    <!-- /NOME DO PRODUTO -->
                    <div class="mt-4"></div>

                    <!-- DESCRIÇÃO DO PRODUTO -->
                    <label><h5>Descrição do produto</h5></label>
                    <textarea style="width: 700px;" rows="8" cols="50" class="form-control" name="descricao_do_produto" required><?= $x_y["pro_desc"]; ?></textarea>
                  
                    <!-- /DESCRIÇÃO DO PRODUTO -->
                    <div class="mt-4"></div>
                    <br>
                    <!-- PESO DO PRODUTO -->
                    <div class="col-lg-6">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Peso do produto
                                </div>                                
                            </div>
                            <input class="form-control" value="<?= $x_y["pro_peso"]; ?>" type="text" type="form-control" name="peso_do_produto" required>
                    </div>
                    </div>
                    <!-- /PESO DO PRODUTO -->

                    <br>
                    <!-- VALOR DO PRODUTO -->
                    <div class="col-lg-6">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                 R$:
                                </div>                                
                            </div>
                            <input class="form-control"  value="<?= $x_y["pro_valor"]; ?>" type="text" type="form-control" name="valor_do_produto" required>
                    </div>
                    </div>
                    <!-- /VALOR DO PRODUTO -->

                    <br>
                    <!-- ALTURA DO PRODUTO -->
                       <div class="col-lg-8">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                   Altura do produto
                                </div>                                
                            </div>
                            <input class="form-control" type="text" value="<?= $x_y["pro_altura"]; ?>"  type="form-control" name="altura_do_produto" required>
                    </div>
                    </div>
                    <!-- / ALTURA DO PRODUTO -->

                    <br>
                    <!-- LARGURA DO PRODUTO -->
                       <div class="col-lg-8">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                   Largura do produto
                                </div>                                
                            </div>
                            <input class="form-control" type="text" type="form-control" value="<?= $x_y["pro_largura"]; ?>"  name="largura_do_produto" required>
                    </div>
                    </div>
                    <!-- / LARGURA DO PRODUTO -->

                    <br>
                    <!-- COMPRIMENTO DO PRODUTO -->
                       <div class="col-lg-8">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                   Comprimento do produto
                                </div>                                
                            </div>
                            <input class="form-control" type="text" value="<?= $x_y["pro_comprimento"]; ?>" type="form-control" name="comprimento_do_produto" required>
                    </div>
                    </div>
                    <!-- / COMPRIMENTO DO PRODUTO -->

                   <br>
                    <!-- IMAGEM DO PRODUTO -->

                       <div class="col-lg-8">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                   Imagem do produto URL
                                </div>                                
                            </div>
                            <input id="imagem_produto" class="form-control" value="<?= $x_y["pro_img"]; ?>"  type="url" type="form-control" name="url_imagem_produto" required> 
                    </div>
                    </div>
                    <div>
                        <h5>Imagem do produto</h5>
                        <img id="imagem_d"  src="https://img.freepik.com/fotos-gratis/foto-de-grande-angular-de-uma-unica-arvore-crescendo-sob-um-ceu-nublado-durante-um-por-do-sol-cercado-por-grama_181624-22807.jpg" style="border-radius: 5px;border: 2px solid #000;" width="400px">
                     </div>
                    <!-- / IMAGEM DO PRODUTO -->

                    <br>
                    <!-- ESTOQUE DO PRODUTO -->
                       <div class="col-lg-8">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                   Número de estoque do produto
                                </div>                                
                            </div>
                            <input class="form-control" minlength="0"  value="<?= $x_y["pro_estoque"]; ?>" type="number" type="form-control" name="estoque_do_produto" required>
                    </div>
                    </div>
                    <!-- / ESTOQUE DO PRODUTO -->

                    <br>
                    <!-- MODELO DO PRODUTO -->
                       <div class="col-lg-8">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Modelo do produto
                                </div>                                
                            </div>
                            <input class="form-control" minlength="0" value="<?= $x_y["pro_modelo"]; ?>" type="text" type="form-control" name="modelo_do_produto" required>
                    </div>
                    </div>
                    <!-- / MODELO DO PRODUTO -->


                    <br>
                    <!-- REFERÊNCIA DO PRODUTO -->
                       <div class="col-lg-8">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Referência do produto
                                </div>                                
                            </div>
                            <input class="form-control" type="text" value="<?= $x_y["pro_ref"]; ?>" type="form-control" name="ref_do_produto">
                    </div>
                    </div>
                    <!-- / REFERÊNCIA DO PRODUTO -->

                    <br>
                    <!-- FABRICANTE DO PRODUTO -->
                       <div class="col-lg-8">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Marca
                                </div>                                
                            </div>
                            <input class="form-control" minlength="0" type="text"  value="<?= $x_y["pro_fabricante"]; ?>"  name="fabricante_do_produto" required>
                    </div>
                    </div>
                    <!-- / FABRICANTE DO PRODUTO -->

                    <br>
                    <!--  SUBTÍTULO -->
                    <div class="col-lg-8">
                        <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Subtítulo do produto
                                        </div>
                                </div>
                                <input type="text" min="0" value="<?= $x_y["pro_descricao_extra"]; ?>" class="form-control" name="subtitulo_produto">
                        </div>                        
                    </div>
                    <!-- /SUBTÍTULO -->

                    <br>
                    <!-- FRETE GRÁTIS -->
                   <!--  <h5>Frete grátis?</h5>
                       <div class="col-lg-2">
                        <select id="fretes_gratis" name="frete_gratis" class="form-control" required>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>    
                        </div> -->
                    <!-- / FRETE GRÁTIS  -->
                    <!-- <br> -->
                    <button type="submit" name="alteracao_produtos" class="btn btn-success">Aplica alteração</button>
                    <br><br>
                      </form>
              </center>

            </div>            
        </div>

        <input type="hidden" id="fretes" value="<?= $x_y["pro_frete_free"]; ?>" name="">
        <script>

                setInterval(() => {
                        // DEBUGGER
                        // console.log(document.querySelector("#imagem_produto").value);
                    if (!(document.querySelector("#imagem_produto").value == '')) {                        
                    document.querySelector("#imagem_d").src = document.querySelector("#imagem_produto").value;
                    } else {
                      document.querySelector("#imagem_d").src = 'https://triunfo.pe.gov.br/pm_tr430/wp-content/uploads/2018/03/sem-foto.jpg';  
                    }

                })

                document.querySelector("#fretes_gratis").value = document.querySelector("#fretes").value;
                document.querySelector("#produto_selecionado").value = document.querySelector("#valor_produto_selecionado").value;

function ConfirmDialog(message) {
  $('<div></div>').appendTo('body')
    .html('<div><h6>' + message + '</h6></div>')
    .dialog({
      modal: true,
      title: '⚠️ AVISO',
      zIndex: 10000,
      autoOpen: true,
      width: 'auto',
      resizable: false,
      buttons: {
        Sim: function() {
           
              $(this).dialog("close");        
              location.href = 'editar_produto.php?id=' + <?php print $_GET["id"]; ?>

        }        
      },
      close: function(event, ui) {
        $(this).remove();
      }
    });
};


        </script>

<?php  if (isset($_GET["edit_sucesso"])) 
{
    if(!empty($_GET["edit_sucesso"]))
    {
       ?>
       <script>
           ConfirmDialog('Foi alterado com sucesso!');
       </script>
       <?php 
    }
} ?>
      
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
