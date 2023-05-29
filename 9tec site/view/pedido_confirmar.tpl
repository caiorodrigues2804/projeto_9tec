<h3>Confirmar Pedido</h3>
<hr/>
<style type="text/css">
	#divs_r{
		overflow-y: scroll;
		height: 400px;
	}
</style>

<!--- Botões e opções de cima ---> 
<section class="row">

	<div class="col-md-4 text-right">
		<a href="{$PAG_CARRINHO}" class="btn btn-cssc" title="">Voltar ao Carrinho</a>	
	</div>
	<div class="col-md-4 text-right">
		<a href="{$PAG_FINALIZAR}" class="btn btn-cssc" title="">Finalizar</a>
	</div>
	<div class="col-md-4">
		
	</div>

</section>
<br/>
<!--- table Listagem de Itens ---->
<section class="row">
	<div id="divs_r">	
	<center>
	<table class="table table-bordered" style="width: 95%;">
		<tr class="text-danger bg-danger">
			<td></td>
			<td>Produto</td>
			<td>Valor R$</td>
			<td>X</td>
			<td>Sub Total R$</td>
		 
		</tr>

		{foreach from=$PRO item=P}

		<tr>
			<td> <img src="{$P.pro_img}" width="100px" height="100px" alt="{$P.pro_nome}"> </td>
			<td>{$P.pro_nome}</td>
			<td>{$P.pro_valor}</td>	
			<td>{$P.pro_qtd}</td>	
			<td>{$P.pro_subTotal}</td>			
		 
		</tr>

		{/foreach}

	</table>
	</center>

</section> <!---- Fim da listagem de itens --->

	<!------- botoes de baixo e valor total ---> 
	<section class="row">
		<div class="col-md-4 text-right">
	 
		</div>
		<div class="col-md-8 text-right text-danger">
		<h4 style="margin-right: -20px;">
			Valor total: R$ {$TOTAL}
		</h4>
		</div>

	<!-------- Botão de limpar ----------->
		<div class="col-md-4 text-right">
	 		
		</div>	 
	</section>
