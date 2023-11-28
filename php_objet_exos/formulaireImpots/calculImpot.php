<?php

require_once('index.php');


function calculImpot()
        {
            $TAUXA = 0.14;
            $TAUXB = 0.09;
         
            if($_GET["revenu"] > 15000)
            {
               $taux = $TAUXA;
               $montant = $taux * $_GET["revenu"];
               return 'Monsieur' . $_GET["nom"] . 'votre impôt' . $montant;
            }
            else{
                $taux = $TAUXB;
                $montant = $taux * $_GET["revenu"];
                return 'Monsieur' . $_GET["nom"] . 'votre impôt' . $montant;
            }
        }

        

        var_dump(calculImpot(12500,));