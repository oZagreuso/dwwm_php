<!doctype html>
<html lang="fr-fr">
<head>
  <meta charset="utf-8">
  <title>Entrainement Centre de Readaptation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" media="screen" href="../css/style.css">
</head>	

<body>

        <div id="page">
            <header>
              <div id="header">
                <img src="../contenu/header.jpg" width="980" height="176" alt="colblanc entete"> 
              </div>
            </header>
         

        <div id="menu">
          <ul>
           <li><a href="#">Entreprises</a>
            <ul>
             <li><a href="#" target="_self">Visualiser</a>
             </li>
             <li><a href="filtre.php">Rechercher</a>
             </li>
             <li><a href="#">Ajouter</a>
             </li>
           </ul>
         </li>
         <li><a href="#">Candidats</a>
          <ul>
           <li><a href="#" target="_self">Listing</a>
           </li>
           <li><a href="#">rechercher</a>
           </li>
           <li><a href="#">Ajouter</a>
           </li>
           <li><a href="#">CVthèque</a>
           </li>
         </ul></li>
         <li><a href="#">Projets</a>
         </li>
         <li><a href="#">offres</a>
          <ul>
            <li><a href="#">Par secteur</a>
            </li>
            <li><a href="#">Par entreprises</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    
    <main>
      <section class="form"> 
      
          
         
          <h1 style="text-align: center">Formulaire de recherche d'emploi ou de stage</h1>
          <form name="selection" action ="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
             
          
            <select name="dep" id="dep">
            <option value="">choisir un département</option>
            <?php 
            use App\models\Connexion;
            require "./vendor/autoload.php";
            $connect = Connexion::getinstance();
            $request = "SELECT id_dep, name FROM departements WHERE dep_actif=1"; 
            $state = $connect->prepare($request);
            $state->execute();
            while($obj = $state->fetch())
            {
              if(isset($_POST["dep"]) && !empty($_POST["dep"]) && $obj->id_dep == $_POST["dep"])
              {
                echo '<option value="'. $obj->id_dep .'" selected="true" >' . $obj->name . '</option>';
              }
              else 
              {
                echo '<option value="'. $obj->id_dep .'" >' . $obj->name . '</option>';
              }
            
            }
            ?>
            </select>  
            
            <br>
            <hr>
            <br>
            <fieldset>
              <legend>Sélectionner le type d'établissement</legend>
              <div>
                <input type="checkbox" name="choix[]" id="TPE" value="TPE">
                <label for="TPE">TPE</label>
              </div>
              <div>
              <input type="checkbox" name="choix[]" id="PME" value="PME">
                <label for="PME">PME</label>
              </div>
              <div>
              <input type="checkbox" name="choix[]" id="GE" value="GE">
                <label for="GE">GRANDE ENTREPRISE</label>
              </div>
              <div>
              <input type="checkbox" name="choix[]" id="TER" value="TER">
                <label for="TER">COLLECTIVITE TER</label>
              </div>
              <div>
              <input type="checkbox" name="choix[]" id="ASSO" value="ASSO">
                <label for="ASSO">ASSOCIATION</label>
              </div>
              <div>
              <input type="checkbox" name="choix[]" id="AUTRES" value="AUTRES">
                <label for="AUTRES">AUTRES (secteur public)</label>
              </div>       
               
            </fieldset>
                  
       
            <input type="submit" value="Valider" name="validation" id="validation">
            </form>
  
    
  <?php
var_dump($_POST["choix"]);


require "./vendor/autoload.php";
$connect = Connexion::getInstance();
$request = "SELECT nom_etab, type_etab, nom_resp, adresse, ville, cp, Telephone, email FROM institutions WHERE depart = :dep" ;
$state = $connect->prepare($request);
$state->bindParam(":dep", $_POST["dep"], \PDO::PARAM_STR);
$state->execute();
$data = [];
$nbEntr = 0;
echo "<caption> Resultat de votre recherche </caption><table class='table table-stripped table-hover'>";
echo "<thead><tr><th> Nom Etablissement </th><th> Type Etablissement </th><th> Nom Responsable </th><th> Adresse </th><th> Ville </th><th> Code Postal </th><th> Téléphone </th><th> Email </th></tr></thead><tbody>";

while ($obj = $state->fetch()) 
{  
  echo "<tr>";
  $nbEntr++;
  array_push($data, $obj);
  foreach ($obj as $key =>$value)
  {
    echo '<td>' . $obj->$key . '</td>';


  }
  echo "</tr>";
}

 echo "</tbody></table>";

var_dump($data);

  ?>   
            <aside>

</aside>        
  </section>
</main>

<footer>
  Copyright
</footer> 
</div>
</body>
</html>