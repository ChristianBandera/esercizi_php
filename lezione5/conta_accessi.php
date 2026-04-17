<?php
    $nomefile="accessi.txt";
    if (file_exists($nomefile)) {                           //verifica esistenza del file
        $idfile=fopen($nomefile,"r+");                      // se esiste viene aperto in lettura e scrittura
        if (!$idfile) die ($msg="il file $nomefile non è stato aperto <br>");
        $conta_accessi=(int) fread($idfile,10);             //Legge 10 caratteri:casting obbligatorio
        fclose($idfile);
    }else{
        $idfile=fopen($nomefile,"w+");                      //se il file non esiste viene creato (ridondante, a scopo didattico)
        if (!$idfile) die ($msg="il file $nomefile non è stato aperto <br>");
        $conta_accessi=0;                                   //Primo accesso: inizializzazione contatore
        fclose($idfile);                                    //solo se creato il file (ridondante)
    }
    $conta_accessi++;
    $idfile=fopen($nomefile,"w+");                          //apertura in lettura/scrittura distruttiva
    if (!$idfile) die ($msg="il file $nomefile non è stato aperto <br>");
    fwrite($idfile,$conta_accessi);                         //scrittura contatore accessi nel file 
    fclose($idfile);
    echo($conta_accessi);                                   //visualizzazione contatore accessi
?>
