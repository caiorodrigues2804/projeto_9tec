<?php
/* Smarty version 3.1.46, created on 2022-11-26 12:29:02
  from '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projetoadegaunibeer/view/email_cliente_cadastro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_638230be2e7b90_60443765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e67c80376efb0e2bcdb2394fd9af867551d00085' => 
    array (
      0 => '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projetoadegaunibeer/view/email_cliente_cadastro.tpl',
      1 => 1669425199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638230be2e7b90_60443765 (Smarty_Internal_Template $_smarty_tpl) {
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

<img src="https://adegaunibeer.caiorodriguesportfolios.com.br/unibeerlogo.png" width="500px">

</center><?php }
}
