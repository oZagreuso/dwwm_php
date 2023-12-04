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

    $tableau = array();
    $capitalRestantDu = $capital;
        
    for ($i = 1; $i <= $nbAnneesRemb; $i++) {   
   
        $interets = $capital * $tauxAnnuel / 12;
        $amortissement = $mensualite - $interets;
        $capitalRestantDu = $capitalRestantDu - $amortissement;
          
        echo '<table border="1">
        <tr>
        <th>Numéro de mois</th>
        <th>Intérêt</th>
        <th>Partie Amortissement</th>
        <th>Capital restant</th>
        </tr>';

        $tableau = array
        (
            "mois" => $i,
            "amortissement" => $amortissement,
            "interets" => $capitalRestantDu,
            "capitalRestantDu" => $interets,
           
        ); 

            foreach ($tableau as $ligne): ?>
                <tr>
                    <td><?= $ligne['mois'] ?></td>
                    <td><?= $ligne['amortissement'] ?></td>
                    <td><?= $ligne['interets'] ?></td>
                    <td><?= $ligne['capital_restant_du'] ?></td>
                </tr>
                <?php endforeach; 
            }
            return $tableau;

    }        






  