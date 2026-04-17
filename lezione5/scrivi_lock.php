<?php
    $file="accessi.txt";
    if(file_exists($file)) {                    //verifica esistenza del file
        $fp=fopen($file,"r");                   //Apertura file in lettura--> Meglio $fp=fopen($file,"r+");
        if(!$fp) die("Il file $file non è stato aperto<br>");
        flock($fp,LOCK_SH);                     //Imposta un lock condiviso che consente 
                                                //letture concorrenti ma impedisce scritture --> A questo punto LOCK_EX
        $conta_accessi=(int) fread($fp,10);     //Lettura dal file
        echo "Accesso n.".$conta_accessi;
        flock($fp,LOCK_UN);                     //Sblocca il file--> Lo teniamo in EX 
        fclose($fp);                            //-->Non chiudiamo il file
        $conta_accessi++;
        $fp=fopen($file,"r+");                  //-->il file è già aperto se facciamo le correzioni precedenti
        if(!$fp) die("Il file $file non è stato aperto<br>");//-->in questo caso è inutile
        flock($fp,LOCK_EX);                     //Imposta un lock esclusivo--> è già esclusivo
        fwrite($fp,$conta_accessi);
        echo "<br><b> FILE BLOCCATO </b>";
        echo str_repeat(" ",4096);              //riempie il buffer di un quantitativo di dati minimo perchè siano inviati
        ob_flush();                             //svuota il buffer PHP
        flush();                                //svuota il buffer del webserver
        sleep(10);
        flock($fp,LOCK_UN);
        fclose($fp);  
        echo "<br><b> FILE SBLOCCATO </b>";        
    } 
?>        

    