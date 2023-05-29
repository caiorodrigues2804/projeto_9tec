<?php 

// chamo o objeto template
$smarty = new Template();

// objeto produtos
$produtos = new Produtos();

	// verifico se passei ID da categoria se passei mostro itens da categoria
	if (isset(Rotas::$pag[1])):
		$produtos->GetProdutosCate(Rotas::$pag[1]);

	else:
		// se não passei mostro tudo
		$produtos->GetProdutos();
	endif;

 	if (isset($_GET['w'])) {
 		print '<h4>Categoria: ' . $_GET['w'] . '</h4>';
 	} else if (isset($_GET['c'])) {
 		print '<h4>Categoria: ' . ucfirst($_GET['c']) . '</h4>';
 	}
 

// passo variáveis para o template TPL
$smarty->assign('PRO',$produtos->GetItens());
$smarty->assign('PRO_INFO',Rotas::pag_ProdutosInfo());
$smarty->assign('PRO_TOTAL',$produtos->TotalDados());
$smarty->assign('CATEGORIAS',$produtos->TotalDados());

//echo Rotas::get_ImageURL();
$smarty->assign('PAGINAS',$produtos->ShowPaginacao());
 
$smarty->display('produtos.tpl');


// print '<pre>';
// 	var_dump($produtos->GetItens());
// print '</pre>';