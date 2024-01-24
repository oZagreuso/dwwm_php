<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Annuaire des Bénévoles du Foyer du CRM</title>
</head>



<body class="bodyID">
    <?php  session_start();
    var_dump($_POST['mail']);
    require "./vendor/autoload.php"; use App\models\Benevoles;
            $table = new Benevoles('bénévoles');
            if (isset($_POST['mail']))
            {
                if ($table->loginVolonteer($_POST['mail'],  $_POST['pass']) == true)
                {
                    // echo $_SESSION['mail'];
                    // echo $_SESSION['level'];
                    header('Location: http://localhost/dwwm_php/projetsPerso/annuaireBenevoles/index.php');
                }
            } 
          ;   ?>
    <main>
        <section>
        <div class="title">
            <h1>Annuaire des bénévoles du foyer</h1>
        </div>
        <div class="logo">
            <image src="./logo/crm_logo.png" alt="logo du CRM";>
        </div>
        </section>
        <div class="identification">
        <?php 
        ?> 
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="<multipart/form-data">
           
                <fieldset>
                    <legend class="legendID">Identification</legend>
                    <div id="formID" class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3">
                        <label>Mail</label>
                        <input type="text" name="mail" id="mail">
                        <label>Password</label>
                        <input type="password" name="pass" id="pass" maxlength="30">
                        <input type="submit" value="valider"  class="btn btn-outline-success" name="validation" id="validation">                    
                    </div>
                </fieldset>
            </form>
        </div>
        
        <!-- <div class="identification">
            <form action="<?php /* $_SERVER['PHP_SELF']; */?>" method="POST" enctype="<multipart/form-data">
            <legend class="legendID">Inscription</legend>
            <div class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Obligatoire">
                <label for="prenom" >Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Obligatoire">
                <label for="num_tel">Numéro de téléphone</label>
                <input type="text" id="numero_tel" name="num_tel" placeholder="Obligatoire">
                <label for="poste">Poste</label>
                <input type="text" id="poste" name="poste">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" placeholder="Obligatoire">
                <input type="submit" class="btn btn-outline-success" value="valider" name="validate">
            </div>            
        </div> -->

    </main>
</body>