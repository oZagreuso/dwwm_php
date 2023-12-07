<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Le Guide des meilleurs Restaurants</title>
</head>

<body>
    <?php
    include "models/Connexion.php";
    include "models/MyTable.php";
    
        //on affiche le résultat de la requête, ici sous forme de tableau
     
            $table = new MyTable('restaurants');
            
            echo $table->rendreHTML(); 
            // echo $table->getPrimaryKeyColumn();
            

           


    
         
    ?>
</body>
</html>