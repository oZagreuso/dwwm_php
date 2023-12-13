<?php

require './models/Connexion.php';

class Benevoles
{
    private string $table;
    private PDO $connexion;

    public function __construct(string $_table)
    {
        $this->table = $_table;
        $this->connexion = Connexion::getInstance();
    }

    protected function searchInDatabase():array
    {
        $database = [];
        $request = "SELECT * FROM " . $this->table;
        $state = $this->connexion->prepare($request);
        $state->execute();
        $database = $state->fetchAll();   
        return $database;
    }

    public function setTable():string
    {
        

        $myString = '<table class="table table-success table-striped table-hover"><thead><tr>';
        $myData = $this->searchInDatabase();

        foreach ($myData[0] as $key =>$value)
        {
        
            $myString .= "<th>" . $key . "</th>";
     
        }
        $myString .= "<td>Modifier</td><td>Supprimer</td></tr></thead><tbody>";


        for ($i=0; $i < count($myData); $i++)
        {
            $line = $myData[$i];
            $myString .= "<tr>";


  
            foreach ($line as $key => $value) 
            {
              $myString .= "<td>" . $value . "</td>"; 
            }            
             // modifier en GET
             $myString .= "<td><a href='detail.php?id=" . $myData[$i]['id'] . "' target='_blank' class='btn btn-secondary' name='alterForm'>Modifier</a>";
             // supprimer en POST
             $myString .= "<td><form action ='" . $_SERVER['PHP_SELF'] . "' method='POST'><input type='hidden' name='deleteLine' value='" . $myData[$i]['id'] . "'><input type='submit' class='btn btn-danger' value = 'Supprimer' onclick='deleteEntry()'></form></td>";
                
          
            $myString .= "</tr>";
           
        }
      

        $myString .= "</tbody></table>";
        return $myString;

    }

    public function deleteEntry($id): int
    {                    
            
        $request = "DELETE FROM `$this->table` WHERE id = :id";
        $state = $this->connexion->prepare($request);
        $state->bindParam(':id', $id, PDO::PARAM_INT);
        $state->execute();
        return $state->rowCount();    
    }

    public function addEntry($nom, $prenom, $num_tel, $poste): int
    {
        $request = "INSERT INTO `$this->table` (nom, prenom, num_tel, poste) VALUES (:nom, :prenom, :num_tel, :poste)";
        $state = $this->connexion->prepare($request);
        $state->bindParam(':nom', $nom, PDO::PARAM_STR);
        $state->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $state->bindParam(':num_tel', $num_tel, PDO::PARAM_STR);
        $state->bindParam(':poste', $poste, PDO::PARAM_STR);
        $state->execute();
        return $state->rowCount();
    }
  
    public function alterEntry($id, $nom, $prenom, $num_tel, $poste): int
    {
        $request = "UPDATE `$this->table` SET nom = :nom, prenom = :prenom, num_tel = :num_tel, poste = :poste WHERE id = :id";
        $state = $this->connexion->prepare($request);
        $state->bindParam(':nom', $nom, PDO::PARAM_STR);
        $state->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $state->bindParam(':num_tel', $num_tel, PDO::PARAM_STR);
        $state->bindParam(':poste', $poste, PDO::PARAM_STR);
        $state->bindParam(':id', $id, PDO::PARAM_INT);
        $state->execute();
        return $state->rowCount();
    }

    //// REGEX ////
    public function validateNomPrenom($input)
    {
        return preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\'\- ]+$/', $input);
    }

    public function validateNumTel($input)
    {
        return preg_match('/^[0-9()+\- ]+$/', $input);
    }

    public function numTelLengthMax($input)
    {
        return preg_match('/^\d{1,13}$/', $input);
    }

    function numTelLengthMin($input) {
        return preg_match('/^\d{10,13}$/', $input);
     }

}
   
    



 

