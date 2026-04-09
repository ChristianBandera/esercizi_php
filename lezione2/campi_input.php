<?php
#Scrivere una funzione: creaCampi($n, $nome) che generi N campi di input HTML.
#Il nome dei campi deve essere formato da: nome + numero progressivo 
#Esempio: Provincia1 Provincia2

    function creaCampi($nCampi, $nome){
        for ($i=1; $i<=$nCampi; $i++){
            #casella di testo i cui l'utente può scrivere
            #il . serve per concatenare le stringhe 
            #placeholder ==> testo dentro al campo
            echo "<input type='text' name='".$nome.$i."' placeholder='".$nome.$i."'><br>";       
        }
    }

?>

