<?php 

// objeto do template
$smarty = new Template();
$smarty->assign('ADM', Rotas::pag_ADM_d());

// objeto do login
$login = new Login();

 
// verifico se passei o post para efetuar o login
	if (isset($_POST['txt_email']) && isset($_POST['txt_senha'])):

		$user  = $_POST['txt_email'];
		$senha = $_POST['txt_senha'];
		

		$login->GetLogin($user,$senha);
		// var_dump($_SESSION['CLI']);

	endif;

// passo variáveis para o template
	$smarty->assign('LOGADO', Login::logado());
	$smarty->assign('PAG_CADASTRO', Rotas::pag_CLienteCadastro());
	$smarty->assign('PAG_RECOVERY', Rotas::pag_ClienteRecovery());
	$smarty->assign('LOGOTIPO',Rotas::ImageLink('logo2.png'));


// verifico se estou logado ou não
	if(Login::logado()):

		$smarty->assign('USER',$_SESSION['CLI']['cli_nome']);
		$smarty->assign('PAG_LOGOFF',Rotas::pag_Logoff());

		// caso já esteja logado
		Login::MenuCliente();


	endif;


$smarty->display('login.tpl');