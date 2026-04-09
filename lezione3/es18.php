<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 18 - Analisi Stringa</title>
</head>
<body>
    <h2>Analizzatore di Stringhe</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Inserisci una frase o parola lunga:</label><br>
        <input type="text" name="stringa_input" size="50" required><br><br>
        
        <label>Inserisci un carattere specifico da cercare:</label><br>
        <input type="text" name="carattere_input" maxlength="1" size="5" required><br><br>
        
        <input type="submit" name="analizza" value="Analizza Testo">
    </form>

    <?php
    if (isset($_POST['analizza'])) {
        // Recupero i dati
        $stringa = $_POST['stringa_input'];
        $carattere = $_POST['carattere_input'];

        echo "<hr><h3>Risultati dell'analisi per: <i>" . htmlspecialchars($stringa) . "</i></h3>";

        // Inizializzo contatori
        $vocali = 0;
        $consonanti = 0;
        $numeri = 0;
        
        // Array per controllare facilmente le vocali
        $lista_vocali = ['a', 'e', 'i', 'o', 'u'];

        // Converto la stringa in minuscolo per fare i controlli sulle lettere in modo più facile
        $stringa_lower = strtolower($stringa);

        // Ciclo ogni singolo carattere della stringa
        for ($i = 0; $i < strlen($stringa_lower); $i++) {
            $char = $stringa_lower[$i]; // Estraggo il singolo carattere alla posizione $i

            // 1. Conto Vocali e Consonanti
            // Verifico se è una lettera alfabetica
            if (ctype_alpha($char)) {
                if (in_array($char, $lista_vocali)) {
                    $vocali++;
                } else {
                    $consonanti++; // Se è lettera e non è vocale, è consonante
                }
            }
            
            // 2. Conto i caratteri di tipo numerico
            if (is_numeric($char)) {
                $numeri++;
            }
        }

        // 3. Conto quante volte appare il carattere scelto dall'utente
        // substr_count è una funzione PHP perfetta per contare occorrenze
        $occorrenze_carattere = substr_count($stringa, $carattere);

        // 4. Numero di parole (Considerando spazi o punteggiatura come separatori)
        // str_word_count conta automaticamente le parole escludendo la punteggiatura
        $numero_parole = str_word_count($stringa);

        // STAMPA RISULTATI (Punti 1, 2, 3, 5)
        echo "<ul>";
        echo "<li>Numero di vocali: <strong>$vocali</strong></li>";
        echo "<li>Numero di consonanti: <strong>$consonanti</strong></li>";
        echo "<li>Il carattere '<strong>" . htmlspecialchars($carattere) . "</strong>' appare: <strong>$occorrenze_carattere</strong> volte.</li>";
        echo "<li>Numero di caratteri numerici: <strong>$numeri</strong></li>";
        echo "<li>Numero di parole: <strong>$numero_parole</strong></li>";
        echo "</ul>";

        // 5. Frequenza con cui ogni carattere appare nella stringa
        echo "<h4>Frequenza di ogni carattere:</h4>";
        // La funzione count_chars($str, 1) restituisce un array associativo dove
        // la CHIAVE è il codice ASCII del carattere e il VALORE è quante volte compare.
        $frequenze = count_chars($stringa, 1);
        
        echo "<table border='1' cellpadding='3' cellspacing='0'>";
        echo "<tr><th>Carattere</th><th>Volte presente</th></tr>";
        foreach ($frequenze as $ascii => $volte) {
            // chr($ascii) trasforma il codice ASCII di nuovo nella lettera/simbolo leggibile
            $carattere_reale = chr($ascii);
            // Se è uno spazio vuoto, lo scrivo esplicitamente per non far vedere una cella vuota
            if ($carattere_reale == ' ') { 
                $carattere_reale = "[spazio]"; 
            }
            echo "<tr><td style='text-align:center;'>". htmlspecialchars($carattere_reale) ."</td><td style='text-align:center;'>$volte</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>