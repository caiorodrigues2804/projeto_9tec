<?php 

// objeto do template
$smarty = new Template();

// Chamo o menu de cliente logado
Login::MenuCliente();


// Verifico se foi passado o post com senha atual e a nova
if(isset($_POST['cli_senha_atual']) and isset($_POST['cli_senha'])):

  

    // pego dados do post e sessão atual para variáveis
	
	$senha_atual = Sistema::Criptografia($valor);
	$senha_nova  = $_POST['cli_senha'];
	$email 		 = $_SESSION['CLI']['cli_email'];

 
	//  echo '<pre>';
	//  	print_r($_POST);
	//  echo '</pre>';

	// echo '<pre>';
	//  	print_r($_SESSION['cli']);
	//  echo '</pre>';

 	// Verifico se a senha atual foi digitada corretamente
	 if($senha_atual != $_SESSION['CLI']['cli_pass']):

	 	echo '<div class="alert alert-danger"> A senha atual está incorreta </div>';
	 	Rotas::Redirecionar(4,Rotas::pag_SenhaAlterada());
	 	exit();
	 endif;
	  	
	 // gravo a nova senha no banco de dados

	 $servername = "localhost";
	 $database = "miniloja2017";
	 $username = "root";
	 $password = "";	

	 $con = mysqli_connect($servername,$username,$password,$database);

	 if($con == mysqli_connect_error()){print 'Aconteceu um erro';}


	 mysqli_query($con,"UPDATE `as_clientes` SET `dados_extras` = '$senha_nova' WHERE `cli_email` = '$email'");



	
	 $clientes->setCli_senha($senha_nova);
	 
	 $clientes->setCli_email($email);
	 
 	 $clientes = new Clientes();
	 $clientes->SenhaUpdate($clientes->getCli_senha(), $clientes->getCli_email());

	 echo '<div class="alert alert-success">A senha foi trocada com sucesso!! Já pode fazer login com sua nova senha</div>';

 	Rotas::Redirecionar(4,Rotas::pag_Logoff());
	

// caso não exista o post de alterar a senha, mostro os campos no template

else:

// Chamo o template 
$smarty->display('clientes_senha.tpl');
 
endif;


