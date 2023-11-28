<?php


class Adresse 
{
    private $numeroRue;
    private $nomRue;
    private $cp;
    private $commune;
    protected $adresse;

public function __construct(int $numeroRue, string $nomRue, int $cp, string $commune)
{  
    $this->numeroRue = $numeroRue;
    $this->nomRue = $nomRue;
    $this->cp = $cp;
    $this->commune = $commune;
    $this->adresse = $this->setAdresse();
  
 }

 public function getNumeroRue()
 {
     return $this->numeroRue;
 }

 public function getNomRue()
 {
     return $this->nomRue;
 }

 public function getCp()
 {
     return $this->cp;
 }

 public function getCommune()
 {
     return $this->commune;
 }


 public function setAdresse()
    {
        return $this->numeroRue . " " . $this->nomRue . " " . $this->cp . " " . $this->commune;
 
    }

}
