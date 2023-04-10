<?php
/* Smarty version 3.1.46, created on 2023-04-10 14:45:57
  from '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projeto9tec/view/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_64344b5574e7c8_56960405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c5878c03348c2d143931b0b7f6f39c3d11c55e9' => 
    array (
      0 => '/home/u308103531/domains/caiorodriguesportfolios.com.br/public_html/projeto9tec/view/index.tpl',
      1 => 1681148611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64344b5574e7c8_56960405 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['SITE_NOME']->value;?>
</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/js/jquery-2.2.1.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <!-- meu aquivo pessoal de CSS-->
        <link href="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/css/tema.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
        <![endif]-->
    
    </head>
    <style type="text/css">
        * {
/*            color: white;*/
        } #caioba {
            color: black;
        }
    </style>
          <body style="background: #000;">
        
        <!-- começa  o container geral -->
        <div class="container-fluid">
            
            <!-- começa a div topo -->
            <div class="row" id="topo">
                 
                
                <div class="container">
                    <center>
                        <div class="col-md-6">
                  <a href="index.php"><img id="logotipo" src="<?php echo $_smarty_tpl->tpl_vars['LOGOTIPO']->value;?>
" width="490px" style="margin-left:58%;" alt="unibeer"></a>                  
 
                 <a href="index.php"><img id="logotipo2" src="<?php echo $_smarty_tpl->tpl_vars['LOGOTIPO']->value;?>
" width="400px" style="display:none;" alt="unibeer"></a>

                    </div>
                    </center>
                   <?php echo '<script'; ?>
>
                    // let h_s; 
                    // h_s = document.createElement('h2'); 
                    // document.getElementsByTagName('body')[0].appendChild(h_s)


                       setInterval(() => {
                           // h_s.innerHTML =  screen.width + '<br/> width: ' + innerWidth + ' height: ' + innerHeight;
                           if (screen.width >= 1280) {
                            document.querySelector('#logotipo').style.marginLeft = 58 + '%';
                             document.querySelector('#logotipo').style.width = 490 + 'px';

                           }  else {
                           

                            document.querySelector('#logotipo2').style.marginLeft = (-50) + 'px';
                            document.querySelector('#logotipo2').style.width = 300 + 'px';
                           }

                           if(innerWidth <= 990){
                            document.querySelector('#logotipo').style.display = 'none';
                            document.querySelector('#logotipo2').style.display = 'inline-block';
                           } else {
                              document.querySelector('#logotipo').style.display = 'inline-block';
                            document.querySelector('#logotipo2').style.display = 'none';
                           }

                       })
                   <?php echo '</script'; ?>
>
                    <div class="col-md-6 text-right" style="color:#000;">
                                         
                    <?php if ($_smarty_tpl->tpl_vars['LOGADO']->value == true) {?>

                     <div id="caioba_2">Olá: <?php echo $_smarty_tpl->tpl_vars['USER']->value;?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOGOFF']->value;?>
" class="btn btn-cssc"><i class="glyphicon glyphicon-log-out"></i> Sair da conta </a></div>

                    <?php }?>       
                                            
                    </div>
                </div>    
            
            </div><!-- fim da div topo -->
 
            <!-- começa a barra MENU-->
            <div class="row" id="barra-menu">
                
                <!--começa navBAR-->
                <nav style="background:#e98c00;"  class="navbar navbar-inverse">
                    
                    <!-- container navBAr-->
                    <div class="container">
                        <!-- header da navbar-->
                        <div class="navbar-header">
                           <!-- botao que mostra e esconde a navbar--> 
                           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                               <span class="sr-only">Toggle navigation</span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                           </button>
                        
                        </div><!--fim header navbar-->  
                                     
               
                        <div style="background:#e98c00;" class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav">
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['GET_SITE_HOME']->value;?>
"><i class="glyphicon glyphicon-home"></i> Home </a> </li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_PRODUTOS']->value;?>
"><i class="glyphicon glyphicon-barcode"></i> Produtos </a> </li>
               
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTE_CONTA']->value;?>
"><i class="glyphicon glyphicon-user"></i> Minha Conta </a> </li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO']->value;?>
"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho </a> </li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CONTATO']->value;?>
" ><i class="glyphicon glyphicon-envelope"></i> Contato </a> </li>
   <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOCALIZACAO']->value;?>
