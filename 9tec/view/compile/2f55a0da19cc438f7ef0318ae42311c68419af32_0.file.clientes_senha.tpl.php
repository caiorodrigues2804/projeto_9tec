<?php
/* Smarty version 3.1.46, created on 2022-11-30 16:52:27
  from '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projetoadegaunibeer/view/clientes_senha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_6387b47b13b8f2_51930991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f55a0da19cc438f7ef0318ae42311c68419af32' => 
    array (
      0 => '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projetoadegaunibeer/view/clientes_senha.tpl',
      1 => 1669837077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6387b47b13b8f2_51930991 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 class="text-center">Alteração de senha de acesso</h3>

<form name="alterarsenha" method="post" action="">	

	<section>
		<div class="col-md-4"></div>

		<div class="col-md-4">
		<label>Digite sua senha atual</label>

		<input type="password" name="cli_senha_atual" id="cli_senha_atual" class="form-control" required>	
		<label>Digite sua nova senha</label>

		<input type="password" name="cli_senha" id="cli_senha" class="form-control" required>		
		<br/>
		
		<button type="submit" class="btn btn-cssc btn-block">Alterar</button>
		</div>

		<div class="col-md-4"></div>
	</section>

	<section>
		<div class="col-md-4"></div>		
	</section>


</form><?php }
}
