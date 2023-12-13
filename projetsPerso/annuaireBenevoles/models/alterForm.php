<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Formulaire de modification</title>
</head>


<body>
        <div class="alterVolonteer">
            <h2>Modifier un bénévole</h2>
        </div>
            <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Obligatoire">
                <input type="submit" class="btn btn-outline-success" value="valider" name="alterNom">
                <label for="prenom" >Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Obligatoire">
                <input type="submit" class="btn btn-outline-success" value="valider" name="alterPrenom">
                <label for="num_tel">Numéro de téléphone</label>
                <input type="text" id="numero_tel" name="num_tel" placeholder="Obligatoire">
                <input type="submit" class="btn btn-outline-success" value="valider" name="alterNumTel">
                <label for="poste">Poste</label>
                <input type="text" id="poste" name="poste">
                <input type="submit" class="btn btn-outline-success" value="valider" name="alterPoste">
            </div>
            <?php
            /*
            if (isset($_POST['alterForm']))
             {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $num_tel = $_POST['num_tel'];
                $poste = $_POST['poste'];

                if ($table->validateNomPrenom($nom) &&  $table->validateNomPrenom($prenom) && $table->validateNumTel($num_tel) && $table->numTelLengthMax($num_tel) && $table->numTelLengthMin($num_tel))
                {
                    echo $table->alterEntry($nom, $prenom, $num_tel, $poste);
                    echo "<script>window.location.href='http://localhost/dwwm_php/projetsPerso/annuaireBenevoles/index.php'</script>";
                }
     
               
             }*/
             ?>
</body>
</html>