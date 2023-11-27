<?php

require_once('Personne.php');
class Client extends Personne
{

    private $id;
    private $numeroRue;
    private $nomRue;
    private $cp;
    private $commune;
    private $adresse;
    

    public function __construct($dateNaiss, string $nom, string $prenom, int $id, int $numeroRue, string $nomRue, int $cp, string $commune)
    {                  
        parent::__construct($dateNaiss, $nom, $prenom);  
            $this->id = $id;
            $this->numeroRue = $numeroRue;
            $this->nomRue = $nomRue;
            $this->cp = $cp;
            $this->commune =$commune;
            $this->adresse = $this-> setAdresse();
           
     
    }

    public function getID() 
    {
        return $this->id;
    }

    public function getNumeroRue()
    {
        return $this->numeroRue;
    }

    public function getNomRue()
    {
        return $this->nomRue;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getCommune()
    {
        return $this->commune;
    }

    public function setAdresse()
    {
        echo $this->numeroRue . " " . $this->nomRue . " " . $this->cp . " " . $this->commune;
        return $this->adresse;
    }
       
}
echo "<br>";
$clientSamba = new Client("2019-09-29", "Bg","Samba", 155, 15, "d'Obernai", 6700, "Strasbourg");
echo "<br>";
var_dump($clientSamba);
echo "<br>";
$clientSamba->$age;
