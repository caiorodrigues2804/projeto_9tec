<?php 

class ProdutosImages extends Conexao{

	/**
	 * 
	 * @param INT id do produto
	 * */

	function GetImagesPRO($pro){

		$query = "SELECT * FROM {$this->prefix}imagens WHERE img_pro_id = :pro";	

		$query .= ":pro = {$pro}";

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
         'img_id'     => $lista['img_id'],
         'img_nome'   => Rotas::imageLink($lista['img_nome']),
         'img_pro_id' => $lista['img_pro_id'],    
         'img_link'   => Rotas::ImageLink($lista['img_nome']),                 
        );
        
        
            $i++;
        
        endwhile;
        }

}