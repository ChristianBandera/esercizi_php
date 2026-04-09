<?php
#Realizzare uno script PHP che disegni una scacchiera composta da 20 righe e 20
#colonne. Le caselle devono avere colori alternati (bianco e nero) come in una scacchiera
#reale.

    function scacchiera(){

        $righe = 20;
        $colonne = 20;

        echo "<table border='1'>";

        for ($i = 0; $i < $righe; $i++){
            echo "<tr>";

            for ($j = 0; $j < $colonne; $j++){

                if (($i + $j) % 2 == 0){
                    echo "<td style='background-color:white; width:20px; height:20px;'></td>";
                }
                else{
                    echo "<td style='background-color:black; width:20px; height:20px;'></td>";
                }

            }

            echo "</tr>";
        }

        echo "</table>";
    }

?>