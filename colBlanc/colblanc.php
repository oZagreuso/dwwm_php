<!doctype html>
<html lang="fr-fr">
<head>
  <meta charset="utf-8">
  <title>Entrainement Centre de Readaptation</title>
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
             
          
            <select name="dept" id="dept">
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
         
        </form>
          <div class="print">
            <button type="submit" onclick="window.print()">Imprimer</button>
          </div>
            
            <br>
            <hr>
            <br>
            <fieldset>
              <legend>Sélectionner le type d'établissement</legend>
              <div id="recherche">
                <input type="checkbox" name="choix[]" id="TPE" value="TPE">
                <input type="checkbox" name="choix[]" id="TPE" value="TPE">
                <input type="checkbox" name="choix[]" id="TPE" value="TPE">
                <input type="checkbox" name="choix[]" id="TPE" value="TPE">
                <input type="checkbox" name="choix[]" id="TPE" value="TPE">
                <input type="checkbox" name="choix[]" id="TPE" value="TPE">
              </div>
            </fieldset>
                  
       
            <input type="submit" value="Valider" name="validation" id="validation">

  <?php


  ?>
            </form>
   <aside>

  </aside>
      </section>
    </main>

    <?php



    ?>
<footer>
  Copyright
</footer> 
</div>
</body>
</html>