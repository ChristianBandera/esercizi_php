<?php
    if(empty($_POST['invia'])){
        echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
        echo "<table border='1'>";
        echo "<tr><td>Anno nascita</td><td><input type='date' name='anno' required></td></tr>";
        echo "<tr><td>Nazionalita</td><td><input type='text' name='nazionalita' required></td></tr>";
        echo "<tr><td>Nome</td><td><input type='text' name='nome' required></td></tr>";
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

        $nazionalita = $_POST['nazionalita'];
        $anno = $_POST['anno'];
        $nome = $_POST['nome'];

        $anno = date('Y');

        //inserisco film
        $sql = "INSERT INTO attori (nome, annoN, nazionalita) 
                VALUES('$nome', '$anno', '$nazionalita');";
        $ris = $con -> query($sql);
        if(!$ris){
            error_log("Errore query: ".$con->connect_error);
            error_log("Codice errore query: ".$con->connect_errno);
            die("Impossibile eseguire la query");
        }

        echo "<p>Attore inserito correttamente!";
        echo "<br>";

        //visualizzazione tabella aggiornata
        $sql = "SELECT * from attori;";
        $ris = $con -> query($sql);
        
        if(!$ris){
            error_log("Errore query: ".$con->connect_error);
            error_log("Codice errore query: ".$con->connect_errno);
            die("Impossibile eseguire la query");
        }

        echo "<table border = '1'>";
        echo "<tr><th>Nome</th><th>Codice</th><th>Anno nascita</th><th>Nazionalita</th></tr>";
        foreach($ris as $riga){
            echo "<tr><td>{$riga['nome']}</td><td>{$riga['codice']}</td><td>{$riga['annoN']}</td><td>{$riga['nazionalita']}</td></tr>";
        }
        echo "</table>";
        $con->close();
    }
?>