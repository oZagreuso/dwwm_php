<?php

require_once('Personne.php');
require_once('Adresse.php');
class Client extends Personne
{

   private $id;
   /*
    private $numeroRue;
    private $nomRue;
    private $cp;
    private $commune;*/    
    public $adresse;
    

    public function __construct(string $dateNaiss, string $nom, string $prenom, int $id, Adresse $adresse)
    {                  
        parent::__construct($dateNaiss, $nom, $prenom);  
            $this->id = $id;
            $this->adresse = $adresse;
            /*$this->numeroRue = $numeroRue;
            $this->nomRue = $nomRue;
            $this->cp = $cp;
            $this->commune =$commune;*/
            // $this->adresse = $this-> setAdresse();           
     
    }


    public function getID() 
    {
        return $this->id;
    }

   
       
}
echo "<br>";
$clientSamba = new Client("2000-09-29", "Bg","Samba", 155, new Adresse(25, "rue de la coline", 57200, "Sarreguemines"));
echo "<br>";
var_dump($clientSamba);
echo "<br>";

