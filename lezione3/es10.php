<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 10 - Sistemi Operativi</title>
</head>
<body>
    <h2>Scelta Sistema Operativo</h2>

    <?php
    // Variabile per capire se dobbiamo mostrare il form principale, il form secondario o il risultato
    $mostra_form_principale = true;
    $mostra_form_secondario = false;
    $mostra_risultato = false;
    $scelta_finale = "";

    // Controllo se è stato inviato il primo form
    if (isset($_POST['invia_principale'])) {
        if (isset($_POST['so_principale'])) {
            $scelta = $_POST['so_principale'];
            // Se l'utente ha scelto "Altro...", nascondo il primo form e mostro il secondo
            if ($scelta == "Altro...") {
                $mostra_form_principale = false;
                $mostra_form_secondario = true;
            } else {
                // Altrimenti, ho già la scelta finale
                $mostra_form_principale = false;
                $scelta_finale = $scelta;
                $mostra_risultato = true;
            }
        }
    }

    // Controllo se è stato inviato il secondo form (quello con "Altro...")
    if (isset($_POST['invia_secondario'])) {
        $mostra_form_principale = false;
        if (isset($_POST['so_secondario'])) {
            $scelta_finale = $_POST['so_secondario'];
        } else {
            $scelta_finale = "Nessuna selezione aggiuntiva";
        }
        $mostra_risultato = true;
    }
    ?>

    <?php if ($mostra_form_principale): ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <fieldset style="width: 200px;">
                <legend>Seleziona il S.O. che preferisci</legend>
                <select name="so_principale" size="7" style="width: 100%;">
                    <option value="Windows XP">Windows XP</option>
                    <option value="Windows 7" selected>Windows 7</option>
                    <option value="Windows 8">Windows 8</option>
                    <option value="Linux Ubuntu">Linux Ubuntu</option>
                    <option value="Linux Fedora">Linux Fedora</option>
                    <option value="MAC OS">MAC OS</option>
                    <option value="Altro...">Altro...</option>
                </select>
                <br><br>
                <input type="reset" value="Cancella">
                <input type="submit" name="invia_principale" value="Invia la scelta">
            </fieldset>
        </form>
    <?php endif; ?>

    <?php if ($mostra_form_secondario): ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <fieldset style="width: 200px;">
                <legend>Ti bastano?</legend>
                <select name="so_secondario" size="4" style="width: 100%;">
                    <option value="Windows 9">Windows 9</option>
                    <option value="Linux Gentoo" selected>Linux Gentoo</option>
                    <option value="Linux Red Hat">Linux Red Hat</option>
                    <option value="Solaris">Solaris</option>
                </select>
                <br><br>
                <input type="button" value="Cancella" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF']; ?>'">
                <input type="submit" name="invia_secondario" value="Invia la scelta">
            </fieldset>
        </form>
    <?php endif; ?>

    <?php if ($mostra_risultato): ?>
        <h3>Dati ricevuti:</h3>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Campo</th>
                <th>Valore Selezionato</th>
            </tr>
            <tr>
                <td>Sistema Operativo</td>
                <td><strong><?php echo htmlspecialchars($scelta_finale); ?></strong></td>
            </tr>
        </table>
        <br>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Torna all'inizio</a>
    <?php endif; ?>
</body>
</html>