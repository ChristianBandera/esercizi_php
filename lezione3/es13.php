<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 13 - Assenze Alunni</title>
</head>
<body>
    <h2>Registro di classe</h2>

    <?php
    // Creo l'array associativo degli alunni.
    // Utilizzo una "matricola" o id come chiave e il "cognome-nome" come valore.
    $alunni = [
        "A01" => "Rossi Mario",
        "A02" => "Bianchi Luca",
        "A03" => "Verdi Giulia",
        "A04" => "Neri Francesca",
        "A05" => "Gialli Antonio"
    ];
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h3>Seleziona gli alunni:</h3>
        <?php
        // Ciclo l'array per generare dinamicamente le checkbox HTML
        foreach ($alunni as $matricola => $nome) {
            // L'attributo name="selezionati[]" crea un array in PHP quando il form viene inviato
            // Il value contiene l'ID (matricola), mentre a video mostro il nome.
            echo "<label>";
            echo "<input type='checkbox' name='selezionati[]' value='" . htmlspecialchars($matricola) . "'> ";
            echo htmlspecialchars($nome);
            echo "</label><br>";
        }
        ?>
        <br>
        <input type="submit" name="invia_alunni" value="Mostra Selezionati">
    </form>

    <?php
    // Postback: Elaborazione dei dati ricevuti
    if (isset($_POST['invia_alunni'])) {
        echo "<hr><h3>Alunni selezionati:</h3>";
        
        // Controllo che l'array $_POST['selezionati'] esista e non sia vuoto
        if (isset($_POST['selezionati']) && !empty($_POST['selezionati'])) {
            echo "<ul>";
            // Scorro l'array delle matricole ricevute dal form
            foreach ($_POST['selezionati'] as $matricola_ricevuta) {
                // Recupero il nome corrispondente dall'array originale usando la chiave
                if (isset($alunni[$matricola_ricevuta])) {
                    $nome_selezionato = $alunni[$matricola_ricevuta];
                    echo "<li>" . htmlspecialchars($nome_selezionato) . "</li>";
                }
            }
            echo "</ul>";
        } else {
            echo "<p>Nessun alunno selezionato.</p>";
        }
    }
    ?>
</body>
</html>