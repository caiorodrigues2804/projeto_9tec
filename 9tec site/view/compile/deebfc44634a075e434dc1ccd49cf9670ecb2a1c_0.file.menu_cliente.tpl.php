<?php
/* Smarty version 3.1.46, created on 2023-04-06 15:24:10
  from 'C:\xampp\htdocs\9tec\view\menu_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_642f0e4a46c622_34334138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'deebfc44634a075e434dc1ccd49cf9670ecb2a1c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\menu_cliente.tpl',
      1 => 1669501925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642f0e4a46c622_34334138 (Smarty_Internal_Template $_smarty_tpl) {
?><h4 class="text-center text-danger">Olá <b><?php echo $_smarty_tpl->tpl_vars['USER']->value;?>
</b>, seja bem vindo! O que deseja fazer agora?</h4>
<section id="ds_dd" class="row">
		
		<div class="text-center ">
			
			<a id="font_ss" href="<?php echo $_smarty_tpl->tpl_vars['PAG_CONTA']->value;?>
" class="btn btn-cssc"><i class="glyphicon glyphicon-home"></i> Minha Conta</a><c></c>
			<a id="font_ss" href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTE_PEDIDOS']->value;?>
" class="btn btn-cssc"><i class="glyphicon glyphicon-barcode"></i> Pedidos</a><c></c>
			<a id="font_ss" href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTE_DADOS']->value;?>
" class="btn btn-cssc"><i class="glyphicon glyphicon-edit"></i> Meus Dados</a><c></c>
			<a id="font_ss" href="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO']->value;?>
" class="btn btn-cssc"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho</a><c></c>
			<a id="font_ss" href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTE_SENHA']->value;?>
" class="btn btn-cssc"><i class="glyphicon glyphicon-exclamation-sign"></i> Alterar Senha</a><c></c>
			<a id="font_ss" href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOGOFF']->value;?>
" class="btn btn-danger"><i class="glyphicon glyphicon-log-out"></i> Sair da conta</a>
						

		</div>

</section>
<hr/>
<?php echo '<script'; ?>
>
	
	// let h_s = document.createElement('h2');
	// document.getElementsByTagName('body')[0].appendChild(h_s);

	let limitador = 0;

	setInterval(() => {
		// h_s.innerText = 'Width: ' + innerWidth + ' Height: ' + innerHeight;
		if (innerWidth <= 990) {			
			if(limitador < 1){
				limitador += 1;
		 		// console.log('pequena')  
		 		limitador = 2;		
		 		document.querySelector("#ds_dd").style = `

		 		`
		 		for(let i = 0;i < document.getElementsByTagName('c').length;i++){
		 				document.getElementsByTagName('c')[i].innerHTML = '<br/><br/>';
		 				document.querySelectorAll('#font_ss')[i].style.fontSize = 18 + 'px';	 					
		 		}
		 		 

		 	
		 	 
		 		// style="font-size: 18px;"

			
			}
		}
		if (innerWidth >= 1280) {
			if(limitador < 1){
				limitador += 1;
		 		// console.log('Grande')  		 	
			}	
		}
	})

<?php echo '</script'; ?>
><?php }
}
