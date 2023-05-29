<?php 

include("../conexao.php");

session_destroy();
$_SESSION["dados"] = 'VERDADEIRO';
$_SESSION["autenticador"] = 'FALSO';

header("Location: ../login/index.php");