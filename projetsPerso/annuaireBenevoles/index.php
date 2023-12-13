<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Annuaire des Bénévoles du Foyer du CRM</title>
</head>



<body>
    <main>
        <section>
        <div class="title">
            <h1>Annuaire des bénévoles du foyer</h1>
        </div>
        <div class="logo">
            <image src="./logo/crm_logo.png" alt="logo du CRM";>
        </div>
        </section>
        <div>
        <?php 
          
             include "models/Benevoles.php";

            $table = new Benevoles('bénévoles');
            echo $table->setTable();

            if (isset($_POST['deleteLine'])) 
            {
                $id = $_POST['deleteLine'];
                echo $table->deleteEntry(intval($id));
                echo "<div class='alert alert-success'>-- Delete Successed --</div>"  ;
                echo "<script>window.location.href='http://localhost/dwwm_php/projetsPerso/annuaireBenevoles/index.php'</script>";
            }
           
            if (isset($_POST['validate'])) 
            {
                // Récupération des données du formulaire
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $num_tel = $_POST['num_tel'];
                $poste = $_POST['poste'];

                if ($table->validateNomPrenom($nom) &&  $table->validateNomPrenom($prenom) && $table->validateNumTel($num_tel) && $table->numTelLengthMax($num_tel) && $table->numTelLengthMin($num_tel))
                {
                    echo $table->addEntry($nom, $prenom, $num_tel, $poste);
                    echo "<div class='alert alert-success'>-- Ajout réussi --</div>";
                    echo "<script>window.location.href='http://localhost/dwwm_php/projetsPerso/annuaireBenevoles/index.php'</script>";
                }
                else
                {
                    echo "-- Erreur saisie --";
                }
            
             }

             if (isset($_POST['alterNom']))
             {
                $nom = $_POST['nom'];

                if ($table->validateNomPrenom($nom))
                {
                    echo $table->alterNom($id, $nom);
                    echo "<script>window.location.href='http://localhost/dwwm_php/projetsPerso/annuaireBenevoles/index.php'</script>";
                }
     
               
             }

        ?>
        </div>
        <div class="addVolonteer">
            <h2>Ajouter un bénévole</h1>
        </div>
            <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Obligatoire">
                <label for="prenom" >Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Obligatoire">
                <label for="num_tel">Numéro de téléphone</label>
                <input type="text" id="numero_tel" name="num_tel" placeholder="Obligatoire">
                <label for="poste">Poste</label>
                <input type="text" id="poste" name="poste">
                <input type="submit" class="btn btn-outline-success" value="valider" name="validate">
            </div>
            
    </main>
</body>
</html>