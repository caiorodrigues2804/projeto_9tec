<?php
/* Smarty version 3.1.46, created on 2023-04-06 15:55:32
  from 'C:\xampp\htdocs\9tec\view\email_cliente_cadastro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_642f15a429aaf9_30275084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bf09c797b5cf8517e502674ff45ca32259908c1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\email_cliente_cadastro.tpl',
      1 => 1680805997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642f15a429aaf9_30275084 (Smarty_Internal_Template $_smarty_tpl) {
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

<img src="https://adegaunibeer.caiorodriguesportfolios.com.br/logo.png" width="500px">

</center><?php }
}
