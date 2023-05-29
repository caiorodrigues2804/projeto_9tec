<?php 

include("../conexao.php");
 
if ($_SESSION["autenticao"] == 'FALSO') 
{	
    $_SESSION["autenticao"]= 'FALSO';
  	$_SESSION["dados"] =  'FALSO';
	header("Location: index.php?acesso=1");
} else if ($_SESSION["autenticao"] == 'VERDADEIRO') {
 
 	header("Location: ../area_administrativa/index.php");
}