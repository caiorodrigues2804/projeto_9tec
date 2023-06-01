<?php
/* Smarty version 3.1.46, created on 2023-05-16 13:24:56
  from 'C:\xampp\htdocs\9tec\view\email_cliente_cadastro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_6463ae586ca0f9_99499096',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bf09c797b5cf8517e502674ff45ca32259908c1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\email_cliente_cadastro.tpl',
      1 => 1682907330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6463ae586ca0f9_99499096 (Smarty_Internal_Template $_smarty_tpl) {
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

<img src="https://scontent.fcgh22-1.fna.fbcdn.net/v/t39.30808-6/337659705_1577860109368424_2192567867889571563_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=LUGpe1DIso8AX_hbU8d&_nc_ht=scontent.fcgh22-1.fna&oh=00_AfA3OM7A3wJljQBa-Qj21G69-pTBOVF1RgCD7FgxHFbXng&oe=645400ED" width="500px">

</center><?php }
}
