<?php
    if (!isset($_POST["invia"]))   {                                    //FORM mostrato in postback
        echo "<form action=".$_SERVER['PHP_SELF']." enctype='multipart/form-data' method='post'>";
        echo "<input type='file' name='file_caricato'>";
        echo "<input type='submit' value='Upload file' name='invia'>";
        echo "</form>";
    }else{
        $f=$_FILES['file_caricato']['type'];                            //Tipo file
        $nome=$_FILES['file_caricato']['name'];                         //Nome file
        $nome_tmp=$_FILES['file_caricato']['tmp_name'];                 //Percorso File
        $size= $_FILES['file_caricato']['size'];                        //Size File              
        echo "<br>file_caricato type: $f";
        echo "<br>file_caricato name: $nome";
        echo "<br>file_caricato tmp_name: $nome_tmp";
        echo "<br>file_caricato size: $size";
        if (($f=="image/jpeg")||($f=="image/gif")||($f=="image/png"))   //Verifica se immagine
            //caricamento file sul server nel percorso indicato come secondo parametro
            move_uploaded_file($nome_tmp,"C:\xampp\htdocs\files\Unit5-Lez5\$nome");
        else
            echo "<br><br>Estensione non consentita: <b>il file non verrà memorizzato sul server</b>";
    }                         
?>