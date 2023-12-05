<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Calcul de l'Impôts</title>
</head>


<style>
    label {
        display: inline-block;
        width: 200px;
        margin-bottom: 10px;
    }

    #validation {
        margin: 10px auto 10px 250px;
    }

    #calcul {
        color: red;
    }

</style>
<body>
    <?php require "model/Contribuable.php"; 
    $result = 0;
    // on va tester si l'on obtient les informations via POST (même chose si on utilise méthode GET)
    if(isset($_POST["validation"]))
     {
        if(!empty($_POST["nom"]) && !empty($_POST["revenu"]))
        {
            $monContribuable = new Contribuable($_POST["nom"], $_POST["revenu"]);
            $result = $monContribuable->calculImpot();
        }
        else{
            echo "Un champ est incomplet";
        }
     }
     else 
     {
        echo "Remplissez le formulaire";
     }
    ?>
    <main>
        <h1>Formulaire de calcul de l'impôt</h1>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="<?php echo isset($_POST["nom"])? $_POST["nom"] : '' ?>">
            </div>
            <div>
                <label for="revenu">Revenus</label>
                <input type="number" step="0.01" id="revenu" name="revenu" value="<?php echo isset($_POST["revenu"])? $_POST["revenu"] : 0 ?>">
            </div>
            <div>
                <input type="submit" value="Ok" name="validation" id="validation"></button>
            </div>
            <div>
                <!-- input type="submit" -> variante pour créer le bouton de validation -->
                <label for="rst">Calcul Impôt sur le revenu</label>
                <input type="text" value="<?php echo $result ?>" readonly= "true" id="calcul">
            </div>
        </form>     
    </main>
</body>
</html>