"><i class="glyphicon glyphicon-map-marker"></i> Localização </a> </li>                         
                              
                                
                            </ul>

                       

                <form class="navbar-form navbar-right" method="post" action="<?php echo $_smarty_tpl->tpl_vars['GET_SITE_HOME']->value;?>
/buscador_resultados" role="search">
                                <div class="form-group">
                                    <input type="text" id="campos" name="campos" class="form-control" placeholder="Digite para buscar" required>
                                </div>
                                <button id="buscador" type="submit" class="btn btn-primary">Buscar</button>

                            </form>
                            
                         </div><!-- fim navbar collapse-->   


                    </div> <!--fim container navBar-->
                    
                </nav><!-- fim da navBar-->   
                                               
                
            </div> <!-- fim barra menu--> 
       
            <!-- começa DIV conteudo-->
            <div class="row" id="conteudo">
            
            <div class="container"> 
              
                <!-- coluna da esquerda -->
                <div  class="col-md-2" id="lateral">
                    
                <div class="list-group">
                    <span class="list-group-item active"> Categorias</span>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_PRODUTOS']->value;?>
?c=todos" class="list-group-item">
                        <span class="glyphicon glyphicon-menu-right"></span>Todos</a> 

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIAS']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>



                    <a href="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_link'];?>
?w=<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_nome'];?>
" class="list-group-item">
                        <span class="glyphicon glyphicon-menu-right"></span> <?php echo $_smarty_tpl->tpl_vars['C']->value['cate_nome'];?>
</a> 

                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    
                </div><!--fim da list group-->              
                              
                </div> <!-- finm coluna esquerda -->  
                
                <!-- coluna direita CONTEÚDO CENTRAL -->
                <div class="col-md-10">
                    
                    
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-home"></i> Home </a></li>
                        <li><a href="#"> Produtos </a></li>
                        <li><a href="#"> Info </a></li>
                        <li>Hoje é <?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
</li>
                    </ul>   
                    <!-- fim do menu breadcrumb-->     
           
    <div id="caioba">  
                    <?php 

                    Rotas::get_Pagina();
                   
                   // var_dump(Rotas::$pag);
                    ?>
   </div>
                 
                  
                    
                </div>  <!--fim coluna direita-->  
            
            </div>   
                
  
            <br><br><br><br><br>
                
                
            </div><!-- fim DIV conteudo--> 
            <style>
                h3 img{
                    width: 40px;
                }
            </style> 
       
   
            <!-- começa div rodape -->
            <div class="row" style="color: #fff;" id="rodape">
                <h3 style="margin:20px;">Pagamento: 
                   <img src="https://superadega.vteximg.com.br/arquivos/pag_master.png?v=637043387616270000">
                   <img src="https://superadega.vteximg.com.br/arquivos/pag_visaelectron.png?v=637838107811670000">
                   <img src="https://superadega.vteximg.com.br/arquivos/pag_dinners.png?v=637043387596030000">
                   <img src="https://superadega.vteximg.com.br/arquivos/pag_amex.png?v=637043387576330000">
                   <img src="https://superadega.vteximg.com.br/arquivos/pag_elo.png?v=637043387605570000">
                   <img src="https://superadega.vteximg.com.br/arquivos/pag_pix.png?v=637581688791300000">
                   <img src="https://superadega.vteximg.com.br/arquivos/pag_debito.png?v01">
                   <img style="width: 100px;" src="https://superadega.vteximg.com.br/arquivos/pag_2cartoes.png?v=637838326242970000"> 
                   </h3>

                   <div style="float: left;margin-left: 10px;padding: 10px;" class="text-white bordered">
                        <h4>Atendimento</h4>
                        <h5>Segunda a Sexta, das 9h às 22h</h5>
                        <h5>Sábado a Domingo, das 9h às 12h</h5>
                   </div> 
                     <div style="float: left;margin-left: 10px;padding: 10px;" class="text-white bordered">                        
                        <h5>Telefone: (16) 3717-8433</h5>
                        <h5>Celular: (16) 3717-8433</h5>
                   </div> 
                    <div style="float: left;margin-left: 10px;padding: 10px;" class="text-white bordered">                      
                        <h4>E-mail</h4>
                        <h5>Atendimento ao cliente: atendimento@9tec.com</h5>
                        <h5>Suporte tecnico: suporte@9tec.com</h5>
                        <h5>Administração: administracao@9tec.com</h5>
                   </div>
                   <div style="float: left;margin-left: 10px;padding: 10px;" class="text-white bordered">                      
                        <h4>Ajuda</h4>
                        <a style="color: white;" href="<?php echo $_smarty_tpl->tpl_vars['PAG_CONTATO']->value;?>
