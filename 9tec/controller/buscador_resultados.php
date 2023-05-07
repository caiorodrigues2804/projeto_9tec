<?php 

$smarty = new Template();
$conexoes = new Conexao();

$smarty->display('buscador_resultados.tpl');


	// print_r($_POST);
	$var_busc = $_POST["campos"];


  
    $servername = "localhost";
    $database = "miniloja2017";
    $username = "root";
    $password = "";
 
 
    $con = mysqli_connect($servername, $username, $password, $database);
 
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    
	$dados = mysqli_query($con,"SELECT * FROM `as_produtos`");
	$results = mysqli_fetch_assoc($dados);
 
    $dados_s = mysqli_query($con,"SELECT COUNT(*) FROM `as_produtos` WHERE `pro_nome` LIKE '$var_busc%'");
    $results_s = mysqli_fetch_assoc($dados_s);
    $results_s = intval($results_s["COUNT(*)"]);
// 	print $results_s;
	
	print (($results_s == 0) ? '<h4>Nenhum produto foi encontrado</h4>' : '<h4>A quantidades de produtos retornados foi ' . $results_s . '</h4>');
	for($i = 0;$i <= $results_s;$i++){

	 if($dados = mysqli_query($con,"SELECT * FROM `as_produtos` WHERE `pro_nome` LIKE '$var_busc%'")){
	 	while($results_s = mysqli_fetch_assoc($dados)){	 	
	 		$ids = $results_s['pro_id'];
	 		
	 		// print '<pre>';print_r($results);print '</pre>';
?>
		
	<div id="ds_s">
		<br/>
		<img style="display: inline;width: 130px;border: 0.5px solid #000;margin: 10px;border-radius: 10%" src="media/imagens/<?php print $results_s['pro_img'];?>"/>
		<h4 style="display: inline;"><!--- (<?php// print $results['pro_id'] ?>) --->
		<b>Nome:</b> <?php print $results_s['pro_nome'] ?> 
		| <b>REF:</b> <?php print $results_s['pro_ref'] ?>
		| <b>Valor do produto:</b> R$ <?php print str_replace('.',',',$results_s['pro_valor']) ?></h4>
		<center>
		  <button style="display: block;" id="botao" class="btn btn-cssc"><a href="

	 	javascript: location.href = 'produtos_info/' + '<?php print $results_s['pro_id']?>/' + '<?php print $results_s['pro_slug']?>';

		  	">Visualizar produto</a></button><br/>
		  </center>
		<hr/>
	</div>
 <?php } } } ?>
 </div>


