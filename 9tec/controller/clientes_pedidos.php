<?php 


// Objeto do template
$smarty = new Template();

// Verifico se está logado	
Login::MenuCliente();

// Objeto da classe pedidos
$pedidos = new Pedidos();

// Trazer os pedidos
$pedidos->GetPedidoCliente($_SESSION['CLI']['cli_id']);

// Passando variáveis para o template
$smarty->assign('PEDIDOS',$pedidos->GetItens());
$smarty->assign('PAG_ITENS',Rotas::pag_ClienteItens());
 
$smarty->display('clientes_pedidos.tpl');

