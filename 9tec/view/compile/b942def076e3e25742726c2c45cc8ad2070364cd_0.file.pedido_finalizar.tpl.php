<?php
/* Smarty version 3.1.46, created on 2022-11-26 12:58:00
  from '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projetoadegaunibeer/view/pedido_finalizar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_638237883079f1_03068192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b942def076e3e25742726c2c45cc8ad2070364cd' => 
    array (
      0 => '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projetoadegaunibeer/view/pedido_finalizar.tpl',
      1 => 1669425199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638237883079f1_03068192 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>Finalizar Pedido</h3>
 
<style type="text/css">
	#divs_r{
		overflow-y: scroll;
		height: 400px;
	}
</style>

<div class="alert alert-success">Pedido finalizado com sucesso </div>

<!--- table Listagem de Itens ---->
<section class="row">
	 
	<center>


	<table class="table table-bordered" style="width: 95%;">
	 

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>

		<tr>
		<!---	<td> <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" width="100px" height="100px" alt="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
"> </td>-->
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
		

	<!-------- Botão de limpar ----------->
	<div class="text-danger">
 	<center>
			<h4><b>Valor total:</b> R$ <?php echo $_smarty_tpl->tpl_vars['VALOR_PRECO']->value;?>
</h4>		
			<h4><b>Frete:</b> R$ <?php echo $_smarty_tpl->tpl_vars['VALOR_FRETE']->value;?>
</h4>
			<hr/>
			<h4><b>Valor final:</b> R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</h4>
	</center>
	</div>	 
	</section>

	<!---- Modo de pagamentos e outras informações --->
	<section class="row">
		<h3 class="text-center">Escolha uma forma de pagamento</h3>	
		<center>	
		<img width="30%" src="http://www.natsolutions.com.br/loja/img/cms/comprar-com-pagseguro-uol.png" alt="">
		</center>
	</section>
<?php }
}
