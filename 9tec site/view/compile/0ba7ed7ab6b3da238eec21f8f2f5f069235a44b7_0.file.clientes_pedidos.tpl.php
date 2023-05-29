<?php
/* Smarty version 3.1.46, created on 2023-04-06 15:32:15
  from 'C:\xampp\htdocs\9tec\view\clientes_pedidos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_642f102fd9ef04_03967448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ba7ed7ab6b3da238eec21f8f2f5f069235a44b7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\clientes_pedidos.tpl',
      1 => 1680805935,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642f102fd9ef04_03967448 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Meus Pedidos</h2>


<section class="row" id="pedido">
	<h4 class="text-center">Meus Pedidos</h4>

	<center>	
	<table class="table table-bordered" style="width:90%;">

	<tr class="text-danger bg-danger">
 			<td>Data</td>
 			<td>Hora</td>
 			<td>Ref</td>
 			 			
 			<td>Status</td>
 		 	<td></td>
 	</tr>

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PEDIDOS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?> 	
		<tr>
			<td style="width: 10%;"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_data'];?>
</td>
			<td style="width: 10%;"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_hora'];?>
</td>
			<td style="width: 10%;"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_ref'];?>
</td>
			
		 

			<?php if ($_smarty_tpl->tpl_vars['P']->value['ped_pag_status'] == 'NAO') {?>
				<td style="width: 15%;"><span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</span></td>
			<?php } else { ?>
				<td style="width: 15%;"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</td>
			<?php }?>

			<form name="itens" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_ITENS']->value;?>
">

				<input type="hidden" name="cod_pedido" id="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_ref'];?>
">
				<td style="width: 10%;"><button class="btn btn-default"><i class="glyphicon glyphicon-menu-hamburger"></i> Detalhes</button></td>

			</form>
		</tr>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	</table>			
	</center>

</section>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<br/><br/><br/><br/><?php }
}
