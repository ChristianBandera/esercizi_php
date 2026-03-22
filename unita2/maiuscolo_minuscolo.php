<?php
#Scrivere una funzione che trasformi una stringa alternando: maiuscola minuscola maiuscola minuscola

    function alternato($stringa){
        $stringaFinale = "";
    
        for($i = 0; $i < strlen($stringa); $i++){ #strlen ==> lunghezza stringa
            if($i % 2 == 0){
                $stringaFinale .= strtoupper($stringa[$i]); 
            } else {
                $stringaFinale .= strtolower($stringa[$i]); 
            }
        }
        
        echo "$stringaFinale";
    }
?>