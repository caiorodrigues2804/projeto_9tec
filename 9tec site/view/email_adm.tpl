<style>
	* {
	font-family: arial;
	}
</style>
<h4>Informações do cliente que solicitou pedido</h4>
<h5>Identificador (ID): {$ID_CLIENTE}</h5>
<h5>Nome: {$NOME_CLIENTE} {$SOBRENOME_CLIENTE}</h5>
<h5>Endereço: {$ENDERECO_CLIENTE}</h5>
<h5>Bairro: {$BAIRRO_CLIENTE}</h5>
<h5>UF: {$UF_CLIENTE}</h5>
<h5>Numero: {$NUMERO_CLIENTE}</h5>
<h5>DDD: {$DDD_CLIENTE} </h5>
<h5>Telefone: {$TELEFONE_CLIENTE}</h5>
<h5>Celular: {$CELULAR_CLIENTE}</h5>
<br><br>
<section class="row">
	 
	<center>
	<div class="alert alert-sucess"><h4>Dados do pedido</h4></div>
	<br/>

	<table border="1px" style="width: 95%;">
	 

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
<br/>
<br/>
<!------- botoes de baixo e valor total ---> 
	<section class="row">
		<div class="col-md-4 text-right">
	 
		</div>
		

	<!-------- Botão de limpar ----------->
		<div class="col-md-4">
 			
			<h4><b>Valor total:</b> R$ {$VALOR_PRECO}</h4>		
			<h4><b>Valor final:</b> R$ {$TOTAL}</h4>
			<h4><b>Frete:</b> R$ {$VALOR_FRETE}</h4>
			<h4><b>Tipo de frete:</b> {php} print strtoupper($_SESSION['TIPO_FRETE']); {/php} </h4>
			<br><br>
			<div class="col-md-8">	
			<center>
	 		<h5>Para obter mais informações sobre este pedido, acesse o lista de pedidos dos clientes na área administrativo do site</h5>
	 		<h5>Sempre importante manter esse e-mail salvo e arquivado</h5>
	 		</center>
	 		</div>

		</div>	 
	   </section>
		<br/>
		<center>
		<img src="https://raw.githubusercontent.com/caiorodrigues2804/projeto_9tec/main/img/img1.png" width="300px">
		<h4>9Tec Informática</h4>
		<h5>Área administrativa</h5>
		<br/>
		<br/>
		<br/>
		</center>
