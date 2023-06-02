<?php
/* Smarty version 3.1.46, created on 2023-06-02 13:01:00
  from 'C:\xampp\htdocs\9tec site\view\email_adm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_647a123cabee59_05738028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84ca38f6cb25c4ad874d8ff8ccb9448d75b8c8cd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\email_adm.tpl',
      1 => 1685721590,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647a123cabee59_05738028 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
	* {
	font-family: arial;
	}
</style>
<h4>Informações do cliente que solicitou pedido</h4>
<h5>Identificador (ID): <?php echo $_smarty_tpl->tpl_vars['ID_CLIENTE']->value;?>
</h5>
<h5>Nome: <?php echo $_smarty_tpl->tpl_vars['NOME_CLIENTE']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['SOBRENOME_CLIENTE']->value;?>
</h5>
<br/>
<h4>Endereço de entrega</h4>
<h5>Endereço: <?php echo $_smarty_tpl->tpl_vars['ENDERECO_CLIENTE']->value;?>
</h5>
<h5>Bairro: <?php echo $_smarty_tpl->tpl_vars['BAIRRO_CLIENTE']->value;?>
</h5>
<h5>UF: <?php echo $_smarty_tpl->tpl_vars['UF_CLIENTE']->value;?>
</h5>
<h5>CEP: <?php echo $_smarty_tpl->tpl_vars['CEP_CLIENTE']->value;?>
</h5>
<h5>Numero: <?php echo $_smarty_tpl->tpl_vars['NUMERO_CLIENTE']->value;?>
</h5>
<br/>
<h4>Telefone e Celular</h4>
<h5>DDD: <?php echo $_smarty_tpl->tpl_vars['DDD_CLIENTE']->value;?>
 </h5>
<h5>Telefone: <?php echo $_smarty_tpl->tpl_vars['TELEFONE_CLIENTE']->value;?>
</h5>
<h5>Celular: <?php echo $_smarty_tpl->tpl_vars['CELULAR_CLIENTE']->value;?>
</h5>
<br><br>
<section class="row">
	 
	<center>
	<div class="alert alert-sucess"><h4>Dados do pedido</h4></div>
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
			<br><br>
			<div class="col-md-8">	
			<center>
	 		<h5>Para obter mais informações sobre este pedido, acesse o lista de pedidos dos clientes na área administrativo do site</h5>
	 		<h5>Sempre importante manter esse e-mail salvo e arquivado em local seguro</h5>
	 		</center>
	 		</div>

		</div>	 
	   </section>
		<br/>
		<center>
		<img src="https://raw.githubusercontent.com/caiorodrigues2804/projeto_9tec/main/img/img1.png" width="300px">
		<h4>9Tec Informática</h4>
		<h5>Área administrativa</h5>
		<br/>
		<br/>
		<br/>
		</center>
<?php }
}
