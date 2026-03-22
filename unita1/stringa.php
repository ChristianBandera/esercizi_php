<?php
#Si considerino:
#● una variabile contenente una stringa a piacere
#● una seconda variabile contenente la stringa “123456789”
#Lo script deve stampare un carattere della prima stringa indicato dalla posizione
#corrispondente al terzo elemento della seconda stringa.
#La stampa deve essere effettuata con una sola istruzione.

    function stringa(){
        $str1 = "esempio";
        $str2 = "123456789";

        echo $str1[$str2[2]-1]; 
        #$str2[2] prende il carattere alla posizione 2
        #si fa -1 perchè io devo prendere il terzo carattere della str1 e quindi 3-1 (posizione 2)
    }

?>