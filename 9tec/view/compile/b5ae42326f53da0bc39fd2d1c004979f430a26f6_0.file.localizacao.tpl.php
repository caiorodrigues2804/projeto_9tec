<?php
/* Smarty version 3.1.46, created on 2023-04-06 14:42:00
  from 'C:\xampp\htdocs\9tec\view\localizacao.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_642f046886b004_69888584',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5ae42326f53da0bc39fd2d1c004979f430a26f6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\9tec\\view\\localizacao.tpl',
      1 => 1680802920,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642f046886b004_69888584 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Localização</h2>

<style>
	#clique_google{
		color: #fff;
		text-decoration: none;
	}
</style>
<div class="col-md-17"><div>

<h3>Horário de atendimento</h3> 
<h4>Segunda a Sexta, das 9h às 22h<br/>  
Sábado a Domingo, das 9h às 12h</h4> 
<h3>Telefone & Celular</h3>
<h4>Tel: (16) 3717-8433 <br/>
Cel: (16) 98457-9845</h4>
<h3>E-mail</h3>
<h4>Atendimento ao cliente: atendimento@9tec.com</h4>
<h4>Suporte tecnico: suporte@9tec.com</h4>
<br>
<h3>Redes Sociais</h3>
<h4>
	Facebook: https://www.facebook.com/9tec<br/>
	Instagram: https://www.instagram.com/9tec<br/>
	Twitter: https://www.twitter.com/9tec
</h4>
<br>
<h4>Você pode entrar em contato conosco pelos telefones, e-mail, redes sociais mencionados acima. Nosso horário de atendimento para atendimento ao cliente e suporte técnico é de segunda a sexta-feira, das 9h às 22h, sábado a domingo, das 9h às 12h. Teremos o prazer em atendê-lo e ajudá-lo com suas necessidades em informática!</h4>
 
<!-- <img src="view/images/.png" width="80%"> -->
<hr>
<h3>Endereço: </h3><h4>Rua Dois, 697 - Encontro Valparaíso II, São Paulo - SP, 13564-852 Nº 542</h4>
<br/>
<h4>Google Maps</h4>
<img src="view/images/localizacoes.png"  width="80%" alt=""><br/>
 
	<button style="width: 80%;" class="btn btn-cssc"><a id="clique_google" onclick="abrir_pagina()">Clique aqui para visualizar</a></button>
  
 </div>
 <br><br>
 <?php echo '<script'; ?>
>
 		abrir_pagina = () => 
 		{
 			window.open("https://www.google.com.br/maps/search/Rua+Dois,+697+-+Encontro+Valpara%C3%ADso+II,+S%C3%A3o+Paulo+-+SP,+13564-852+/@-23.5227881,-46.4571276,18.25z");
 		}
 <?php echo '</script'; ?>
><?php }
}
