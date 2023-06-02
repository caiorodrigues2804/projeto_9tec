<?php 

// objeto do template
$smarty = new Template();
$smarty->assign('ADM', Rotas::pag_ADM_d());

// objeto do login
$login = new Login();

// Create connection
$pdo;
try 
{

$pdo = new PDO("mysql:dbname=miniloja2017;host=localhost","root","");

} catch (PDOException $e)
{
	print "Erro com o banco de dados: " . $e->getMessage();
}
catch(Exception $e)
{
	print "Erro genérico: " . $e->getMessage();
}
 
// verifico se passei o post para efetuar o login
	if (isset($_POST['txt_email']) && isset($_POST['txt_senha'])):

		$user  = $_POST['txt_email'];
		$senha = $_POST['txt_senha'];
		
		$cmd = $pdo->prepare("SELECT `status_clientes` FROM `as_clientes` WHERE `cli_email` = '$_POST[txt_email]';");
		$cmd->execute();
		$validador = $cmd->fetch(PDO::FETCH_ASSOC)["status_clientes"];

		if($validador <= 0):
		
		$login->GetLogin($user,$senha);
		// var_dump($_SESSION['CLI']);

		elseif ($validador >= 1):
			echo '<div class="alert alert-danger" style="text-align:center;"><h3>Acesso bloqueado</h3></div>';
			Rotas::Redirecionar(3,self::get_SiteHOME() . "/login");
		endif;

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