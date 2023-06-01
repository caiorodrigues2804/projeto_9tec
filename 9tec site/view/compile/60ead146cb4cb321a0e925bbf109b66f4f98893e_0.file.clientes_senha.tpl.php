<?php
/* Smarty version 3.1.46, created on 2023-06-01 16:22:08
  from 'C:\xampp\htdocs\9tec site\view\clientes_senha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_6478efe0533464_93443115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60ead146cb4cb321a0e925bbf109b66f4f98893e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\clientes_senha.tpl',
      1 => 1685647327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6478efe0533464_93443115 (Smarty_Internal_Template $_smarty_tpl) {
?><h4 class="text-center">Alteração de senha de acesso</h4>
<br/>

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
