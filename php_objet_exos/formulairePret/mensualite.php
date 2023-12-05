<?php
require_once 'index.php';



function calculMensualite(float $capital, float $tauxAnnuel, int $nbAnneesRemb)
{
    $tauxMensuel = $tauxAnnuel/12;
    $nbMoisRemb = $nbAnneesRemb * 12;
    $quotient = 1 - pow(1 + $tauxMensuel, -$nbMoisRemb);
    $mensualite = $capital * $tauxMensuel / $quotient;
    return $mensualite;

}


function calculAmortissement(float $capital, float $tauxAnnuel, int $nbAnneesRemb)
{
    $mensualite = calculMensualite($capital, $tauxAnnuel, $nbAnneesRemb);

    // $tableau = array();
    $capitalRestantDu = $capital;
    
    $montabAmrt=[];
        
    for ($i = 1; $i <= $nbAnneesRemb; $i++) {   
   
        $interets = $capitalRestantDu * ($tauxAnnuel / 12);
        $amortissement = $mensualite - $interets;
        $capitalRestantDu = $capitalRestantDu - $amortissement;
          
        /*echo '<table border="1">
        <tr>
        <th>Numéro de mois</th>
        <th>Intérêt</th>
        <th>Partie Amortissement</th>
        <th>Capital restant</th>
        </tr>';*/

        $tableau = [
        
            "mois" => $i,
            "amortissement" => $amortissement,
            "interets" => $interets,
            "capitalRestantDu" => $capitalRestantDu
           
        ]; 
        array_push($montabAmrt, $tableau);

        
    }
    return $montabAmrt;    

    }        






  