<?php
/* Smarty version 3.1.46, created on 2023-04-06 15:31:12
  from 'C:\xampp\htdocs\9tec\view\clientes_senha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_642f0ff07f2be4_06877305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56e0d056f460046d6d25c2a15d1d25ac7995586c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\clientes_senha.tpl',
      1 => 1680805871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642f0ff07f2be4_06877305 (Smarty_Internal_Template $_smarty_tpl) {
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


</form>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<br/><br/><br/><br/><?php }
}
