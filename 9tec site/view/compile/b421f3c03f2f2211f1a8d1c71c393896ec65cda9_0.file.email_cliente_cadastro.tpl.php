<?php
/* Smarty version 3.1.46, created on 2023-06-03 17:59:48
  from 'C:\xampp\htdocs\9tec site\view\email_cliente_cadastro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_647ba9c4e94392_57289036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b421f3c03f2f2211f1a8d1c71c393896ec65cda9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\email_cliente_cadastro.tpl',
      1 => 1685721169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647ba9c4e94392_57289036 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
		
	h3{ 
		font-family: arial;

	}

</style>
<center>
<h3>Olá <?php echo $_smarty_tpl->tpl_vars['NOME']->value;?>
, obrigado por se cadastrar em <?php echo $_smarty_tpl->tpl_vars['SITE']->value;?>
</h3>

<h3>Cadastrado efetuado com sucesso, para fazer o login use email cadastrado ( <?php echo $_smarty_tpl->tpl_vars['EMAIL']->value;?>
 )
	<br/>
	com a sua senha, sua senha é <b>( <?php echo $_smarty_tpl->tpl_vars['SENHA']->value;?>
 )</b>
</h3>
<h3>
	Para acessar o site e sua conta basta usar este endereço <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
</a>
</h3>

<hr/>

<img src="https://github.com/caiorodrigues2804/projeto_9tec/blob/main/img/img1.png?raw=true" width="300px">

</center><?php }
}
