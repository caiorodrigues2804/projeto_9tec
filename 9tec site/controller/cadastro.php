<?php 

// objeto do template smarty
$smarty = new Template();

$smarty->assign('TERMO_DE_USO', Rotas::pag_TermosUso());

// Verifico se passou os POST
if(isset($_POST['cli_nome']) and isset($_POST['cli_email']) and isset($_POST['cli_cpf'])):

	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';

	//Criar variáveis
	$cli_nome           = $_POST['cli_nome'];
	$cli_sobrenome      = $_POST['cli_sobrenome'];
	$cli_data_nasc      = $_POST['cli_data_nasc'];
	$cli_rg             = $_POST['cli_rg'];
	$cli_cpf            = $_POST['cli_cpf'];
	$cli_ddd            = $_POST['cli_ddd'];
	$cli_fone           = $_POST['cli_fone'];
	$cli_celular        = $_POST['cli_celular'];
	$cli_endereco       = $_POST['cli_endereco'];
	$cli_numero         = $_POST['cli_numero'];
	$cli_bairro         = $_POST['cli_bairro'];
	$cli_cidade         = $_POST['cli_cidade'];
	$cli_uf             = $_POST['cli_uf'];
	$cli_cep            = $_POST['cli_cep'];
	$cli_email          = $_POST['cli_email'];
	// print 'POST: ' . $cli_email;
	$cli_senha		    = Sistema::GerarSenha(1);
	$cli_senha_2 		= $cli_senha;
	print 'A sua senha é ' . $cli_senha;
	$cli_data_cad 		= Sistema::DataAtualUS();
	$cli_hora_cad 		= Sistema::HoraAtual();

 	$_SESSION['CEP'] = $cli_cep;
 	$_SESSION['UF'] = $cli_uf;
 	$_SESSION['DDD'] = $cli_ddd;

	// Gravo os dados no banco
	$clientes = new Clientes();
	$clientes->Preparar($cli_nome,$cli_sobrenome,$cli_data_nasc,$cli_rg,$cli_cpf,$cli_ddd,$cli_fone,$cli_celular,$cli_endereco,$cli_numero,$cli_bairro,$cli_cidade,$cli_uf,$cli_cep,$cli_email,$cli_data_cad,$cli_hora_cad,$cli_senha,$cli_senha_2);
	
		// $clientes->Preparar($cli_nome,$cli_sobrenome,$cli_data_nasc,$cli_rg,$cli_cpf,$cli_ddd,$cli_fone,$cli_celular,$cli_endereco,$cli_numero,$cli_bairro,$cli_cidade,$cli_uf,$cli_cep,$cli_email,$cli_data_cad,$cli_hora_cad,$cli_senha);

	// Envio email para o cliente

	// passo variáveis para o template de email de cadastro
	$smarty->assign('NOME',$cli_nome);
	$smarty->assign('EMAIL',$cli_email);
	$smarty->assign('SENHA',$cli_senha);
	$smarty->assign('PAG_MINHA_CONTA',Rotas::pag_ClienteConta());
	$smarty->assign('SITE', Config::SITE_NOME);
	$smarty->assign('SITE_HOME', Rotas::get_SiteHOME());


	$mail = new EnviarEmail();
	$assunto = 'Cadastro Efetuado ' . Config::SITE_NOME;
	$msg = $smarty->fetch('email_cliente_cadastro.tpl');
	$destinatarios = array($cli_email,Config::SITE_EMAIL_ADM);

	$mail->Enviar($assunto,$msg,$destinatarios);
	
	$clientes->Inserir();

	// Verifico cadastro dou, aviso e levo o cliente até a tela de login
	echo '<div class="alert alert-success">Olá ' . $cli_nome . ', cadastro efetuado com sucesso!!! A senha enviada para seu email cadastrado<br/>A senha para fazer login foi enviado para seu email "'. $cli_email . '". Acesse seu email para visualizar a senha.</div>';
	Rotas::Redirecionar(5,Rotas::pag_ClienteLogin());

// se não tem POSTS mostra os campos do cadastro
else:


// chamo o template
$smarty->display('cadastro.tpl');

endif;

?>
 