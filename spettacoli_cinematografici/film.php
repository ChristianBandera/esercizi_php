<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutti i film</title>
</head>
<body>
    <h1>Elenco di tutti i film</h1>

    <?php
        $hostname = "localhost";
        $username = "root";
        $database = "fiilm";
        $password = "";

        $con = new mysqli($hostname, $username, $password, $database);
        if($con ->connect_error){
            echo "Connessione non effettuata: {$con ->connect_errno}. Codice errore: {$con ->connect_errno}";
            exit();
        }

        $sql = "SELECT * from film";
        $ris = $con->query($sql);
        if(!$ris){
            echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
            die("Errore nella connessione al database");
        }

        foreach($ris as $riga){
            echo "Titolo: {$riga['titolo']}<br> Codice: {$riga['codice']}<br> Regista: {$riga['regista']}<br><hr>";
        }

        $con->close();
    ?>
</body>
</html>