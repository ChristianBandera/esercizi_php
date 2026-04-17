<?php
    //creazione oggetto mysqli per realizzare la connessione
    $con = new mysqli("localhost", "root", "", "utenti");
    if($con -> errno){
        echo "Connessione non effettuata: ".$con -> error." Codice errore: ".$con -> errno."<br>";
        exit();
    }

    //query
    $sql = "SELECT ID_utente, nome_utente, password, conta_pres FROM users";
    $ris = $con-> query($sql);
    if(!$ris){
        error_log("Errore query: ".$con->error); //per lo sviluppatore
        error_log("Codice Errore query: ".$con->errno); //per lo sviluppatore
        die("Si è verificato un errore"); //per l'utente
    }

    echo "<table><tr><th>ID_utente</th><th>Nome utente</th><th>Password</th><th>Conta presenze</th></tr>";
    foreach($ris as $riga){
        echo "<tr><td>".$riga["ID_utente"]."</td>";
        echo "<td>".$riga["nome_utente"]."</td>";
        echo "<td>".$riga["password"]."</td>";
        echo "<td>".$riga["conta_pres"]."</td>";
        echo "</td>";
    }

    echo "</table>";
    $con->close();
?>