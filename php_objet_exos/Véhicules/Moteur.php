<?php

class Moteur
{
    public $mMarque;
    public $mVMax;


    public function __construct(string $mMarque, float $mVMax)
    {
        $this->mMarque = $mMarque;
        $this->mVMax = $mVMax;
    }   

    public function getMarque()
    {
        return $this->mMarque;
    }
    
    public function getMVMax()
    {
        return $this->mVMax;
    }  

}
