<?php
/* Smarty version 3.1.46, created on 2023-06-01 19:25:48
  from 'C:\xampp\htdocs\9tec site\view\clientes_itens.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_64791aecbd5ab5_10215298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0973cc93191ed8f281e656f60e73b5dada951078' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\clientes_itens.tpl',
      1 => 1685658347,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64791aecbd5ab5_10215298 (Smarty_Internal_Template $_smarty_tpl) {
?><h4 class="text-center">Dados do pedido</h4>

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
				<td><b>Status:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_status'];?>
</td>

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
			<td>Valor Uni</td>
			<td>X</td>
			<td>Sub</td>
		</tr>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ITENS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['P']->value['item_nome'];?>
</td>
			<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['P']->value['item_valor'];?>
</td>
			<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['P']->value['item_qtd'];?>
</td>
			<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['P']->value['item_sub'];?>
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
						
						<td id="frete_d" class="text-danger"><b>Frete:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor'];?>
 </td>
<!-- $ITENS.1.ped_frete_valor+$TOTAL -->
						<td id="total_produto" class="text-danger"><b>Total:</b> <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</td>

						<td id="valor_final" class="text-danger"><b>Final:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor']+$_smarty_tpl->tpl_vars['TOTAL']->value;?>
</td>	


					</tr>
				</table>
			</center>

		</section>

		<?php echo '<script'; ?>
>

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
		 
		 

		<?php echo '</script'; ?>
><?php }
}
