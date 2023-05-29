<?php 

// verifico se iniciou a sessão
if(!isset($_SESSION)):
	session_start();
endif;

// Setando o meu timezone
date_default_timezone_set('America/Sao_Paulo');


// carrega o auto load
require './lib/autoload.php';

// Chamo a classe do template
$smarty = new Template();
// Trago os dados da categorias
$categorias = new Categorias();
$categorias->GetCategorias();

// Passo valores  para o meu template
$smarty->assign('H2', 'Adega Unibeer');
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('SITE_NOME', Config::SITE_NOME);

$smarty->assign('GET_SITE_HOME', Rotas::get_SiteHOME());
$smarty->assign('TERMO', Rotas::pag_Termo_de_uso());
$smarty->assign('PAG_CLIENTE_CONTA', Rotas::pag_ClienteConta());
$smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
$smarty->assign('PAG_CONTATO', Rotas::pag_Contato());
$smarty->assign('PAG_PRODUTOS', Rotas::pag_Produtos());
$smarty->assign('BUSCADOR', Rotas::pag_BuscadorResultados());
$smarty->assign('LOGOTIPO',Rotas::ImageLink('logo4.png'));
$smarty->assign('LOGOTIPO2',Rotas::ImageLink('logo2.png'));


// LOCALIZAÇÃO
$smarty->assign('PAG_LOCALIZACAO', Rotas::pag_Localizacao());

$smarty->assign('CATEGORIAS', $categorias->GetItens());
$smarty->assign('DATA', Sistema::DataAtualBR());
$smarty->assign('LOGADO',Login::logado());
$smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());

// $dados = new Conexao();
// $dados->ExecuteSQL("select * from clientes");
// echo $dados->totalDados();

if(Login::logado()):
	$smarty->assign('USER',$_SESSION['CLI']['cli_nome']);
endif;

// chamo o template
$smarty->display('index.tpl');

 
