<?php
#Scrivere una pagina PHP che stampi il proprio nome 10 volte, separando ogni occorrenza
#con una linea orizzontale verde.

    function ripetizione_nome($nome){

        for ($i = 0; $i < 10; $i ++){
            echo "<h3>$nome</h3>";

            if($i < 9){
                echo "<hr style='border:1px solid green;'>";
            }
        }

    }
?>