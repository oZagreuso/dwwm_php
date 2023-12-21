<?php

Autoloader::register();

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
        $request = "SELECT id, nom, prenom, num_tel FROM " . $this->table;
        $state = $this->connexion->prepare($request);
        $state->execute();
        $database = $state->fetchAll();   
        return $database;
    }
/*
    protected function searchPass():array
    {
        $database = [];
        $request = "SELECT pass FROM " . $this->table;
        $state = $this->connexion->prepare($request);
        $state->execute();
        $database = $state->fetchAll();   
        return $database;
    }*/

    public function setTable():string
    {
        

        $myString = '<table class="table table-success table-striped table-hover"><thead><tr>';
        $myData = $this->searchInDatabase();

        foreach ($myData[0] as $key =>$value)
        {
        
            $myString .= "<th>" . $key . "</th>";
     
        }
        $myString .= "<td></td><td></td></tr></thead><tbody>";


        for ($i=0; $i < count($myData); $i++)
        {
            $line = $myData[$i];
            $myString .= "<tr>";


  
            foreach ($line as $key => $value) 
            {
                if ($key != 'pass')
                {
                    $myString .= "<td>" . $value . "</td>"; 
                }
             
            }            
             // modifier en GET
             $myString .= "<td><a href='./alterForm.php?id=" . $myData[$i]['id'] . "' target='_blank' class='btn btn-secondary' name='updateLine'>Modifier</a>";
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

    public function getEntryById($id) : array
    {
        $request = "SELECT * FROM bénévoles WHERE id = :id";
        $state = $this->connexion->prepare($request);
        $state->bindParam(':id', $id);
        $state->execute();
        $line = $state->fetch();
        return $line;
    }
/*
    public function alterNom($id, $nom): int
    {
        $request = "UPDATE `$this->table` SET nom = :nom  WHERE id = :id";
        $state = $this->connexion->prepare($request);
        $state->bindParam(':nom', $nom, PDO::PARAM_STR);
        $state->bindParam(':id', $id, PDO::PARAM_INT);
        $state->execute();
        return $state->rowCount();
    }*/
  
    public function alterEntry($nom, $prenom, $num_tel, $poste, $id): int
    {
      
        // --------- F F F F F F F -------------

        $request= "UPDATE `$this->table` SET  nom = '$nom' , prenom = '$prenom', num_tel = '$num_tel', poste = '$poste' WHERE id = $id";
        //echo $request;
        $nbligne= $this->connexion->exec($request);           
        // $test = $this->connexion->exec("UPDATE `$this->table` SET  nom = $nom, prenom = $prenom, num_tel = $num_tel, poste = $poste WHERE id = $id");
        // return $test;
        return $nbligne;

        // ------------- O O O O O --------------
        
        // $request = "UPDATE `$this->table` SET  nom = ':nom', prenom = ':prenom', num_tel = ':num_tel', poste = ':poste', WHERE id = :id";
        // $request= "UPDATE `$this->table` SET  nom = '$nom' , prenom = '$prenom', num_tel = '$num_tel', poste = '$poste' WHERE id = $id";
        // $state = $this->connexion->prepare($request);
        // $state->bindParam(':nom', $nom, PDO::PARAM_STR);
        // $state->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        // $state->bindParam(':num_tel', $num_tel, PDO::PARAM_STR);
        // $state->bindParam(':poste', $poste, PDO::PARAM_STR);
        // $state->bindParam(':id', $id, PDO::PARAM_INT);
        // $state->execute();
        // return $state->rowCount();        
      
    }

    function loginVolonteer(string $_nom, string $_pass) : bool
    {
        $loginValid = false;
        $request = 'SELECT * FROM bénévoles WHERE nom = :nom, pass = :pass';
        $state = $this->connexion->prepare($request);
        $state->bindParam(":nom", $_nom, PDO::PARAM_STR);
        $state->bindParam(":pass", $_pass, PDO::PARAM_STR);
        $state->execute();
        $nblines = $state->rowCount();

        if ($nblines >0)
        {
            $line = $state->fetch();
            if (password_verify($_pass, $line['pass']) == true)
            {
                $_SESSION['nom'] = $line['nom'];
                $loginValid =  true;
            }
        }
    else{
        $loginValid = false;
    }
    return $loginValid;
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
   
    



 