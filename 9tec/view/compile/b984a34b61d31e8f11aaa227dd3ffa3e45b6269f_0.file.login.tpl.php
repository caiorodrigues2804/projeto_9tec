<?php
/* Smarty version 3.1.46, created on 2023-04-07 17:01:50
  from 'C:\xampp\htdocs\9tec\view\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_643076ae1149a6_72115973',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b984a34b61d31e8f11aaa227dd3ffa3e45b6269f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\login.tpl',
      1 => 1680897709,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_643076ae1149a6_72115973 (Smarty_Internal_Template $_smarty_tpl) {
?> 
<?php if ($_smarty_tpl->tpl_vars['LOGADO']->value == true) {?>
 
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
