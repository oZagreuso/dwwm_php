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
    <?php   require_once "models/Benevoles.php"; session_start(); ?>
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
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="<multipart/form-data">
                <fieldset>
                    <legend class="legendID">Identification</legend>
                    <div id="formID" class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3">
                        <label>Nom</label>
                        <input type="email" name="login" id="login">
                        <label>Password</label>
                        <input type="password" name="mdp" id="mdp" maxlength="30">
                        <input type="submit" value="valider"  class="btn btn-outline-success" name="validation" id="validation">                    
                    </div>
                </fieldset>
            </form>
        </div>
    </main>
</body>