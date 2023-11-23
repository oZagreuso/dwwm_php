<?php

class Voiture
{
    protected $marque;
    protected $poids;
    public $mVMax;
    public $vitesseMax;


    public function __construct(string $marque, int $poids, $moteur)
    {
        $this->marque = $marque;
        $this->poids = $poids;
        $this->mVMax = $mVMax;
        $this->moteur = $moteur;
    }   
 

    public function getMarque()
    {
        return $this->marque;
    }

    public function getPoids()
    {
        return $this->poids;
    }

    public function getMVMax()
    {
        return $this->mVMax;
    }  
    
    public function getMoteur()
    {
        return $this->moteur;
    }

    public function getVitesseMax()
    {        
            $vitesseMax = $mVMax - ($poids * 30 / 100);
            return $vitesseMax;            
    }
}

