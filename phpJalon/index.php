<!DOCTYPE html>
<html lang="fr-be">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Les CPUs en vente</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>

<?php  session_start();?>
<body>
    <div class="logo"><img src=./assets/img/cpu-intel.svg></div>
    <header>
        <h1>Les micro-processeurs INTEL en vente</h1>
    </header>
    <main>

        <h2>Ajouter un nouveau micro-processeur</h2>
<div>
        <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="cpu_family">cpu_family</label>
                <input type="text" id="cpu_family" name="cpu_family" maxlength="2" placeholder="Obligatoire">
                <label for="cpu_model" >cpu_model</label>
                <input type="text" id="cpu_model" name="cpu_model" minlength="6" maxlength="7" placeholder="Obligatoire">
                <label for="cpu_mhz">cpu_mhz</label>
                <input type="text" id="cpu_mhz" name="cpu_mhz" placeholder="Obligatoire">
                <input type="submit" class="btn btn-outline-success" value="valider" name="validate">
        </form>
</div>
        <h2>Liste des micro-processeurs disponibles</h2>

        <?php
            
            require "./src/models/Cpu.php";
            $table = new Cpu('cpu_intel');
            echo $table->setTable(); 
            
            if (isset($_POST['validate'])) 
            {
                // Récupération des données du formulaire
                $cpu_family = $_POST['cpu_family'];
                $cpu_model = $_POST['cpu_model'];
                $cpu_mhz = $_POST['cpu_mhz'];

                    echo $table->addEntry($cpu_family, $cpu_model, $cpu_mhz);
                  
            
             }    
        ?>
        <!-- <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Famille</th>
                    <th>Modèle</th>
                    <th>Fréquence de base</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4">
                        Remplacer cette cellule par le listing des CPU référencés en base de données
                    </td>
                </tr>
            </tbody>   
        </table> -->

    </main>
    
</body>
</html>