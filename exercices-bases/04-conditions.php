<?php

function isMajor(int $age) : bool
{
    if ($age >= 18) 
    {
        return "est majeur";
    }
    else
    {
        return "est mineur";
    }
}


function getRetired(int $age) 
{       
        if ($age < 0) {
          return "Vous n'êtes pas encore né";
        }      
    
        if ($age < 60) {
          $ansAvtRetraite = 60 - $age;
          return "Il vous reste $ansAvtRetraite ans avant la retraite";
        }      
      
        else {
          $ansDepuisRetraite = $age - 60;
          return "Vous êtes à la retraite depuis $ansDepuisRetraite ans";
        }
}

function getMax(float $a, float $b, float $c)
{
    $max = $a;

    if ($b > $max) {
        $max = $b;
    }
    if ($c > $max) {
        $max = $c;
    }
    if ($a == $b || $a == $c || $b == $c) {
        return 0;
    }
    return round($max, 3);
}

function capitalCity(string $country) 
{
    $country = mb_convert_case($country, MB_CASE_UPPER, "UTF-8");    
    switch ($country) {
      case "FRANCE":
        return "Paris";
      case "ALLEMAGNE":
        return "Berlin";
      case "ITALIE":
        return "Rome";
      case "MAROC":
        return "Rabat";
      case "ESPAGNE":
        return "Madrid";
      case "PORTUGAL":
        return "Lisbonne";
      case "ANGLETERRE":
        return "Londres";
      default:
        return "Capitale inconnue";
    }
  }
  

echo var_dump(isMajor(12)); //ver_dump => pour vérifier l'état => booléen ou non
echo "<br>";
echo var_dump(isMajor(18)); 
echo "<br>";
echo var_dump(isMajor(42)); 
echo "<br>";
echo getRetired (12);
echo "<br>";
echo getRetired (60); 
echo "<br>";
echo getRetired (72); 
echo "<br>";
echo getRetired (-2);
echo "<br>";
echo getMax(2.5, 4.3, 6);
echo "<br>";
echo getMax(6, 6, 6);
echo "<br>";
echo getMax(8, 8.1, 6);
echo "<br>";
echo capitalCity("France");
echo "<br>";
echo capitalCity("allemagne");