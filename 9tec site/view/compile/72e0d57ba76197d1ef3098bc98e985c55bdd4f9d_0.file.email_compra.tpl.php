<?php
/* Smarty version 3.1.46, created on 2023-05-01 21:12:41
  from 'C:\xampp\htdocs\9tec\view\email_compra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_64505579716d95_43236416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72e0d57ba76197d1ef3098bc98e985c55bdd4f9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\email_compra.tpl',
      1 => 1682986199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64505579716d95_43236416 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
	* {
	font-family: arial;
	}
</style>
<h4>Olá <?php echo $_smarty_tpl->tpl_vars['NOME_CLIENTE']->value;?>
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
			<h4><b>Valor final:</b> R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</h4>
			<h4><b>Frete:</b> R$ <?php echo $_smarty_tpl->tpl_vars['VALOR_FRETE']->value;?>
</h4>
			<h4><b>Tipo de frete:</b> <?php  print strtoupper($_SESSION['TIPO_FRETE']); ?> </h4>

	 
		</div>	 
	</section>
		<br/>
		<center>
		<img src="https://scontent.fcgh22-1.fna.fbcdn.net/v/t39.30808-6/337659705_1577860109368424_2192567867889571563_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=LUGpe1DIso8AX_hbU8d&_nc_ht=scontent.fcgh22-1.fna&oh=00_AfA3OM7A3wJljQBa-Qj21G69-pTBOVF1RgCD7FgxHFbXng&oe=645400ED" width="500px">
		<br/>
		<br/>
		<br/>
		</center><?php }
}
