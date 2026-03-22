<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Squadre</title>
    </head>
    <body>

        <form method="POST" >
            <label for="squadra">Inserisci una squadra</label>
            <input type="text" name="squadra" id="squadra"> 
            <button type="submit" name="info">Visualizza info squadra</button>
        </form>

        <?php
            $squadre = array(
                "Milan" => array(   "nome"=>"milan",
                                    "citta"=>"Milano",
                                    "fondazione"=>"16-12-1899",
                                    "stadio"=>"San siro",
                                    "capacita"=>80018
                                ),

                "Inter" => array(   "nome"=>"Inter",
                                    "citta"=>"Milano",
                                    "fondazione"=>"09-03-1908",
                                    "stadio"=>"San siro",
                                    "capacita"=>80018
                                ),

                "Juve" => array(    "nome"=>"Juventus",
                                    "citta"=>"Torino",
                                    "fondazione"=>"16-12-1897",
                                    "stadio"=>"Allianz Stadium",
                                    "capacita"=>41000
                                )
            );
            include("squadre.php");
            
            if(isset($_POST["info"]) && !empty($_POST["squadra"])){
                $squadra = $_POST["squadra"];
                echo "<br><h2>Informazioni sulla squadra {$squadra}</h2>";
                squadra_per_nome($squadre, $_POST["squadra"]);
            }
        ?>
    </body>
</html>