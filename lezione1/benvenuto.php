<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
</head>
<body>
    <?php 
        for($i=0; $i<10; $i++){
            echo "<h2>Christian Bandera</h2>";
            if($i != 9){
                echo '<hr style="border: 1px solid green;">';
            }
        }
    ?>
</body>
</html>