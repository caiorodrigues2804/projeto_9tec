<?php 


/**
 * descricao Clientes
 * 
 * @author Caio Rodrigues
 * */

class Clientes extends Conexao{
	
	private $cli_nome;
	private $cli_sobrenome;
	private $cli_data_nasc;
	private $cli_rg;
	private $cli_cpf;
	private $cli_ddd;
	private $cli_fone;
	private $cli_celular;
	private $cli_endereco;
	private $cli_numero;
	private $cli_bairro;
	private $cli_cidade;
	private $cli_uf;
	private $cli_cep;
	private $cli_email;
	private $cli_data_cad;
	private $cli_hora_cad;	
	private $cli_senha;	


	/**
	 * chamando o construtor da classe pai
	 * */

	function __construct(){
		parent::__construct();
	}


	/**
	 * 
	 * prepara os campos para inserir ou atualizar
	 *  
	 * */

	function Preparar($cli_nome,$cli_sobrenome,$cli_data_nasc,$cli_rg,$cli_cpf,$cli_ddd,$cli_fone,$cli_celular,$cli_endereco,$cli_numero,$cli_bairro,$cli_cidade,$cli_uf,$cli_cep,$cli_email,$cli_data_cad,$cli_hora_cad,$cli_senha,$cli_senha_2)
	{

		# $this->setCli_

		// print $cli_data_cad . '<br/>';

		$this->setCli_nome($cli_nome);
		$this->setCli_sobrenome($cli_sobrenome);
		$this->setCli_data_nasc($cli_data_nasc);
		$this->setCli_rg($cli_rg);
		$this->setCli_cpf($cli_cpf);
		$this->setCli_ddd($cli_ddd);
		$this->setCli_fone($cli_fone);
		$this->setCli_celular($cli_celular);
		$this->setCli_endereco($cli_endereco);
		$this->setCli_numero($cli_numero);
		$this->setCli_bairro($cli_bairro);
		$this->setCli_cidade($cli_cidade);
		$this->setCli_uf($cli_uf);
		$this->setCli_cep($cli_cep);
		$this->setCli_email($cli_email);
		$this->setCli_data_cad($cli_data_cad);
		$this->setCli_hora_cad($cli_hora_cad);
		$this->setCli_senha($cli_senha);
		$this->setCli_senha_2($cli_senha_2);
			
	}

	/**
	 * 
	 * Insere o novo cliente no banco
	 * 
	 * */

