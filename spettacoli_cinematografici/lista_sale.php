<!DOCTYPE html>
<html>
<head>
    <title>Gestione Sale</title>
</head>
<body>

    <?php
    $con = new mysqli("localhost", "root", "", "fiilm");
    if($con ->connect_error){
        echo "Connessione non effettuata: {$con->connect_error}. Codice errore: {$con ->connect_errno}";
        exit();
    }

    // elenco cliccabile
    echo "<h1>Scegli una Sala</h1>";
    $ris = $con->query("SELECT * FROM sale");
    if(!$ris){
        echo "Errore nella query: {$con ->connect_error}. Codice errore query: {$con->connect_errno}";
        die("Errore nella connessione al database");
    }

    
    echo "<ul>";
    foreach($ris as $riga) {
        // Ogni nome è un link che ricarica la pagina passando il codice via GET
        //il ? serve a dire che sto inviando delle variabili nell'url
        echo "<li><a href='?sala={$riga['codice']}'>{$riga['nome']}</a></li>";
    }
    echo "</ul><hr>";

    // SE È STATA INVIATA UNA MODIFICA (Tramite il form sotto, che usa POST)
    if (isset($_POST['nuovi_posti'])) {
        $cod = $_POST['cod_sala'];
        $posti = $_POST['nuovi_posti'];
        $sql = "UPDATE sale SET posti = $posti WHERE codice = '$cod'";
        $con->query($sql);
        echo "<p>Posti aggiornati!</p>";
    }

    // SE UNA SALA È STATA CLICCATA (Tramite il link sopra, che usa GET)
    // Usiamo 'sala' perché nel link abbiamo scritto ?sala=
    if (isset($_GET['sala'])) {
        $cod_scelto = $_GET['sala'];
        
        // Recupero i dati della sala selezionata
        $sql= "SELECT * FROM sale WHERE codice = '$cod_scelto'";
        $ris = $con->query($sql);
        $riga = $ris->fetch_assoc();

        echo "<h2>Sala: {$riga['nome']} </h2>";
        echo "Posti attuali: {$riga['posti']} <br><br>";

        // Form per la modifica (qui usiamo POST che è più sicuro per le modifiche)
        echo "<form action='?sala=$cod_scelto' method='POST'>";
        echo "Inserisci nuovi posti: ";
        echo "<input type='hidden' name='cod_sala' value='$cod_scelto'>";
        echo "<input type='number' name='nuovi_posti' value='{$riga['posti']}'> ";
        echo "<input type='submit' value='Aggiorna'>";
        echo "</form>";
    }

    $con->close();
    ?>

</body>
</html>