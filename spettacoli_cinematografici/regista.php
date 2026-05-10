<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco film di un regista</title>
</head>
<body>
    <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "fiilm";

        $con = new mysqli($hostname, $username, $password, $database);
        if($con ->connect_error){
            echo "Connessione non effettuata: {$con->connect_error}. Codice errore: {$con ->connect_errno}";
            exit();
        }

        $regista = $_POST['regista'];
        echo "<h2>{$regista}</h2>";

        $sql = "SELECT * from film WHERE regista = '$regista';";
        $ris = $con -> query($sql);
        if(!$ris){
            echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
            die("Errore nella connessione al database");
        }

        if($ris->num_rows > 0){
            echo "<table border='1'>";
            echo "<tr><th>Titolo</th><th>Codice</th><th>Regista</th></tr>";
            foreach($ris as $riga){
                echo "<tr><td>{$riga['titolo']}</td><td>{$riga['codice']}</td><td>{$riga['regista']}</td></tr>";
            }
            echo "</table>";
        }else{
            die("Nessun film presente per il regista $regista");
        }

        $con ->close();
    ?>
</body>
</html>