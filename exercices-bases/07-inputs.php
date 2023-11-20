<?php

function stringLength(string $string) 
{
    $taille = strlen($string);
    if($taille > 9)
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

var_dump(stringLength("MotDePasseLong"));
echo "<br>";
var_dump(stringLength("azer"));
echo "<br>";
var_dump(passwordCheck("MotDePasse1Long$"));