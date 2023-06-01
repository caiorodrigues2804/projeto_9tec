<?php 

// Objeto do template
$smarty = new Template();

Login::MenuCliente();
 
$smarty->display('minhaconta.tpl');
 