<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Annuaire des Bénévoles du Foyer du CRM</title>
</head>



<body>
    <main>
        <h1>Annuaire des bénévoles du foyer</h1>
        <?php 
            //  include "models/Connexion.php";
             include "models/Benevoles.php";

            $table = new Benevoles('bénévoles');
            echo $table->setTable();
        

        ?>
    </main>
</body>
</html>