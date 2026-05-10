<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento film</title>
</head>
<body>
    <?php
        if(!isset($_POST['invia'])){
            echo "<form action='{$_SERVER["PHP_SELF"]}' method='post'>";
            echo "<table border='1'>";
            echo "<tr><td>Titolo</td><td><input type='text' maxlength='20' name='titolo' required></td></tr>";
            echo "<tr><td>Codice</td><td><input type='text' maxlength='5' name='codice' required></td></tr>";
            echo "<tr><td>Regista</td><td><input type='text' maxlength='20' name='regista' required></td></tr>";
            echo "<tr><td>Invia</td><td><button type='submit' name ='invia'>Invia</button></td></tr>";
            
            echo "</table>";
        }else{
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "fiilm";

            $con = new mysqli($hostname, $username, $password, $database);
            if($con ->connect_error){
                echo "Connessione non effettuata: {$con->connect_error}. Codice errore: {$con ->connect_errno}";
                exit();
            }

            $titolo = $_POST['titolo'];
            $codice = $_POST['codice'];
            $regista = $_POST['regista'];

            //controllo primary key

            $sql = "SELECT * from film WHERE codice = '$codice'; ";
            $ris = $con->query($sql);
            if(!$ris){
                echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
                die("Errore nella connessione al database");
            }

            if($ris->num_rows >0){
                die("Codice film gia presente");
            }
            //aggiunta film

            $sql = "INSERT INTO film(titolo, codice, regista) VALUES('$titolo', '$codice', '$regista');";
            $ris = $con->query($sql);
            if(!$ris){
                echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
                die("Errore nella connessione al database");
            }
            echo "<br><h3>Film inserito correttamente</h3>";

            //visualizzo film

            $sql = "SELECT * from film";
            $ris = $con->query($sql);
            if(!$ris){
                echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
                die("Errore nella connessione al database");
            }

            echo "<table border= '1'>";
            echo "<tr><th>Titolo</th><th>Codice</th><th>Film</th></tr>";
            foreach($ris as $riga){
                echo "<tr><td>{$riga['titolo']}</td><td>{$riga['codice']}</td><td>{$riga['regista']}</td></tr>";
            }
            echo "</table>";

            $con->close();
        }
    ?>
</body>
</html>