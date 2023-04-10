<h4 class="text-center">Dados do pedido</h4>

<!----- Informações sobre o pedido ---->
<section class="row">

	<center>
		<table class="table table-bordered" style="width: 80%;">
		<tr class="bg-success">			
				
				<td><b>Data:</b> {$ITENS.1.ped_data}</td>
				<td><b>Hora:</b> {$ITENS.1.ped_hora}</td>
				<td><b>Ref:</b> {$ITENS.1.ped_ref}</td>								
				<td><b>Status:</b> {$ITENS.1.ped_pag_status}</td>

			</tr>
		</table>
	</center>

</section>

<h4 class="text-center">Itens do pedido</h4>
<!-- Listagem dos itens -->
<section class="row" id="listaitens">
<center>	

	<table class="table table-bordered" style="width: 80%;">

		<tr class="bg-success">
			<td>Item</td>
			<td>Valor Uni</td>
			<td>X</td>
			<td>Sub</td>
		</tr>

		{foreach from=$ITENS item=P}
		<tr>
			<td>{$P.item_nome}</td>
			<td class="text-right">{$P.item_valor}</td>
			<td class="text-center">{$P.item_qtd}</td>
			<td class="text-right">{$P.item_sub}</td>
		</tr>
		{/foreach}

	</table>	
</center>
</section>

		<section class="row" id="resumo">

			<center>
				<table class="table table-bordered" style="width: 80%;">
					<tr>
						
						<td class="text-danger"><b>Frete:</b> {$ITENS.1.ped_frete_valor}</td>

						<td class="text-danger"><b>Total:</b> {$TOTAL}</td>

						<td class="text-danger"><b>Final:</b> {$ITENS.1.ped_frete_valor+$TOTAL}</td>	


					</tr>
				</table>
			</center>

		</section>