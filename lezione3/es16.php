<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 16 - Viaggi</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <fieldset style="width: 300px;">
            <legend>Prenotazione Viaggio</legend>
            
            <label for="destinazione">Scegli la destinazione</label><br>
            <select name="destinazione" id="destinazione" size="6" style="width: 100%;">
                <option value="Francia">Francia</option>
                <option value="Tunisia" selected>Tunisia</option>
                <option value="Marocco">Marocco</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Brasile">Brasile</option>
            </select>
            <br><br>

            <label for="valuta">Scegliere la valuta</label><br>
            <select name="valuta" id="valuta" style="width: 100%;">
                <option value="Euro">Euro</option>
                <option value="Dollaro">Dollaro</option>
                <option value="Franco">Franco</option>
            </select>
            <br><br>

            <table>
                <tr>
                    <td>Immettere il nome:</td>
                    <td><input type="text" name="nome" required></td>
                </tr>
                <tr>
                    <td>Immettere il cognome:</td>
                    <td><input type="text" name="cognome" required></td>
                </tr>
                <tr>
                    <td>Immettere indirizzo:</td>
                    <td><input type="text" name="indirizzo" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="invia_viaggio" value="Invia">
        </fieldset>
    </form>

    <?php
    // Controllo ricezione dati
    if (isset($_POST['invia_viaggio'])) {
        echo "<hr>";
        echo "<h3>Riepilogo Dati Ricevuti</h3>";
        
        // Uso una tabella per incollonnare i dati a video come richiesto nell'immagine
        echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>";
        echo "<tr><th>Campo</th><th>Dato inserito</th></tr>";
        
        // Recupero i dati dal post e li stampo proteggendo da codice malevolo (XSS)
        echo "<tr><td>Destinazione</td><td>" . htmlspecialchars($_POST['destinazione']) . "</td></tr>";
        echo "<tr><td>Valuta</td><td>" . htmlspecialchars($_POST['valuta']) . "</td></tr>";
        echo "<tr><td>Nome</td><td>" . htmlspecialchars($_POST['nome']) . "</td></tr>";
        echo "<tr><td>Cognome</td><td>" . htmlspecialchars($_POST['cognome']) . "</td></tr>";
        echo "<tr><td>Indirizzo</td><td>" . htmlspecialchars($_POST['indirizzo']) . "</td></tr>";
        
        echo "</table>";
    }
    ?>
</body>
</html>