<?php



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
    $tableau = [];
    $mensualite = calculMensualite($capital, $tauxAnnuel, $nbAnneesRemb);
    for ($i = 1; $i <= $nbAnneesRemb; $i++) {
    
   
    $interets = $capital * $tauxAnnuel;
    $amortissement = $mensualite - $interets;
    $capitalRestantDu = $capital - $amortissement;
    return $capitalRestantDu;

    $tableau[] = 
        [
            "mois" => $i,
            "capital_emprunte" => $capital,
            "capital_restant_du" => $capitalRestantDu,
            "interets" => $interets,
            "amortissement" => $amortissement, 
        ];      
    }
    
}

var_dump($tableau);



// $capital = $_POST['capital'];
// $tauxAnnuel = $_POST['taux'];
// $nbAnneesRemb = $_POST['duree'];
// $maMensualite = calculMensualite($capital, $tauxAnnuel, $nbAnneesRemb);

// echo "Votre mensualité est de $maMensualite euros.";

  