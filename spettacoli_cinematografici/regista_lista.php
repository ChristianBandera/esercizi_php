<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dei film di un regista</title>
</head>
<body>
    <?php
        $con = new mysqli("localhost", "root", "", "fiilm");
        if($con ->connect_error){
            echo "Connessione non effettuata: {$con->connect_error}. Codice errore: {$con ->connect_errno}";
            exit();
        }

        $sql = "SELECT DISTINCT regista from film;";
        $ris = $con->query($sql);
        if(!$ris){
            echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
            die("Errore nella connessione al database");
        }

        echo "<h1>Elenco film di un regista</h1>";
        echo "<form action='regista.php' method='post'>";
            echo "<label for='regista'>Scegli il regista</label>";

            echo "<select name='regista' id='regista'>";
            foreach($ris as $riga){
                echo "<option value='{$riga['regista']}'>{$riga['regista']}</option>";
            }
            echo "</select>";

            echo "<button type='submit' name='invia'>Invia</button>";
        echo "</form>";
    ?>
</body>
</html>