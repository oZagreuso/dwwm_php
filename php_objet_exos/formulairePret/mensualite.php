<?php

function calculMensualite(float $capital, float $tauxAnnuel, int $nbAnneesRemb)
{
    $tauxMensuel = $tauxAnnuel/12;
    $nbMoisRemb = $nbAnneesRemb * 12;
    $quotient = 1 - pow(1 + $tauxMensuel, -$nbMoisRemb);
    $mensualite = $capital * $tauxMensuel / $quotient;
    return $mensualite;

}

// $capital = $_POST['capital'];
// $tauxAnnuel = $_POST['taux'];
// $nbAnneesRemb = $_POST['duree'];
// $maMensualite = calculMensualite($capital, $tauxAnnuel, $nbAnneesRemb);

// echo "Votre mensualité est de $maMensualite euros.";

  