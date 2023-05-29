<?php
/* Smarty version 3.1.46, created on 2023-04-05 18:42:02
  from 'C:\xampp\htdocs\Projetos 9tec\view\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_642deb2ae4b606_61800383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e573edf92d59f0b257d52e11bb929b738412d72' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projetos 9tec\\view\\index.tpl',
      1 => 1680730922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642deb2ae4b606_61800383 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['SITE_NOME']->value;?>
</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
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
          <body style="background: #fff;">
        
        <!-- começa  o container geral -->
        <div class="container-fluid">
            
            <!-- começa a div topo -->
            <div class="row" id="topo">
                 
                
                <div class="container">
                    <center>
                        <div class="col-md-6">
                  <!-- <a href="index.php"><img id="logotipo" src="https://adegaunibeer.caiorodriguesportfolios.com.br/unibeerlogo.png" width="450px" style="margin-left:70%;" alt="unibeer"></a> -->

                  TESTE

                 <a href="index.php"><img id="logotipo2" src="https://adegaunibeer.caiorodriguesportfolios.com.br/unibeerlogo.png" width="450px" style="display:none;" alt="unibeer"></a>

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
                            document.querySelector('#logotipo').style.marginLeft = 65 + '%';
                             document.querySelector('#logotipo').style.width = 490 + 'px';

                           } else{
                           

                            document.querySelector('#logotipo2').style.marginLeft = (-5) + 'px';
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
                     Olá: <?php echo $_smarty_tpl->tpl_vars['USER']->value;?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOGOFF']->value;?>
" class="btn btn-cssc"><i class="glyphicon glyphicon-log-out"></i> Sair da conta </a>
                    <?php }?>       
                                            
                    </div>
                </div>    
            
            </div><!-- fim da div topo -->
 
            <!-- começa a barra MENU-->
            <div class="row" id="barra-menu">
                
                <!--começa navBAR-->
                <nav style="background:#202377;"  class="navbar navbar-inverse">
                    
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
                                     
               
                        <div style="background:#202377;" class="collapse navbar-collapse" id="navbar">
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
 
                    <?php 
                    Rotas::get_Pagina();
                   // var_dump(Rotas::$pag);
                    ?>



                  
                    
                </div>  <!--fim coluna direita-->  
            
            </div>   
                
  
                
                
                
            </div><!-- fim DIV conteudo-->
             <hr/>
            <style>
                h3 img{
                    width: 40px;
                }
            </style>
        <h5 style="margin:20px">🔞 Venda proibida para menores de 18 anos. Aprecie com moderação. Se beber não dirija!</h5>
       <h3 style="margin:20px;">Pagamento: 
       <img src="https://superadega.vteximg.com.br/arquivos/pag_master.png?v=637043387616270000">
       <img src="https://superadega.vteximg.com.br/arquivos/pag_visaelectron.png?v=637838107811670000">
       <img src="https://superadega.vteximg.com.br/arquivos/pag_dinners.png?v=637043387596030000">
       <img src="https://superadega.vteximg.com.br/arquivos/pag_amex.png?v=637043387576330000">
       <img src="https://superadega.vteximg.com.br/arquivos/pag_elo.png?v=637043387605570000">
       <img src="https://superadega.vteximg.com.br/arquivos/pag_debito.png?v01">
       <img src="https://superadega.vteximg.com.br/arquivos/pag_pix.png?v=637581688791300000">
       <img style="width: 100px;" src="https://superadega.vteximg.com.br/arquivos/pag_2cartoes.png?v=637838326242970000">
       </h3>
              <br><br>
            <!-- começa div rodape -->
            <div class="row" id="rodape">
                <center>

                    <div style="width: 70%;margin: 29px;">
                Seja bem-vindo a maior loja on-line de bebidas de qualidade. Adega UniBeer Ltda-02 | CNPJ: 42.587.316/0001-59 | Inscrição Estadual:  606.934.862.680 Endereço: Rua Amador Bueno, 392 - Santo Amaro | 04752-005 | São Paulo - SP | SAC: adegaunibeer@contato.com.br 
                    </div>
             
                </center>
            
            </div><!-- fim div rodape-->
            
            
            
           </div> <!-- fim do container geral -->
        
    </div>
        
        
    </body>
</html>
<?php }
}
