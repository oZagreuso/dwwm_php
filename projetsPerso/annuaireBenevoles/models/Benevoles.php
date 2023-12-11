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
             $myString .= "<td><form action ='" . $_SERVER['PHP_SELF'] . "' method='POST'><input type='hidden' value='" . $myData[$i]['id'] . "'><input type='submit' class='btn btn-danger' value = 'Supprimer' onclick='deleteEntry()'></form></td>";
                
          
            $myString .= "</tr>";
           
        }

      

        $myString .= "</tbody></table>";
        return $myString;

    }

    public function deleteEntry(): void
    {              
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
         {
            $id = $_POST['id'];        
            
            $request = "DELETE FROM `$this->table` WHERE id = :id";
            $state = $this->connexion->prepare($request);
            $state->bindParam(':id', $id);
            $state->execute();
            $this->deleteEntry($id);
            echo "<div class='alert alert-success'>-- Delete Successed --</div>";
          
        
        }    
    }
}
   
    


    /*
    $request = "DELETE FROM " . $this->table . " WHERE id = :id";
    $state = $this->connexion->prepare($request);
    $state->bindParam(':id', $idToDelete);
    $state->execute();
    if (isset($_POST['id'])) 
    {
        $idToDelete = $_POST['id'];
        $this->deleteEntry($idToDelete);
        echo "<div class='alert alert-success'>-- Delete Successed --</div>";
     }*/


 

