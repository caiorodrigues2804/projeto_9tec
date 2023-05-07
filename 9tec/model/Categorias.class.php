<?php 

/**
 * CATEGORIAS
 * */

class Categorias extends Conexao{
	 function __construct(){
	 	parent::__construct();
	 }

	 /**
	  * Retorna o sql da consulta de categorias 
	  * */

	 function GetCategorias(){

	 	$query = "SELECT * FROM {$this->prefix}categorias";
	 	$this->ExecuteSQL($query);
	 	// echo $query;

	 	$this->GetLista();
	 }

	 /**
	 * retorna o array com os itens da tabela
	 * */

	 private function GetLista(){
        
        $i = 1;
        while ($lista = $this->ListarDados()):
            
        $this->itens[$i] = array(
         'cate_id'    => $lista['cate_id'] ,  
         'cate_nome'  => $lista['cate_nome'] ,  
         'cate_slug'  => $lista['cate_slug'] ,  
         'cate_link'  => Rotas::pag_Produtos() . '/' . $lista['cate_id'] .'/' . $lista['cate_slug'],  
        );
        
        
            $i++;
        
        endwhile;
        }


}
 