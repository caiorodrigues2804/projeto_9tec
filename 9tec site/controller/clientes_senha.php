<?php
// objeto do template 
$smarty = new Template();
$conexoes = new Conexao();

// chamo o menu de cliente logado
Login::MenuCliente();


// verifico se foi passo o post  com senha atual e a nova 
if(isset($_POST['cli_senha_atual']) and isset($_POST['cli_senha'])):
     

 // pego dados do post e sessão atual para variaveis
       
    $senha_atual = Sistema::Criptografia($_POST['cli_senha_atual']);
    $senha_nova  = Sistema::Criptografia($_POST['cli_senha']);
    $email       =  $_SESSION['CLI']['cli_email'];     
   
  $query = "UPDATE `as_clientes` SET `dados_extras` = '$_POST[cli_senha]' WHERE `cli_email` = '$email'";
    // print $query;
   $conexoes->ExecuteSQL($query);
    
     // verifico se a senha atual foi digitada corretamente
     if($senha_atual != $_SESSION['CLI']['cli_pass']):
         
         echo '<div class="alert alert-danger">  ';
         Sistema::VoltarPagina();
         echo '  A senha atual está incorreta  </div>';
         exit();
    
    endif;   
    
    // gravo a nova senha no banco de dados  

   $clientes = new Clientes();
   $clientes->SenhaUpdate($senha_nova, $email);

       echo '<div class="alert alert-success"> Senha alterada com sucesso! Já pode fazer login com sua nova senha </div>';
   
    	Rotas::Redirecionar(2,Rotas::pag_Logoff());
       
// caso não exista o post de alterar a senha, mostro os campos no template        
else:   
    
  
// chamo o template 
$smarty->display('clientes_senha.tpl');    
    
endif;



