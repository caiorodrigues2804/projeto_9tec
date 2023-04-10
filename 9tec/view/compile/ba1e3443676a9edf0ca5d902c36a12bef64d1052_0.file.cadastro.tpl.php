<?php
/* Smarty version 3.1.46, created on 2023-04-06 16:36:09
  from '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projeto9tec/view/cadastro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_642f1f29345848_08597766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba1e3443676a9edf0ca5d902c36a12bef64d1052' => 
    array (
      0 => '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projeto9tec/view/cadastro.tpl',
      1 => 1680809235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642f1f29345848_08597766 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3>Cadastro de cliente</h3>

<hr/>

<!------ dados do cadastro ---->
<section class="row" id="cadastro">

	<form name="cadcliente" id="cadcliente" method="post" action="">
	 
		<!-- NOME -->
		<div class="col-md-4">
			
			<label>Nome:</label>
			<input type="text" name="cli_nome" minlength="3" class="form-control" required>

		</div>

		<!-- SOBRENOME -->
		<div class="col-md-4">
			
			<label>Sobrenome:</label>
			<input type="text" name="cli_sobrenome" minlength="3" class="form-control" required>

		</div>

		<!-- DATA DE NASCIMENTO -->
		<div class="col-md-3">
			
			<label>Data Nasc:</label>
			<input type="date" name="cli_data_nasc"  class="form-control" required>

		</div>

		<!-- RG -->
		<div class="col-md-2">
			
			<label>RG:</label>
			<input type="text" name="cli_rg"  class="form-control" required>

		</div>

		<!-- CPF -->
		<div class="col-md-2">
			
			<label>CPF:</label>
			<input type="text" name="cli_cpf" class="form-control" minlength="11" maxlength="11" required>

		</div>

		<!-- DDD -->
		<div class="col-md-2">
			
			<label>DDD:</label>
			<input type="number" name="cli_ddd"  class="form-control" min="10" max="99" required>

		</div>

		<!-- FONE -->
		<div class="col-md-3">
			
			<label>Fone:</label>
			<input type="number" name="cli_fone"  class="form-control" required>

		</div>

		<!-- CELULAR -->
		<div class="col-md-3">
			
			<label>Celular:</label>
			<input type="number" name="cli_celular"  class="form-control" required>

		</div>
	 
		
		<!-- ENDEREÇO -->
		<div class="col-md-6">
			
			<label>Endereço:</label>
			<input type="text" name="cli_endereco"  class="form-control" minlength="4" required>

		</div>

		<!-- NÚMERO -->
		<div class="col-md-2">
			
			<label>Número:</label>
			<input type="text" name="cli_numero"  class="form-control" required>

		</div>


		<!-- BAIRRO -->
		<div class="col-md-4">
			
			<label>Bairro:</label>
			<input type="text" name="cli_bairro"  class="form-control" minlength="3" required>

		</div>

		<!-- CIDADE -->
		<div class="col-md-4">
			
			<label>Cidade:</label>
			<input type="text" name="cli_cidade"  class="form-control" minlength="3" required>

		</div>
		
		<!-- UF -->
		<div class="col-md-2">
			
			<label>UF:</label>
			<input type="text" name="cli_uf"  class="form-control" maxlength="2" minlength="2" required>

		</div>

			<!-- CEP -->
		<div class="col-md-2">
			
			<label>CEP:</label>
			<input type="text" name="cli_cep"  class="form-control" minlength="8" maxlength="8" required>

		</div>

		<!-- EMAIL -->
		<div class="col-md-4">
			
			<label>Email:</label>
			<input type="email" name="cli_email"  class="form-control" required>

		</div>



	
</section>
<br/>
<br/>
<center>
<input type="button" onclick="ler()" value="Ler os termos de uso" class="btn btn-default"/>
<br/> 
</center>
<br/>
<section class="row" id="btngravar">
	<div class="col-md-4"></div>
	<div class="col-md-4">

		
		<button style="display: block;" id="btns-confirmacao" type="submit" class="btn btn-cssc btn-block">Cadastrar <i class="glyphicon glyphicon-ok"></i> </button>
		
	</div>
	<div class="col-md-4"></div>

</section>
	</form>
	<?php echo '<script'; ?>
>
        function ler(){
            window.open('<?php echo $_smarty_tpl->tpl_vars['TERMO_DE_USO']->value;?>
');
        }

        document.querySelector('#termo').checkod = off;
	<?php echo '</script'; ?>
>

<?php }
}
