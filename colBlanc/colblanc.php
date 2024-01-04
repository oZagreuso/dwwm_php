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
        <form action ="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="departement">
            <label for="departement">Choisissez votre département</label>
            <select id="departement" name="departement">
          </div>
          <div class="etablissement">
            <label for="etablissement">Sélectionnez votre type d'établissement</label>            
            <input type="checkbox" id="TPE" name="TPE">
            <label for="TPE">TPE</label>
            <input type="checkbox" id="PME" name="PME">
            <label for="PME">PME</label>
            <input type="checkbox" id="grdeEntr" name="grdeEntr">
            <label for="grdeEntr">GRANDE ENTREPRISE</label>
            <input type="checkbox" id="colTer" name="colTer">
            <label for="colTer">COLLECTIVITES TER</label>
            <input type="checkbox" id="assoc" name="assoc">
            <label for="assoc">ASSOCIATION</label>
            <input type="checkbox" id="autres" name="autres">
            <label for="autres">AUTRES </label>
          </div>
          <div class="submit">
              <button type="submit">Valider</button>
          </div>
        </form>
          <div class="print">
            <button type="submit" onclick="window.print()">Imprimer</button>
          </div>
      <h1 style=" text-align:center">Votre travail ici</h1>
  <?php


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