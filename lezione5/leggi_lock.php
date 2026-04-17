<?php
    $file="accessi.txt";
    $fp=fopen($file,"r");                               //apertura file in lettura
    if (!flock($fp,LOCK_EX|LOCK_NB,$bloccato))          //verifica se il file è bloccato
    {
        if($bloccato)
            echo "Un altro processo ha bloccato il file";
        else 
            echo "Il file non esiste";
    }
    else
    {
        echo "Ho aperto il file. ";
        $conta_accessi=(int)fread($fp,10);              //lettura del file
        echo "Accesso n. ".$conta_accessi;
        fclose($fp);
    }
?>