	function Inserir(){

	// veirifico se já tem este cpf no banco de dados
	if($this->GetClienteCPF($this->getCli_cpf()) > 0):
		print '<div class="alert alert-danger" id="erro_mostrar"> Este CPF já está cadastrado ';
		Sistema::voltarPagina();
		print '</div>';
		exit();
	endif;

	// verifica se o email já está cadastrado
	if($this->GetClienteEmail($this->getCli_email()) > 0):
		print '<div class="alert alert-danger" id="erro_mostrar"> Este e-mail já está cadastrado ';
		Sistema::voltarPagina();		
		print '</div>';
		exit();
	endif;
 

	// caso passou na verificação grava no banco

	// $query  = " INSERT INTO clientes (cli_nome,cli_sobrenome,cli_data_nasc,cli_rg,";
	// $query .= " cli_cpf,cli_ddd,cli_fone,cli_celular,cli_endereco,cli_numero,cli_bairro,";
	// $query .= " cli_cidade,cli_uf,cli_cep,cli_email,cli_data_cad,cli_hora_cad,cli_senha)";
	// $query .= " VALUES ";
	// $query .= " (:cli_nome,:cli_sobrenome,:cli_data_nasc,:cli_rg,";
	// $query .= " :cli_cpf,:cli_ddd,:cli_fone,:cli_celular,:cli_endereco,:cli_numero,:cli_bairro,";
	// $query .= " :cli_cidade,:cli_uf,:cli_cep,:cli_email,:cli_data_cad,:cli_hora_cad,:cli_senha)";


	$params = array(
		':cli_nome'       => $this->getCli_nome(),
		':cli_sobrenome'  => $this->getCli_sobrenome(),
		':cli_data_nasc'  => $this->getCli_data_nasc(),
		':cli_rg'         => $this->getCli_rg(),
		':cli_cpf'        => $this->getCli_cpf(),	
		':cli_ddd'        => $this->getCli_ddd(),	
		':cli_fone'       => $this->getCli_fone(),	
		':cli_celular'    => $this->getCli_celular(),	
		':cli_endereco'   => $this->getCli_endereco(),	
		':cli_numero'     => $this->getCli_numero(),	
		':cli_bairro'     => $this->getCli_bairro(),	
		':cli_cidade'     => $this->getCli_cidade(),	
		':cli_uf'         => $this->getCli_uf(),	
		':cli_cep'        => $this->getCli_cep(),
		':cli_email'      => $this->getCli_email(),	
		':cli_data_cad'   => $this->getCli_data_cad(),	
		':cli_hora_cad'   => $this->getCli_hora_cad(),	
		':cli_senha'      => $this->getCli_senha(),	
		':cli_senha_2'    => $this->getCli_senha_2(),							
	);


	// print '<pre>';
	// print_r($params);
	// print '</pre>';
 
	$cli_nome_1 		= $params[':cli_nome'];
	$cli_sobrenome_1 	= $params[':cli_sobrenome'];
	$cli_data_nasc_1	= $params[':cli_data_nasc'];
	$cli_rg_1			= $params[':cli_rg'];
	$cli_cpf_1 			= $params[':cli_cpf'];
	$cli_ddd_1			= $_SESSION['DDD']; 
	$cli_fone_1 		= $params[':cli_fone'];
	$cli_celular_1      = $params[':cli_celular'];
	$cli_endereco_1 	= $params[':cli_endereco'];
	$cli_numero_1	 	= $params[':cli_numero'];
	$cli_bairro_1 		= $params[':cli_bairro'];
	$cli_cidade_1		= $params[':cli_cidade'];
	$cli_uf_1	 		= $_SESSION['UF'];
	$cli_cep_1			= $_SESSION['CEP'];
	$cli_email_1		= $params[':cli_email'];
	$cli_data_cad_1		= $params[':cli_data_cad'];
	// print 'Data do cadastro: ' . $cli_data_cad_1 . '<br/>';
	$cli_hora_cad_1		= $params[':cli_hora_cad'];
	$cli_senha_1  		= $params[':cli_senha'];
	$cli_senha_2		= $params[':cli_senha_2'];
	// print 'Nome: ' . $params[':cli_nome'] . '<br/>';
	// print 'Sobrenome: ' . $params[':cli_sobrenome'] . '<br/>';
	// print 'Data de nascimento: ' . $params[':cli_data_nasc'] . '<br/>';
	// print 'Data de nascimento: ' . $params[':cli_data_nasc'] . '<br/>';

	// print_r($params);

	$query = "INSERT INTO `{$this->prefix}clientes` (`cli_nome`,`cli_sobrenome`,`cli_data_nasc`,`cli_rg`,`cli_cpf`,`cli_ddd`,`cli_fone` ,`cli_celular`,`cli_endereco`,`cli_numero`,`cli_bairro` ,`cli_cidade`,`cli_uf`,`cli_cep`,`cli_email`,`cli_pass`,`cli_data_cad`,`cli_hora_cad`,`dados_extras`) VALUES (
		'$cli_nome_1',
		'$cli_sobrenome_1',
		'$cli_data_nasc_1',
		'$cli_rg_1',			
		'$cli_cpf_1',
		'$cli_ddd_1',
		'$cli_fone_1',
		'$cli_celular_1',
		'$cli_endereco_1',		 	
		'$cli_numero_1',
		'$cli_bairro_1',
		'$cli_cidade_1',
		'$cli_uf_1',
		'$cli_cep_1',
		'$cli_email_1',
		'$cli_senha_1',
		'$cli_data_cad_1',
		'$cli_hora_cad_1',
		'$cli_senha_2'
		)";
 
