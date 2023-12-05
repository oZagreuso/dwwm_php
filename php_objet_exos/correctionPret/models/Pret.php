<?php

class Pret
{
    // attributs
    public float $capital;
    private float $txMens;
    private int $nbMois;

    //constructeur
    public function __construct(float $_capital, float $_txAnn, int $_nbAnn)
    {
        $this->capital = $_capital;
        $this->txMens = $_txAnn/12/100;
        $this->nbMois = $_nbAnn * 12;
    }

    //propriétés
    public function getTxMens()
    {
        return $this->txMens;
    }
    public function getNbMois()
    {
        return $this->nbMois;
    }

    //méthodes        
    public function calculMens() : float
    {
        $quotient = (1- pow((1 + $this->txMens), -$this->nbMois));
        $mensualite = ($this->capital * $this->txMens) / $quotient;
        return round($mensualite, 2);
    }
}