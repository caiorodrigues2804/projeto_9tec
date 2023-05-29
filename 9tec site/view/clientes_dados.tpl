<h3>Meus Dados</h3>

<hr/>

<!------ dados do cadastro ---->
<section class="row" id="cadastro">

	<form name="cadcliente" id="cadcliente" method="post" action="">
	 
		<!-- NOME -->
		<div class="col-md-4">
			
			<label>Nome:</label>
			<input type="text" value="{$CLI_NOME}" name="cli_nome" minlength="3" class="form-control" required>

		</div>

		<!-- SOBRENOME -->
		<div class="col-md-4">
			
			<label>Sobrenome:</label>
			<input type="text" value="{$CLI_SOBRENOME}" name="cli_sobrenome" minlength="3" class="form-control" required>

		</div>

		<!-- DATA DE NASCIMENTO -->
		<div class="col-md-3">
			
			<label>Data Nasc:</label>
			<input type="date" value="{$CLI_DATA_NASC}"  name="cli_data_nasc"  class="form-control" required>

		</div>

		<!-- RG -->
		<div class="col-md-2">
			
			<label>RG:</label>
			<input type="text" value="{$CLI_RG}" name="cli_rg"  class="form-control" required>

		</div>

		<!-- CPF -->
		<div class="col-md-2">
			
			<label>CPF:</label>
			<input type="text" value="{$CLI_CPF}"  name="cli_cpf" placeholder="Exe: 40574871071" class="form-control" minlength="11" maxlength="11" required readonly>

		</div>

		<!-- DDD -->
		<div class="col-md-2">
			
			<label>DDD:</label>
			<input type="number" value="{$CLI_DDD}" name="cli_ddd"  class="form-control" min="10" max="99" required>

		</div>

		<!-- FONE -->
		<div class="col-md-3">
			
			<label>Fone:</label>
			<input type="number" value="{$CLI_FONE}"  name="cli_fone"  class="form-control" required>

		</div>

		<!-- CELULAR -->
		<div class="col-md-3">
			
			<label>Celular:</label>
			<input type="number" value="{$CLI_CELULAR}" name="cli_celular"  class="form-control" required>

		</div>
	 
		
		<!-- ENDEREÇO -->
		<div class="col-md-6">
			
			<label>Endereço:</label>
			<input type="text" value="{$CLI_ENDERECO}" name="cli_endereco"  class="form-control" minlength="4" required>

		</div>

		<!-- NÚMERO -->
		<div class="col-md-2">
			
			<label>Número:</label>
			<input type="text" value="{$CLI_NUMERO}"  name="cli_numero"  class="form-control" required>

		</div>


		<!-- BAIRRO -->
		<div class="col-md-4">
			
			<label>Bairro:</label>
			<input type="text" value="{$CLI_BAIRRO}" name="cli_bairro"  class="form-control" minlength="3" required>

		</div>

		<!-- CIDADE -->
		<div class="col-md-4">
			
			<label>Cidade:</label>
			<input type="text" value="{$CLI_CIDADE}" name="cli_cidade"  class="form-control" minlength="3" required>

		</div>
		
		<!-- UF -->
		<div class="col-md-2">
			
			<label>UF:</label>
			<input type="text" value="{$CLI_UF}" name="cli_uf"  class="form-control" maxlength="2" minlength="2" required>

		</div>

			<!-- CEP -->
		<div class="col-md-2">
			
			<label>CEP:</label>
			<input type="text" value="{$CLI_CEP}" name="cli_cep"  class="form-control" minlength="8" maxlength="8" required>

		</div>

		<!-- EMAIL -->
		<div class="col-md-4">
			
			<label>Email:</label>
			<input type="email" value="{$CLI_EMAIL}" name="cli_email"  class="form-control" required>

		</div>



	
</section>
<br/>
<br/>
<center>
 
</center>
<br/>
<section class="row" id="btngravar">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<label>Digite sua senha atual por segurança <br/>(<small>sua senha não será alterada</small>)</label>
		<input type="password" name="cli_senha" id="cli_senha" class="form-control" required>
		<br/>
		<button style="display: block;" id="btns-confirmacao" type="submit" class="btn btn-cssc btn-block">Gravar <i class="glyphicon glyphicon-ok"></i> </button>
 
</section>
	</form>
	<script>
        function ler(){
            window.open('{$TERMO_DE_USO}');
        }

        document.querySelector('#termo').checkod = off;
	</script>

