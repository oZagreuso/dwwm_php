<?php
require('Moteur.php');
class Voiture
{
    protected $marque;
    protected $poids;
    public $vitesseMax;
    public $moteur;


    public function __construct(string $marque, int $poids, float $mVMax, string $mMarque)
    {
        $this->marque = $marque;
        $this->poids = $poids;
        $this->moteur = new Moteur($mMarque, $mVMax);
    }   
 

    public function getMarque()
    {
        return $this->marque;
    }

    public function getPoids()
    {
        return $this->poids;
    }
    
    public function getMoteur()
    {
        return $this->moteur;
    }

    public function getVitesseMax()
    {        
            $this->vitesseMax = $this->moteur->mVMax - ($this->poids * (3 / 100));
            return $this->vitesseMax;            
    }
}

$voiture = new Voiture('fiat', 800, 140, 'dacia');
$voiture->getVitesseMax();
var_dump($voiture);
