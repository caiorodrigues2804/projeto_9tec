
{foreach from=$PRO item=P}


 <h2 class="text-center">{$P.pro_nome} - REF: {$P.pro_ref}</h2>
 <center><h4>{$P.pro_descricao_extra}</h4></center>
 <hr>

 <div class="row">
	<!-- div da esquerda imagem do produto -->
 	<div class="col-md-6 ">
 		<img class="thumbnail" src="{$P.pro_img}" style="width:100%;height: 100%;" alt=""> 			
 	
 	</div>

	<!-- div da direita info do produto -->
 	<div class="col-md-6 thumbnail" style="padding: 10px;">

 		<!-- <center><h4>{$P.pro_descricao_extra}</h4></center> 	     -->
 	 
 		<img src="{$TEMA}/images/logo-pagseguro.png" alt="">
 		<hr/>		
		<div class="col-md-6">
		<h3 class="text-center text-danger"><b>R$ {$P.pro_valor} </b></h3>		
		<hr>
		<h4 id="frete">Frete grátis: {$P.pro_frete_gratis}</h4> 
		</div>
		
		<div class="col-md-6">
			<form name="carrinho" method="post" action="{$PAG_COMPRAR}">	
			<input 	type="hidden" name="pro_id" value="{$P.pro_id}">			
			<input 	type="hidden" name="acao" value="add">
			<button class="btn btn-cssc btn-lg">Comprar</button>
			</form>
		</div>
 	</div>
 </div>
 <div>
	<!-- LISTAGEM DE IMAGENS PRODUTOS -->
	 
	</div>

	<!--- DESCRIÇÃO DO PRODUTO-->
	<div style="margin: 20px;" class="row">		
		<h4 class="text-center">Descrição do produto</h4>
		<br>
	{$P.pro_desc}
	</div>
	<br/>
	<br/>
	<h4 class="text-center">Mais detalhes sobre o produto</h4>
 
	<ul>
		<li>Nome: {$P.pro_nome}</li>
		<li>Valor: R$ {$P.pro_valor}</li>
		<li>Altura do produto: {$P.pro_altura}</li>
		<li>Largura do produto: {$P.pro_largura}</li>
		<li>Comprimento do produto: {$P.pro_largura}</li>
		<li>Peso do produto: {$P.pro_peso}</li>		
	</ul>
</div>


 	{/foreach}

 
