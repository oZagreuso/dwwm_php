<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "models/Connexion.php";
    $maconnection = Connexion::getInstance();
    $request = " SELECT id_Personne, nom, prenom FROM personnes";
    $state = $maconnection->prepare($request);
    $state->execute();
    $tab = [];
        while($ligne = $state->fetch())
        {
            var_dump($ligne);
        }
  ?>  
</body>
</html>