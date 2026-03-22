<?php
#Creare una tabella di 20 righe e 20 colonne con sfondo blu e bordo di spessore 3.
#All’interno delle celle deve essere visualizzato un numero che aumenta di 3 ogni volta (3,
#6, 9, 12, ...).

    function tabella (){
        echo "<table border='3' style='background-color: blue;'> <tr>";
        $colonne = 20;
        $righe = 20;
        $cont = 0;

        for ($i=0; $i<($righe*$colonne); $i++){
            $numero = ($i + 1) * 3;
            echo "<td>$numero</td>";

            $cont ++;

            if($cont == $colonne){
                echo "</tr><tr>";
                $cont = 0;
            }

        }

        echo "</tr></table>";
    }
 
?>