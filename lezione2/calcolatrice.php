<?php
#Scrivere una funzione: calcola($a,$b,$operatore)
#che esegua una delle operazioni: + - * /
#Se l’operatore non è valido la funzione deve restituire "errore".

    function calcola($a, $b, $operatore){
        
        switch($operatore){
            case '+':
                $risultato = $a + $b;
                break;

            case '-':
                $risultato = $a - $b;
                break;

            case '*':
                $risultato = $a * $b;
                break;

            case '/':
                if($b == 0){ 
                    echo "errore: divisione per zero";
                }

                $risultato = $a / $b;
                break;
                
            default:
                echo "errore: operatore non valido";
        }

        echo "$a $operatore $b = $risultato";

    }
?>