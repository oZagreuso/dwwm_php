<?php include 'mensualite.php';
if( !empty($_POST['capital']) && !empty($_POST['taux'])  && !empty($_POST["duree"]))
{   
    // $capital = $_POST["capital"];
    // $tauxAnnuel = $_POST["taux"];
    // $nbAnneesRemb = $_POST["duree"];
    // $tableau = array();
            
    $result = calculMensualite($_POST['capital'],$_POST['taux'],$_POST["duree"] );
    $tableau = calculAmortissement($_POST['capital'],$_POST['taux'],$_POST["duree"]);
    

}
 else {
   $result="";
//    $tableau = [""];
}


?>


<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../formulairePret/style.css">
    <title>Calcul de la mensualité de votre prêt</title>
</head>

<body>
    <main>
    <h1>Formulaire de calcul de la mensualité de votre prêt</h1>
            <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form">
            <div class="capital">
                <label for="capital">Capital emprunté</label>
                <input type="text" id="capital" name="capital">
            </div>
            <div class="taux">
                <label for="taux">Taux d'intérêt annuel</label>
                <input type="text" id="taux" name="taux">
            </div>
            <div class="duree">
                <label for="duree">Durée de remboursement en années</label>
                <input type="number" id="duree" name="duree">
            </div>   
  
            <div class="submit">
                <button type="submit">Valider</button>
            </div>
        </div>
        <section>
            <div class="mensualite">
                <label for="mensualite">Mensualité : </label>
                <input type="text" readonly id="mensualite" name="mensualite" value="<?php  echo $result; ?>"> 
            </div>
        </section>
        </form>        
    </main>
    
    <!-- <table>
        <thead>
            <tr>
                <th>Numéro de mois</th>
                <th>Intérêt</th>
                <th>Partie Amortissement</th>
                <th>Capital restant</th>
            </tr>
        </thead>
        <tbody> -->
        <?php 
    
       
        echo $tableau;
        // $tableau = array();
        // $tableau[] =  calculAmortissement($_POST['capital'],$_POST['taux'],$_POST["duree"]);
        
        
        /*
        if( !empty($_POST['capital']) && !empty($_POST['taux'])  && !empty($_POST["duree"]))
        {   
                    
            $tableau = calculAmortissement($_POST['capital'],$_POST['taux'],$_POST["duree"]);
        
        }
        else {
            $tableau=[''];} 
                foreach ($tableau as $ligne): ?>
            <tr>
                <td><?= $ligne['mois'] ?></td>
                <td><?= $ligne['amortissement'] ?></td>
                <td><?= $ligne['interets'] ?></td>
                <td><?= $ligne['capital_restant_du'] ?></td>
            </tr>
        <?php endforeach; */?>
      
                   
        <!-- </tbody> -->
    <!-- </table> -->
    
</body>
</html>