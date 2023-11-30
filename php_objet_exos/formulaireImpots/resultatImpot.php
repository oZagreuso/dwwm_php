<?php

const TAUXA = 0.09;
const TAUXB = 0.14;


function calculImpot($revenu)
{
    
    if ($revenu <= 15000) {
        return $revenu * TAUXA;
    }

    
    else {
     
        $impotA = $revenu * TAUXA;  
        $impotB = ($revenu - 15000) * TAUXB;
     
        return $impotA + $impotB;
    }
}

$nom = $_POST['nom'];
$revenu = $_POST['revenu'];
$impot = calculImpot($revenu);

echo "Monsieur $nom, votre impôt est de $impot euros.";


?>

