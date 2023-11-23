<?php

class VoitureCourse extends Voiture
{
   /* protected $marque;
    protected $poids;
    public $mVMax;
    public $vitesseMax;*/
    public $mMarque;


    public function __construct(string $marque, int $poids, $moteur)
    {
        parent:: __construct();
        $this->mMarque = $moteur->marque;
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
