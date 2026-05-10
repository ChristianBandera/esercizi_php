<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento attore</title>
</head>
<body>
    <?php
        if(!isset($_POST['invia'])){
            echo "<form action='{$_SERVER["PHP_SELF"]}' method='post'>";
            echo "<table border='1'>";
            echo "<tr><td>Nome</td><td><input type='text' maxlength='20' name='nome' required></td></tr>";
            echo "<tr><td>Codice</td><td><input type='number' maxlength='99999999999' name='codice' required></td></tr>";
            echo "<tr><td>Anno nascita</td><td><input type='date'  name='annoN' required></td></tr>";
            echo "<tr><td>Nazionalita</td><td><input type='text' maxlength='3' name='nazionalita' required></td></tr>";
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

            $nome = $_POST['nome'];
            $codice = $_POST['codice'];
            $annoN = date('Y', strtotime($_POST['annoN']));
            $nazionalita = $_POST['nazionalita'];

            //controllo primary key

            $sql = "SELECT * from attori WHERE codice = '$codice'; ";
            $ris = $con->query($sql);
            if(!$ris){
                echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
                die("Errore nella connessione al database");
            }

            if($ris->num_rows >0){
                die("Codice attore gia presente");
            }
            //aggiunta film

            $sql = "INSERT INTO attori(nome, codice, annoN, nazionalita) VALUES('$nome', '$codice', '$annoN', '$nazionalita');";
            $ris = $con->query($sql);
            if(!$ris){
                echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
                die("Errore nella connessione al database");
            }
            echo "<br><h3>Attore inserito correttamente</h3>";

            //visualizzo film

            $sql = "SELECT * from attori";
            $ris = $con->query($sql);
            if(!$ris){
                echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
                die("Errore nella connessione al database");
            }

            echo "<table border= '1'>";
            echo "<tr><th>Nome</th><th>Codice</th><th>Anno Nascita</th><th>Nazionalita</th></tr>";
            foreach($ris as $riga){
                echo "<tr><td>{$riga['nome']}</td><td>{$riga['codice']}</td><td>{$riga['annoN']}</td><td>{$riga['nazionalita']}</td></tr>";
            }
            echo "</table>";

            $con->close();
        }
    ?>
</body>
</html>