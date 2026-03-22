<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisi Stringa</title>
</head>
<body>
    <form action="" method="POST">
    <label for="testo_frase">Inserisci la tua frase:</label>
    <input type="text" name="frase" placeholder="Scrivi qui la tua frase." required>
    <button type="submit">Invia Frase</button>

    <?php  
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $frase = $_POST["frase"];
            $lunghezza = strlen($frase);

            for($i=0; $i<$lunghezza; $i++){
                if($frase[$i] == "a"){
                    
                }
            }
        }
    ?>
</form>
</body>
</html>