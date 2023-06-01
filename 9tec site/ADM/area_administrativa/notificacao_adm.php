<?php require "validador_de_acessos.php"; ?>
<?php     
 $stmt = $pdo->prepare("SELECT COUNT(*) count FROM `as_pedidos` WHERE `concluido` <= 0;");
 $stmt->execute();          
 if (($stmt->fetch(PDO::FETCH_OBJ)->count) >= 1) { 
?>
 <span class="bg-danger badge badge-danger">
<?php     
		  
   			print_r(mysqli_query($con,"SELECT COUNT(*) qtd_pedidos FROM `as_pedidos` WHERE `concluido` <= 0;")->fetch_assoc()["qtd_pedidos"]);
         
?>
 </span>
 <?php } ?>