<?php 
    require "validador_de_acessos.php"; 
    $x = 0;
       echo '<a href="?pagina=1"><button class="btn btn-secondary m-1">Primeira página</button>';
            for($i = 1;$i <= $total;$i++){
           
                // DEPURAÇÃO
                // echo $i;
                if (!isset($_GET["pagina"]))
                {
                    $_GET["pagina"] = 0;
                }

                $x += 1;
                if ($x >= ($_GET["pagina"] - 2) && $x <= ($_GET["pagina"] + 2)) {                    
               

                if($i == $pagina){
                    echo '<button class="btn btn-secondary m-1"> ( ' . $i . ' ) </button>';
                } else {
                    if(!isset($_GET["pesquisado"])):
                    echo "<a class='btn btn-secondary m-1' href='?pagina=$i'>$i</a>"; 
                    elseif (isset($_GET["pesquisado"])):
                    echo "<a class='btn btn-secondary m-1' href='?pagina=$i&pesquisado=$_GET[pesquisado]'>$i</a>"; 
                    endif;
                }        
               }


            } 
     if ($total >= 2) 
     {             
     echo '<a href="?pagina=' . $total . '"><button class="btn btn-secondary m-1">Última página</button></a>';
      } 

?>      