<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persone</title>
</head>
<body>
    <form method="POST" action="arrayAssociativo.php">
    <label for="nome">Inserisci nome:</label>
    <input type="text" name="nome" id="nome">

    <label for="cognome">Inserisci cognome:</label>
    <input type="text" name="cognome" id="cognome">

    <button type="submit" name="aggiungi">Aggiungi persona</button>
    
    </form>

    <form method="GET" action="arrayAssociativo.php">    
    <button type="submit" name="elenco">Mostra elenco persone</button>
    </form>
</body>
</html>