<?php

function getMC2() {
    return "Albert Einstein";
}

function getUserName(string $prenom, string $nom) 
{
    return $prenom . ' ' . $nom;
}

function getFullName(string $nom, string $prenom): string
{
  $nom = mb_convert_case($nom, MB_CASE_UPPER, "UTF-8");
  $prenom = mb_convert_case($prenom, MB_CASE_LOWER, "UTF-8");
  return $prenom . " " . $nom;
}

function askUser(string $nom, string $prenom)
{
    $fullName = getFullName($nom, $prenom);
    $prof = getMC2();
    return "Bonjour $fullName, connaissez-vous $prof ?";
}



$prof = getMC2();
echo "L'inventeur de la formule E=MC² est : " . $prof;

echo "<br>";

$prenom = 'mickaël';
$nom = 'devoldère';

$username = getUserName($prenom, $nom);

echo $username;

echo "<br>";

echo getFullName($nom, $prenom);

echo "<br>";

echo askUser($nom, $prenom);

