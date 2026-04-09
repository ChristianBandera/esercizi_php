<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 17 - Animali e Versi</title>
</head>
<body>
    <h2>Inserisci 10 animali e i loro versi</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table border="0">
            <tr>
                <th>Animale</th>
                <th>Verso</th>
            </tr>
            <?php
            // Genero 10 righe di input HTML tramite un ciclo for PHP per non scriverle a mano
            for ($i = 1; $i <= 10; $i++) {
                echo "<tr>";
                // Metto le parentesi quadre [] per farli diventare array numerici in PHP
                echo "<td>$i. <input type='text' name='animali[]' placeholder='Es: Cane'></td>";
                echo "<td><input type='text' name='versi[]' placeholder='Es: Abbaia'></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <input type="submit" name="invia_animali" value="Salva e Ordina">
    </form>

    <?php
    if (isset($_POST['invia_animali'])) {
        $animali_ricevuti = $_POST['animali'];
        $versi_ricevuti = $_POST['versi'];
        
        $array_associativo = array();

        // Ciclo su tutti i 10 elementi ricevuti
        for ($i = 0; $i < 10; $i++) {
            $animale = trim($animali_ricevuti[$i]);
            $verso = trim($versi_ricevuti[$i]);
            
            // Aggiungo all'array solo se l'utente ha compilato almeno l'animale
            if (!empty($animale)) {
                // Imposto come chiave il nome dell'animale e come valore il suo verso
                $array_associativo[$animale] = $verso;
            }
        }

        // Se l'array ha elementi, lo ordino e lo stampo
        if (count($array_associativo) > 0) {
            // ksort ordina un array associativo in base alle sue CHIAVI (nomi degli animali) alfabeticamente
            ksort($array_associativo);

            echo "<hr>";
            echo "<h3>Elenco animali ordinato alfabeticamente:</h3>";
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            echo "<tr><th>Animale</th><th>Verso</th></tr>";
            
            // Ciclo foreach sull'array associativo ordinato
            foreach ($array_associativo as $animale => $verso) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($animale) . "</td>";
                echo "<td>" . htmlspecialchars($verso) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color:red;'>Non hai inserito nessun animale valido.</p>";
        }
    }
    ?>
</body>
</html>