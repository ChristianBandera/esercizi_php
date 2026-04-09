<?php
#Scrivere uno script PHP che calcoli quanti secondi sono trascorsi tra due date
#specificate nello script.

    function secondi(){
        $data1 = "2026-03-01 12:00:00"; 
        $data2 = "2026-03-07 15:30:00"; 

        //strtotime converte le date in timestamp (secondi dal 1 gennaio 1970)
        $s1 = strtotime($data1);
        $s2 = strtotime($data2);

        $secondi = $s2 - $s1; #bisogna fare la data che viene dopo - quella prima in modo da avere i secondi positivi

        echo "Tra $data1 e $data2 sono trascorsi $secondi secondi.";

    }
?>