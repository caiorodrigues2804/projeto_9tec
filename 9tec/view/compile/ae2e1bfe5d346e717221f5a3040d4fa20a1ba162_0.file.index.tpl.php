<?php
/* Smarty version 3.1.46, created on 2022-10-13 02:39:13
  from 'C:\xampp\htdocs\Site Adega Unibeer\view\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_63475e312cbf05_14063113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae2e1bfe5d346e717221f5a3040d4fa20a1ba162' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Site Adega Unibeer\\view\\index.tpl',
      1 => 1665621546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63475e312cbf05_14063113 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html>
    <head>
        <title>Adegar Unibeer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="view/tema/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <?php echo '<script'; ?>
 src="view/tema/js/jquery-2.2.1.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="view/tema/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <!-- meu aquivo pessoal de CSS-->
        <link href="view/tema/css/tema.css" rel="stylesheet" type="text/css"/>
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
                   <img src="view/images/unibeerlogos.png" width="25%" alt="unibeer"> 
                    </center>
                       
                </div>    
            
            </div><!-- fim da div topo -->
            
            <!-- começa a barra MENU-->
            <div class="row" id="barra-menu">
                
                <!--começa navBAR-->
                <nav class="navbar navbar-inverse">
                    
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
                        
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav">
                             <li><a href="<?php echo $_smarty_tpl->tpl_vars['GET_SITE_HOME']->value;?>
"><i class="glyphicon glyphicon-home"></i> Home </a> </li>
                               
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTE_CONTA']->value;?>
"><i class="glyphicon glyphicon-user"></i> Minha Conta </a> </li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO']->value;?>
"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho </a> </li>
                                <li><a href="#" ><i class="glyphicon glyphicon-envelope"></i> Contato </a> </li>
                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Categorias <i class="glyphicon glyphicon-menu-down"></i></a> 
                                
                                    <ul class="dropdown-menu">
                                      <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> categoria 1 </a> </li>
                                     <li class="divider"></li>
                                     <li><a href="#"><span class="glyphicon glyphicon-briefcase"></span> categoria 2 </a> </li>
                                      <li class="divider"></li>
                                      <li><a href="#"><i class="glyphicon glyphicon-bookmark"></i> categoria 3 </a> </li>
                                      <li class="divider"></li>
                                     <li><a href="#"> categoria 4 </a> </li>
                                    
                                    </ul>
                                
                                </li>
                               
                                
                            </ul>
                            

                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Digite para buscar" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                            
                         </div><!-- fim navbar collapse-->   


                    </div> <!--fim container navBar-->
                    
                </nav><!-- fim da navBar-->   
                
                
                
                
                
            </div> <!-- fim barra menu--> 
            
            <!-- começa DIV conteudo-->
            <div class="row" id="conteudo">
            
            <div class="container"> 
              
                <!-- coluna da esquerda -->
                <div class="col-md-2" id="lateral">
                    
                <div class="list-group">
                    <span class="list-group-item active"> Categorias</span>
                    
                    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> Produtos </a> 
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-menu-right"></i> Produtos </a> 
                    
                    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> Produtos </a> 
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-menu-right"></i> Produtos </a> 
                    
                    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> Produtos </a> 
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-menu-right"></i> Produtos </a> 
                    
                    
                </div><!--fim da list group-->              
                              
                </div> <!-- finm coluna esquerda -->  
                
                <!-- coluna direita CONYEUDO CENTRAL -->
                <div class="col-md-10">
                    
                    
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-home"></i> Home </a></li>
                        <li><a href="#"> Produtos </a></li>
                        <li><a href="#"> Info </a></li>
                    </ul>   
                    <!-- fim do menu breadcrumb-->             
                    

                    <?php 
                    Rotas::get_Pagina();
                    var_dump(Rotas::$pag);
                    ?>



                  
                    
                </div>  <!--fim coluna direita-->  
            
            </div>   
                
                
            
                
                
                
            </div><!-- fim DIV conteudo-->
            
            <!-- começa div rodape -->
            <div class="row" id="rodape">
            
            
            </div><!-- fim div rodape-->
            
            
            
           </div> <!-- fim do container geral -->
        
        
        
        
    </body>
</html>
<?php }
}
