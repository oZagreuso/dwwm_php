<?php

//include "models/Connexion.php";

class MyTable
{
    private string $base;

    public function __construct(string $base)
    {
        $this->base = $base;
    }

    public function searchInBdd()
    {
        $bdd = [];
        try {
            $maConnection = Connexion::getInstance();
            $request = "SELECT * FROM " . $this->base;
            $state = $maConnection->prepare($request);
            $state->execute();
            $bdd = $state->fetchAll();
        } catch (PDOException $e) {
            die("!! data not found !!" . $e ->getMessage());
        }   

        return $bdd;

    }

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
    }
        
         
    
}

