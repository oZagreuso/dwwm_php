<?php

require "./src/models/Connexion.php";

class Cpu
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
        $request = "SELECT cpu_id, cpu_family, cpu_model, cpu_mhz FROM " . $this->table;
        $state = $this->connexion->prepare($request);
        $state->execute();
        $database = $state->fetchAll();   
        return $database;
    }

    public function setTable():string
    {
        $myString = '<table class="table-info table-striped table-hover"><thead><tr>';
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
                    $myString .= "<td>" . $value . "</td>";                              
            } 
        }

        $myString .= "</tbody></table>";
        return $myString;
    }

    public function addEntry($cpu_family, $cpu_model, $cpu_mhz): int
    {
        $request = "INSERT INTO `$this->table` (cpu_family, cpu_model, cpu_mhz) VALUES (:cpu_family, :cpu_model, :cpu_mhz)";
        $state = $this->connexion->prepare($request);
        $state->bindParam(':cpu_family', $cpu_family, \PDO::PARAM_STR);
        $state->bindParam(':cpu_model', $cpu_model, \PDO::PARAM_STR);
        $state->bindParam(':cpu_mhz', $cpu_mhz, \PDO::PARAM_STR);
        $state->execute();
        return $state->rowCount();
    }

}