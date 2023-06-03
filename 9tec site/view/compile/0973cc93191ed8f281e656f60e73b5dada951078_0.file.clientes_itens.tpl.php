<?php
/* Smarty version 3.1.46, created on 2023-06-03 18:03:33
  from 'C:\xampp\htdocs\9tec site\view\clientes_itens.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_647baaa5d27c77_91782444',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0973cc93191ed8f281e656f60e73b5dada951078' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\clientes_itens.tpl',
      1 => 1685826212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647baaa5d27c77_91782444 (Smarty_Internal_Template $_smarty_tpl) {
for($i = 0;$i <= 1;$i++):
print '<br/>';
endfor;
?>
<h4 class="text-center">Dados do pedido</h4>

<!----- Informações sobre o pedido ---->
<section class="row">

	<center>
		<table class="table table-bordered" style="width: 80%;">
		<tr class="bg-success">			
				
				<td><b>Data:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_data'];?>
</td>
				<td><b>Hora:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_hora'];?>
</td>
				<td><b>Ref:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_ref'];?>
</td>								
				<td><b>Status:</b> <d id="status_peds"> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_status'];?>
 </d></td>

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

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ITENS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
		<tr>
			<input type="hidden" id="nome_prods" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['item_nome'];?>
">
			<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['P']->value['item_nome'];?>
</td>				
		</tr>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	</table>	
</center>
</section>

		<section class="row" id="resumo">

			<center>
				<table class="table table-bordered" style="width: 80%;">
					<tr>
						
						<td class="text-danger">Frete: <b>R$</b> <b id="frete_d"><?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor'];?>
</b> </td>
		
						<td class="text-danger">Total: <b>R$</b> <b id="valor_total"></b></td>

						<td class="text-danger">Final: <b>R$</b> <b  id="valor_final"><?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['item_valor'];?>
</b> </td>	


					</tr>
				</table>

				<hr>		 
			
				<input type="hidden" id="valor_campo" value="<?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_cod'];?>
">
 				<button id="button_pag" onclick="acoes()">Efetuar o pagamento</button> 				  
 		 		<h4 id="valor_ds">Já foi efetuado o pagamento deste pedido</h4>

			</center>
		</section>

<?php echo '<script'; ?>
>

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

<?php echo '</script'; ?>
>
<?php 
for($i = 0;$i <= 2;$i++):
print '<br/>';
endfor;
}
}
