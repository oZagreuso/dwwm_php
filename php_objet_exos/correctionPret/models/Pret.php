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

    public function tableauAmortissement() : string
    {
        $chaine = "<table><thead><tr><th>nombre de mois</th><th>part intérêt</th><th>part amortissement</th><th>capital restant dû</th><th>mensualité</th></tr></thead><tbody>";
        $numMois = 1;
        $capitalRestant = 0;
        $partInteret = 0;
        $partAmortissment = 0;
        $mensualite =  $this->calculMens();
        do {
            if ($numMois == 1)
            {
                $capitalRestant = $this->capital;
            }
            else 
            {
                $capitalRestant -= $partAmortissment;
            }
            $partInteret = $capitalRestant * $this->txMens;
            $partAmortissment = $mensualite - $partInteret;
            $chaine .= "<tr><td>" . $numMois . "</td><td>" . round($partInteret, 2) . "€ </td><td>" .  round($partAmortissment, 2) . "</td><td>" . round($capitalRestant, 2) . "€ </td><td>" . round($mensualite, 2) . "</td></tr>";
            $numMois ++;
        } while ($numMois <= $this->nbMois); 
            $chaine .= "</tbody></table>";
            return $chaine;
    }
    
            public function getTableauAmortissement():array
            {
                $data=array();
                $partInteret = 0;
                $partAmortissement = 0;
                $mensualite =  $this->calculMens();
                $capitalRestant = $this->capital;
            for ($i=0; $i < $this->nbMois ; $i++) 
            { 

            if($i>0)
            {   
                $capitalRestant-=$partAmortissement;
            }
            $partInteret = $capitalRestant * $this->txMens;
            $partAmortissement = $mensualite - $partInteret;
            array_push($data, ["num_mois"=>$i+1,"partInteret"=>round($partInteret,2),"partAmortissement"=>round($partAmortissement),"capital_restant"=>round($capitalRestant,2),"mensualite"=>round($mensualite) ]);
            }


        return $data;

    }

}
