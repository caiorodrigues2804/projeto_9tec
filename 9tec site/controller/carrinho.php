 <?php 

 

// caso exista mostro as informações
if (isset($_SESSION['PRO'])):

      $smarty = new Template();

      $carrinho = new Carrinho();

      $smarty->assign('PRO',$carrinho->GetCarrinho());
      $smarty->assign('PAG_CARRINHO_ALTERAR', Rotas::pag_CarrinhoAlterar());
      $smarty->assign('TOTAL', (Sistema::MoedaBR($carrinho->GetTotal(), 0, 5)));
    //   echo substr("39.199999999999996",0,5);
      $smarty->assign('PESO', $carrinho->GetPeso());
      $smarty->assign('PAG_PRODUTOS',Rotas::pag_Produtos()); 
      $smarty->assign('PAG_CONFIRMAR',Rotas::pag_PedidoConfirmar()); 

      $smarty->display('carrinho.tpl');
else:
   echo '<h4 class="alert alert-danger">Sem produtos no seu carrinho</h4>';
   Rotas::Redirecionar(1,Rotas::pag_Produtos());
 
endif;
 
?>
