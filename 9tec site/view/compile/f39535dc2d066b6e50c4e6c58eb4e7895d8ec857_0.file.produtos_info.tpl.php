<?php
/* Smarty version 3.1.46, created on 2023-06-01 15:45:14
  from 'C:\xampp\htdocs\9tec site\view\produtos_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_6478e73ac48196_52558103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f39535dc2d066b6e50c4e6c58eb4e7895d8ec857' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec site\\view\\produtos_info.tpl',
      1 => 1685645114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6478e73ac48196_52558103 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>


 <h2 class="text-center"><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
 - REF: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_ref'];?>
</h2>
 <center><h4><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_descricao_extra'];?>
</h4></center>
 <hr>

 <div class="row">
	<!-- div da esquerda imagem do produto -->
 	<div class="col-md-6 ">
 		<img class="thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" style="width:100%;height: 100%;" alt=""> 			
 	
 	</div>

	<!-- div da direita info do produto -->
 	<div class="col-md-6 thumbnail" style="padding: 10px;">

 		<!-- <center><h4><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_descricao_extra'];?>
</h4></center> 	     -->
 	 
 		<img src="<?php echo $_smarty_tpl->tpl_vars['TEMA']->value;?>
/images/logo-pagseguro.png" alt="">
 		<hr/>		
		<div class="col-md-6">
		<h3 class="text-center text-danger"><b>R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
 </b></h3>		
     	</div>
		
		<div class="col-md-6">
			<form name="carrinho" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_COMPRAR']->value;?>
">	
			<input 	type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
">			
			<input 	type="hidden" name="acao" value="add">
			<button class="btn btn-cssc btn-lg">Comprar</button>
			</form>
		</div>
 	</div>
 </div>
 <div>
	<!-- LISTAGEM DE IMAGENS PRODUTOS -->
	 
	</div>

	<!--- DESCRIÇÃO DO PRODUTO-->
	<div style="margin: 20px;" class="row">		
		<h4 class="text-center">Descrição do produto</h4>
		<br>
	<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_desc'];?>

	</div>
	<br/>
	<br/>
	<h4 class="text-center">Mais detalhes sobre o produto</h4>
 
	<ul>
		<li>Nome: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
</li>
		<li>Valor: R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</li>
		<li>Altura do produto: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_altura'];?>
</li>
		<li>Largura do produto: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_largura'];?>
</li>
		<li>Comprimento do produto: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_largura'];?>
</li>
		<li>Peso do produto: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_peso'];?>
</li>		
	</ul>
</div>


 	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

 
<?php }
}
