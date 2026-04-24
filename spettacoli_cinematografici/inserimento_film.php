<?php
    if(empty($_POST['invia'])){
        echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
        echo "<table border='1'>";
        echo "<tr><td>Codice</td><td><input type='text' name='codice' required></td></tr>";
        echo "<tr><td>Titolo</td><td><input type='text' name='titolo' required></td></tr>";
        echo "<tr><td>Regista</td><td><input type='text' name='regista' required></td></tr>";
        echo "<tr><td colspan='2' style='text-align: center;'><button type='submit' name='invia' value='invia'>Invia</button></td></tr>";
        echo "</table>";
        echo "</form>";
    }else{
        $username = 'root';
        $password = '';
        $database = 'film';
        $hostname = 'localhost';

        $con = new mysqli($hostname, $username, $password, $database);
        if($con ->connect_error){
            echo "Connessione non efettuata: ".$con->connect_error;
            exit();
        }

        $codice = $_POST['codice'];
        $titolo = $_POST['titolo'];
        $regista = $_POST['regista'];
        
        //controllo codice film
        $sql = "SELECT * from film WHERE codice = '$codice'";
        $ris = $con -> query($sql);
        if(!$ris){
            error_log("Errore query: ".$con->connect_error);
            error_log("Codice errore query: ".$con->connect_errno);
            die("Impossibile eseguire la query");
        }

        if($ris->num_rows != 0){
            die("Codice film già inserito");
        }

        //inserisco film
        $sql = "INSERT INTO film (titolo, codice, regista) VALUES('$titolo', '$codice', '$regista');";
        $ris = $con -> query($sql);
        if(!$ris){
            error_log("Errore query: ".$con->connect_error);
            error_log("Codice errore query: ".$con->connect_errno);
            die("Impossibile eseguire la query");
        }

        echo "<p>Film inserito correttamente!";

        //visualizzazione tabella aggiornata
        $sql = "SELECT * from film;";
        $ris = $con -> query($sql);
        
        if(!$ris){
            error_log("Errore query: ".$con->connect_error);
            error_log("Codice errore query: ".$con->connect_errno);
            die("Impossibile eseguire la query");
        }

        echo "<table border = '1'>";
        echo "<tr><th>Codice</th><th>Titolo</th><th>Regista</th></tr>";
        foreach($ris as $riga){
            echo "<tr><td>{$riga['codice']}</td><td>{$riga['titolo']}</td><td>{$riga['regista']}</td></tr>";
        }
        echo "</table>";
        $con->close();
    }
?>