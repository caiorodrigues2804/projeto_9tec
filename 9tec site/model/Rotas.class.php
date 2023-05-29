<?php 

	/**
	 * Descrição esta classe trata de várias coisas sobre url
	 * 
	 * @author Caio Rodrigues
	 * */

	class Rotas{

		/**** @var string - define a pasta controller  **/
		private static $pasta_controller = 'controller';

		/**** @var string - define a pasta de view * */
		private static $pasta_view = 'view';

		/**
		 * 
		 * 
		 *  @var array: recebe os parametros da URL
		 * */

		public static $pag;

		/**
		 * Trata página e parametro da URL 
		 */

		static function get_Pagina(){


			// == Verifico se existe parametro pag na URL == //
			if(isset($_GET['pag'])):

				$pagina = $_GET['pag'];


				self::$pag = explode('/',$pagina);

				$barra = DIRECTORY_SEPARATOR;			

				$pagina = self::$pasta_controller . $barra . self::$pag[0] . '.php';

				if (file_exists($pagina)):
					include $pagina;
				// print $pagina . '<br/>';

				else:
					print 'Arquivo não encontrado: ' . $pagina;
					include 'erro.php';

				endif;
				// se não passou nada pela URL
				else:
					include 'home.php';
				endif;

		}

	    static function ImageLink($img){
        
      // $imagem = self::get_ImageURL() .'thumb.php?src='
       //        .$img .'&w='.$largura.'&h='.$altura.'&zc=1'; 
              
  		 $imagem = self::get_ImageURL() ."{$img}";
         
       
       return $imagem;
        
   }
		/**
		 * 
		 *  @return string: URL home do site
		 * */

		/**
		 * 
		 * 
		 * @return string : pasta raiz do meu sistema
		 * */

		 static function get_SiteHOME(){
        
        return Config::SITE_URL . Config::SITE_PASTA;
  		  }

		static function get_SiteRAIZ(){

			return $_SERVER['DOCUMENT_ROOT'] .'/'. Config::SITE_PASTA;
		}

		/**
		 * 
		 * @return string - URL do template do site, css, js
		 * 
		 * */

		 static function get_SiteTEMA(){
        return self::get_SiteHOME() .'/'.self::$pasta_view ;

    	}



		/**
		 * 
		 * @return string - página carrinho
		 * 
		 * */

		static function pag_Carrinho(){
			return self::get_SiteHOME() . "/carrinho";
		}

		/**
		 * 
		 * @return string - página de manipulação do carrinho
		 * 
		 * */

		static function pag_CarrinhoAlterar(){
			return self::get_SiteHOME() . "/carrinho_alterar";
		}



		/**
		 * 
		 * @return string - página de produtos
		 * 
		 * */

		static function pag_Produtos(){
			return self::get_SiteHOME() . "/produtos";
		}

		/**
		 * 
		 * @return string - detalhe do produto
		 * 
		 * */

		static function pag_ProdutosInfo(){
			return self::get_SiteHOME() . "/produtos_info";
		}

		/**
		 * 
		 * @return string - página de login
		 * 
		 * */

		static function pag_ClienteLogin(){
			return self::get_SiteHOME() . "/login";
		}

		/**
		 * 
		 * @return tela de cadastro
		 * */

		static function pag_ClienteCadastro(){
			return self::get_SiteHOME() . '/cadastro';
		}
		/**
		 * 
		 * @return string pagina de logoff
		 * */
		static function pag_Logoff(){
			return self::get_SiteHOME() . "/logoff";	
		}

		 /**
		 * 
		 * @return string - Tela de recuperação de senha
		 * 
		 * */

		static function pag_ClienteRecovery(){
			return self::get_SiteHome() . '/clientes_recovery';
		}

		/**
		 * @return string pedidos da conta do cliente
		 * */
		static function pag_ClientePedidos(){
			return self::get_SiteHome() . '/clientes_pedidos';	
		}

		/**
		 * @return string Tela de itens do cliente
		 * */
		static function pag_ClienteItens(){
			return self::get_SiteHome() . '/clientes_itens';	
		}


		/**
		 * 
		 * @return pagina dados do cliente
		 * */

		static function pag_ClienteDados(){
			return self::get_SiteHome() . '/clientes_dados';	
		}	


		/**
		 * 
		 * @return dados do cliente
		 * */

		static function pag_ClienteSenha(){
			return self::get_SiteHome() . '/clientes_senha';	
		}

		/**
		 * 
		 * @return string - página de conta do clientes
		 * 
		 * */

		static function pag_ClienteConta(){
			return self::get_SiteHOME() . "/minhaconta";
		}

		/**
		 * 
		 * @return string - página de confirmar pedido
		 * 
		 * */

		static function pag_PedidoConfirmar(){
			return self::get_SiteHOME() . "/pedido_confirmar";
		}

		/**
		 * 
		 * @return string - página de finalizar pedido
		 * 
		 * */

		static function pag_PedidoFinalizar(){
			return self::get_SiteHOME() . "/pedido_finalizar";
		}

		/**
		 * 
		 * @return string - página de contatos
		 * 
		 * */

		static function pag_Contato(){
			return self::get_SiteHOME() . "/contato";
		}

		/**
		 * 
		 * @return string - Termo de uso
		 * 
		 * */

		static function pag_Termo_de_uso(){
			return self::get_SiteHOME() . "/termos_de_uso";
		}


		/**
		 * 
		 * @return string - Administração
		 * 
		 * */

		static function pag_ADM_d(){
			return self::get_SiteHOME() . "/ADM/login/index.php";
		}

		/**
		 * 
		 * @return string - Localização
		 * 
		 * */

		static function pag_Localizacao(){
			return self::get_SiteHOME() . "/localizacao";
		}


		/**
		 * 
		 * @return string - Senha
		 * 
		 * */

		static function pag_SenhaAlterada(){
			return self::get_SiteHOME() . "/clientes_senha";
		}

		/**
		 * 
		 * @return string - Termo de uso
		 * 
		 * */

		static function pag_TermosUso(){
			return self::get_SiteHOME() . "/termos_de_uso";
		}

		/**
		 * 
		 * @return string - Buscador resultados
		 * 
		 * */

		static function pag_BuscadorResultados(){
			return self::get_SiteHOME() . "buscador_resultados";
		}

		/**
		 * 
		 * @return string pasta física da imagem
		 * 
		 * */

		static function get_ImagePasta(){

			return 'media/imagens/';

		}

		/**
		 * 
		 * @return string com o URL da imagem
		 * 
		 * */

		static function get_ImageURL(){

			return self::get_SiteHOME() . '/' . self::get_ImagePasta();

		}

		/**
		 * 
		 * @return string com a pasta de controller
		 * */
		
		static function get_Pasta_Controller(){
			return self::$pasta_controller;
		}



		/**
		 * @param int tempo em segundos
		 * @param string $pagina que eu quero ir
		 * @return string com o redirecionamento
		 * */

		static function Redirecionar($tempo, $pagina){

		$url =  '<meta http-equiv="refresh" content="'.$tempo.'; url='.$pagina.'">';
		echo $url;


		}

	}