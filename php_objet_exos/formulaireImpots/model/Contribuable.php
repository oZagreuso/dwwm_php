<?php

class Contribuable 
{
    //attributs
    private string $nom = "";
    private float $revenu = 0;

    public const TAUXA = 0.09;
    public const TAUXB = 0.14;
    public const PLAFOND = 15000;

    //constructeur
    public function __construct(string $_nom, float $_revenu)
     {
        $this->nom = $_nom;
        $this->revenu = $_revenu;
     }

     public function getRevenu() : float
     {
        return $this->revenu;
     }

     public function setRevenu(float $_newRevenu) : void
     {
        $this->revenu = $_newRevenu;
     }

     public function getNom() : string 
     {
        return $this->nom;
     }

     //méthode
     public function calculImpot() : float
     {
        $impot = 0;

        if ($this->revenu <= self::PLAFOND) 
        {
            $impot = $this->revenu * self::TAUXA;
        }    
        
        else 
        {         
            $trancheA = $this->revenu * self::TAUXA;  
            $trancheB = ($this->revenu - self::PLAFOND) * self::TAUXB;
            $impot = $trancheA + $trancheB;         
        }

        return round($impot, 2);
     }

}