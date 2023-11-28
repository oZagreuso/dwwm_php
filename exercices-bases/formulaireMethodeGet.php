<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <div>
            <label for="nombre1">Nombre 1 :</label>
            <input type="number" id="nombre1" name="nb1">
        </div>
        <div>
            <label for="nombre2">Nombre 2 :</label>
            <input type="number" id="nombre2" name="nb2">
        </div>
            <button type="submit">Calculer</button>
    </form>

    <?php
        // http://localhost/dwwm_php/exercices-bases/formulaire.php?nb1=21&nb2=2
        $total = $_GET["nb1"] + $_GET["nb2"];
        echo "<p>Total : $total</p>";
        var_dump($total);
    ?>
    
</body>
</html>