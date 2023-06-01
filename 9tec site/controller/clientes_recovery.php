<?php 

// objeto do template smarty
$smarty = new Template();


$connect = new Conexao();
 

// verifico se existe um post do email
if(isset($_POST['cli_email'])):

	// classe de clientes
	$cliente = new Clientes();

	// metodo que valida o email
	$cliente->setCli_email($_POST['cli_email']);

	// verifico se existe o email
	if($cliente->GetClienteEmail($cliente->getCli_email()) > 0):
	// o email foi encontrado

	$email_validador = $_POST['cli_email'];
	

    $servername = "localhost";
    $database = "miniloja2017";
    $username = "root";
    $password = "";
 
    $con = mysqli_connect($servername, $username, $password, $database);
 
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
   ;
    

     $ds = mysqli_query($con,"SELECT `dados_extras` FROM `as_clientes` WHERE `cli_email` = '$email_validador'");
     $novasenha = mysqli_fetch_assoc($ds)["dados_extras"];
    //  print $novasenha;

		
	// Enviar o email para o cliente
	$email = new EnviarEmail();

	$destinatarios = array($cliente->getCli_email(), Config::SITE_EMAIL_ADM);
	$assunto = '(Sua senha) 9Tec informática';
	$msg = '<h4 style="font-family: arial;">Olá cliente, foi solicitada a sua senha para acessar o Site ' . Config::SITE_NOME . '<br/>';
	$msg .= "<br/> Sua senha para acessar o login é  <b style='font-size: 18px;'>( " . $novasenha . " )</b><br/>";
	$msg .= 'Recomendamos que faça a alteração da sua senha através do site na opção "Alterar Senha" quando estiver logado'; 
	$msg .= '<hr/><center><img src="https://github.com/caiorodrigues2804/projeto_9tec/raw/main/img/img1.png" width="400px"><br/><a href="' . Config::SITE_URL . '">' . Config::SITE_URL . '</a></h4></center>';
	$email->Enviar($assunto,$msg,$destinatarios);

	// mostra mensagem na tela que foi enviada a senha
	echo "<div class='alert alert-success'><h5>Olá cliente, enviamos a sua senha que já está cadastrado no site, verifique no seu email<h5></div>";
	Rotas::Redirecionar(6,Rotas::pag_ClienteLogin());
	else:
	// email não foi encontrado
		echo '<h3>Email não foi encontrado no sistema</h3>';
		Rotas::Redirecionar(3,Rotas::pag_ClienteLogin());
	endif;

// caso não exista o post mostro o template
else:

	// chamo o template
	$smarty->display('clientes_recovery.tpl');

endif;

