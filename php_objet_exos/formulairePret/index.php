<?php require 'mensualite.php'; 


if( !empty($_POST['capital']) && !empty($_POST['taux'])  && !empty($_POST["duree"]))
{   
            
    $result =calculMensualite($_POST['capital'],$_POST['taux'],$_POST["duree"] );

}
else {
    $result="";
}


?>

<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul de la mensualité de votre prêt</title>
</head>

<body>
    <main>
    <h1>Formulaire de calcul de la mensualité de votre prêt</h1>
        <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div>
                <label for="capital">Capital emprunté</label>
                <input type="text" id="capital" name="capital">
            </div>
            <div>
                <label for="taux">Taux d'intérêt annuel</label>
                <input type="text" id="taux" name="taux">
            </div>
            <div>
                <label for="duree">Durée de remboursement en années</label>
                <input type="number" id="duree" name="duree">
            </div>
            <div>
                <button type="submit">Valider</button>
            </div>
            <div>
                <label for="mensualite">Mensualité : </label>
                <input type="text" readonly id="mensualite" name="mensualite" value="<?php echo $result ; ?>"> 
            </div>
            
        </form> 


    </main>
    
</body>
</html>