<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Guide des meilleurs Restaurants</title>
</head>

<body>
    <?php
    include "models/Connexion.php";
    $maConnection = Connexion::getInstance();
    $request = "SELECT * FROM restaurants";
    $state = $maConnection->prepare($request);
    $state->execute();
        //on affiche le résultat de la requête, ici sous forme de tableau
        $tableau = [];
        while ($ligne = $state->fetch())
            {
                var_dump($ligne);
            }
    
    ?>
</body>
</html>