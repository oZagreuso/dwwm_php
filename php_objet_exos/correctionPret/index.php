<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Prêt</title>
</head>


<body>
    <?php
    include "./models/Pret.php";
    $monPret = new Pret(10000, 4, 4);
    echo "mensualité constante :" .$monPret->calculMens()."£";
    ?>
</body>
</html>