<?php

class Moteur
{
    protected $marque;
    public $mVMax;


    public function __construct(string $marque, float $mVMax)
    {
        $this->marque = $marque;
        $this->mVMax = $mVMax;
    }   

    public function getMarque()
    {
        return $this->marque;
    }
    
    public function getMVMax()
    {
        return $this->mVMax;
    }  

}
