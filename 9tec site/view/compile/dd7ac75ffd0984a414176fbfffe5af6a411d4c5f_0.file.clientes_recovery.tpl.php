<?php
/* Smarty version 3.1.46, created on 2022-11-26 20:08:36
  from 'C:\xampp\htdocs\Adega Unibeer\view\clientes_recovery.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_63829c747a7f83_46252468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd7ac75ffd0984a414176fbfffe5af6a411d4c5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Adega Unibeer\\view\\clientes_recovery.tpl',
      1 => 1669502170,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63829c747a7f83_46252468 (Smarty_Internal_Template $_smarty_tpl) {
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


</form><?php }
}
