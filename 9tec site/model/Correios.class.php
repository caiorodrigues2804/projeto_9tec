<?php
class Correios{
	
        public       
  	        $frete = array(), $error,       
		$servico, $servico2, $cepOrigem, $cepDestino, $peso, $formato = '1',
		$comprimento, $altura, $largura, $diametro, $maoPropria = 'N',
		$valordeclarado = '0', $avisoRecebimento = 'N',
		$retorno = 'xml';
		
	private $url   = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        private $sedex = '04014';
        private $pac   = '04510';
        /**
         * @param string cep destino
         * @param  float peso 
         */
        function __construct($destino,$peso) {
         
		        //tipo de servicos, ou seja, sedex, pac, sedex 10, esses codigos voce encontra no PDF que mencionei acima
				$this->servico 	        = $this->pac;  // PAC
				$this->servico2 	= $this->sedex; // sedex
				
				//cep de origem, ou seja, de onde parte
				$this->cepOrigem 	= '04752005';
				
				//cep destino, ou seja, para onde vai ser mandado
				$this->cepDestino 	= $destino;
				
				//peso em kilogramas
				$this->peso 		= $peso;
				$this->comprimento      = '35';//em cm
				$this->altura 		= '35';//em cm
				$this->largura     	= '35';//em cm
				$this->diametro 	= '90';//em cm
            
        }

        /**
		 faz a verificação e calculo do frete
		**/
        public function Calcular(){
			
			
			$cURL = curl_init(sprintf(
				$this->url.'?nCdServico=%s,%s&sCepOrigem=%s&sCepDestino=%s&nVlPeso=%s&nCdFormato=%s&nVlComprimento=%s&nVlAltura=%s&nVlLargura=%s&nVlDiametro=%s&sCdMaoPropria=%s&nVlValorDeclarado=%s&sCdAvisoRecebimento=%s&StrRetorno=%s',
				$this->servico,
				$this->servico2,
				$this->cepOrigem,
				$this->cepDestino,
				$this->peso,
				$this->formato,
				$this->comprimento,
				$this->altura,
				$this->largura,
				$this->diametro,
				$this->maoPropria,
				$this->valordeclarado,
				$this->avisoRecebimento,
				$this->retorno
			));
			
                                  
			curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

			$string = curl_exec($cURL);

			curl_close($cURL);
			$xml = simplexml_load_string($string);
			
			
			if($xml->Erro != ''):
			
				$this->error = array($xml->cServico->Erro, $xml->cServico->MgsErro);
				return false;
			
			else:
                            
                    $i = 0;               
                    foreach ($xml->cServico as $servico):
                

						  switch ( $servico->Codigo):
                                                          case $this->pac   : $this->frete[$i]['tipo']   = 'PAC';
								  break;
                                                          case $this->sedex : $this->frete[$i]['tipo']   = 'SEDEX';
								  break;
						  endswitch;
                            
                
                                  
                    $this->frete[$i]['valor']  = $servico->ValorSemAdicionais;                          
                    $this->frete[$i]['Prazo']  = $servico->PrazoEntrega;    
                    $this->frete[$i]['erro']   = $servico->Erro;    
                    $this->frete[$i]['MsgErro']   = $servico->MsgErro;    
                    $this->frete[$i]['Codigo']   = $servico->Codigo;    
                   
					  $i++;   
					  
					endforeach; 
 
                                     //var_dump($xml);
                return $xml;
			
			endif;
}
		
		/*
		* mostrando erros 
		*/
		public function error(){
			if(is_null($this->error)){
				return false;
			}else{
				return $this->error;
			}
		}
	}
