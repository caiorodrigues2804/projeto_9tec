<?php
/* Smarty version 3.1.46, created on 2023-04-06 14:00:24
  from 'C:\xampp\htdocs\9tec\view\clientes_recovery.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_642efaa8779599_27107718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '787de8b1ef372a062bc28fc36816be9f08b8b8ab' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\clientes_recovery.tpl',
      1 => 1680800423,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642efaa8779599_27107718 (Smarty_Internal_Template $_smarty_tpl) {
?><h4 class="text-center">Digite seu e-mail cadastrado para receber a sua senha</h4>
<hr/>
<form name="recuperarsenha" method="post" action="">	

	<section>
		<div class="col-md-4"></div>

		<div class="col-md-4">
			
		<label>Digite seu email cadastrado</label>
		<input type="email" name="cli_email" id="cli_email" class="form-control" required>	
		<br/>
		<input type="submit" class="btn btn-cssc btn-block" value="Recuperar">		
		</div>

		<div class="col-md-4"></div>
	</section>

	<section>
		<div class="col-md-4"></div>		
	</section>


</form>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
 <?php }
}
