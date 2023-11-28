<?php

require_once('Personne.php');
class Intervenant extends Personne
{
    private $salaire;
    private $autresRevenus;
    private $charges;
    private $age;

    public function __construct(string $dateNaiss, string $nom, string $prenom, float $salaire, float $autresRevenus)
    {
        parent::__construct($dateNaiss, $nom, $prenom); 
        $this->salaire = $salaire;
        $this->autresRevenus = $autresRevenus;
        $this->charges = $this->getCharges();
        $this->age = $this->getAge();
    }

    public function getsalaire() 
    {
        return $this->salaire;
    }

    public function getAutresRevenus()
    {
        return $this->autresRevenus;
    }

    public function getCharges()
    {
        if($this->age < 55)
        {
            $this->charges = ($this->salaire * 20 / 100) + ($this->autresRevenus * 15 / 100);
         
        }
        if($this->age >= 55)
        {
            $this->charges = (($this->salaire * 10 / 100) + ($this->autresRevenus * 0.75 / 100));
      
        }
        return $this->charges;
    }
}

echo "<br>";
$intervenant = new Intervenant("1965-09-29", "Bg","Samba", 10000, 1000);
echo "<br>";
var_dump($intervenant);
echo "<br>";
echo "<br>";
var_dump($intervenant->getCharges());