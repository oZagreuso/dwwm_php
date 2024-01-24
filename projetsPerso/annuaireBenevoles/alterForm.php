<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Formulaire de modification</title>
</head>


<body class="alterBody">
        <div class="alterVolonteer">
            <h2>Modifier un bénévole</h2>
        </div>

      
     <?php
            
            use App\models\Benevoles;
            require "./vendor/autoload.php";
            session_start();
    

            if (isset($_GET['id']) && $_GET['id'] > 0)
             {

                $table = new Benevoles('bénévoles');
                $line = $table->getEntryById($_GET['id']);           
                $nom = $line['nom'];
                $prenom = $line['prenom'];
                $num_tel = $line['num_tel'];
                $poste = $line['poste'];
                $id = $_GET['id']; 
                //echo $nom . $prenom . $num_tel . $poste;
                    

               if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['num_tel']) && isset($_POST['poste'])) 
               {
                $nb = $table->alterEntry( $_POST['nom'],  $_POST['prenom'],  $_POST['num_tel'], $_POST['poste'], $_POST['mail'], $_GET['id']); echo $nb;
                if ($nb == 1)
                {
                    echo "<p>Modification réussie</p>";
                    echo "<script>window.location.href='http://localhost/dwwm_php/projetsPerso/annuaireBenevoles/index.php'</script>";
                }
                else 
                {
                    echo "<p>Echec de modification</p>";
                }
               }
            }
                ?>
                <section class="updateForm">
                <form action="<?php  echo $_SERVER['PHP_SELF']."?id=".$id ; ?> " method="POST">
                <div class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Obligatoire" value="<?php echo (!empty($line["nom"])? $line["nom"] : "non renseigné")  ?>">
                    <label for="prenom" >Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Obligatoire" value="<?php echo (!empty($line["prenom"])? $line["prenom"] : "non renseigné")  ?>">
                    <label for="num_tel">Numéro de téléphone</label>
                    <input type="text" id="numero_tel" name="num_tel" placeholder="Obligatoire" value="<?php echo (!empty($line["num_tel"])? $line["num_tel"] : "non renseigné")  ?>">
                    <label for="poste">Poste</label>
                    <input type="text" id="poste" name="poste" value="<?php echo (!empty($line["poste"])? $line["poste"] : "non renseigné")  ?>">
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" placeholder="Obligatoire"  value="<?php echo (!empty($line["benev_mdp"])? $line["benev_mdp"] : "non renseigné")  ?>">
                    <input type="submit" class="btn btn-outline-success" value="valider" name="validate">
                </div>                
                </form>
                </section>
            <?php
             
           ?>
</body>
</html>