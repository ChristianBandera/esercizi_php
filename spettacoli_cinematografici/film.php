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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco dei film</title>
</head>
<body>
    <h1>Elenco di tutti i film:</h1>
    <br>

    <?php
        $sql = "SELECT * from film";
        $ris = $con -> query($sql);
        
        if(!$ris){
            error_log("Errore query: ".$con->connect_error);
            error_log("Codice errore query: ".$con->connect_errno);
            die("Impossibile eseguire la query");
        }

        foreach($ris as $riga){
            echo "<p>Codice: {$riga['codice']} <p>Titolo: {$riga['titolo']} <p>Regista: {$riga['regista']}<hr>";
        }

        $con->close();
    ?>
</body>
</html>