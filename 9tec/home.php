<?php 

 

// instancia a classe smarty
$smarty = new Template();

// passo variáveis para o template
$smarty->assign('BANNER',Rotas::ImageLink('banner.jpg'));
$smarty->assign('PC_GAMER',Rotas::ImageLink('banner_pc2.jpg'));

// chamo o template
$smarty->display('home.tpl');

// incluo a página de produtos
include_once Rotas::get_Pasta_Controller() . '/produtos.php';
