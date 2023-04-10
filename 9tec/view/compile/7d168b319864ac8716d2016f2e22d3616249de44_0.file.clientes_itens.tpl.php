<?php
/* Smarty version 3.1.46, created on 2023-04-06 15:24:24
  from 'C:\xampp\htdocs\9tec\view\clientes_itens.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_642f0e580a45e3_83461958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d168b319864ac8716d2016f2e22d3616249de44' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\clientes_itens.tpl',
      1 => 1669601039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642f0e580a45e3_83461958 (Smarty_Internal_Template $_smarty_tpl) {
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

		<tr class="bg-success">
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
						
						<td class="text-danger"><b>Frete:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor'];?>
</td>

						<td class="text-danger"><b>Total:</b> <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</td>

						<td class="text-danger"><b>Final:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor']+$_smarty_tpl->tpl_vars['TOTAL']->value;?>
</td>	


					</tr>
				</table>
			</center>

		</section><?php }
}
