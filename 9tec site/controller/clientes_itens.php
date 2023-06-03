<?php 

// chamar objeto do template
$smarty = new Template();

// Verifico se esta logado
Login::MenuCliente();

// Chamo a classe de itens
$itens = new Itens();
// pego via post o cod pedido
$pedido = filter_var($_POST['cod_pedido'], FILTER_SANITIZE_STRING);

// executo a minha SQL
$itens->GetItensPedido($pedido);

// Passando dados para o template
$smarty->assign('ITENS', $itens->GetItens());
$smarty->assign('TOTAL', $itens->GetTotal());

$smarty->display('clientes_itens.tpl');

// echo '<pre>';
// var_dump($itens->GetItens());
// echo '</pre>';


if(isset($_GET["pagamento"]))
{
	 $pdo;
	 try 
	 {
	 	$pdo = new PDO("mysql:dbname=miniloja2017;host=localhost","root","");
	 } catch(PDOException $e)
	 {
	 	print 'Erro com o banco de dados: ' . $e->getMessage();
	 } catch(Exception $e)
	 {
	 	print 'Erro genérico: ' . $e->getMessage();
	 }

	 $cmd = $pdo->prepare("UPDATE `as_pedidos` SET `ped_pag_status` = 'SIM' WHERE `ped_ref` = :ped_refs;");
	 $cmd->bindValue(":ped_refs",addslashes($_GET["cod_produto"]),PDO::PARAM_INT);
	 $cmd->execute();


	  $email = new EnviarEmail();

	  $cliente = $_SESSION['CLI']['cli_id'];
      $cod  = $_SESSION['PED']['pedido'];
      $ref  = $_SESSION['PED']['ref'];
      $freteTipo = $_SESSION['TIPO_FRETE'];
      $freteValor = addslashes($_GET["frete"]);
      

      //   print 'Email: ' . $_SESSION['CLI']['cli_email'];
      $destinatarios = array('',$_SESSION['CLI']['cli_email']);
      $assunto       = '9Tec informática (Confirmação do pedido) - ' . Sistema::DataAtualBR();      
      $msg           = $smarty->fetch('email_compra_confirmado.tpl');


      $email->Enviar($assunto,$msg,$destinatarios,$freteValor);

	 header("Location: clientes_pedidos");
}