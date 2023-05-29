<?php 

$smarty = new Template();

$smarty->assign('CONTATO','Pagina de contato');
$smarty->assign('BANNER',Rotas::ImageLink('banner_g.jpg'));


$smarty->display('contato.tpl');