<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 12 - Calciatori</title>
</head>
<body>
    <h2>Gestione Squadra</h2>

    <?php
    // 1. Creo l'array associativo come richiesto: "cognome-nome" => "numero_maglia"
    $calciatori = [
        "Ronaldo Cristiano" => 7,
        "Messi Lionel" => 10,
        "Buffon Gianluigi" => 1,
        "Maldini Paolo" => 3,
        "Zanetti Javier" => 4,
        "Totti Francesco" => 10, // Più giocatori possono avere lo stesso numero
        "Del Piero Alessandro" => 10
    ];

    // Imposto l'ordinamento di default (per cognome)
    $tipo_ordinamento = "cognome";

    // Se l'utente ha inviato il modulo, aggiorno il tipo di ordinamento
    if (isset($_POST['ordina'])) {
        $tipo_ordinamento = $_POST['ordinamento'];
    }

    // Applico l'ordinamento all'array in base alla scelta
    if ($tipo_ordinamento == "maglia") {
        // asort ordina per VALORE (numero maglia) mantenendo l'associazione con le chiavi
        asort($calciatori);
    } else {
        // ksort ordina per CHIAVE (cognome-nome) alfabeticamente
        ksort($calciatori);
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Ordina i giocatori per:</label>
        <select name="ordinamento">
            <option value="cognome" <?php if($tipo_ordinamento=="cognome") echo "selected"; ?>>Cognome/Nome</option>
            <option value="maglia" <?php if($tipo_ordinamento=="maglia") echo "selected"; ?>>Numero di Maglia</option>
        </select>
        <input type="submit" name="ordina" value="Applica">
    </form>

    <hr>

    <h3>Elenco Calciatori (ordinato per <?php echo $tipo_ordinamento; ?>)</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Cognome e Nome</th>
            <th>Numero Maglia</th>
        </tr>
        <?php
        // Ciclo l'array associativo ordinato per stampare le righe
        foreach ($calciatori as $nome => $numero) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($nome) . "</td>";
            echo "<td>" . $numero . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>