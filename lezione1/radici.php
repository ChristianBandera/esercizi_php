<?php
#Scrivere uno script PHP che calcoli e stampi le radici di 
#un’equazione di secondo grado ==> ax^2 + bx + c = 0
#utilizzando il delta (i valori di a,b,c siano definiti nelle rispettive variabili).

    function radici(){
        $a = 1;
        $b = -4;
        $c = 2;

        $delta = $b*$b - 4*$a*$c;

        $radice1 = (-$b - sqrt($delta)) / 2*$a;
        $radice2 = (-$b + sqrt($delta)) / 2*$a;

        echo "Equazione: {$a}x^2 + {$b}x + {$c} = 0 <br>";
        echo "Le radici sono: x1 = $radice1 , x2 = $radice2";
    }
?>