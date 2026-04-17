<?php
    if(!isset($_POST['invia']) && !isset($_POST['cancella'])){
        echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
        echo "<table><tr><td>ID utente da cancellare</td><td><input type='text' name='id'></td></tr>";
        echo "<tr><td><input type='submit' value='Cerca record' name='invia'></td></tr>";
        echo "</table></form>";
    }else{
        $con = new mysqli("localhost", "root", "", "utenti");
        if($con -> errno){
            echo("Connessione non effettuata: ".$con->error." Codice errore: ".$con->errno."<br>");
            exit();
        }

        //verifica se si tratta di ricerca o modifica
        if(!isset($_POST['cancella'])){
            $id = (int) $_POST['id'];
            $sql = "SELECT * FROM users WHERE ID_utente =".$id."; ";
            $ris = $con->query($sql);

            if(!$ris){
                error_log("Errore query: ".$con->error);
                error_log("Codice errore query: ".$con->errno);
                die("Si è verificato un errore");
            }
            if($ris ->num_rows==0){
                echo "Nessun utente trovato";
                echo "<br><a href='".$_SERVER['PHP_SELF']."'>Torna indietro</a>";
            }else{
                echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
                echo "<table border = '1'><tr><th>ID_utente</th><th>Nome utente</th><th>Paswword</th><th>Conta presenze</th></tr>";
                while($riga = $ris-> fetch_assoc()){
                    echo "<tr><td><input type='text' name='id' value = '".$riga["ID_utente"]."'></td>";
                    echo "<td><input type='text' name='nome' value = '".$riga["nome_utente"]."'></td>";
                    echo "<td><input type='password' name='password' value = '".$riga["password"]."'></td>";
                    echo "<td><input type='text' name='pres' value = '".$riga["conta_pres"]."'></td>";
                    echo "</tr>";
                }
                echo "<tr><td><input type='submit' value='Conferma' name= 'cancella'></td></tr>";
                echo "</table></form>";
            }
        }else{
            $id = (int) $_POST['id'];

            $sql= "DELETE FROM users WHERE ID_utente = ".$id."; ";
            $ris = $con ->query($sql);

            if(!$ris){
                error_log("Errore query: ".$con->error);
                error_log("Codice errore query: ".$con->errno);
                die("Si è verificato un errore");
            }
            echo "<a href='".$_SERVER['PHP_SELF']."'>Cancellazione effettuato</a>";
            
            $con -> close();
        }
    }
?>