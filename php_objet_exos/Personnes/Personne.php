<?php

class Personne 
{
    private $age;
    private $nom;
    private $prenom;
    private $dateNaiss;

public function __construct(string $dateNaiss, string $nom, string $prenom)
{  
    $this->dateNaiss = $dateNaiss;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->age = $this->setAge();
  
 }


public function getDateNaiss(){
    return $this->dateNaiss;
}

public function getNom(){
    return $this->nom;
}

public function getPrenom(){
    return $this->prenom;
}

public function setAge(){
    $timestamp = strtotime($this->dateNaiss);    
    $now = time();
    $diff = abs($timestamp - $now);  
    $this->age = floor($diff / (60 * 60 * 24 * 365));
    // $year = $this->age;
    return $this->age;
}
}

$persNatana = new Personne("2010-09-29", "Robson","Natana");
var_dump($persNatana);
echo "<br>";
var_dump($persNatana->setAge());
