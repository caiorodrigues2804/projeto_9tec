{php}
for($i = 0;$i <= 1;$i++):
print '<br/>';
endfor;
{/php}
<h4 class="text-center">Dados do pedido</h4>

<!----- Informações sobre o pedido ---->
<section class="row">

	<center>
		<table class="table table-bordered" style="width: 80%;">
		<tr class="bg-success">			
				
				<td><b>Data:</b> {$ITENS.1.ped_data}</td>
				<td><b>Hora:</b> {$ITENS.1.ped_hora}</td>
				<td><b>Ref:</b> {$ITENS.1.ped_ref}</td>								
				<td><b>Status:</b> <d id="status_peds"> {$ITENS.1.ped_pag_status} </d></td>

			</tr>
		</table>
	</center>

</section>

<h4 class="text-center">Itens do pedido</h4>
<!-- Listagem dos itens -->
<section class="row" id="listaitens">
<center>	

	<table class="table table-bordered" style="width: 80%;">

		<tr align="center" class="bg-success">
			<td>Item</td>			
		</tr>

		{foreach from=$ITENS item=P}
		<tr>
			<input type="hidden" id="nome_prods" value="{$P.item_nome}">
			<td class="text-center">{$P.item_nome}</td>				
		</tr>
		{/foreach}

	</table>	
</center>
</section>

		<section class="row" id="resumo">

			<center>
				<table class="table table-bordered" style="width: 80%;">
					<tr>
						
						<td class="text-danger">Frete: <b>R$</b> <b id="frete_d">{$ITENS.1.ped_frete_valor}</b> </td>
		
						<td class="text-danger">Total: <b>R$</b> <b id="valor_total"></b></td>

						<td class="text-danger">Final: <b>R$</b> <b  id="valor_final">{$ITENS.1.item_valor}</b> </td>	


					</tr>
				</table>

				<hr>		 
			
				<input type="hidden" id="valor_campo" value="{$ITENS.1.ped_cod}">
 				<button id="button_pag" onclick="acoes()">Efetuar o pagamento</button> 				  
 		 		<h4 id="valor_ds">Já foi efetuado o pagamento deste pedido</h4>

			</center>
		</section>

<script>

 function formatarNumero(numero) {
  var numeroFormatado = numero.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
  return numeroFormatado;
}

	function converterFormato(valor) {
		  // Remove o ponto existente na string e substitui a vírgula por um ponto
		  var valorSemPonto = valor.replace(/\./g, '').replace(',', '.');

		  return parseFloat(valorSemPonto);
		}

	let valor_do_produto,valor_final,frete; 
	
	frete = converterFormato(document.querySelector("#frete_d").innerText);
	valor_final = converterFormato(document.querySelector("#valor_final").innerText);
	
	document.querySelector("#valor_total").innerText = formatarNumero(valor_final - frete);
	
	document.querySelector("#valor_ds").style.display = 'none';
	let valor_ds = document.querySelector("#status_peds").innerText;
	if(valor_ds == 'SIM')
	{
		document.querySelector("#button_pag").style.display = 'none';
		document.querySelector("#valor_ds").style.display = 'block';
	}	
	

 acoes = () => {
		location.href = '?pagamento=sim&cod_produto=' + (document.querySelector("#valor_campo").value);
  }

</script>
{php}
for($i = 0;$i <= 2;$i++):
print '<br/>';
endfor;
{/php}