	$this->ExecuteSQL($query,$params);
	// ISSO VAI DÁ ERRO

	}

	/**
	 * 
	 * ALTERAR cliente no banco
	 * 
	 * */

	function Alterar($id){	

	// verifico se já tem este cpf no banco de dados
	if($this->GetClienteCPF($this->getCli_cpf()) > 0 && $this->getCli_cpf() != $_SESSION['CLI']['cli_cpf']):
		print '<div class="alert alert-danger" id="erro_mostrar"> Este CPF já está cadastrado ';
		Sistema::voltarPagina();
		print '</div>';
		exit();
	endif;

	// verifica se o email já está cadastrado
	if($this->GetClienteEmail($this->getCli_email()) > 0 && $this->getCli_email() != $_SESSION['CLI']['cli_email']):
		print '<div class="alert alert-danger" id="erro_mostrar"> Este e-mail já está cadastrado ';
		Sistema::voltarPagina();		
		print '</div>';
		exit();
	endif;
 

	// caso passou na verificação grava no banco

	// $query  = " INSERT INTO clientes (cli_nome,cli_sobrenome,cli_data_nasc,cli_rg,";
	// $query .= " cli_cpf,cli_ddd,cli_fone,cli_celular,cli_endereco,cli_numero,cli_bairro,";
	// $query .= " cli_cidade,cli_uf,cli_cep,cli_email,cli_data_cad,cli_hora_cad,cli_senha)";
	// $query .= " VALUES ";
	// $query .= " (:cli_nome,:cli_sobrenome,:cli_data_nasc,:cli_rg,";
	// $query .= " :cli_cpf,:cli_ddd,:cli_fone,:cli_celular,:cli_endereco,:cli_numero,:cli_bairro,";
	// $query .= " :cli_cidade,:cli_uf,:cli_cep,:cli_email,:cli_data_cad,:cli_hora_cad,:cli_senha)";


	$params = array(
		':cli_nome'       => $this->getCli_nome(),
		':cli_sobrenome'  => $this->getCli_sobrenome(),
		':cli_data_nasc'  => $this->getCli_data_nasc(),
		':cli_rg'         => $this->getCli_rg(),
		':cli_cpf'        => $this->getCli_cpf(),	
		':cli_ddd'        => $this->getCli_ddd(),	
		':cli_fone'       => $this->getCli_fone(),	
		':cli_celular'    => $this->getCli_celular(),	
		':cli_endereco'   => $this->getCli_endereco(),	
		':cli_numero'     => $this->getCli_numero(),	
		':cli_bairro'     => $this->getCli_bairro(),	
		':cli_cidade'     => $this->getCli_cidade(),	
		':cli_uf'         => $this->getCli_uf(),	
		':cli_cep'        => $this->getCli_cep(),
		':cli_email'      => $this->getCli_email(),	
		':cli_data_cad'   => $this->getCli_data_cad(),	
		':cli_hora_cad'   => $this->getCli_hora_cad(),	
		':cli_senha'      => $this->getCli_senha(),	
		':cli_senha_2'    => $this->getCli_senha_2(),
		':cli_id'    	  => (int)$id							
	);


	// print '<pre>';
	// print_r($params);
	// print '</pre>';
 
	$cli_nome_1 		= $params[':cli_nome'];
	$cli_sobrenome_1 	= $params[':cli_sobrenome'];
	$cli_data_nasc_1	= $params[':cli_data_nasc'];
	$cli_rg_1			= $params[':cli_rg'];
	$cli_cpf_1 			= $params[':cli_cpf'];
	$cli_ddd_1			= $params[':cli_ddd'];
	$cli_fone_1 		= $params[':cli_fone'];
	$cli_celular_1      = $params[':cli_celular'];
	$cli_endereco_1 	= $params[':cli_endereco'];
	$cli_numero_1	 	= $params[':cli_numero'];
	$cli_bairro_1 		= $params[':cli_bairro'];
	$cli_cidade_1		= $params[':cli_cidade'];
	$cli_uf_1	 		= $params[':cli_uf'];
	$cli_cep_1			= $params[':cli_cep'];
	$cli_email_1		= $params[':cli_email'];
	$cli_data_cad_1		= $params[':cli_data_cad'];
	// print 'Data do cadastro: ' . $cli_data_cad_1 . '<br/>';
	$cli_hora_cad_1		= $params[':cli_hora_cad'];
	$cli_senha_1  		= $params[':cli_senha'];
	$cli_senha_2		= $params[':cli_senha_2'];
	$id_s				= $params[':cli_id'];
	// print 'Nome: ' . $params[':cli_nome'] . '<br/>';
	// print 'Sobrenome: ' . $params[':cli_sobrenome'] . '<br/>';
	// print 'Data de nascimento: ' . $params[':cli_data_nasc'] . '<br/>';
	// print 'Data de nascimento: ' . $params[':cli_data_nasc'] . '<br/>';

	// print_r($params);

	$query = "UPDATE  `{$this->prefix}clientes` SET `cli_nome` = '$cli_nome_1',`cli_sobrenome` = '$cli_sobrenome_1',`cli_data_nasc` = '$cli_data_nasc_1',`cli_rg` = '$cli_rg_1',`cli_cpf` = '$cli_cpf_1',`cli_ddd` = '$cli_ddd_1',`cli_fone` = '$cli_fone_1',`cli_celular` = '$cli_celular_1',`cli_endereco` = '$cli_endereco_1',`cli_numero` = '$cli_numero_1',`cli_bairro` = '$cli_bairro_1' ,`cli_cidade` = '$cli_cidade_1',`cli_uf` = '$cli_uf_1',`cli_cep` = '$cli_cep_1',`cli_email` = '$cli_email_1',`cli_pass` = '$cli_senha_1',`cli_data_cad` = '$cli_data_cad_1',`cli_hora_cad` = '$cli_hora_cad_1',`dados_extras` = '$cli_senha_2' WHERE `cli_id` = '$id_s'";
 
	 
 	// Executar query no MySQL
	if($this->ExecuteSQL($query,$params)):

			return true;

		else:

			return false;

	endif;	

	}

	/**
	 * @param string $cpf
	 * @return INT otal de dados
	 * */

	function GetClienteCPF($cpf){

		// $query = "SELECT * FROM {$this->prefix}clientes";
		// $query .= " WHERE cli_cpf = :cpf";

		$params = array(
			':cpf' => $cpf
		);

		$CPF_01 = $params[':cpf'];
		// print 'CPF: ' . $CPF_01;

		$query = "SELECT * FROM `{$this->prefix}clientes` WHERE `cli_cpf` = '$CPF_01'";

		$this->ExecuteSQL($query);

		return $this->TotalDados();
	}

	 /**
	 * @param string $email
	 * @return int total de dados
	 * */
 
	function GetClienteEmail($email){

		// $query = "SELECT * FROM {$this->prefix}clientes";
		// $query .= " WHERE cli_cpf = :cpf";

		$params = array(
			':email' => $email
		); 

		$emails_01 = $params[':email'];

		$query = "SELECT * FROM `{$this->prefix}clientes` WHERE `cli_email` = '$emails_01'";

		$this->ExecuteSQL($query);

		return $this->TotalDados();
	}

	/**
	 * 
	 * @param string $senha
	 * @param string $email
	 * 
	 * */
	function SenhaUpdate($senha, $email){
		

		$this->setCli_senha($senha);
		$this->setCli_email($email);

		$query = "UPDATE `{$this->prefix}clientes` SET `cli_pass` = '$senha' WHERE `cli_email` = '$email'";

		$this->ExecuteSQL($query);

	}


	// GETTERS retornando os dados do cliente

	# Nome
	function getCli_nome(){

	return $this->cli_nome;

	}

	# Sobrenome
	function getCli_sobrenome(){
		return $this->cli_sobrenome;
	}

	# Data de Nascimento
	function getCli_data_nasc(){
		return $this->cli_data_nasc;
	}

	# RG
	function getCli_rg(){
		return $this->cli_rg;
	}

	# CPF
	function getCli_cpf(){

		
		if(!Sistema::validarCPF($this->cli_cpf)):

		print '<div class="alert alert-danger" id="erro_mostrar"> CPF incorreto ';
		Sistema::voltarPagina();		
		print '</div>';

		exit();

 		else:

		 return $this->cli_cpf;

		endif;		

	}

	# DDD
	function getCli_ddd(){
		return $this->cli_ddd;
	}

	# Fone
	function getCli_fone(){
		return $this->cli_fone;
	}

	# Celular
	function getCli_celular(){
		return $this->cli_celular;
	}

	# Endereço
	function getCli_endereco(){
		return $this->cli_endereco;
	}

	# numero
	function getCli_numero(){
		return $this->cli_numero;
	}

	# Bairro
	function getCli_bairro(){
		return $this->cli_bairro;
	}

	# Cidade
	function getCli_cidade(){
		return $this->cli_cidade;
	}

	# UF
	function getCli_uf(){
		return $this->cli_uf;		
	}

	# CEP
	function getCli_cep(){
		return $this->cli_cep;
	}

	# E-MAIL
	function getCli_email(){

		if(!filter_var($this->cli_email, FILTER_VALIDATE_EMAIL)):

		print '<div class="alert alert-danger" id="erro_mostrar"> E-mail incorreto ';
		Sistema::voltarPagina();		
		print '</div>';

		exit();

			else:

			 return $this->cli_email;

		endif;
		
	}



	# DATA CAD
	function getCli_data_cad(){
		return $this->cli_data_cad;
	}
	
	# HORA CAD
	function getCli_hora_cad(){
		return $this->cli_hora_cad;
	}

	# SENHA
	function getCli_senha(){
		return $this->cli_senha;
	}

	function getCli_senha_2(){
		return $this->cli_senha_2;	
	}

	// Começa os SETTERS dos dados do Cliente

	function setCli_nome($cli_nome){

			if(strlen($cli_nome) < 3):

			print '<div class="alert alert-danger" id="erro_mostrar"> Digite seu nome corretamente';
			Sistema::voltarPagina();		
			print '</div>';

		else:
			return $this->cli_nome =  $cli_nome;
		endif;	

		
	}

	function setCli_sobrenome($cli_sobrenome){
		
		if(strlen($cli_sobrenome) < 3):

			print '<div class="alert alert-danger" id="erro_mostrar"> Digite seu sobrenome';
			Sistema::voltarPagina();		
			print '</div>';

		else:
			$this->cli_sobrenome = $cli_sobrenome;
		endif;	
	}

	function setCli_data_nasc($cli_data_nasc){
		$this->cli_data_nasc = $cli_data_nasc;
	}

	function setCli_email($cli_email){
	 	$this->cli_email = $cli_email;
	}
	

	function setCli_rg($cli_rg){
		$this->cli_rg = $cli_rg;
	}

	function setCli_cpf($cli_cpf){
		$this->cli_cpf = $cli_cpf;
	}

	function setCli_ddd($cli_ddd){

		$ddd = filter_var($cli_ddd, FILTER_SANITIZE_NUMBER_INT);
		// FILTER_SINATIZE_STRING
		// teste = teste
		//  // FILTER_VALIDATE

		if(strlen($ddd) != 2):

			print '<div class="alert alert-danger" id="erro_mostrar"> DDD incorreto ';
			Sistema::voltarPagina();		
			print '</div>';	

			else:
			$this->cli_ddd = $cli_ddd;

		endif;		
		
	}

	function setCli_fone($cli_fone){
		$this->cli_fone = $cli_fone;
	}

	function setCli_celular($cli_celular){
		$this->cli_celular = $cli_celular;
	}

	function setCli_endereco($cli_endereco){
		$this->cli_endereco = $cli_endereco;
	}

	function setCli_numero($cli_numero){
		$this->cli_numero = $cli_numero;
	}

	function setCli_bairro($cli_bairro){
		$this->cli_bairro = $cli_bairro;
	}

	function setCli_cidade($cli_cidade){
		$this->cli_cidade = $cli_cidade;
	}

	function setCli_uf($cli_uf){

		$uf = filter_var($cli_uf, FILTER_SANITIZE_STRING);

		if(strlen($uf) != 2):
			print '<div class="alert alert-danger" id="erro_mostrar"> CEP incorreto';
			Sistema::voltarPagina();
			print '</div>';

			else:

			$this->cli_uf = $cli_uf;

		endif;

	}

	function setCli_cep($cli_cep){

		$cep = filter_var($cli_cep, FILTER_SANITIZE_NUMBER_INT);

		if(strlen($cep) != 8):

			print '<div class="alert alert-danger" id="erro_mostrar"> CEP incorreto ';
			Sistema::voltarPagina();		
			print '</div>';	

			else:

			$this->cli_cep = $cli_cep;

		endif;
	}

	function setCli_data_cad($cli_data_cad){
		$this->cli_data_cad = $cli_data_cad;
	}

	function setCli_hora_cad($cli_hora_cad){
		$this->cli_hora_cad = $cli_hora_cad;
	}

	function setCli_senha($cli_senha){
		// $this->cli_senha  = $cli_senha;
		$this->cli_senha = Sistema::Criptografia($cli_senha);
		// 123 => md5 = 

	}

	function setCli_senha_2($cli_senha){
		// $this->cli_senha  = $cli_senha;
		$this->cli_senha_2 = $cli_senha;
		// 123 => md5 = 

	}

}