<?php 
  
include("../conexao.php");

// DEBUGGER
// print_r($_SESSION);
 

  if(isset($_GET["login"]) && isset($_POST))
  {
      $login=addslashes($_POST["login"]);      
      $senhas = hash('SHA512', md5(md5(addslashes($_POST["senha"]))));

      $cmd = $pdo->prepare("SELECT COUNT(*) FROM `administracao` WHERE (`adm_email` = :adm_e OR `adm_nome` = :adm_e) AND `adm_pass` = :adm_s;");
        $cmd->bindValue(":adm_e","$login");        
        $cmd->bindValue(":adm_s","$senhas");                
     $cmd->execute(); 
     $resultado = $cmd->fetch(PDO::FETCH_ASSOC); 
    

      $cmd_s = $pdo->prepare("SELECT * FROM `administracao` WHERE (`adm_email` = :adm_e OR `adm_nome` = :adm_e) AND `adm_pass` = :adm_s;");
        $cmd_s->bindValue(":adm_e","$login");        
        $cmd_s->bindValue(":adm_s","$senhas");                
     $cmd_s->execute(); 
     $resultado_id = $cmd_s->fetch(PDO::FETCH_ASSOC);

    if ($resultado["COUNT(*)"] >= 1) 
    {
      $_SESSION["autenticao"] = 'VERDADEIRO';
      $_SESSION["dados"] = 'VERDADEIRO';
      $_SESSION["id"] = $resultado_id["adm_id"];
      // exit();
       $url =  '<meta http-equiv="refresh" content="0; url=validador_acesso.php?logado=1">';
       echo $url;
    }  else 
    {

       $_SESSION["autenticao"]= 'FALSO';
       $_SESSION["dados"] =  'FALSO';
       $url =  '<meta http-equiv="refresh" content="0; url=index.php">';
       echo $url;
    }


  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <html lang="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
	<title>ADM</title>
</head>
<body>
 <style>
 	
/* BASIC */

html {
  background-color: #000;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
  background-color: #000;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #f5f5f5;
  padding: 60px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
  border: 2px solid #e78a00;
}

#formFooter {
  background-color: #f9f9f9;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text],input[type=password] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus,input[type=password]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder,input[type=password]:placeholder {
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}


 </style>
 <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <div class="mt-4"></div>
      <img src="../img/logo2.png" style="width: 200px;" id="icon" alt="User Icon" />
      <br/> 
      Área administrativa 
      <div class="mb-4"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <!-- Login Form -->
    <form action="index.php?login=1" method="post">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="nome de usuario ou email" required>
      <input type="password" id="password" class="fadeIn third" name="senha" placeholder="senha" required>
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <?php 
if(!isset($_GET["acesso"])){
  if(isset($_SESSION["dados"])){
    if ($_SESSION["dados"] == 'FALSO'): ?>
        <div class="alert alert-danger" align="center">
  email ou senha inválido(s)
        </div>
    <?php endif;
    }} else if(isset($_GET["acesso"])){  ?>
     <div class="alert alert-danger" align="center">
         É obrigatório fazer o login para acessar as páginas protegidas
     </div>
  <?php } ?>

    <!-- Remind Passowrd -->
    <div id="formFooter"> 
      <a class="underlineHover" href="
      javascript:
      alert('Entre em contato com o e-mail do suporte');
      ">Problemas de autenticação?</a> <br/>
      <a class="underlineHover" href="../../index.php">Voltar</a>
    </div>

  </div>
</div>
  <script>
    if (!localStorage.getItem('VISITADO'))
     {

    ConfirmDialog('Para acessar esta página é recomendamos ter resolução 1366 x 768 ou superior');


    function ConfirmDialog(message) {
      $('<div></div>').appendTo('body')
        .html('<div><h6>' + message + '</h6></div>')
        .dialog({
          modal: true,
          title: 'AVISO',
          zIndex: 10000,
          autoOpen: true,
          width: 'auto',
          resizable: false,
          buttons: {
            Entendido: function() {

              localStorage.setItem('VISITADO','SIM');
              $(this).dialog("close");
            },
          },
          close: function(event, ui) {
            $(this).remove();
          }
        });
    };
     };
  </script>

</body>
</html>