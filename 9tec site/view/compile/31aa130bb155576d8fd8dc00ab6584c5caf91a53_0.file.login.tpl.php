<?php
/* Smarty version 3.1.46, created on 2023-06-01 17:20:45
  from 'C:\xampp\htdocs\9tec site\view\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_6478fd9d71f182_47968042',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31aa130bb155576d8fd8dc00ab6584c5caf91a53' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\login.tpl',
      1 => 1685650844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6478fd9d71f182_47968042 (Smarty_Internal_Template $_smarty_tpl) {
?> 
<?php if ($_smarty_tpl->tpl_vars['LOGADO']->value == true) {?>
 <br/><br/> <br/><br/>
<h4 class="text-center">Bem vindo a sua área de cliente, no menu acima temos algumas opções para você escolher!</h4>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<br/><br/><br/><br/>
<?php } else { ?>
<br><br>
<section class="row" id="fazerlogin">
	
	<form name="cliente_login" method="post" action="">

	<div class="col-md-4">	
	</div>

	<!-- aqui estão os campos -->
	<div id="ds_ss" class="col-md-4">
	<img src="<?php echo $_smarty_tpl->tpl_vars['LOGOTIPO']->value;?>
" width="100%">
	<hr/> 
	<div class="form-group">
		<label>E-mail:</label>
		<input type="email" class="form-control" name="txt_email" value="" placeholder="Digite seu email" required>

	</div>

	<div class="form-group">
		<label>Senha:</label>
	 	<input type="password" class="form-control" name="txt_senha" value="" placeholder="Digite sua senha" required>

	 </div>

	 <div class="form-group">

	<button class="btn btn-success btn-block btn-lg"><i class="glyphicon glyphicon-log-in"></i>  &nbsp; Entrar</button>


	<a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CADASTRO']->value;?>
" class="btn btn-cssc btn-block"><i class="glyphicon glyphicon-pencil"></i> &nbsp; Cadastrar</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['PAG_RECOVERY']->value;?>
" class="btn btn-cssc btn-block"><i class="glyphicon glyphicon-question-sign"></i> &nbsp; Esqueci a Senha</a>

	<a href="<?php echo $_smarty_tpl->tpl_vars['ADM']->value;?>
" class="btn btn-cssc btn-block"><i class="glyphicon glyphicon-sunglasses"></i> &nbsp; Área da administração</a>
	 </div>

	</div> <!--- fim dos campos ---->

	<div class="col-md-4">
	</div>
	</form>

</section>
	<br><br><br>
<?php }
}
}
