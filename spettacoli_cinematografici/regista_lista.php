<?php
    $username = 'root';
    $password = '';
    $database = 'film';
    $hostname = 'localhost';

    $con = new mysqli($hostname, $username, $password, $database);
    if($con ->connect_error){
        echo "Connessione non efettuata: ".$con->connect_error;
        exit();
    }

    $regista = $_POST['registi'];

    echo "<h1>Film del regista {$regista}</h1>";

    $sql = "SELECT * from film WHERE regista = '$regista'";
    $ris = $con -> query($sql);
    if(!$ris){
        error_log("Errore query: ".$con->connect_error);
        error_log("Codice errore query: ".$con->connect_errno);
        die("Impossibile eseguire la query");
    }

    if($ris->num_rows >0){
        echo "<table border = '1'>";
        echo "<tr><th>Codice</th><th>Titolo</th><th>Regista</th></tr>";
        foreach($ris as $riga){
            echo "<tr><td>{$riga['codice']}</td><td>{$riga['titolo']}</td><td>{$riga['regista']}</td></tr>";
        }
        echo "</table>";
    }else{
        echo "<h1>Non ci sono film del regista {$regista}</h1>";
    }

    $con->close();
?>