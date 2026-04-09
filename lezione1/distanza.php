<?php
#Scrivere uno script PHP che calcoli la distanza tra due punti del piano cartesiano, 
#dati i punti: (x1,y1) (x2,y2)
#usando la formula della distanza ==> d = radice((x2 - x1)^2 + (y2 - y1)^2)

    function distanza_punti(){
        $x1 = 6;
        $x2 = 3;
        $y1 = 4;
        $y2 = 2;

        $distanza = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2)); #pox(base, esponente)

        echo "La distanza tra i punti ($x1, $y1) e ($x2, $y2) è: $distanza";

    }
?>