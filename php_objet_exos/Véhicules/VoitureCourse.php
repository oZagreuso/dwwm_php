<?php
// require_once('Moteur.php');
require_once('Voiture.php');
class VoitureCourse extends Voiture
{
    /*protected $marque;
    protected $poids;
    public $mMarque;
    public $vitesseMax;*/
    // public $estDeCourse = true;
    //public $monMoteur;



    public function __construct(string $marque, int $poids, Moteur $moteur)
    {
        parent::__construct($marque, $poids, $moteur);
        /*$this->marque = $marque;
        $this->poids = $poids;
        $this->mMarque = $mMarque;*/
        //$this->monMoteur = $this->$moteur;   

    }     
        function moteurValide()
        {
            if($this->marque == $this->moteur->mMarque){
                return true;
            }else{
               throw new Exception('Moteur et Voiture incompatibles');
            }
        }

        function newVitesseMax()
        {
            if($this->moteurValide()){
                $this->vitesseMax = $this->moteur->mVMax - ($this->poids * (5 / 100)); 
                return $this->vitesseMax;
            
        }

        }

}
$voitureCourse = new VoitureCourse('fiat', 800, new Moteur('fiat', 180));
$voitureCourse->getVitesseMax();
var_dump($voitureCourse);
