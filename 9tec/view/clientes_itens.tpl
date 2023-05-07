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
						
						<td id="frete_d" class="text-danger"><b>Frete:</b> {$ITENS.1.ped_frete_valor} </td>
<!-- $ITENS.1.ped_frete_valor+$TOTAL -->
						<td id="total_produto" class="text-danger"><b>Total:</b> {$TOTAL}</td>

						<td id="valor_final" class="text-danger"><b>Final:</b> {$ITENS.1.ped_frete_valor + $TOTAL}</td>	


					</tr>
				</table>
			</center>

		</section>

		<script>

		function decimalParaReal(numero) {
		  let formatoReal = new Intl.NumberFormat('pt-BR', {
		    style: 'currency',
		    currency: 'BRL',
		    minimumFractionDigits: 2
		  });
		  return formatoReal.format(numero);
		}


		let valor_v,total_v,frete_v;

		// -------------------- VALOR FINAL ------------------------------ //
		valor_v = document.querySelector("#valor_final").innerHTML;

		// DEPURAÇÃO
		// console.log(frete_v);

		valor_v = valor_v.replace(/['Final:<b>/']/gi,'');
		valor_v = parseFloat(valor_v);

		// DEPURAÇÃO
		// console.log(frete_v);

		document.querySelector("#valor_final").innerHTML = '<b>Valor final:</b> '+ (decimalParaReal(valor_v))
	 	// -------------------------------------------------------------- //

	 	// -------------------- TOTAL  ------------------------------ //
		total_v = document.querySelector("#total_produto").innerHTML;

		// DEPURAÇÃO
		// console.log(frete_v);

		total_v = total_v.replace(/['Total:<b>/']/gi,'');
		total_v = parseFloat(total_v);

		// DEPURAÇÃO
		// console.log(frete_v);

		document.querySelector("#total_produto").innerHTML = '<b>Total:</b> '+ (decimalParaReal(total_v))
	 	// -------------------------------------------------------------- //

	 	// -------------------- FRETE  ------------------------------ //
		frete_v = document.querySelector("#frete_d").innerHTML;

		// DEPURAÇÃO
		// console.log(frete_v);

		frete_v = frete_v.replace(/['Frete:<b>/']/gi,'');
		frete_v = parseFloat(frete_v);

		// DEPURAÇÃO
		// console.log(frete_v);

		document.querySelector("#frete_d").innerHTML = '<b>Frete:</b> '+ (decimalParaReal(frete_v))
	 	// -------------------------------------------------------------- //
		 
		 

		</script>