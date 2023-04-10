<h3>Finalizar Pedido</h3>
 
<style type="text/css">
	#divs_r{
		overflow-y: scroll;
		height: 400px;
	}
</style>

<div class="alert alert-success">Pedido finalizado com sucesso </div>

<!--- table Listagem de Itens ---->
<section class="row">
	 
	<center>


	<table class="table table-bordered" style="width: 95%;">
	 

		{foreach from=$PRO item=P}

		<tr>
		<!---	<td> <img src="{$P.pro_img}" width="100px" height="100px" alt="{$P.pro_nome}"> </td>-->
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
		

	<!-------- Botão de limpar ----------->
	<div class="text-danger">
 	<center>
			<h4><b>Valor total:</b> R$ {$VALOR_PRECO}</h4>		
			<h4><b>Frete:</b> R$ {$VALOR_FRETE}</h4>
			<hr/>
			<h4><b>Valor final:</b> R$ {$TOTAL}</h4>
	</center>
	</div>	 
	</section>

	<!---- Modo de pagamentos e outras informações --->
	<section class="row">
		<h3 class="text-center">Escolha uma forma de pagamento</h3>	
		<center>	
		<img width="30%" src="http://www.natsolutions.com.br/loja/img/cms/comprar-com-pagseguro-uol.png" alt="">
		</center>
	</section>
