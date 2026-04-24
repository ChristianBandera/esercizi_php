<?php
    if(empty($_POST['invia'])){
        echo "<h1>Elenco film di un regista</h1>";
        echo "<form action='regista_lista.php' method='post'>";
            echo "<label for='registi'>Scegli i registi: </label>";
            echo "<select name='registi' id='registi'>";
                echo "<option value='Massimo Venier'>Massimo Venier</option>";
                echo "<option value='Michael Curtiz'>Michael Curtiz</option>";
                echo "<option value='Roberto Benigni'>Roberto Benigni</option>";
            echo "</select>";
            echo "<button type='submit' name='invia' value='invia'>Invia</button>";
        echo "</form>";
    }else{
        
    }
?>