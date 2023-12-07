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
        $myString = '<table class="table table-success table-striped table-hover">';
        $myData = $this->searchInDatabase();

        foreach ($myData[0] as $key =>$value)
        {
            $myString .= "<th>" . $key . "</th>";
        }
        $myString .= "</tr></thead><tbody>";

        for ($i=0; $i < count($myData); $i++)
        {
            $line = $myData[$i];
            $myString .= "<tr>";

            foreach ($line as $key => $value) 
            {
              $myString .= "<td>" . $value . "</td>"; 
            }            
           $myString .= "</tr>";
        }
        $myString .= "</tbody></table>";
        return $myString;
    }
}
