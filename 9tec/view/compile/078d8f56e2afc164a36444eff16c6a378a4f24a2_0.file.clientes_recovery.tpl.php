<?php
/* Smarty version 3.1.46, created on 2022-11-25 22:29:50
  from '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projetoadegaunibeer/view/clientes_recovery.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_63816c0e073213_51178419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '078d8f56e2afc164a36444eff16c6a378a4f24a2' => 
    array (
      0 => '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projetoadegaunibeer/view/clientes_recovery.tpl',
      1 => 1669425199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63816c0e073213_51178419 (Smarty_Internal_Template $_smarty_tpl) {
?><h4 class="text-center">Digite seu e-mail cadastrado para receber a sua senha</h4>
<hr/>
<form name="recuperarsenha" method="post" action="">	

	<section>
		<div class="col-md-4"></div>

		<div class="col-md-4">
			
		<label>Digite seu email cadastrado</label>
		<input type="email" name="cli_email" id="cli_email" class="form-control" required>	
		<br/>
		<input type="submit" class="btn btn-cssc btn-block" value="Repecurar">		
		</div>

		<div class="col-md-4"></div>
	</section>

	<section>
		<div class="col-md-4"></div>		
	</section>


</form><?php }
}
