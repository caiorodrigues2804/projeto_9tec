
{foreach from=$PRO item=P}


 <h2 class="text-center">{$P.pro_nome} - REF: {$P.pro_ref}</h2>
 
 <hr>

 <div class="row">
	<!-- div da esquerda imagem do produto -->
 	<div class="col-md-6 ">
 		<img class="thumbnail" src="{$P.pro_img}" style="width: 300;height: 300px;" alt="">
 		
 	
 	</div>

	<!-- div da direita info do produto -->
 	<div class="col-md-6 thumbnail" style="padding: 10px;">

 		<center><h4>{$P.pro_descricao_extra}</h4></center>

 		<hr/>
 		<img src="{$TEMA}/images/logo-pagseguro.png" alt="">
 		<hr/>
		<div class="col-md-6">
		<h3 class="text-center text-danger"><b>R$ {$P.pro_valor} </b></h3>		
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
		<hr/>
		<h4 class="text-center">Descrição do produto</h4>
	{$P.pro_desc}

	</div>
	<br/>
	<br/>

</div>


 	{/foreach}