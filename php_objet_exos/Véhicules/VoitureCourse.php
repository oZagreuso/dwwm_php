<?php
// require_once('Moteur.php');
require_once('Voiture.php');
class VoitureCourse extends Voiture
{

    public function __construct(string $marque, int $poids, Moteur $moteur)
    {         
        parent::__construct($marque, $poids, $moteur);
        
        $this->voitureValide();    

    }     
        
    function getVitesseMax(): float
    {
            $this->vitesseMax = $this->moteur->mVMax - ($this->poids * (5 / 100)); 
            return $this->vitesseMax;
    }      

}


$voitureCourse = new VoitureCourse('fiat', 800, new Moteur('fiat', 180));
echo "<br>";
$voitureCourse = new VoitureCourse('fiat', 800, new Moteur('lancia', 180));
$voitureCourse->getVitesseMax();
var_dump($voitureCourse);
