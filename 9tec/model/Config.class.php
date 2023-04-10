<?php 


/**
 * Descrição config
 * Armazena diversos informações do sistema/loja
 * 
 * @author Caio Rodrigues
 * */
 error_reporting(0);


class Config {

	/**
	 *  INFORMAÇÕES DE BANCO DE DADOS ====================
	 * */
	const BD_HOST = "us-imm-web539.main-hosting.eu";
	const BD_USER = "u308103531_9tec_root"; 
	const BD_SENHA = "Nvidia280401vai28@2";
	const BD_BANCO = "u308103531_9tec_info";
	const BD_PREFIX = "as_";
	const BD_LIMITE_POR_PAG = 9;



	/**
	 * INFORMAÇÕES DO SITE ==============================
	 * */

	/*** URL do site */
	const SITE_URL = "https://projeto9tec.caiorodriguesportfolios.com.br";

	/*** Pasta padrão do site */
	const SITE_PASTA = "";
	/** * nome do site  * */
	const SITE_NOME = '9Tec';
	/** * email doa administrador do site * */
	const SITE_EMAIL_ADM = "webcompleto22@gmail.com";


	/**
	 * DADOS DO SERVIDOR DE E-MAIL
	 * */

	const EMAIL_HOST 	  = "smtp.gmail.com";  
	const EMAIL_USER 	  = "webcompleto22@gmail.com";
	const EMAIL_NOME 	  = "9Tec informática";
	const EMAIL_SENHA 	  = "dpweqzfjyvtsrkuq";
	const EMAIL_PORTA 	  = 587;
	const EMAIL_SMTPAUTH  = true;
	const EMAIL_SMTSECURE = "tls";
	const EMAIL_COPIA = "teste@teste.com";

}