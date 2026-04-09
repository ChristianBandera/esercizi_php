<?php
#Realizzare una tabella HTML generata con PHP che contenga:
#● il nome della squadra di calcio di Serie A
#● la foto (logo) della squadra
#● un collegamento al sito ufficiale della società

    function tabella_squadre(){

        $squadre = [
            [
                "nome" => "Juventus",
                "logo" => "https://upload.wikimedia.org/wikipedia/commons/1/15/Juventus_FC_2017_logo.svg",
                "sito" => "https://www.juventus.com"
            ],
            [
                "nome" => "Milan",
                "logo" => "https://upload.wikimedia.org/wikipedia/commons/d/d0/Logo_of_AC_Milan.svg",
                "sito" => "https://www.acmilan.com"
            ],
            [
                "nome" => "Inter",
                "logo" => "https://upload.wikimedia.org/wikipedia/commons/0/05/FC_Internazionale_Milano_2021.svg",
                "sito" => "https://www.inter.it"
            ]
        ];

        echo "<table border='1'>";
        echo "<tr>
                <th>Squadra</th>
                <th>Logo</th>
                <th>Sito ufficiale</th>
            </tr>";

        foreach ($squadre as $s) {
            echo "<tr>";
            echo "<td>".$s["nome"]."</td>";
            echo "<td><img src='".$s["logo"]."' width='50'></td>";
            echo "<td><a href='".$s["sito"]."' target='_blank'>Vai al sito</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    }

?>