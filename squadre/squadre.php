<?PHP

    //1. ricerca di una squadra data la chiave
    function squadra_per_nome($vet,$squadra){
        if(isset($vet[$squadra])) {     //Se la chiave esiste stampa info squadra
            //ciclo con un foreach in corrispondenza della
            //chiave e visualizzo a sua volta chiave e valori

            foreach($vet[$squadra] as $key=>$value){
                echo ("$key: $value</br>");
            }
        }else{
            echo "<br>La squadra non è presente nell'array";
        }
    };

    //2. visualizzazione della data di fondazione delle squadre di un determinata città
    function data_fondazione($vet, $citta){
        foreach($vet as $squadra){
            if($squadra["citta"] == $citta){
                echo "<br>" .$squadra["nome"]." data di fondazione: ".$squadra["fondazione"]. " citta: ".$squadra["citta"];
            }
        }
    };

    // visualizzazione di tutte le squadre
    function visualizza_tutto($vet){
        foreach($vet as $squadra){
            echo "<br>";
            echo "<br>Nome: ".$squadra["nome"];
            echo "<br>Citta: ".$squadra["citta"];
            echo "<br>Fondazione: ".$squadra["fondazione"];
            echo "<br>Stadio: ".$squadra["stadio"];
            echo "<br>Capacita: ".$squadra["capacita"];
            echo "<hr>";
        }
    };
?>