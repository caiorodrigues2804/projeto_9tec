<?php 

/**
 * descricao Carrinho
 * 
 * @author Caio Rodrigues
 * 
 * */
  
class Carrinho{

	/**
	 * 
	 * @var float : armazena o valor total dos itens do carrinho 
	 * */

	private $total_Valor;

	/**
	 * 
	 * @var float : peso total dos itens
	 * */
	private $total_Peso;

	/**
	 * 
	 * @var array : todos os itens do carrinho
	 * */
	private $itens=array();
	
	function GetCarrinho($sessao=null){

		$i = 1; $sub = 0; $peso = 0;

		
		foreach($_SESSION['PRO'] as $lista):

		// calculo o subtotal do item
		$sub = ($lista['VALOR_US'] * $lista['QTD']);
		$this->total_Valor += $sub;

		// calcula peso
		$peso = $lista['PESO'] * $lista['QTD'];
		$this->total_Peso += $peso;

		// gero meu array dos itens
		$this->itens[$i] = array(
			'pro_id'    => $lista['ID'],
			'pro_nome'  => $lista['NOME'],
			'pro_valor' => $lista['VALOR'], // 1.000,99
			'pro_valor_us' => $lista['VALOR_US'], // 1000.99
			'pro_peso'  => $lista['PESO'],
			'pro_qtd'   => $lista['QTD'],
			'pro_img'   => $lista['IMG'],
			'pro_link'  => $lista['LINK'],
			'pro_subTotal'  => Sistema::MoedaBR($sub),
			'pro_subTotal_us'  => $sub
			);

	 	
			$i++;

		endforeach;

		if(count($this->itens) > 0):
				return $this->itens;
		else:
			echo '<h4 class="alert alert-danger">Sem produtos no seu carrinho</h4>';
			Rotas::Redirecionar(1,Rotas::pag_Produtos());
		endif;

	}

	/**
	 * @return float : total do carrinho
	 * */
	function GetTotal(){
		return $this->total_Valor;
	}
 
	/**
	 * @return float com o peso
	 * */
	function GetPeso(){
		return $this->total_Peso;
	}

	function CarrinhoADD($id){

		$produtos = new Produtos();

		$produtos->GetProdutosID($id);

				foreach ($produtos->GetItens() as $pro):
				$ID = $pro['pro_id'];
				$NOME  = $pro['pro_nome'];
				$VALOR_US = $pro['pro_valor_us'];
				$VALOR = $pro['pro_valor'];
				$PESO  = $pro['pro_peso'];
				$QTD   = 1;
				$IMG   = $pro['pro_img'];
				$LINK = Rotas::pag_ProdutosInfo() . '/' . $ID . '/' . $pro['pro_slug'] . '.png'; 
				$ACAO = $_POST['acao'];
		endforeach;

		switch ($ACAO):

			// caso seja para inserir 
			case 'add':

			// verifico se não tem ainda o produto se não gravo um novo
			if (!isset($_SESSION['PRO'][$ID]['ID'])):
				$_SESSION['PRO'][$ID]['ID']    = $ID;
				$_SESSION['PRO'][$ID]['NOME']  = $NOME;
				$_SESSION['PRO'][$ID]['VALOR']  = $VALOR;
				$_SESSION['PRO'][$ID]['VALOR_US'] = $VALOR_US;
				$_SESSION['PRO'][$ID]['PESO'] = $PESO;
				$_SESSION['PRO'][$ID]['QTD']  = $QTD;
				$_SESSION['PRO'][$ID]['IMG']  = $IMG;
				$_SESSION['PRO'][$ID]['LINK'] = $LINK;

				// se já tem aumento a QTD
			else:

			$_SESSION['PRO'][$ID]['QTD'] += $QTD;

			endif;
			echo '<h4 class="alert alert-success">Produto inserido ✅ </h4>';

				break;	
			// caso seja para deletar item
			case 'del':

				$this->CarrinhoDEL($id);

			echo '<h4 class="alert alert-danger">Produto Removido ✅ </h4>';
				break;
			// caso seja para limpar o carrinho todo
			case 'limpar':
			$this->carrinhoLimpar();
			echo '<h4 class="alert alert-danger">Produtos Removidos ✅ </h4>';

			break;

		endswitch;
	}

	/** 
	 * 
	 * @param int produto e remove
	 * */
	private function CarrinhoDEL($id){

		unset($_SESSION['PRO'][$id]);

	}

	/**
	 * Limpar o carrinho
	 * */
	private function carrinhoLimpar(){
 
		unset($_SESSION['PRO']);

	}
}