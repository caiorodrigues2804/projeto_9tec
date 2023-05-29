<?php 

// objeto do template
$smarty = new Template();

// Chamo o menu de cliente logado
Login::MenuCliente();

if(isset($_POST['cli_nome']) and isset($_POST['cli_email']) and isset($_POST['cli_cpf'])):

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
	$cli_senha 			= $_POST['cli_senha'];
	$cli_senha_2  		= $_POST['cli_senha'];
	$cli_data_cad 		= $_SESSION['CLI']['cli_data_cad'];
	$cli_hora_cad 		= $_SESSION['CLI']['cli_hora_cad'];

	// verifico se a senha atual está correta

	if($_SESSION['CLI']['cli_pass'] != Sistema::Criptografia($cli_senha)):


	 	echo '<div class="alert alert-danger"> A senha atual está incorreta </div>';
	 	exit();


	endif;

// Gravanado os dados no banco

	$clientes = new Clientes();

		$clientes->Preparar($cli_nome,$cli_sobrenome,$cli_data_nasc,$cli_rg,$cli_cpf,$cli_ddd,$cli_fone,$cli_celular,$cli_endereco,$cli_numero,$cli_bairro,$cli_cidade,$cli_uf,$cli_cep,$cli_email,$cli_data_cad,$cli_hora_cad,$cli_senha,$cli_senha_2);
	
	$dados_sw = $_SESSION['CLI']['cli_id'];

	// Tento executar a SQL de update
	if(!$clientes->Alterar($dados_sw)):
	 	echo '<div class="alert alert-danger">Ops!! Ocorreu um erro ao gravar os dados</div>';

		exit();		

		// caso passou na SQL perfeitamente

	else:

	// terminando as alterações mostra uma mensagem

	echo '<script> alert("Dados alterados com sucesso! Atualizando os dados do login..."); </script>';
	// echo '<div class="alert alert-success">';
	// echo  '</div>';

	// Forçar o nobo login do cliente
	$login = new Login();
	$login->GetLogin($cli_email,$cli_senha);

	// Rotas::Redirecionar(3, Rotas::pag_Logoff());

	endif;

// Caso não tenha post ainda
else:


// passando variaveis para o template
// 
// Varrendo o array da sessão de cliente e pegando os dados
foreach($_SESSION['CLI'] as $campo => $valor):

	$smarty->assign(strtoupper($campo),$valor);

	// print strtoupper($campo) . ' => ' . $valor . '<br/>';

endforeach;

// $smarty->assign('cli_nome', $cli_nome);


// Chamo o template 
$smarty->display('clientes_dados.tpl');

// fim da verificação se existe o POST dos dados do cliente
endif;


