<?php
require('Moteur.php');
class Voiture
{
    protected $marque;
    protected $poids;
    public $vitesseMax;
    protected Moteur $moteur;
    


    public function __construct(string $marque, int $poids, Moteur $moteur)
    {
        $this->marque = $marque;
        $this->poids = $poids;
        $this->moteur = $moteur;
     
    }

    public function getMarque(): string
    {
        return $this->marque;
    }

    public function getPoids(): int
    {
        return $this->poids;
    }
    
    public function getMoteur()
    {
        return $this->moteur;
    }   
   
    public function getVitesseMax(): float
    {      
                   $this->vitesseMax = $this->moteur->mVMax - ($this->poids * (3 / 100));
            return $this->vitesseMax;   
                 
    }
}

$voiture = new Voiture('fiat', 800, new Moteur('Lancia', 180));
$voiture->getVitesseMax();
var_dump($voiture);
echo "<br>";

