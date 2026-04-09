<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 14 - Textarea Array</title>
</head>
<body>
    <h2>Inserisci un elenco di nomi</h2>
    <p>Inserisci un nome per riga.</p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <textarea name="elenco_nomi" rows="8" cols="30" placeholder="Mario&#10;Luigi&#10;Giovanna"></textarea>
        <br><br>
        <input type="submit" name="elabora_testo" value="Trasforma in stringa">
    </form>

    <?php
    // Postback
    if (isset($_POST['elabora_testo'])) {
        $testo_ricevuto = $_POST['elenco_nomi'];
        
        // Trim per rimuovere spazi o "a capo" vuoti all'inizio e alla fine
        $testo_pulito = trim($testo_ricevuto);

        if (!empty($testo_pulito)) {
            // Un testo in una textarea divide le righe con i caratteri di a capo (\r\n o \n).
            // Uso str_replace per sostituire gli a capo con una virgola e uno spazio.
            // Sostituisco prima \r\n (Windows), poi \n (Linux/Mac) per sicurezza.
            $stringa_finale = str_replace(array("\r\n", "\n"), ", ", $testo_pulito);
            
            echo "<hr>";
            echo "<h3>Stringa Risultante:</h3>";
            // Stampo a video la stringa trasformata
            echo "<p>" . htmlspecialchars($stringa_finale) . "</p>";
        } else {
            echo "<p style='color:red;'>Hai inviato un testo vuoto.</p>";
        }
    }
    ?>
</body>
</html>