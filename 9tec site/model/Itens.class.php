<?php 

/**
 * Descrição itens
 *  
 * @author Caio Rodrigues
 * */

class Itens extends Conexao{

	private $total_valor;


	function __construct(){
		parent::__construct();
	}

	function GetItensPedido($pedido,$cliente=null){

		$query = "SELECT * FROM {$this->prefix}pedidos p,  {$this->prefix}pedidos_itens i, {$this->prefix}produtos d";
		$query .= " WHERE p.ped_cod = i.item_ped_cod AND i.item_produto = d.pro_id";
		$query .= " AND p.ped_cod = '$pedido'";

		// print $query;

		// verifico se o cliente não veio nulo
		if($cliente != NULL):

			$pedidos = $params[':pedido'] = (int)$cliente;
				
			$query .= " AND p.ped_cliente =  '$pedidos' ";	

		endif; 

			$params[':pedido'] = $pedido;

			$this->ExecuteSQL($query,$params);

			$this->GetLista();

	}

	/**
	 * retorna o array com os itens da tabela
	 * */

	 private function GetLista(){
        
        $i = 1; $sub = 0;
        while ($lista = $this->ListarDados()):
            
        // subtotal de cada item
        $sub = $lista['item_valor'] * $lista['item_qtd'];
        $this->total_valor += $sub;


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
		 'item_id' => $lista['item_id'],	 	      	 	      
		 'item_nome' => $lista['pro_nome'],	 	      
		 'item_valor' => Sistema::MoedaBR($lista['item_valor']),	 
		 'item_valor_us' => $lista['item_valor'],	 	      
		 'item_qtd' => $lista['item_qtd'],	 
		 'item_sub' => Sistema::MoedaBR($sub),
		 'item_sub_us' => $sub,	 	      		 
        );
    
        
        $i++;
        
        endwhile;
        }

        /**
         * @return float : total de carrinho
         * */
        function GetTotal(){
        	return $this->total_valor;
        }

}
