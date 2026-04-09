<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>10 Nomi Colorati</title>
</head>
<body>

    <h2>Inserisci 10 nomi</h2>

    <form method="POST" action="">
        <?php
        // Generiamo i 10 campi di input usando un ciclo
        for ($i = 1; $i <= 10; $i++) {
            echo '<div class="input-group">';
            echo '<label>Nome ' . $i . ': </label>';
            // NOTA: name="nomi[]" dice a PHP di raggruppare questi input in un array
            echo '<input type="text" name="nomi[]" required>';
            echo '</div>';
        }
        ?>
        <button type="submit">Mostra Nomi Colorati</button>
    </form>

    <hr>

    <?php
    // Controlliamo se il form è stato inviato e se l'array 'nomi' esiste
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomi'])) {
        
        $nomi_inseriti = $_POST['nomi'];
        
        // Definiamo un array con 10 colori diversi (puoi usare nomi, HEX o RGB)
        $colori = [
            'Red', 'Blue', 'Green', 'Orange', 'Purple', 
            'Teal', 'DeepPink', 'Brown', 'Navy', 'Olive'
        ];

        echo "<h2>Risultato:</h2>";
        echo "<ul>";
        
        // Cicliamo l'array dei nomi e applichiamo il colore corrispondente
        foreach ($nomi_inseriti as $indice => $nome) {
            // Prendiamo il colore usando lo stesso indice del nome
            $colore_scelto = $colori[$indice]; 
            
            // Stampiamo il nome con il colore applicato via CSS inline
            echo "<li style='color: $colore_scelto;'>$nome</li>";
        }
        
        echo "</ul>";
    }
    ?>

</body>
</html>