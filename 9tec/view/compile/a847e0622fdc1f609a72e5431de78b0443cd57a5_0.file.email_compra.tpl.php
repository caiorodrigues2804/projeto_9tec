<?php
/* Smarty version 3.1.46, created on 2022-11-27 20:33:15
  from 'C:\xampp\htdocs\Adega Unibeer\view\email_compra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_6383f3bb3c0824_96052868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a847e0622fdc1f609a72e5431de78b0443cd57a5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Adega Unibeer\\view\\email_compra.tpl',
      1 => 1669480049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6383f3bb3c0824_96052868 (Smarty_Internal_Template $_smarty_tpl) {
?><h4>Olá <?php echo $_smarty_tpl->tpl_vars['NOME_CLIENTE']->value;?>
, obrigado pela sua compra no Site <?php echo $_smarty_tpl->tpl_vars['SITE_NOME']->value;?>
<br/>
<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_HOME']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['SITE_HOME']->value;?>
 </a>
</h4>
 
	<section class="row">

	<h3>
	Para acessar a sua conta e ter um histórico de seus pedidos acesse nosso site, e sua conta <br/>
	<a href="<?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
">Minha conta: <?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
</a>
	</h3>

	</section>


<section class="row">
	 
	<center>

	<div class="alert alert-sucess"><h4>Itens do seu pedido</h4></div>
	<br/>

	<table border="1px" style="width: 95%;">
	 

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
<br/>
<br/>
<!------- botoes de baixo e valor total ---> 
	<section class="row">
		<div class="col-md-4 text-right">
	 
		</div>
		

	<!-------- Botão de limpar ----------->
		<div class="col-md-4">
 			
			<h4><b>Valor total:</b> R$ <?php echo $_smarty_tpl->tpl_vars['VALOR_PRECO']->value;?>
</h4>		
			<h4><b>Frete:</b> R$ <?php echo $_smarty_tpl->tpl_vars['VALOR_FRETE']->value;?>
</h4>
			<h4><b>Valor final:</b> R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</h4>
	 
		</div>	 
	</section>
		<br/>
		<center>
		<img src="https://adegaunibeer.caiorodriguesportfolios.com.br/unibeerlogo.png" width="500px">
		<br/>
		<br/>
		<br/>
		</center><?php }
}
