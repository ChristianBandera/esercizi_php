<?php
    if(empty($_POST['invia'])){
        echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
        echo "<table border = '1'><tr><td>Nome utente</td><td><input type='text' name='nome'></td></tr>";
        echo "<tr><td>Password</td><td><input type='password' name='pwd'</td></tr>";
        echo "<tr><td><input type='submit' value='Aggiungi record' name='invia'></td></tr>";
        echo "</table></form>";
    }else{
        $con = new mysqli("localhost", "root", "", "utenti");
        if($con -> errno){
            echo("Connessione non effettuata: ".$con->error." Codice errore: ".$con->errno."<br>");
            exit();
        }
        $conta =0;
        $nome = $_POST['nome'];
        $pwd = $_POST['pwd'];

        //query
        $sql = "INSERT INTO users(nome_utente, password, conta_pres)";
        $sql.= " VALUES('".$nome."', '".$pwd."', ".$conta.");";
        $ris = $con->query($sql);

        if(!$ris){
            error_log("Errore query: ".$con->error);
            error_log("Codice errore query: ".$con->errno);
            die("Si è verificato un errore");
        }

        //visualizzazione tabella
        $sql = "SELECT ID_utente, nome_utente, password, conta_pres FROM users";
        $ris = $con->query($sql);
        if(!$ris){
            error_log("Errore query: ".$con->error);
            error_log("Codice errore query: ".$con->errno);
            die("Si è verificato un errore");
        }

        //tabella database aggiornata
        echo "<table border = '1'><tr><th>ID_utente</th><th>Nome utente</th><th>Paswword</th><th>Conta presenze</th></tr>";
        //il metodo fetch_assoc() memorizza i dati di una tupla del DB
        while($riga = $ris->fetch_assoc()){
            echo "<tr><td>".$riga["ID_utente"]."</td>";
            echo "<td>".$riga["nome_utente"]."</td>";
            echo "<td>".$riga["password"]."</td>";
            echo "<td>".$riga["conta_pres"]."</td>";
            echo "</tr>";
        }

        echo "</table>";
        $con ->close();
    }
?>