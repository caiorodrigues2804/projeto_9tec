<?php 

/**
 * descrição da Paginação
 * 
 * @author Caio Rodrigues
 *  
 * */

class Paginacao extends Conexao{

	/**
	 * @var int passa o limite de itens por pagina
	 * */

	public $limite;

	/**
	 * @var int define onde começa a navegação pagina inicial
	 * */
	public $inicio;

	/**
	 * @var array numérico que pega as paginas para navega~]ap
	 * */
	public $link = array();	

	/**
	 * @var int numero total de páginas
	 * */
	public $totalpags;

	/**
	 * 
	 * @param string: campos da tabela
	 * @param string: tabela do banco
	 * 
	 * */

	function GetPaginacao($campo,$tabela){

		// DEBUGGING
		// print 'CAMPO: ' . $campo . ' TABLE: ' . $tabela . '<br/>';

		// Faço uma consulta em um campo da tabela
		$query = "SELECT {$campo} FROM {$tabela}";
		$this->executeSQL($query);

		 // Conto o resultado e pego o total
		$totalpags = $this->TotalDados();
		
		// Defino limite de itens por página
		$this->limite = Config::BD_LIMITE_POR_PAG;
		 
		// Pego o número total de páginas que eu vou obter
		// 15 / 3 ---> 5 páginas
		// 18 / 3 ---> 6 páginas
		// 21 / 3 ---> 7 páginas

		$paginas = ceil($this->TotalDados() / Config::BD_LIMITE_POR_PAG);
		// session_start();
		$_SESSION['max_paginas'] = $paginas;		

	  	$this->Totalpags = $paginas;	  

		// Pego o número da página para navegação URL 
		$p = (int)isset($_GET['p']) ? $_GET['p'] : 1;	
		$p = filter_var($p, FILTER_SANITIZE_NUMBER_INT);
 		 

 		// Verifica se não passei página na URL a mais do que eu tenho
		if($p > $paginas):
			$p = $paginas;
		endif;

		// Defino onde começa a paginação
		$this->inicio = ($p * $this->limite) - $this->limite;

		// margem de tolerância para cima ou para baixo da página atual
		$tolerancia = 5;

		// quanto links mostrar na tela (atual + ou - tolerencia)
		$mostrar = $p + $tolerancia;

		// verifico se quanto mostrar não é maior do que eu tenho no total
		if ($mostrar > $paginas):
			$mostrar = $paginas;
		endif;	

		// faço um laço passando os links das paginas para um array
		for($i = ($p - $tolerancia);$i <= $mostrar;$i++):

			// verifico se o meu $i não é negativo
			if($i < 1):
				$i = 1;
			endif;

			array_push($this->link,$i);

		endfor;

	}	
}