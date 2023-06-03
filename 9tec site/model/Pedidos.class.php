<?php 

/**
 * 
 * descrição Pedidos
 * @author Caio Rodrigues
 * */

class Pedidos extends Conexao{

	function __construct(){
		parent::__construct();
	}
 
	function GetPedidoCliente($cliente=null){

		$query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c";		
		$query .= " ON p.ped_cliente = c.cli_id";

		if($cliente != null):
			$cli = (int)$cliente;
			$query .= " WHERE `ped_cliente` = '{$cli}' ORDER BY p.ped_hora DESC;";

			// DEPURAÇÃO
			// print $query;
			
		endif;

		// DEPURAÇÃO
		// print $query;

		$this->ExecuteSQL($query);
		$this->GetLista();

	}	

	/**
	 * retorna o array com os itens da tabela
	 * */

	 private function GetLista(){
        
        $i = 1;
        while ($lista = $this->ListarDados()):
            
        $this->itens[$i] = array(
         'ped_id'    => $lista['ped_id'],  
	     'ped_data'    => Sistema::Fdata($lista['ped_data']),  
	     'ped_hora'    => $lista['ped_hora'],  
	     'ped_data_us'    => $lista['ped_data'],  	     
		 'ped_cliente' => $lista['ped_cliente'],
		 'ped_cod' => $lista['ped_cod'],
		 'ped_ref' => $lista['ped_ref'],
		 'ped_pag_status' => $lista['ped_pag_status'],
		 'ped_pag_forma' => $lista['ped_pag_forma'],
		 'ped_pag_tipo' => $lista['ped_pag_tipo'],
		 'ped_pag_codigo' => $lista['ped_pag_codigo'],
		 'ped_frete_valor' => $lista['ped_frete_valor'],
		 'ped_frete_tipo' => $lista['ped_frete_tipo'],	 	      
        );
        
        
        $i++;
        
        endwhile;
        }

	/**
	 * Método para inserir o pedido no banco
	 * @param INT $cliente
	 * @param string $cod
	 * @param string $ref
	 * @param float  $freteValor
	 * @param string $freteTipo 
	 * */

	function PedidoGravar($cliente,$cod,$ref,$freteValor,$freteTipo){
 

	$params = array(
			':data' => Sistema::DataAtualUS(), 
			':hora' => Sistema::HoraAtual(),
			':cliente'=> (int)$cliente,	
			':cod' => $cod,
			':ref' => $ref,
			':frete_valor'=> $freteValor,
			':frete_tipo' => $freteTipo
	);

	$datas = $params[':data'];
	$horas = $params[':hora'];
	$clientes = $params[':cliente'];
	$cods = $params[':cod'];
	$refs = $params[':ref'];	
	$frete_tipo = addslashes($freteTipo);
	$valores_ = $_SESSION['VALOR_M'];
 	

    $query = "INSERT INTO `{$this->prefix}pedidos` (`ped_data`, `ped_hora`, `ped_cliente`, `ped_cod`,`ped_ref`,`ped_pag_status`,`ped_frete_valor`,`ped_frete_tipo`,`ped_valor_item`) VALUES ('$datas', '$horas', '$clientes', '$cods','$refs','NAO',$freteValor,'$frete_tipo','$valores_')";
 


	 // grava o pedido
	$this->ExecuteSQL($query,$params);
	// grava os itens deste pedido
	$this->ItensGravar($cod);

 	$retorno = TRUE;

 	return $retorno;


 
	}

	/**
	 * 
	 * gravar os itens do pedido
	 * #param string $codepedido
	 * */
 
	function ItensGravar($codpedido){
 	$carrinho = new Carrinho();
 	
	// print ' Funcionando';
	// print (($query == '') ? ' Vazio' : ' Com itens');
	$query ="";
	foreach ($carrinho->GetCarrinho() as $item):

		
		$params = array(
			':produto' => $item['pro_id'],
			':qtd' => (int)$item['pro_qtd'],
			':cod' => $codpedido
		);

	$valores;
	$produtos = $params[':produto'];
	if (isset($_GET["preco"])) 
	{
	$valores = addslashes($_GET['preco']);	
	}	
	$qtd = $params[':qtd'];
	$cods = $params[':cod'];

	$valor_tt = ($valores / $qtd);
		

	// print '<br/>' . $cods . ' '. $qtd .' R$ '. $valores .' Qtd(s) ' . $qtd;
 
    $query = "INSERT INTO `{$this->prefix}pedidos_itens` (`item_produto`, `item_valor`, `item_qtd`, `item_ped_cod`,`valor_original`) VALUES ('$produtos', '$valores', '$qtd', '$cods','$valor_tt')";
    // print '<br/>'. $query . '<br/><br/>';

	$this->ExecuteSQL($query,$params);

	$query = "UPDATE `{$this->prefix}pedidos` SET `ped_valor_original` = '$valor_tt' WHERE `ped_cod` = '$cods';";
	$this->ExecuteSQL($query,$params);

	endforeach;
	}

	/***
	 * 
	 * Limpar sessão do pedido e itens do carrinho 
	 * */

	function LimparSessoes(){

		unset($_SESSION['PRO']);
		unset($_SESSION['PED']['pedido']);
		unset($_SESSION['PED']['ref']);
	}

}