<style>
	* {
	font-family: arial;
	}
</style>
<h4>Olá {$NOME_CLIENTE}, obrigado pela sua compra no Site {$SITE_NOME}<br/>
<a href="{$SITE_HOME}"> {$SITE_HOME} </a>
</h4>
 
	<section class="row">

	<h3>
	Para acessar a sua conta e ter um histórico de seus pedidos acesse nosso site, e sua conta <br/>
	<a href="{$PAG_MINHA_CONTA}">Minha conta: {$PAG_MINHA_CONTA}</a>
	</h3>

	</section>


<section class="row">
	 
	<center>

	<div class="alert alert-sucess"><h4>Itens do seu pedido</h4></div>
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

	 
		</div>	 
	</section>
		<br/>
		<center>
		<img src="https://scontent.fcgh22-1.fna.fbcdn.net/v/t39.30808-6/337659705_1577860109368424_2192567867889571563_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=LUGpe1DIso8AX_hbU8d&_nc_ht=scontent.fcgh22-1.fna&oh=00_AfA3OM7A3wJljQBa-Qj21G69-pTBOVF1RgCD7FgxHFbXng&oe=645400ED" width="500px">
		<br/>
		<br/>
		<br/>
		</center>