">Fale conosco</a> <br>
                        <a style="color: white;" href="<?php echo $_smarty_tpl->tpl_vars['TERMO']->value;?>
">Termos de uso</a> 
                   </div>
                     <div style="float: left;margin-left: 10px;padding: 10px;" class="text-white bordered">                      
                        <h4>Redes sociais</h4>
                        <i class="fa fa-twitter" style="font-size:24px;margin:5px;">&#32;9Tec</i><br/>
                        <i class="fa fa-facebook" style="font-size:24px;margin:5px;">&#32;9Tec</i><br/>
                        <i class="fa fa-instagram" style="font-size:24px;margin:5px;">&#32;9Tec</i><br/>                      
                   </div>
                   

            <center> 
     
            <div style=" float: left;margin-right: 30px;margin-left: 30px;margin-bottom: 40px;">   
                <h4>Certificados de segurança</h4>
                <div style="background: #935800;padding: 20px;width: 200px;margin-top: 10px;border-radius: 10px;">
                <img src="https://api.siteblindado.com/www.pichau.com.br/seal.png">
                <img src="https://www.pichau.com.br/images/pichau-google.png">
                <img src="https://www.gstatic.com/verifiedreviews/orange_stars_large.png">
                </div>
            <br>   
                        <a href="index.php"><img  src="<?php echo $_smarty_tpl->tpl_vars['LOGOTIPO2']->value;?>
" style="width: 290px;"></a>  <br> 
                        Seja bem-vindo a maior loja on-line de informática 9Tec informática Ltda-02 | CNPJ: 38.442.157/0001-40 | Inscrição Estadual: 758.299.593.746 Endereço: Rua Dois, 697 - Encontro Valparaíso II, SP| 13564-852 | São Paulo - SP | SAC: administracao@9tec.com.br       
            </div>              
            </center>
            <?php 
                for($i = 0;$i < 2;$i++) {
            ?>
                    <br>
            <?php 
            }
            ?>
            </div><!-- fim div rodape-->            
           </div> <!-- fim do container geral -->
              
       
    </div>


<div class="modal fade" id="meumodal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
<h4 class="modal-title">⚠️ AVISO</h4>
</div>
<div class="modal-body">
<h4>Seja bem-vindo a 9tec informática!! <br/> Este site trata-se de uma loja de informática fictícia</h4>
</div>
<div class="modal-footer">
<button type="button" onclick="actions()" class="btn btn-primary">Ok</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php echo '<script'; ?>
>

    if(localStorage){

        if(!localStorage.getItem('ja_visitei')){            
            if(!localStorage.getItem('acesso') == 1){
            $("#meumodal").modal("show");

            function actions(){
              $("#meumodal").modal("hide");
              $("#meusmodal").modal("show");
              actionss = () =>  $("#meusmodal").modal("hide");
              actionsss = () => window.location.href = 'https://about.black/';

              localStorage.setItem('acesso',2);
              localStorage.setItem('ja_visitei','verdadeiro');
          }
        }
     };
    }

   if(localStorage){

        if(!localStorage.getItem('ja_visitei')){            
            if(localStorage.getItem('acesso') == 2){
            $("#meumodal").modal("show");

            function actions(){
              $("#meumodal").modal("hide");
              $("#meusmodal").modal("show");
              actionss = () =>  $("#meusmodal").modal("hide");
              actionsss = () => window.location.href = 'https://about.black/';

              localStorage.setItem('acesso',2);
              localStorage.setItem('ja_visitei','verdadeiro');
          }
        }
     };
    }
<?php echo '</script'; ?>
>
  
    </body>
</html>
<?php }
}
