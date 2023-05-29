<?php 

// chamar objeto do template
$smarty = new Template();

// Verifico se esta logado
Login::MenuCliente();

// Chamo a classe de itens
$itens = new Itens();
// pego via post o cod pedido
$pedido = filter_var($_POST['cod_pedido'], FILTER_SANITIZE_STRING);

// executo a minha SQL
$itens->GetItensPedido($pedido);

// Passando dados para o template
$smarty->assign('ITENS', $itens->GetItens());
$smarty->assign('TOTAL', $itens->GetTotal());

$smarty->display('clientes_itens.tpl');

// echo '<pre>';
// var_dump($itens->GetItens());
// echo '</pre>';