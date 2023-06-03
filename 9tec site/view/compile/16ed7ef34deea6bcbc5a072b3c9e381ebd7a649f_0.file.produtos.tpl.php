<?php
/* Smarty version 3.1.46, created on 2023-06-03 16:29:16
  from 'C:\xampp\htdocs\9tec site\view\produtos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_647b948cab77f7_76758981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16ed7ef34deea6bcbc5a072b3c9e381ebd7a649f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\produtos.tpl',
      1 => 1685820555,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647b948cab77f7_76758981 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2 style="margin: 20px;">Lista de Produtos</h2>

<?php echo '<script'; ?>
>
	
	let dados,nums;
	dados = window.location.href;
	nums = dados.indexOf('?p');
	// document.write(nums)
	if (nums >= 50) {
	let dados_2 = dados;
	
	dados_2 = dados_2.slice(71,100);
	dados_2 = dados_2.replace('?p=','');
    dados_2 = dados_2.replace(/[0-9]/g,'');
    dados_2 = dados_2.replace('/','');
    if(dados_2 == ''){
        dados_2 = 'Todos';
    }
	
	document.write('<h4>Categoria selecionada: ',((dados_2 == '%C%guas%t%C%Bnicas') ? 'Águas Tônicas' : dados_2),'</h4>');
 
	}
 
<?php echo '</script'; ?>
>
<hr/>
<section style="margin: 2px;" id="produtos" class="row">
<?php if ($_smarty_tpl->tpl_vars['PRO_TOTAL']->value < 1) {?>
<h4 class="alert alert-danger">Nenhum produto foi encontrado</h4>
<?php }?>

<ul style="list-style:none;">
<br/>
	
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>

	<li class="col-md-4">
		<!-- <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
 -->

		<div class="thumbnail">
		<a href="<?php echo $_smarty_tpl->tpl_vars['PRO_INFO']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_slug'];?>
">
	
			<img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" style="width: 230;height: 230px;" alt="">

			<div class="caption">

				<h4 class="text-center"><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
</h4>

			<h3 class="text-center text-danger">R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</h3>

		 		

			</div>

			</a>

		</div>

	</li>

	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</ul>
</section>

<section id="paginacao" class="row">
<center>
	<?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>

</center>
</section><?php }
}
