 <?php 

// verifico se não está logado
if(!Login::Logado()):

   Login::AcessoNegacao();
   Rotas::Redirecionar(2, Rotas::pag_ClienteLogin());

   // caso esteja Logado finaliza a compra
   else:
       
      

$_SESSION['VALOR_M'] = $_GET['preco'];
$_SESSION['VALOR_M'] = str_replace(',','.',$_SESSION['VALOR_M']);
$_SESSION['VALOR_M'] = floatval($_SESSION['VALOR_M']);

// caso exista mostro as informações
if (isset($_SESSION['PRO'])):

      $smarty = new Template();

      $carrinho = new Carrinho();

      // Criando um COD para areferência e cod pedido
      $ref_cod_pedido = date('ymdHis') . $_SESSION['CLI']['cli_id'];

      $smarty->assign('PRO',$carrinho->GetCarrinho());
      $smarty->assign('PAG_CARRINHO_ALTERAR', Rotas::pag_CarrinhoAlterar());      
      $smarty->assign('TOTAL',number_format($_GET["valor_total"],2,",","."));
      $smarty->assign('VALOR_FRETE',number_format($_GET["frete"],2,",","."));
      $smarty->assign('VALOR_PRECO',number_format($_GET["preco"],2,",","."));
      $smarty->assign('PAG_PRODUTOS',Rotas::pag_Produtos());
      $smarty->assign('PAG_CARRINHO',Rotas::pag_Carrinho());
      $smarty->assign('tema',Rotas::Get_SiteTema());
      $smarty->assign('NOME_CLIENTE',$_SESSION['CLI']['cli_nome']);
      $smarty->assign('SOBRENOME_CLIENTE',$_SESSION['CLI']['cli_sobrenome']);
      $smarty->assign('ENDERECO_CLIENTE',$_SESSION['CLI']['cli_endereco']);
      $smarty->assign('BAIRRO_CLIENTE',$_SESSION['CLI']['cli_bairro']);
      $smarty->assign('NUMERO_CLIENTE',$_SESSION['CLI']['cli_numero']);
      $smarty->assign('UF_CLIENTE',$_SESSION['CLI']['cli_uf']);
      $smarty->assign('TELEFONE_CLIENTE',$_SESSION['CLI']['cli_fone']);
      $smarty->assign('CELULAR_CLIENTE',$_SESSION['CLI']['cli_celular']);
      $smarty->assign('DDD_CLIENTE',$_SESSION['CLI']['cli_ddd']);
      $smarty->assign('ID_CLIENTE',$_SESSION['CLI']['cli_id']);
      $smarty->assign('PAG_MINHA_CONTA', Rotas::pag_ClientePedidos());
      $smarty->assign('SITE_NOME', Config::SITE_NOME);
      $smarty->assign('SITE_HOME', Rotas::get_SiteHOME());

 

      $freteValor = intval($_GET['valor_total']);

      // classe de pedidos -------------------
      // verifico se tem a sessão de pedido
      if(!isset($_SESSION['PED']['pedido'])):

         $_SESSION['PED']['pedido'] = $ref_cod_pedido; // 20221106205500
      endif;
      // verifico se não tem a referência, e gero uma nova
      if(!isset($_SESSION['PED']['ref'])):

         $_SESSION['PED']['ref'] = $ref_cod_pedido; // 2211152002
      endif;


      $pedido = new Pedidos();

      $cliente = $_SESSION['CLI']['cli_id'];
      $cod  = $_SESSION['PED']['pedido'];
      $ref  = $_SESSION['PED']['ref'];
      $freteValor = $_SESSION['TIPO_FRETE'];
      
      // envio de email --------------------------------------
      $email = new EnviarEmail();
      //   print 'Email: ' . $_SESSION['CLI']['cli_email'];
      $destinatarios = array('',$_SESSION['CLI']['cli_email']);
      $assunto       = '9Tec informática (Pedido) - ' . Sistema::DataAtualBR();      
      $msg           = $smarty->fetch('email_compra.tpl');


      $email->Enviar($assunto,$msg,$destinatarios,$freteValor);

      
      $servername = 'localhost';
      $user = 'root';
      $pass = '';
      $dbname = 'miniloja2017';

      $conn = mysqli_connect($servername,$user,$pass,$dbname);

      if(mysqli_query($conn,"SELECT COUNT(*) FROM `administracao`;")->fetch_assoc()["COUNT(*)"] >= 1):

           $email = new EnviarEmail();      


           $destinatarios = array();

           foreach(mysqli_query($conn,"SELECT * FROM `administracao`;")->fetch_assoc() as $key => $value):
                  if ($key == 'adm_email') {
                        $destinatarios[] = $value;
                  }
           endforeach;
           

           $assunto       = 'Pedido confirmado - 9Tec informática ' . Sistema::DataAtualBR() . ' - ID user: ' . $cliente;      
           $msg           = $smarty->fetch('email_adm.tpl');


           $email->Enviar($assunto,$msg,$destinatarios,$freteValor);

      endif;



      // gravo o pedido no banco  ----------------------------

      if($pedido->PedidoGravar($cliente, $cod, $ref,$freteValor,$freteValor)):

         // limpar a sessão do pedido e dos itens do carrinho
         $pedido->LimparSessoes();
          Rotas::Redirecionar(4,Rotas::pag_Produtos());

      endif;

      // $pedido->ItensGravar($cod);

      $smarty->display('pedido_finalizar.tpl');
    //   $smarty->display('email_compra.tpl');

else:
   echo '<h4 class="alert alert-danger">Sem produtos no seu carrinho</h4>';
   Rotas::Redirecionar(1,Rotas::pag_Produtos());
 
endif;

//fim da verificação de Logado ou não 
endif;