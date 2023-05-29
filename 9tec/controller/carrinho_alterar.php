<?php 
// print_r($id);

if(!isset($_POST['pro_id']) or $_POST['pro_id'] < 1):
	echo '<h4 class="alert alert-danger">Erro na operação ❌</h4>';
	Rotas::Redirecionar(1,Rotas::pag_Carrinho());
	exit();
endif;

$id = (int) $_POST['pro_id'];
$carrinho = new Carrinho();

try
{
	$carrinho->CarrinhoADD($id);
	
			
} catch (Exception $ex)
{
	echo '<h4 class="alert alert-danger">Erro na operação ❌</h4>';
}

Rotas::Redirecionar(1,Rotas::pag_Carrinho());

// sleep(10);
// header("Location:" . Rotas::pag_Carrinho());

