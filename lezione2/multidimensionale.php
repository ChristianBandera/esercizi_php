<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array multidimensionale</title>

    <style>
        #tabellaNomi, #tabellaNomi th, #tabellaNomi td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
   <form method="POST">
        Quanti nomi vuoi inserire? 
        <input type="number" name="numero" min="1" required>
        <button type="submit">Crea le caselle</button>
    </form>

    <form method="POST" action="">
        <?php 
            if(isset($_POST['numero'])){
                $numeroNomi = $_POST["numero"];
                for($i=0; $i<$numeroNomi; $i++){
                    echo '<div class="input-group">';
                    echo '<label>Nome ' . $i . ': </label>';
                    #Quando l'utente preme "Invia", il browser spedirà i dati in questo formato:
                    #persone[1][nome] = "Mario"
                    echo '<input type="text" name="persone[' . $i . '][nome]" required>';

                    echo '<label>Cognome ' . $i . ': </label>';
                    echo '<input type="text" name="persone[' . $i . '][cognome]" required>';

                    echo '<label>Età ' . $i . ': </label>';
                    echo '<input type="text" name="persone[' . $i . '][eta]" required>'; 

                    echo "<hr>";
                    echo '</div>';
                }
            }
        ?>
        <button type="submit">Mostra Tabella Nomi</button>
    </form>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["persone"])){
            $persone = $_POST["persone"];

            echo "<br>";
            echo "<br>";

            echo '<table id="tabellaNomi">';
            echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Cognome</th>";
            echo "<th>Eta</th>";
            echo "</tr>";
            
            foreach($persone as $persona){
                $nome = $persona["nome"];
                $cognome = $persona["cognome"];
                $eta = $persona["eta"];

                echo "<tr>";
                echo "<td>$nome</td>";
                echo "<td>$cognome</td>";
                echo "<td>$eta</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>