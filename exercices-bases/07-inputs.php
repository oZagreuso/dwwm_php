<?php

function stringLength(string $string) 
{
    $taille = mb_strlen($string);
    if($taille >= 9)
    {
        return true;
    }
    elseif($taille < 9)
    {
        return false;
    }
}

function passwordCheck(string $string)
{
  if(stringLength($string) == false){
    return false;
  }
  if (!preg_match('/[0-9]/', $string)) {
    return false;
  }
  if (!preg_match('/[A-Z]/', $string) || !preg_match('/[a-z]/', $string)) {
    return false;
  }
  if (!preg_match('/[^a-zA-Z0-9]/', $string)) {
    return false;
  }
  return true;
}

$users = [
  'joe' => 'Azer1234!', 
  'jack' => 'Azer-4321', 
  'admin' => '1234_Azer',
 ];

function userLogin(string $nom, string $mdp, array $utilisateur)
{
  if(passwordCheck($mdp) == true) {
    echo "$nom OK";
    foreach($utilisateur as $key => $value){
      if($nom == $key && $mdp == $value){
        return true;
      }
    }
  }
  return false;
  }

 
  


var_dump(stringLength("MotDePasseLong"));
echo "<br>";
var_dump(stringLength("azer"));
echo "<br>";
var_dump(passwordCheck("MotDePasse1Long$"));
echo "<br>";
var_dump(userLogin("joe", "Azer1234!", $users));
echo "<br>";
var_dump(userLogin("jack", "Azer-4321", $users));
