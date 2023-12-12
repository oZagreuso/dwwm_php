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
             $myString .= "<td><a href='detail.php?id=" . $myData[$i]['id'] . "' target='_blank' class='btn btn-secondary'>Modifier</a>";
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

 /*       public function addEntry($data)
{
    $request = "INSERT INTO `bénévoles` (`nom`, `prenom`, `numero_tel`, `poste`) VALUES ('" . $data['nom'] . "', '" . $data['prenom'] . "', '" . $data['numero_tel'] . "', '" . $data['poste'] . "')";
    $stmt = $this->connexion->prepare($request);
    $stmt->execute();
    return $this->connexion->lastInsertId();
}*/

        public function addEntry(string $nom, string $prenom, string $num_tel, string $poste): void
        {
            $request = "INSERT INTO" . $this->table . "VALUES (id, ?, ?, ?, ?)";
            $state = $this->connexion->prepare($request);
           /* $state->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
            $state->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
            $state->bindParam(':numero_tel', $data['numero_tel'], PDO::PARAM_STR);
            $state->bindParam(':poste', $data['poste'], PDO::PARAM_STR);*/
            $state->execute([$nom, $prenom, $num_tel, $poste]);
            // return $this->connexion->lastInsertId();
        }

}
   
    



 

