<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 11 - Dati Film</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse;">
            <tr>
                <th colspan="2">Dati film</th>
            </tr>
            <tr>
                <td><label for="regista">Regista:</label></td>
                <td><input type="text" id="regista" name="regista"></td>
            </tr>
            <tr>
                <td><label for="titolo">Titolo:</label></td>
                <td><input type="text" id="titolo" name="titolo"></td>
            </tr>
            <tr>
                <td><label for="nazione">Nazione:</label></td>
                <td><input type="text" id="nazione" name="nazione"></td>
            </tr>
            <tr>
                <td><label for="anno">Anno:</label></td>
                <td><input type="text" id="anno" name="anno"></td>
            </tr>
            <tr>
                <th colspan="2">Genere:</th>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="genere[]" value="Drammatico"> Drammatico<br>
                    <input type="checkbox" name="genere[]" value="Thriller"> Thriller<br>
                    <input type="checkbox" name="genere[]" value="Horror"> Horror<br>
                    <input type="checkbox" name="genere[]" value="Western"> Western<br>
                    <input type="checkbox" name="genere[]" value="Commedia"> Commedia<br>
                    <input type="checkbox" name="genere[]" value="Fantascienza"> Fantascienza<br>
                    <input type="checkbox" name="genere[]" value="Animazione"> Animazione<br>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <input type="submit" name="invia_film" value="Invia">
                    <input type="reset" value="Cancella">
                </td>
            </tr>
        </table>
    </form>

    <?php
    // Controllo se il form è stato inviato
    if (isset($_POST['invia_film'])) {
        echo "<h3>Riepilogo dati inseriti:</h3>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        
        // Recupero i dati di testo (usando htmlspecialchars per sicurezza)
        $regista = htmlspecialchars($_POST['regista']);
        $titolo = htmlspecialchars($_POST['titolo']);
        $nazione = htmlspecialchars($_POST['nazione']);
        $anno = htmlspecialchars($_POST['anno']);

        echo "<tr><td><strong>Regista:</strong></td><td>$regista</td></tr>";
        echo "<tr><td><strong>Titolo:</strong></td><td>$titolo</td></tr>";
        echo "<tr><td><strong>Nazione:</strong></td><td>$nazione</td></tr>";
        echo "<tr><td><strong>Anno:</strong></td><td>$anno</td></tr>";

        // Recupero i generi. Essendo checkbox, controllo prima se esiste (se l'utente non spunta niente, l'array non viene creato)
        echo "<tr><td><strong>Generi scelti:</strong></td><td>";
        if (isset($_POST['genere']) && is_array($_POST['genere'])) {
            // Implode trasforma un array in una stringa separata da virgola
            echo htmlspecialchars(implode(", ", $_POST['genere']));
        } else {
            echo "Nessun genere selezionato";
        }
        echo "</td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>