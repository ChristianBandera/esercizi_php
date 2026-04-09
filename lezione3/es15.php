<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 15 - Select Multiple</title>
</head>
<body>
    <h2>Scegli i tuoi frutti preferiti</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <select name="frutti[]" multiple size="6" style="width: 150px;">
            <option value="Mela">Mela</option>
            <option value="Pera">Pera</option>
            <option value="Banana">Banana</option>
            <option value="Fragola">Fragola</option>
            <option value="Ciliegia">Ciliegia</option>
            <option value="Kiwi">Kiwi</option>
        </select>
        <br><br>
        <input type="submit" name="invia_frutta" value="Invia Frutti">
    </form>

    <?php
    // Elaborazione Postback
    if (isset($_POST['invia_frutta'])) {
        echo "<hr>";
        echo "<h3>Risultati:</h3>";

        // Verifico se sono stati passati dati
        if (isset($_POST['frutti']) && !empty($_POST['frutti'])) {
            // 1. Trasferisco i valori contenuti nelle variabili in un array (come richiesto)
            // (In realtà $_POST['frutti'] è GIA' un array, ma lo assegno a una nuova variabile per chiarezza)
            $array_frutti = $_POST['frutti'];

            // 2. Stampo i valori dei campi "in modo leggibile" scorrendo l'array
            echo "<h4>Valori scelti (scorsi con ciclo):</h4>";
            echo "<ul>";
            foreach ($array_frutti as $frutto) {
                echo "<li>" . htmlspecialchars($frutto) . "</li>";
            }
            echo "</ul>";

            // 3. Stampo "l'array" crudo usando print_r per mostrare la sua struttura dati a scopo didattico
            echo "<h4>Struttura dell'Array PHP (stampato con print_r):</h4>";
            echo "<pre>"; // Il tag <pre> formatta il testo preservando spazi e a capo
            print_r($array_frutti);
            echo "</pre>";

        } else {
            echo "<p>Non hai selezionato nessun frutto.</p>";
        }
    }
    ?>
</body>
</html>