<?php
#Scrivere uno script PHP che mostri a video i primi 100 numeri interi in ordine crescente.

    function centonumeri(){
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<title>PRIMI 100 NUMERI INTERI</title>";
        echo "</head>";
        echo "<body>";

        echo "<h2>I primi 100 numeri interi</h2>";
        echo "<ul>"; 

        for ($i = 0; $i <= 100; $i++){
            echo "<li>$i</li>";
        }

        echo "</ul>";
        echo "</body>";
        echo "</html>";

    }
?>