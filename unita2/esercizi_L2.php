<?php

$es = 6;

if($es == 1){
    include "tabella.php";
    stampaNumeri(5, 33);
}

if($es == 2){
    include "campi_input.php";
    creaCampi(5, "Provincia");
}

if($es == 3){
    include "calcolatrice.php";
    calcola(1, 0, "/");
}

if($es == 4){
    include "sottolinea.php";
    frase_sottolineata("come stai?");
}

if($es == 5){
    include "maiuscolo_minuscolo.php";
    alternato("supercalifragilistichespiralidoso");
}

if($es == 6){
    include "palindroma.php";
    palindroma("ciao");
}

