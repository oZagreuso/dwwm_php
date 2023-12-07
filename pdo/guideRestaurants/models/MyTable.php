<?php

//include "models/Connexion.php";

class MyTable
{
    private string $table;
    private string $primaryKeyColName;
    private PDO $connection;

    public function __construct(string $_table)
    {
        $this->table = $_table;
        $this->connection = Connexion::getInstance();
    }

   protected function searchInBdd() : array
    {
            $bdd = [];  
            $request = "SELECT * FROM " . $this->table;
            $state = $this->connection->prepare($request);
            $state->execute();
            $bdd = $state->fetchAll();     

        return $bdd;

    }

    public function rendreHTML() : string
    {
      $maChaine = "<table class='table table-danger table-hover'><thead><tr>";
      $mesData = $this->searchInBdd();
      // création des cellules titre (th)
      foreach ($mesData[0] as $key => $value) 
      {
        $maChaine .= "<th>" . $key . "</th>";
        
      }
      $maChaine .= "</tr></thead><tbody>";


      for ($i=0; $i < count($mesData); $i++) 
      { 

        $ligne = $mesData[$i];
        $maChaine .= "<tr>";

          foreach ($ligne as $key => $value) 
          {
            $maChaine.= "<td>" . $value . "</td>"; //créer autant de champs que nécessaire
          }

        $maChaine .= "</tr>";
      }
      
      $maChaine .= "</tbody></table>";
      return $maChaine;
    }
}
  

/*
    function getPrimaryKeyColumn() 
    {
      $mesData = $this->searchInBdd();
      foreach ($mesData as $column) 
      {
          if ($column->flags & MYSQLI_PRI_KEY_FLAG) 
          {
              return $column->name;
          }
      }
  
      return null;
    }
  
  }
*/

/*
    public function rendreHTML() 
    {        
        $resultats = $this->searchInBdd();
        echo '<table border="1">';
        echo '<tr border="1">';
        echo '<th>id</th>';
        echo '<th>nom</th>';
        echo '<th>adresse</th>';
        echo '<th>prix</th>';
        echo '<th>commentaire</th>';
        echo '<th>note</th>';
        echo '<th>visite</th>';
        echo '</tr>';
      $resultats = $this->searchInBdd();
      foreach($resultats as $row)
      {
        echo '<tr border="1">';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['nom'] . '</td>';
        echo '<td>' . $row['adresse'] . '</td>';
        echo '<td>' . $row['prix'] . '</td>';
        echo '<td>' . $row['commentaire'] . '</td>';
        echo '<td>' . $row['note'] . '</td>';
        echo '<td>' . $row['visite'] . '</td>';
        echo '</tr>';
       
      }
      */
    

 
   
    

    
    
        
         
    
