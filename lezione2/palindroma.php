<?php
#Scrivere una funzione che verifichi se una parola è palindroma.

    function palindroma($parola){
        
        if($parola === strrev($parola)){
            echo "$parola è una parola palindroma";
        } 
        
        else {
            echo "$parola non è una parola palindroma";
        }
    }

?>