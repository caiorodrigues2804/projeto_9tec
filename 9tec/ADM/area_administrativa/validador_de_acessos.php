<?php 


         if(!isset($_SESSION["autenticao"]))
            {
                $_SESSION["autenticao"]= 'FALSO';
                $_SESSION["dados"] =  'FALSO';
                header("Location: ../login/index.php?acesso=1");
                exit();
            }
            if ($_SESSION["autenticao"] == 'FALSO') 
            {   
                $_SESSION["autenticao"]= 'FALSO';
                $_SESSION["dados"] =  'FALSO';
                header("Location: ../login/index.php?acesso=1");
                exit();
            }
?>