<?php
require('Moteur.php');
require('Voiture.php');
class VoitureCourse extends Voiture
{
    protected $marque;
    protected $poids;
    public $moteur;
    public $vitesseMax;


    public function __construct(string $marque, int $poids, float $mVMax, string $mMarque)
    {
        parent::__construct(string $marque, int $poids, float $mVMax, string $mMarque);
        /*$this->marque = $marque;
        $this->poids = $poids;
        $this->mMarque = $moteur->marque;*/
    }   

    public function setVitesseMax()
    {
        if($marque == $mMarque){
            $vitesseMax = $mVMax - ($poids * 5 / 100);
            return $vitesseMax;
        }
        else {
            throw new ErrorException();
        }
      
    }

}
