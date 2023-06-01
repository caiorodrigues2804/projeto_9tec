<?php
/* Smarty version 3.1.46, created on 2023-06-01 16:23:13
  from 'C:\xampp\htdocs\9tec site\view\clientes_pedidos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_6478f021145704_39650521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e8728e416153169df7ccb0aa21f8aaf2909e87b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\clientes_pedidos.tpl',
      1 => 1685647392,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6478f021145704_39650521 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="row" id="pedido">
	<h4 class="text-center">Meus Pedidos</h4>
	<br/>
<div style="overflow-y: auto;height: 500px;">
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
	</div>
</section>
<br/><br/> 
 <?php }
}
