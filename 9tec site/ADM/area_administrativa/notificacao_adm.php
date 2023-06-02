<?php require "validador_de_acessos.php"; ?>
<?php     
 $stmt = $pdo->prepare("SELECT COUNT(*) count FROM `as_pedidos` WHERE `concluido` <= 0;");
 $stmt->execute();          
 if (($stmt->fetch(PDO::FETCH_OBJ)->count) >= 1) { 
?>
 <span class="badge bg-<?php 
                if(mysqli_query($con,"SELECT COUNT(*) count FROM `as_pedidos` WHERE `ped_pag_status` = 'SIM';")->fetch_assoc()["count"] >= 1):
                print 'success';
            else:
                print 'danger';
            endif;

    ?>">
<?php     
		  
   			print_r(mysqli_query($con,"SELECT COUNT(*) qtd_pedidos FROM `as_pedidos` WHERE `concluido` <= 0;")->fetch_assoc()["qtd_pedidos"]);
         
?>
 </span>  
 <?php } ?>