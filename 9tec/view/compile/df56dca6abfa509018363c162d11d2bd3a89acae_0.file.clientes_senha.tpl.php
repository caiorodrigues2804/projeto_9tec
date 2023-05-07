<?php
/* Smarty version 3.1.46, created on 2022-11-26 19:48:15
  from 'C:\xampp\htdocs\Adega Unibeer\view\clientes_senha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_638297af453467_49842714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df56dca6abfa509018363c162d11d2bd3a89acae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Adega Unibeer\\view\\clientes_senha.tpl',
      1 => 1669502894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638297af453467_49842714 (Smarty_Internal_Template $_smarty_tpl) {
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
