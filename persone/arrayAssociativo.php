<?php
    $persone = [];

    function aggiungiPersona($nome, $cognome){
        $persone[$cognome] = $nome;
    }

    function mostraPersone($persone){
        reset($persone);    //posiziona all'inizio del vettore
        $temp = current($persone);  //estrazione dell'elemento dove è il puntatore (ora inizio)
        if($temp){          //se l'elemento è presente entra nell'if
            echo "$temp<br>";
            while($temp = next($persone)){  //controlla se ce un elemento successivo
                echo "$temp<br>";
            }
        }else{
            echo "nessuna persona presente";
        }
        echo "<hr>";
    }

    //richiamo funzioni
    if (isset($_POST['aggiungi'])) { 
        if(!empty($_POST["nome"]) && !empty($_POST["cognome"])){
            aggiungiPersona($_POST["cognome"], $_POST["nome"]);
            echo "<h3>Persona aggiunta</h3>";
            echo '<a href="persone.php">Torna alla pagina di inserimento</a>';
        }
    }

    if (isset($_GET['elenco'])) { 
        mostraPersone($persone);
    }
?>