<?php
#Scrivere uno script PHP che calcoli e stampi la somma dei quadrati dei numeri da 1 a N
#(con il valore di N definito in una variabile).

    function quadrati($n){
        $somma = 0;

        for ($i=0; $i<$n; $i++){
            $somma +=$i*$i;
        }

        echo "somma: $somma";
    }
?>