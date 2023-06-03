<?php 

    require "validador_de_acessos.php"; 
    $x = 0;

    // DEPURAÇÃO
    // print $total;


 
if(isset($_GET["pagina"])):
    if ($_GET["pagina"] > $total)
    {?>
        <script>
            var url_atual = window.location.href;
            console.log(typeof url_atual);

            url_atual = url_atual.replace('pagina=<?= $_GET["pagina"]; ?>','');
            url_atual += 'pagina=<?= $total; ?>';
            
            location.href = url_atual;
            
       </script>
    <?php } else if($_GET["pagina"] < 0) {
           ?>
       <script>
       
            var url_atual = window.location.href;
            console.log(typeof url_atual);

            url_atual = url_atual.replace('pagina=<?= $_GET["pagina"]; ?>','');
            url_atual += 'pagina=1';
            
            location.href = url_atual;

       </script>
       <?php 
      }
endif; 

    if(isset($_GET["pesquisado"]))
    {
        if (!empty($_GET["pesquisado"])) {
            echo '<a href="?pagina=1&pesquisado=' . $_GET["pesquisado"] . '"><button class="btn btn-secondary m-1">Primeira página</button>';            
        } else {
            echo '<a href="?pagina=1"><button class="btn btn-secondary m-1">Última página</button></a>';
        }
    }else 
    {
        echo '<a href="?pagina=1"><button class="btn btn-secondary m-1">Última página</button></a>';
    }
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
        if (isset($_GET["pesquisado"])) 
        {        
            if(!empty($_GET["pesquisado"])){

            echo '<a href="?pagina=' . $total . '&pesquisado=' . $_GET["pesquisado"] . '"><button class="btn btn-secondary m-1">Última página</button></a>';
            } else {
                echo '<a href="?pagina=' . $total . '"><button class="btn btn-secondary m-1">Última página</button></a>';
            }
        } else {
            echo '<a href="?pagina=' . $total . '"><button class="btn btn-secondary m-1">Última página</button></a>';
        }

      } 

?>      
