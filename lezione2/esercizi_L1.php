<?php

$es = 11;

if($es == 1){
    include "tabella.php";
    tabella();
}

if($es == 2){
    include "scacchiera.php";
    scacchiera();
}

if($es == 3){
    include "squadre.php";
    tabella_squadre();
}

if($es == 4){
    include "100numeri.php";
    centonumeri();
}

if($es == 5){
    include "stringa.php";
    stringa();
}

if($es == 6){
    include "secondi.php";
    secondi();
}

if($es == 7){
    include "quadrati.php";
    quadrati(6);
}

if($es == 8){
    include "distanza.php";
    distanza_punti();
}

if($es == 9){
    include "radici.php";
    radici();
}

if($es == 10){
    include "nome.php";
    ripetizione_nome("Noemi");
}

if($es == 11){
    include "nomi.php";
    nomi_colori();
}

?>