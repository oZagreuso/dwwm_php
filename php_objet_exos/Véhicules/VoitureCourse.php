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
       
        
    public function getVitesseMax(): float
    {
            $this->vitesseMax = $this->moteur->mVMax - ($this->poids * (4 / 100)); 
            return $this->vitesseMax;
    }     
    
}

// $voitureCourse = new VoitureCourse('fiat', 800, new Moteur('fiat', 180));

// $voitureCourse2 = new VoitureCourse('fiat', 800, new Moteur('lancia', 180));
// $voitureCourse->getVitesseMax();

// $voitureCourse2->getVitesseMax();

// var_dump($voitureCourse);
// var_dump($voitureCourse2);
// $voitureCourse = new VoitureCourse('fiat', 800, new Moteur('lancia', 180));
echo "<br>";
try{
    $voitureCourse2 = new VoitureCourse('fiat', 800, new Moteur('fiat', 180));
}

catch(Exception $e){
    echo 'Construction failed!';
}
echo "<br>";
//var_dump($voitureCourse2);
// var_export($voitureCourse);
$vitesse = $voitureCourse2->getVitesseMax();
echo $vitesse;

$marque = $voitureCourse2->getMarque();
echo $marque;