<?php
/* Smarty version 3.1.46, created on 2023-06-01 15:30:53
  from 'C:\xampp\htdocs\9tec site\view\pedido_confirmar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_6478e3dd8792b4_99779503',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01c9b72a2d9b32fe521b906f53d30bb6da9a7ecd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\pedido_confirmar.tpl',
      1 => 1685323693,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6478e3dd8792b4_99779503 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>Confirmar Pedido</h3>
<hr/>
<style type="text/css">
	#divs_r{
		overflow-y: scroll;
		height: 400px;
	}
</style>

<!--- Botões e opções de cima ---> 
<section class="row">

	<div class="col-md-4 text-right">
		<a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO']->value;?>
" class="btn btn-cssc" title="">Voltar ao Carrinho</a>	
	</div>
	<div class="col-md-4 text-right">
		<a href="<?php echo $_smarty_tpl->tpl_vars['PAG_FINALIZAR']->value;?>
" class="btn btn-cssc" title="">Finalizar</a>
	</div>
	<div class="col-md-4">
		
	</div>

</section>
<br/>
<!--- table Listagem de Itens ---->
<section class="row">
	<div id="divs_r">	
	<center>
	<table class="table table-bordered" style="width: 95%;">
		<tr class="text-danger bg-danger">
			<td></td>
			<td>Produto</td>
			<td>Valor R$</td>
			<td>X</td>
			<td>Sub Total R$</td>
		 
		</tr>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>

		<tr>
			<td> <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" width="100px" height="100px" alt="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
"> </td>
			<td><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</td>	
			<td><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_qtd'];?>
</td>	
			<td><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_subTotal'];?>
</td>			
		 
		</tr>

		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	</table>
	</center>

</section> <!---- Fim da listagem de itens --->

	<!------- botoes de baixo e valor total ---> 
	<section class="row">
		<div class="col-md-4 text-right">
	 
		</div>
		<div class="col-md-8 text-right text-danger">
		<h4 style="margin-right: -20px;">
			Valor total: R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>

		</h4>
		</div>

	<!-------- Botão de limpar ----------->
		<div class="col-md-4 text-right">
	 		
		</div>	 
	</section>
<?php }
}
